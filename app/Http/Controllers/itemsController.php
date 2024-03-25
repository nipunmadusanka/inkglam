<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maincatitems as Maincatitems;
use App\Models\Sellitems as Sellitems;
use App\Models\Orders as Orders;
use App\Models\Mainservice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class itemsController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $data = Maincatitems::all();
            $count = Orders::where('notes', '!=', 'read')->count();
            return view('pages.itemsell.maincategory', ['result' => $data, 'count' => $count]);
        } else {
            return redirect('/');
        }
    }

    public function addMainItemCategory()
    {
        if (Auth::check()) {
            return view('pages.itemsell.addmaincat');
        } else {
            return redirect('/');
        }
    }

    public function addMainCatItems(Request $request)
    {
        $my_id = Auth::id();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('itemMainCat'), $imageName);

        $add = new Maincatitems();

        $add->uId = $my_id;
        $add->title = $request->name;
        $add->description = $request->description;
        $add->image = $imageName;

        $add->save();
        return redirect('/viewmainitemcategory')->with('success', 'Successfully add main item category');
    }

    public function viewItems($id)
    {
        if (Auth::check()) {
            $data = Maincatitems::find($id);

            $item = Sellitems::where('mcatId', $id)->get();
            Session::put('main_item_url', request()->fullUrl());

            return view('pages.itemsell.viewsubitems', ['result' => $data, 'product' => $item]);
        } else {
            return redirect('/');
        }
    }

    public function addnewItems($id)
    {
        return view('pages.sellitems.additems', ['mId' => $id]);
    }

    public function addItems(Request $request)
    {

        // 'uId',
        // 'mcatId',
        // 'item',
        // '',
        // '',
        // '',
        // '',
        // '',
        // '',
        // '',
        // '',
        // 'discount',
        // '',
        // '',
        // 'note',
        // 'status',

        $my_id = Auth::id();
        $request->validate([
            'item' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'item_code' => 'required',
            // 'color' => 'required',
            'model' => 'required',
            // 'model_year' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('sellitems'), $imageName);

        $pro = new Sellitems();

        $pro->uId = $my_id;
        $pro->mcatId = $request->mId;
        $pro->item = $request->input('item');
        $pro->description = $request->input('description');
        $pro->brand = $request->input('brand');
        $pro->item_code = $request->input('item_code');
        $pro->model = $request->input('model');
        $pro->price = $request->input('price');
        $pro->qty = $request->input('qty');
        $pro->image = $imageName;

        $pro->save();

        if (Session('main_item_url')) {
            return redirect(Session('main_item_url'))->with('success', 'Successfully updated status');
        } else {
            return redirect('/viewmainitemcategory')->with('success', 'Successfully updated status');
        }
    }

    public function editItems($id)
    {
        $data = Sellitems::find($id);

        return view('pages.sellitems.edititems', ['result' => $data]);
    }

    public function updateItems($id, Request $request)
    {
        $request->validate([
            'item' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'item_code' => 'required',
            // 'color' => 'required',
            'model' => 'required',
            // 'model_year' => 'required',
            'price' => 'required',
            'qty' => 'required',

        ]);
        $row = Sellitems::find($id);
        $getimage = DB::select('select image from sellitems where id = ?', [$id]);
        foreach ($getimage as $img) {
            $imageName = $img->image;
        };
        $changeimage = $request->image;

        if ($changeimage == null) {
        } else {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('sellitems'), $imageName);
        }

        $row->update([

            'item' => $request->input('item'),
            'description' => $request->input('description'),
            'brand' => $request->input('brand'),
            'item_code' => $request->input('item_code'),
            'model' => $request->input('model'),
            'price' => $request->input('price'),
            'qty' => $request->input('qty'),
            'image' => $imageName,
        ]);

        if (Session('main_item_url')) {
            return redirect(Session('main_item_url'))->with('success', 'Successfully updated status');
        } else {
            return redirect('/viewmainitemcategory')->with('success', 'Successfully updated status');
        }
    }

    public function deactiveItems(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['deActiveId'];
        $m_service = Sellitems::find($item);
        if ($m_service) {
            $m_service->update([
                'status' => '0',
            ]);
            return redirect()->back()->with('success', 'Successfully deactivated');
        }
    }

    public function activeItems(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['activeId'];
        $m_service = Sellitems::find($item);
        if ($m_service) {
            $m_service->update([
                'status' => '1',
            ]);
            return redirect()->back()->with('success', 'Successfully deactivated');
        }
    }

    public function mainItemDeactive(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['deActiveId'];
        Sellitems::where('mcatId', $item)->update([
            'status' => '0',
        ]);
        $product = Maincatitems::find($item);
        if ($product) {
            $product->update(['status' => '0']);
            return redirect()->back()->with('success', 'Successfully updated status');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

    public function activeMainItem(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['activeId'];

        Sellitems::where('mcatId', $item)->update([
            'status' => '1',
        ]);

        $product = Maincatitems::find($item);
        if ($product) {
            $product->update([
                'status' => '1',
            ]);
            return redirect()->back()->with('success', 'Successfully updated status');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

    public function editMainItem($id)
    {
        $data = Maincatitems::find($id);

        return view('pages.itemsell.editmainitems', ['result' => $data]);
    }

    public function updateMainItem($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $row = Maincatitems::find($id);
        $getimage = DB::select('select image from maincatitems where id = ?', [$id]);
        foreach ($getimage as $img) {
            $imageName = $img->image;
        };
        $chechimage = $request->image;

        if ($chechimage == null) {
        } else {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('itemMainCat'), $imageName);
        }

        $row->update([
            'title' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imageName,
        ]);

        return redirect('/viewmainitemcategory')->with('success', 'Successfully updated');
    }

    public function ordersAdmin()
    {
        $data = Orders::all();
        $count = Orders::where('notes', '!=', 'read')->count();
        return view('pages.orders.order', ['result' => $data, 'count' => $count]);
    }

    public function readOrder(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];
        $myData = Orders::find($orderId);

        if ($myData) {
            $myData->notes = 'read';
            $myData->save();
            return redirect()->back()->with('success', 'Successfully deactivated');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maincatitems as Maincatitems;
use Illuminate\Support\Facades\Auth;

class itemsController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $data = Maincatitems::all();
            return view('pages.itemsell.maincategory', ['result' => $data]);
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

            return view('pages.itemsell.viewsubitems', ['result' => $data]);
        } else {
            return redirect('/');
        }
    }

    public function mainItemDeactive(Request $request) {
        $data = json_decode($request->getContent(), true);
        $item = $data['deActiveId'];
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
}

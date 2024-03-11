<?php

namespace App\Http\Controllers;

use App\Models\Product as ProductModel;
use App\Models\Mainservice_has_Product as Has_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function addProduct($mId)
    {
        return view('pages.product.addproduct', ['mId' => $mId]);
    }

    public function addNewProduct(Request $request)
    {

        $my_id = Auth::id();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $pro = new ProductModel();

        $pro->uId = $my_id;
        $pro->name = $request->input('name');
        $pro->description = $request->input('description');
        $pro->price = $request->input('price');
        $pro->image = $imageName;

        $pro->save();
        $pId = $pro->id;
        Has_Product::create([
            'uId' => $my_id,
            'mId' => $request->mId,
            'pId' => $pId,
        ]);
        if (Session('main_cat_url')) {
            return redirect(Session('main_cat_url'))->with('success', 'Successfully updated status');
        } else {
            return redirect('/viewmainservices')->with('success', 'Successfully updated status');
        }
    }

    public function editService($id)
    {
        $data = ProductModel::find($id);
        return view('pages.product.editproduct', ['result' => $data]);
    }

    public function updateService($id, Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $row = ProductModel::find($id);
        $getimage = DB::select('select image from products where id = ?', [$id]);
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
            $request->image->move(public_path('images'), $imageName);
        }

        $row->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageName,
        ]);

        if (Session('main_cat_url')) {
            return redirect(Session('main_cat_url'))->with('success', 'Successfully updated status');
        } else {
            return redirect('/viewmainservices')->with('success', 'Successfully updated status');
        }
    }
}

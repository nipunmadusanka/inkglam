<?php

namespace App\Http\Controllers;

use App\Models\Product as ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function viewProduct(){
        $result = ProductModel::all();
        return view('pages.product.product', ['result' => $result]);
    }

    public function addProduct(){
        return view('pages.product.addproduct');
    }

    public function addNewProduct(Request $request) {
        $my_id = Auth::id();
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $pro = new ProductModel();

        $pro->uId = $my_id;
        $pro->name = $request->input('name');
        $pro->description = $request->input('description');
        $pro->price = $request->input('price');
        $pro->image = $imageName;

        $pro->save();
        return redirect('/viewproducts')->with('success','Successfully add service');
    }

    public function destroyService(ProductModel $item){
        $item->delete();
        return redirect('/viewproducts')->with('success','Successfully Delete Service');
    }
    public function editService($id){
        $data = ProductModel::find($id);
        return view('pages.product.editproduct', ['result' => $data]);
    }

    public function updateService($id, Request $request){
        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        ]);
        $row = ProductModel::find($id);

        $getimage = DB::select('select image from products where id = ?', [$id]);
        foreach($getimage as $img){
            $imageName = $img->image;
        };
        $chechimage = $request->image;

        if($chechimage == null ){

        } else {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $row->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageName,
        ]);

        return redirect('/viewproducts')->with('success','Successfully update service');
    }
}

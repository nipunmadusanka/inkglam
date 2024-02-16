<?php

namespace App\Http\Controllers;

use App\Models\Product as ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);

        $pro = new ProductModel();

        $pro->uId = $my_id;
        $pro->name = $request->input('name');
        $pro->description = $request->input('description');
        $pro->price = $request->input('price');

        $pro->save();
        return redirect('/viewproducts');
    }

    public function destroyService(ProductModel $item){
        $item->delete();
        return redirect('/viewproducts');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mainservice as MainServiceModel;
use App\Models\Product as ProductModel;
use App\Models\Mainservice_has_Product as Has_ProductModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainServiceController extends Controller
{
    //

    public function viewMainServices()
    {
        if (Auth::check()) {
            $data = MainServiceModel::all();
            return view('pages.mainservice.mainservice', ['result' => $data]);
        } else {
            return redirect('/');
        }
    }

    public function viewAddNewServices()
    {
        if (Auth::check()) {
            return view('pages.mainservice.addmainservice');
        } else {
            return redirect('/');
        }
    }

    public function addNewServices(Request $request)
    {
        $my_id = Auth::id();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('mainservice'), $imageName);

        $pro = new MainServiceModel();

        $pro->uId = $my_id;
        $pro->name = $request->input('name');
        $pro->description = $request->input('description');
        $pro->image = $imageName;

        $pro->save();
        return redirect('/viewmainservices')->with('success', 'Successfully add main service');
    }

    public function viewSubProducts($id)
    {
        if (Auth::check()) {
            $data = MainServiceModel::find($id);

            $product = Has_ProductModel::where('mId', $id)->where('status', 1)->with('Product')->get();
            // ProductModel::all();
            Session::put('main_cat_url', request()->fullUrl());

            return view('pages.mainservice.viewsubproduct', ['result' => $data, 'product' => $product]);
        } else {
            return redirect('/');
        }
    }

    public function destroyService(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['deActiveId'];
        $product = ProductModel::find($item);
        if ($product) {
            $product->update(['status' => '0']);
            return redirect()->back()->with('success', 'Successfully updated status');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

    public function activeService(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['activeId'];

        $product = ProductModel::find($item);
        if ($product) {
            $product->update([
                'status' => '1',
            ]);
            return redirect()->back()->with('success', 'Successfully updated status');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }

    public function mainServiceDeactive(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['deActiveId'];
        $m_service = MainServiceModel::find($item);
        if ($m_service) {
            $m_service->update([
                'status' => '0',
            ]);
            // Update Has_ProductModel
            Has_ProductModel::where('mId', $item)->update([
                'status' => '0',
            ]);
            return redirect()->back()->with('success', 'Successfully deactivated');
        }
    }

    public function mainServiceActive(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['activeId'];
        $m_service = MainServiceModel::find($item);
        if ($m_service) {
            $m_service->update([
                'status' => '1',
            ]);
            // Update Has_ProductModel
            Has_ProductModel::where('mId', $item)->update([
                'status' => '1',
            ]);
            return redirect()->back()->with('success', 'Successfully deactivated');
        }
    }
}

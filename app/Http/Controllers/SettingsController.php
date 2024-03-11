<?php

namespace App\Http\Controllers;

use App\Models\Imagegallery as ImageGalleryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    //

    public function viewSettings() {
        if (Auth::check()) {
            return view('pages.settings.settings');
        } else {
            return redirect('/');
        }
    }

    public function gallerySetting() {
        $data = ImageGalleryModel::orderBy('created_at', 'desc')->get();
        return view('pages.settings.gallerysetting.gallerysetting', ['result' => $data]);
    }

    public function addGalleryImgage(Request $request) {
        $my_id = Auth::id();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('imagegallry'), $imageName);

        $pro = new ImageGalleryModel();

        $pro->uId = $my_id;
        $pro->name = $request->input('name');
        $pro->description = $request->input('description');
        $pro->image = $imageName;
        $pro->save();

        return redirect()->back()->with('success', 'Successfully added image');
    }

    public function deactiveGallery(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['deActiveId'];
        $product = ImageGalleryModel::find($item);
        if ($product) {
            $product->update(['status' => '0']);
            return redirect()->back()->with('success', 'Successfully updated status');
        } else {
            return redirect()->back()->with('error', 'Record not found');
        }
    }

    public function activeGallery(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['activeId'];

        $product = ImageGalleryModel::find($item);
        if ($product) {
            $product->update([
                'status' => '1',
            ]);
            return redirect()->back()->with('success', 'Successfully updated status');
        } else {
            return redirect()->back()->with('error', 'Record not found');
        }
    }
}

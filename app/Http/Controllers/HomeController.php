<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ServiceModel;
use App\Models\Employe as EmployeeModel;
use App\Models\Ratings as RatingsModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index(){
        $data = ServiceModel::all();
        $employeedata = EmployeeModel::all();
        return view('pages.website.pages.home.home', ['serviceData' => $data, 'employeedata' => $employeedata]);
    }

    public function about() {
        return view('pages.website.pages.about.about');
    }

    public function contact() {
        return view('pages.website.pages.contact.contact');
    }

    public function services() {
        $service_data = ServiceModel::all();
        return view('pages.website.pages.services.services', ['serviceData' => $service_data]);
    }

    public function appointment($id) {
        $get_service = ServiceModel::find($id);
        $ratings = RatingsModel::where('sId', $id)->with('user')->get();
        return view('pages.website.pages.appoinments.appoinment', ['id' => $id, 'serviceData' => $get_service, 'ratings' => $ratings]);
    }

    public function makeAppointment(Request $request, $id) {
        return $request;
    }

    public function postRatings(Request $request, $id) {
        $request->validate([
            'rating' => 'required',
            'svgId' => 'required',
        ]);
        $my_id = Auth::id();
        $adminreply = 'no';
        $status = 1;
        RatingsModel::create([
            'uId' => $my_id,
            'sId' => $id,
            'comment' => $request->rating,
            'admin_reply' => $adminreply,
            'star' => $request->svgId,
            'status' => $status,
        ]);
        return $request;
    }
}

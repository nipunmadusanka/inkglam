<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ServiceModel;
use App\Models\Employe as EmployeeModel;

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
        return view('pages.website.pages.appoinments.appoinment', ['id' => $id, 'serviceData' => $get_service]);
    }

    public function makeAppointment(Request $request, $id) {
        return $request;
    }
}

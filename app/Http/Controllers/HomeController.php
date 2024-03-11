<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ServiceModel;
use App\Models\Employe as EmployeeModel;
use App\Models\Ratings as RatingsModel;
use App\Models\Employee_has_services as EmployeeHasServices;
use App\Models\Timeslot as TimeslotModel;
use App\Models\NewAppoinments as NewAppoinmentsModel;
use App\Models\User as UserModel;
use App\Models\Letstalk as LetstalkModel;
use App\Models\Mainservice_has_Products as HasProductsModel;
use App\Models\Mainservice as MainServicesModel;
use App\Models\Imagegallery as ImagegalleryModel;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Metadata\Uses;

class HomeController extends Controller
{
    //
    public function test()
    {
        return view('pages.website.pages.test.test');
    }

    public function index()
    {
        $data = MainServicesModel::where('status', 1)->get();
        $employeedata = EmployeeModel::where('status', 1)->get();
        $twoImages = ImagegalleryModel::orderBy('created_at', 'desc')->where('status', '1')->take(2)->get();
        return view('pages.website.pages.home.home', [
            'serviceData' => $data,
            'employeedata' => $employeedata,
            'twoImages' => $twoImages,
        ]);
    }

    public function about()
    {
        return view('pages.website.pages.about.about');
    }

    public function contact()
    {
        return view('pages.website.pages.contact.contact');
    }

    public function services()
    {
        $service_data = MainServicesModel::where('status', 1)->get();
        return view('pages.website.pages.services.services', ['serviceData' => $service_data]);
    }

    public function appointment($id)
    {
        $get_service = ServiceModel::find($id);
        $ratings = RatingsModel::where('sId', $id)->with('user')->get();
        $starCounts = RatingsModel::where('sId', $id)
            ->groupBy('star')
            ->selectRaw('star, COUNT(*) as count')
            ->pluck('count', 'star')
            ->toArray();
        $countRatings = RatingsModel::where('status', 1)
            ->where('sId', $id)
            ->count();
        // $employees = EmployeeHasServices::where('sId', $id)
        //     ->where('status', 1)
        //     ->with('products') // Assuming 'product' is the correct relationship name
        //     ->get();
        $employeesWithServices = EmployeeHasServices::where('sId', $id)
            ->where('employee_has_services.status', 1) // Add this condition for status
            ->join('products', 'employee_has_services.sId', '=', 'products.id')
            ->join('employes', 'employee_has_services.eId', '=', 'employes.id')
            ->select('employes.*')
            ->get();
        return view('pages.website.pages.appoinments.appoinment', [
            'id' => $id,
            'serviceData' => $get_service,
            'ratings' => $ratings,
            'countRatings' => $countRatings,
            'starCounts' => $starCounts,
            'employeesWithServices' => $employeesWithServices,
        ]);
    }

    public function makeAppointment(Request $request, $id)
    {
        $sId = $id;
        $emId = $request->employeId;

        $result = [
            'sId' => $sId,
            'emId' => $emId,
        ];

        $my_id = Auth::id();

        if ($my_id) {
            return $result;
        } else {
            $notlogin = 0;
            return $notlogin;
        }
    }

    public function postRatings(Request $request, $id)
    {
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

    public function placeAppoinmentView()
    {
        $time_data = TimeslotModel::all();
        return view('pages.website.pages.placeappoinment.placeappoinment', ['timeSlots' => $time_data]);
    }
    public function placeAppoinment(Request $request)
    {
        // dd($request);
        $request->validate([
            'sId' => 'required',
            'emId' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'time' => 'required',
            'date' => 'required',
            'message' => 'required',
        ]);
        $uId = Auth::id();
        $status = 0;
        NewAppoinmentsModel::create([
            'uId' => $uId,
            'eId' => $request->emId,
            'sId' => $request->sId,
            'tId' => $request->time,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date,
            'message' => $request->message,
            'status' => $status,
        ]);
        return redirect('/services')->with('success', 'Successfully');
    }

    public function letStalk(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        LetstalkModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return $request;
    }

    public function employeeView($id)
    {
        return view('pages.website.pages.employee.employee');
    }

    public function viewGallery()
    {
        $data = ImagegalleryModel::orderBy('created_at', 'desc')->where('status', 1)->get();
        return view('pages.website.pages.gallery.gallery', ['results' => $data]);
    }

    public function letsTalksContacts()
    {
        if (Auth::check()) {
            $result = LetstalkModel::get();
            return view('pages.letstalks.letstalks', ['result' => $result]);
        } else {
            return redirect('/');
        }
    }

    public function alluseradmin()
    {
        if (Auth::check()) {
            $usersWithType2 = UserModel::where('user_type', 2)->get();
            return view('pages.users.users', ['result' => $usersWithType2]);
        } else {
            return redirect('/');
        }
    }
}

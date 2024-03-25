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
use App\Models\Mainservice_has_Product as Has_ProductModel;
use App\Models\Mainservice as MainServicesModel;
use App\Models\Imagegallery as ImagegalleryModel;
use App\Models\Maincatitems as MainItemsModel;
use App\Models\Sellitems as SellitemsModel;
use App\Models\Employee_Education as EmployeeEducationModel;
use App\Models\Employee_Experience as EmployeeExperienceModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

    public function subService($id)
    {
        $subproduct = Has_ProductModel::where('mId', $id)->where('status', 1)->with('Product')->get();



        return view('pages.website.pages.appoinments.subservices', [
            'subproduct' => $subproduct,

        ]);
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
        $time_data = TimeslotModel::all();
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
            'timeSlots' => $time_data
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
            'eId' => 2,
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

    public function addsubservice(Request $request)
    {
        $id = $request->subId;
        $formData = [
            'subId' => $request->subId,
            'name' => $request->name,
            'price' => $request->price,
            'emId' => 0,
            'tId' => 0,
        ];

        $storedData = Session::get('stored_data', []);

        if (!isset($storedData[$id])) {
            $storedData[$id] = $formData;
        }

        Session::put('stored_data', $storedData);
        return response()->json(['formData' => $storedData]);
    }

    public function clearAllServices()
    {
        Session::forget('stored_data');
        return redirect()->back();
    }

    public function deleteSelectedService(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = $data['deActiveId'];
        $storedData = Session::get('stored_data', []);
        if (isset($storedData[$id])) {
            unset($storedData[$id]);
            Session::put('stored_data', $storedData);
        }
        return redirect()->back()->with('success', 'Successfully deactivated');
    }

    public function addEmToService(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = $data['sId'];
        $selectedEmId = $data['selectedEmId'];
        $storedData = Session::get('stored_data', []);
        if (isset($storedData[$id])) {
            $storedData[$id]['emId'] = $selectedEmId;
            Session::put('stored_data', $storedData);
        }
        return $storedData;
    }

    public function addTimetoService(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $id = $data['sId'];
        $selectedTimeId = $data['tId'];
        $storedData = Session::get('stored_data', []);
        if (isset($storedData[$id])) {
            $storedData[$id]['tId'] = $selectedTimeId;
            Session::put('stored_data', $storedData);
        }
        return $storedData;
    }

    public function viewProductCategory()
    {
        $data = MainItemsModel::where('status', 1)->get();
        return view('pages.website.pages.products.products', ['results' => $data]);
    }

    public function viewProducts($id)
    {
        $data = SellitemsModel::where('mcatId', $id)
            ->where('status', '1')
            ->where('qty', '>', 0)
            ->get();
        return view('pages.website.pages.products.items.items', ['results' => $data]);
    }

    public function oneItemView($id)
    {
        $data = SellitemsModel::where('id', $id)->where('status', '1')->first();
        $allitems = SellitemsModel::where('status', '1')
            ->where('qty', '>', 0)
            ->get();
        return view('pages.website.pages.products.items.oneitem', ['result' => $data, 'allitems' => $allitems]);
    }

    public function viewCart()
    {
        $cart = Session::get('cart', []);

        if ($cart) {
            return view('pages.website.pages.products.items.cart');
        } else {
            return redirect('/viewproductcategory')->with('success', 'Please add items to your cart');
        }
    }

    public function addCart($id)
    {
        $vat = 20;
        $subtotal = 250 + $vat;
        $data = SellitemsModel::find($id);
        $cart = Session::get('cart', []);
        $total = Session::get('subtotal', []);

        if (isset($cart[$id])) {
            if ($data->qty > $cart[$id]['quantity']) {
                $cart[$id]['quantity']++;
            } else {
                return redirect()->back()->with('success', 'Stock over');
            }
        } else {
            $cart[$id] = [
                'name' => $data->item,
                'quantity' => 1,
                'price' => $data->price,
                'image' => $data->image,
                'brand' => $data->brand,
                'catId' => $data->mcatId,
                'id' => $data->id,
            ];
        }

        foreach ($cart as $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }
        Session::put('subtotal', $subtotal);
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Successfully added to cart');
    }

    public function reduceCart($id)
    {
        $vat = 20;
        $subtotal = 250 + $vat;
        $data = SellitemsModel::find($id);
        $cart = Session::get('cart', []);
        $total = Session::get('subtotal', []);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }
        foreach ($cart as $item) {
            $subtotal += $item['quantity'] * $item['price'];
        }
        Session::put('subtotal', $subtotal);
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Successfully');
    }

    public function deleteCart(Request $request)
    {
        $reducetotal = 0;
        $subtotal = Session::get('subtotal', []);
        $newSubTotal = 0;
        $data = json_decode($request->getContent(), true);
        $id = $data['deleteId'];
        $storedData = Session::get('cart', []);
        if (isset($storedData[$id])) {
            $reducetotal = $storedData[$id]['quantity'] * $storedData[$id]['price'];
            unset($storedData[$id]);
            Session::put('cart', $storedData);
        }
        $newSubTotal = $subtotal - $reducetotal;
        Session::put('subtotal', $newSubTotal);
        return redirect()->back()->with('success', 'Successfully delete');
    }

    public function viewEmployeProfile($id)
    {
        $data = EmployeeModel::where('id', $id)->first();
        $emp_edu = EmployeeEducationModel::where('emId', $id)->get();
        $emp_exp = EmployeeExperienceModel::where('emId', $id)->get();
        // dd($emp_edu);
        return view('pages.website.pages.employee.employee', [
            'results' => $data,
            'emp_edu' => $emp_edu,
            'emp_exp' => $emp_exp,
        ]);
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

}

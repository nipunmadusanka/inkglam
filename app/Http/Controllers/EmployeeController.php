<?php

namespace App\Http\Controllers;

use App\Models\Employe as EmployeeModel;
use App\Models\Product as ProductModel;
use App\Models\Employee_has_services as EmployeeHasServices;
use App\Models\NewAppoinments as NewAppoinments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class EmployeeController extends Controller
{
    //
    public function viewEmploye()
    {
        if (Auth::check()) {
            $id = Auth::user()->user_type;
            if ($id == 0) {
                $result = EmployeeModel::all();
                return view('pages.employee.employee', ['result' => $result]);
            } else {
                return view('pages.dashboard.dashboard');
            }
        } else {
            return redirect('/');
        }
    }
    public function addEmployee()
    {
        $id = Auth::user()->user_type;
        if ($id == 0) {
            return view('pages.employee.addemployee');
        } else {
            return view('pages.dashboard.dashboard');
        }
    }
    public function editEmploy($id)
    {
        $row = EmployeeModel::find($id);
        $service = ProductModel::where('status', 1)->get();
        $employe_has_service = EmployeeHasServices::where('status', 1)->where('eId', $id)->with('Product')->get();
        return view('pages.employee.editemployee', ['result' => $row, 'service' => $service, 'employee_has_service' => $employe_has_service]);
    }
    public function deleteEmployee(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['deActiveId'];
        $deletItem = EmployeeModel::find($item);
        if ($deletItem) {
            $deletItem->update(['status' => 0]);
            return redirect('/viewemploye')->with('success', 'Employee deleted successfully');
        } else {
            return redirect('/viewemploye')->with('error', 'Employee not found');
        }
    }

    public function activateEmployee(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $item = $data['activeId'];

        $activateItem = EmployeeModel::find($item);
        if ($activateItem) {
            $activateItem->update(['status' => 1]);
            return redirect('/viewemploye')->with('success', 'Employee activated successfully');
        } else {
            return redirect('/viewemploye')->with('error', 'Employee not found');
        }
    }

    public function addNewEmployee(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nic' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user_type = 1;
        $user = User::create([
            'name' => $request->name,
            'nic' => $request->nic,
            'user_type' => $user_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $my_id = $user->id;
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required', 'string', 'lowercase', 'email', 'max:255',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',

        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('employeePhotos'), $imageName);
        // dd($my_id);
        EmployeeModel::create([
            'uId' => $my_id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'position' => $request->position,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $imageName,
        ]);

        return redirect('/viewemploye')->with('success', 'Employe Added Success');
    }
    public function updateEmployee($id, Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required', 'string', 'lowercase', 'email', 'max:255',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',

        ]);

        $employePic = DB::select('select image from employes where id = ?', [$id]);
        foreach ($employePic as $employe) {
            $imageName = $employe->image;
        }
        $checkImage = $request->image;
        if ($checkImage == null) {
        } else {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('employeePhotos'), $imageName);
        }

        $row = EmployeeModel::find($id);
        $row->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'position' => $request->position,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $imageName,
        ]);
        return redirect('/viewemploye')->with('success', 'Employ Update Success');
    }

    public function addServiceToEmployee(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $sId = $data['adddMyId'];
        $emId = $data['emId'];
        $my_id = Auth::id();

        // Check if a record with the given eId and sId already exists in the same row
        $existingRecord = EmployeeHasServices::where('eId', $emId)
            ->where('sId', $sId)
            ->where('status', 1)
            ->exists();

        if ($existingRecord) {
            // Record already exists, return a response message for AJAX
            return response()->json(['message' => 'Record already exists'], 400);
        }

        $existingRecord_notActvive = EmployeeHasServices::where('eId', $emId)
            ->where('sId', $sId)
            ->where('status', 0)
            ->exists();

        if ($existingRecord_notActvive) {
            $existingRecord_notActvive_Row = EmployeeHasServices::where('eId', $emId)
                ->where('sId', $sId)
                ->where('status', 0)
                ->first();
            $existingRecord_notActvive_Row->update(['status' => 1]);
            return response()->json(['message' => 'Record Changed successfully']);
        } else {

            // Record does not exist, create a new one
            EmployeeHasServices::create([
                'admin_Id' => $my_id,
                'eId' => $emId,
                'sId' => $sId
            ]);

            // Return a success response for AJAX
            return response()->json(['message' => 'Record added successfully']);
        }
    }

    public function removeEmployeeInService(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $removeServiceId = $data['removeServiceId'];

        // Attempt to find a single EmployeeHasServices model by its id
        $get_row = EmployeeHasServices::find($removeServiceId);

        // Check if the model was found
        if ($get_row) {
            // If found, update the status
            $get_row->update(['status' => 0]);
            return response()->json(['message' => 'Record Removed successfully']);
        } else {
            // If not found, return an error response
            return response()->json(['message' => 'Employee not found'], 404); // Use 404 for "Not Found"
        }
    }

    public function viewemployeinfo($id)
    {
        $row = EmployeeModel::find($id);
        $employe_has_service = EmployeeHasServices::where('status', 1)->where('eId', $id)->with('Product')->get();
        $myappoinments = NewAppoinments::where('eid', $id)->with('employe')->get();
        return view('pages.employee.viewemploye', [
            'result' => $row,
            'employe_has_service' => $employe_has_service,
            'myappoinments' => $myappoinments
        ]);
    }
}

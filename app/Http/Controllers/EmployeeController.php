<?php

namespace App\Http\Controllers;

use App\Models\Employe as EmployeeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    public function viewEmploye()
    {
        $result = EmployeeModel::all();
        return view('pages.employee.employee', ['result' => $result]);
    }
    public function addEmployee()
    {
        return view('pages.employee.addemployee');
    }
    public function editEmploy($id)
    {
        $row = EmployeeModel::find($id);
        return view('pages.employee.editemployee', ['result' => $row]);
    }
    public function deleteEmployee(EmployeeModel $item)
    {
        $item->delete();
        return redirect('/viewemploye')->with('success', 'Employee deleted successfully');
    }
    public function addNewEmployee(Request $request)
    {
        $my_id = Auth::id();
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
}

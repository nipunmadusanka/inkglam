<?php

namespace App\Http\Controllers;

use App\Models\User as UserModel;
use App\Models\Orders as OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function alluseradmin()
    {
        if (Auth::check()) {
            $usersWithType2 = UserModel::where('user_type', 2)->get();
            return view('pages.users.users', ['result' => $usersWithType2]);
        } else {
            return redirect('/');
        }
    }

    public function viewUserorder($id)
    {
        $data = UserModel::where('id', $id)->where('user_type', '2')->first();
        $user_order = OrderModel::where('uId', $id)->where('status', '1')->get();
        if ($data){
        return view('pages.users.userorder', ['result' => $data, 'user_order' => $user_order]);
        } else {
            return redirect()->back()->with('success', 'That User Data Not Available');
        }
    }
}

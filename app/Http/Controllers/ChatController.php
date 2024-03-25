<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Mychat as MychatModel;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function viewMyChat($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $users = UserModel::all();
            $userdetails = UserModel::where('id', $id)->first();
            $chats = MychatModel::where(function ($query) use ($userId, $id) {
                $query->where('senderid', $userId)
                    ->where('receiveid', $id);
            })->orWhere(function ($query) use ($userId, $id) {
                $query->where('receiveid', $userId)
                    ->where('senderid', $id);
            })->get();

            return view('pages.website.pages.mychat.mychat', [
                'users' => $users,
                'senderid' => $id,
                'getchat' => $chats,
                'userdetails' => $userdetails
            ]);
        } else {
            return redirect('/');
        }
    }

    public function postChat(Request $request)
    {
        $my_id = Auth::id();
        $data = json_decode($request->getContent(), true);
        $mychat = $data['mychat'];
        $receiveid = $data['senderid'];
        MychatModel::create([
            'senderid' => $my_id,
            'receiveid' => $receiveid,
            'message' => $mychat,
        ]);
        return redirect()->back();
    }
}

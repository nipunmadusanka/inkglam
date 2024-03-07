<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewAppoinments as NewAppoinmentsModel;

class AppoinmentController extends Controller
{
    //
    public function appoinmentadmin()
    {
        $appoinment = NewAppoinmentsModel::with('employe')->get();
        return view('pages.appoinments.appoinments', ['result' => $appoinment]);
    }

    public function appoinmentReject(Request $request) {
        $data = json_decode($request->getContent(), true);
        $id = $data['rejectId'];

        // Attempt to find a single NewAppoinmentsModel model by its id
        $get_row = NewAppoinmentsModel::find($id);

        // Check if the model was found
        if ($get_row) {
            // If found, update the status
            $get_row->update(['status' => 2]);
            return response()->json(['message' => 'Record Reject successfully']);
        } else {
            // If not found, return an error response
            return response()->json(['message' => 'Record not found'], 404); // Use 404 for "Not Found"
        }
    }

    public function appoinmentAccept(Request $request) {
        $data = json_decode($request->getContent(), true);
        $id = $data['completedId'];

        // Attempt to find a single NewAppoinmentsModel model by its id
        $get_row = NewAppoinmentsModel::find($id);

        // Check if the model was found
        if ($get_row) {
            // If found, update the status
            $get_row->update(['status' => 1]);
            return response()->json(['message' => 'Record Completed successfully']);
        } else {
            // If not found, return an error response
            return response()->json(['message' => 'Record not found'], 404); // Use 404 for "Not Found"
        }
    }
}
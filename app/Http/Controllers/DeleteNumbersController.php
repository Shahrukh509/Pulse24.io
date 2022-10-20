<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadAssignNumber;
use App\Models\User;
use App\Models\AssignedNumbers;
use Illuminate\Support\Facades\Session;


class DeleteNumbersController extends Controller
{
    public function delete()
    {
        $users = User::where('id','!=',1)->get();

        return view('delete-numbers',compact('users'));
    }

    public function get_ajax(Request $request){
    
    $data = AssignedNumbers::where('users_id',$request->id)->with('assigned')->get();
    // return $data;
    foreach($data as $value) {
        $leads[] =$value->assigned; 
    }

    // return $leads;
    return (string) view('delete-numbers-list',compact('leads'));




    }

    public function deleting(Request $request)
    {

        if (!empty($request->id)) {

            foreach ($request->id as $id) {

                $data = AssignedNumbers::where('upload_assign_numbers_id',$id)->first();
                
                $data->delete();

                $lead = UploadAssignNumber::where('id',$id)->first();
                $lead->status = 1;
                $lead->save();
               
                 }

            Session::flash('message', 'deleted successfully');
                Session::flash('alert-class', 'alert-success');

                return back();
        } else {

            Session::flash('message', 'please select any of the following checkboxes');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }
}

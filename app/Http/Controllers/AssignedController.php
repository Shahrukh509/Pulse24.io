<?php

namespace App\Http\Controllers;

use App\Models\AssignedNumbers;
use App\Models\UploadAssignNumber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AssignedController extends Controller
{
    public function assigned()
    {

        $users = User::get();

        $assigned = UploadAssignNumber::where('status',1)->get();

        

        return view('assigned-numbers', compact('assigned', 'users'));
    }


    public function store(Request $request)
    {

        $user_id = $request->input('user_id');

        if(!empty($user_id ) && !empty($request->data)){

            foreach ($request->data as $datas) {

            $AssignedNumbers = AssignedNumbers::create([
                'users_id' => $user_id,
                 'upload_assign_numbers_id' => $datas
            ]);

            $data = UploadAssignNumber::find($datas);

            $data->status = 0;
            $data->save();


        }


        return redirect()->back()->with('message', 'Task Assigned Added !');



        }
        else{

             Session::flash('message', 'Please select user and lead');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }

        // dd($request->data);

    }


    //  ABOUT LEADS

public function calling(){

    $users = User::where('id','!=',1)->get();

    return view('aboutleads.calling',compact('users'));

}

public function calling_list(Request $request){


    $data = AssignedNumbers::where('users_id',$request->id)->where('type','calling')->get();

    return (string) view('aboutleads.calling_list',compact('data'));

}



public function leads(){

  $users = User::where('id','!=',1)->get();

  return view('aboutleads.leads',compact('users'));
    
}

public function lead_list(Request $request){

    $active = AssignedNumbers::where('users_id',$request->id)->where('type','leads')->where('status','approved')->get();

    $followup = AssignedNumbers::where('users_id',$request->id)->where('type','leads')->where('status','followup')->get();

    return (string) view('aboutleads.lead_list',compact('active','followup'));


}


public function meeting(){

    $users = User::where('id','!=',1)->get();

    return view('aboutleads.meeting',compact('users'));
    
}

public function meeting_list(Request $request){

    $data = AssignedNumbers::where('users_id',$request->id)->where('type','meeting')->where('status','approved')->get();

    return (string) view('aboutleads.meeting_list',compact('data'));


}

public function booking(){


    $users = User::where('id','!=',1)->get();

  return view('aboutleads.booking',compact('users'));

    
}

public function booking_list(Request $request){

    $active = AssignedNumbers::where('users_id',$request->id)->where('type','booking')->where('status','approved')->get();
  $completed = AssignedNumbers::where('users_id',$request->id)->where('type','booking')->where('status','completed')->get();

  $cancel = AssignedNumbers::where('users_id',$request->id)->where('type','booking')->where('status','cancel')->get();
  
  return (string) view('aboutleads.booking_list',compact('active','completed','cancel'));

}

    // END ABOUT LEADS
}

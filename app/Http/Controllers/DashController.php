<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UploadAssignNumber; 
use App\Models\AssignedNumbers; 
use Auth;
use App\Models\CompanyRequest;
use Illuminate\Support\Facades\Session;
class DashController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth:sanctum');
    }

    public function view()
    {

        // echo '<script>alert("hi")</script>';

        if(Auth::user()->role_id == 1){

        $total_leads = count(UploadAssignNumber::all());
        $total_emp = User::where('name','!=','admin')->get()->count();
        $process_leads = UploadAssignNumber::where('status',0)->get()->count();

        $users = User::all();
        $meeting_user = User::where('id','!=',1)->get();
        $get_name =[];
        foreach($meeting_user as $name){

          $get_name[]= $name->name; 

        }

        // print_r(json_encode($get_name));exit; 
        // print_r(json_encode($get_name));exit;
        $meeting_count = [];
        foreach($meeting_user as $data){
  
       $meeting_count[] = count($data->meetingStatus);

        }
        // print_r(json_encode($meeting_count));exit;
        $dataPoints = [];

        foreach ($users as $user) {

            // dd($user->meetingStatus);
            if($user->name != 'admin'){

                // dd(count($student->assigned_leads_completed));
            
            $dataPoints[] = array(
                "name" => $user['name'],
                "data" => [
                    intval(count($user->assigned_leads_completed)),
                    intval(count($user->assigned_leads_rejected)),
                    intval(count($user->assigned_leads_pending)),
                    ],
    
            );

            $dataPointsMeeting[] = array(
                "name" => $user['name'],
                "data" => intval(count($user->meetingStatus)),
    
            );

        }
    }




        return view('dashboard',[
            "data" => json_encode($dataPoints),
            "count" => json_encode($meeting_count),
            "name" => json_encode($get_name),
            "terms" => json_encode(array(
                "Completed",
                "Rejected",
                "Pending",
            )),

            "total_leads" => $total_leads,
            "total_emp" => $total_emp,
            "process_leads" => $process_leads,
            
        ]);
    }

    if(Auth::user()->role_id == 11 && Auth::user()->name=='superadmin'){



        $data['pending'] = CompanyRequest::where('status',0)->count();

       
        $data['active']=CompanyRequest::where('status',1)->count();

        $data['all']=CompanyRequest::all()->count();
         // dd($data['all']);

         // dd('at superadmin');

        return view('dashboard',$data);

       }

            // FOR USER DASHBOARD

    else{

          $user = User::where('id',Auth()->user()->id)->first();
        $dataPoints = [];


                // dd(count($student->assigned_leads_completed));
            
            $dataPoints[] = array(
                "name" => $user['name'],
                "data" => [
                    intval(count($user->assigned_leads_completed)),
                    intval(count($user->assigned_leads_rejected)),
                    intval(count($user->assigned_leads_pending)),
                    
                ],
            );

            $data= json_encode($dataPoints);

            $terms = json_encode(array(
                "Completed",
                "Rejected",
                "Pending",
            )); 
    
            $emp_process_leads = AssignedNumbers::where('users_id', Auth::user()->id)->where('status', 'pending')->get()->count();
            $emp_total_emp = User::where('linemanager_id', Auth::user()->id)->get()->count();
            $emp_total_leads = AssignedNumbers::where('users_id', Auth::user()->id)->get()->count();



            // dd($emp_total_leads);


            return view('employees.dashboard', compact('emp_process_leads', 'emp_total_emp', 'emp_total_leads','data','terms'));
        }


    //     Session::flash('message','You are not admin');
    //Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


    //    auth()->guard('web')->logout();
    //    return redirect()->route('login');
    // }
}
}


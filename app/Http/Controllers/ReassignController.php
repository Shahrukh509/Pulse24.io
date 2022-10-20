<?php

namespace App\Http\Controllers;

use App\Models\AssignedNumbers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReassignController extends Controller
{
    public function reassign()
    {

        $users = User::get();
        return view('reassign-numbers', compact('users'));
    }



    public function getassign(Request $request)
    {

        $users = User::get();


        $data = AssignedNumbers::where('users_id', $request->user_id)->get();


        return (string) view('search_reassign', compact('data', 'users'));
    }


    public function get_assign_user(Request $request){

     $data = User::where('id','!=',$request->id)->get();

     return response([
        'data' => $data
    ]);

    }

    public function update(Request $request)
    {

        // print_r($request->);exit;

        try{

        if (!empty($request->user_id)) {
            foreach ($request->lead_ids as $id) {


                $update = AssignedNumbers::where('id',$id)->first();



                $update->users_id = $request->user_id;


                $update->save();

              
            }

              // Session::flash('message', 'Data has ben re-assigned');
              //   Session::flash('alert-class', 'alert-success');

            if($update){

                echo json_encode([
                    'success' => true
                ]);
            }


        } else {

            // Session::flash('message', 'no data to re-assign');
            // Session::flash('alert-class', 'alert-danger');


            echo json_encode([
                    'success' => false
                ]);
        }
    }
    catch(\Exception $e){

        echo json_encode($e);
    }
}
}

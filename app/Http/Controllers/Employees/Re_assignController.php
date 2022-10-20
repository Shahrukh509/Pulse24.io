<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\AssignedNumbers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Re_assignController extends Controller
{
    public function view()
    {

        $users =  User::where('linemanager_id', Auth::user()->id)->get();

        return view('employees.reassign-numbers', compact('users'));
    }

    public function getassign(Request $request)
    {

        $users =  User::where('linemanager_id', Auth::user()->id)->get();


        $data = AssignedNumbers::where('users_id', $request->user_id)->get();


        return (string) view('employees.search_reassign', compact('data', 'users'));
    }

    public function update(Request $request)
    {

        if (!empty($request->data)) {
            foreach ($request->data as $id) {


                $update = AssignedNumbers::find($id);



                $update->users_id = $request->user_id;


                $update->save();

                Session::flash('message', 'Data has ben re-assigned');
                Session::flash('alert-class', 'alert-success');

                return back();
            }
        } else {

            Session::flash('message', 'no data to re-assign');
            Session::flash('alert-class', 'alert-danger');


            return back();
        }
    }
}

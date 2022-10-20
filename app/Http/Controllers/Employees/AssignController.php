<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\AssignedNumbers;
use App\Models\UploadAssignNumber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AssignController extends Controller
{
    public function view()
    {

        $users =  User::where('linemanager_id', Auth::user()->id)->get();

        $csv =  AssignedNumbers::where('users_id', Auth::user()->id)->where('status', 1)->get();

        // dd($csv);

        return view('employees.assigned-numbers', compact('users', 'csv'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $user_id = $request->input('user_id');

        if (!empty($user_id) && !empty($request->data)) {

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
        } else {

            Session::flash('message', 'Please select user and lead');
            Session::flash('alert-class', 'alert-danger');

            return back();
        }

        // dd($request->data);

    }
}

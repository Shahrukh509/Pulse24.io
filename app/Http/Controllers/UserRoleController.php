<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function roles()
    {

        $roles = UserRole::get();



        return view('roles', compact('roles'));
    }



    public function store(Request $request)
    {

        $role = $request->input('role');



        $UserRole = UserRole::create([
            'name' => $role
        ]);



        // $allPrivacy_policy = Privacy_policy::all();

        return redirect()->back()->with('message', 'Role Added !');
    }


    public function update(Request $request)
    {



        $update = UserRole::where('id', $request->role_id)->first();

        $update->name = $request->role;

        $update->save();
        return back();
    }
}

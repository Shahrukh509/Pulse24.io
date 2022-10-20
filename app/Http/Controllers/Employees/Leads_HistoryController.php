<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\AssignedNumbers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Leads_HistoryController extends Controller
{
    public function view()
    {
        $users =  User::where('linemanager_id', Auth::user()->id)->get();
        return view('employees.leads-history', compact('users'));
    }


    public function getLeads(Request $request)
    {

        $data = AssignedNumbers::where('users_id', $request->user_id)->where('status', $request->status)->get();
        return (string) view('employees.search', compact('data'));
    }
}

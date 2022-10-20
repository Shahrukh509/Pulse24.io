<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AssignedNumbers;
use Illuminate\Http\Request;

class LeadsHistoryController extends Controller
{
    public function history()
    {

        $users = User::get();

        return view('leads-history', compact('users'));
    }


    public function getLeads(Request $request)
    {

        $data = AssignedNumbers::where('users_id', $request->user_id)->where('status', $request->status)->get();
        return (string) view('search', compact('data'));
    }
}

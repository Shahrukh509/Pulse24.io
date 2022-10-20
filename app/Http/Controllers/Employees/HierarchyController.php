<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\AssignedNumbers;
use Illuminate\Http\Request;

class HierarchyController extends Controller
{
    public function view()
    {

        return view('employees.structureview');
    }

    public function search_history($id)
    {


        $data['search'] = AssignedNumbers::where('users_id', $id)->get();

        return view('employees.search_structureview', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AssignedNumbers;

class HierarchyStructureController extends Controller
{
    public function hierarchy()
    {
        $admin = User::where('id',1)->first();
        $all_users= User::where('role_id','!=',1)->get();
        $data = [];
        $data2 = [];

        // foreach($all_users as  $value) {

          // foreach($value->structured as $sec){
          //   $data2[] = $sec;


          // }
          
        //   $data[] = $value->structured;    
          
        // }
        // print_r($data);exit;
          


        return view('hierarchystructure.structureview', compact('admin','all_users'));
    }

    public function search_history($id){
      

      $data['search'] = AssignedNumbers::where('users_id',$id)->get();

      return view('hierarchystructure.search_structureview',$data);

    }
}

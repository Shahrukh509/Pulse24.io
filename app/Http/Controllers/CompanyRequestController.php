<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Session;
use App\Models\CompanyRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CompanyRequestController extends Controller
{
    public function show(){

        $data['countries'] = Country::all();

    return view('create-company',$data);
    }

    public function add(Request $request){

        $validate = Validator::make($request->all(),[

         'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
         'name' => 'required|unique:company_requests,name|unique:users',
         'phone' => 'required|numeric|min:2|starts_with:+,+|unique:company_requests|unique:users',
         'email' => 'required|email| unique:company_requests',
         'company_type' => 'required',
         'country_id' => 'required'
        ]);
        if(!$validate->passes()){

          return response()->json([
          'status' => false,
          'error' => $validate->errors()->toArray()]);  
        }
        else{   
            // ADDING DATA AFTER SUCCESSFUL VALIDATION

         if(isset($request->image)){
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(public_path('images/company'), $image);

           $path = url('/').'/public/images/company/'.$image;

        }

          $data = CompanyRequest::create([
            'image' => $path?? null,
            'name' => $request->name,
            'email' => $request->email,
            'company_type' => $request->company_type,
            'country_id' => $request->country_id,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
          if($data){

           return response()->json([
            'status' => true
        ]);

          }else{

             return response()->json([
            'status' => false,
            'message' => 'unable to add data'
        ]);

        }

        }
        
      }

    public function update(Request $request){

        // dd($request->username);

        $validator = Validator::make($request->all(),[

          'username' => 'required|unique:users|min:3',
         'password' => 'required|min:6'
         ]);

        if(!$validator->passes()){

            return response()->json([
                'status' => false,
                'error' => $validator->errors()->toArray()
            ]);
        }
        else{

         $company = CompanyRequest::where('id',$request->id)->first();

         // updating company status from 0 to 1 as company is going to be approved by superadmin

         $company->status = 1;
         $company->save();

         // ending of saving company status

         // now creating company in user table who will be admin itself in order to manage their employee

         $user = User::create([

          'admin_id' => 0,
          'name' => $company->name,
          'role_id' => 1,
          'country_id' => $company->country_id,
          'phone' => $company->phone,
          'address' => $company->address,
          'image' => $company->image,
          'email' => $company->email,
          'username' => $request->username,
          'password' => Hash::make($request->password)

         ]);

          // ending of creating user

         if($user && $company){
          return response()->json([
            'status' => true
        ]);
      }

          else{

            return response()->json([
            'status' => false
        ]);

          }

        }

    }

    public function request_show(){


        $data = CompanyRequest::where('status',0)->orderBy('id','DESC')->get();

        // dd($data);

        return view('request_company',compact('data'));
    }


     public function approved_company(){


        $data = CompanyRequest::where('status',1)->orderBy('id','DESC')->get();

        dd($data);

        return view('request_company',compact('data'));
    }


    public function delete($id){

        $data = CompanyRequest::where('id',$id)->first();
        $data->delete();
        if($data){
             Session::flash('message','Company has been deleted');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-success');

            return back();

        }else{

              Session::flash('message','Failed to delete Company');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


        }


        return back();




    }

}

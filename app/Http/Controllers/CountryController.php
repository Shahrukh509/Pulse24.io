<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    public function show(){

        $data['countries'] = Country::all();

    return view('country',$data);
    }

    public function add(Request $request){

        $request->validate([

         'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
         'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|unique:countries,name',
         'country_code' => 'required|numeric|min:1|max:3|starts_with:+,+|unique:countries',
         'short_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|unique:countries,short_name'
        ]);
        if(isset($request->image)){
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(public_path('images/country'), $image);

           $path = url('/').'/public/images/country/'.$image;

        }

                  // $path = public_path('/images/Country/').$image;
          // print_r(url('/'));exit;
          $data = Country::create([
            'image' => $path?? null,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'country_code' => $request->country_code
        ]);
          if($data){

            Session::flash('message','Country has been added');
    





Session::flash('success','alert-success');

            return back();

          }else{

            Session::flash('message','Failed to upload Country');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


          }
      }

    public function update(Request $request){

        // dd($request);

        $request->validate([

          'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
         'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
         'country_code' => 'required|min:2|max:4|starts_with:+,+',
         'short_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/'
         ]);

     $data = Country::where('id',$request->id)->first();

     // dd($request->id);

     if(isset($request->image)){

        $image = time() . '.' . $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(public_path('images/country'), $image);

          $image = url('/').'/public/images/country/'.$image;


          // dd($path);
          $data->image = $image;

     }

     $data->name = $request->name;
     $data->short_name = $request->short_name;
     $data->country_code = $request->country_code;
    
    
   
     $data->save();
     if($data){

         Session::flash('message','Country has been updated');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-success');

            return response([
                'success' => true
            ]
                ,200);

      }else{

        Session::flash('message','Failed to update Country');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


            return response([
                'message' => false
            ]);




     }




    }
    public function delete($id){

        $data = Country::where('id',$id)->first();
        $data->delete();
        if($data){
             Session::flash('message','Country has been deleted');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-success');

            return back();

        }else{

              Session::flash('message','Failed to delete Country');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


        }


        return back();




    }

}

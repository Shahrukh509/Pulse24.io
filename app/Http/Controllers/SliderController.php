<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;


class SliderController extends Controller
{
    public function show()
    {

     $data['slider'] = Slider::all();

    return view('slider',$data);


    }

    public function add(Request $request){

        $request->validate([

         'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
         'status' => 'required'
        ]);

        $image = time() . '.' . $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(public_path('images/slider'), $image);

           $path = url('/').'/public/images/slider/'.$image;          // $path = public_path('/images/slider/').$image;
          // print_r(url('/'));exit;
          $data = Slider::create([
            'images' => $image,
            'path' => $path,
            'status' => $request->status
        ]);
          if($data){

            Session::flash('message','Slider has been added');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-success');

            return back();

          }else{

            Session::flash('message','Failed to upload slider');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


          }
      }

    public function update(Request $request){

        // dd($request);

     $data = Slider::where('id',$request->id)->first();

     // dd($request->id);

       $image = time() . '.' . $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(public_path('images/slider'), $image);

          // $path = public_path('/images/slider/').$image;
          $path = base_path().'/public/images/slider/'.$image;

          // dd($path);



     $data->images = $image;
     $data->path = $path;
     $data->status = $request->status;
     $data->save();
     if($data){

         Session::flash('message','Slider has been updated');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-success');

            return response([
                'success' => true
            ]
                ,200);

      }else{

        Session::flash('message','Failed to update slider');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


            return response([
                'message' => false
            ]);




     }




    }
    public function delete($id){

        $data = Slider::where('id',$id)->first();
        $data->delete();
        if($data){
             Session::flash('message','Slider has been deleted');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-success');

            return back();

        }else{

              Session::flash('message','Failed to delete slider');
       Session::flash('alert-class','alert-danger')





Session::flash('success','alert-danger');


        }


        return back();




    }

}

<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    public function login(Request $request){
      
          // return response()->json($request);
       // $user = User::where('email',$request->email)->first();

       //  $data = Hash::check($request->password, $user->password);
       //  if (empty($user) || !$data)
       //  {
       //      return response()->json(['message' => 'Unauthorized'], 401);
       //  }
         if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'You have logged in successfully dear '.$user->name.', welcome to dashboard','access_token' => $token,
             'token_type' => 'Bearer',
             'details' => $user 
         ],200);
    }

    public function checking_otp(Request $request){

      if(!empty($request->otp)){

                $data = DB::table('password_resets')->where('otp',$request->otp)->first();
                if($data){


                    Session::put('email',$data->email);

                    
                    return response()->json([
                     'success' => true,   
                    'message' => 'otp is valid now you can change your password',
                    'email' => $data->email
                ],200);
                }
                else{
                 return response()->json([
                     'success' => false,   
                    'message' => 'otp is invalid or record does not exist'
                ],401);  


                }




            } else{

                return response()->json([
                     'success' => false,   
                    'message' => 'please provide otp!'
                ],404);


            }

    }


    public function resetting_password(Request $request){
     

        $request->validate([
    
       'password' => 'required|confirmed|min:6',
       ]);

           $email = null;
          if(Session::has('email'))
         {
        $email = Session::get('email');
        Session::forget('email'); 
         }else{

        return response()->json([
            'success' => false,
            'message' => 'please get your otp again by clicking on forget password']);
    }

        $data = User::where('email',$email)->first();

        $data->password = Hash::make($request->password);
        $data->save();

        if($data){

         DB::table('password_resets')->where('email',$email)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Your password has been reset kindly Login again'],200);
    }else{
      
      return response()->json([
            'success' => false,
            'message' => 'Failed to reset password']);

    }

    }


    
    


     public function logout(Request $request)
    {
        Auth::user()->token()->delete();

        return response()->json([
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ]);
    }


}

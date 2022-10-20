<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class UsersController extends Controller
{
    public function users()
    {



        $users = User::get();




        return view('reg-users', compact('users'));
    }

    public function create()
    {

        $line_manager = User::all();

        $roles = UserRole::get();

        $countries = Country::all();

        return view('create-users', compact('roles', 'line_manager','countries'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone' => 'required|numeric|min:4|starts_with:+,+|unique:users,phone',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6'
        ]);

        if (isset($request->image)) {

            // $imageName = time() . '.' . $request->image->extension();

            // $request->image->move(public_path('images'), $imageName);

            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(public_path('images'), $image);

           $path = url('/').'/public/images/'.$image;

            // $name = $request->input('name');
            // $email = $request->input('email');
            // $phone = $request->input('phone');
            // $address = $request->input('address');
            // $linemanager_id = $request->input('linemanager_id') ?? 1;
            // $role_id = $request->input('role_id');
            // $username = $request->input('username');

            // $password = $request->input('password');

            // $hashed = Hash::make($password);




            // $User = User::create([
            //     'name' => $name, 'image' => $imageName, 'email' => $email, 'phone' => $phone, 'address' => $address, 'linemanager_id' => $linemanager_id, 'role_id' => $role_id, 'username' => $username, 'password' => $hashed
            // ]);

            
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $linemanager_id = $request->input('linemanager_id') ?? 1;
        $role_id = $request->input('role_id');
        $username = $request->input('username');

        $password = $request->input('password');

        $hashed = Hash::make($password);




        $User = User::create([
            'name' => $name, 'admin_id' => Auth()->user()->id, 'email' => $email, 'image' => $path?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_n8S7xL7Dj4kwLdYSN_Yg5Sut25gIoEqWCQ&usqp=CAU', 'phone' => $phone, 'address' => $address, 'linemanager_id' => $linemanager_id, 'role_id' => $role_id, 'username' => $username, 'password' => $hashed,'country_id' => $request->country_id
        ]);



        Session::flash('message','User has been registered');
Session::flash('success','alert-success');


            return back();
    }

    public function edit(Request $request, $id)
    {

        
        


        $edit = User::find($id);

        $roles = UserRole::get();

        $line_manager = User::where('linemanager_id', null)->get();


        return view('create-users_edit', compact('roles', 'edit', 'line_manager'));
    }


    function update(Request $request, $id)
    {
         $update = User::find($id);
        // dd($request->Description);

        if($request->email !== $update->email){

        $request->validate([

            'email' => 'required|email|unique:users']);
         }

         if($request->phone !== $update->phone){

        $request->validate([

            'phone' => 'required|numeric|min:4|starts_with:+,+|unique:users,phone']);
         }

         if($request->username !== $update->username){

        $request->validate([

            'username' => 'required|unique:users,username']);
         }

         if(isset($request->password)){

            $request->validate([
                'password' => 'required|min:6']);

            $update->password = Hash::make($request->password);
            $update->save();
         }

       



        $update->name = $request->name;
        $update->admin_id = Auth()->user()->id;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->linemanager_id = $request->linemanager_id;
        $update->role_id = $request->role_id;
        $update->username = $request->username;

        $update->save();
        if($update){

            Session::flash('message','User has been updated');

         Session::flash('success','alert-success');
            return redirect('/users');

        }else{

            Session::flash('message','User not updated');
           ;

            return back();


        }

        
    }



    public function delete(Request $request, $id)
    {
        $delete = User::find($id);


        if ($delete) {

            $delete->delete();

            return redirect('/users');
        } else {

            return response()->json(['message' => 'Failed '], 404);
        }
    }

    public function user_profile(){

    $user = User::where('id',Auth()->user()->id)->first();
    $country = Country::all();

    if(Auth()->user()->role_id ==1 || Auth()->user()->role_id ==11 ){
     return view('profile',compact('user','country'));

    }else{

     return view('employees.profile',compact('user','country'));

    }

   
    }

    public function user_profile_update(Request $request){
    $update = User::find(Auth()->user()->id);

    if($update->phone != $request->phone){

        $request->validate([

        'phone' => 'required|numeric|min:4|starts_with:+,+|unique:users,phone'
    ]);


    }
    $request->validate([

        'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        'country_id' => 'required'
    ]);

    if (isset($request->image)) {

            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();

          $request->file('image')->move(public_path('images/profile'), $image);

           $path = url('/').'/public/images/profile/'.$image;

            $update->image = $path;

            
        }

        $update->name = $request->name;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->country_id = $request->country_id;

        $update->save();

        if($update){

          Session::flash('message','User has been updated');
           
            Session::flash('success','alert-success');

            return back();
        }else{

            Session::flash('message','User unable to update');
            Session::flash('error','alert-danger');

            return back();


        }


    }


    public function markread(Request $request,$id=null){

    if($request->ajax()){

      // dd('hiiii');
        $data = Auth()->user()->notifications->where('id',$request->id)->markAsRead();
        $count = Auth::user()->unreadNotifications()->count();

    // if($data){
        return response()->json([
        'success' => true,
        'count' => $count
        ]);

    // }else{
    //    return response()->json([
    //     'success' => false
    //     ]);


    // }


    }

    if($id){

     Auth()->user()->notifications->where('id',$id)->markAsRead();
     return back();
    }
    }

    public function notifications_list(){
     
     $data = Auth()->user()->notifications()->orderBy('id','desc')->get();

     if(Auth()->user()->role_id == 1 || Auth()->user()->role_id == 11 ){
      
      return view('notification-list',compact('data'));

     }
     else{

        return view('employees.notification-list',compact('data'));

     }
     



    

    }

//     public function add_superadmin(){

//         $user = User::create([
//         'name' => 'king',
//         'admin_id' => 0,
//         'role_id' => 3,
//         'country_id' => 1,
//         'phone' => '+926678766363',
//         'address' => 'orangi and korangi town',
//         'username' => 'king',
//         'email' => 'king@king.com',
//         'password' => Hash::make('rootadmin')
//                ]);
//         if($user){
//         return 'successfully added';
//         }else{

//         return "error";
//         }
    


// }
}

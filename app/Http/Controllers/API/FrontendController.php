<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\AssignedNumbers;
use App\Models\UploadAssignNumber;
use App\Models\User;
use App\Models\MeetingStatus;
use App\Models\Country;
use App\Models\Slider;
use App\Models\Dialogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Notifications\UserLeadNotification;

    class FrontendController extends Controller
    {

    
    public $admin;

    public function __construct(){


       $this->admin = User::where('id',1)->first();
    }


    // DEALING WITH CALLING 

    public function get_all_slider_images(){

    $data = Slider::all();

    return response()->json([
    'success' => true,
    'data' => $data,
    ],200);
    }

    public function get_user_calling_data(){

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('type','calling')->with('assigned')->get();

    foreach($data as $data){

    $calling[] = $data->assigned;
    }

    if(!empty($calling)){

    return response()->json([
    'success' => true,
    'data' => $calling,
    ],200);


    }else{

    return response()->json([
    'success' => false,
    'message' => 'no record exist',
    'data' => []
    ],200);


    }


    }


    public function calling_data_by_id(Request $request){

    $data = UploadAssignNumber::where('id',$request->id)->with('assigned_numbers')->first();
    if($data){
    return response()->json([
    'success' => true,
    'data' => $data,
    ],200);
    }
    else{

    return response()->json([
    'success' => false,
    'message' => 'no record found',
    'data' => []
    ],200);


    }

    }


    public function assigned_status(Request $request){

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();

    // checking if requested customer is in record
    if($data){  

    if($request->type == 'backtoassign'){

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();

    // NOTIFICATION 

     $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$request->type,$request->status,Auth()->user()->id));

    // END NOTFICATION

    $data->delete();
    $change_status = UploadAssignNumber::where('id',$request->id)->first();
    $change_status->status = 1;
    $change_status->save();
   
    if($change_status) {
    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);

    }  

    }
    $data->type = $request->type;
    $data->status = 'approved';
    $data->remarks = $request->remarks??null;
    $data->save();
    if($data){

    // NOTIFICATION 

     $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$request->type,'approved',Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);



    }else{
    return response()->json([
    'success' => false,
    'message' => 'Failed to assign data',
    'data' => []
    ],200);


    }
    } //end of checking if requested customer is in record
    else{

    return response()->json([
    'success' => false,
    'message' => 'requested lead is not in record',
    'data' => []
    ],200);


    }


    }               // END DEALING WITH CALLING 



    // DEALING WITH LEADS 
    public function get_user_leads_data($status){



    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('type','leads')->where('status',$status)->with('assigned')->get();

    foreach($data as $data){

    $leads[] = $data->assigned;
    }

    if(!empty($leads)){

    return response()->json([
    'success' => true,
    'data' => $leads,
    ],200);


    }else{

    return response()->json([
    'success' => false,
    'message' => 'no record exist',
    'data' => []
    ],200);


    }


    }

    public function leads_data_by_id($id){

    $data = UploadAssignNumber::where('id',$id)->with('assigned_numbers')->first();
    if($data){
    return response()->json([
    'success' => true,
    'data' => $data,
    ],200);
    }else{

    return response()->json([
    'success' => false,
    'message' => 'data not available',
    'data' => []
    ],200);


    }


    }

    public function assigned_status_leads(Request $request){

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();


    // checking if requested customer is in record
    if($data){

    if($request->type == "followup"){

    $datas = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();
    $datas->status = 'followup';
    $datas->type = 'leads';
    $data->remarks = $request->remarks??null;
    $datas->save();
    if($datas) {

         // NOTIFICATION 

     $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$datas->type,$datas->status,Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);

    } 
    }  

    if($request->type === 'backtoassign'){

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();

    // NOTIFICATION 

     $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$request->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    $data->delete();
    $change_status = UploadAssignNumber::where('id',$request->id)->first();
    $change_status->status = 1;
    $change_status->save();
    if($change_status) {
    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);

    }  

    }
    if($request->type === 'meeting'){

    $data->type = 'meeting';
    $data->status = 'approved';
    $data->remarks = $request->remarks??null;

    $MeetingStatus = MeetingStatus::create([
        'user_id' =>Auth()->user()->id,
        'lead_id' => $request->id
    ]);

    $data->save();
    if($data && $MeetingStatus){

        // NOTIFICATION 

     $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$request->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);



    }
    else{
    return response()->json([
    'success' => false,
    'message' => 'Failed to assign data',
    'data' => []
    ],200);


    }
    }
    } //end of checking if requested customer is in record
    else{

    return response()->json([
    'success' => false,
    'message' => 'requested lead is not in record',
    'data' => []
    ],200);


    }

    }
    
    // public function get_user_leads_followup(){
        
        
    // }


                                                                 // End DEALING WITH LEADS

                                                                    // start of MEETING


    public function get_user_meeting_data(){

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('type','meeting')->where('status','approved')->with('assigned')->get();

    foreach($data as $data){

    $leads[] = $data->assigned;
    }

    if(!empty($leads)){

    return response()->json([
    'success' => true,
    'data' => $leads,
    ],200);


    }else{

    return response()->json([
    'success' => false,
    'message' => 'no record exist',
    'data' => []
    ],200);


    }

    }

    public function leads_meeting_by_id($id){

    $data = UploadAssignNumber::where('id',$id)->with('assigned_numbers')->first();
    if($data){
    return response()->json([
    'success' => true,
    'data' => $data,
    ],200);
    }else{

    return response()->json([
    'success' => false,
    'message' => 'data not available',
    'data' => []
    ],200);


    }


    }

    public function assigned_status_meeting(Request $request){

    // dd($request->id);
    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();

    // checking if requested customer is in record

    // dd($data);
    if($data){ 




    if($request->type == 'backtoassign'){

    // dd($data->type);

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();

    // NOTIFICATION 

     $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$request->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    $data->delete();
    $change_status = UploadAssignNumber::where('id',$request->id)->first();
    $change_status->status = 1;
    $change_status->save();
    if($change_status) {
    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);

    }  

    }

    if($request->type == 'booking'){

    // dd('hi');

    $data->type = $request->type;
    $data->status = 'approved';
    $data->remarks = $request->remarks??null;
    $data->save();
    if($data){

        // NOTIFICATION 

     $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$request->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);



    }else{
    return response()->json([
    'success' => false,
    'message' => 'Failed to assign data',
    'data' => []
    ],200);


    }
    }
    }                                           //end of checking if requested customer is in record
    else{

    return response()->json([
    'success' => false,
    'message' => 'requested data is not in record',
    'data' => []
    ],200);


    }



    }


                                                                     // end of MEETING




                                                                     // start of BOOKING


    public function get_user_booking_data($status){
    // Auth()->user()->id

    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('type','booking')->where('status',$status)->get();
    // dd($data);

    foreach($data as $data){
        
    
    $leads[] = $data->assigned;
    
    
    }

    if(!empty($leads)){

    return response()->json([
    'success' => true,
    'data' => $leads,
    ],200);


    }else{

    return response()->json([
    'success' => false,
    'message' => 'no record exist',
    'data' => []
    ],200);


    }


    }
            //   I ahve added with in it
    public function booking_by_id($id){

    $data = UploadAssignNumber::where('id',$id)->with('assigned_numbers')->first();
    if($data){
    return response()->json([
    'success' => true,
    'data' => $data,
    ],200);
    }else{

    return response()->json([
    'success' => false,
    'data' => 'data not available',
    ],200);


    }


    }

    public function assigned_status_booking(Request $request){

    // dd($request->id);
    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('upload_assign_numbers_id',$request->id)->first();

    // checking if requested customer is in record

    // dd($data);
    if($data){ 




    if($request->type == 'completed'){

    // dd($data->type);

    $data->type = 'booking';
    $data->status = 'completed';
    $data->remarks = $request->remarks??null;
    $data->save();
    if($data){

        // NOTIFICATION

         $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$data->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);



    }else{
    return response()->json([
    'success' => false,
    'message' => 'Failed to assign data',
    'data' => []
    ],200);
    }
    }

    if($request->type == 'cancel'){

    // dd('hi');

    $data->type = 'booking';
    $data->status = 'cancel';
    $data->remarks = $request->remarks??null;
    $data->save();
    if($data){

       // NOTIFICATION

         $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$data->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);



    }else{
    return response()->json([
    'success' => false,
    'message' => 'Failed to assign data',
    'data' => []
    ],200);


    }
    }
    if($request->type == 'active'){

    // dd('hi');

    $data->type = 'booking';
    $data->status = 'approved';
    $data->remarks = $request->remarks??null;
    $data->save();
    if($data){

        // NOTIFICATION

         $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$data->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully assigned'
    ],200);



    }else{
    return response()->json([
    'success' => false,
    'message' => 'Failed to assign data',
    'data' => []
    ],200);


    }
    }
    } //end of checking if requested customer is in record
    else{

    return response()->json([
    'success' => false,
    'mwssage' => 'requested data is not in record',
    'data' => []
    ],200);


    }



    // end of Booking

    }
    
    
            //  COUNTRy DATA FOR EVENT
    
    
    public function all_countries(){
        
        $data = Country::all();
        if($data){
            
            return response()->json([
    'success' => true,
    'status' => 'all countries',
    'data' => $data
    ],200);
            
            
            
        }else{
            
             return response()->json([
    'success' => false,
    'message' => 'no data exist',
    'data' => []
    ],200);
            
            
            
        }
    }
     
    
    public function get_country_by_code($code){

        
    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('type','event')->where('status','approved')->get();
  
    foreach($data as $data){
        if($data->assigned->country_code == $code)

            $country[] = $data->assigned;
        
  }
 

    

    if(!empty($country)){

    return response()->json([
    'success' => true,
    'data' => $country,
    ],200);


    }else{

    return response()->json([
    'success' => false,
    'message' => 'no record exist',
    'data' => []
    ],200);


    }
        
        
    }
    
    public function get_country_data_by_id($id){

        
     $data = UploadAssignNumber::where('id',$id)->first();
    if($data){
    return response()->json([
    'success' => true,
    'data' => $data,
    ],200);
    }
    else{

    return response()->json([
    'success' => false,
    'message' => 'no record found',
    'data' => []
    ],200);


    }

        
        
    }
    
    public function edit_remarks(Request $request){
     
     // dd($request->id);
    $data = AssignedNumbers::where('users_id',Auth()->user()->id)->where('id',$request->id)->first();

    // checking if requested customer is in record

    // dd($data);
    if($data){ 

    $data->remarks = $request->remarks;
    $data->save();
    if($data){

        // NOTIFICATION

        //  $this->admin->notify(new UserLeadNotification(Auth()->user()->name,$data->type,$data->status,Auth()->user()->id));

    // END NOTFICATION

    return response()->json([
    'success' => true,
    'status' => 'Successfully update remarks'
    ],200);

    }
    else{
    return response()->json([
    'success' => false,
    'message' => 'Failed to assign data',
    'data' => []
    ],200);

    }
    }
    }
    
    public function get_dialogue(Request $request){
        
        
        // dd($request->id);
    
    $data = Dialogue::where('user_id',Auth()->user()->id)->get();
    
    $detail=[];
    
    if(!count($data) < 1 ){
    
    foreach($data as $details){
    
    $detail['name'] = $details->customers->name;
    $detail['phone'] = $details->customers->phone;
    }
    
     return response()->json([
    'success' => true,
    'message' => 'details have been fetched',
    'data' => $detail
    ],200);
    
    
        
    }
    
    else{
        
     return response()->json([
    'success' => false,
    'message' => 'No record exist in dialogue',
    'data' => []
    ],200);

        
    }
        
        
    }
    
     public function add_dialogue(Request $request){
      
     $data = Dialogue::where('user_id',Auth()->user()->id)->first();
     if($data){
         return response()->json([
    'success' => false,
    'message' => 'Record already exist',
    'data' => $data
    ],200);
         
     }else{
      
      $data = Dialogue::create([
          'user_id' => Auth()->user()->id,
          'upload_assign_numbers_id' => $request->id
          ]);
         if($data){
              return response()->json([
    'success' => true,
    'message' => 'Dialogue has been added',
    'data' => $data
    ],200);
         
             
    }
     else{
             
            return response()->json([
    'success' => false,
    'message' => 'request has some issue data can not be added at the moment',
    'data' => []
    ],200);
         }
            
     }
            
    }
 }
        

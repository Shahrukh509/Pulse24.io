<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->group('/', function (Request $request) {
//     return $request->user();
// });


                    // L O G I N
Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login']);


                // P A S S W O R D  R E S E T

Route::post('password/email', [App\Http\Controllers\API\ForgotPasswordController::class, 'sendResetLinkEmail']);

// Route::post('password/reset', [App\Http\Controllers\API\ResetPasswordController::class, 'reset']);

// Route::post('send/otp', [App\Http\Controllers\API\ForgotPasswordController::class, 'reset']);


              // C H E C K I N G    O T P

Route::post('checking/otp',[App\Http\Controllers\API\AuthController::class, 'checking_otp']);

            
            // C H A N G I N G  N E W P A S S W O R D

Route::post('resetting/password',[App\Http\Controllers\API\AuthController::class, 'resetting_password']);





Route::group(['middleware' =>'auth:sanctum'],function(){

 Route::get('get/sliders',[App\Http\Controllers\API\FrontendController::class, 'get_all_slider_images']);


                // FOR CALLING SECTION

 Route::get('all/calling/data',[App\Http\Controllers\API\FrontendController::class, 'get_user_calling_data']);
 Route::get('calling/data/{id}',[App\Http\Controllers\API\FrontendController::class, 'calling_data_by_id']);
 Route::post('assign/calling/data',[App\Http\Controllers\API\FrontendController::class, 'assigned_status']);


                   // FOR LEADS SECTION

 Route::get('all/leads/data/{status}',[App\Http\Controllers\API\FrontendController::class, 'get_user_leads_data']);
//  Route::get('all/leads/followup',[App\Http\Controllers\API\FrontendController::class, 'get_user_leads_followup']);
 Route::get('leads/data/{id}',[App\Http\Controllers\API\FrontendController::class, 'leads_data_by_id']);
 Route::post('assign/leads/data',[App\Http\Controllers\API\FrontendController::class, 'assigned_status_leads']);


                   // FOR Meeting SECTION

 Route::get('all/meetings/data',[App\Http\Controllers\API\FrontendController::class, 'get_user_meeting_data']);
 Route::get('meeting/data/{id}',[App\Http\Controllers\API\FrontendController::class, 'leads_meeting_by_id']);
 Route::post('assign/meeting/data',[App\Http\Controllers\API\FrontendController::class, 'assigned_status_meeting']);
 
 
 
                    // FOR BOOKING

 Route::get('all/bookings/data/{status}',[App\Http\Controllers\API\FrontendController::class, 'get_user_booking_data']);
 Route::get('booking/data/{id}',[App\Http\Controllers\API\FrontendController::class, 'booking_by_id']);
 Route::post('assign/booking/data',[App\Http\Controllers\API\FrontendController::class, 'assigned_status_booking']);


                            //all countries
 Route::get('all/countries', [App\Http\Controllers\API\FrontendController::class, 'all_countries']);
 Route::get('country/by/code/{country_code}', [App\Http\Controllers\API\FrontendController::class, 'get_country_by_code']);
 Route::get('country/data/{id}', [App\Http\Controllers\API\FrontendController::class, 'get_country_data_by_id']);
 
 
                                // EDIT REMARKS
                                
 Route::post('edit/remarks/{id}',[App\Http\Controllers\API\FrontendController::class, 'edit_remarks']);
 
                                //Dialogue
                                
                                
 Route::get('get/dialogue/{id}',[App\Http\Controllers\API\FrontendController::class, 'get_dialogue']);
 
  Route::post('add/dialogue/{id}',[App\Http\Controllers\API\FrontendController::class, 'add_dialogue']);
 
 
 

                    

 
 Route::get('logout', [App\Http\Controllers\API\AuthController::class, 'logout']);


 

});

// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization'); 


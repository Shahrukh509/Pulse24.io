<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DashController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AssignedController;
use App\Http\Controllers\LeadsHistoryController;
use App\Http\Controllers\ReassignController;
use App\Http\Controllers\DeleteNumbersController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HierarchyStructureController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\CompanyRequestController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Employees\AssignController;
use App\Http\Controllers\Employees\HierarchyController;
use App\Http\Controllers\Employees\Leads_HistoryController;
use App\Http\Controllers\Employees\PasswordController;
use App\Http\Controllers\Employees\Re_assignController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();

// Route::get('add_admin',[UsersController::class,'add_superadmin']);

Route::get('optimize', function() {
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
   Artisan::call('route:clear');
   Artisan::call('view:clear');
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
    return 'cleared';
});


Route::get('/', [DashController::class, 'view']);


Route::group(['middleware' =>'auth:sanctum'],function(){

                  
Route::get('/dash', [DashController::class, 'view']);

                 // ADMIN CONTROL

Route::get('/roles', [UserRoleController::class, 'roles']);
Route::post('/roles', [UserRoleController::class, 'store']);
Route::post('/roles/update', [UserRoleController::class, 'update']);

                      
                      // ADDING SLIDER

Route::get('/slider', [SliderController::class, 'show'])->name('slider.show');
Route::post('/slider/add', [SliderController::class, 'add'])->name('slider.add');
Route::get('slider/edit/{id}',[SliderController::class, 'edit'])->name('slider.edit');
Route::post('slider/update',[SliderController::class, 'update'])->name('slider.update');
Route::get('slider/delete/{id}',[SliderController::class, 'delete'])->name('slider.delete');

                    // END SLIDER

                    // ADDING COUNTRY

Route::get('/country', [CountryController::class, 'show'])->name('country.show');
Route::post('/country/add', [CountryController::class, 'add'])->name('country.add');
Route::get('country/edit/{id}',[CountryController::class, 'edit'])->name('country.edit');
Route::post('country/update',[CountryController::class, 'update'])->name('country.update');
Route::get('country/delete/{id}',[CountryController::class, 'delete'])->name('country.delete');


                    // END OF ADDING COUNTrY

                    // NOTIFICATION MARKASREAD
Route::get('markasread/{id?}',[UsersController::class,'markread'])->name('read');
Route::get('notification/list',[UsersController::class,'notifications_list'])->name('notification.list');

                     //END  NOTIFICATION MARKASREAD
 

// Route::get('/modal', [UserRoleController::class, 'modal']);




Route::get('/users', [UsersController::class, 'users']);
Route::get('/create/users', [UsersController::class, 'create']);
Route::post('/create/users', [UsersController::class, 'store']);
Route::get('/user/edit/{id}', [UsersController::class, 'edit']);
Route::post('/user/update/{id}', [UsersController::class, 'update']);
Route::get('/user/delete/{id}', [UsersController::class, 'delete']);


           // ABOUT LEADS


Route::get('calling', [AssignedController::class, 'calling'])->name('calling');

Route::get('calling_list', [AssignedController::class, 'calling_list'])->name('calling.list');

Route::get('leads', [AssignedController::class, 'leads'])->name('leads');
Route::get('lead_list', [AssignedController::class, 'lead_list'])->name('lead.list');


Route::get('meeting', [AssignedController::class, 'meeting'])->name('meeting');
Route::get('meeting_list', [AssignedController::class, 'meeting_list'])->name('meeting.list');

Route::get('booking', [AssignedController::class, 'booking'])->name('booking');

Route::get('booking_list', [AssignedController::class, 'booking_list'])->name('booking.list');



           // END ABOUT LEADS


           // COMPANY REQUESTS
Route::get('company/show',[CompanyRequestController::class,'show'])->name('company.form.show');

Route::post('adding/company',[CompanyRequestController::class,'add'])->name('company.add');

Route::get('company/request/show',[CompanyRequestController::class,'request_show'])->name('company.request.show');

Route::get('company/approved/show',[CompanyRequestController::class,'approved_company'])->name('company.approved.list');

Route::post('update/company',[CompanyRequestController::class,'update'])->name('company.request.update');

Route::get('delete/company/{id}',[CompanyRequestController::class,'delete'])->name('company.request.delete');
           // END OF COMPANY REQUESTs



Route::get('/upload', [UploadController::class, 'upload']);


Route::get('/assigned', [AssignedController::class, 'assigned']);
Route::post('/assigned', [AssignedController::class, 'store']);




Route::get('/history', [LeadsHistoryController::class, 'history']);
Route::get('/get_leadshistory', [LeadsHistoryController::class, 'getLeads']);



Route::get('/re-assign', [ReassignController::class, 'reassign']);
Route::get('/get_re-assign', [ReassignController::class, 'getassign']);

Route::get('/get_users_to_assign', [ReassignController::class, 'get_assign_user']);

Route::post('/re-assign', [ReassignController::class, 'update']);




Route::get('/select/delete_numbers', [DeleteNumbersController::class, 'delete'])->name('delete.numbers');
Route::get('/get/ajax', [DeleteNumbersController::class, 'get_ajax'])->name('ajax.num');
Route::post('/delete_numbers', [DeleteNumbersController::class, 'deleting'])->name('deleting.numbers');



Route::get('/password', [ChangePasswordController::class, 'change']);


Route::get('/hierarchy', [HierarchyStructureController::class, 'hierarchy']);

Route::get('search_history/{id}', [HierarchyStructureController::class, 'search_history'])->name('search.history');


Route::post('/import', [ImportController::class, 'import']);



Route::get('userProfile',[UsersController::class,'user_profile'])->name('user.profile');
Route::Post('profileupdate/{id}',[UsersController::class,'user_profile_update'])->name('profile.update');

Route::get('/logout',function(){
// auth()->user()->tokens()->delete();
 auth()->guard('web')->logout();

        return redirect('login');
});

               // END OF ADMIN CONTROL


       
              // USER CONTROL
Route::get('/dashboard', [DashController::class, 'view'])->name('user.dashboard');
Route::get('/user/assigned', [AssignController::class, 'view'])->name('user.assign');
    Route::post('/user/assigned', [AssignController::class, 'store'])->name('user.storeassign');




    Route::get('/leads-history', [Leads_HistoryController::class, 'view'])->name('user.leads_history');
    Route::get('/get-userhistory', [Leads_HistoryController::class, 'getLeads'])->name('user.search_history');



    Route::get('/re_assign', [Re_assignController::class, 'view'])->name('user.re-assign');
    Route::get('/get_user-reassign', [Re_assignController::class, 'getassign'])->name('user.getre-assign');
    Route::post('/re_assign', [Re_assignController::class, 'update'])->name('user.update-reassign');;




    Route::get('/user/hierarchy', [HierarchyController::class, 'view'])->name('user.hierarchy');
    Route::get('search_userhistory/{id}', [HierarchyController::class, 'search_history'])->name('search.userhistory');




    Route::get('/user/password', [PasswordController::class, 'view'])->name('user.password');
              // END OF USER CONTROL




});


Auth::routes();


    




    



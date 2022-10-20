<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Laravel\Passport\HasApiTokens;

class Dialogue extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'dialogues';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // public function userrole()
    // {
    //     return $this->belongsTo(UserRole::class, 'role_id', 'id');
    // }


    // public function assigned_leads(){

    //     return $this->hasMany(AssignedNumbers::class,'users_id','id');
    // }

    // public function assigned_leads_pending(){

    //     return $this->assigned_leads()->where('status','pending');
    // }

    //  public function assigned_leads_completed(){

    //     return $this->assigned_leads()->where('status','completed');
    // }


    // public function assigned_leads_rejected(){

    //     return $this->assigned_leads()->where('status','rejected');
    // }
    

    // public function country(){

    //     return $this->hasOne(Country::class,'id','country_id');
    // }


    // // public function meetingstatus(){

    // //     return $this->hasOne(MeetingStatus::class,'user_id','id');
    // // }

    // public function meetingStatus()
    // {
    //     return $this->hasMany(MeetingStatus::class, 'user_id', 'id');
    // }
    
    public function customers(){
        
    return $this->hasOne(UploadAssignNumber::class,'id','upload_assign_numbers_id');
    }
    
    
    
}

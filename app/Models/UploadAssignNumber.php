<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadAssignNumber extends Model
{
    use HasFactory;


    protected $table = 'upload_assign_numbers';
    public $timestamps = true;
    protected $guarded = [];


 // public function get_all_leads(){

 //    return $this->hasOne(AssignedNumbers::class,'upload_assign_numbers_id','id');
 // }

 // public function get_new_leads(){

 //    return $this->get_all_leads()->where('upload_assign_numbers_id','!=',$this->id);
 // }

    public function assigned_numbers(){

        return $this->hasMany(AssignedNumbers::class,'upload_assign_numbers_id','id');
    }
}



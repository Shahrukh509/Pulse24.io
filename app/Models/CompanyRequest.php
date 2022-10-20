<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRequest extends Model
{
    use HasFactory;

    protected $table = 'company_requests';

    protected $guarded = [];


    public function country(){

       return  $this->hasOne(Country::class,'id','country_id');
    }
}

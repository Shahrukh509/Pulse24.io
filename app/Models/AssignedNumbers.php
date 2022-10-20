<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedNumbers extends Model
{
    use HasFactory;


    protected $table = 'assigned_numbers';
    public $timestamps = true;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }


    public function assigned()
    {
        return $this->belongsTo(UploadAssignNumber::class, 'upload_assign_numbers_id', 'id');
    }

    public function by_country($code) {

        return $this->assigned()->where('country_code',$code)->where('status',0)->first();
    
}
}

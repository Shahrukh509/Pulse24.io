<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingStatus extends Model
{
    use HasFactory;

    protected $table = 'meeting_statuses';
    public $timestamps = true;
    protected $guarded = [];
}

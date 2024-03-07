<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_Id',
        'start_Time',
        'end_Time',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'admin_Id','id');
    }
}

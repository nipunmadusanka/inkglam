<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'emId',
        'experience',
        'startdate',
        'enddate',
        'skills',
        'notes',
        'status',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
    public function Employe()
    {
        return $this->belongsTo(Employe::class, 'emId', 'id');
    }
}

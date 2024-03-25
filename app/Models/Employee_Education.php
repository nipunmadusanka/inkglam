<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'emId',
        'education',
        'Institute',
        'startdate',
        'enddate',
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

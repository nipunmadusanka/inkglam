<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'fname',
        'lname',
        'email',
        'position',
        'address',
        'phone',
        'image',
];

    public function User(){
        return $this->belongsTo(User::class,'uId','id');
    }
}

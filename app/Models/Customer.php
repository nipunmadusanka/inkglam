<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'phone',
        'address',
        'notes',
        'status',
];

    public function User(){
        return $this->belongsTo(User::class,'uId','id');
    }
}

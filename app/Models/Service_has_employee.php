<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_has_employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'sId',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'uId','id');
    }
    public function Product(){
        return $this->belongsTo(Product::class, 'sId', 'id');
    }
}

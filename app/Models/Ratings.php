<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'sId',
        'comment',
        'admin_reply',
        'star',
        'likes',
        'dislikes',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'uId','id');
    }
    public function Product(){
        return $this->belongsTo(Product::class, 'sId', 'id');
    }
}

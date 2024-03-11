<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainservice_has_Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'mId',
        'pId',
        'time',
        'status',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
    public function MainService() {
        return $this->belongsTo(Mainservice::class, 'mId', 'id');
    }
    public function Product(){
        return $this->belongsTo(Product::class, 'pId', 'id');
    }
}

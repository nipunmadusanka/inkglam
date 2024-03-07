<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewAppoinments extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'eId',
        'sId',
        'tId',
        'name',
        'phone',
        'email',
        'date',
        'message',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'uId','id');
    }
    public function Employe(){
        return $this->belongsTo(Employe::class, 'eId', 'id');
    }
    public function Product(){
        return $this->belongsTo(Product::class, 'sId', 'id');
    }
    public function Timeslot(){
        return $this->belongsTo(Timeslot::class, 'tId', 'id');
    }
}

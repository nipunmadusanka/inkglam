<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_has_services extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_Id',
        'eId',
        'sId',
        'status',
    ];

    public function User(){
        return $this->belongsTo(User::class,'admin_Id','id');
    }
    public function Employe(){
        return $this->belongsTo(Employe::class, 'eId', 'id');
    }
    public function Product(){
        return $this->belongsTo(Product::class, 'sId', 'id');
    }

}

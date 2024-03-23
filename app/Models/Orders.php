<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'payInfoId',
        'uInfoId',
        'sellProductId',
        'total',
        'discount',
        'notes',
        'status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
    public function Paymentinfo()
    {
        return $this->belongsTo(Paymentinfo::class, 'payInfoId', 'id');
    }
    public function Selluserinfo()
    {
        return $this->belongsTo(Selluserinfo::class, 'uInfoId', 'id');
    }
    public function Sellproductinfo()
    {
        return $this->belongsTo(Sellproductinfo::class, 'sellProductId', 'id');
    }
}

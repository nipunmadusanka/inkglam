<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellproductinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'catId',
        'pId',
        'uInfoId',
        'payInfoId',
        'unit_price',
        'qty',
        'total',
        'discount',
        'status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
    public function Maincatitems()
    {
        return $this->belongsTo(Maincatitems::class, 'catId', 'id');
    }
    public function Sellitems()
    {
        return $this->belongsTo(Sellitems::class, 'pId', 'id');
    }
    public function Selluserinfo()
    {
        return $this->belongsTo(Selluserinfo::class, 'uInfoId', 'id');
    }
    public function Paymentinfo()
    {
        return $this->belongsTo(Paymentinfo::class, 'payInfoId', 'id');
    }
}

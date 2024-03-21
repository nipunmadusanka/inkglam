<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellitems extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'mcatId',
        'item',
        'description',
        'brand',
        'item_code',
        'color',
        'model',
        'made_in',
        'model_year',
        'price',
        'discount',
        'qty',
        'image',
        'note',
        'status',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
    public function Maincatitems()
    {
        return $this->belongsTo(Maincatitems::class, 'mcatId', 'id');
    }
}

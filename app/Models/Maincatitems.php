<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maincatitems extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'title',
        'description',
        'image',
        'notes',
        'status',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
}

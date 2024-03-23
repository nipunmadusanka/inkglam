<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selluserinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'name',
        'phone',
        'nic',
        'delivery_address',
        'email',
        'message',
        'notes',
        'status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
}

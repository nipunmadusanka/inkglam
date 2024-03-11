<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainservice extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'name',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagegallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'name',
        'description',
        'image',
        'note',
        'status',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }

}

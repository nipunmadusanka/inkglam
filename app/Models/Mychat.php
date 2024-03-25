<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mychat extends Model
{
    use HasFactory;

    protected $fillable = [
        'senderid',
        'receiveid',
        'message',
        'files',
        'read',
        'note',
        'status',
    ];
    public function Sender()
    {
        return $this->belongsTo(User::class, 'senderid', 'id');
    }
    public function Receiver()
    {
        return $this->belongsTo(User::class, 'receiveid', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'bank',
        'holder',
        'card_type',
        'amount',
        'card_number',
        'security_code',
        'exp_month',
        'exp_year',
        'notes',
        'otp_code',
        'status',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'uId', 'id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];
}

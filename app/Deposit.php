<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Deposit extends Model
{

    protected $fillable = [
        'payment_way', 'amount_paid','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
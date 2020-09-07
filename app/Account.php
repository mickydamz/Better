<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Account extends Model
{
    protected $fillable = [
     'name','phone_number', 'bank', 'number','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

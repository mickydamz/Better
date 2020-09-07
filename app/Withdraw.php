<?php

namespace App;
use App\User;
use App\Transaction;
use App\Investment;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    
    protected $fillable = [
        'amount','user_id',
    ];
    

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    
    public function investments(){
        return $this->hasMany(Investment::class);
    }
    
    public function users(){
        return $this->hasManyThrough(User::class,Investment::class);
    }

    public function account(){
        return $this->hasOneThrough(Account::class, User::class);
    }
}

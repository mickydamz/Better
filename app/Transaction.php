<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use jpmurray\LaravelCountdown\Traits\CalculateTimeDiff;
use App\Investment;
use App\Withdraw;
use App\User;

class Transaction extends Model
{
    use CalculateTimeDiff;

    protected $fillable = ['withdraw_id','investment_id','date','start_time','end_time',
  ];
    



    public function investments(){
        return $this->hasMany(Investment::class);
    }

    public function withdraw(){
        return $this->hasOne(Withdraw::class);
    }

   public function users() {
        return $this->hasMany(User::class, Investment::class);
    }

    public function user(){
        return $this->hasOneThrough(User::class, Withdraw::class);
    }


}

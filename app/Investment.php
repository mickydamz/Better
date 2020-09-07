<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Transaction;
use App\Withdraw;
class Investment extends Model
{
    // protected $fillable = [
    //     'amount','user_id',
    // ];


    protected $guarded = [''];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class)->withTimestamps();
    }

    public function withdraw(){
        return $this->belongsTo(Withdraw::class);
    }
    
    public function account(){
        return $this->hasOneThrough(Account::class,User::class);
    }

   
}

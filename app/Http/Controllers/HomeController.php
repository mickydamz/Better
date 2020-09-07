<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Facades\jpmurray\LaravelCountdown\Countdown;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {

        $now = Carbon::now();
        

$countdown = Countdown::from($now->copy()->subYears(5))
                        ->to($now)->get();

// The above will return the Countdown class where you can access the following values.
// Those mean that from 5 years ago to now, there is 5 years, 1 week, 1 day, 2 hours 15 minutes and 23 seconds

$countdown->years; // 5
$countdown->weeks; // 1
$countdown->days; // 1
$countdown->hours; // 2
$countdown->minutes; // 15
$countdown->seconds; // 23

// It will of course, also work in reverse order of time.
// This will get the time between now and some future date
$countdown = Countdown::from($now)
             ->to($now->copy()->addHours(12))
             ->get();
             
// To return to humans string
$countdown->toHuman(); // 18 years, 33 weeks, 2 days, 18 hours, 4 minutes and 35 seconds

// You to can pass custom string to parse in method toHuman, like this:
$finalcountdown = $countdown->toHuman('{days} days, {hours} hours and {minutes} minutes'); // 2 days, 18 hours, 4 minutes
       
echo($finalcountdown);
        return view('home');



    }


    public function referral()
{
    return 'http://127.0.0.1:8000/?ref=' . \Hashids::encode(auth()->user()->id);
}


public function referrer()
{  echo (auth()->user()->referrer);
    return auth()->user()->referrer;
}

public function referrals()
{
    return auth()->user()->referrals;
}

}

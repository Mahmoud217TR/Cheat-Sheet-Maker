<?php

use App\Models\Sheet;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('ffd', function () {
    $data = [
        'name' => "Mahmoud Mahmoud",
        'email' => "faafet.mahmoud@gmail.com",
        'password' => Hash::make('123456789'),
        'most_visited_filter' => 10,
    ];

    User::create($data);
})->purpose('Fill fake data');


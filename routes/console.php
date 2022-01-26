<?php

use App\Models\Sheet;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

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
    $user = new User;
    $user->name = "Mahmoud Mahmoud";
    $user->email = "faafet.mahmoud@gmail.com";
    $user->password = "$2y$10$/UMAaaWUbMCNR0FvHEC23eyXjOaTivJj3AadXVZPjKczLaagPYAq.";
    $user->save();
    $s = new Sheet;
    $s->title = 'test';
    $s->description = 'testing...';
    $s->theme = '1';
    $s->author_id = 1;
    $s->save();
})->purpose('Fill fake data');


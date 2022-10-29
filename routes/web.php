<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\Auth;
use App\Notifications\emailNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome'); 
});
//single user
// Route::get('send', function () {
//     $user=User::find(1);
//     $user->notify(new emailNotification());
//     return redirect()->back();
// });
//multiple user
Route::get('send', function () {
    $user=User::all();
    Notification::send($user, new emailNotification());
    
    return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

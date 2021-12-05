<?php

use App\Http\Controllers\ChatController;
use App\Providers\ChatMessageSent;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('send_message',[ChatController::class,'store'])->name('send');

Route::get('/test', function (){
    dd( event(new ChatMessageSent('hello world')) );
});
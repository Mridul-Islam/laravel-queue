<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Queue\QueueController;
use App\Http\Controllers\Queue\TraditionalWayController;
use App\Http\Controllers\Queue\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(WelcomeController::class)->group(function(){
    Route::get('queue-send-email', 'queueSendEmailForm')->name('queue_send_email_form');
});


Route::controller(TraditionalWayController::class)->group(function(){
    Route::post('store-user', 'storeUser')->name('store_user');
});


Route::controller(QueueController::class)->group(function(){
    Route::post('queue-store-user', 'queueStoreUser')->name('queue.store_user');
    Route::get('send-otp', 'sendOtp')->name('send_otp');
});




require __DIR__.'/auth.php';

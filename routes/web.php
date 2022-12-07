<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayuMoneyController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::any('/payu-money-payment', [PayuMoneyController::class, 'redirectToPayU'])->name('redirectToPayU');
    Route::any('/payu-money-payment-cancel', [PayuMoneyController::class,'paymentCancel'])->name('payumoney-cancel');
    Route::any('/payu-money-payment-success', [PayuMoneyController::class, 'paymentSuccess'])->name('payumoney-success');
});



require __DIR__.'/auth.php';

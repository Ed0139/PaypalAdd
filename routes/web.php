<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaypalController;


Route::get('/', [ProductController::class, 'index']);

Route::resource('products', ProductController::class);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/cart/clear', [CartController::class, 'clear']);

Route::post('/paypal/pay', [PaypalController::class, 'pay'])
  ->name('paypal.pay');
Route::get('/paypal/success', [PaypalController::class, 'success'])
  ->name('paypal.success');
Route::get('/paypal/cancel', [PaypalController::class, 'cancel'])
  ->name('paypal.cancel');

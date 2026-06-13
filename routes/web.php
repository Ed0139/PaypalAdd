<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MapController;
use OpenAI\Resources\Chat;

Route::get('/', [ProductController::class, 'index']);

Route::resource('products', ProductController::class);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/cart/clear', [CartController::class, 'clear']);

Route::post('/paypal/pay', [PaypalController::class, 'pay'])->name(
  'paypal.pay',
);
Route::get('/paypal/success', [PaypalController::class, 'success'])->name(
  'paypal.success',
);
Route::get('/paypal/cancel', [PaypalController::class, 'cancel'])->name(
  'paypal.cancel',
);

// LOGIN CON GOOGLE (SIN MIDDLEWARE DE AUTENTICACIÓN)
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name(
  'google.login',
);

Route::get('/auth/google/callback', [
  AuthController::class,
  'handleGoogleCallback',
]);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::get('/bienvenido', function () {
  return view('bienvenido');
})->name('Bienvenido');

Route::get('/chat', [ChatController::class, 'index']);
Route::post('/preguntar', [ChatController::class, 'preguntar']);

Route::get('/mapa', [MapController::class, 'show']);
Route::post('/mapa', [MapController::class, 'search']);

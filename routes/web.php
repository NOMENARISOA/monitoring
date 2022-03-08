<?php

use Illuminate\Support\Facades\Auth;
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
//GATEWAY
Route::get('/gateway/index', [App\Http\Controllers\GatewayController::class, 'index'])->name('gateway.index');
Route::get('/gateway/create', [App\Http\Controllers\GatewayController::class, 'create'])->name('gateway.create');
Route::post('/gateway/store', [App\Http\Controllers\GatewayController::class, 'store'])->name('gateway.store');

//SENSOR

Route::get('/sensor/index', [App\Http\Controllers\SensorController::class, 'index'])->name('sensor.index');
Route::get('/sensor/create', [App\Http\Controllers\SensorController::class, 'create'])->name('sensor.create');
Route::post('/sensor/store', [App\Http\Controllers\SensorController::class, 'store'])->name('sensor.store');

//REALTIME
Route::get('/realtime', [App\Http\Controllers\SensorController::class, 'realtime'])->name('realtime');

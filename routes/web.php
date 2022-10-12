<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToyRobotController;

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

Route::match(['GET', 'POST'], '/', [ToyRobotController::class, 'index'])->name('/');
Route::match(['GET', 'POST'], 'play', [ToyRobotController::class, 'play'])->name('play');
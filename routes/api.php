<?php

use App\Http\Controllers\AnalyzeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/analyze', AnalyzeController::class);

Route::post('/order', OrderController::class);
Route::post('/user', UserController::class);

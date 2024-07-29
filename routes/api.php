<?php

use App\Http\Controllers\Api\v1\ChartDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/v1/generate-chart-data', [ChartDataController::class, 'generateData']);

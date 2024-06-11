<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LogReceiverController;
//use App\Http\Controllers\API\LogsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// прием и обработка лога
Route::name('log.')->prefix('log')->middleware('api')->group(function () {
    Route::get('/', [LogReceiverController::class, 'index'])->name('index');
    Route::post('/', [LogReceiverController::class, 'store'])->name('send');
    Route::delete('/', [LogReceiverController::class, 'clear'])->name('clear');
});

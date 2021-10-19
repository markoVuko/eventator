<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::put('/ticket/{id}',[TicketController::class, 'update']);
Route::get('/events',[EventController::class,'index']);
Route::get('/event/{id}',[EventController::class,'show']);
Route::post('/ticket',[TicketController::class, 'store']); 
Route::get('/tickets',[TicketController::class,"index"]);
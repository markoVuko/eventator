<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login',[AuthController::class,"login"])->name("login");
    Route::post('/logout',[AuthController::class,"logout"])->name("logout");
    Route::post('/refresh',[AuthController::class,"refresh"])->name("refresh");
    Route::post('/me',[AuthController::class,"me"])->name("me");
    Route::post('/register',[AuthController::class,"register"])->name("register");
});



Route::middleware("auth:api")->get("/test",function(){
    $payload = auth("api")->payload();
    return $payload;
});

Route::put('/ticket/{id}',[TicketController::class, 'update']);
Route::get('/events',[EventController::class,'index']);
Route::get('/event/{id}',[EventController::class,'show']);
Route::post('/event',[EventController::class,'store']);
Route::post('/ticket',[TicketController::class, 'store']); 
Route::get('/tickets',[TicketController::class,"index"]);
Route::get('/categories',[CategoryController::class,"index"]);

Route::get("/tickets/{ticket}",[TicketController::class,"show"]);
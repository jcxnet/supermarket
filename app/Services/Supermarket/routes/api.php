<?php

/*
|--------------------------------------------------------------------------
| Service - API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Prefix: /api/supermarket
use App\Services\Supermarket\Http\Controllers\CategoryController;

Route::group(['prefix' => 'supermarket'], function() {

    // Controllers live in src/Services/Supermarket/Http/Controllers
    Route::get('/', function() {
        return response()->json(['path' => '/api/supermarket']);
    });


    Route::post('/categories',[CategoryController::class, 'add']);
    Route::get('/categories',[CategoryController::class, 'all']);
    Route::get('/categories/{id}',[CategoryController::class, 'get']);
    Route::put('/categories/{id}',[CategoryController::class, 'update']);
    Route::delete('/categories/{id}',[CategoryController::class, 'delete']);


    /*Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });*/

});




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
use App\Services\Supermarket\Http\Controllers\CompanyController;

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

    Route::post('/companies',[CompanyController::class, 'add']);
    Route::get('/companies',[CompanyController::class, 'all']);
    Route::get('/companies/{id}',[CompanyController::class, 'get']);
    Route::put('/companies/{id}',[CompanyController::class, 'update']);
    Route::delete('/companies/{id}',[CompanyController::class, 'delete']);


    /*Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });*/

});




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
use App\Services\Supermarket\Http\Controllers\ContactController;
use App\Services\Supermarket\Http\Controllers\CustomerController;
use App\Services\Supermarket\Http\Controllers\OrderController;
use App\Services\Supermarket\Http\Controllers\ProductController;
use App\Services\Supermarket\Http\Controllers\ReportController;
use App\Services\Supermarket\Http\Controllers\StoreController;

Route::group(['prefix' => 'supermarket'], function() {

    // Controllers live in src/Services/Supermarket/Http/Controllers
    Route::get('/', function() {
        return response()->json(['path' => '/api/supermarket']);
    });

    //categories
    Route::post('/categories',[CategoryController::class, 'add']);
    Route::get('/categories',[CategoryController::class, 'all']);
    Route::get('/categories/{id}',[CategoryController::class, 'get']);
    Route::put('/categories/{id}',[CategoryController::class, 'update']);
    Route::delete('/categories/{id}',[CategoryController::class, 'delete']);

    // companies
    Route::post('/companies',[CompanyController::class, 'add']);
    Route::get('/companies',[CompanyController::class, 'all']);
    Route::get('/companies/{id}',[CompanyController::class, 'get']);
    Route::put('/companies/{id}',[CompanyController::class, 'update']);
    Route::delete('/companies/{id}',[CompanyController::class, 'delete']);

    // stores
    Route::post('/stores',[StoreController::class, 'add']);
    Route::get('/stores',[StoreController::class, 'all']);
    Route::get('/stores/{id}',[StoreController::class, 'get']);
    Route::put('/stores/{id}',[StoreController::class, 'update']);
    Route::delete('/stores/{id}',[StoreController::class, 'delete']);

    //contacts
    Route::post('/contacts',[ContactController::class, 'add']);
    Route::get('/contacts',[ContactController::class, 'all']);
    Route::get('/contacts/{id}',[ContactController::class, 'get']);
    Route::put('/contacts/{id}',[ContactController::class, 'update']);
    Route::delete('/contacts/{id}',[ContactController::class, 'delete']);

    //products
    Route::post('/products',[ProductController::class, 'add']);
    Route::get('/products',[ProductController::class, 'all']);
    Route::get('/products/{id}',[ProductController::class, 'get']);
    Route::put('/products/{id}',[ProductController::class, 'update']);
    Route::delete('/products/{id}',[ProductController::class, 'delete']);

    //customers
    Route::post('/customers',[CustomerController::class, 'add']);
    Route::get('/customers',[CustomerController::class, 'all']);
    Route::get('/customers/{id}',[CustomerController::class, 'get']);
    Route::put('/customers/{id}',[CustomerController::class, 'update']);
    Route::delete('/customers/{id}',[CustomerController::class, 'delete']);

    //orders
    Route::post('/orders',[OrderController::class, 'add']);
    Route::get('/orders',[OrderController::class, 'all']);
    Route::get('/orders/{id}',[OrderController::class, 'get']);
    Route::put('/orders/{id}',[OrderController::class, 'update']);
    Route::delete('/orders/{id}',[OrderController::class, 'delete']);

    //orders store
    Route::get('/reports/orders/stores',[ReportController::class, 'storesOrders']);
    Route::get('/reports/orders/stores/{id}',[ReportController::class, 'storeOrders']);
    Route::get('/reports/companies/{id}/products',[ReportController::class, 'companyProducts']);
    Route::get('/reports/products/stores',[ReportController::class, 'productsStores']);
    Route::get('/reports/products/stores/{id}',[ReportController::class, 'productsStore']);
    Route::get('/reports/stores/sales',[ReportController::class, 'storesSells']);
    Route::get('/reports/customers/buys',[ReportController::class, 'customersBuys']);

    /*Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });*/

});




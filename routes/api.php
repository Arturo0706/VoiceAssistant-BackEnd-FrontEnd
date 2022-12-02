<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controlladores
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\MunicipalitiesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\ProductController;



//This endpoint will be a store method to the admin user
Route::post('/users_admin_store', [UserController::class, 'storeAdmin']);

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('/roles_store', [RolesController::class, 'store']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users_edit/{id}', [UserController::class, 'update']);

Route::post('/shopping_store', [ShoppingCartController::class, 'store']);
Route::post('/order_store', [OrderController::class, 'store']);
Route::delete('/order_delete/{id}', [OrderController::class, 'destroy']);

Route::get('user-profile', [UserController::class, 'userProfile']);

// Route::post('/logout', [Auth\AuthController::class, 'logout']);

//**********Routes User */
//Get all the users: INDEX


//Save an user: This method is the "register": STORE

//Edit an user: UPDATE

//Delete an user: DELETE
Route::delete('/users_delete/{id}', [UserController::class, 'delete']);
//Show just an specific user: SHOW

//********States */
Route::get('/states', [StatesController::class, 'index']);
Route::post('/states_store', [StatesController::class, 'store']);
Route::get('/states_show/{id}', [StatesController::class, 'show']);
Route::put('/states_update/{id}', [StatesController::class, 'update']);
Route::delete('/states_delete/{id}', [StatesController::class, 'destroy']);

//********Size */
Route::get('/size', [SizeController::class, 'index']);
Route::post('/size_store', [SizeController::class, 'store']);
Route::get('/size_show/{id}', [SizeController::class, 'show']);
Route::put('/size_update/{id}', [SizeController::class, 'update']);
Route::delete('/size_delete/{id}', [SizeController::class, 'destroy']);

//********Shopping */
Route::get('/shopping', [ShoppingCartController::class, 'index']);

Route::get('/shopping_show/{id}', [ShoppingCartController::class, 'show']);
Route::put('/shopping_update/{id}', [ShoppingCartController::class, 'update']);
Route::delete('/shopping_delete/{id}', [ShoppingCartController::class, 'destroy']);


//Details
Route::get('/shopping_detail/{id}', [ShoppingCartController::class, 'shoppingCart']);

/*********Roles */
Route::get('/roles', [RolesController::class, 'index']);
Route::post('/roles_store', [RolesController::class, 'store']);
Route::get('/roles_show/{id}', [RolesController::class, 'show']);
Route::put('/roles_update/{id}', [RolesController::class, 'update']);
Route::delete('/roles_delete/{id}', [RolesController::class, 'destroy']);

/*********Product */
Route::get('/product', [ProductController::class, 'index']);
Route::post('/product_store', [ProductController::class, 'store']);
Route::get('/product_show/{id}', [ProductController::class, 'show']);
Route::put('/product_update/{id}', [ProductController::class, 'update']);
Route::delete('/product_delete/{id}', [ProductController::class, 'destroy']);

/*********Order */
Route::get('/order', [OrderController::class, 'index']);

Route::get('/order_show/{id}', [OrderController::class, 'show']);
Route::put('/order_update/{id}', [OrderController::class, 'update']);


/*********Municipalities */
Route::get('/municipalities', [MunicipalitiesController::class, 'index']);
Route::post('/municipalities_store', [MunicipalitiesController::class, 'store']);
Route::get('/municipalities_show/{id}', [MunicipalitiesController::class, 'show']);
Route::put('/municipalities_update/{id}', [MunicipalitiesController::class, 'update']);
Route::delete('/municipalities_delete/{id}', [MunicipalitiesController::class, 'destroy']);

/********* DetailProduct */
Route::get('/detail', [DetailProductController::class, 'index']);
Route::post('/detail_store', [DetailProductController::class, 'store']);
Route::get('/detail_show/{id}', [DetailProductController::class, 'show']);
Route::put('/detail_update/{id}', [DetailProductController::class, 'update']);
Route::delete('/detail_delete/{id}', [DetailProductController::class, 'destroy']);


/********* Addresses */
Route::get('/addresses', [AddressesController::class, 'index']);
Route::post('/addresses_store', [AddressesController::class, 'store']);
Route::get('/addresses_show/{id}', [AddressesController::class, 'show']);
Route::put('/addresses_update/{id}', [AddressesController::class, 'update']);
Route::delete('/addresses_delete/{id}', [AddressesController::class, 'destroy']);




Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::post('logout', [UserController::class, 'logout']);
 
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

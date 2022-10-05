<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controlladores
use App\Http\Controllers\Api\UserController;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);



Route::group(['middleware' => ["auth:sanctum"]], function () {

    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);

    //**********Routes User */
    //Get all the users: INDEX
    Route::get('/users', [UserController::class, 'index']);

    //Save an user: This method is the "register": STORE

    //Edit an user: UPDATE
    Route::put('/users_edit/{id}', [UserController::class, 'update']);
    //Delete an user: DELETE
    Route::delete('/users_delete/{id}', [UserController::class, 'delete']);
    //Show just an specific user: SHOW
    Route::get('/users/{id}', [UserController::class, 'show']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

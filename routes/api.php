<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Middleware\Cors;


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/items', [ItemsController::class, 'addNewItems']);
    Route::put('/items/remove/{id}', [ItemsController::class, 'moveItems']);
    Route::put('/items/restock/{id}', [ItemsController::class, 'restockItems']);
    Route::delete('/items/delete/{id}', [ItemsController::class, 'deleteCategory']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/logout', [AuthController::class, 'logout']);
})->middleware([Cors::class]);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/items', [ItemsController::class, 'viewItems']);
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'register']);
})->middleware([Cors::class]);

?>

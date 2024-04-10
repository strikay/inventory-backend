<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testAPI;
use App\Http\Controllers\LoginController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Middleware\Cors;


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/items', [testAPI::class, 'addNewItems']);
    Route::put('/items/remove/{category}', [testAPI::class, 'moveItems']);
    Route::put('/items/restock/{category}', [testAPI::class, 'restockItems']);
    Route::delete('/items/delete/{category}', [testAPI::class, 'deleteCategory']);
    Route::get('/me', [LoginController::class, 'me']);
    Route::get('/logout', [LoginController::class, 'logout']);
})->middleware([Cors::class]);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/items', [testAPI::class, 'viewItems']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/register', [LoginController::class, 'register']);
})->middleware([Cors::class]);

?>

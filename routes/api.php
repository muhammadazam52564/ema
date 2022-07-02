<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Auth;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register',                [AuthController::class, 'register']);
Route::post('/login',                   [AuthController::class, 'login']);
Route::post('/update_profile_image',    [AuthController::class, 'update_profile_image']);
Route::post('/update_profile',          [AuthController::class, 'update_profile']);
Route::post('/change_password',         [AuthController::class, 'change_password']);
Route::post('/add-address',             [AuthController::class, 'add_address']);
Route::get('/address/{id}',             [AuthController::class, 'address']);
Route::get('/delete-address/{id}',      [AuthController::class, 'delete_address']);

Route::get('/categories',               [MainController::class, 'categories']);
Route::get('/product/{id}',             [MainController::class, 'product']);

Route::post('/order',                   [MainController::class, 'add_order']);
Route::get('/branches',                 [MainController::class, 'branches']);

Route::post('/like',                    [MainController::class, 'like_product']);
Route::post('/unlike',                  [MainController::class, 'unlike_product']);
Route::get('/favorities/{id}',          [MainController::class, 'favorite_list']);

Route::get('/vouchers',                 [MainController::class, 'vouchers']);



Route::get('/order-history/{user_id}',           [MainController::class, 'orders']);
Route::get('/order/{id}',              [MainController::class, 'order']);

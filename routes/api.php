<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Auth;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/update_profile_image', [AuthController::class, 'update_profile_image']);
// Route::post('/update_profile', [AuthController::class, 'update_profile']);
// Route::post('/change_password', [AuthController::class, 'change_password']);
// Route::post('/add_address', [AuthController::class, 'add_address']);


Route::get('/categories', [MainController::class, 'categories']);
Route::get('/product/{id}', [MainController::class, 'product']);


// Route::post('/trending', [MainController::class, 'trending']);
// Route::post('/search', [MainController::class, 'search']);
// Route::post('/notifications', [MainController::class, 'notifications']);
// Route::post('/banner', [MainController::class, 'banner']);
// Route::post('/order', [MainController::class, 'order']);


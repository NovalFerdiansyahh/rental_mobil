<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;


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

// public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/mobils', [MobilController::class, 'index']);
Route::get('/mobils/{id}', [MobilController::class, 'show']);
Route::get('/transaksis', [TransaksiController::class, 'index']);
Route::get('/transaksis/{id}', [TransaksiController::class, 'show']);


//protected routes
Route::middleware('auth:sanctum')->group(function (){
    Route::resource('mobils', MobilController::class)->except(
        ['create', 'edit', 'index', 'show']
    );
    
    Route::resource('transaksis', TransaksiController::class)->except(
        ['create', 'edit', 'index', 'show']
    );

    Route::post('/logout', [AuthController::class, 'logout']);
});

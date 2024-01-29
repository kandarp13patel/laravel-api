<?php

use App\Http\Controllers\Api\ForgotPassordController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\UserDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserLoginController;
use App\Http\Controllers\Api\UserRegisterController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:api'])->group(function () {

	Route::post('getuser',[UserDataController::class,'getUserData']);
	
});

Route::post('userlogin',[UserLoginController::class,'userlogin']);
Route::post('userregister',[UserRegisterController::class,'store']);
Route::post('forgotpassword',[ForgotPassordController::class,'forgotpassword']);
Route:: post('resetpassword',[ResetPasswordController::class,'resetpassword']);
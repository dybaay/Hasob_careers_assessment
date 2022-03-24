<?php

use App\Http\Controllers\AssetAssignmentController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

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


Route::prefix('auth')->group(function () {
    //Authentication Routes with JWT Authentication
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
});



Route::middleware('auth:api')->group(function () {

    Route::apiResource('asset', AssetController::class);
    Route::apiResource('vendor', VendorController::class);

    // Routes for AssetAssignments
    Route::get('show_assignment/{assignment}', [AssetAssignmentController::class, 'show']);
    Route::post('assign_asset/{asset}', [AssetAssignmentController::class, 'assignAsset']);
    Route::patch('update_assignment/{assetAssignment}', [AssetAssignmentController::class, 'update']);
    Route::delete('delete_assignment/{assetAssignment}', [AssetAssignmentController::class, 'expelUser']);
    // End of Routes for AssetAssignments


    // Users Crud Routes
    Route::patch('user/{user}', [UserController::class, 'updateProfile']);
    Route::delete('user/{user}', [UserController::class, 'deleteAccount']);
});
Route::get('user', [UserController::class, 'showAllUsers']);
Route::post('register', [UserController::class, 'register']);
Route::get('user/{user}', [UserController::class, 'showUser']);
// End of Users Crud Routes



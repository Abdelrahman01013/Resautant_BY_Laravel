<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ApEventController;
use App\Http\Controllers\Api\ApiAdminController;
use App\Http\Controllers\Api\ApiCommentController;
use App\Http\Controllers\Api\ApiComplaintController;
use App\Http\Controllers\Api\ApiGalleryController;
use App\Http\Controllers\Api\ApiMealController;
use App\Http\Controllers\Api\ApiOrderController;
use App\Http\Controllers\Api\ApiSectionController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChefController;
use App\Http\Controllers\Api\NotfictionController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'userprofile']);
    Route::put('/updateProfile', [AuthController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);



    Route::middleware('Admin')->group(function () {
        // page Home
        Route::resource('pageHome', AboutController::class);

        // Chefs
        Route::resource('chefs', ChefController::class);

        // sections
        Route::resource('sections', ApiSectionController::class);

        // Gallery
        Route::resource('galleries', ApiGalleryController::class);
        // Admin
        Route::resource('admin', ApiAdminController::class);
    });


    //Notifictions
    Route::get('not/{notifiction_id}', [NotfictionController::class, 'readNotifiction']);
    Route::post('delete_all_notifiction', [NotfictionController::class, 'delete_all_notifiction']);
    Route::post('read_All', [NotfictionController::class, 'read_All']);

    // comments
    Route::resource('comments', ApiCommentController::class);

    // complaints
    Route::resource('complaints', ApiComplaintController::class);
    Route::get('all_Archive', [ApiComplaintController::class, 'all_Archive']);
    Route::get('show_Archive/{id}', [ApiComplaintController::class, 'show_Archive']);

    // Event
    Route::resource('events', ApEventController::class);

    // meals
    Route::resource('meals', ApiMealController::class);

    // orders
    Route::resource('orders', ApiOrderController::class);
    Route::get('all_archive', [ApiOrderController::class, 'archive']);
    Route::get('Restore_Archive/{id}', [ApiOrderController::class, 'Restore_Archive']);
    Route::get('show_Archive/{id}', [ApiOrderController::class, 'show_Archive']);
});

// user_comment
Route::post('create_comment', [ApiCommentController::class, 'store']);

// User_complaint
Route::post('create_complaint', [ApiComplaintController::class, 'store']);

// user_Request
Route::post('create_request', [ApiOrderController::class, 'store']);

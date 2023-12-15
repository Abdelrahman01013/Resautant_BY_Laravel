<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::fallback(function () {
    return view('404');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


######### Start
Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'admin']);


    Route::middleware('Admin')->group(function () {
        Route::resource('about', AboutController::class);
        Route::resource('chef', ChefController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('users', AdminController::class);
    });

    Route::resource('meals', MealController::class);
    Route::resource('events', EventController::class);

    Route::resource('orders', OrderController::class);
    Route::resource('complaints', ComplaintController::class);
    Route::resource('comments', CommentController::class);


    Route::get('archive', [OrderController::class, 'archive'])->name('archive');
    Route::get('complaints_Archive', [ComplaintController::class, 'archive'])->name('complaints_Archive');

    Route::get('readNotifiction/{product_id}/{notifiction_id}', [ChefController::class, 'readNotifiction'])->name('readNotifiction');
    Route::get('not_evn/{product_id}/{notifiction_id}', [EventController::class, 'readNotifiction'])->name('not_evn');
    Route::get('not_meal/{product_id}/{notifiction_id}', [MealController::class, 'readNotifiction'])->name('not_meal');
    Route::get('not_section/{product_id}/{notifiction_id}', [SectionController::class, 'readNotifiction'])->name('not_section');

    Route::post('read_All', [ChefController::class, 'read_All']);
    Route::post('delete_all_notifiction', [ChefController::class, 'delete_all_notifiction']);

    Route::get('not_complaint/{notifiction_id}', [ComplaintController::class, 'readNotifiction'])->name('not_complaint');
    Route::get('not_comment/{notifiction_id}', [CommentController::class, 'readNotifiction'])->name('not_comment');
    Route::get('not_order/{notifiction_id}', [OrderController::class, 'readNotifiction'])->name('not_order');
    Route::get('not_delete/{notifiction_id}', [HomeController::class, 'not_delete'])->name('not_delete');
});

Route::post('comments', [CommentController::class, 'store'])->name('comment.store');
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::post('complaints', [ComplaintController::class, 'store'])->name('complaints.store');

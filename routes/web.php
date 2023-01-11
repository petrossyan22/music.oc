<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\AccountController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, "index"]);

Route::get('/get-auth-user-id', function(){
	return new JsonResponse(auth()->user());
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account/{id}', [App\Http\Controllers\AccountController::class, 'index'])->name('account');


Route::get('/admin', [AdminController::class, "index"])->middleware(AdminMiddleware::class);

Route::resource("admin/users", UsersController::class);
Route::resource("admin/videos", VideosController::class);

Route::get("watch/{id}", [WatchController::class, "index"]);
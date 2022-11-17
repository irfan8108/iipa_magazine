<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ArticleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('about', [FrontController::class, 'about'])->name('about');
Route::get('magazine/articles{id}', [FrontController::class, 'article'])->name('article');
Route::any('magazine/search', [FrontController::class, 'search'])->name('search_data');


// ADMIN CONTROLS START
Route::middleware(['auth'])->group(function () {

	Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
	Route::resource('admin/blog', BlogController::class);
	Route::resource('admin/article', ArticleController::class);


	// User Profile
	Route::get('admin/user/profile', [AdminController::class, 'userProfile'])->name('admin.user_profile');
	Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
	Route::get('admin/add-user', [AdminController::class, 'addUser'])->name('admin.add_user');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;

// Auth::routes();

// Rutas autenticación

    // Login Routes...
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    
    // Logout Routes...
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Routes...
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
    
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    // Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    // Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

    // Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    // Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    // Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Fin rutas autenticación

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/post', [HomeController::class, 'show'])->name('posts.show');

// Route::get('/categorias', 'CategoryController@index');
Route::get('/categorias', [CategoryController::class, 'index'])->name('categorias.index');

Route::get('/home', function(){
    return view('home');
})->middleware('auth');

// Mostrar posts de una categoría
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

Route::get('/categories', [CategoryController::class, 'getCategories'])->name('admin.categories.getCategories');

Route::match(['PUT', 'PATCH'], '/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

Route::resource('posts', PostController::class);
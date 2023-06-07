<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;

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

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD

Route::get('/add-to-cart/{id}', [HomeController::class, 'addToCart']);
Route::get('/cart', [HomeController::class, 'cart'])->name('pages.cart');
Route::post('/update-cart/{id}', [HomeController::class, 'update'])->name('update-cart');
Route::delete('/remove-from-cart/{id}', [HomeController::class, 'remove']);

//fogot password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
=======
Route::post('/', [Account::class, 'store'])->name('auth.register');
Route::get('/register', [Account::class, 'show'])->name('welcome.register');
Route::get('/', [Account::class, 'showLogin'])->name('welcome.login');
Route::get('/logout', [Account::class, 'logout'])->name('logout');
Route::post('/index', [Account::class, 'login'])->name('auth.login');
>>>>>>> 2b5498f9c38800ae0665970d5a32de96b74487e5

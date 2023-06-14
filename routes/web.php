<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account;
use App\Http\Controllers\ProductController;


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

Route::get('/test', function () {
    return view('admin.layout.index');
});



Route::post('/', [Account::class, 'store'])->name('auth.register');
Route::get('/register', [Account::class, 'show'])->name('welcome.register');
Route::get('/', [Account::class, 'showLogin'])->name('welcome.login');
Route::get('/logout', [Account::class, 'logout'])->name('logout');
Route::post('/index', [Account::class, 'login'])->name('auth.login');
//fogot password

//edit profile
Route::get('/profile/edit',[Account::class, 'edit'] )->name('profile.edit');
Route::post('/profile/update', [Account::class, 'update'])->name('profile.update');


Route::get('/game/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/game/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/game:delete{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/game/edit{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/game/update{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/game/show{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/game/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/game/home', [ProductController::class, 'home'])->name('product.home');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;

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

Route::get('/home', [ShopController::class, 'index']);
Route::get('/detail/{id}/', [ShopController::class, 'detail']);
Route::get('/like', [LikeController::class, 'like']);
Route::post('/like', [LikeController::class, 'like'])->name('like');
Route::get('/done', [ReservationController::class, 'done']);
Route::post('/done', [ReservationController::class, 'create']);
Route::get('/mypage', [UserController::class, 'index']);
Route::get('/mypage/delete/', [UserController::class, 'delete']);
Route::post('/mypage/delete/', [UserController::class, 'delete'])->name('mypage.delete');
Route::get('/', [UserController::class, 'getlogout']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

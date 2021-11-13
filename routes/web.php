<?php

use App\Http\Controllers\UsersController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('crud')->group(function () {
    Route::get('/index', [UsersController::class, 'index']);
    Route::post('/index/store', [UsersController::class, 'store'])->name('index.store');
    Route::delete('/index/delete/{id}', [UsersController::class, 'destroy'])->name('index.destroy');
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'welcome'])->name('welcome');

Route::get('/users', [MainController::class, 'users'])->name('users');
Route::get('/user/{id}', [MainController::class, 'user'])->name('user');

Route::middleware(['auth'])->group(function() {
    Route::get('/home', [MainController::class, 'home'])->name('home');

    Route::middleware(['checkRole:admin'])->group(function() {
        Route::post('/createRole', [MainController::class, 'createRole'])->name('createRole');
        Route::put('/updateRole/{roleId}', [MainController::class, 'updateRole'])->name('updateRole');
        Route::get('/showRole/{role_id}', [MainController::class, 'showRole'])->name('showRole');
        Route::get('/showUsers/{role_id}', [MainController::class, 'showUsersByRole'])->name('showUsersByRole');
        Route::get('/allRoles', [MainController::class, 'allRoles'])->name('allRoles');
    });
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
<?php

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

Route::post('/createRole', [MainController::class, 'createRole']);
Route::put('/updateRole/{roleId}', [MainController::class, 'updateRole']);
Route::get('/showRole/{role_id}', [MainController::class, 'showRole']);
Route::get('/showUsers/{role_id}', [MainController::class, 'showUsersByRole']);
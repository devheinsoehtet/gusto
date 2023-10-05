<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('dashboard.index');
});

Auth::routes();


// Route::middleware(['auth'])->group(function () {
//     Route::resource('post', PostController::class);
// });


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::resource('cars', CarController::class)->middleware('auth');

Route::resource('bookings', BookingController::class)->middleware('auth');

Route::resource('roles', RoleController::class)->middleware('auth');

Route::put('roles/{role}/permissions', [PermissionController::class, 'assign'])->name('roles.permissions.assign')->middleware('auth');

Route::resource('roles.permissions', PermissionController::class)->only('index')->middleware('auth');

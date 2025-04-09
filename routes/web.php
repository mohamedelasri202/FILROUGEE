<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ServiceProviderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
// showing the dashboards 
Route::get('/dashboard/admin', [AdminController::class, 'showAdminDashboard'])->name('dashboard.admin');
Route::get('/dashboard/user', [UserController::class, 'showUserDashboard'])->name('dashboard.user');
Route::get('/dashboard/vendor', [VendorController::class, 'showVendorDashboard'])->name('dashboard.vendor');
Route::get('/dashboard/service_provider', [ServiceProviderController::class, 'showServiceProviderDashboard'])->name('dashboard.service_provider');

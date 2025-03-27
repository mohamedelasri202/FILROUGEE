<?php

use App\Models\Shoopingcart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicecartController;
use App\Http\Controllers\ShoopingCartController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\VendorDashboardController;

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
    return view('home');
})->name('welcome');






Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
// showing the dashboards 
// Route::get('/dashboard/admin', [AdminController::class, 'showAdminDashboard'])->name('dashboard.admin')->middleware('auth', 'role:admin');
// // the route for the user to get to the home page 
// Route::get('/dashboard/user', [UserController::class, 'showUserDashboard'])->name('home');

// Route::get('/dashboard/users', [AdminController::class, 'showUsers'])->name('users')->middleware('auth', 'role:admin');

// // Route::get('/dashboard/vendor', [VendorController::class, 'index'])->name('vendor');
// Route::post('/logout', [UserController::class, 'logout'])->name('logoutt');

// // show the page that shows all the products 

// Route::get('/products', [UserController::class, 'showProducts'])->name('products')->middleware('auth');

// // show the page that shows services
// Route::get('/services', [UserController::class, 'services'])->name('services');
// // controle the user status
// Route::put('/users/status', [UserController::class, 'updateStatus'])->name('users.updateStatus')->middleware('auth', 'role:admin');

// routes for the  product  routes 
Route::post('/dashboard/vendor', [ProductController::class, 'addproduct'])->name('addproduct')->middleware('auth', 'role:vendor');

<?php

use App\Models\Shoopingcart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
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
    return view('welcome');
})->name('welcome');

// Route::get('/', [UserController::class, 'home'])->name('welcome');






Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::put('edite/profile/{id}', [VendorDashboardController::class, 'editeprofile'])->name('edite_profile')->middleware('auth', 'role:vendor');
// showing the dashboards 
Route::get('/dashboard/admin', [AdminController::class, 'showAdminDashboard'])->name('dashboard.admin')->middleware('auth', 'role:admin');
// the route for the user to get to the home page 
Route::get('/dashboard/user', [UserController::class, 'showUserDashboard'])->name('home');

Route::get('/dashboard/users', [AdminController::class, 'showUsers'])->name('users')->middleware('auth', 'role:admin');

// Route::get('/dashboard/vendor', [VendorController::class, 'index'])->name('vendor');
Route::post('/logout', [UserController::class, 'logout'])->name('logoutt');

// show the page that shows all the products 

Route::get('/products', [UserController::class, 'showProducts'])->name('products')->middleware('auth');

// show the page that shows services
Route::get('/services', [UserController::class, 'services'])->name('services');
// controle the user status
Route::put('/users/status', [UserController::class, 'updateStatus'])->name('users.updateStatus')->middleware('auth', 'role:admin');

// routes for adding a product 
Route::post('/dashboard/vendor', [ProductController::class, 'addproduct'])->name('addproduct')->middleware('auth', 'role:vendor');
Route::get('/dashboard/vendor/products', [ProductController::class, 'showProducts'])->name('vendor.products')->middleware('auth', 'role:vendor');

// routes for showing the dashboard aand sending data to the view 
// Route::get('/dashboard/vendor', [ProductController::class, 'index'])->name('index')->middleware('auth', 'role:vendor');

Route::get('/dashboard/vendor', [VendorDashboardController::class, 'index'])->name('dashboard.vendor');

// update the product 

Route::put('/dashboard/vendor/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct')->middleware('auth', 'role:vendor');


// delete the product
Route::delete('vendor/product/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct')->middleware('auth', 'role:vendor');

// *************************************** service provider routes ********************************************
Route::get('/dashboard/service_provider', [ServiceController::class, 'index'])->name('dashboard.service_provider')->middleware('auth', 'role:service_provider');
Route::post('/addingservice', [ServiceController::class, 'add_service'])->name('add_service');
Route::delete('/dashboard/service_provider/services/{id}', [ServiceController::class, 'deleteservice'])->name('deleteservice')->middleware('auth', 'role:service_provider');
Route::put('/dashboard/service_provider/services/{id}', [ServiceController::class, 'updateservice'])->name('updateservice')->middleware('auth', 'role:service_provider');

// ****************************************addind the product to the shooping cart******************************

Route::post('/user/shoopingcart', [ProductController::class, 'addtoshoopingcart'])->name('addshoopingcart')->middleware('auth', 'role:user');

// /**************ading the service to service cart  */
Route::post('/services', [ServicecartController::class, 'addservicecart'])->name('addservice')->middleware('auth', 'role:user');
// ***************** the route for the view of th cart **************************/
Route::get('/cart', [CartController::class, 'index'])->name('cart');

// remove the product from the cart 
Route::delete('cart/remove/{id}', [CartController::class, 'removefromcart'])->name('r_product_cart');
// updating the quntity of each product in the cart 
Route::put('update/quantity/{id}', [CartController::class, 'updat_quantity'])->name('updat_quantity')->middleware('auth', 'role:user');
//  the view for the conifermation page 
Route::get('confirmation', [OrderController::class, 'checkout'])->name('checkout')->middleware('auth', 'role:user');

// checkout 


Route::delete('/cart/{id}', [ServicecartController::class, 'deleteservicecart'])
    ->name('deletecart')
    ->middleware('auth', 'role:user');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::post('/checkout', [OrderController::class, 'add_order'])->name('CHECK')->middleware('auth', 'role:user');



// the service booking route
Route::get('/booking-services/{id}', [ServiceController::class, 'book_service'])->name('booking')->middleware('auth', 'role:user');
Route::get('product/{id}', [ProductController::class, 'index'])->name('product')->middleware('auth', 'role:user');


// the updating route for the booking from the  service _provider 
Route::put('upadating/service/status/{id}', [ServiceProviderController::class, 'update'])->name('orders.update')->middleware('auth', 'role:service_provider');
// the route for the my orders page 
Route::get('/myorders', [UserController::class, 'myorders'])->name('myorders')->middleware('auth', 'role:user');
// route for the review form 

Route::post('/add-review', [ReviewController::class, 'add_review'])->name('review')->middleware('auth', 'role:user');

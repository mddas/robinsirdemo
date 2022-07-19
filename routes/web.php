
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\PermissonController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShoapdetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminTrackerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserdashboardController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
            
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

// Route::get('login', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard');

Route::get('userlogin',[UserController::class,'userLogin'])->name('userlogin');
Route::get('userregister',[UserController::class,'userRegister']);

Route::get('logout',[AuthenticatedSessionController::class,'destroy']);

Route::get('/admin', function () {
    return view('dashboard/index');
})->middleware(['auth'])->name('dashboard');

//User
Route::get('user',[UserController::class,'show']);
Route::get('insertuser',[UserController::class,'Insert']);
Route::get('useredit',[UserController::class,'Edit']);
Route::get('userdelete',[UserController::class,'Delete']);
Route::get('useredit',[UserController::class,'UserEdit']);
//Role
Route::get('role',[RoleController::class,'show']);
Route::get('roleedit',[RoleController::class,'edit']);
Route::get('insertrole',[RoleController::class,'Insert']);
Route::get('roledelete',[RoleController::class,'Delete']);
//Peermisson
Route::get('permisson',[PermissonController::class,'show']);
Route::get('insertpermisson',[PermissonController::class,'Insert']);
Route::get('permissonedit',[PermissonController::class,'Edit']);
Route::get('permissondelete',[PermissonController::class,'Delete']);

//product
Route::get('products' ,[ProductController::class , 'index']);
Route::post('productinsert' ,[ProductController::class, 'insert']);
Route::get('productadd' ,[ProductController::class, 'productAdd']);
Route::get('productdelete', [ProductController::class , 'destroy']);



require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

// Route::get('/recreate-db', function () {
//     Artisan::call('migrate:fresh', [
//         '--force' => true,
//         '--seed' => true
//     ]);
//     $alert = (object) ['status' => 'success', 'message' => 'Database migrated'];
//     return redirect('/')->with(compact('alert'));
// });
// Route::get('/clear-config', function () {
//     Artisan::call('config:cache');
//     $alert = (object) ['status' => 'success', 'message' => 'Config clear'];
//     return redirect('/')->with(compact('alert'));
// });
// Route::get('/storage-link', function () {
//     Artisan::call('storage:link');
//     $alert = (object) ['status' => 'success', 'message' => 'Storage linked'];
//     return redirect('/')->with(compact('alert'));
// });

// Route::get('/', function () {
//     return view('welcome');
// });
// if (!Auth::check()) {
//     return redirect('/');
// }

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Loged in user's profile
    // Route::group(['prefix' => '/profile', 'as' => 'profile.'], function () {
    //     Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
    //     Route::post('/password-update', [App\Http\Controllers\ProfileController::class, 'passwordUpdate'])->name('password.update');
    // });

    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // POS
    // Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos');
    // Route::post('/pos/search-product', [App\Http\Controllers\PosController::class, 'searchProduct'])->name('search.product');

    // Product
    Route::post('/product/sub-categories', [App\Http\Controllers\ProductController::class, 'subCategories'])->name('product.subCategories');

    Route::resources([
        'brand' => App\Http\Controllers\BrandController::class,
        'category' => App\Http\Controllers\CategoryController::class,
        'sub-category' => App\Http\Controllers\SubCategoryController::class,
        'product' => App\Http\Controllers\ProductController::class,
        // 'report' => App\Http\Controllers\ReportController::class,
        // 'expense' => App\Http\Controllers\ExpenseController::class,
        'customer' => App\Http\Controllers\CustomerController::class,
        'supplier' => App\Http\Controllers\SupplierController::class,
        'employee' => App\Http\Controllers\EmployeeController::class,
        // 'attendance' => App\Http\Controllers\AttendanceController::class,
        // 'salary' => App\Http\Controllers\SalaryController::class,
    ]);

    Route::group(['prefix' => '/setting/role', 'as' => 'setting.role.'], function () {
        // Role
        Route::get('/', [App\Http\Controllers\RoleController::class, 'index'])->name('index');
        Route::post('/store', [App\Http\Controllers\RoleController::class, 'store'])->name('store');
        Route::get('/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('edit');
        Route::patch('/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('update');
        Route::delete('/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('destroy');
    });
});

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
//     $exitCode = Artisan::call('migrate:fresh', [
//         '--force' => true,
//         '--seed' => true
//     ]);
//     $alert = (object) ['status' => 'success', 'message' => $exitCode];
//     return redirect('/')->with(compact('alert'));
// });
// Route::get('/clear-config', function () {
//     $exitCode = Artisan::call('config:cache');
//     $alert = (object) ['status' => 'success', 'message' => $exitCode];
//     return redirect('/')->with(compact('alert'));
// });
// Route::get('/storage-link', function () {
//     $exitCode = Artisan::call('storage:link');
//     $alert = (object) ['status' => 'success', 'message' => $exitCode];
//     return redirect('/')->with(compact('alert'));
// });
// Route::get('/get-composer', function () {
//     $output = null;
//     $retval = null;
//     exec('pwd', $output, $retval);
//     $alert = (object) ['status' => 'success', 'message' => $output[0]];
//     return redirect('/')->with(compact('alert'));
// });

// Route::get('/', function () {
//     return view('welcome');
// });
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
    Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos');
    Route::post('/pos/search-product', [App\Http\Controllers\PosController::class, 'searchProduct'])->name('search.product');

    // Product
    Route::post('/product/sub-categories', [App\Http\Controllers\ProductController::class, 'subCategories'])->name('product.subCategories');

    Route::resources([
        'category' => App\Http\Controllers\CategoryController::class,
        'sub-category' => App\Http\Controllers\SubCategoryController::class,
        'product' => App\Http\Controllers\ProductController::class,
        // 'report' => App\Http\Controllers\ReportController::class,
        'expense' => App\Http\Controllers\ExpenseController::class,
        'customer' => App\Http\Controllers\CustomerController::class,
        'supplier' => App\Http\Controllers\SupplierController::class,
        'employee' => App\Http\Controllers\EmployeeController::class,
        'attendance' => App\Http\Controllers\AttendanceController::class,
        'salary' => App\Http\Controllers\SalaryController::class,
    ]);
});

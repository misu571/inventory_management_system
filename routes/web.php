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

// Route::get('/create-db', function () {
//     Artisan::call('migrate:fresh', [
//         '--force' => true,
//         '--seed' => true
//     ]);
//     $alert = (object) ['status' => 'success', 'message' => 'Database migrated'];
//     return redirect('/')->with(compact('alert'));
// });
// Route::get('/optimize-clear', function () {
//     Artisan::call('optimize:clear');
//     $alert = (object) ['status' => 'success', 'message' => 'App optimized'];
//     return redirect('/')->with(compact('alert'));
// });
// Route::get('/optimize-env', function () {
//     Artisan::call('config:cache');
//     $alert = (object) ['status' => 'success', 'message' => 'Env optimized'];
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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    // Loged-in user's profile
    Route::group(['prefix' => '/profile', 'as' => 'profile.'], function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
        Route::patch('/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
        Route::patch('/{user}/password/update', [App\Http\Controllers\ProfileController::class, 'passwordUpdate'])->name('password.update');
        Route::patch('/{user}/image/update', [App\Http\Controllers\ProfileController::class, 'imageUpdate'])->name('image.update');
    });

    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // POS
    // Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos');
    // Route::post('/pos/search-product', [App\Http\Controllers\PosController::class, 'searchProduct'])->name('search.product');

    // Employee
    Route::patch('/employee/{employee}/email/update', [App\Http\Controllers\EmployeeController::class, 'emailUpdate'])->name('employee.email.update');
    Route::patch('/employee/{employee}/password/update', [App\Http\Controllers\EmployeeController::class, 'passwordUpdate'])->name('employee.password.update');
    Route::patch('/employee/{employee}/image/update', [App\Http\Controllers\EmployeeController::class, 'imageUpdate'])->name('employee.image.update');
    Route::get('/employee/{employee}/roles-permissions/show', [App\Http\Controllers\EmployeeController::class, 'rolesPermissionsShow'])->name('employee.roles_permissions.show');
    Route::post('/employee/{employee}/roles-permissions/assign', [App\Http\Controllers\EmployeeController::class, 'rolesPermissionsAssign'])->name('employee.roles_permissions.assign');
    Route::delete('/employee/{employee}/roles-permissions/{role}/delete', [App\Http\Controllers\EmployeeController::class, 'rolesPermissionsDestroy'])->name('employee.roles_permissions.revoke');
    Route::post('/employee/{employee}/roles-permissions/direct/assign', [App\Http\Controllers\EmployeeController::class, 'rolesPermissionsDirectAssign'])->name('employee.roles_permissions.direct.assign');
    Route::delete('/employee/{employee}/roles-permissions/{permission}/direct/delete', [App\Http\Controllers\EmployeeController::class, 'rolesPermissionsDirectDestroy'])->name('employee.roles_permissions.direct.revoke');

    // Product
    Route::post('/product/sub-categories', [App\Http\Controllers\ProductController::class, 'subCategories'])->name('product.subCategories');
    Route::patch('/product/{product}/image/update', [App\Http\Controllers\ProductController::class, 'imageUpdate'])->name('product.image.update');
    Route::patch('/product/{product}/parts-number/update', [App\Http\Controllers\ProductController::class, 'partsNumber'])->name('product.partsNumber.update');
    Route::patch('/product/{product}/purchase-order-number/update', [App\Http\Controllers\ProductController::class, 'purchaseOrderNumber'])->name('product.purchaseOrderNumber.update');

    Route::resources([
        'department' => App\Http\Controllers\DepartmentController::class,
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

    // Role and Permission
    Route::group(['prefix' => '/setting/role-permission', 'as' => 'setting.role-permission.'], function () {
        // Access, Create, Update & Delete
        Route::get('/', [App\Http\Controllers\RolesAndPermissionsController::class, 'index'])->name('index');
        Route::post('/role/store', [App\Http\Controllers\RolesAndPermissionsController::class, 'roleStore'])->name('role.store');
        Route::get('/role/{role}/edit', [App\Http\Controllers\RolesAndPermissionsController::class, 'roleEdit'])->name('role.edit');
        Route::patch('/role/{role}/update', [App\Http\Controllers\RolesAndPermissionsController::class, 'roleUpdate'])->name('role.update');
        Route::delete('/role/{role}/delete', [App\Http\Controllers\RolesAndPermissionsController::class, 'roleDestroy'])->name('role.destroy');
        Route::post('/permission/store', [App\Http\Controllers\RolesAndPermissionsController::class, 'permissionStore'])->name('permission.store');
        Route::patch('/permission/{permission}/update', [App\Http\Controllers\RolesAndPermissionsController::class, 'permissionUpdate'])->name('permission.update');
        Route::delete('/permission/{permission}/delete', [App\Http\Controllers\RolesAndPermissionsController::class, 'permissionDestroy'])->name('permission.destroy');
        
        // Assign or revoke permission
        Route::post('/permission/assign/role/{role}/update', [App\Http\Controllers\RolesAndPermissionsController::class, 'permissionAssignRole'])->name('permission.assign.role');
        Route::delete('/permission/assign/role/{role}/{permission}/delete', [App\Http\Controllers\RolesAndPermissionsController::class, 'permissionAssignRoleDestroy'])->name('permission.assign.role.revoke');
    });
});

<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InstituteController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VariantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/institute', [InstituteController::class, 'index'])->name('institute');
    Route::get('/institute/create', [InstituteController::class, 'create'])->name('institute.create');
    Route::post('/institute/store', [InstituteController::class, 'store'])->name('institute.store');
    Route::get('/institute/edit/{id}', [InstituteController::class, 'edit'])->name('institute.edit');
    Route::post('/institute/update/{id}', [InstituteController::class, 'update'])->name('institute.update');
    Route::get('/institute/delete/{id}', [InstituteController::class, 'destroy'])->name('institute.delete');


    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/product/change-status/{id}', [ProductController::class, 'changeStatus'])->name('product.changeStatus');


    Route::get('/variant', [VariantController::class, 'index'])->name('variant');
    Route::get('/variant/create', [VariantController::class, 'create'])->name('variant.create');
    Route::post('/variant/store', [VariantController::class, 'store'])->name('variant.store');
    Route::get('/variant/edit/{id}', [VariantController::class, 'edit'])->name('variant.edit');
    Route::post('/variant/update/{id}', [VariantController::class, 'update'])->name('variant.update');
    Route::get('/variant/delete/{id}', [VariantController::class, 'destroy'])->name('variant.delete');


    //product variant
    Route::post('/product-store', [VariantController::class, 'productVariantStore'])->name('product-variant.store');
    Route::get('/product-variant/edit/{id}', [VariantController::class, 'productVariantEdit'])->name('product-variant.edit');
    Route::post('/product-variant/update/{id}', [VariantController::class, 'productVariantUpdate'])->name('update_product_variant');
    Route::get('/product-variant/delete/{id}', [VariantController::class, 'productVariantDestroy'])->name('product-variant.destroy');


    // Role

    Route::get('/role', [RoleController::class, 'index'])->name('role');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');


    // Permission
    Route::get('/permission', [PermissionController::class, 'index'])->name('permission');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/permission/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.delete');


    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

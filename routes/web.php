<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\UnitController;

Route::get('/', function () {
    return view('auth.login');
});




 // Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});


// Supplier all route
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'supplierAll')->name('supplier.all');
    Route::get('/supplier/add', 'supplierAdd')->name('supplier.add');
    Route::post('/supplier/store', 'supplierStore')->name('supplier.store');

    Route::get('/supplier/edit/{id}', 'supplierEdit')->name('supplier.edit');
    Route::post('/supplier/update/', 'supplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'supplierDelete')->name('supplier.delete');
});


// Customer all route
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'customerAll')->name('customer.all');
    Route::get('/customer/add', 'customerAdd')->name('customer.add');
    Route::post('/customer/store', 'customerStore')->name('customer.store');

    Route::get('/customer/edit/{id}', 'customerEdit')->name('customer.edit');
    Route::post('/customer/update', 'customerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}', 'customerDelete')->name('customer.delete');
});


// Unit all route
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'unitAll')->name('unit.all');
    Route::get('/unit/add', 'unitAdd')->name('unit.add');
    Route::post('/unit/store', 'unitStore')->name('unit.store');

    Route::get('/unit/edit/{id}', 'unitEdit')->name('unit.edit');
    Route::post('/unit/update', 'unitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}', 'unitDelete')->name('unit.delete');
});

// Category all route
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'categoryAll')->name('category.all');
    Route::get('/category/add', 'categoryAdd')->name('category.add');
    Route::post('/category/store', 'categoryStore')->name('category.store');

    Route::get('/category/edit/{id}', 'categoryEdit')->name('category.edit');
    Route::post('/category/update', 'categoryUpdate')->name('category.update');
    Route::get('/category/delete/{id}', 'categoryDelete')->name('category.delete');
});

// Products all route
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'productAll')->name('product.all');
    Route::get('/product/add', 'productAdd')->name('product.add');
    Route::post('/product/store', 'productStore')->name('product.store');

    Route::get('/product/edit/{id}', 'productEdit')->name('product.edit');
    Route::post('/product/update', 'productUpdate')->name('product.update');
    Route::get('/product/delete/{id}', 'productDelete')->name('product.delete');
});


// purchase all route
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'purchaseAll')->name('purchase.all');
    Route::get('/purchase/add', 'purchaseAdd')->name('purchase.add');
    Route::post('/purchase/store', 'purchaseStore')->name('purchase.store');
    Route::get('/purchase/delete/{id}', 'purchaseDelete')->name('purchase.delete');

    Route::get('/purchase/pending', 'purchasePending')->name('purchase.pending');
    Route::get('/purchase/approve/{id}', 'purchaseApprove')->name('purchase.approve');
});
// Invoice Routes
Route::controller(InvoiceController::class)->group(function () {
    Route::get('/invoice/all', 'invoiceAll')->name('invoice.all');
    Route::get('/invoice/add', 'invoiceAdd')->name('invoice.add');
    Route::post('/invoice/store', 'invoiceStore')->name('invoice.store');
    Route::get('/invoice/delete/{id}', 'invoiceDelete')->name('invoice.delete');
    Route::get('/invoice/pending/list', 'invoicePendingList')->name('invoice.pending.list');
    Route::get('/invoice/approve/{id}', 'invoiceApprove')->name('invoice.approve');
    Route::post('/approval/store/{id}', 'approvalStore')->name('approval.store');

});


// Default all route
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'getCategory')->name('get-category');
    Route::get('/get-product', 'getProduct')->name('get-product');
    Route::get('/check-product-stock', 'getStock')->name('check-product-stock');

});




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';


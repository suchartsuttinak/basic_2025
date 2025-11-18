<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\CaseMasterController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\WareHouseController;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::get('/verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form');

Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');

//-- Admin All Route --//
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');
    Route::post('/admin/password/update', [AdminController::class, 'PasswordUpdate'])->name('admin.password.update');
});
//-- Brand All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(BrandController::class)->group(function () {
        Route::get('/all/brand', 'AllBrand')->name('all.brand');
        Route::get('/add/brand', 'AddBrand')->name('add.brand');
        Route::post('/store/brand', 'StoreBrand')->name('store.brand');
        Route::get('/edit/brand/{id}', 'EditBrand')->name('edit.brand');
        Route::post('/update/brand', 'UpdateBrand')->name('update.brand');
        Route::get('/delete/brand/{id}', 'DeleteBrand')->name('delete.brand');

    });
});
//-- WareHouse All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(WareHouseController::class)->group(function () {
        Route::get('/all/warehouse', 'AllWarehouse')->name('all.warehouse');
        Route::get('/add/warehouse', 'AddWarehouse')->name('add.warehouse');
        Route::post('/store/warehouse', 'StoreWarehouse')->name('store.warehouse');
        Route::get('/edit/warehouse/{id}', 'EditWarehouse')->name('edit.warehouse');
        Route::post('/update/warehouse', 'UpdateWarehouse')->name('update.warehouse');
        Route::get('/delete/warehouse/{id}', 'DeleteWarehouse')->name('delete.warehouse');
       
    });
});
//-- Supplier All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/all/supplier', 'AllSupplier')->name('all.supplier'); 
        Route::get('/add/supplier', 'AddSupplier')->name('add.supplier'); 
        Route::post('/store/supplier', 'StoreSupplier')->name('store.supplier');
        Route::get('/edit/supplier/{id}', 'EditSupplier')->name('edit.supplier');
        Route::post('/update/supplier', 'UpdateSupplier')->name('update.supplier');
        Route::get('/delete/supplier/{id}', 'DeleteSupplier')->name('delete.supplier');
       
        
    });
});

//-- Customer All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/all/customer', 'AllCustomer')->name('all.customer'); 
        Route::get('/add/customer', 'AddCustomer')->name('add.customer');        
        Route::post('/store/customer', 'StoreCustomer')->name('store.customer'); 
        Route::get('/edit/customer/{id}', 'EditCustomer')->name('edit.customer');  
        Route::post('/update/customer', 'UpdateCustomer')->name('update.customer'); 
        Route::get('/delete/customer/{id}', 'DeleteCustomer')->name('delete.customer');  
           
    });
});

//-- Category All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category'); 
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });
});

//-- Product All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->group(function () { 
        Route::get('/all/product', 'AllProduct')->name('all.product'); 
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product'); 
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');    
    });
});

//-- Client All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(ClientController::class)->group(function () { 
        Route::get('/client/index', 'ClientAll')->name('client.all');  
        Route::get('/client/add', 'ClientAdd')->name('client.add');
        Route::post('/client/store', 'ClientStore')->name('client.store');  
        Route::get('/client/edit/{id}', 'ClientEdit')->name('client.edit'); 
        Route::post('/client/update', 'ClientUpdate')->name('client.update');
        Route::get('/client/delete/{id}', 'ClientDelete')->name('client.delete');
    });
});
//-- Casemaster All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(CaseMasterController::class)->group(function () { 
        Route::get('/case/all', 'CaseAll')->name('case.all'); 
        Route::get('/case/add', 'CaseAdd')->name('case.add');  
        
    });
     //dynamic route
        Route::get('/get-districts/{province}', [CaseMasterController::class, 'getDistricts']);
        Route::get('/get-subdistricts/{district}', [CaseMasterController::class, 'getSubdistricts']);
        Route::get('/get-zipcode/{subdistrict}', [CaseMasterController::class, 'getZipcode']);
        // Route::post('/client/store', [CaseMasterController::class, 'ClientStore'])->name('client.store');
});


//-- Recipient All Route --//
Route::middleware('auth')->group(function () {
    Route::controller(RecipientController::class)->group(function () { 
        Route::get('/recipient/all', 'RecipientAll')->name('recipient.all'); 
        Route::get('/recipient/add', 'RecipientAdd')->name('recipient.add');
        Route::post('/recipient/store', 'RecipientStore')->name('recipient.store');
        Route::get('/recipient/edit/{id}', 'RecipientEdit')->name('recipient.edit');


  
        
    });
     //dynamic route
        Route::get('/get-districts/{province}', [RecipientController::class, 'getDistricts']);
        Route::get('/get-subdistricts/{district}', [RecipientController::class, 'getSubdistricts']);
        Route::get('/get-zipcode/{subdistrict}', [RecipientController::class, 'getZipcode']);
        // Route::post('/client/store', [RecipientController::class, 'ClientStore'])->name('client.store');
});
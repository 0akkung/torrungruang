<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RopeSpecController;
use App\Http\Controllers\SaleOrderController;
use Illuminate\Support\Facades\Route;

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

/**
 * Everyone needs to login before using the application
 */
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('po', PurchaseOrderController::class);
    Route::get('/po-search', [PurchaseOrderController::class, 'search'])->name('purchase-order.search');


    Route::resource('customers', CustomerController::class);

    Route::get('/customers/{customer}/create-address', [CustomerController::class, 'createAddress'])
    ->name('customers.createAddress');
    Route::post('/customers/{customer}/store-address', [CustomerController::class, 'storeAddress'])
    ->name('customers.storeAddress');
    Route::get('/customers/{customer}/addresses/{address}/edit', [CustomerController::class, 'editAddress'])
    ->name('customers.editAddress');
    Route::put('/customers/{customer}/addresses/{address}', [CustomerController::class, 'updateAddress'])
    ->name('customers.updateAddress');
    Route::get('/customers-search', [CustomerController::class, 'search'])->name('customers.search');

    Route::resource('specs', RopeSpecController::class);
    Route::get('/specs-search', [RopeSpecController::class, 'search'])->name('specs.search');


    Route::resource('so', SaleOrderController::class);
    Route::get('/so-search', [SaleOrderController::class, 'search'])->name('sale-order.search');

    Route::resource('deliveries', DeliveryController::class);
    Route::get('/delivery-search', [DeliveryController::class, 'search'])->name('delivery.search');

    Route::resource('invoices', InvoiceController::class);
    Route::resource('receipts', ReceiptController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

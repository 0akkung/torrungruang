<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\SaleOrderController;
use App\Http\Controllers\SpecController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', function () {
    return view('customer.index');
});
Route::get('/customer/detail', function () {
    return view('customer.detail');
});
Route::get('/customer/add-customer', function () {
    return view('customer.add');
});
Route::get('/customer/add-address', function () {
    return view('customer.address');
});
Route::get('/customer/edit', function () {
    return view('customer.edit');
});
Route::get('/spec', function () {
    return view('spec.index');
});
Route::get('/spec/detail', function () {
    return view('spec.detail');
});
Route::get('/spec/edit', function () {
    return view('spec.edit');
});
Route::get('/spec/add', function () {
    return view('spec.add');
});
Route::get('/so', function () {
    return view('sale-orders.index');
});
Route::get('/so/add', function () {
    return view('sale-orders.add');
});
Route::get('/invoice', function () {
    return view('invoice.index');
});
Route::get('/invoice/add', function () {
    return view('invoice.add');
});
Route::get('/delivery', function () {
    return view('delivery.index');
});
Route::get('/delivery/add', function () {
    return view('delivery.add');
});
Route::get('/receipt', function () {
    return view('receipt.index');
});
Route::get('/receipt/add', function () {
    return view('receipt.add');
});
Route::get('/po/detail', function () {
    return view('purchase-orders.detail');
});
Route::get('/po/add', function () {
    return view('purchase-orders.add');
});
Route::get('/po/delete', function () {
    return view('purchase-orders.delete');
});


Route::resource('/po', PurchaseOrderController::class);
// Route::resource('/customer', CustomerController::class);
// Route::resource('/spec', SpecController::class);
// Route::resource('/so', SaleOrderController::class);
// Route::resource('/delivery', DeliveryController::class);
// Route::resource('/invoice', InvoiceController::class);
// Route::resource('/receipt', ReceiptController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

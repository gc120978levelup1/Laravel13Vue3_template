<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('template', 'Template')->name('template');
});

use App\Http\Controllers\ComplaintController;
Route::middleware('auth')->group(function () {
  Route::get ('/complaint', [ComplaintController::class, 'index'])->name('complaint.index');
  Route::get ('/complaint/create', [ComplaintController::class, 'create'])->name('complaint.create');
  Route::post('/complaint/post', [ComplaintController::class, 'store'])->name('complaint.post');
  Route::get ('/complaint/{complaint}/edit', [ComplaintController::class, 'edit'])->name('complaint.edit');
  Route::post('/complaint/{complaint}/update', [ComplaintController::class, 'update'])->name('complaint.update');
  Route::get ('/complaint/{complaint}/show', [ComplaintController::class, 'show'])->name('complaint.show');
});

use App\Http\Controllers\MapController;
Route::middleware('auth')->group(function () {
  Route::get ('/map', [MapController::class, 'index'])->name('map.index');
});

use App\Http\Controllers\CustomerController;
Route::middleware('auth')->group(function () {
  Route::get ('/customer', [CustomerController::class, 'index'])->name('customer.index');
  Route::get ('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
  Route::post('/customer/post', [CustomerController::class, 'store'])->name('customer.post');
  Route::get ('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
  Route::post('/customer/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
  Route::post('/customer/{customer}/update_ajax', [CustomerController::class, 'update_ajax'])->name('customer.update_ajax');
  Route::get ('/customer/{customer}/show', [CustomerController::class, 'show'])->name('customer.show');
});

require __DIR__.'/settings.php';

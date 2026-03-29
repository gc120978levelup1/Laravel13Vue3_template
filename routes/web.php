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

require __DIR__.'/settings.php';

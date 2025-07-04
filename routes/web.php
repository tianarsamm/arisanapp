<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArisanGroupController;
use App\Http\Controllers\ArisanMemberController;
use App\Http\Controllers\WinnerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/arisan', [ArisanGroupController::class, 'index'])->name('arisan.index');
    Route::post('/arisan/join/{id}', [ArisanMemberController::class, 'join'])->name('arisan.join');
});

Route::get('/arisan/saya', [ArisanMemberController::class, 'myGroups'])->name('arisan.my');

Route::middleware(['auth'])->group(function () {
    Route::get('/iuran', [PaymentController::class, 'index'])->name('iuran.index');
    Route::post('/iuran', [PaymentController::class, 'store'])->name('iuran.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/winners', [WinnerController::class, 'index'])->name('winners.index');
    Route::post('/winners/{groupId}/draw', [WinnerController::class, 'undi'])->name('winners.undi');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/groups/create', [ArisanGroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [ArisanGroupController::class, 'store'])->name('groups.store');
});



require __DIR__.'/auth.php';

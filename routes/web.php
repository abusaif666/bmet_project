<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BmetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['isAdmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('bmet', [BmetController::class, 'index'])->name('bmet.index');
    Route::get('bmet/create', [BmetController::class, 'create'])->name('bmet.create');
    Route::post('bmet', [BmetController::class, 'store'])->name('bmet.store');
    Route::get('bmet/{id}/edit', [BmetController::class, 'edit'])->name('bmet.edit');
    Route::put('bmet/{id}', [BmetController::class, 'update'])->name('bmet.update');
    Route::delete('bmet/{id}', [BmetController::class, 'destroy'])->name('bmet.destroy');

    Route::get('/download-card/{clearance_id}', [BmetController::class, 'downloadCard'])->name('bmet.card.download');

    // User Route
    Route::get('/add-user', [UserController::class, 'create'])->name('user.create');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::put('/user-update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user-destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/general-seting', [SettingController::class, 'general'])->name('general.setting');
    Route::post('/general-store', [SettingController::class, 'generalStore'])->name('general.store');
    Route::get('/website-seting', [SettingController::class, 'website'])->name('website.setting');
    Route::post('/website-store', [SettingController::class, 'websiteStore'])->name('website.store');

});

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/ec-card/verify/{clearance_id}', [BmetController::class, 'show'])->name('bmet.show');
Route::get('/card/{clearance_id}', [BmetController::class, 'card'])->name('bmet.card');

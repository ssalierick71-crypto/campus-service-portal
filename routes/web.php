<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public pages
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authentication screens (prototype)
|--------------------------------------------------------------------------
*/

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::get('/forgot-password', [PageController::class, 'forgotPassword'])->name('password.request');
Route::get('/reset-password', [PageController::class, 'resetPassword'])->name('password.reset');

/*
|--------------------------------------------------------------------------
| Requester area
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/notifications', [PageController::class, 'notifications'])->name('notifications');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::prefix('requests')->name('requests.')->group(function () {
    Route::get('/', [TicketController::class, 'index'])->name('index');
    Route::get('/create', [TicketController::class, 'create'])->name('create');
    Route::get('/{ticket}', [TicketController::class, 'show'])->name('show');
    Route::get('/{ticket}/edit', [TicketController::class, 'edit'])->name('edit');
});

/*
|--------------------------------------------------------------------------
| Handler (staff) area
|--------------------------------------------------------------------------
*/

Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard');

/*
|--------------------------------------------------------------------------
| Administration area
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

    Route::prefix('departments')->name('departments.')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('create');
        Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('edit');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    });
});

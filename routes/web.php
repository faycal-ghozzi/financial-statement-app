<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/manage-access', [SuperAdminController::class, 'index'])->name('manage.access');
    Route::post('/approve-user', [SuperAdminController::class, 'approve'])->name('user.approve');
    Route::post('/deny-user', [SuperAdminController::class, 'deny'])->name('user.deny');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/fs-entry-point', [AdminController::class, 'index'])->name('fs.entry.index');
    Route::post('/fs-entry-point', [AdminController::class, 'store'])->name('fs.entry.store');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/financial-statements', [UserController::class, 'index'])->name('fs.view');
    Route::post('/financial-statements', [UserController::class, 'submit'])->name('fs.submit');
});

// Public login/logout routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('super-admin', function () {
    return '<h1>Halo Super Admin</h1>';
})->middleware(['auth', 'verified', 'role:super-admin']);

Route::get('admin-finance', function () {
    return '<h1>Halo Admin Finance</h1>';
})->middleware(['auth', 'verified', 'role:admin-finance|super-admin|manager']);

Route::get('admin-event', function () {
    return '<h1>Halo Admin Event</h1>';
})->middleware(['auth', 'verified', 'role:admin-event|super-admin|manager']);

Route::get('manager', function () {
    return '<h1>Halo Manager</h1>';
})->middleware(['auth', 'verified', 'role:manager']);

Route::get('user', function () {
    return '<h1>Halo User</h1>';
})->middleware(['auth', 'verified', 'role:user']);

Route::get('tulisan', function () {
    return view('tulisan');
})->middleware(['auth', 'verified', 'permission:read-user']);

require __DIR__.'/auth.php';

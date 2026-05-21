<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TugasController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TugasController::class, 'dashboard'])->name('dashboard');

    // Tugas Group
    Route::prefix('tugas')->name('tugas.')->group(function () {
        Route::get('/create', [TugasController::class, 'create'])->name('create');
        Route::post('/store', [TugasController::class, 'store'])->name('store');
        Route::get('/{id}', [TugasController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TugasController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [TugasController::class, 'update'])->name('update');
        Route::post('/{id}/selesai', [TugasController::class, 'selesai'])->name('selesai');
        Route::delete('/{id}', [TugasController::class, 'destroy'])->name('destroy');
    });

    // Categories Group
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::post('/store', [KategoriController::class, 'store'])->name('store');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
    });

    // Profile Group
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('update');
    });
});
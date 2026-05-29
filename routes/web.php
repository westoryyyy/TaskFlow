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

// Email Verification Routes (Only require 'auth')
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return auth()->user()->hasVerifiedEmail()
            ? redirect('/dashboard')
            : view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard')->with('success', 'Email Anda berhasil diverifikasi!');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/dashboard');
        }
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Link verifikasi baru telah dikirim ke email Anda!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Protected Routes (Require 'auth' and 'verified')
Route::middleware(['auth', 'verified'])->group(function () {
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
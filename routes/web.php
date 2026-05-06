<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/tugas/create', function () {
    return view('tugas.create');
});

Route::get('/tugas/detail', function () {
    return view('tugas.show');
});


Route::get('/categories', function () {
    $categories = [
        ['nama' => 'Akademik', 'jumlah' => 5, 'color' => 'indigo'],
        ['nama' => 'Organisasi', 'jumlah' => 3, 'color' => 'amber'],
        ['nama' => 'Personal', 'jumlah' => 4, 'color' => 'emerald'],
    ];
    return view('categories.index', compact('categories'));
});

Route::get('/profile', function () {
    return view('profile.index');
});

use Illuminate\Support\Facades\Auth;

Route::post('/tugas/selesai', function () {
    $name = Auth::user() ? Auth::user()->nama : "Paw"; 
    
    return redirect()->back()->with('success', "Mantap $name! Tugas berhasil diselesaikan.");
});


Route::get('/tugas/edit', function () {
    return view('tugas.create'); 
});

Route::get('/tugas/edit', function () {
    $tugas = [
        'judul' => 'ERD Project Reminder',
        'deskripsi' => 'Membuat struktur database menggunakan Entity Relationship Diagram untuk sistem reminder deadline tugas mahasiswa. Pastikan semua relasi (1:N) sudah terpetakan dengan benar sesuai modul kuliah.',
        'deadline' => '2026-05-07',
        'kategori' => 'Akademik'
    ];

    return view('tugas.edit', compact('tugas'));
});

use Illuminate\Http\Request;

Route::post('/tugas/update', function (Request $request) {
    // Karena ini masih dummy, kita langsung kembalikan ke halaman sebelumnya
    return redirect('/tugas/detail')->with('success', 'Perubahan berhasil disimpan, Paw!');
});
@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-10 animate-in fade-in duration-700">
    <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-slate-200/60 w-full max-w-md border border-slate-50">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Selamat Datang Kembali</h2>
            <p class="text-slate-500 text-sm mt-2 font-medium">Masuk untuk memantau tugasmu hari ini</p>
        </div>

        <form action="#" method="POST" class="space-y-6">
            @csrf
            {{-- Menggunakan entitas email dari ERD --}}
            <div class="space-y-1">
                <label class="text-xs font-extrabold text-slate-700 ml-1 uppercase tracking-wider">Email Student</label>
                <input type="email" name="email" placeholder="nama@student.ac.id" 
                    class="w-full bg-slate-50 border border-slate-100 rounded-xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all" required>
            </div>

            {{-- Menggunakan entitas password dari ERD[cite: 2] --}}
            <div class="space-y-1">
                <div class="flex justify-between items-center px-1">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider">Password</label>
                    <a href="#" class="text-[10px] font-bold text-indigo-600 hover:underline">Lupa Password?</a>
                </div>
                <input type="password" name="password" placeholder="********" 
                    class="w-full bg-slate-50 border border-slate-100 rounded-xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all" required>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-xl font-bold text-sm shadow-lg shadow-indigo-100 transition-all active:scale-95">
                    Masuk
                </button>
            </div>
        </form>

        <p class="text-center mt-8 text-xs text-slate-500 font-medium">
            Belum punya akun? <a href="/register" class="text-indigo-600 font-bold hover:underline transition">Daftar Akun</a>
        </p>
    </div>
</div>
@endsection
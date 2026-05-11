@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-10 animate-in fade-in duration-700">
    <div class="bg-white/60 backdrop-blur-2xl p-10 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.08)] w-full max-w-md border border-white/60">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Selamat Datang Kembali</h2>
            <p class="text-slate-500 text-sm mt-2 font-medium">Masuk untuk memantau tugasmu hari ini</p>
        </div>

        <form action="/login" method="POST" class="space-y-6">
            @csrf
            {{-- Menggunakan entitas email dari ERD --}}
            <div class="space-y-1">
                <label class="text-xs font-extrabold text-slate-700 ml-1 uppercase tracking-wider">Email Student</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@student.ac.id" 
                    class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all" required>
                @error('email')
                    <p class="text-red-500 text-xs mt-1 font-medium ml-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Menggunakan entitas password dari ERD[cite: 2] --}}
            <div class="space-y-1">
                <div class="flex justify-between items-center px-1">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider">Password</label>
                    <a href="#" class="text-[10px] font-bold text-indigo-600 hover:text-purple-600 hover:underline transition-colors">Lupa Password?</a>
                </div>
                <input type="password" name="password" placeholder="********" 
                    class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all" required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1 font-medium ml-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white py-4 rounded-xl font-bold text-sm shadow-[0_10px_20px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_15px_25px_-10px_rgba(99,102,241,0.8)] transition-all active:scale-95 hover:-translate-y-0.5 border border-white/20">
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
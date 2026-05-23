@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-12 animate-in fade-in duration-700">
    <div class="bg-white/60 backdrop-blur-2xl p-10 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.08)] w-full max-w-md border border-white/60 text-center">
        
        <!-- Icon -->
        <div class="mx-auto w-20 h-20 bg-indigo-50 rounded-full flex items-center justify-center mb-6 shadow-inner">
            <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l8-5.333a2 2 0 012.22 0l8 5.333A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-2.25-1.5a2 2 0 00-2.22 0l-2.25 1.5"></path>
            </svg>
        </div>

        <h2 class="text-2xl font-extrabold text-slate-800">Verifikasi Email Anda</h2>
        <p class="text-slate-500 text-sm mt-3 font-medium px-4">
            Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi email Anda dengan mengeklik link yang baru saja kami kirimkan ke email Anda.
        </p>

        @if (session('message'))
            <div class="mt-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 text-xs font-bold animate-in slide-in-from-top-4 duration-300">
                {{ session('message') }}
            </div>
        @endif

        <div class="mt-8 space-y-4">
            <!-- Form Kirim Ulang -->
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white py-4 rounded-xl font-bold text-sm shadow-[0_10px_20px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_15px_25px_-10px_rgba(99,102,241,0.8)] transition-all active:scale-95 hover:-translate-y-0.5 border border-white/20">
                    Kirim Ulang Link Verifikasi
                </button>
            </form>

            <!-- Form Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-slate-400 hover:text-slate-600 font-bold text-xs hover:underline transition-all">
                    Keluar / Logout
                </button>
            </form>
        </div>

    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    
    <!-- Flash Message: Nama User Otomatis Terdeteksi -->
    @if(session('success'))
        <div class="mb-8 p-5 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-[2rem] flex items-center gap-4 animate-bounce shadow-sm shadow-emerald-100/50">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-xl">🎉</div>
            <span class="font-bold tracking-tight">{{ session('success') }}</span>
        </div>
    @endif

    <div class="animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Breadcrumb -->
        <nav class="flex gap-2 text-[10px] font-extrabold uppercase tracking-[0.2em] text-slate-400 mb-8">
            <a href="/dashboard" class="hover:text-indigo-600 transition">Dashboard</a>
            <span>/</span>
            <span class="text-slate-800">Detail Tugas</span>
        </nav>

        <div class="bg-white/60 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/60 overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-indigo-500/5 to-transparent"></div>
            <div class="p-10 md:p-14 relative z-10">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row justify-between items-start border-b border-white/40 pb-10 mb-10 gap-8">
                    <div class="flex-1">
                        <span class="inline-block px-4 py-1.5 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full mb-4 uppercase tracking-widest italic">
                            Kategori: {{ $tugas->kategori ? $tugas->kategori->nama : 'Umum' }}
                        </span>
                        <h1 class="text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-slate-500 tracking-tighter leading-tight">
                            {{ $tugas->judul }}
                        </h1>
                        <p class="text-slate-400 font-medium mt-3 text-sm italic">
                            Tugas dibuat pada {{ $tugas->created_at->translatedFormat('d F Y') }}
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="/tugas/{{ $tugas->id }}/edit" class="px-8 py-3 bg-white/50 text-slate-600 rounded-2xl font-bold hover:bg-white transition-all text-sm border border-white/60 shadow-sm">
                            Edit
                        </a>

                        <form action="/tugas/{{ $tugas->id }}/selesai" method="POST">
                            @csrf
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white rounded-2xl font-bold shadow-[0_10px_20px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_15px_25px_-10px_rgba(99,102,241,0.8)] hover:-translate-y-0.5 transition-all text-sm active:scale-95 border border-white/20">
                                Selesai
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-start">
                    <div class="lg:col-span-3 space-y-4">
                        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Deskripsi Tugas</h4>
                        <p class="text-slate-600 leading-relaxed font-medium text-lg whitespace-pre-line">
                            {{ $tugas->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>
                    </div>

                    <div class="lg:col-span-2 grid grid-cols-1 gap-4">
                        <div class="p-8 bg-gradient-to-br from-red-500/10 to-orange-500/10 backdrop-blur-md rounded-[2rem] border border-white/60 flex flex-col justify-center shadow-inner relative overflow-hidden">
                            <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-red-400/20 rounded-full blur-xl"></div>
                            <h4 class="text-[10px] font-black text-red-500 uppercase tracking-widest mb-2 relative z-10">Deadline</h4>
                            <p class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-orange-500 tracking-tight relative z-10">{{ $tugas->deadline ? \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y') : '-' }}</p>
                        </div>
                        
                        <div class="p-8 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 backdrop-blur-md rounded-[2rem] border border-white/60 flex flex-col justify-center shadow-inner relative overflow-hidden">
                            <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-emerald-400/20 rounded-full blur-xl"></div>
                            <h4 class="text-[10px] font-black text-emerald-500 uppercase tracking-widest mb-2 relative z-10">Reminder</h4>
                            <p class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500 tracking-tight leading-tight relative z-10">
                                {{ ucfirst($tugas->status_aktif) }} {{ $tugas->waktu_reminder ? '('. \Carbon\Carbon::parse($tugas->waktu_reminder)->translatedFormat('d M') .')' : '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <p class="text-[10px] font-bold text-slate-300 uppercase tracking-[0.4em]">
                © 2026 TaskFlow System — Informatics Student Project
            </p>
        </div>
    </div>
</div>
@endsection
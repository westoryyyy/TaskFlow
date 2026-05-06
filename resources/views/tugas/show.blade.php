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

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
            <div class="p-10 md:p-14">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row justify-between items-start border-b border-slate-50 pb-10 mb-10 gap-8">
                    <div class="flex-1">
                        <span class="inline-block px-4 py-1.5 bg-indigo-50 text-indigo-600 text-[10px] font-black rounded-full mb-4 uppercase tracking-widest italic">
                            Kategori: Akademik
                        </span>
                        <h1 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tighter leading-tight">
                            ERD Project Reminder
                        </h1>
                        <p class="text-slate-400 font-medium mt-3 text-sm italic">
                            Tugas dibuat pada 05 Mei 2026
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <a href="/tugas/edit" class="px-8 py-3 bg-slate-50 text-slate-500 rounded-2xl font-bold hover:bg-slate-100 hover:text-slate-700 transition-all text-sm border border-slate-100">
                            Edit
                        </a>

                        <form action="/tugas/selesai" method="POST">
                            @csrf
                            <button type="submit" class="px-8 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:-translate-y-1 transition-all text-sm active:scale-95">
                                Selesai
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-start">
                    <div class="lg:col-span-3 space-y-4">
                        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] italic">Deskripsi Tugas</h4>
                        <p class="text-slate-600 leading-relaxed font-medium text-lg">
                            Membuat struktur database menggunakan Entity Relationship Diagram untuk sistem reminder deadline tugas mahasiswa. Pastikan semua relasi (1:N) sudah terpetakan dengan benar sesuai modul kuliah.
                        </p>
                    </div>

                    <div class="lg:col-span-2 grid grid-cols-1 gap-4">
                        <div class="p-8 bg-red-50/50 rounded-[2rem] border border-red-100/50 flex flex-col justify-center">
                            <h4 class="text-[10px] font-black text-red-400 uppercase tracking-widest mb-2">Deadline</h4>
                            <p class="text-2xl font-black text-red-600 tracking-tight">07 Mei 2026</p>
                        </div>
                        
                        <div class="p-8 bg-emerald-50/50 rounded-[2rem] border border-emerald-100/50 flex flex-col justify-center">
                            <h4 class="text-[10px] font-black text-emerald-400 uppercase tracking-widest mb-2">Reminder</h4>
                            <p class="text-xl font-bold text-emerald-600 tracking-tight leading-tight">
                                Aktif (1 Hari Sebelum)
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
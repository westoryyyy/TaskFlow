@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto animate-in fade-in slide-in-from-bottom-5 duration-700">
    
    <!-- Header Dashboard -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Ringkasan Tugas</h2>
            <p class="text-slate-500 mt-1 font-medium text-sm">Pantau semua deadline dan selesaikan tepat waktu.</p>
        </div>
        <a href="/tugas/create" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg shadow-indigo-100 active:scale-95 flex items-center gap-2">
            <span>+ Tambah Tugas Baru</span>
        </a>
    </div>

    <!-- Quick Stats Card (Ref: Konsep Awal) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
            <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Total Tugas</p>
            <h4 class="text-3xl font-black text-slate-800">12</h4>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
            <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Mendekati Deadline</p>
            <h4 class="text-3xl font-black text-indigo-600">03</h4>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
            <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Selesai</p>
            <h4 class="text-3xl font-black text-emerald-500">08</h4>
        </div>
    </div>

    <!-- Daftar Tugas (Alur Kerja 02) -->
    <div class="space-y-6">
        <h3 class="text-xl font-extrabold text-slate-800 flex items-center gap-2">
            <span class="w-2 h-6 bg-indigo-600 rounded-full"></span>
            Deadline Terdekat
        </h3>

        <div class="grid gap-4">
            {{-- Loop Tugas (Dummy Data buat Front-End) --}}
           @forelse(['ERD Project', 'Laporan Praktikum', 'UI Design'] as $tugas)
<a href="/tugas/detail" class="bg-white p-6 rounded-3xl border border-slate-100 flex justify-between items-center hover:shadow-xl hover:shadow-slate-200/40 transition-all duration-300 group cursor-pointer block">
    <div class="flex gap-6 items-center">
        <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-indigo-50 transition-colors">
            {{ $loop->first ? '🔥' : '📝' }}
        </div>
        <div>
            <h4 class="font-extrabold text-slate-800 text-lg group-hover:text-indigo-600 transition-colors">{{ $tugas }}</h4>
            <div class="flex flex-wrap gap-4 mt-1 text-xs font-bold uppercase tracking-wider">
                <span class="text-red-500">Deadline: 07 Mei 2026</span>
                <span class="text-slate-300 font-normal">|</span>
                <span class="text-slate-400">Akademik</span>
            </div>
        </div>
    </div>
    
    <div class="flex items-center gap-4">
        <span class="hidden md:block text-[10px] bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full font-bold">Reminder Aktif</span>
        <div class="w-8 h-8 rounded-full border-2 border-slate-100 flex items-center justify-center text-slate-300 group-hover:border-indigo-600 group-hover:text-indigo-600 transition-all">
            ✓
        </div>
    </div>
</a>
@empty
    {{-- Kode jika kosong --}}
@endforelse

        </div>
    </div>
</div>
@endsection
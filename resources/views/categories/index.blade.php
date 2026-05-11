@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 animate-in fade-in duration-700">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-slate-500 tracking-tighter">Kategori Tugas</h1>
            <p class="text-slate-400 font-medium mt-2">Kelola tugas berdasarkan kelompok aktivitasmu.</p>
        </div>
    </div>

    <!-- Form Tambah Kategori -->
    <div class="mb-10 bg-white/60 backdrop-blur-xl p-6 rounded-[2.5rem] border border-white/80 shadow-[0_4px_20px_rgb(0,0,0,0.03)]">
        <form action="/categories/store" method="POST" class="flex flex-col md:flex-row gap-4 items-end">
            @csrf
            <div class="flex-1 w-full space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Nama Kategori</label>
                <input type="text" name="nama" placeholder="Contoh: Projek Akhir" required class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 text-sm font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
            </div>
            <div class="w-full md:w-48 space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Warna Tema</label>
                <select name="color" class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 text-sm font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all appearance-none">
                    <option value="indigo">Indigo</option>
                    <option value="emerald">Emerald</option>
                    <option value="rose">Rose</option>
                    <option value="amber">Amber</option>
                    <option value="sky">Sky</option>
                </select>
            </div>
            <button type="submit" class="w-full md:w-auto px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white rounded-2xl font-bold text-sm shadow-[0_8px_20px_rgba(99,102,241,0.3)] hover:shadow-[0_12px_25px_rgba(99,102,241,0.5)] transition-all hover:-translate-y-0.5 border border-white/20">
                + Tambah
            </button>
        </form>
    </div>

    <!-- Grid Kategori -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($categories as $cat)
        <div class="bg-white/60 backdrop-blur-xl p-8 rounded-[2.5rem] border border-white/80 shadow-[0_4px_20px_rgb(0,0,0,0.03)] hover:shadow-[0_15px_40px_rgb(0,0,0,0.06)] transition-all duration-500 hover:-translate-y-1 group cursor-pointer relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-{{ $cat->color }}-400/10 rounded-full blur-2xl group-hover:bg-{{ $cat->color }}-400/20 transition-colors duration-500"></div>
            <div class="w-12 h-12 bg-{{ $cat->color }}-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <div class="w-2 h-2 rounded-full bg-{{ $cat->color }}-500"></div>
            </div>
            <h3 class="text-xl font-black text-slate-800 mb-1">{{ $cat->nama }}</h3>
            <p class="text-slate-400 font-bold text-[10px] uppercase tracking-widest">{{ $cat->tugas_count ?? 0 }} Tugas Terdaftar</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
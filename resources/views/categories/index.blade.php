@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 animate-in fade-in duration-700">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-4xl font-black text-slate-800 tracking-tighter">Kategori Tugas</h1>
            <p class="text-slate-400 font-medium mt-2">Kelola tugas berdasarkan kelompok aktivitasmu.</p>
        </div>
        <button class="px-6 py-3 bg-slate-900 text-white rounded-2xl font-bold text-sm hover:bg-slate-800 transition-all">
            + Kategori Baru
        </button>
    </div>

    <!-- Grid Kategori -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($categories as $cat)
        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-slate-200/50 transition-all group cursor-pointer">
            <div class="w-12 h-12 bg-{{ $cat['color'] }}-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <div class="w-2 h-2 rounded-full bg-{{ $cat['color'] }}-500"></div>
            </div>
            <h3 class="text-xl font-black text-slate-800 mb-1">{{ $cat['nama'] }}</h3>
            <p class="text-slate-400 font-bold text-[10px] uppercase tracking-widest">{{ $cat['jumlah'] }} Tugas Terdaftar</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto animate-in fade-in duration-700">
    <div class="flex justify-between items-center mb-10">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-800">Kategori Tugas</h2>
            <p class="text-slate-500 mt-1 font-medium">Kelola label untuk organisasi tugas yang lebih baik.</p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg shadow-indigo-100 active:scale-95">
            + Kategori Baru
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Loop Kategori (Ref: nama_kategori char(50)) --}}
        @foreach(['Akademik', 'Proyek Kelompok', 'Organisasi'] as $cat)
        <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-md transition-all group">
            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-xl mb-4 group-hover:bg-indigo-50 transition-colors">
                🏷️
            </div>
            <h4 class="font-extrabold text-slate-800 text-lg">{{ $cat }}</h4>
            <p class="text-xs text-slate-400 mt-1 font-bold uppercase tracking-wider">ID: {{ $loop->iteration }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
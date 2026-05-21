@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto animate-in fade-in slide-in-from-bottom-5 duration-700">
    
    <!-- Header Dashboard -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Ringkasan Tugas</h2>
            <p class="text-slate-500 mt-1 font-medium text-sm">Pantau semua deadline dan selesaikan tepat waktu.</p>
        </div>
        <a href="/tugas/create" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white px-7 py-3.5 rounded-2xl font-bold transition-all duration-300 shadow-[0_10px_20px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_15px_25px_-10px_rgba(99,102,241,0.8)] hover:-translate-y-0.5 active:scale-95 flex items-center gap-2 border border-white/20">
            <span>+ Tambah Tugas Baru</span>
        </a>
    </div>

    <!-- Quick Stats Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white/60 backdrop-blur-xl p-8 rounded-[2rem] border border-white/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all hover:-translate-y-1">
            <p class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest mb-2">Total Tugas</p>
            <h4 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-slate-800 to-slate-500">{{ $totalTugas }}</h4>
        </div>
        <div class="bg-white/60 backdrop-blur-xl p-8 rounded-[2rem] border border-white/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all hover:-translate-y-1 relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-500/10 rounded-full blur-2xl"></div>
            <p class="text-[10px] font-extrabold text-indigo-400 uppercase tracking-widest mb-2">Mendekati Deadline</p>
            <h4 class="text-4xl font-black text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">{{ sprintf('%02d', $mendekatiDeadline) }}</h4>
        </div>
        <div class="bg-white/60 backdrop-blur-xl p-8 rounded-[2rem] border border-white/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] transition-all hover:-translate-y-1 relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl"></div>
            <p class="text-[10px] font-extrabold text-emerald-500 uppercase tracking-widest mb-2">Selesai</p>
            <h4 class="text-4xl font-black text-emerald-500">{{ sprintf('%02d', $selesai) }}</h4>
        </div>
    </div>

    <!-- Daftar Tugas (Alur Kerja 02) -->
    <div class="space-y-6">
        <h3 class="text-xl font-extrabold text-slate-800 flex items-center gap-2">
            <span class="w-2 h-6 bg-indigo-600 rounded-full"></span>
            Deadline Terdekat
        </h3>

        <div class="grid gap-4">
            {{-- Loop Tugas (Database) --}}
           @forelse($tugasList as $tugas)
<a href="/tugas/{{ $tugas->id }}" class="bg-white/60 backdrop-blur-xl p-6 rounded-3xl border border-white/80 flex justify-between items-center shadow-[0_4px_20px_rgb(0,0,0,0.03)] hover:shadow-[0_10px_40px_rgba(99,102,241,0.1)] hover:border-indigo-100 transition-all duration-500 group cursor-pointer hover:-translate-y-1 block">
    <div class="flex gap-6 items-center">
        <div class="w-14 h-14 bg-gradient-to-br from-slate-100 to-slate-50 rounded-2xl flex items-center justify-center text-2xl group-hover:from-indigo-100 group-hover:to-purple-50 group-hover:scale-110 transition-all duration-300 shadow-inner border border-white">
            {{ $loop->first ? '🔥' : '📝' }}
        </div>
        <div>
            <h4 class="font-extrabold text-slate-800 text-lg group-hover:text-indigo-600 transition-colors">{{ $tugas->judul }}</h4>
            <div class="flex flex-wrap gap-4 mt-1 text-xs font-bold uppercase tracking-wider">
                <span class="text-red-500 flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span> Deadline: {{ $tugas->deadline ? \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d M Y') : '-' }}</span>
                <span class="text-slate-300 font-normal">|</span>
                <span class="text-slate-400">{{ $tugas->kategori ? $tugas->kategori->nama : 'Umum' }}</span>
            </div>
        </div>
    </div>
    
    <div class="flex items-center gap-4">
        @if($tugas->waktu_reminder)
        <span class="hidden md:block text-[10px] bg-gradient-to-r from-emerald-50 to-teal-50 text-emerald-600 px-4 py-1.5 rounded-full font-bold border border-emerald-100">Reminder Aktif</span>
        @endif
        <div class="w-10 h-10 rounded-full bg-white border border-slate-100 flex items-center justify-center text-slate-300 group-hover:border-indigo-200 group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-all shadow-sm">
            ✓
        </div>
    </div>
</a>
@empty
    <div class="text-center p-10 bg-white/50 backdrop-blur-md rounded-3xl border border-white/60">
        <p class="text-slate-400 font-bold mb-4">Belum ada tugas saat ini. Santai dulu! ☕️</p>
    </div>
@endforelse

        </div>
    </div>

    <!-- Riwayat Tugas Selesai (Tambahan) -->
    <div class="mt-20 space-y-6">
        <h3 class="text-xl font-extrabold text-slate-800 flex items-center gap-2 opacity-50">
            <span class="w-2 h-6 bg-emerald-500 rounded-full"></span>
            Riwayat Tugas Selesai
        </h3>
        
        <div class="grid gap-3 opacity-60">
            @forelse($tugasSelesaiList as $tSelesai)
            <div class="bg-white/40 backdrop-blur-md p-5 rounded-2xl border border-white/60 flex justify-between items-center shadow-sm">
                <div class="flex gap-4 items-center">
                    <div class="text-xl">✅</div>
                    <div>
                        <h4 class="font-bold text-slate-600 line-through">{{ $tSelesai->judul }}</h4>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $tSelesai->kategori ? $tSelesai->kategori->nama : 'Umum' }}</p>
                    </div>
                </div>
                <div class="text-[10px] font-black text-emerald-500 uppercase">Selesai</div>
            </div>
            @empty
            <p class="text-slate-400 text-xs italic">Belum ada riwayat tugas selesai.</p>
            @endforelse
        </div>
        @if($tugasSelesaiList->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $tugasSelesaiList->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
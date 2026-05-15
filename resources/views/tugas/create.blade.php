@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto animate-in fade-in slide-in-from-bottom-5 duration-700">
    
    <!-- Link Kembali -->
    <a href="/dashboard" class="text-sm font-bold text-slate-400 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-8">
        ← Kembali ke Dashboard
    </a>

    <div class="bg-white/60 backdrop-blur-2xl p-10 md:p-12 rounded-[3rem] shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/60 relative overflow-hidden">
        <h2 class="text-3xl font-extrabold text-slate-800 mb-2">Buat Tugas Baru</h2>
        <p class="text-slate-500 mb-10 font-medium">Isi detail tugasmu dan atur pengingat otomatis.</p>

        <form action="/tugas/store" method="POST" class="space-y-8">
            @csrf
            
            {{-- Bagian 1: Informasi Tugas (Ref: Entitas Tugas) --}}
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Judul Tugas</label>
                    <input type="text" name="judul" placeholder="Contoh: Laporan Praktikum Pemrogramman Web" 
                        class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="3" placeholder="Apa saja yang harus dikerjakan?" 
                        class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all"></textarea>
                </div>
            </div>

            {{-- Bagian 2: Waktu & Kategori (Ref: ERD) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Tanggal Deadline</label>
                    <input type="date" name="deadline" 
                        class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Kategori Tugas</label>
                    <select name="kategori_id" class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all appearance-none">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Bagian 3: Pengaturan Reminder (Ref: Alur Kerja 03) --}}
            <div class="p-8 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-[2rem] border border-white/60 space-y-6 shadow-inner">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-xl">⏰</span>
                    <h3 class="font-bold text-indigo-900">Setel Pengingat</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-indigo-700 uppercase tracking-wider ml-1">Waktu Reminder</label>
                        <input type="date" name="waktu_reminder" 
                            class="w-full bg-white/60 border border-white/60 rounded-2xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-indigo-700 uppercase tracking-wider ml-1">Status</label>
                        <select name="status_aktif" class="w-full bg-white/60 border border-white/60 rounded-2xl p-4 text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all appearance-none text-indigo-600 font-bold">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white py-5 rounded-2xl font-bold text-lg shadow-[0_10px_20px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_15px_25px_-10px_rgba(99,102,241,0.8)] transition-all active:scale-[0.98] hover:-translate-y-0.5 border border-white/20 mt-4">
                Simpan & Aktifkan Reminder →
            </button>
        </form>
    </div>
</div>
@endsection
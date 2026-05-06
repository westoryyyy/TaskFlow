@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto animate-in fade-in slide-in-from-bottom-5 duration-700">
    
    <!-- Link Kembali -->
    <a href="/dashboard" class="text-sm font-bold text-slate-400 hover:text-indigo-600 transition-colors flex items-center gap-2 mb-8">
        ← Kembali ke Dashboard
    </a>

    <div class="bg-white p-10 md:p-12 rounded-[3rem] shadow-2xl shadow-slate-200/50 border border-slate-50 relative overflow-hidden">
        <h2 class="text-3xl font-extrabold text-slate-800 mb-2">Buat Tugas Baru</h2>
        <p class="text-slate-500 mb-10 font-medium">Isi detail tugasmu dan atur pengingat otomatis.</p>

        <form action="#" method="POST" class="space-y-8">
            @csrf
            
            {{-- Bagian 1: Informasi Tugas (Ref: Entitas Tugas) --}}
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Judul Tugas</label>
                    <input type="text" name="judul_tugas" placeholder="Contoh: Laporan Praktikum Pemrogramman Web" 
                        class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Deskripsi Singkat</label>
                    <textarea name="deskripsi" rows="3" placeholder="Apa saja yang harus dikerjakan?" 
                        class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all"></textarea>
                </div>
            </div>

            {{-- Bagian 2: Waktu & Kategori (Ref: ERD) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Tanggal Deadline</label>
                    <input type="date" name="tanggal_deadline" 
                        class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-slate-700 uppercase tracking-wider ml-1">Kategori Tugas</label>
                    <select name="id_kategori" class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all appearance-none">
                        <option value="">Pilih Kategori</option>
                        <option value="1">Akademik</option>
                        <option value="2">Organisasi</option>
                    </select>
                </div>
            </div>

            {{-- Bagian 3: Pengaturan Reminder (Ref: Alur Kerja 03) --}}
            <div class="p-8 bg-indigo-50/50 rounded-[2rem] border border-indigo-100/50 space-y-6">
                <div class="flex items-center gap-3 mb-2">
                    <span class="text-xl">⏰</span>
                    <h3 class="font-bold text-indigo-900">Setel Pengingat</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-indigo-700 uppercase tracking-wider ml-1">Waktu Reminder</label>
                        <input type="date" name="waktu_reminder" 
                            class="w-full bg-white border border-indigo-100 rounded-2xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-extrabold text-indigo-700 uppercase tracking-wider ml-1">Status</label>
                        <select name="status_aktif" class="w-full bg-white border border-indigo-100 rounded-2xl p-4 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all appearance-none text-indigo-600 font-bold">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-5 rounded-2xl font-bold text-lg shadow-xl shadow-indigo-100 transition-all active:scale-[0.98] mt-4">
                Simpan & Aktifkan Reminder →
            </button>
        </form>
    </div>
</div>
@endsection
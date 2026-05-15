@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-black text-slate-800 mb-2">Edit Tugas</h1>
    <p class="text-slate-400 font-medium mb-10">Perbarui detail tugasmu.</p>

    <div class="bg-white/60 backdrop-blur-2xl rounded-[2.5rem] p-10 shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/60 relative overflow-hidden">
        <form action="/tugas/{{ $tugas->id }}/update" method="POST" class="space-y-8">
            @csrf
            <!-- Judul Tugas -->
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Judul Tugas</label>
                <input type="text" name="judul" value="{{ $tugas->judul }}" 
                       class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="4" 
                          class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">{{ $tugas->deskripsi }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Tanggal Deadline</label>
                    <input type="date" name="deadline" value="{{ $tugas->deadline }}" 
                           class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Kategori Tugas</label>
                    <select name="kategori_id" class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all appearance-none">
                        @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}" {{ $tugas->kategori_id == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                        @endforeach























                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Waktu Reminder</label>
                    <input type="date" name="waktu_reminder" value="{{ $tugas->waktu_reminder ? \Carbon\Carbon::parse($tugas->waktu_reminder)->format('Y-m-d') : '' }}" 
                           class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Status Reminder</label>
                    <select name="status_aktif" class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-indigo-600 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 outline-none transition-all appearance-none text-indigo-600 font-bold">
                        <option value="aktif" {{ $tugas->status_aktif == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $tugas->status_aktif == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>
            </div>

            <div class="pt-6 flex gap-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white py-4 rounded-2xl font-black shadow-[0_10px_20px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_15px_25px_-10px_rgba(99,102,241,0.8)] transition-all hover:-translate-y-0.5 border border-white/20">
                    Simpan Perubahan
                </button>
                <a href="/tugas/{{ $tugas->id }}" class="px-8 py-4 bg-white/50 border border-white/60 text-slate-500 rounded-2xl font-bold hover:bg-white hover:text-slate-700 transition-all text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
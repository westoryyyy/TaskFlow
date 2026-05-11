@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-black text-slate-800 mb-2">Edit Tugas</h1>
    <p class="text-slate-400 font-medium mb-10">Perbarui detail tugasmu.</p>

    <div class="bg-white rounded-[2.5rem] p-10 shadow-xl shadow-slate-100 border border-slate-100">
        <form action="/tugas/update" method="POST" class="space-y-8">
            @csrf
            <!-- Judul Tugas -->
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Judul Tugas</label>
                <input type="text" name="judul" value="{{ $tugas['judul'] }}" 
                       class="w-full bg-slate-50 border-none rounded-2xl p-4 font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500">
            </div>

            <!-- Deskripsi -->
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="4" 
                          class="w-full bg-slate-50 border-none rounded-2xl p-4 font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500">{{ $tugas['deskripsi'] }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tanggal Deadline -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Tanggal Deadline</label>
                    <input type="date" name="deadline" value="{{ $tugas['deadline'] }}" 
                           class="w-full bg-slate-50 border-none rounded-2xl p-4 font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Kategori -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Kategori Tugas</label>
                    <select name="kategori" class="w-full bg-slate-50 border-none rounded-2xl p-4 font-bold text-slate-700 focus:ring-2 focus:ring-indigo-500">
                        <option value="Akademik" {{ $tugas['kategori'] == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Organisasi" {{ $tugas['kategori'] == 'Organisasi' ? 'selected' : '' }}>Organisasi</option>























                    </select>
                </div>
            </div>

            <div class="pt-6 flex gap-4">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-4 rounded-2xl font-black shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all">
                    Simpan Perubahan
                </button>
                <a href="/tugas/detail" class="px-8 py-4 bg-slate-100 text-slate-500 rounded-2xl font-bold hover:bg-slate-200 transition-all text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
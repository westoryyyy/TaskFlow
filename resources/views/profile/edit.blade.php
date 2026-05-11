@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto animate-in fade-in slide-in-from-bottom-5 duration-700">
    <div class="bg-white/60 backdrop-blur-2xl rounded-[3rem] shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/60 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 opacity-20"></div>
        
        <div class="p-10 md:p-14 relative z-10 mt-10">
            <h1 class="text-3xl font-black text-slate-800 mb-2">Edit Profil</h1>
            <p class="text-slate-400 font-medium mb-10">Perbarui informasi identitas dan akun kamu.</p>

            <form action="/profile/update" method="POST" class="space-y-8">
                @csrf
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                           class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Email Student</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                           class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Status Akademik</label>
                    <input type="text" name="status_akademik" value="{{ old('status_akademik', $user->status_akademik) }}" placeholder="Contoh: Mahasiswa Teknik Informatika Semester 4"
                           class="w-full bg-white/50 backdrop-blur-sm border border-white/60 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-400 focus:shadow-[0_0_15px_rgba(99,102,241,0.15)] outline-none transition-all">
                    @error('status_akademik')
                        <p class="text-red-500 text-xs mt-1 font-medium ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white py-4 rounded-2xl font-black shadow-[0_10px_20px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_15px_25px_-10px_rgba(99,102,241,0.8)] transition-all hover:-translate-y-0.5 border border-white/20">
                        Simpan Perubahan
                    </button>
                    <a href="/profile" class="px-8 py-4 bg-white/50 border border-white/60 text-slate-500 rounded-2xl font-bold hover:bg-white hover:text-slate-700 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

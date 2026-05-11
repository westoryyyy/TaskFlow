@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto animate-in fade-in slide-in-from-bottom-5 duration-700">
    <div class="bg-white/60 backdrop-blur-2xl rounded-[3rem] shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/60 overflow-hidden">
        {{-- Banner Sederhana --}}
        <div class="h-40 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10 backdrop-blur-[2px]"></div>
        </div>
        
        <div class="px-10 pb-10">
            <div class="relative flex justify-between items-end -mt-16 mb-8">
                <div class="w-28 h-28 bg-white/50 backdrop-blur-xl rounded-[2rem] p-1.5 shadow-2xl border border-white/80 relative z-10">
                    <div class="w-full h-full bg-slate-100 rounded-2xl flex items-center justify-center text-3xl font-bold text-indigo-600">
                        {{ $initials ?? 'RP' }}
                    </div>
                </div>
                <div class="flex gap-2 relative z-10">
                    <a href="/profile/edit" class="bg-white/60 hover:bg-white text-slate-700 px-5 py-2.5 rounded-xl text-xs font-bold transition-all border border-white/80 shadow-sm flex items-center">
                        Edit Profil
                    </a>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-50/80 hover:bg-red-100 text-red-600 px-5 py-2.5 rounded-xl text-xs font-bold transition-all border border-red-100 shadow-sm">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[0.2em] block mb-1">Nama Lengkap</label>
                        <p class="text-lg font-bold text-slate-800">{{ $user->name }}</p>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[0.2em] block mb-1">Email Student</label>
                        <p class="text-lg font-bold text-slate-800">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="bg-white/40 backdrop-blur-md p-8 rounded-3xl border border-white/60 shadow-sm">
                    <h5 class="text-xs font-extrabold text-indigo-600 uppercase tracking-wider mb-3">Status Akademik</h5>
                    <p class="text-sm text-slate-700 font-bold leading-relaxed">
                        {{ $user->status_akademik ?: 'Belum diisi. Silakan edit profil Anda.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
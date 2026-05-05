@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto animate-in fade-in slide-in-from-bottom-5 duration-700">
    <div class="bg-white rounded-[3rem] shadow-2xl shadow-slate-200/50 border border-slate-50 overflow-hidden">
        {{-- Banner Sederhana --}}
        <div class="h-32 bg-indigo-600"></div>
        
        <div class="px-10 pb-10">
            <div class="relative flex justify-between items-end -mt-12 mb-8">
                <div class="w-24 h-24 bg-white rounded-3xl p-1 shadow-xl">
                    <div class="w-full h-full bg-slate-100 rounded-2xl flex items-center justify-center text-3xl font-bold text-indigo-600">
                        RP
                    </div>
                </div>
                <button class="bg-slate-50 hover:bg-slate-100 text-slate-600 px-5 py-2 rounded-xl text-xs font-bold transition-all">
                    Edit Profil
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <div class="space-y-6">
                    <div>
                        <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[0.2em] block mb-1">Nama Lengkap</label>
                        <p class="text-lg font-bold text-slate-800">Rotua Paulina</p>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-slate-400 uppercase tracking-[0.2em] block mb-1">Email Student</label>
                        <p class="text-lg font-bold text-slate-800">@westoryyyy</p>
                    </div>
                </div>

                <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                    <h5 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider mb-3">Status Akademik</h5>
                    <p class="text-sm text-slate-600 font-medium leading-relaxed">
                        Mahasiswa Teknik Informatika.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
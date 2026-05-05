@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center py-10">
    <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl shadow-slate-200/60 w-full max-w-md border border-slate-50">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-extrabold text-slate-800">Buat Akun Baru</h2>
            <p class="text-slate-500 text-sm mt-2 font-medium">Gabung dengan ribuan mahasiswa lainnya</p>
        </div>

        <form action="#" class="space-y-5">
            @csrf
            {{-- Entitas User: nama, email, password --}}
            <div class="space-y-1">
                <label class="text-xs font-extrabold text-slate-700 ml-1 uppercase tracking-wider">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Contoh: Budi Santoso" 
                    class="w-full bg-slate-50 border border-slate-100 rounded-xl p-3 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
            </div>

            <div class="space-y-1">
                <label class="text-xs font-extrabold text-slate-700 ml-1 uppercase tracking-wider">Email Student</label>
                <input type="email" name="email" placeholder="nama@student.ac.id" 
                    class="w-full bg-slate-50 border border-slate-100 rounded-xl p-3 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-extrabold text-slate-700 ml-1 uppercase tracking-wider">Password</label>
                    <input type="password" name="password" placeholder="********" 
                        class="w-full bg-slate-50 border border-slate-100 rounded-xl p-3 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-extrabold text-slate-700 ml-1 uppercase tracking-wider">Konfirmasi</label>
                    <input type="password" name="password_confirmation" placeholder="********" 
                        class="w-full bg-slate-50 border border-slate-100 rounded-xl p-3 text-sm focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-4 rounded-xl font-bold text-sm shadow-lg shadow-indigo-100 transition-all mt-4">
                Daftar Akun
            </button>
        </form>

        <p class="text-center mt-6 text-xs text-slate-500 font-medium">
            Sudah punya akun? <a href="/login" class="text-indigo-600 font-bold hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8 animate-in fade-in duration-700">
    
    @if(session('success'))
        <div class="mb-8 p-5 bg-emerald-50 border border-emerald-100 text-emerald-600 rounded-[2rem] flex items-center gap-4 animate-bounce shadow-sm">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-xl">✨</div>
            <span class="font-bold tracking-tight">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex justify-between items-end mb-10">
        <div>
            <h1 class="text-4xl font-black text-slate-800 tracking-tighter">Kategori Tugas</h1>
            <p class="text-slate-400 font-medium mt-2">Kelola tugas berdasarkan kelompok aktivitasmu.</p>
        </div>
        <button id="btnOpenModal" class="px-8 py-3.5 bg-slate-900 text-white rounded-2xl font-bold text-sm hover:bg-slate-800 transition-all shadow-lg shadow-slate-200 active:scale-95">
            + Kategori Baru
        </button>
    </div>

    <!-- Grid Kategori -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($categories as $cat)
        <div class="bg-white/60 backdrop-blur-xl p-8 rounded-[2.5rem] border border-white/80 shadow-[0_4px_25px_rgba(0,0,0,0.02)] hover:shadow-[0_20px_50px_rgba(0,0,0,0.06)] hover:border-indigo-100 transition-all duration-500 group cursor-pointer hover:-translate-y-2 relative">
            
            <form action="/categories/{{ $cat->id }}" method="POST" class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-opacity" onsubmit="return confirm('Hapus kategori ini? Tugas di dalamnya akan menjadi (Umum).')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-8 h-8 bg-red-50 text-red-400 rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-all shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
            </form>
            <div class="w-14 h-14 bg-{{ $cat->color }}-50 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500 shadow-inner border border-white">
                <div class="w-3 h-3 rounded-full bg-{{ $cat->color }}-500 animate-pulse"></div>
            </div>
            <h3 class="text-2xl font-black text-slate-800 mb-1 tracking-tight group-hover:text-indigo-600 transition-colors">{{ $cat->nama }}</h3>
            <p class="text-slate-400 font-bold text-[10px] uppercase tracking-[0.2em]">{{ $cat->tugas_count ?? 0 }} Tugas Terdaftar</p>
        </div>
        @endforeach
    </div>

    <!-- Modal Form (Vanilla JS) -->
    <div id="modalKategori" 
         class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/40 backdrop-blur-md hidden opacity-0 transition-opacity duration-300">
        
        <div class="bg-white rounded-[3rem] p-10 w-full max-w-lg shadow-2xl border border-white/60 relative transform scale-95 transition-transform duration-300"
             id="modalContent">
            
            <button id="btnCloseModal" class="absolute top-8 right-8 text-slate-300 hover:text-slate-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <h2 class="text-3xl font-black text-slate-800 tracking-tighter mb-2">Buat Kategori</h2>
            <p class="text-slate-400 font-medium mb-8">Tambahkan kelompok tugas baru, Paw.</p>

            <form action="/categories/store" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Nama Kategori</label>
                    <input type="text" name="nama" placeholder="Contoh: Proyek Akhir" required
                           class="w-full bg-slate-50 border border-slate-100 rounded-2xl p-4 font-bold text-slate-700 focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-400 outline-none transition-all">
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400">Pilih Warna Aksen</label>
                    <div class="grid grid-cols-4 gap-3 mt-2">
                        @foreach(['indigo', 'emerald', 'rose', 'amber', 'purple', 'sky', 'pink', 'slate'] as $color)
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="color" value="{{ $color }}" class="peer hidden" {{ $color == 'indigo' ? 'checked' : '' }}>
                            <div class="w-full h-12 rounded-xl bg-{{ $color }}-50 border-2 border-transparent peer-checked:border-{{ $color }}-500 peer-checked:bg-{{ $color }}-100 transition-all flex items-center justify-center">
                                <div class="w-3 h-3 rounded-full bg-{{ $color }}-500"></div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl font-black shadow-lg shadow-indigo-100 hover:shadow-indigo-200 transition-all active:scale-[0.98] mt-4">
                    Simpan Kategori
                </button>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modalKategori');
        const modalContent = document.getElementById('modalContent');
        const btnOpen = document.getElementById('btnOpenModal');
        const btnClose = document.getElementById('btnCloseModal');

        function openModal() {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                modalContent.classList.add('scale-100');
            }, 10);
        }

        function closeModal() {
            modal.classList.remove('opacity-100');
            modalContent.classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        btnOpen.addEventListener('click', openModal);
        btnClose.addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    </script>
</div>
@endsection
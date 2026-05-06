<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow | Deadline Reminder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Gilroy sesuai preferensi lu */
        @import url('https://fonts.cdnfonts.com/css/gilroy-bold');
        
        body { 
            font-family: 'Gilroy', sans-serif; 
            background-color: #f8fafc; 
            scroll-behavior: smooth;
        }

        /* Animasi Transisi Halaman agar kerasa smooth dan premium */
        .page-transition {
            animation: fadeIn 0.5s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom Scrollbar agar tetap clean */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="min-h-screen flex flex-col">

   <nav class="bg-white border-b border-slate-100 px-8 py-4 flex justify-between items-center sticky top-0 z-50">
    <!-- Logo & Nama App di app.blade.php -->
<a href="/dashboard" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-100">✓</div>
    <span class="font-extrabold text-slate-800 text-xl tracking-tight">TaskFlow</span>
</a>
    
    {{-- LOGIKA BARU: Cuma muncul kalau sudah login --}}
    @auth
    <div class="flex items-center gap-6">
        <div class="hidden md:flex gap-8 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
            <a href="/dashboard" class="hover:text-indigo-600 transition">Dashboard</a>
            <a href="/categories" class="hover:text-indigo-600 transition">Kategori</a>
        </div>

        <div class="flex items-center gap-4 border-l border-slate-100 pl-6">
            <div class="text-right hidden sm:block">
                <p class="text-[10px] text-slate-400 uppercase font-black tracking-tighter">Halo,</p>
                <p class="text-sm font-bold text-slate-700 italic">Rotua Paulina</p>
            </div>
            
            <a href="/profile" class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center text-white font-extrabold shadow-lg shadow-indigo-200 hover:scale-110 transition-all cursor-pointer border-2 border-white">
                RP
            </a>
        </div>
    </div>
    @endauth
</nav>

    <!-- Main Content Area dengan Animasi -->
    <main class="flex-1 p-6 md:p-12 page-transition">
        {{-- Area ini akan diisi oleh konten dari file dashboard, create, detail, dll --}}
        @yield('content')
    </main>

 
<footer class="bg-white border-t border-slate-50 px-8 py-6">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        
        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
            © 2026 TaskFlow System
        </p>
        
       
        <div class="flex gap-4 text-[10px] font-bold text-slate-400 uppercase">
            <span class="text-indigo-400">Informatics Student Project</span>
        </div>
    </div>
</footer>

</body>
</html>
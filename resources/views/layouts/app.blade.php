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
<body class="min-h-screen flex flex-col relative antialiased selection:bg-indigo-500 selection:text-white text-slate-800">
    <!-- Animated Glassmorphism Background -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none bg-slate-50/50">
        <div class="absolute top-[-10%] left-[-10%] w-[50vw] h-[50vw] rounded-full bg-purple-400/20 blur-[120px] animate-[pulse_8s_ease-in-out_infinite]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[60vw] h-[60vw] rounded-full bg-indigo-400/20 blur-[120px] animate-[pulse_10s_ease-in-out_infinite_reverse]"></div>
        <div class="absolute top-[20%] right-[10%] w-[40vw] h-[40vw] rounded-full bg-pink-400/20 blur-[100px] animate-[pulse_12s_ease-in-out_infinite]"></div>
    </div>

   <nav class="bg-white/60 backdrop-blur-2xl border-b border-white/50 shadow-[0_4px_30px_rgba(0,0,0,0.03)] px-8 py-4 flex justify-between items-center sticky top-0 z-50 transition-all duration-500">
    <!-- Logo & Nama App di app.blade.php -->
<a href="/dashboard" class="flex items-center gap-3 hover:opacity-80 transition-all group">
    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-200 group-hover:scale-105 transition-transform">✓</div>
    <span class="font-black text-slate-800 text-2xl tracking-tighter bg-clip-text text-transparent bg-gradient-to-r from-slate-800 to-slate-500">TaskFlow</span>
</a>
    
    {{-- LOGIKA BARU: Cuma muncul kalau sudah login --}}
    @if(Auth::check())
    <div class="flex items-center gap-6">
        <div class="hidden md:flex gap-8 text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">
            <a href="/dashboard" class="hover:text-indigo-600 transition">Dashboard</a>
            <a href="/categories" class="hover:text-indigo-600 transition">Kategori</a>
        </div>

        <div class="flex items-center gap-4 border-l border-slate-100 pl-6">
            <div class="text-right hidden sm:block">
                <p class="text-[10px] text-slate-400 uppercase font-black tracking-[0.2em] mb-0.5">Halo,</p>
                <p class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">{{ Auth::user()->name }}</p>
            </div>
            
            <a href="/profile" class="w-11 h-11 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-extrabold shadow-lg shadow-indigo-200 hover:scale-110 hover:rotate-3 transition-all cursor-pointer border-2 border-white/50 backdrop-blur-md">
                {{ substr(preg_replace('/[^A-Z]/', '', ucwords(Auth::user()->name)), 0, 2) ?: 'U' }}
            </a>
        </div>
    </div>
    @endif
</nav>

    <!-- Main Content Area dengan Animasi -->
    <main class="flex-1 p-6 md:p-12 page-transition">
        {{-- Area ini akan diisi oleh konten dari file dashboard, create, detail, dll --}}
        @yield('content')
    </main>

 
<footer class="bg-white/40 backdrop-blur-xl border-t border-white/50 px-8 py-6 mt-auto">
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
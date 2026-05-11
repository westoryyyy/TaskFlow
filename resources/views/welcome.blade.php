<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow | Manage Your Academic Life</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.cdnfonts.com/css/gilroy-bold');
        body { font-family: 'Gilroy', sans-serif; background-color: #ffffff; overflow-x: hidden; }
        
        .animate-up {
            animation: fadeInUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 6s ease-in-out 3s infinite;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        @keyframes gradientX {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradientX 4s ease infinite;
        }
        
        .glass-panel {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col relative antialiased selection:bg-indigo-500 selection:text-white text-slate-800 bg-slate-50/50">

    <!-- Background Orbs -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[50vw] h-[50vw] rounded-full bg-purple-400/20 blur-[120px] animate-[pulse_8s_ease-in-out_infinite]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[60vw] h-[60vw] rounded-full bg-indigo-400/20 blur-[120px] animate-[pulse_10s_ease-in-out_infinite_reverse]"></div>
        <div class="absolute top-[20%] right-[10%] w-[40vw] h-[40vw] rounded-full bg-pink-400/20 blur-[100px] animate-[pulse_12s_ease-in-out_infinite]"></div>
    </div>

    <!-- Navbar -->
    <nav class="w-full glass-panel px-8 md:px-16 py-5 flex justify-between items-center fixed top-0 z-50">
        <div class="flex items-center gap-3 group cursor-pointer">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-200 group-hover:scale-110 transition-transform duration-500 rotate-3 group-hover:rotate-6">✓</div>
            <span class="font-black text-slate-800 text-2xl tracking-tighter">TaskFlow</span>
        </div>
        
        <div class="flex items-center gap-4">
            @auth
                <a href="/dashboard" class="text-sm font-extrabold text-slate-600 hover:text-indigo-600 transition-colors hidden sm:block mr-4">Go to Dashboard</a>
                <a href="/dashboard" class="w-10 h-10 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold shadow-md hover:scale-105 transition-transform cursor-pointer">
                    {{ substr(preg_replace('/[^A-Z]/', '', ucwords(Auth::user()->name)), 0, 2) ?: 'U' }}
                </a>
            @else
                <a href="/login" class="text-sm font-extrabold text-slate-600 hover:text-indigo-600 transition-colors hidden sm:block">Log In</a>
                <a href="/register" class="bg-slate-800 hover:bg-slate-700 text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all hover:shadow-[0_8px_20px_rgba(0,0,0,0.15)] hover:-translate-y-0.5">
                    Daftar Sekarang
                </a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex-1 flex flex-col items-center justify-center pt-32 pb-20 px-6 relative z-10 w-full max-w-7xl mx-auto">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-8 items-center w-full">
            
            <!-- Left Text Content -->
            <div class="text-left animate-up space-y-8" style="animation-delay: 0.1s; opacity: 0;">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-panel border-indigo-200 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-indigo-600">Terbaik untuk Mahasiswa</span>
                </div>
                
                <h1 class="text-6xl md:text-7xl lg:text-[5.5rem] font-black text-slate-800 tracking-tighter leading-[0.95]">
                    Organize your <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 animate-gradient-x block mt-2 pb-2">Academic Life.</span>
                </h1>
                
                <p class="text-lg md:text-xl text-slate-500 font-medium max-w-lg leading-relaxed">
                    Berhenti panik karena lupa tugas. TaskFlow membantu mencatat, mengkategorikan, dan mengingatkan deadline tugas kuliahmu dengan antarmuka yang cantik.
                </p>
                
                <div class="flex flex-wrap items-center gap-4 pt-4">
                    <a href="/register" class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white px-10 py-5 rounded-2xl font-black text-lg shadow-[0_15px_30px_-10px_rgba(99,102,241,0.6)] hover:shadow-[0_20px_40px_-10px_rgba(99,102,241,0.8)] transition-all hover:-translate-y-1 active:scale-95 border border-white/20 flex items-center gap-3">
                        Mulai Gratis <span>→</span>
                    </a>
                    <a href="#features" class="px-10 py-5 rounded-2xl font-bold text-slate-600 hover:bg-white/50 hover:shadow-sm transition-all border border-transparent hover:border-white/60">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                
                <!-- Micro Stats -->
                <div class="flex items-center gap-8 pt-8 border-t border-slate-200/50 mt-8">
                    <div>
                        <h4 class="text-3xl font-black text-slate-800">10k+</h4>
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Tugas Selesai</p>
                    </div>
                    <div class="w-px h-10 bg-slate-200"></div>
                    <div>
                        <h4 class="text-3xl font-black text-slate-800">5k+</h4>
                        <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Mahasiswa Aktif</p>
                    </div>
                </div>
            </div>

            <!-- Right Visual Mockup -->
            <div class="relative w-full h-[500px] lg:h-[600px] flex items-center justify-center animate-up" style="animation-delay: 0.3s; opacity: 0;">
                
                <!-- Main Glass Card -->
                <div class="absolute w-[90%] md:w-[400px] h-[480px] glass-panel rounded-[3rem] p-8 shadow-[0_30px_60px_rgba(0,0,0,0.08)] animate-float z-10 flex flex-col border border-white">
                    <div class="flex justify-between items-center mb-8">
                        <div class="space-y-1">
                            <h3 class="text-xl font-black text-slate-800">Tugas Hari Ini</h3>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">3 Deadline Mendekat</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-slate-100 border-2 border-white flex items-center justify-center text-sm font-bold text-indigo-500">
                            RP
                        </div>
                    </div>
                    
                    <div class="space-y-4 flex-1">
                        <!-- Task Item 1 -->
                        <div class="bg-white/80 p-5 rounded-3xl shadow-sm border border-white hover:-translate-y-1 transition-transform cursor-pointer group">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-[8px] font-black uppercase tracking-widest px-3 py-1 bg-red-100 text-red-600 rounded-full">Akademik</span>
                                <span class="text-red-500 text-xs font-bold bg-red-50 px-2 py-1 rounded-lg">Besok</span>
                            </div>
                            <h4 class="font-black text-slate-800 mb-1 group-hover:text-indigo-600 transition-colors">Tugas ERD Database</h4>
                            <p class="text-xs text-slate-500 font-medium line-clamp-1">Membuat desain ERD sesuai studi kasus perpustakaan.</p>
                        </div>
                        
                        <!-- Task Item 2 -->
                        <div class="bg-white/80 p-5 rounded-3xl shadow-sm border border-white hover:-translate-y-1 transition-transform cursor-pointer group">
                            <div class="flex justify-between items-start mb-3">
                                <span class="text-[8px] font-black uppercase tracking-widest px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full">Organisasi</span>
                                <span class="text-emerald-500 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-lg">3 Hari Lagi</span>
                            </div>
                            <h4 class="font-black text-slate-800 mb-1 group-hover:text-indigo-600 transition-colors">Proposal Acara</h4>
                            <p class="text-xs text-slate-500 font-medium line-clamp-1">Menyusun RAB dan latar belakang.</p>
                        </div>
                    </div>
                    
                    <button class="w-full py-4 mt-4 bg-slate-800 text-white rounded-2xl font-bold text-sm hover:bg-slate-700 transition-colors shadow-lg shadow-slate-200">
                        + Tambah Tugas Baru
                    </button>
                </div>

                <!-- Decorative Elements Background -->
                <div class="absolute w-[300px] h-[300px] bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-[3rem] rotate-12 opacity-20 blur-xl top-10 right-0 animate-pulse"></div>
                <div class="absolute w-[250px] h-[250px] bg-gradient-to-tl from-pink-400 to-rose-400 rounded-full -rotate-12 opacity-20 blur-xl bottom-10 left-10 animate-pulse" style="animation-delay: 2s;"></div>
                
                <!-- Floating Notification -->
                <div class="absolute -right-5 lg:-right-10 top-20 glass-panel px-6 py-4 rounded-2xl shadow-xl border border-white z-20 animate-float-delayed flex items-center gap-4">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-lg">🎉</div>
                    <div>
                        <h5 class="text-sm font-black text-slate-800">Tugas Selesai!</h5>
                        <p class="text-[10px] text-slate-500 font-bold">Laporan Praktikum Fisika</p>
                    </div>
                </div>

                <!-- Floating Stat -->
                <div class="absolute -left-5 lg:-left-12 bottom-32 glass-panel px-6 py-5 rounded-3xl shadow-xl border border-white z-20 animate-float flex flex-col items-center">
                    <div class="w-12 h-12 bg-indigo-50 rounded-full flex items-center justify-center mb-2">
                        <span class="text-indigo-600 font-black text-xl">🔥</span>
                    </div>
                    <h5 class="text-2xl font-black text-slate-800">12</h5>
                    <p class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Day Streak</p>
                </div>

            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section id="features" class="w-full max-w-7xl mx-auto px-6 py-24 relative z-10">
        <div class="text-center mb-16 animate-up">
            <h2 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tighter mb-4">Fitur Unggulan</h2>
            <p class="text-slate-500 font-medium">Dirancang khusus untuk membantu mahasiswa tetap terorganisir.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-panel p-8 rounded-[2.5rem] border border-white hover:-translate-y-2 transition-transform duration-300 shadow-[0_15px_30px_rgba(0,0,0,0.05)]">
                <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-indigo-600 text-2xl mb-6 shadow-inner">
                    ⏰
                </div>
                <h3 class="text-xl font-black text-slate-800 mb-3">Pengingat Pintar</h3>
                <p class="text-slate-500 font-medium leading-relaxed">Jangan pernah kelewatan deadline lagi. Sistem kami akan mengingatkanmu sebelum waktu tugas berakhir.</p>
            </div>
            
            <div class="glass-panel p-8 rounded-[2.5rem] border border-white hover:-translate-y-2 transition-transform duration-300 shadow-[0_15px_30px_rgba(0,0,0,0.05)]">
                <div class="w-14 h-14 bg-pink-100 rounded-2xl flex items-center justify-center text-pink-600 text-2xl mb-6 shadow-inner">
                    📂
                </div>
                <h3 class="text-xl font-black text-slate-800 mb-3">Kategori Tersusun</h3>
                <p class="text-slate-500 font-medium leading-relaxed">Pisahkan tugas kuliah, praktikum, dan kepanitiaan dengan kategori warna yang memanjakan mata.</p>
            </div>
            
            <div class="glass-panel p-8 rounded-[2.5rem] border border-white hover:-translate-y-2 transition-transform duration-300 shadow-[0_15px_30px_rgba(0,0,0,0.05)]">
                <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600 text-2xl mb-6 shadow-inner">
                    📈
                </div>
                <h3 class="text-xl font-black text-slate-800 mb-3">Progress Tracker</h3>
                <p class="text-slate-500 font-medium leading-relaxed">Pantau seberapa produktif dirimu dengan melihat rekapitulasi tugas selesai dan day streak-mu!</p>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="w-full max-w-7xl mx-auto px-6 py-20 relative z-10 border-t border-slate-200/50 mt-10">
        <div class="text-center mb-16 animate-up">
            <h2 class="text-4xl md:text-5xl font-black text-slate-800 tracking-tighter mb-4">Apa Kata Mereka?</h2>
            <p class="text-slate-500 font-medium">Ribuan mahasiswa sudah menggunakan TaskFlow untuk manajemen tugas mereka.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Review 1 -->
            <div class="glass-panel p-8 rounded-[2.5rem] hover:-translate-y-2 transition-transform duration-300 border border-white shadow-[0_15px_30px_rgba(0,0,0,0.05)] relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-indigo-400/10 rounded-full blur-2xl group-hover:bg-indigo-400/20 transition-colors"></div>
                <div class="flex text-amber-400 mb-6 text-xl">
                    ★★★★★
                </div>
                <p class="text-slate-600 font-medium mb-8 italic leading-relaxed">"Sejak pakai TaskFlow, aku gak pernah lagi begadang ngerjain tugas sistem mepet deadline. UI-nya juga manjain mata banget!"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-black text-sm shadow-md">BS</div>
                    <div>
                        <h5 class="text-sm font-black text-slate-800">Budi Santoso</h5>
                        <p class="text-[10px] text-slate-500 uppercase font-bold tracking-widest mt-0.5">Teknik Informatika</p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="glass-panel p-8 rounded-[2.5rem] hover:-translate-y-2 transition-transform duration-300 border border-white shadow-[0_15px_30px_rgba(0,0,0,0.05)] relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-pink-400/10 rounded-full blur-2xl group-hover:bg-pink-400/20 transition-colors"></div>
                <div class="flex text-amber-400 mb-6 text-xl">
                    ★★★★★
                </div>
                <p class="text-slate-600 font-medium mb-8 italic leading-relaxed">"Fitur kategorinya ngebantu banget misahin tugas akademik sama organisasi. Sangat direkomendasikan buat maba!"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-tr from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-white font-black text-sm shadow-md">AS</div>
                    <div>
                        <h5 class="text-sm font-black text-slate-800">Alya Salsabila</h5>
                        <p class="text-[10px] text-slate-500 uppercase font-bold tracking-widest mt-0.5">Sistem Informasi</p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="glass-panel p-8 rounded-[2.5rem] hover:-translate-y-2 transition-transform duration-300 border border-white shadow-[0_15px_30px_rgba(0,0,0,0.05)] relative overflow-hidden group">
                <div class="absolute -right-10 -top-10 w-32 h-32 bg-emerald-400/10 rounded-full blur-2xl group-hover:bg-emerald-400/20 transition-colors"></div>
                <div class="flex text-amber-400 mb-6 text-xl">
                    ★★★★★
                </div>
                <p class="text-slate-600 font-medium mb-8 italic leading-relaxed">"Gak nyangka ada web app buatan mahasiswa yang kualitas UI/UX-nya senyaman ini. Sukses terus buat TaskFlow!"</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-gradient-to-tr from-emerald-500 to-teal-500 rounded-full flex items-center justify-center text-white font-black text-sm shadow-md">RF</div>
                    <div>
                        <h5 class="text-sm font-black text-slate-800">Rizky Febrian</h5>
                        <p class="text-[10px] text-slate-500 uppercase font-bold tracking-widest mt-0.5">Ilmu Komputer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Giant CTA Section -->
    <section class="w-full max-w-5xl mx-auto px-6 py-24 relative z-10">
        <div class="glass-panel p-12 md:p-20 rounded-[3rem] md:rounded-[4rem] text-center border border-white shadow-[0_20px_40px_rgba(0,0,0,0.05)] relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 via-purple-500/10 to-pink-500/10 z-0"></div>
            <div class="relative z-10">
                <h2 class="text-4xl md:text-6xl font-black text-slate-800 tracking-tighter mb-6 leading-tight">
                    Siap Jadi Mahasiswa <br> Paling <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Produktif?</span>
                </h2>
                <p class="text-slate-500 font-medium mb-10 max-w-xl mx-auto text-lg">Bergabung dengan ribuan mahasiswa lainnya yang sudah mengubah kebiasaan menunda menjadi aksi nyata.</p>
                
                <a href="/register" class="inline-block bg-gradient-to-r from-slate-800 to-slate-700 hover:from-slate-700 hover:to-slate-600 text-white px-12 py-6 rounded-full font-black text-lg shadow-[0_15px_30px_rgba(0,0,0,0.1)] hover:shadow-[0_20px_40px_rgba(0,0,0,0.15)] transition-all hover:-translate-y-1 active:scale-95 border border-slate-600">
                    Daftar Akun Gratis
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full border-t border-white/50 glass-panel py-8 mt-10 z-10 relative">
        <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2 opacity-50">
                <div class="w-6 h-6 bg-slate-800 rounded-md flex items-center justify-center text-white font-bold text-[10px]">✓</div>
                <span class="font-black text-slate-800 text-lg tracking-tight">TaskFlow</span>
            </div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest text-center">
                © 2026 Informatics Student Project. All rights reserved.
            </p>
            <div class="flex gap-4 text-xs font-bold text-slate-400">
                <a href="#" class="hover:text-indigo-500 transition-colors">Privacy</a>
                <a href="#" class="hover:text-indigo-500 transition-colors">Terms</a>
            </div>
        </div>
    </footer>

</body>
</html>

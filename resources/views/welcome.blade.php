<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow | Manage Your Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.cdnfonts.com/css/gilroy-bold');
        body { font-family: 'Gilroy', sans-serif; background-color: #ffffff; overflow-x: hidden; }
        
        .animate-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-6 text-center">

    <!-- Hero Section Langsung Muncul Gede -->
    <div class="max-w-5xl w-full animate-up">
        <h1 class="text-6xl md:text-8xl font-black text-slate-800 tracking-tighter leading-[0.9] mb-12">
        Manage Your <span class="text-indigo-600">Tasks</span> <br> Like a Pro.
        </h1>


        <!-- Main Card Mockup sesuai gambar lu -->
        <div class="relative w-full max-w-4xl mx-auto group">
            <div class="bg-slate-100 rounded-[3.5rem] overflow-hidden shadow-[0_35px_60px_-15px_rgba(0,0,0,0.1)] border border-slate-50 aspect-video relative">
                <!-- Background Image Workspace -->
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=2072" 
                     class="w-full h-full object-cover opacity-60">
                
                <!-- Center Content -->
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <p class="text-slate-900 font-extrabold text-sm md:text-lg mb-8 tracking-tight">
                    </p>
                    
                    <a href="/register" class="bg-indigo-600 hover:bg-indigo-700 text-white px-12 py-5 rounded-2xl font-black text-sm shadow-2xl shadow-indigo-500/50 transition-all active:scale-95">
                        Get Started Now
                    </a>
                </div>
            </div>

            <!-- Floating Decoration Elements -->
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-indigo-50 rounded-[3rem] -z-10 animate-pulse"></div>
            <div class="absolute -top-10 -left-10 w-32 h-32 bg-slate-50 rounded-[2.5rem] -z-10"></div>
        </div>
    </div>

    <!-- Footer Tipis di Bawah Banget -->
    <footer class="absolute bottom-10 w-full px-12 flex justify-between items-center text-[10px] font-bold text-slate-300 uppercase tracking-widest">
        <p>© 2026 TASKFLOW SYSTEM</p>
        <p class="text-indigo-200">INFORMATICS STUDENT PROJECT</p>
    </footer>

</body>
</html>

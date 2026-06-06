<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - BikinWebsite | Buat Website Murah Bandung & UMKM</title>
    <meta name="description" content="Daftar akun BikinWebsite sekarang dan mulai buat website profesional, murah, dan cepat untuk UMKM Anda tanpa perlu keahlian koding.">
    <meta name="keywords" content="Daftar Bikin Website, Register, Bikin Website murah bandung, Bikin website murah umkm">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/BikinWebsiteLogo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    </noscript>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#FAFAFA] dark:bg-slate-900 text-slate-800 dark:text-slate-100 min-h-screen flex items-center justify-center relative overflow-hidden transition-colors duration-300 py-10">

    <div class="absolute top-[-5%] right-[-5%] w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-[128px] opacity-30 dark:opacity-20 pointer-events-none"></div>
    <div class="absolute bottom-[-5%] left-[-5%] w-[500px] h-[500px] bg-blue-500 rounded-full mix-blend-multiply filter blur-[128px] opacity-20 dark:opacity-10 pointer-events-none"></div>

    <div class="relative z-10 w-full max-w-md px-6">
        <div class="flex justify-center mb-6">
            <a href="/" class="text-3xl font-extrabold tracking-tighter text-blue-600 flex items-center gap-2">
                <img src="{{ asset('assets/img/logo/BikinWebsiteLogo.png') }}" width="40" height="40" fetchpriority="high" alt="Logo BikinWebsite" class="h-10 w-auto">
                <span>Bikin<span class="font-light text-3xl">Website</span></span>
            </a>
        </div>

        <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-xl rounded-[2rem] p-8 shadow-2xl border border-white/20 dark:border-slate-700/50">
            <h2 class="text-2xl font-bold mb-2 text-slate-900 dark:text-white">Buat Akun Baru </h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Mulai digitalisasi bisnismu hari ini.</p>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold mb-2 text-slate-700 dark:text-slate-300">Nama Anda</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nama anda" 
                        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                    @error('name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2 text-slate-700 dark:text-slate-300">Email Bisnis</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" 
                        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                    @error('email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300">Kata Sandi</label>
                        <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 forgot-password-trigger">Lupa sandi?</a>
                    </div>
                    <input type="password" name="password" required placeholder="Minimal 8 karakter" 
                        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                    @error('password') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-2 text-slate-700 dark:text-slate-300">Ulangi Kata Sandi</label>
                    <input type="password" name="password_confirmation" required placeholder="Ketik ulang sandi" 
                        class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3.5 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-600/30 transition-all transform hover:-translate-y-0.5">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="mt-6 flex items-center justify-center space-x-2">
                <div class="h-px w-full bg-slate-200 dark:bg-slate-700"></div>
                <span class="text-xs text-slate-500 font-medium px-2">ATAU</span>
                <div class="h-px w-full bg-slate-200 dark:bg-slate-700"></div>
            </div>

            <div class="mt-6 grid grid-cols-3 gap-3">
                <a href="{{ route('socialite.redirect', 'google') }}" aria-label="Daftar dengan Google" class="flex items-center justify-center py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors shadow-sm" title="Daftar dengan Google">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                </a>
                <a href="{{ route('socialite.redirect', 'facebook') }}" aria-label="Daftar dengan Facebook" class="flex items-center justify-center py-2.5 bg-[#1877F2]/10 dark:bg-[#1877F2]/20 border border-[#1877F2]/20 dark:border-[#1877F2]/30 rounded-xl hover:bg-[#1877F2]/20 dark:hover:bg-[#1877F2]/30 transition-colors shadow-sm" title="Daftar dengan Facebook">
                    <svg class="w-5 h-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="{{ route('socialite.redirect', 'instagram') }}" aria-label="Daftar dengan Instagram" class="flex items-center justify-center py-2.5 bg-pink-500/10 dark:bg-pink-500/20 border border-pink-500/20 dark:border-pink-500/30 rounded-xl hover:bg-pink-500/20 dark:hover:bg-pink-500/30 transition-colors shadow-sm" title="Daftar dengan Instagram">
                    <svg class="w-5 h-5 text-pink-600 dark:text-pink-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
            </div>

            <p class="text-center text-sm text-slate-500 dark:text-slate-400 mt-8 font-medium">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>

    <!-- Modal Lupa Password -->
    <div id="forgot-password-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <!-- Backdrop -->
        <div id="modal-backdrop" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity duration-300 opacity-0"></div>
        
        <!-- Modal Card -->
        <div id="modal-card" class="relative bg-white dark:bg-slate-800 rounded-[2rem] p-8 max-w-sm w-full mx-4 shadow-2xl border border-white/20 dark:border-slate-700/50 transform scale-95 opacity-0 transition-all duration-300">
            <!-- Close Button -->
            <button type="button" id="close-modal-btn" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-700" aria-label="Tutup">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Content -->
            <div class="text-center">
                <!-- Icon -->
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>

                <h3 class="text-xl font-extrabold text-slate-900 dark:text-white mb-2">Lupa Kata Sandi?</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 leading-relaxed">
                    Untuk memulihkan kata sandi Anda, silakan hubungi admin kami melalui WhatsApp. Kami akan membantu Anda memverifikasi dan mereset akun Anda.
                </p>

                <!-- Action Buttons -->
                <div class="space-y-3" style="display: flex; flex-direction: column; gap: 12px; margin-top: 24px;">
                    <a href="https://wa.me/628978657617?text=Halo%20Admin%2C%20saya%20lupa%20password%20untuk%20akun%20saya%20di%20BikinWebsite.%20Mohon%20bantuannya." 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="flex items-center justify-center gap-2 w-full bg-emerald-600 text-white font-bold py-3.5 px-4 rounded-xl hover:bg-emerald-700 shadow-lg shadow-emerald-600/30 transition-all transform hover:-translate-y-0.5"
                       style="background-color: #25D366; color: #ffffff; display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; font-weight: 700; padding: 14px 16px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3); border: none;">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" style="fill: #ffffff;">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.458 5.706 1.458h.008c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                    <button type="button" id="cancel-modal-btn" class="w-full bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-800 dark:text-slate-200 font-semibold py-3 px-4 rounded-xl transition-all"
                            style="width: 100%; background-color: rgba(156, 163, 175, 0.15); color: currentColor; font-weight: 600; padding: 12px 16px; border-radius: 12px; border: none; cursor: pointer;">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('forgot-password-modal');
            const backdrop = document.getElementById('modal-backdrop');
            const card = document.getElementById('modal-card');
            const triggers = document.querySelectorAll('.forgot-password-trigger');
            const closeBtn = document.getElementById('close-modal-btn');
            const cancelBtn = document.getElementById('cancel-modal-btn');

            function openModal(e) {
                if (e) e.preventDefault();
                modal.classList.remove('hidden');
                setTimeout(() => {
                    backdrop.classList.remove('opacity-0');
                    backdrop.classList.add('opacity-100');
                    card.classList.remove('scale-95', 'opacity-0');
                    card.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function closeModal() {
                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0');
                card.classList.remove('scale-100', 'opacity-100');
                card.classList.add('scale-95', 'opacity-0');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }

            triggers.forEach(trigger => {
                trigger.addEventListener('click', openModal);
            });

            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);
            backdrop.addEventListener('click', closeModal);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
</body>
</html>
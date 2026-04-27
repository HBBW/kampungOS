<main class="flex-grow flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 py-4 sm:py-6 md:py-8 login-container z-10">
    <div class="w-full max-w-[90%] sm:max-w-sm md:max-w-md lg:max-w-md xl:max-w-md">

        <div class="text-center mb-6 sm:mb-8 md:mb-10 animate-stagger stagger-1">
            <div class="inline-flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-primary text-white rounded-2xl shadow-xl shadow-primary/20 mb-4 rotate-3 brand-icon hover:rotate-0 transition-transform duration-300">
                <span class="material-symbols-outlined text-2xl sm:text-3xl md:text-4xl text-white" data-icon="account_balance">account_balance</span>
            </div>
            <h1 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-primary tracking-tight mb-1 italic">KampungOS</h1>
            <p class="text-on-surface-variant font-label text-[9px] sm:text-[10px] md:text-[11px] uppercase tracking-[0.3em]">Digital Town Hall</p>
        </div>

        <div class="space-y-5 sm:space-y-6 md:space-y-7">
            <div class="text-center animate-stagger stagger-2">
                <h2 class="text-base sm:text-lg md:text-xl font-serif text-primary font-semibold mb-1">Masuk ke Akun Warga</h2>
                <p class="text-on-surface-variant text-[11px] sm:text-xs md:text-sm font-body leading-relaxed max-w-[240px] sm:max-w-[260px] md:max-w-[280px] mx-auto">
                    Akses layanan komunitas resmi dengan identitas terverifikasi Anda.
                </p>
            </div>

            <form id="loginForm" class="space-y-3 sm:space-y-4 md:space-y-5 animate-stagger stagger-3">
                <div class="space-y-1.5">
                    <label class="block font-label text-[9px] sm:text-[10px] md:text-[11px] font-bold text-on-surface-variant uppercase tracking-widest pl-1" for="id-number">Nomor NIK</label>
                    <div class="relative group">
                        <input class="w-full px-3 sm:px-4 md:px-5 py-2.5 sm:py-3 md:py-3.5 bg-surface-container-low border border-transparent rounded-xl sm:rounded-2xl focus:bg-surface-container-lowest focus:border-primary/20 focus:ring-0 transition-all duration-300 text-on-surface font-body placeholder:text-outline/40 text-sm sm:text-base" id="id_number" name="id_number" placeholder="3275000..." type="text">
                    </div>
                </div>
                <div class="space-y-1.5">
                    <div class="flex justify-between items-center px-1">
                        <label class="block font-label text-[9px] sm:text-[10px] md:text-[11px] font-bold text-on-surface-variant uppercase tracking-widest" for="password">Kata Sandi</label>
                        <a class="text-[9px] sm:text-[10px] md:text-[11px] font-label font-bold text-primary hover:text-primary/70 transition-colors uppercase tracking-widest" href="#">Lupa?</a>
                    </div>
                    <div class="relative group">
                        <input class="w-full px-3 sm:px-4 md:px-5 py-2.5 sm:py-3 md:py-3.5 bg-surface-container-low border border-transparent rounded-xl sm:rounded-2xl focus:bg-surface-container-lowest focus:border-primary/20 focus:ring-0 transition-all duration-300 text-on-surface font-body placeholder:text-outline/40 pr-10 sm:pr-12 md:pr-14 text-sm sm:text-base" id="password" name="password" placeholder="••••••••" type="password">
                        <button class="absolute right-2 sm:right-3 md:right-4 top-1/2 -translate-y-1/2 text-outline/60 hover:text-primary transition-colors p-1 toggle-password" type="button">
                            <span class="material-symbols-outlined text-base sm:text-lg md:text-xl" data-icon="visibility">visibility</span>
                        </button>
                    </div>
                </div>
                <div class="pt-1 sm:pt-2 md:pt-3">
                    <button class="w-full bg-primary text-white font-bold py-3 sm:py-3.5 md:py-4 rounded-xl sm:rounded-2xl shadow-xl shadow-primary/25 hover:shadow-2xl hover:shadow-primary/40 transition-all duration-500 active:scale-[0.98] flex justify-center items-center gap-2 sm:gap-3 group cta-button" type="submit">
                        <span class="tracking-wide text-xs sm:text-sm md:text-base text-white">Masuk Sekarang</span>
                        <span class="material-symbols-outlined text-sm sm:text-base md:text-lg text-white group-hover:translate-x-1 transition-transform duration-300" data-icon="arrow_forward">arrow_forward</span>
                    </button>
                </div>
            </form>

            <div class="flex flex-col items-center gap-3 sm:gap-4 pt-1 sm:pt-2 md:pt-3 animate-stagger stagger-4">
                <p class="text-on-surface-variant text-[10px] sm:text-xs font-body">Butuh bantuan akses?</p>
                <button id="helpButton" class="flex items-center gap-2 sm:gap-3 px-3 sm:px-4 md:px-5 py-1.5 sm:py-2 md:py-2.5 bg-surface-container-high/50 hover:bg-surface-container-high rounded-full transition-all duration-300 border border-outline-variant/10">
                    <span class="material-symbols-outlined text-sm sm:text-base md:text-lg text-primary" data-icon="support_agent">support_agent</span>
                    <span class="text-[9px] sm:text-[10px] md:text-xs font-label font-bold text-on-surface uppercase tracking-wider">Hubungi Admin</span>
                </button>
            </div>
        </div>

        <div class="mt-6 sm:mt-8 md:mt-10 text-center animate-stagger stagger-5">
            <p class="text-on-surface-variant text-[10px] sm:text-xs md:text-sm font-body">
                Belum terdaftar? <a class="text-primary font-bold hover:underline decoration-primary/30 underline-offset-4 transition-all" href="#">Daftar Warga</a>
            </p>
        </div>
    </div>
</main>

<footer class="w-full px-4 sm:px-6 pb-4 sm:pb-6 md:pb-8 flex flex-col items-center gap-3 sm:gap-4 animate-stagger stagger-6 z-10 relative">
    <div class="flex flex-wrap justify-center gap-x-4 sm:gap-x-6 md:gap-x-8 gap-y-1 footer-links">
        <a class="text-[8px] sm:text-[9px] md:text-[10px] text-outline hover:text-primary uppercase tracking-[0.15em] transition-colors font-medium" href="#">Privacy</a>
        <a class="text-[8px] sm:text-[9px] md:text-[10px] text-outline hover:text-primary uppercase tracking-[0.15em] transition-colors font-medium" href="#">Terms</a>
        <a class="text-[8px] sm:text-[9px] md:text-[10px] text-outline hover:text-primary uppercase tracking-[0.15em] transition-colors font-medium" href="#">Help</a>
    </div>
    <p class="text-[7px] sm:text-[8px] md:text-[9px] text-outline/60 text-center uppercase tracking-[0.2em] font-medium leading-relaxed">
        © 2026 KampungOS<br>
        <span class="opacity-50 text-[6px] sm:text-[7px] md:text-[8px]">A Digital Town Hall Initiative</span>
    </p>
</footer>

<div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden">
    <div class="absolute -top-24 -right-24 w-72 sm:w-96 h-72 sm:h-96 bg-primary/5 rounded-full blur-[100px] animate-pulse-slow"></div>
    <div class="absolute -bottom-24 -left-24 w-72 sm:w-96 h-72 sm:h-96 bg-tertiary/5 rounded-full blur-[100px] animate-pulse-slow" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle_at_center,rgba(255,255,255,0)_0%,rgba(251,249,245,1)_100%)]"></div>
</div>

<script>
    $(document).ready(function() {
        // Logic Toggle Password
        $('.toggle-password').on('click', function(e) {
            e.preventDefault();
            var passwordInput = $('#password');
            var iconSpan = $(this).find('.material-symbols-outlined');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
                iconSpan.text('visibility_off');
            } else {
                passwordInput.attr('type', 'password');
                iconSpan.text('visibility');
            }
        });

        // Config UI Styling Swal Universal
        const swalConfig = {
            background: '#ffffff',
            customClass: {
                popup: 'rounded-[1.5rem] shadow-2xl border border-surface-container',
                title: 'font-serif text-xl',
                htmlContainer: 'text-on-surface-variant font-body text-sm',
                confirmButton: 'rounded-xl px-6 py-2.5 font-bold tracking-wide transition-transform active:scale-95'
            }
        };

        // Logic AJAX Login
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            var idNumber = $('#id_number').val().trim();
            var password = $('#password').val();

            if (!idNumber) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'warning',
                    title: 'NIK kosong',
                    text: 'Harap masukkan NIK',
                    confirmButtonColor: '#00236f',
                    customClass: {
                        ...swalConfig.customClass,
                        title: 'font-serif text-primary text-xl'
                    }
                });
                return;
            }
            if (!password) {
                Swal.fire({
                    ...swalConfig,
                    icon: 'warning',
                    title: 'Password kosong',
                    text: 'Harap masukkan kata sandi',
                    confirmButtonColor: '#00236f',
                    customClass: {
                        ...swalConfig.customClass,
                        title: 'font-serif text-primary text-xl'
                    }
                });
                return;
            }

            Swal.fire({
                ...swalConfig,
                title: 'Memproses...',
                text: 'Sedang login ke sistem',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: "<?= base_url('auth/login') ?>",
                type: "POST",
                data: {
                    id_number: idNumber,
                    password: password
                },
                dataType: "json",
                success: function(res) {
                    console.log("RES:", res);
                    if (res.status) {
                        Swal.fire({
                            ...swalConfig,
                            icon: 'success',
                            title: 'Berhasil Login',
                            timer: 1200,
                            showConfirmButton: false,
                            backdrop: `rgba(0, 35, 111, 0.4)`,
                            customClass: {
                                ...swalConfig.customClass,
                                title: 'font-serif text-primary text-xl'
                            }
                        });
                        setTimeout(() => {
                            window.location.href = res.redirect;
                        }, 1200);
                    } else {
                        Swal.fire({
                            ...swalConfig,
                            icon: 'error',
                            title: 'Login gagal',
                            text: res.message,
                            confirmButtonColor: '#00236f',
                            backdrop: `rgba(0, 0, 0, 0.4)`,
                            customClass: {
                                ...swalConfig.customClass,
                                title: 'font-serif text-error text-xl'
                            }
                        });
                    }
                },
                error: function(xhr) {
                    console.log("ERROR:", xhr.responseText);
                    Swal.fire({
                        ...swalConfig,
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Terjadi kesalahan pada server',
                        confirmButtonColor: '#ba1a1a',
                        customClass: {
                            ...swalConfig.customClass,
                            title: 'font-serif text-error text-xl',
                            popup: 'rounded-[1.5rem] shadow-2xl border border-error-container'
                        }
                    });
                }
            });
        });

        // Modals Info
        $('#helpButton').on('click', function() {
            Swal.fire({
                ...swalConfig,
                icon: 'info',
                title: 'Hubungi Admin',
                confirmButtonColor: '#00236f',
                customClass: {
                    ...swalConfig.customClass,
                    title: 'font-serif text-primary text-xl'
                },
                html: `
             <div style="display: flex; gap: 2rem; background: #f8fafc; padding: 1rem 1.5rem; border-radius: 1rem; font-family: 'Segoe UI', system-ui, sans-serif; font-size: 1rem; color: #1e293b; box-shadow: 0 2px 8px rgba(0,0,0,0.05); flex-wrap: wrap; align-items: center; justify-content: center;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    📞 <span style="font-weight: 500;">0804-1234-5678</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    📧 <span style="font-weight: 500;">admin@kampungos.id</span>
                </div>
            </div>
            `
            });
        });
        $('a[href="#"]').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                ...swalConfig,
                icon: 'info',
                title: 'Segera Hadir',
                text: 'Fitur pemulihan kata sandi akan tersedia segera.',
                confirmButtonColor: '#00236f',
                customClass: {
                    ...swalConfig.customClass,
                    title: 'font-serif text-primary text-xl'
                }
            });
        });
        $('a:contains("Daftar Warga")').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                ...swalConfig,
                icon: 'info',
                title: 'Pendaftaran Warga',
                confirmButtonColor: '#00236f',
                customClass: {
                    ...swalConfig.customClass,
                    title: 'font-serif text-primary text-xl'
                },
                html: `
                Silakan datang ke kantor desa<br>
                atau hubungi:<br><br>
                📞 0812-3456-7890
            `
            });
        });

        // CSS Animasi & Layout Responsive Center
        var styleResponsive = $('<style>').text(`
        * {
            max-width: 100%;
            box-sizing: border-box;
        }
        
        body {
            overflow-x: hidden;
            overflow-y: auto;
            width: 100%;
            position: relative;
            /* PERUBAHAN UTAMA: Agar ke-tengah di HP */
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
        }
        
        html {
            overflow-x: hidden;
            overflow-y: auto;
            width: 100%;
            height: 100%;
        }

        /* --- Animasi Staggered Entrance Halus --- */
        .login-container {
            animation: containerEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-stagger {
            opacity: 0;
            transform: translateY(20px);
            animation: itemEntrance 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        .stagger-5 { animation-delay: 0.5s; }
        .stagger-6 { animation-delay: 0.6s; }

        @keyframes containerEntrance {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes itemEntrance {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Ambient Background Anim */
        .animate-pulse-slow {
            animation: pulse-slow 8s infinite alternate ease-in-out;
        }

        @keyframes pulse-slow {
            0% { transform: scale(1); opacity: 0.5; }
            100% { transform: scale(1.1); opacity: 0.8; }
        }
        /* -------------------------------------- */
        
        @media (min-width: 1025px) {
            body {
                justify-content: center;
                overflow-y: hidden;
            }
            
            .login-container {
                justify-content: center !important;
                min-height: auto !important;
            }
            
            footer {
                position: relative;
            }
        }
        
        @media (max-width: 640px) {
            .login-container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .cta-button {
                font-size: 0.9rem;
            }
            input, button {
                font-size: 16px;
            }
        }
        
        @media (min-width: 641px) and (max-width: 768px) {
            .login-container {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
        
        @media (min-width: 769px) and (max-width: 1024px) {
            .login-container {
                padding-left: 3rem;
                padding-right: 3rem;
            }
        }
        
        @media (min-width: 1025px) {
            .login-container {
                padding-left: 4rem;
                padding-right: 4rem;
                padding-top: 0;
                padding-bottom: 0;
            }
            .max-w-md {
                max-width: 28rem;
            }
        }
        
        input:focus {
            outline: none;
            box-shadow: 0 0 0 2px #fbf9f5, 0 0 0 4px #00236f;
        }
    `);
        $('head').append(styleResponsive);
    });
</script>
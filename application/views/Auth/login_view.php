<main class="flex-grow flex flex-col items-center justify-center px-4 sm:px-6 md:px-8 py-4 sm:py-6 md:py-8 login-container z-10">
    <div class="w-full max-w-[90%] sm:max-w-sm md:max-w-md lg:max-w-md xl:max-w-md">

        <div class="text-center mb-6 sm:mb-8 md:mb-10 animate-stagger stagger-1">
            <div class="inline-flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-primary text-white rounded-2xl shadow-xl shadow-primary/20 mb-4 rotate-3 brand-icon hover:rotate-0 transition-transform duration-300">
                <span class="material-symbols-outlined text-2xl sm:text-3xl md:text-4xl text-white">account_balance</span>
            </div>
            <h1 class="text-xl sm:text-2xl md:text-3xl font-serif font-bold text-primary tracking-tight mb-1 italic">KampungOS</h1>
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
                    <label class="block font-label text-[9px] sm:text-[10px] md:text-[11px] font-bold text-on-surface-variant uppercase tracking-widest pl-1" for="id_number">Nomor NIK</label>
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
                            <span class="material-symbols-outlined text-base sm:text-lg md:text-xl">visibility</span>
                        </button>
                    </div>
                </div>
                <div class="pt-1 sm:pt-2 md:pt-3">
                    <button class="w-full bg-primary text-white font-bold py-3 sm:py-3.5 md:py-4 rounded-xl sm:rounded-2xl shadow-xl shadow-primary/25 hover:shadow-2xl hover:shadow-primary/40 transition-all duration-500 active:scale-[0.98] flex justify-center items-center gap-2 sm:gap-3 group cta-button" type="submit">
                        <span class="tracking-wide text-xs sm:text-sm md:text-base text-white">Masuk Sekarang</span>
                        <span class="material-symbols-outlined text-sm sm:text-base md:text-lg text-white group-hover:translate-x-1 transition-transform duration-300">arrow_forward</span>
                    </button>
                </div>
            </form>

            <div class="flex flex-col items-center gap-3 sm:gap-4 pt-1 sm:pt-2 md:pt-3 animate-stagger stagger-4">
                <p class="text-on-surface-variant text-[10px] sm:text-xs font-body">Butuh bantuan akses?</p>
                <button id="helpButton" class="flex items-center gap-2 sm:gap-3 px-3 sm:px-4 md:px-5 py-1.5 sm:py-2 md:py-2.5 bg-surface-container-high/50 hover:bg-surface-container-high rounded-full transition-all duration-300 border border-outline-variant/10">
                    <span class="material-symbols-outlined text-sm sm:text-base md:text-lg text-primary">support_agent</span>
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
        &copy; 2026 KampungOS
    </p>
</footer>

<div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden">
    <div class="absolute -top-24 -right-24 w-72 sm:w-96 h-72 sm:h-96 bg-primary/5 rounded-full blur-[100px] animate-pulse-slow"></div>
    <div class="absolute -bottom-24 -left-24 w-72 sm:w-96 h-72 sm:h-96 bg-tertiary/5 rounded-full blur-[100px] animate-pulse-slow" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle_at_center,rgba(255,255,255,0)_0%,rgba(251,249,245,1)_100%)]"></div>
</div>

<script>
$(document).ready(function() {
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

    const PRIMARY = '#0F6E6B';
    const ERROR = '#D44C3A';

    const swalBase = {
        customClass: {
            popup: 'swal-popup-custom',
            title: 'swal-title-custom',
            confirmButton: 'swal-confirm-custom'
        },
        buttonsStyling: false
    };

    const btnConfirm = `<button class="swal2-confirm swal-confirm-custom" style="background:${PRIMARY};color:#fff;padding:0.6rem 1.5rem;border-radius:0.75rem;font-weight:700;font-size:0.875rem;cursor:pointer;border:none;transition:opacity 0.2s" onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">OK</button>`;
    const btnConfirmDeny = (leftBg, leftText, rightBg, rightText) => `
        <div style="display:flex;gap:0.5rem;justify-content:center">
            <button class="swal2-cancel" style="background:${leftBg};color:${leftText};padding:0.6rem 1.5rem;border-radius:0.75rem;font-weight:700;font-size:0.875rem;cursor:pointer;border:1px solid #D1D9D2;transition:opacity 0.2s" onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">Batal</button>
            <button class="swal2-confirm" style="background:${rightBg};color:${rightText};padding:0.6rem 1.5rem;border-radius:0.75rem;font-weight:700;font-size:0.875rem;cursor:pointer;border:none;transition:opacity 0.2s" onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">Ya</button>
        </div>`;

    function showAlert(icon, title, text, opts = {}) {
        Swal.fire({
            ...swalBase,
            icon: icon,
            title: title,
            html: `<p style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;margin:0.5rem 0 0">${text}</p>`,
            confirmButtonText: 'OK',
            confirmButtonColor: PRIMARY,
            showConfirmButton: true,
            ...opts
        });
    }

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        var idNumber = $('#id_number').val().trim();
        var password = $('#password').val();

        if (!idNumber) {
            showAlert('warning', 'NIK Kosong', 'Harap masukkan nomor NIK Anda.');
            return;
        }
        if (!password) {
            showAlert('warning', 'Password Kosong', 'Harap masukkan kata sandi.');
            return;
        }

        Swal.fire({
            ...swalBase,
            title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Memproses...</span>`,
            html: `<p style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;margin:0">Sedang masuk ke sistem</p>`,
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => { Swal.showLoading(); }
        });

        $.ajax({
            url: "<?= base_url('auth/login') ?>",
            type: "POST",
            data: { id_number: idNumber, password: password },
            dataType: "json",
            success: function(res) {
                if (res.status) {
                    Swal.fire({
                        ...swalBase,
                        icon: 'success',
                        title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Berhasil Masuk</span>`,
                        html: `<p style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;margin:0">Selamat datang!</p>`,
                        showConfirmButton: false,
                        timer: 1200
                    });
                    setTimeout(() => { window.location.href = res.redirect; }, 1200);
                } else {
                    showAlert('error', 'Login Gagal', res.message || 'NIK atau password salah');
                }
            },
            error: function() {
                showAlert('error', 'Kesalahan Server', 'Terjadi masalah koneksi. Coba lagi nanti.');
            }
        });
    });

    $('#helpButton').on('click', function() {
        Swal.fire({
            ...swalBase,
            icon: 'info',
            title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Hubungi Admin</span>`,
            html: `
                <div style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;text-align:center;padding:0.5rem 0">
                    <div style="display:inline-flex;flex-direction:column;gap:0.75rem;background:#F4EFE8;padding:1rem 1.5rem;border-radius:0.75rem">
                        <div style="display:flex;align-items:center;gap:0.5rem;justify-content:center"><span style="font-size:1rem">0804-1234-5678</span></div>
                        <div style="display:flex;align-items:center;gap:0.5rem;justify-content:center"><span style="font-size:1rem">admin@kampungos.id</span></div>
                    </div>
                </div>`,
            confirmButtonText: 'OK',
            confirmButtonColor: PRIMARY
        });
    });

    $('a[href="#"]:not(:contains("Daftar"))').on('click', function(e) {
        e.preventDefault();
        var linkText = $(this).text().trim().toLowerCase();
        if (linkText === 'privacy') {
            Swal.fire({
                ...swalBase,
                icon: 'info',
                title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Kebijakan Privasi</span>`,
                html: `<div style="font-family:'Public Sans',sans-serif;font-size:0.8rem;color:#4F5B5B;text-align:left;line-height:1.8">
                    <p>KampungOS menjaga kerahasiaan data pribadi seluruh warga. Data yang dikumpulkan hanya digunakan untuk keperluan administrasi RT.</p>
                    <p>Data yang disimpan meliputi: NIK, Nomor KK, nama, alamat, dan riwayat pengajuan surat.</p>
                    <p>Data tidak akan dibagikan kepada pihak ketiga tanpa persetujuan.</p>
                </div>`,
                confirmButtonText: 'OK',
            confirmButtonColor: PRIMARY
            });
        } else if (linkText === 'terms') {
            Swal.fire({
                ...swalBase,
                icon: 'info',
                title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Syarat & Ketentuan</span>`,
                html: `<div style="font-family:'Public Sans',sans-serif;font-size:0.8rem;color:#4F5B5B;text-align:left;line-height:1.8">
                    <p>Dengan menggunakan KampungOS, Anda menyetujui:</p>
                    <p>1. Data yang diisi adalah benar dan dapat diverifikasi.</p>
                    <p>2. Pengajuan surat tunduk pada proses verifikasi RT.</p>
                    <p>3. Penyalahgunaan sistem dapat mengakibatkan pemblokiran akun.</p>
                </div>`,
                confirmButtonText: 'OK',
            confirmButtonColor: PRIMARY
            });
        } else if (linkText === 'help') {
            Swal.fire({
                ...swalBase,
                icon: 'info',
                title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Bantuan</span>`,
                html: `<div style="font-family:'Public Sans',sans-serif;font-size:0.8rem;color:#4F5B5B;text-align:left;line-height:1.8">
                    <p><b>Lupa password?</b> Hubungi RT atau admin di <strong style="color:${PRIMARY}">0812-3456-7890</strong></p>
                    <p><b>Belum terdaftar?</b> Datang ke kantor RT dengan membawa KK.</p>
                    <p><b>Error teknis?</b> Hubungi admin di <strong style="color:${PRIMARY}">admin@kampungos.id</strong></p>
                </div>`,
                confirmButtonText: 'OK',
            confirmButtonColor: PRIMARY
            });
        } else {
            showAlert('info', 'Segera Hadir', 'Fitur ini akan tersedia dalam waktu dekat.');
        }
    });

    $('a:contains("Daftar Warga")').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            ...swalBase,
            icon: 'info',
            title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Pendaftaran Warga</span>`,
            html: `<p style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;margin:0">Silakan datang ke kantor desa atau hubungi<br><strong style="color:${PRIMARY}">0812-3456-7890</strong></p>`,
            confirmButtonText: 'OK',
            confirmButtonColor: PRIMARY
        });
    });

    var styleResponsive = $('<style>').text(`
        body { overflow-x: hidden; overflow-y: auto; width: 100%; min-height: 100vh; min-height: 100dvh; display: flex; flex-direction: column; margin: 0; padding: 0; }
        html { overflow-x: hidden; overflow-y: auto; width: 100%; height: 100%; }
        .login-container { animation: containerEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .animate-stagger { opacity: 0; transform: translateY(20px); animation: itemEntrance 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        .stagger-5 { animation-delay: 0.5s; }
        .stagger-6 { animation-delay: 0.6s; }
        @keyframes containerEntrance { from { opacity: 0; transform: scale(0.98); } to { opacity: 1; transform: scale(1); } }
        @keyframes itemEntrance { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-pulse-slow { animation: pulse-slow 8s infinite alternate ease-in-out; }
        @keyframes pulse-slow { 0% { transform: scale(1); opacity: 0.5; } 100% { transform: scale(1.1); opacity: 0.8; } }
        .swal2-popup { border-radius: 1.25rem !important; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15) !important; padding: 1.75rem 1.5rem 1.25rem !important; border: 1px solid #D1D9D2; }
        .swal2-icon { margin: 0 auto 0.75rem !important; }
        .swal2-icon .swal2-icon-content { font-size: 2.5rem !important; }
        .swal2-title { padding: 0 !important; margin-bottom: 0.25rem !important; }
        .swal2-html-container { margin: 0 !important; padding: 0 !important; }
        input:focus { outline: none; box-shadow: 0 0 0 2px #fbf9f5, 0 0 0 4px ${PRIMARY}; }
        @media (min-width: 1025px) { body { justify-content: center; overflow-y: hidden; } .login-container { justify-content: center !important; min-height: auto !important; } }
        @media (max-width: 640px) { .login-container { padding-left: 1rem; padding-right: 1rem; } .cta-button { font-size: 0.9rem; } input, button { font-size: 16px; } }
        @media (min-width: 641px) and (max-width: 768px) { .login-container { padding-left: 2rem; padding-right: 2rem; } }
        @media (min-width: 769px) and (max-width: 1024px) { .login-container { padding-left: 3rem; padding-right: 3rem; } }
        @media (min-width: 1025px) { .login-container { padding-left: 4rem; padding-right: 4rem; padding-top: 0; padding-bottom: 0; } .max-w-md { max-width: 28rem; } }
    `);
    $('head').append(styleResponsive);
});
</script>

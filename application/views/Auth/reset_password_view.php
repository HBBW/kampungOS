<!-- Header -->
<header class="w-full sticky top-0 z-50 bg-surface/95 backdrop-blur-sm border-b border-outline-variant/30">
    <div class="max-w-md mx-auto px-5 py-4 flex items-center gap-3">
        <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center">
            <span class="material-symbols-outlined text-primary text-xl">lock_reset</span>
        </div>
        <h1 class="font-headline text-xl font-bold text-on-surface">Reset Password</h1>
    </div>
</header>

<main class="flex-1 flex items-center justify-center px-5 py-8">
    <div class="w-full max-w-md mx-auto">
        <div class="bg-surface-container-lowest rounded-2xl shadow-lg overflow-hidden fade-in">
            <div class="bg-primary/5 px-6 pt-8 pb-4 text-center">
                <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="material-symbols-outlined text-primary text-4xl" style="font-variation-settings: 'FILL' 1;">password</span>
                </div>
                <h2 class="font-headline text-2xl font-bold text-on-surface">Buat Password Baru</h2>
                <p class="text-on-surface-variant text-sm mt-2">Masukkan password baru untuk akun Anda</p>
            </div>

            <div class="p-6">
                <form id="resetForm" class="space-y-5">
                    <div>
                        <label class="block font-semibold text-primary text-xs uppercase tracking-wider mb-2" for="newPassword">
                            Password Baru
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-xl">lock</span>
                            </div>
                            <input type="password" id="newPassword" name="newPassword"
                                class="w-full bg-surface-container-low border-0 rounded-xl py-4 pl-12 pr-12 text-on-surface placeholder:text-outline/50 focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all text-base"
                                placeholder="Minimal 8 karakter" required>
                            <button type="button" class="toggle-pwd absolute inset-y-0 right-4 flex items-center text-outline hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">visibility</span>
                            </button>
                        </div>
                        <div class="mt-2">
                            <div class="h-1.5 w-full bg-surface-container-high rounded-full overflow-hidden">
                                <div id="strengthBar" class="h-full w-0 transition-all duration-300 rounded-full"></div>
                            </div>
                            <p id="strengthText" class="text-xs text-outline mt-1.5"></p>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-primary text-xs uppercase tracking-wider mb-2" for="confirmPassword">
                            Konfirmasi Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-xl">verified</span>
                            </div>
                            <input type="password" id="confirmPassword" name="confirmPassword"
                                class="w-full bg-surface-container-low border-0 rounded-xl py-4 pl-12 pr-12 text-on-surface placeholder:text-outline/50 focus:ring-2 focus:ring-primary/40 focus:bg-surface-container-lowest transition-all text-base"
                                placeholder="Ketik ulang password" required>
                            <button type="button" class="toggle-confirm absolute inset-y-0 right-4 flex items-center text-outline hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-xl">visibility</span>
                            </button>
                        </div>
                        <p id="matchError" class="text-xs text-error mt-1.5 hidden flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">error</span> Password tidak cocok
                        </p>
                    </div>

                    <button type="submit" id="submitBtn"
                        class="w-full bg-primary text-white rounded-xl py-4 px-6 flex items-center justify-center gap-2 font-semibold shadow-lg shadow-primary/20 active:scale-[0.98] transition-all duration-300 hover:brightness-110 mt-6">
                        <span>Simpan Password</span>
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </button>
                </form>

                <div class="mt-6 p-4 bg-primary/5 rounded-xl border border-primary/10">
                    <div class="flex gap-3">
                        <span class="material-symbols-outlined text-primary text-sm shrink-0">info</span>
                        <div class="space-y-1">
                            <p class="text-xs text-on-surface-variant leading-relaxed">
                                <span class="font-semibold text-primary">Tips:</span> Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol untuk keamanan yang lebih baik.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="<?= base_url('Auth/login') ?>" id="backLink" class="inline-flex items-center gap-1 text-sm text-primary/70 hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                <span>Kembali ke halaman masuk</span>
            </a>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        const PRIMARY = '#0F6E6B';
        const ERROR = '#D44C3A';

        function showAlert(icon, title, text, opts = {}) {
            Swal.fire({
                icon: icon,
                title: title,
                html: `<p style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;margin:0.5rem 0 0">${text}</p>`,
                confirmButtonText: 'OK',
                confirmButtonColor: PRIMARY,
                buttonsStyling: false,
                customClass: { confirmButton: 'rounded-xl px-6 py-2.5 font-bold' },
                ...opts
            });
        }

        $('.toggle-pwd').click(function() {
            let input = $('#newPassword');
            let icon = $(this).find('span');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.text('visibility_off');
            } else {
                input.attr('type', 'password');
                icon.text('visibility');
            }
        });

        $('.toggle-confirm').click(function() {
            let input = $('#confirmPassword');
            let icon = $(this).find('span');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.text('visibility_off');
            } else {
                input.attr('type', 'password');
                icon.text('visibility');
            }
        });

        $('#newPassword').on('input', function() {
            let val = $(this).val();
            let strength = 0;
            if (val.length >= 8) strength++;
            if (/[A-Z]/.test(val)) strength++;
            if (/[0-9]/.test(val)) strength++;
            if (/[^A-Za-z0-9]/.test(val)) strength++;

            let bar = $('#strengthBar');
            let text = $('#strengthText');
            let width = (strength / 4) * 100;
            bar.css('width', width + '%');

            if (strength <= 1) { text.text('Lemah'); bar.css('background', '#D44C3A'); }
            else if (strength == 2) { text.text('Sedang'); bar.css('background', '#B4682D'); }
            else if (strength == 3) { text.text('Kuat'); bar.css('background', '#0F6E6B'); }
            else { text.text('Sangat Kuat'); bar.css('background', '#2a6038'); }
        });

        $('#resetForm').on('submit', function(e) {
            e.preventDefault();
            let password = $('#newPassword').val();
            let confirm = $('#confirmPassword').val();

            if (password.length < 6) {
                showAlert('warning', 'Password Terlalu Pendek', 'Minimal 6 karakter.');
                return;
            }

            if (password !== confirm) {
                $('#matchError').removeClass('hidden');
                return;
            } else {
                $('#matchError').addClass('hidden');
            }

            Swal.fire({
                title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:${PRIMARY}">Simpan Password Baru?</span>`,
                html: `<p style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;margin:0">Password lama Anda akan digantikan.</p>`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: PRIMARY,
                cancelButtonColor: '#D1D9D2',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'rounded-xl px-5 py-2 font-bold text-white',
                    cancelButton: 'rounded-xl px-5 py-2 font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#submitBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin text-lg mr-2">progress_activity</span> Menyimpan...');

                    $.ajax({
                        url: "<?= base_url('auth/update_password') ?>",
                        type: "POST",
                        data: { password: password },
                        dataType: "json",
                        success: function(res) {
                            if (res.status) {
                                showAlert('success', 'Password Tersimpan', 'Anda akan dialihkan ke halaman login.');
                                setTimeout(() => { window.location.href = res.redirect; }, 1500);
                            } else {
                                showAlert('error', 'Gagal', res.message || 'Terjadi kesalahan');
                                $('#submitBtn').prop('disabled', false).html('<span>Simpan Password</span><span class="material-symbols-outlined text-lg">arrow_forward</span>');
                            }
                        },
                        error: function() {
                            showAlert('error', 'Kesalahan Server', 'Terjadi masalah koneksi.');
                            $('#submitBtn').prop('disabled', false).html('<span>Simpan Password</span><span class="material-symbols-outlined text-lg">arrow_forward</span>');
                        }
                    });
                }
            });
        });
    });
</script>
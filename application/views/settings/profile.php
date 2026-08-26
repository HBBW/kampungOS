<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-2xl mx-auto w-full">

        <div class="mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Pengaturan Akun</h2>
            <p class="text-on-surface-variant text-sm sm:text-base mt-1">Kelola informasi profil Anda</p>
        </div>

        <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-card border border-outline-variant/20 mb-6">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-primary/30 to-primary/10 border-2 border-primary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-3xl">person</span>
                </div>
                <div>
                    <h3 class="font-headline font-bold text-on-surface text-xl"><?= htmlspecialchars($this->session->userdata('name')) ?></h3>
                    <p class="text-sm text-primary font-semibold capitalize"><?= htmlspecialchars($this->session->userdata('role')) ?> RT 02 / RW 04</p>
                </div>
            </div>

            <form id="settingsForm" class="space-y-5">
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-on-surface-variant block uppercase tracking-wider">Nama Lengkap</label>
                    <input type="text" id="settingsName" value="<?= htmlspecialchars($user_data->head_name ?? '') ?>" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm">
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-on-surface-variant block uppercase tracking-wider">NIK</label>
                    <input type="text" value="<?= htmlspecialchars($user_data->nik ?? '-') ?>" disabled class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 text-sm opacity-60 cursor-not-allowed">
                    <p class="text-[10px] text-on-surface-variant">NIK tidak dapat diubah</p>
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-on-surface-variant block uppercase tracking-wider">No. KK</label>
                    <input type="text" value="<?= htmlspecialchars($user_data->kk_number ?? '-') ?>" disabled class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 text-sm opacity-60 cursor-not-allowed">
                </div>

                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-on-surface-variant block uppercase tracking-wider">Alamat</label>
                    <textarea id="settingsAddress" rows="3" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm resize-none"><?= htmlspecialchars($user_data->address ?? '') ?></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 rounded-xl shadow-md hover:bg-primary-dark transition-all btn-action flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg">save</span>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 mb-6">
            <h4 class="font-headline font-bold text-on-surface mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">lock</span>
                Ubah Password
            </h4>
            <form id="passwordForm" class="space-y-4">
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-on-surface-variant block uppercase tracking-wider">Password Baru</label>
                    <input type="password" id="newPassword" placeholder="Minimal 6 karakter" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm">
                </div>
                <div class="space-y-1.5">
                    <label class="text-xs font-bold text-on-surface-variant block uppercase tracking-wider">Konfirmasi Password</label>
                    <input type="password" id="confirmPassword" placeholder="Ulangi password baru" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm">
                </div>
                <button type="submit" class="w-full border-2 border-primary text-primary font-bold py-3 rounded-xl hover:bg-primary hover:text-white transition-all btn-action">
                    Update Password
                </button>
            </form>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20">
            <h4 class="font-headline font-bold text-on-surface mb-2 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">info</span>
                Tentang KampungOS
            </h4>
            <div class="space-y-2 text-sm text-on-surface-variant">
                <p>Versi: <span class="font-semibold">1.0.0</span></p>
                <p>Sistem Manajemen Digital RT untuk Kampung Sari RT 02 / RW 04</p>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#settingsForm').on('submit', function(e) {
        e.preventDefault();
        const name = $('#settingsName').val().trim();
        const address = $('#settingsAddress').val().trim();

        if (!name) {
            Swal.fire({ icon: 'warning', title: 'Nama wajib diisi', confirmButtonColor: '#0F6E6B' });
            return;
        }

        Swal.fire({ title: 'Menyimpan...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });

        $.ajax({
            url: "<?= base_url('settings/update') ?>",
            type: "POST",
            data: { name: name, address: address },
            dataType: "json",
            success: function(res) {
                if (res.status) {
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                }
            },
            error: function() {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Terjadi kesalahan server', confirmButtonColor: '#0F6E6B' });
            }
        });
    });

    $('#passwordForm').on('submit', function(e) {
        e.preventDefault();
        const pwd = $('#newPassword').val();
        const confirm = $('#confirmPassword').val();

        if (!pwd || pwd.length < 6) {
            Swal.fire({ icon: 'warning', title: 'Password Minimal 6 Karakter', confirmButtonColor: '#0F6E6B' });
            return;
        }
        if (pwd !== confirm) {
            Swal.fire({ icon: 'warning', title: 'Password Tidak Cocok', confirmButtonColor: '#0F6E6B' });
            return;
        }

        Swal.fire({
            title: 'Ubah Password?',
            text: 'Anda akan login ulang setelah password diubah',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, ubah',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#0F6E6B'
        }).then(r => {
            if (r.isConfirmed) {
                Swal.fire({ title: 'Mengubah...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                $.ajax({
                    url: "<?= base_url('auth/update_password') ?>",
                    type: "POST",
                    data: { password: pwd },
                    dataType: "json",
                    success: function(res) {
                        if (res.status) {
                            Swal.fire({ icon: 'success', title: 'Password Diubah', confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => window.location.href = res.redirect);
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                        }
                    }
                });
            }
        });
    });
});
</script>

<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-7xl mx-auto w-full">

        <div class="relative overflow-hidden bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-6 sm:p-8 text-white shadow-large mb-8">
            <div class="absolute -right-4 -top-4 opacity-10">
                <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">forest</span>
            </div>
            <div class="relative z-10">
                <h2 class="text-2xl sm:text-3xl font-headline font-bold">Halo, <?= htmlspecialchars($this->session->userdata('name')) ?>! 👋</h2>
                <p class="text-primary-faded text-sm sm:text-base mt-2 max-w-lg opacity-90">Selamat datang di KampungOS. Pantau laporan, pengumuman, dan keuangan lingkungan Anda.</p>
                <div class="flex flex-wrap gap-3 mt-4">
                    <div class="bg-white/20 backdrop-blur-md px-3 py-1.5 rounded-lg flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        <span class="text-xs font-semibold"><?= date('l, d F Y') ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant font-semibold uppercase tracking-wide">Laporan Dikirim</p>
                        <h3 class="text-xl font-bold text-on-surface mt-0.5"><?= count($my_reports) ?> Laporan</h3>
                        <p class="text-xs text-primary font-semibold mt-1">Total laporan Anda</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-tertiary/10 flex items-center justify-center text-tertiary">
                        <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">pending_actions</span>
                    </div>
                    <div>
                        <p class="text-xs text-on-surface-variant font-semibold uppercase tracking-wide">Pengajuan Surat</p>
                        <h3 class="text-xl font-bold text-on-surface mt-0.5"><?= count($my_letters) ?> Surat</h3>
                        <p class="text-xs text-on-surface-variant mt-1">Total pengajuan surat</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="text-xl font-headline font-bold text-on-surface mb-4">Aksi Cepat</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                <a href="<?= site_url('warga/laporan') ?>" class="quick-action-btn bg-white rounded-xl p-4 shadow-card border border-outline-variant/20 text-center hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-full bg-error/10 text-error flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-2xl">report</span>
                    </div>
                    <span class="text-xs font-semibold text-on-surface">Lapor Masalah</span>
                </a>
                <a href="<?= site_url('warga/surat') ?>" class="quick-action-btn bg-white rounded-xl p-4 shadow-card border border-outline-variant/20 text-center hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-2xl">description</span>
                    </div>
                    <span class="text-xs font-semibold text-on-surface">Minta Surat</span>
                </a>
                <a href="<?= site_url('warga/iuran') ?>" class="quick-action-btn bg-white rounded-xl p-4 shadow-card border border-outline-variant/20 text-center hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-full bg-tertiary/10 text-tertiary flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-2xl">payments</span>
                    </div>
                    <span class="text-xs font-semibold text-on-surface">Bayar Iuran</span>
                </a>
                <a href="<?= site_url('warga/pengumuman') ?>" class="quick-action-btn bg-white rounded-xl p-4 shadow-card border border-outline-variant/20 text-center hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-full bg-secondary/10 text-secondary flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-2xl">groups</span>
                    </div>
                    <span class="text-xs font-semibold text-on-surface">Forum Warga</span>
                </a>
            </div>
        </div>

        <?php if (!empty($announcements)): ?>
        <div>
            <div class="flex justify-between items-end mb-4">
                <div>
                    <h3 class="text-xl font-headline font-bold text-on-surface">Warta Kampung</h3>
                    <p class="text-sm text-on-surface-variant">Informasi terkini dari lingkungan kita</p>
                </div>
                <a href="<?= site_url('warga/pengumuman') ?>" class="text-primary text-sm font-semibold hover:underline">Lihat Semua</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <?php foreach (array_slice($announcements, 0, 3) as $announcement): ?>
                <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-primary font-semibold mb-2">
                            <span class="material-symbols-outlined text-sm">schedule</span>
                            <span><?= date('d M Y', strtotime($announcement->created_at)) ?></span>
                        </div>
                        <h4 class="font-headline font-bold text-on-surface text-base mb-2"><?= htmlspecialchars($announcement->title) ?></h4>
                        <p class="text-sm text-on-surface-variant line-clamp-2"><?= htmlspecialchars($announcement->content) ?></p>
                        <div class="flex items-center justify-between pt-3 mt-3 border-t border-outline-variant/20">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-primary/20 flex items-center justify-center text-primary text-xs font-bold">RT</div>
                                <span class="text-xs font-semibold text-on-surface-variant"><?= htmlspecialchars($announcement->head_name ?? 'Pengurus RT') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

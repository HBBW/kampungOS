<!-- Content Canvas -->
<div class="flex-1 p-5 md:p-8 max-w-full mx-auto w-full pb-28 md:pb-8 animate-fade-in">
    <div class="mb-8">
        <p class="text-tertiary font-semibold text-sm uppercase tracking-wide mb-1">✨ <?= date('l, d F Y') ?></p>
        <h2 class="text-3xl md:text-4xl font-headline font-bold text-on-surface">Halo, Pak <?= htmlspecialchars($this->session->userdata('name')) ?> 👋</h2>
        <p class="text-on-surface-variant mt-1">Pantau aktivitas warga dan kelola layanan digital dalam satu genggaman.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
            <div class="flex justify-between items-start mb-3">
                <div class="p-2.5 rounded-xl bg-primary-faded text-primary">
                    <span class="material-symbols-outlined text-2xl">groups</span>
                </div>
            </div>
            <p class="text-on-surface-variant text-sm font-semibold uppercase tracking-wide">Total Warga</p>
            <h3 class="text-3xl font-bold mt-1"><?= number_format($total_warga, 0, ',', '.') ?></h3>
            <p class="text-xs text-on-surface-variant/70 mt-2">terdaftar di sistem</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
            <div class="flex justify-between items-start mb-3">
                <div class="p-2.5 rounded-xl bg-tertiary/10 text-tertiary">
                    <span class="material-symbols-outlined text-2xl">report_problem</span>
                </div>
                <?php if ($pending_reports > 0): ?>
                <span class="text-[11px] font-bold bg-error/10 text-error px-2 py-0.5 rounded-full">butuh respon</span>
                <?php endif; ?>
            </div>
            <p class="text-on-surface-variant text-sm font-semibold uppercase tracking-wide">Laporan Pending</p>
            <h3 class="text-3xl font-bold mt-1"><?= $pending_reports ?></h3>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
            <div class="p-2.5 rounded-xl bg-secondary/10 text-secondary mb-3">
                <span class="material-symbols-outlined text-2xl">history_edu</span>
            </div>
            <p class="text-on-surface-variant text-sm font-semibold uppercase tracking-wide">Surat Aktif</p>
            <h3 class="text-3xl font-bold mt-1"><?= $pending_letters ?></h3>
            <p class="text-xs text-on-surface-variant/70 mt-2">menunggu paraf digital</p>
        </div>

        <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-6 shadow-card text-white relative overflow-hidden card-hover">
            <div class="absolute right-0 top-0 opacity-10 -translate-y-2 translate-x-4"><span class="material-symbols-outlined text-7xl">account_balance_wallet</span></div>
            <div class="flex justify-between items-start relative z-10">
                <div class="p-2 rounded-xl bg-white/20">
                    <span class="material-symbols-outlined">savings</span>
                </div>
                <span class="material-symbols-outlined opacity-60">trending_up</span>
            </div>
            <p class="text-white/80 text-sm font-semibold uppercase tracking-wide mt-4 relative z-10">Kas RT</p>
            <h3 class="text-2xl font-bold mt-1 relative z-10">Rp <?= number_format($balance, 0, ',', '.') ?></h3>
            <p class="text-white/70 text-xs mt-1 relative z-10">+Rp <?= number_format($month_income, 0, ',', '.') ?> bulan ini</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-7">
            <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                <div class="flex flex-wrap justify-between items-center p-5 border-b border-outline-variant/20">
                    <h3 class="text-xl font-headline font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">rule</span>
                        Antrean Persetujuan Surat
                    </h3>
                    <a href="<?= base_url('rt/surat') ?>" class="text-primary text-sm font-semibold hover:underline flex items-center gap-1">Lihat semua <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                </div>
                <div class="p-5 space-y-4">
                    <?php if (!empty($recent_letters)): ?>
                        <?php foreach ($recent_letters as $letter): ?>
                            <?php
                                $name = htmlspecialchars($letter->head_name ?? 'Warga');
                                $initials = strtoupper(substr($name, 0, 2));
                                $type = htmlspecialchars($letter->type ?? '-');
                                $created = $letter->created_at ?? '';
                            ?>
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-surface-container-low rounded-xl border border-outline-variant/30 gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold"><?= $initials ?></div>
                                    <div>
                                        <p class="font-bold"><?= $name ?></p>
                                        <p class="text-xs text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">description</span> <?= $type ?> &bull; <?= $created ? date('d M Y', strtotime($created)) : '-' ?></p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <a href="<?= base_url('rt/surat') ?>" class="px-4 py-2 rounded-xl bg-surface-container-highest text-on-surface-variant font-semibold text-sm hover:bg-outline-variant/30 transition">Detail</a>
                                    <button class="px-4 py-2 rounded-xl bg-primary text-white font-semibold text-sm hover:bg-primary-dark transition btn-action flex items-center gap-1 approve-letter-btn" data-id="<?= $letter->id ?>"><span class="material-symbols-outlined text-sm">draw</span> TTD</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-8 text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-on-surface-variant/30">inbox</span>
                            <p class="text-sm mt-2">Tidak ada surat yang menunggu persetujuan</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                <div class="flex flex-wrap justify-between items-center p-5 border-b border-outline-variant/20">
                    <h3 class="text-xl font-headline font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">campaign</span>
                        Laporan Terbaru
                    </h3>
                    <a href="<?= base_url('rt/laporan') ?>" class="text-primary text-sm font-semibold hover:underline flex items-center gap-1">Lihat semua <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
                </div>
                <div class="p-5 space-y-4">
                    <?php if (!empty($recent_reports)): ?>
                        <?php foreach (array_slice($recent_reports, 0, 5) as $report): ?>
                            <?php
                                $name = htmlspecialchars($report->head_name ?? 'Warga');
                                $initials = strtoupper(substr($name, 0, 2));
                                $status = strtolower($report->status ?? 'pending');
                                $is_private = ($report->report_type ?? 'public') === 'private';
                            ?>
                            <div class="flex items-center justify-between p-4 bg-surface-container-low rounded-xl border border-outline-variant/30">
                                <div class="flex items-center gap-4">
                                    <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold"><?= $initials ?></div>
                                    <div>
                                        <div class="flex items-center gap-1.5">
                                            <p class="font-bold"><?= $name ?></p>
                                            <?php if ($is_private): ?>
                                                <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-amber-100 text-amber-700 font-bold">Pribadi</span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="text-xs text-on-surface-variant"><?= htmlspecialchars($report->title ?? '') ?></p>
                                    </div>
                                </div>
                                <?php if ($status === 'pending'): ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-700 animate-pulse"></span> Pending
                                    </span>
                                <?php elseif ($status === 'diproses'): ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-700 animate-pulse"></span> Diproses
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-green-50 text-green-700 text-[10px] font-bold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-700"></span> Selesai
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-8 text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-on-surface-variant/30">inbox</span>
                            <p class="text-sm mt-2">Belum ada laporan</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-surface-container-low rounded-2xl p-6 shadow-card border border-outline-variant/20">
                <h3 class="text-lg font-headline font-bold flex items-center gap-2 mb-5">
                    <span class="material-symbols-outlined text-primary">bolt</span> Aksi Cepat
                </h3>
                <div class="space-y-3">
                    <button class="w-full flex items-center gap-4 p-3 bg-white rounded-xl border border-outline-variant/20 hover:shadow-md transition btn-action">
                        <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                            <span class="material-symbols-outlined">draw</span>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-sm">Tanda Tangan Digital</p>
                            <p class="text-[11px] text-on-surface-variant">Selesaikan draft surat</p>
                        </div>
                    </button>
                    <button class="w-full flex items-center gap-4 p-3 bg-white rounded-xl border border-outline-variant/20 hover:shadow-md transition btn-action">
                        <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                            <span class="material-symbols-outlined">send</span>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-sm">Broadcast Info</p>
                            <p class="text-[11px] text-on-surface-variant">Kirim pesan massal ke grup</p>
                        </div>
                    </button>
                    <button class="w-full flex items-center gap-4 p-3 bg-white rounded-xl border border-outline-variant/20 hover:shadow-md transition btn-action">
                        <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                            <span class="material-symbols-outlined">calendar_add_on</span>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-sm">Jadwal Rapat</p>
                            <p class="text-[11px] text-on-surface-variant">Buat agenda warga online</p>
                        </div>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-headline font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">event_available</span> Jadwal Mendatang
                    </h3>
                </div>
                <div class="space-y-4">
                    <div class="flex gap-4 items-center">
                        <div class="flex flex-col items-center justify-center min-w-[52px] h-14 bg-tertiary/10 text-tertiary rounded-xl font-bold">
                            <span class="text-[11px] uppercase">Apr</span>
                            <span class="text-xl">28</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Rapat Koordinasi RT/RW</p>
                            <p class="text-xs text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">schedule</span> 19.30 WIB</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-center">
                        <div class="flex flex-col items-center justify-center min-w-[52px] h-14 bg-primary/10 text-primary-dark rounded-xl font-bold">
                            <span class="text-[11px] uppercase">Mei</span>
                            <span class="text-xl">03</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Kerja Bakti & Penanaman Pohon</p>
                            <p class="text-xs text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">park</span> 07.00 - 10.00</p>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-5 pt-3 border-t border-outline-variant/20 text-primary font-semibold text-sm flex items-center justify-center gap-1 py-2 hover:bg-primary/5 rounded-xl transition">Lihat semua <span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
        </div>
    </div>
</div>

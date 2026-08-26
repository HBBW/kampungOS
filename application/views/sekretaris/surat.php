<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-7xl mx-auto w-full">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6 sm:mb-8">
            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Total Antrean</p>
                        <h3 class="text-3xl font-bold mt-1"><?= $total_requests ?></h3>
                    </div>
                    <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                        <span class="material-symbols-outlined text-xl">pending_actions</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-tertiary text-xs font-semibold uppercase tracking-wide">Menunggu</p>
                        <h3 class="text-3xl font-bold mt-1"><?= $pending ?></h3>
                    </div>
                    <div class="p-2.5 rounded-xl bg-tertiary/10 text-tertiary">
                        <span class="material-symbols-outlined text-xl">hourglass_empty</span>
                    </div>
                </div>
                <div class="mt-3 h-1.5 w-full bg-surface-container-low rounded-full overflow-hidden">
                    <div class="h-full bg-tertiary rounded-full" style="width: <?= $total_requests > 0 ? round(($pending / $total_requests) * 100) : 0 ?>%"></div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-primary text-xs font-semibold uppercase tracking-wide">Disetujui</p>
                        <h3 class="text-3xl font-bold mt-1"><?= $total_requests - $pending ?></h3>
                    </div>
                    <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                        <span class="material-symbols-outlined text-xl">check_circle</span>
                    </div>
                </div>
                <p class="text-[11px] text-on-surface-variant mt-3">Bulan ini</p>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-error text-xs font-semibold uppercase tracking-wide">Ditolak</p>
                        <h3 class="text-3xl font-bold mt-1"><?= count(array_filter($letters ?? [], fn($l) => ($l->status ?? '') === 'rejected')) ?></h3>
                    </div>
                    <div class="p-2.5 rounded-xl bg-error/10 text-error">
                        <span class="material-symbols-outlined text-xl">cancel</span>
                    </div>
                </div>
                <p class="text-[11px] text-on-surface-variant mt-3">Perlu tinjauan ulang</p>
            </div>
        </div>

        <!-- Tabs Mobile -->
        <div class="flex md:hidden gap-2 mb-5 overflow-x-auto pb-2">
            <button class="tab-btn active px-4 py-2 bg-primary text-white rounded-full text-sm font-semibold whitespace-nowrap">Permintaan Aktif</button>
            <button class="tab-btn px-4 py-2 bg-surface-container-low text-on-surface-variant rounded-full text-sm font-semibold whitespace-nowrap">Arsip Selesai</button>
        </div>

        <!-- Main Table Card -->
        <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden mb-6">
            <!-- Header -->
            <div class="p-4 sm:p-6 border-b border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h3 class="text-lg sm:text-xl font-headline font-bold text-on-surface">Daftar Permintaan Surat</h3>
                    <p class="text-xs sm:text-sm text-on-surface-variant mt-0.5">Kelola verifikasi dan penerbitan dokumen warga</p>
                </div>
                <div class="flex gap-2">
                    <button class="flex items-center gap-1.5 px-3 py-2 border border-outline-variant/40 rounded-xl text-xs font-semibold text-on-surface-variant hover:bg-surface-container-low transition btn-action">
                        <span class="material-symbols-outlined text-sm">filter_list</span>
                        <span class="hidden sm:inline">Filter</span>
                    </button>
                    <button class="flex items-center gap-1.5 px-3 py-2 border border-outline-variant/40 rounded-xl text-xs font-semibold text-on-surface-variant hover:bg-surface-container-low transition btn-action">
                        <span class="material-symbols-outlined text-sm">download</span>
                        <span class="hidden sm:inline">Ekspor</span>
                    </button>
                </div>
            </div>

            <!-- Table - Responsive -->
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-surface-container-low/50">
                        <tr class="text-on-surface-variant text-[10px] sm:text-[11px] uppercase tracking-wider font-semibold">
                            <th class="px-4 sm:px-6 py-3 sm:py-4">Warga &amp; Keperluan</th>
                            <th class="px-4 sm:px-6 py-3 sm:py-4 text-center hidden sm:table-cell">Tipe Surat</th>
                            <th class="px-4 sm:px-6 py-3 sm:py-4 hidden md:table-cell">Tanggal Masuk</th>
                            <th class="px-4 sm:px-6 py-3 sm:py-4">Status</th>
                            <th class="px-4 sm:px-6 py-3 sm:py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/20">
                        <?php if (!empty($letters)) : ?>
                            <?php foreach ($letters as $letter) : ?>
                                <?php
                                $initials = strtoupper(substr(htmlspecialchars($letter->head_name ?? 'U'), 0, 2));
                                $status = $letter->status ?? 'pending';
                                $statusStyles = match($status) {
                                    'pending' => 'bg-tertiary/10 text-tertiary',
                                    'approved' => 'bg-primary/10 text-primary',
                                    'diproses' => 'bg-blue-50 text-blue-700',
                                    'selesai' => 'bg-primary/10 text-primary',
                                    'rejected' => 'bg-error/10 text-error',
                                    'ditolak' => 'bg-error/10 text-error',
                                    default => 'bg-tertiary/10 text-tertiary'
                                };
                                ?>
                                <tr class="table-row-hover transition">
                                    <td class="px-4 sm:px-6 py-3 sm:py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0"><?= $initials ?></div>
                                            <div>
                                                <p class="font-bold text-on-surface text-sm sm:text-base"><?= htmlspecialchars($letter->head_name ?? '-') ?></p>
                                                <p class="text-[10px] sm:text-xs text-on-surface-variant">NIK: <?= htmlspecialchars(substr($letter->nik ?? '-', 0, 12)) ?>***</p>
                                                <span class="sm:hidden text-[10px] text-on-surface-variant mt-1 block"><?= htmlspecialchars($letter->type ?? '-') ?> · <?= date('d M Y', strtotime($letter->created_at ?? 'now')) ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-center hidden sm:table-cell">
                                        <span class="inline-block px-3 py-1 bg-surface-container-low rounded-full text-[10px] sm:text-[11px] font-semibold text-on-surface-variant border border-outline-variant/30"><?= htmlspecialchars($letter->type ?? '-') ?></span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-on-surface-variant text-xs sm:text-sm hidden md:table-cell"><?= date('d M Y, H:i', strtotime($letter->created_at ?? 'now')) ?></td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full <?= $statusStyles ?> font-bold text-[10px] sm:text-[11px]">
                                            <span class="w-1.5 h-1.5 rounded-full <?= $status === 'pending' ? 'animate-pulse' : '' ?> <?= $status === 'pending' ? 'bg-tertiary' : ($status === 'ditolak' || $status === 'rejected' ? 'bg-error' : ($status === 'diproses' ? 'bg-blue-700' : 'bg-primary')) ?>"></span>
                                            <?= htmlspecialchars(ucfirst($status)) ?>
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-3 sm:py-4 text-right">
                                        <div class="flex justify-end gap-1 sm:gap-2">
                                            <button class="p-1.5 sm:p-2 text-primary hover:bg-primary/10 rounded-lg transition btn-action" title="Tinjau">
                                                <span class="material-symbols-outlined text-sm sm:text-base">visibility</span>
                                            </button>
                                            <?php if ($status === 'pending') : ?>
                                                <button class="approve-letter-btn p-1.5 sm:p-2 text-primary hover:bg-primary/10 rounded-lg transition btn-action" title="Verifikasi" data-id="<?= $letter->id ?>">
                                                    <span class="material-symbols-outlined text-sm sm:text-base">verified</span>
                                                </button>
                                                <button class="reject-letter-btn p-1.5 sm:p-2 text-error hover:bg-error/10 rounded-lg transition btn-action" title="Tolak" data-id="<?= $letter->id ?>">
                                                    <span class="material-symbols-outlined text-sm sm:text-base">cancel</span>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="px-4 sm:px-6 py-8 text-center text-sm text-on-surface-variant">Belum ada permintaan surat</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="p-4 sm:p-5 border-t border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs sm:text-sm">
                <p class="text-on-surface-variant text-center sm:text-left">Menampilkan <?= count($letters ?? []) ?> dari <?= $total_requests ?> permintaan</p>
                <div class="flex justify-center gap-1 sm:gap-2">
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition btn-action">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white font-bold">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition btn-action">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Bottom Cards Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Guide Card -->
            <div class="bg-gradient-to-br from-primary/5 to-primary/2 rounded-2xl p-5 sm:p-6 border border-primary/10">
                <div class="flex gap-4 sm:gap-5">
                    <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                        <span class="material-symbols-outlined text-white">auto_stories</span>
                    </div>
                    <div>
                        <h4 class="font-headline font-bold text-on-surface text-base sm:text-lg">Panduan Verifikasi</h4>
                        <p class="text-on-surface-variant text-xs sm:text-sm mt-2 leading-relaxed">
                            Pastikan data NIK dan alamat sesuai dengan database kependudukan. Untuk SK Domisili, pastikan warga telah tinggal minimal 6 bulan.
                        </p>
                        <button class="mt-3 text-primary text-xs sm:text-sm font-semibold flex items-center gap-1 hover:gap-2 transition-all">
                            Baca Selengkapnya <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Activity Card -->
            <div class="bg-surface-container-low rounded-2xl p-5 sm:p-6 border border-outline-variant/20">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="font-headline font-bold text-on-surface">Aktivitas Terbaru</h4>
                    <span class="text-[9px] sm:text-[10px] text-on-surface-variant uppercase tracking-wider">Sistem Log</span>
                </div>
                <div class="space-y-3 sm:space-y-4">
                    <?php if (!empty($letters)) : ?>
                        <?php foreach (array_slice($letters, 0, 3) as $i => $log) : ?>
                            <?php
                            $log_status = $log->status ?? 'pending';
                            $dot_color = match($log_status) {
                                'pending' => 'bg-tertiary',
                                'ditolak' => 'bg-error',
                                default => 'bg-primary'
                            };
                            ?>
                            <div class="flex gap-3 text-xs sm:text-sm items-start">
                                <div class="w-2 h-2 rounded-full <?= $dot_color ?> mt-1.5 flex-shrink-0"></div>
                                <p class="text-on-surface-variant flex-1"><span class="font-bold text-on-surface"><?= htmlspecialchars($log->head_name ?? '-') ?></span> mengajukan surat <?= htmlspecialchars($log->type ?? '-') ?></p>
                                <span class="text-on-surface-variant/60 text-[10px] sm:text-xs whitespace-nowrap"><?= date('d M', strtotime($log->created_at ?? 'now')) ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-xs text-on-surface-variant text-center py-3">Belum ada aktivitas terbaru</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

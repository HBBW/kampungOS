<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="w-full">
        <!-- Header Section -->
        <div class="mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Manajemen Laporan & Pengaduan</h2>
            <p class="text-on-surface-variant text-sm sm:text-base mt-1">Kelola dan pantau keluhan warga secara real-time</p>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="flex justify-between items-start mb-3">
                    <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                        <span class="material-symbols-outlined text-2xl">analytics</span>
                    </div>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Total Laporan</p>
                <div class="flex items-baseline gap-2 mt-1">
                    <h3 class="text-3xl font-bold"><?= $total_reports ?></h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="p-2.5 rounded-xl bg-tertiary/10 text-tertiary mb-3 w-fit">
                    <span class="material-symbols-outlined text-2xl">hourglass_empty</span>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Menunggu</p>
                <h3 class="text-3xl font-bold mt-1"><?= $pending ?></h3>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="p-2.5 rounded-xl bg-blue-50 text-blue-600 mb-3 w-fit">
                    <span class="material-symbols-outlined text-2xl">sync</span>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Diproses</p>
                <h3 class="text-3xl font-bold mt-1"><?= $processed ?></h3>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="p-2.5 rounded-xl bg-green-50 text-green-600 mb-3 w-fit">
                    <span class="material-symbols-outlined text-2xl">verified</span>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Selesai</p>
                <h3 class="text-3xl font-bold mt-1"><?= $completed ?></h3>
            </div>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <!-- LEFT COLUMN: Reports Table (8 cols) -->
            <div class="lg:col-span-8 space-y-6">
                <!-- Table Card -->
                <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                    <div class="p-5 border-b border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-headline font-bold text-on-surface">Laporan Terbaru</h3>
                            <p class="text-sm text-on-surface-variant mt-0.5">Daftar keluhan warga yang masuk</p>
                        </div>
                        <div class="flex gap-2">
                            <select id="filterType" class="px-3 py-1.5 bg-surface-container-low border border-outline-variant/30 rounded-xl text-xs font-semibold text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/30">
                                <option value="all">Semua Jenis</option>
                                <option value="public">Umum</option>
                                <option value="private">Pribadi</option>
                            </select>
                            <select id="filterStatus" class="px-3 py-1.5 bg-surface-container-low border border-outline-variant/30 rounded-xl text-xs font-semibold text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/30">
                                <option value="all">Semua Status</option>
                                <option value="pending">Pending</option>
                                <option value="diproses">Diproses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>

                    <!-- Responsive Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-surface-container-low/50">
                                <tr class="text-on-surface-variant text-[10px] uppercase tracking-wider font-semibold">
                                    <th class="px-4 sm:px-6 py-3 sm:py-4">Warga</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 hidden sm:table-cell">Kategori</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 hidden md:table-cell">Tanggal</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4">Status</th>
                                    <th class="px-4 sm:px-6 py-3 sm:py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/20">
                                <?php if (!empty($reports)) : ?>
                                    <?php foreach ($reports as $report) : ?>
                                        <?php
                                        $initials = strtoupper(substr(htmlspecialchars($report->head_name ?? 'U'), 0, 2));
                                        $status = $report->status ?? 'pending';
                                        $statusStyles = match($status) {
                                            'pending' => 'bg-amber-50 text-amber-700',
                                            'diproses' => 'bg-blue-50 text-blue-700',
                                            'selesai' => 'bg-green-50 text-green-700',
                                            default => 'bg-amber-50 text-amber-700'
                                        };
                                        $catStyles = match(strtolower($report->category ?? '')) {
                                            'kebersihan' => 'bg-primary/10 text-primary',
                                            'lampu jalan' => 'bg-tertiary/10 text-tertiary',
                                            'keamanan' => 'bg-error/10 text-error',
                                            default => 'bg-primary/10 text-primary'
                                        };
                                        ?>
                                        <tr class="table-row-hover transition cursor-pointer report-row" data-id="<?= $report->id ?>" data-type="<?= $report->report_type ?? 'public' ?>" data-status="<?= $status ?>">
                                            <td class="px-4 sm:px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0"><?= $initials ?></div>
                                                    <div>
                                                        <div class="flex items-center gap-1.5">
                                                            <p class="font-bold text-sm text-on-surface"><?= htmlspecialchars($report->head_name ?? '-') ?></p>
                                                            <?php if (($report->report_type ?? 'public') === 'private'): ?>
                                                                <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-amber-100 text-amber-700 font-bold">Pribadi</span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <p class="text-[10px] text-on-surface-variant"><?= htmlspecialchars($report->address ?? '-') ?></p>
                                                    </div>
                                                </div>
                                                <div class="sm:hidden mt-2">
                                                    <span class="inline-block px-2 py-0.5 <?= $catStyles ?> text-[10px] font-semibold rounded-lg"><?= htmlspecialchars($report->category ?? '-') ?></span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                                <span class="inline-block px-2.5 py-1 <?= $catStyles ?> text-[11px] font-semibold rounded-lg"><?= htmlspecialchars($report->category ?? '-') ?></span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 text-on-surface-variant text-sm hidden md:table-cell"><?= date('d M Y', strtotime($report->created_at ?? 'now')) ?></td>
                                            <td class="px-4 sm:px-6 py-4">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full <?= $statusStyles ?> text-[10px] font-bold uppercase">
                                                    <span class="w-1.5 h-1.5 rounded-full <?= $status === 'selesai' ? '' : 'animate-pulse' ?> <?= $status === 'pending' ? 'bg-amber-700' : ($status === 'diproses' ? 'bg-blue-700' : 'bg-green-700') ?>"></span>
                                                    <?= htmlspecialchars(ucfirst($status)) ?>
                                                </span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 text-right opacity-0 group-hover:opacity-100 transition">
                                                <div class="flex justify-end gap-2">
                                                    <button class="view-btn p-1.5 text-primary hover:bg-primary/10 rounded-lg transition" data-id="<?= $report->id ?>">
                                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                                    </button>
                                                    <button class="p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                                        <span class="material-symbols-outlined text-sm">edit_note</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="px-4 sm:px-6 py-8 text-center text-sm text-on-surface-variant">Belum ada laporan masuk</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4 border-t border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <p class="text-xs text-on-surface-variant text-center sm:text-left">Menampilkan <?= count($reports ?? []) ?> dari <?= $total_reports ?> laporan</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Side Panel (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-5 text-white relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-10 transition-transform group-hover:scale-110 group-hover:-rotate-12 duration-700">
                        <span class="material-symbols-outlined text-8xl">emergency_home</span>
                    </div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="p-2 bg-white/20 rounded-xl">
                                <span class="material-symbols-outlined">call</span>
                            </div>
                            <h3 class="font-headline font-bold text-lg">Kontak Darurat</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center pb-3 border-b border-white/20">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wide text-white/70">Satpam Komplek</p>
                                    <p class="font-bold text-base mt-0.5">0812-3456-7890</p>
                                </div>
                                <button class="p-1.5 bg-white/20 rounded-full hover:bg-white/30 transition">
                                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                                </button>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wide text-white/70">Petugas Kebersihan</p>
                                    <p class="font-bold text-base mt-0.5">0822-9988-7766</p>
                                </div>
                                <button class="p-1.5 bg-white/20 rounded-full hover:bg-white/30 transition">
                                    <span class="material-symbols-outlined text-sm">chevron_right</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report Detail Modal (Sekretaris) -->
<div id="reportModal" class="fixed inset-0 z-[10000] hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm modal-overlay" id="reportModalOverlay"></div>
    <div class="absolute inset-0 flex items-end sm:items-center justify-center p-0 sm:p-4">
        <div class="bg-white rounded-t-3xl sm:rounded-2xl w-full sm:max-w-lg max-h-[90vh] overflow-hidden shadow-2xl modal-panel" id="reportModalPanel">
            <div class="sticky top-0 bg-white z-10 px-5 pt-5 pb-4 border-b border-outline-variant/20">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <div id="modalAvatar" class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0"></div>
                        <div class="min-w-0">
                            <h3 id="modalTitle" class="font-headline font-bold text-on-surface text-lg leading-tight truncate"></h3>
                            <p id="modalReporter" class="text-xs text-on-surface-variant mt-0.5"></p>
                        </div>
                    </div>
                    <button id="closeReportModal" class="p-2 -m-2 rounded-full hover:bg-surface-container-low transition flex-shrink-0">
                        <span class="material-symbols-outlined text-on-surface-variant">close</span>
                    </button>
                </div>
            </div>

            <div class="overflow-y-auto max-h-[calc(90vh-80px)] custom-scrollbar px-5 py-4 space-y-4">
                <div class="flex flex-wrap gap-2">
                    <span id="modalStatus" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase"></span>
                    <span id="modalCategory" class="inline-block px-2.5 py-1 bg-tertiary/10 text-tertiary text-[10px] font-semibold rounded-lg"></span>
                    <span id="modalType" class="inline-block px-2.5 py-1 bg-surface-container-highest text-on-surface-variant text-[10px] font-semibold rounded-lg"></span>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-surface-container-low rounded-xl p-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="material-symbols-outlined text-on-surface-variant text-sm">calendar_today</span>
                            <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wide">Tanggal</span>
                        </div>
                        <p id="modalDate" class="text-sm font-semibold text-on-surface"></p>
                    </div>
                    <div class="bg-surface-container-low rounded-xl p-3">
                        <div class="flex items-center gap-1.5 mb-1">
                            <span class="material-symbols-outlined text-on-surface-variant text-sm">location_on</span>
                            <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wide">Lokasi</span>
                        </div>
                        <p id="modalAddress" class="text-sm font-semibold text-on-surface truncate"></p>
                    </div>
                </div>

                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wide mb-2">Deskripsi Masalah</p>
                    <p id="modalDescription" class="text-sm text-on-surface leading-relaxed"></p>
                </div>

                <div id="modalImagesSection" class="hidden">
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wide mb-2">Foto Bukti</p>
                    <div id="modalImages" class="grid grid-cols-2 gap-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="w-full">
        <div class="mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Manajemen Laporan & Pengaduan</h2>
            <p class="text-on-surface-variant text-sm sm:text-base mt-1">Kelola dan pantau keluhan warga secara real-time</p>
        </div>

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
                    <span class="text-xs text-on-surface-variant">Bulan ini</span>
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

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
            <div class="lg:col-span-8 space-y-6">
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
                                <?php if (!empty($reports)): ?>
                                    <?php foreach ($reports as $report): ?>
                                        <?php
                                            $warga_name = htmlspecialchars($report->head_name ?? 'Warga');
                                            $initials = strtoupper(substr($warga_name, 0, 2));
                                            $kategori = htmlspecialchars($report->category ?? '-');
                                            $status = $report->status ?? 'pending';
                                            $created = $report->created_at ?? '';
                                            $status_lower = strtolower($status);
                                        ?>
                                        <tr class="table-row-hover transition cursor-pointer report-row" data-id="<?= $report->id ?>" data-type="<?= $report->report_type ?? 'public' ?>" data-status="<?= $status_lower ?>">
                                            <td class="px-4 sm:px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0"><?= $initials ?></div>
                                                    <div>
                                                        <div class="flex items-center gap-1.5">
                                                            <p class="font-bold text-sm text-on-surface"><?= $warga_name ?></p>
                                                            <?php if (($report->report_type ?? 'public') === 'private'): ?>
                                                                <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-amber-100 text-amber-700 font-bold">Pribadi</span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <p class="text-[10px] text-on-surface-variant"><?= htmlspecialchars($report->address ?? '') ?></p>
                                                    </div>
                                                </div>
                                                <div class="sm:hidden mt-2">
                                                    <span class="inline-block px-2 py-0.5 bg-tertiary/10 text-tertiary text-[10px] font-semibold rounded-lg"><?= $kategori ?></span>
                                                </div>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                                <span class="inline-block px-2.5 py-1 bg-tertiary/10 text-tertiary text-[11px] font-semibold rounded-lg"><?= $kategori ?></span>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 text-on-surface-variant text-sm hidden md:table-cell"><?= $created ? date('d M Y', strtotime($created)) : '-' ?></td>
                                            <td class="px-4 sm:px-6 py-4">
                                                <?php if ($status_lower === 'pending'): ?>
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-bold uppercase">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-700 animate-pulse"></span>
                                                        Pending
                                                    </span>
                                                <?php elseif ($status_lower === 'diproses'): ?>
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold uppercase">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-700 animate-pulse"></span>
                                                        Diproses
                                                    </span>
                                                <?php elseif ($status_lower === 'selesai'): ?>
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-green-50 text-green-700 text-[10px] font-bold uppercase">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-green-700"></span>
                                                        Selesai
                                                    </span>
                                                <?php else: ?>
                                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-gray-100 text-gray-700 text-[10px] font-bold uppercase">
                                                        <?= htmlspecialchars($status) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 text-right">
                                                <div class="flex justify-end gap-2">
                                                    <?php if ($status_lower === 'pending'): ?>
                                                        <button class="update-status-btn p-1.5 text-primary hover:bg-primary/10 rounded-lg transition" data-id="<?= $report->id ?>" data-status="diproses" title="Proses">
                                                            <span class="material-symbols-outlined text-sm">play_arrow</span>
                                                        </button>
                                                    <?php elseif ($status_lower === 'diproses'): ?>
                                                        <button class="update-status-btn p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition" data-id="<?= $report->id ?>" data-status="selesai" title="Selesai">
                                                            <span class="material-symbols-outlined text-sm">check_circle</span>
                                                        </button>
                                                    <?php endif; ?>
                                                    <button class="delete-report-btn p-1.5 text-error hover:bg-error/10 rounded-lg transition" data-id="<?= $report->id ?>" title="Hapus">
                                                        <span class="material-symbols-outlined text-sm">delete</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center">
                                            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30">inbox</span>
                                            <p class="text-on-surface-variant text-sm mt-2">Belum ada laporan</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-4 border-t border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <p class="text-xs text-on-surface-variant text-center sm:text-left">Menampilkan <?= count($reports) ?> dari <?= $total_reports ?> laporan</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-6">
                <button class="hidden lg:flex w-full bg-primary text-white font-bold py-4 rounded-xl shadow-md hover:bg-primary-dark transition-all btn-action items-center justify-center gap-3">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Buat Laporan Baru</span>
                </button>

                <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-headline font-bold text-on-surface text-lg">Galeri Foto</h3>
                        <span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-1 rounded-full">Hari Ini</span>
                    </div>

                    <div class="space-y-5 max-h-[400px] overflow-y-auto custom-scrollbar pr-1">
                        <div class="group cursor-pointer">
                            <div class="relative aspect-video w-full overflow-hidden rounded-xl mb-3 bg-surface-container">
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=400&h=250&fit=crop" alt="Lampu jalan rusak">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <span class="absolute bottom-2 left-2 bg-black/50 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Blok B / No 12</span>
                            </div>
                            <h4 class="font-bold text-sm text-on-surface group-hover:text-primary transition">Lampu jalan mati di Blok B</h4>
                            <p class="text-xs text-on-surface-variant mt-1 line-clamp-2">Sudah 3 hari lampu padam di depan rumah, mohon segera ditindaklanjuti.</p>
                        </div>

                        <div class="group cursor-pointer">
                            <div class="relative aspect-video w-full overflow-hidden rounded-xl mb-3 bg-surface-container">
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1605600659870-dcd0b1849aea?w=400&h=250&fit=crop" alt="Sampah menumpuk">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <span class="absolute bottom-2 left-2 bg-black/50 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Taman Warga</span>
                            </div>
                            <h4 class="font-bold text-sm text-on-surface group-hover:text-primary transition">Penumpukan sampah di taman</h4>
                            <p class="text-xs text-on-surface-variant mt-1 line-clamp-2">Sampah belum diangkut sejak kemarin, bau mulai menyengat.</p>
                        </div>
                    </div>

                    <button class="w-full mt-5 py-3 border-2 border-primary text-primary rounded-xl text-xs font-bold uppercase tracking-wide hover:bg-primary hover:text-white transition-all btn-action">
                        Lihat Galeri Lengkap
                    </button>
                </div>

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

<!-- Report Detail Modal -->
<div id="reportModal" class="fixed inset-0 z-[10000] hidden">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm modal-overlay" id="reportModalOverlay"></div>
    <div class="absolute inset-0 flex items-end sm:items-center justify-center p-0 sm:p-4">
        <div class="bg-white rounded-t-3xl sm:rounded-2xl w-full sm:max-w-lg max-h-[90vh] overflow-hidden shadow-2xl modal-panel" id="reportModalPanel">
            <!-- Modal Header -->
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

            <!-- Modal Body -->
            <div class="overflow-y-auto max-h-[calc(90vh-140px)] custom-scrollbar px-5 py-4 space-y-4">
                <!-- Status & Category Row -->
                <div class="flex flex-wrap gap-2">
                    <span id="modalStatus" class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase"></span>
                    <span id="modalCategory" class="inline-block px-2.5 py-1 bg-tertiary/10 text-tertiary text-[10px] font-semibold rounded-lg"></span>
                    <span id="modalType" class="inline-block px-2.5 py-1 bg-surface-container-highest text-on-surface-variant text-[10px] font-semibold rounded-lg"></span>
                </div>

                <!-- Info Cards -->
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

                <!-- Description -->
                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wide mb-2">Deskripsi Masalah</p>
                    <p id="modalDescription" class="text-sm text-on-surface leading-relaxed"></p>
                </div>

                <!-- Photo Gallery -->
                <div id="modalImagesSection" class="hidden">
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wide mb-2">Foto Bukti</p>
                    <div id="modalImages" class="grid grid-cols-2 gap-2"></div>
                </div>
            </div>

            <!-- Modal Footer (RT Actions) -->
            <div id="modalActions" class="sticky bottom-0 bg-white border-t border-outline-variant/20 px-5 py-4">
                <div class="flex gap-2">
                    <button id="modalActionBtn" class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl font-bold text-sm text-white transition btn-action">
                        <span class="material-symbols-outlined text-lg">play_arrow</span>
                        <span id="modalActionText">Proses</span>
                    </button>
                    <button id="modalDeleteBtn" class="px-4 py-2.5 rounded-xl border-2 border-error/30 text-error font-bold text-sm hover:bg-error/5 transition btn-action flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg">delete</span>
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

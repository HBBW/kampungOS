
    <!-- Content Area -->
    <div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
        <div class="max-w-7xl mx-auto w-full">
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
                        <?php $pending_pct = $total_requests > 0 ? round(($pending / $total_requests) * 100) : 0; ?>
                        <div class="h-full bg-tertiary rounded-full" style="width: <?= $pending_pct ?>%"></div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-primary text-xs font-semibold uppercase tracking-wide">Disetujui</p>
                            <h3 class="text-3xl font-bold mt-1"><?= $approved ?></h3>
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
                            <h3 class="text-3xl font-bold mt-1"><?= $rejected ?></h3>
                        </div>
                        <div class="p-2.5 rounded-xl bg-error/10 text-error">
                            <span class="material-symbols-outlined text-xl">cancel</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-on-surface-variant mt-3">Perlu tinjauan ulang</p>
                </div>
            </div>

            <div class="flex md:hidden gap-2 mb-5 overflow-x-auto pb-2">
                <button class="tab-btn active px-4 py-2 bg-primary text-white rounded-full text-sm font-semibold whitespace-nowrap">Permintaan Aktif</button>
                <button class="tab-btn px-4 py-2 bg-surface-container-low text-on-surface-variant rounded-full text-sm font-semibold whitespace-nowrap">Arsip Selesai</button>
                <button class="tab-btn px-4 py-2 bg-surface-container-low text-on-surface-variant rounded-full text-sm font-semibold whitespace-nowrap">Template Surat</button>
            </div>

            <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden mb-6">
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
                            <?php if (!empty($letters)): ?>
                                <?php foreach ($letters as $letter): ?>
                                    <?php
                                        $warga_name = htmlspecialchars($letter->head_name ?? 'Warga');
                                        $initials = strtoupper(substr($warga_name, 0, 2));
                                        $letter_type = htmlspecialchars($letter->type ?? '-');
                                        $status = $letter->status ?? 'pending';
                                        $created = $letter->created_at ?? '';
                                        $status_lower = strtolower($status);
                                    ?>
                                    <tr class="table-row-hover transition">
                                        <td class="px-4 sm:px-6 py-3 sm:py-4">
                                            <div class="flex items-center gap-3">
                                                <?php if ($status_lower === 'pending'): ?>
                                                    <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0"><?= $initials ?></div>
                                                <?php elseif ($status_lower === 'approved'): ?>
                                                    <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0"><?= $initials ?></div>
                                                <?php elseif ($status_lower === 'rejected'): ?>
                                                    <div class="w-10 h-10 rounded-full bg-error/10 flex items-center justify-center text-error font-bold text-sm flex-shrink-0"><?= $initials ?></div>
                                                <?php else: ?>
                                                    <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-sm flex-shrink-0"><?= $initials ?></div>
                                                <?php endif; ?>
                                                <div>
                                                    <p class="font-bold text-on-surface text-sm sm:text-base"><?= $warga_name ?></p>
                                                    <p class="text-[10px] sm:text-xs text-on-surface-variant"><?= htmlspecialchars($letter->kk_number ?? '') ?></p>
                                                    <span class="sm:hidden text-[10px] text-on-surface-variant mt-1 block"><?= $letter_type ?> &bull; <?= $created ? date('d M Y', strtotime($created)) : '-' ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 text-center hidden sm:table-cell">
                                            <span class="inline-block px-3 py-1 bg-surface-container-low rounded-full text-[10px] sm:text-[11px] font-semibold text-on-surface-variant border border-outline-variant/30"><?= $letter_type ?></span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 text-on-surface-variant text-xs sm:text-sm hidden md:table-cell"><?= $created ? date('d M Y, H:i', strtotime($created)) : '-' ?></td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4">
                                            <?php if ($status_lower === 'pending'): ?>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-tertiary/10 text-tertiary font-bold text-[10px] sm:text-[11px]">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
                                                    Pending
                                                </span>
                                            <?php elseif ($status_lower === 'approved'): ?>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary/10 text-primary font-bold text-[10px] sm:text-[11px]">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                                    Disetujui
                                                </span>
                                            <?php elseif ($status_lower === 'rejected'): ?>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-error/10 text-error font-bold text-[10px] sm:text-[11px]">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                                                    Ditolak
                                                </span>
                                            <?php else: ?>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-gray-100 text-gray-700 font-bold text-[10px] sm:text-[11px]">
                                                    <?= htmlspecialchars($status) ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3 sm:py-4 text-right">
                                            <div class="flex justify-end gap-1 sm:gap-2">
                                                <?php if ($status_lower === 'pending'): ?>
                                                <button class="approve-letter-btn p-1.5 sm:p-2 text-primary hover:bg-primary/10 rounded-lg transition btn-action" data-id="<?= $letter->id ?>" title="Setujui">
                                                    <span class="material-symbols-outlined text-sm sm:text-base">check_circle</span>
                                                </button>
                                                <button class="reject-letter-btn p-1.5 sm:p-2 text-error hover:bg-error/10 rounded-lg transition btn-action" data-id="<?= $letter->id ?>" title="Tolak">
                                                    <span class="material-symbols-outlined text-sm sm:text-base">cancel</span>
                                                </button>
                                                <?php elseif ($status_lower === 'approved'): ?>
                                                    <?php $letter_data = $this->Letter_model->get_letter_by_request($letter->id); ?>
                                                    <?php if ($letter_data): ?>
                                                    <a href="<?= base_url('pdf/surat/' . $letter->id) ?>" target="_blank" class="inline-flex items-center gap-1 sm:gap-2 px-3 sm:px-4 py-1.5 bg-primary text-white rounded-lg text-[10px] sm:text-xs font-bold hover:bg-primary-dark transition btn-action shadow-sm">
                                                        <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                                                        <span class="hidden sm:inline">PDF</span>
                                                    </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <span class="material-symbols-outlined text-5xl text-on-surface-variant/30">inbox</span>
                                        <p class="text-on-surface-variant text-sm mt-2">Belum ada permintaan surat</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="p-4 sm:p-5 border-t border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs sm:text-sm">
                    <p class="text-on-surface-variant text-center sm:text-left">Menampilkan <?= count($letters) ?> dari <?= $total_requests ?> permintaan</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
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

                <div class="bg-surface-container-low rounded-2xl p-5 sm:p-6 border border-outline-variant/20">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-headline font-bold text-on-surface">Aktivitas Terbaru</h4>
                        <span class="text-[9px] sm:text-[10px] text-on-surface-variant uppercase tracking-wider">Sistem Log</span>
                    </div>
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex gap-3 text-xs sm:text-sm items-start">
                            <div class="w-2 h-2 rounded-full bg-primary mt-1.5 flex-shrink-0"></div>
                            <p class="text-on-surface-variant flex-1"><span class="font-bold text-on-surface">Anda</span> menyetujui permintaan SKU - Anisa Nurul</p>
                            <span class="text-on-surface-variant/60 text-[10px] sm:text-xs whitespace-nowrap">2j lalu</span>
                        </div>
                        <div class="flex gap-3 text-xs sm:text-sm items-start">
                            <div class="w-2 h-2 rounded-full bg-error mt-1.5 flex-shrink-0"></div>
                            <p class="text-on-surface-variant flex-1"><span class="font-bold text-on-surface">Sistem</span> menolak permintaan otomatis (NIK tidak valid)</p>
                            <span class="text-on-surface-variant/60 text-[10px] sm:text-xs whitespace-nowrap">5j lalu</span>
                        </div>
                        <div class="flex gap-3 text-xs sm:text-sm items-start">
                            <div class="w-2 h-2 rounded-full bg-tertiary mt-1.5 flex-shrink-0"></div>
                            <p class="text-on-surface-variant flex-1"><span class="font-bold text-on-surface">Admin 2</span> memperbarui template SK Domisili</p>
                            <span class="text-on-surface-variant/60 text-[10px] sm:text-xs whitespace-nowrap">Kemarin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

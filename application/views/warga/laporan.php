<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-full mx-auto w-full">

        <div class="mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface mb-2">Laporan Warga</h2>
            <p class="text-on-surface-variant text-sm sm:text-base max-w-2xl">Laporkan masalah di lingkungan sekitar Anda. Setiap laporan membantu kami membangun kampung yang lebih nyaman, aman, dan asri.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl p-5 sm:p-6 md:p-8 shadow-card border border-outline-variant/20">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-xl">edit_note</span>
                        </div>
                        <h3 class="text-xl font-headline font-semibold text-on-surface">Buat Laporan Baru</h3>
                    </div>

                    <form id="reportForm" class="space-y-5">
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface-variant block">Judul Laporan</label>
                            <input type="text" id="reportTitle" placeholder="Contoh: Lampu jalan mati di depan rumah" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-on-surface-variant block">Kategori Isu</label>
                                <div class="relative">
                                    <select id="category" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 appearance-none focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm">
                                        <option value="">Pilih Kategori</option>
                                        <option value="lampu">Lampu Jalan</option>
                                        <option value="sampah">Sampah</option>
                                        <option value="keamanan">Keamanan</option>
                                        <option value="infrastruktur">Infrastruktur</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant text-sm">expand_more</span>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-xs font-bold text-on-surface-variant block">Lokasi Kejadian</label>
                                <div class="relative">
                                    <input type="text" id="location" placeholder="Contoh: Depan Pos Kamling" class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm">
                                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">location_on</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface-variant block">Deskripsi Masalah</label>
                            <textarea id="reportDescription" rows="4" placeholder="Ceritakan detail masalah yang Anda temukan..." class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm resize-none"></textarea>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface-variant block">Jenis Laporan</label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="flex items-center gap-2 p-3 border border-primary/40 bg-primary/5 rounded-xl cursor-pointer">
                                    <input type="radio" name="report_type" value="public" checked class="accent-primary">
                                    <div>
                                        <p class="text-xs font-bold text-on-surface">Umum</p>
                                        <p class="text-[10px] text-on-surface-variant">Terlihat semua warga</p>
                                    </div>
                                </label>
                                <label class="flex items-center gap-2 p-3 border border-outline-variant/40 rounded-xl cursor-pointer hover:border-primary/40 transition">
                                    <input type="radio" name="report_type" value="private" class="accent-primary">
                                    <div>
                                        <p class="text-xs font-bold text-on-surface">Pribadi</p>
                                        <p class="text-[10px] text-on-surface-variant">Hanya RT yang tahu</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface-variant block">Foto Bukti (Opsional)</label>
                            <div class="file-drop-area border-2 border-dashed border-outline-variant/50 rounded-xl p-6 flex flex-col items-center justify-center bg-surface-container-low/50 hover:bg-primary/5 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-3xl text-on-surface-variant/60 mb-2">cloud_upload</span>
                                <p class="text-sm text-on-surface-variant"><span class="text-primary font-semibold">Klik untuk unggah</span> atau seret foto ke sini</p>
                                <p class="text-xs text-on-surface-variant/60 mt-1">PNG, JPG up to 5MB</p>
                                <input type="file" id="photoUpload" class="hidden" accept="image/*">
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-bold text-base hover:bg-primary-dark transition-all btn-action flex items-center justify-center gap-2 shadow-md">
                            <span class="material-symbols-outlined text-lg">send</span>
                            Kirim Laporan
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-5 space-y-6">
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-card border border-outline-variant/20">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-headline font-semibold text-on-surface">Laporan Saya</h3>
                        <span class="text-[10px] font-bold text-on-surface-variant bg-surface-container-low px-2 py-1 rounded-full"><?= count($my_reports) ?> laporan</span>
                    </div>

                    <div class="space-y-3">
                        <?php if (!empty($my_reports)): ?>
                            <?php foreach ($my_reports as $report): ?>
                                <div class="bg-surface-container-low rounded-xl p-4 transition-all card-hover cursor-pointer report-row" data-id="<?= $report->id ?>">
                                    <div class="flex gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                            <span class="material-symbols-outlined text-xl">campaign</span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex flex-wrap justify-between items-start gap-1 mb-1">
                                                <h4 class="font-bold text-sm text-on-surface"><?= htmlspecialchars($report->title) ?></h4>
                                                <div class="flex items-center gap-1">
                                                    <?php if (($report->report_type ?? 'public') === 'private'): ?>
                                                        <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-amber-100 text-amber-700 font-bold">Pribadi</span>
                                                    <?php else: ?>
                                                        <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-primary/10 text-primary font-bold">Umum</span>
                                                    <?php endif; ?>
                                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-surface-container-highest text-on-surface-variant font-semibold"><?= htmlspecialchars($report->category) ?></span>
                                                </div>
                                            </div>
                                            <p class="text-xs text-on-surface-variant line-clamp-1 mb-2"><?= htmlspecialchars($report->description) ?></p>
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-1.5">
                                                    <?php if ($report->status == 'pending'): ?>
                                                        <span class="w-2 h-2 rounded-full bg-stone-400"></span>
                                                        <span class="text-[10px] font-semibold text-on-surface-variant">Pending</span>
                                                    <?php elseif ($report->status == 'diproses'): ?>
                                                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                                        <span class="text-[10px] font-semibold text-on-surface-variant">Proses</span>
                                                    <?php else: ?>
                                                        <span class="w-2 h-2 rounded-full bg-primary"></span>
                                                        <span class="text-[10px] font-semibold text-primary">Selesai</span>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="text-[10px] text-on-surface-variant"><?= date('d M Y', strtotime($report->created_at)) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center py-8">
                                <span class="material-symbols-outlined text-4xl text-on-surface-variant/30 mb-2">inbox</span>
                                <p class="text-sm text-on-surface-variant">Belum ada laporan</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($public_reports)): ?>
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-card border border-outline-variant/20">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-headline font-semibold text-on-surface">Laporan Umum Warga</h3>
                        <span class="text-[10px] font-bold text-primary bg-primary/10 px-2 py-1 rounded-full">Publik</span>
                    </div>
                    <p class="text-xs text-on-surface-variant mb-4">Laporan dari warga lain yang bersifat umum dan dapat dilihat semua orang.</p>

                    <div class="space-y-3">
                        <?php foreach (array_slice($public_reports, 0, 10) as $report): ?>
                            <div class="bg-surface-container-low rounded-xl p-4 transition-all card-hover cursor-pointer report-row" data-id="<?= $report->id ?>">
                                <div class="flex gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                        <span class="material-symbols-outlined text-xl">campaign</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex flex-wrap justify-between items-start gap-1 mb-1">
                                            <h4 class="font-bold text-sm text-on-surface"><?= htmlspecialchars($report->title) ?></h4>
                                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-surface-container-highest text-on-surface-variant font-semibold"><?= htmlspecialchars($report->category) ?></span>
                                        </div>
                                        <p class="text-xs text-on-surface-variant line-clamp-1 mb-2"><?= htmlspecialchars($report->description) ?></p>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-1.5">
                                                <?php if ($report->status == 'pending'): ?>
                                                    <span class="w-2 h-2 rounded-full bg-stone-400"></span>
                                                    <span class="text-[10px] font-semibold text-on-surface-variant">Pending</span>
                                                <?php elseif ($report->status == 'diproses'): ?>
                                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                                    <span class="text-[10px] font-semibold text-on-surface-variant">Diproses</span>
                                                <?php else: ?>
                                                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                                                    <span class="text-[10px] font-semibold text-primary">Selesai</span>
                                                <?php endif; ?>
                                            </div>
                                            <span class="text-[10px] text-on-surface-variant"><?= htmlspecialchars($report->head_name ?? 'Warga') ?> · <?= date('d M', strtotime($report->created_at)) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div class="relative overflow-hidden bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-6 text-white shadow-large">
                    <div class="absolute -right-4 -bottom-4 opacity-10 transition-transform duration-500 group-hover:scale-110">
                        <span class="material-symbols-outlined text-7xl">emergency_home</span>
                    </div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="material-symbols-outlined text-2xl">warning</span>
                            <h4 class="text-xl font-headline font-bold">Darurat?</h4>
                        </div>
                        <p class="text-sm opacity-90 mb-5">Untuk kejadian mendesak seperti kebakaran atau pencurian, mohon hubungi nomor darurat RT langsung.</p>
                        <button id="emergencyCallBtn" class="inline-flex items-center gap-2 bg-white text-primary px-5 py-2.5 rounded-xl font-bold text-sm shadow-lg hover:bg-stone-100 transition-all btn-action">
                            <span class="material-symbols-outlined text-sm">call</span>
                            Hubungi Pengurus RT
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report Detail Modal (Warga - Read Only) -->
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

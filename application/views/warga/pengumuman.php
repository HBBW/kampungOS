<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-7xl mx-auto w-full">

        <div class="mb-8">
            <div class="flex items-center gap-2 mb-3">
                <span class="h-px w-8 bg-primary"></span>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-primary">Informasi Terkini</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-headline font-bold text-on-surface mb-3">Kabar Lingkungan</h2>
            <p class="text-on-surface-variant text-sm sm:text-base max-w-2xl">Informasi terkini, pengumuman penting, dan kegiatan hangat dari lingkungan Anda.</p>
        </div>

        <?php if (!empty($announcements)): ?>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-12">
            <?php $featured = $announcements[0]; ?>
            <div class="lg:col-span-8 relative rounded-2xl overflow-hidden shadow-large group min-h-[400px] sm:min-h-[450px]">
                <div class="absolute inset-0 featured-gradient bg-gradient-to-br from-primary-dark to-primary"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8 text-white z-10">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="bg-tertiary/90 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">Penting</span>
                        <span class="text-white/70 text-xs flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">event</span>
                            <?= date('d F Y', strtotime($featured->created_at)) ?>
                        </span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-headline font-bold mb-3 leading-tight group-hover:text-primary-faded transition-colors"><?= htmlspecialchars($featured->title) ?></h3>
                    <p class="text-sm text-white/80 max-w-xl mb-5 line-clamp-2"><?= htmlspecialchars($featured->content) ?></p>
                    <button class="featured-read-btn bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all inline-flex items-center gap-2">
                        Baca Selengkapnya
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-5">
                <?php foreach (array_slice($announcements, 1, 2) as $index => $ann): ?>
                <div class="bg-white rounded-xl p-5 shadow-card border border-outline-variant/20 card-hover">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-tertiary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-tertiary text-xl" style="font-variation-settings: 'FILL' 1;">campaign</span>
                        </div>
                        <span class="text-[9px] font-bold text-on-surface-variant uppercase tracking-wider"><?= date('d M Y', strtotime($ann->created_at)) ?></span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-lg mb-2"><?= htmlspecialchars($ann->title) ?></h4>
                    <p class="text-sm text-on-surface-variant mb-4 line-clamp-2"><?= htmlspecialchars($ann->content) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="flex flex-wrap gap-2 mb-8 pb-4 border-b border-outline-variant/30">
            <button class="filter-btn active px-5 py-2 rounded-full text-sm font-semibold transition-all bg-primary text-white shadow-md">Semua</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Kegiatan</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Pembangunan</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Keamanan</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Kesehatan</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($announcements)): ?>
                <?php foreach ($announcements as $announcement): ?>
                    <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                                <span class="material-symbols-outlined text-sm">schedule</span>
                                <span><?= date('d M Y', strtotime($announcement->created_at)) ?></span>
                            </div>
                            <h4 class="font-headline font-bold text-on-surface text-base mb-2 group-hover:text-primary transition-colors"><?= htmlspecialchars($announcement->title) ?></h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2 mb-4"><?= htmlspecialchars($announcement->content) ?></p>
                            <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-primary/20 flex items-center justify-center text-primary text-xs font-bold">RT</div>
                                    <span class="text-xs font-semibold text-on-surface-variant"><?= htmlspecialchars($announcement->head_name ?? 'Pengurus RT') ?></span>
                                </div>
                                <button class="read-more-btn text-primary text-sm font-semibold hover:underline">Baca</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-12">
                    <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-3">notifications_off</span>
                    <p class="text-on-surface-variant">Belum ada pengumuman</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

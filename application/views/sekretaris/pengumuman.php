<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="w-full">
        <!-- Header Section -->
        <div class="mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Manajemen Pengumuman</h2>
            <p class="text-on-surface-variant text-sm sm:text-base mt-1">Kelola informasi dan berita untuk seluruh warga</p>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- LEFT COLUMN: Form Section (4 cols on desktop) -->
            <div class="lg:col-span-4 space-y-5">
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-card border border-outline-variant/20">
                    <h3 class="text-lg sm:text-xl font-headline font-bold text-primary mb-5 flex items-center gap-2">
                        <span class="material-symbols-outlined">add_circle</span>
                        Buat Pengumuman
                    </h3>

                    <form id="announcementForm" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-on-surface-variant mb-1.5">Judul Pengumuman</label>
                            <input type="text" id="title" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm" placeholder="Contoh: Kerja Bakti Bulanan">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-on-surface-variant mb-1.5">Kategori</label>
                            <select id="category" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm">
                                <option>Kegiatan Warga</option>
                                <option>Keamanan</option>
                                <option>Informasi Penting</option>
                                <option>Pembangunan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-on-surface-variant mb-1.5">Isi Pengumuman</label>
                            <textarea id="content" rows="4" class="w-full px-4 py-2.5 bg-surface-container-low border border-outline-variant/30 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm resize-none" placeholder="Tuliskan detail pengumuman di sini..."></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-on-surface-variant mb-1.5">Lampiran Gambar</label>
                            <div class="border-2 border-dashed border-outline-variant rounded-xl p-6 flex flex-col items-center justify-center text-center bg-surface-container-low/50 hover:bg-surface-container-low transition cursor-pointer">
                                <span class="material-symbols-outlined text-3xl text-on-surface-variant/60 mb-2">cloud_upload</span>
                                <p class="text-xs text-on-surface-variant">Klik atau seret file ke sini</p>
                                <p class="text-[10px] text-on-surface-variant/50 mt-1">PNG, JPG up to 5MB</p>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white font-bold py-3 rounded-xl shadow-md hover:bg-primary-dark transition-all btn-action">
                            Terbitkan Pengumuman
                        </button>
                    </form>
                </div>

                <div class="bg-gradient-to-br from-tertiary/5 to-tertiary/10 rounded-2xl p-5 border border-tertiary/20">
                    <h4 class="text-xs font-bold text-tertiary uppercase tracking-wider mb-3">Ringkasan Aktif</h4>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-3xl font-headline font-bold text-tertiary"><?= count($announcements ?? []) ?></p>
                            <p class="text-xs text-on-surface-variant">Total Pengumuman</p>
                        </div>
                        <span class="material-symbols-outlined text-5xl text-tertiary/30">campaign</span>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Announcements List (8 cols on desktop) -->
            <div class="lg:col-span-8 space-y-5">
                <div class="flex gap-1 sm:gap-2 border-b border-outline-variant/30 pb-2 overflow-x-auto">
                    <button class="tab-btn active px-4 py-2 text-sm font-semibold rounded-t-lg transition-all whitespace-nowrap" data-tab="all">Semua</button>
                    <button class="tab-btn px-4 py-2 text-sm font-semibold text-on-surface-variant hover:text-primary transition-all whitespace-nowrap" data-tab="active">Aktif</button>
                    <button class="tab-btn px-4 py-2 text-sm font-semibold text-on-surface-variant hover:text-primary transition-all whitespace-nowrap" data-tab="ended">Berakhir</button>
                    <button class="tab-btn px-4 py-2 text-sm font-semibold text-on-surface-variant hover:text-primary transition-all whitespace-nowrap" data-tab="draft">Draft</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <?php if (!empty($announcements)) : ?>
                        <?php foreach ($announcements as $announcement) : ?>
                            <?php
                            $is_active = ($announcement->is_active ?? 0) == 1;
                            $is_pinned = ($announcement->is_pinned ?? 0) == 1;
                            ?>
                            <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group <?= !$is_active ? 'opacity-80' : '' ?>">
                                <?php if (!empty($announcement->image)) : ?>
                                    <div class="h-44 relative overflow-hidden <?= !$is_active ? 'grayscale' : '' ?>">
                                        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="<?= base_url('uploads/announcements/' . htmlspecialchars($announcement->image)) ?>" alt="<?= htmlspecialchars($announcement->title ?? '') ?>">
                                        <div class="absolute top-3 left-3">
                                            <span class="bg-primary/90 text-white text-[10px] font-bold px-2.5 py-1 rounded-full"><?= htmlspecialchars($announcement->category ?? 'Umum') ?></span>
                                        </div>
                                        <div class="absolute top-3 right-3">
                                            <?php if ($is_active) : ?>
                                                <span class="bg-white/90 backdrop-blur text-primary text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm">
                                                    <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                                                    Aktif
                                                </span>
                                            <?php else : ?>
                                                <span class="bg-surface-dim text-on-surface-variant text-[10px] font-bold px-2.5 py-1 rounded-full">Berakhir</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="h-44 bg-surface-container-low flex items-center justify-center">
                                        <span class="material-symbols-outlined text-5xl text-on-surface-variant/30">campaign</span>
                                    </div>
                                <?php endif; ?>
                                <div class="p-4">
                                    <p class="text-[10px] text-on-surface-variant mb-1">Diterbitkan <?= date('d M Y', strtotime($announcement->created_at ?? 'now')) ?></p>
                                    <h4 class="font-headline font-bold text-on-surface text-base mb-2"><?= htmlspecialchars($announcement->title ?? '-') ?></h4>
                                    <p class="text-sm text-on-surface-variant line-clamp-2 mb-3"><?= htmlspecialchars($announcement->content ?? '-') ?></p>
                                    <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                                        <span class="text-[11px] text-on-surface-variant flex items-center gap-1">
                                            <span class="material-symbols-outlined text-sm">person</span> <?= htmlspecialchars($announcement->head_name ?? 'Admin') ?>
                                        </span>
                                        <div class="flex gap-1">
                                            <button class="edit-btn p-1.5 text-on-surface-variant hover:text-primary rounded-lg transition" data-id="<?= $announcement->id ?>">
                                                <span class="material-symbols-outlined text-sm">edit</span>
                                            </button>
                                            <button class="delete-announcement-btn p-1.5 text-on-surface-variant hover:text-error rounded-lg transition" data-id="<?= $announcement->id ?>">
                                                <span class="material-symbols-outlined text-sm">delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="md:col-span-2 bg-white rounded-xl p-10 text-center shadow-card border border-outline-variant/20">
                            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-3">campaign</span>
                            <p class="text-sm text-on-surface-variant">Belum ada pengumuman</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="flex items-center justify-center gap-2 pt-6">
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low transition">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center bg-primary text-white font-bold">1</button>
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low transition">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

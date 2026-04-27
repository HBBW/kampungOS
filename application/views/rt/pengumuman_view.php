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
                <!-- Create Announcement Card -->
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

                <!-- Stats Summary Card -->
                <div class="bg-gradient-to-br from-tertiary/5 to-tertiary/10 rounded-2xl p-5 border border-tertiary/20">
                    <h4 class="text-xs font-bold text-tertiary uppercase tracking-wider mb-3">Ringkasan Aktif</h4>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-3xl font-headline font-bold text-tertiary">12</p>
                            <p class="text-xs text-on-surface-variant">Pengumuman Aktif</p>
                        </div>
                        <span class="material-symbols-outlined text-5xl text-tertiary/30">campaign</span>
                    </div>
                    <div class="mt-4 pt-3 border-t border-tertiary/10">
                        <div class="flex justify-between text-xs">
                            <span class="text-on-surface-variant">Draft</span>
                            <span class="font-semibold">3</span>
                        </div>
                        <div class="flex justify-between text-xs mt-1">
                            <span class="text-on-surface-variant">Berakhir</span>
                            <span class="font-semibold">5</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Announcements List (8 cols on desktop) -->
            <div class="lg:col-span-8 space-y-5">
                <!-- Tabs -->
                <div class="flex gap-1 sm:gap-2 border-b border-outline-variant/30 pb-2 overflow-x-auto">
                    <button class="tab-btn active px-4 py-2 text-sm font-semibold rounded-t-lg transition-all whitespace-nowrap" data-tab="all">Semua</button>
                    <button class="tab-btn px-4 py-2 text-sm font-semibold text-on-surface-variant hover:text-primary transition-all whitespace-nowrap" data-tab="active">Aktif</button>
                    <button class="tab-btn px-4 py-2 text-sm font-semibold text-on-surface-variant hover:text-primary transition-all whitespace-nowrap" data-tab="ended">Berakhir</button>
                    <button class="tab-btn px-4 py-2 text-sm font-semibold text-on-surface-variant hover:text-primary transition-all whitespace-nowrap" data-tab="draft">Draft</button>
                </div>

                <!-- Announcements Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Card 1 - Active -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                        <div class="h-44 relative overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1593113630400-ea4288922497?w=400&h=200&fit=crop" alt="Kegiatan warga">
                            <div class="absolute top-3 left-3">
                                <span class="bg-primary/90 text-white text-[10px] font-bold px-2.5 py-1 rounded-full">Kegiatan Warga</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="bg-white/90 backdrop-blur text-primary text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm">
                                    <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-[10px] text-on-surface-variant mb-1">Diterbitkan 12 Okt 2023</p>
                            <h4 class="font-headline font-bold text-on-surface text-base mb-2">Kerja Bakti Massal RT 05</h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2 mb-3">Diharapkan seluruh warga membawa peralatan kebersihan masing-masing untuk membersihkan area taman utama dan selokan sekitar lingkungan.</p>
                            <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                                <div class="flex -space-x-2">
                                    <div class="w-6 h-6 rounded-full bg-primary/20 border-2 border-white flex items-center justify-center text-[8px] font-bold">+24</div>
                                </div>
                                <div class="flex gap-1">
                                    <button class="edit-btn p-1.5 text-on-surface-variant hover:text-primary rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="delete-btn p-1.5 text-on-surface-variant hover:text-error rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 - Active -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                        <div class="h-44 relative overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=400&h=200&fit=crop" alt="Keamanan lingkungan">
                            <div class="absolute top-3 left-3">
                                <span class="bg-tertiary/90 text-white text-[10px] font-bold px-2.5 py-1 rounded-full">Keamanan</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="bg-white/90 backdrop-blur text-primary text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm">
                                    <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-[10px] text-on-surface-variant mb-1">Diterbitkan 10 Okt 2023</p>
                            <h4 class="font-headline font-bold text-on-surface text-base mb-2">Pembaruan Sistem CCTV</h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2 mb-3">Pemasangan 4 titik CCTV baru di area gerbang timur dan barat untuk meningkatkan keamanan lingkungan warga.</p>
                            <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                                <span class="text-[11px] text-on-surface-variant flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">visibility</span> 124 Dilihat
                                </span>
                                <div class="flex gap-1">
                                    <button class="edit-btn p-1.5 text-on-surface-variant hover:text-primary rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="delete-btn p-1.5 text-on-surface-variant hover:text-error rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 - Ended -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 opacity-80 card-hover group">
                        <div class="h-44 relative overflow-hidden grayscale">
                            <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=200&fit=crop" alt="Perbaikan jalan">
                            <div class="absolute top-3 left-3">
                                <span class="bg-surface-variant text-on-surface-variant text-[10px] font-bold px-2.5 py-1 rounded-full">Pembangunan</span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="bg-surface-dim text-on-surface-variant text-[10px] font-bold px-2.5 py-1 rounded-full">Berakhir</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-[10px] text-on-surface-variant mb-1">Diterbitkan 25 Sep 2023</p>
                            <h4 class="font-headline font-bold text-on-surface text-base mb-2">Perbaikan Jalan Utama</h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2 mb-3">Informasi penutupan jalan sementara selama pengaspalan ulang jalan Blok A hingga Blok C.</p>
                            <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                                <span class="text-[11px] text-on-surface-variant">Status: Selesai</span>
                                <div class="flex gap-1">
                                    <button class="p-1.5 text-on-surface-variant hover:text-primary rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">history</span>
                                    </button>
                                    <button class="delete-btn p-1.5 text-on-surface-variant hover:text-error rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 - Draft -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-card border border-dashed border-outline-variant/40 card-hover group">
                        <div class="h-44 bg-surface-container-low flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30">draft</span>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="bg-surface-container-high text-on-surface-variant text-[10px] font-bold px-2.5 py-1 rounded-full">Draft</span>
                                <span class="text-[10px] text-on-surface-variant">Belum diterbitkan</span>
                            </div>
                            <h4 class="font-headline font-bold text-on-surface text-base mb-2">Peringatan Hujan Lebat</h4>
                            <p class="text-sm text-on-surface-variant line-clamp-2 mb-3">Informasi cuaca ekstrem untuk wilayah RW 02...</p>
                            <div class="flex items-center justify-end pt-3 border-t border-outline-variant/20">
                                <div class="flex gap-1">
                                    <button class="edit-btn p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">edit</span>
                                    </button>
                                    <button class="p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">publish</span>
                                    </button>
                                    <button class="delete-btn p-1.5 text-on-surface-variant hover:text-error rounded-lg transition">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <button id="btnAdd"
                            class="fixed bottom-24 right-5 md:bottom-8 md:right-8 w-14 h-14 rounded-full bg-primary text-white shadow-lg flex items-center justify-center hover:scale-105 active:scale-95 transition z-50">
                            <span class="material-symbols-outlined text-2xl">add</span>
                        </button>

                        <div id="modalPengumuman" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
                            <div class="bg-white rounded-2xl p-6 w-full max-w-md">
                                <h3 class="text-lg font-bold mb-4">Buat Pengumuman</h3>

                                <input type="text" placeholder="Judul..." class="w-full border p-2 rounded mb-3">
                                <textarea placeholder="Isi pengumuman..." class="w-full border p-2 rounded mb-3"></textarea>

                                <div class="flex justify-end gap-2">
                                    <button id="closeModal" class="px-4 py-2">Batal</button>
                                    <button class="px-4 py-2 bg-primary text-white rounded">Kirim</button>
                                </div>
                            </div>
                        </div> -->
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-center gap-2 pt-6">
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low transition">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center bg-primary text-white font-bold">1</button>
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low transition">2</button>
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low transition">3</button>
                    <button class="w-9 h-9 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low transition">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
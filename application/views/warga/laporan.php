<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-full mx-auto w-full">

        <!-- Hero Header -->
        <div class="mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface mb-2">Laporan Warga</h2>
            <p class="text-on-surface-variant text-sm sm:text-base max-w-2xl">Laporkan masalah di lingkungan sekitar Anda. Setiap laporan membantu kami membangun kampung yang lebih nyaman, aman, dan asri.</p>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <!-- LEFT COLUMN: Report Form (7 cols) -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl p-5 sm:p-6 md:p-8 shadow-card border border-outline-variant/20">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-xl">edit_note</span>
                        </div>
                        <h3 class="text-xl font-headline font-semibold text-on-surface">Buat Laporan Baru</h3>
                    </div>

                    <form id="reportForm" class="space-y-5">
                        <!-- Category & Location Row -->
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

                        <!-- Description -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface-variant block">Deskripsi Masalah</label>
                            <textarea id="description" rows="4" placeholder="Ceritakan detail masalah yang Anda temukan..." class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/30 transition-all text-sm resize-none"></textarea>
                        </div>

                        <!-- Photo Upload -->
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-on-surface-variant block">Foto Bukti (Opsional)</label>
                            <div class="file-drop-area border-2 border-dashed border-outline-variant/50 rounded-xl p-6 flex flex-col items-center justify-center bg-surface-container-low/50 hover:bg-primary/5 transition-all cursor-pointer">
                                <span class="material-symbols-outlined text-3xl text-on-surface-variant/60 mb-2">cloud_upload</span>
                                <p class="text-sm text-on-surface-variant"><span class="text-primary font-semibold">Klik untuk unggah</span> atau seret foto ke sini</p>
                                <p class="text-xs text-on-surface-variant/60 mt-1">PNG, JPG up to 5MB</p>
                                <input type="file" id="photoUpload" class="hidden" accept="image/*">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-primary text-white py-3 rounded-xl font-bold text-base hover:bg-primary-dark transition-all btn-action flex items-center justify-center gap-2 shadow-md">
                            <span class="material-symbols-outlined text-lg">send</span>
                            Kirim Laporan
                        </button>
                    </form>
                </div>
            </div>

            <!-- RIGHT COLUMN: My Reports & Emergency (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                <!-- My Reports Section -->
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-card border border-outline-variant/20">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-lg font-headline font-semibold text-on-surface">Laporan Saya</h3>
                        <button class="text-primary text-xs font-semibold hover:underline">Lihat Semua</button>
                    </div>

                    <div class="space-y-3">
                        <!-- Report 1 - In Progress -->
                        <div class="bg-surface-container-low rounded-xl p-4 transition-all card-hover">
                            <div class="flex gap-3">
                                <div class="w-10 h-10 rounded-xl bg-tertiary/10 flex items-center justify-center text-tertiary flex-shrink-0">
                                    <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">lightbulb</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap justify-between items-start gap-1 mb-1">
                                        <h4 class="font-bold text-sm text-on-surface">Lampu Mati Gg. 4</h4>
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-surface-container-highest text-on-surface-variant font-semibold">Lampu Jalan</span>
                                    </div>
                                    <p class="text-xs text-on-surface-variant line-clamp-1 mb-2">Lampu di depan rumah nomor 5 mati sejak semalam...</p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                            <span class="text-[10px] font-semibold text-on-surface-variant">Proses</span>
                                        </div>
                                        <span class="text-[10px] text-on-surface-variant">12 Okt 2023</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Report 2 - Completed -->
                        <div class="bg-surface-container-low rounded-xl p-4 transition-all card-hover">
                            <div class="flex gap-3">
                                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                    <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">security</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap justify-between items-start gap-1 mb-1">
                                        <h4 class="font-bold text-sm text-on-surface">Portal Rusak</h4>
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-primary/10 text-primary font-semibold">Keamanan</span>
                                    </div>
                                    <p class="text-xs text-on-surface-variant line-clamp-1 mb-2">Engsel portal gerbang timur patah...</p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                                            <span class="text-[10px] font-semibold text-primary">Selesai</span>
                                        </div>
                                        <span class="text-[10px] text-on-surface-variant">08 Okt 2023</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Report 3 - Pending -->
                        <div class="bg-surface-container-low rounded-xl p-4 transition-all card-hover opacity-80">
                            <div class="flex gap-3">
                                <div class="w-10 h-10 rounded-xl bg-surface-container-highest flex items-center justify-center text-on-surface-variant flex-shrink-0">
                                    <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">delete</span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap justify-between items-start gap-1 mb-1">
                                        <h4 class="font-bold text-sm text-on-surface">Tumpukan Sampah</h4>
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-surface-container-highest text-on-surface-variant font-semibold">Sampah</span>
                                    </div>
                                    <p class="text-xs text-on-surface-variant line-clamp-1 mb-2">Truk sampah belum lewat selama 3 hari...</p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-stone-400"></span>
                                            <span class="text-[10px] font-semibold text-on-surface-variant">Pending</span>
                                        </div>
                                        <span class="text-[10px] text-on-surface-variant">Kemarin</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact Card -->
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
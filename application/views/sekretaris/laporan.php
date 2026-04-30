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
                    <span class="text-[11px] font-bold bg-emerald-50 text-primary-dark px-2 py-0.5 rounded-full flex items-center gap-0.5">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 12%
                    </span>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Total Laporan</p>
                <div class="flex items-baseline gap-2 mt-1">
                    <h3 class="text-3xl font-bold">24</h3>
                    <span class="text-xs text-on-surface-variant">Bulan ini</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="p-2.5 rounded-xl bg-tertiary/10 text-tertiary mb-3 w-fit">
                    <span class="material-symbols-outlined text-2xl">hourglass_empty</span>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Menunggu</p>
                <h3 class="text-3xl font-bold mt-1">8</h3>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="p-2.5 rounded-xl bg-blue-50 text-blue-600 mb-3 w-fit">
                    <span class="material-symbols-outlined text-2xl">sync</span>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Diproses</p>
                <h3 class="text-3xl font-bold mt-1">12</h3>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                <div class="p-2.5 rounded-xl bg-green-50 text-green-600 mb-3 w-fit">
                    <span class="material-symbols-outlined text-2xl">verified</span>
                </div>
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Selesai</p>
                <h3 class="text-3xl font-bold mt-1">4</h3>
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
                            <p class="text-sm text-on-surface-variant mt-0.5">Daftar keluhan warga yang masuk minggu ini</p>
                        </div>
                        <button class="text-primary text-sm font-semibold hover:underline flex items-center gap-1">Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span></button>
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
                                <!-- Row 1 - Pending -->
                                <tr class="table-row-hover transition">
                                    <td class="px-4 sm:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0">SA</div>
                                            <div>
                                                <p class="font-bold text-sm text-on-surface">Siti Aminah</p>
                                                <p class="text-[10px] text-on-surface-variant">Blok B No.12</p>
                                            </div>
                                        </div>
                                        <div class="sm:hidden mt-2">
                                            <span class="inline-block px-2 py-0.5 bg-tertiary/10 text-tertiary text-[10px] font-semibold rounded-lg">Lampu Jalan</span>
                                        </div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                        <span class="inline-block px-2.5 py-1 bg-tertiary/10 text-tertiary text-[11px] font-semibold rounded-lg">Lampu Jalan</span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-on-surface-variant text-sm hidden md:table-cell">12 Okt 2023</td>
                                    <td class="px-4 sm:px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 text-amber-700 text-[10px] font-bold uppercase">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-700 animate-pulse"></span>
                                            Pending
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-right opacity-0 group-hover:opacity-100 transition">
                                        <div class="flex justify-end gap-2">
                                            <button class="view-btn p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                                <span class="material-symbols-outlined text-sm">visibility</span>
                                            </button>
                                            <button class="p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                                <span class="material-symbols-outlined text-sm">edit_note</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 2 - Diproses -->
                                <tr class="table-row-hover transition">
                                    <td class="px-4 sm:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-sm flex-shrink-0">AS</div>
                                            <div>
                                                <p class="font-bold text-sm text-on-surface">Ahmad Subarjo</p>
                                                <p class="text-[10px] text-on-surface-variant">Blok D No.05</p>
                                            </div>
                                        </div>
                                        <div class="sm:hidden mt-2">
                                            <span class="inline-block px-2 py-0.5 bg-primary/10 text-primary text-[10px] font-semibold rounded-lg">Kebersihan</span>
                                        </div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                        <span class="inline-block px-2.5 py-1 bg-primary/10 text-primary text-[11px] font-semibold rounded-lg">Kebersihan</span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-on-surface-variant text-sm hidden md:table-cell">11 Okt 2023</td>
                                    <td class="px-4 sm:px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 text-[10px] font-bold uppercase">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-700 animate-pulse"></span>
                                            Diproses
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-right opacity-0 group-hover:opacity-100 transition">
                                        <div class="flex justify-end gap-2">
                                            <button class="view-btn p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                                <span class="material-symbols-outlined text-sm">visibility</span>
                                            </button>
                                            <button class="p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                                <span class="material-symbols-outlined text-sm">edit_note</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 3 - Selesai -->
                                <tr class="table-row-hover transition">
                                    <td class="px-4 sm:px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-full bg-error/10 flex items-center justify-center text-error font-bold text-sm flex-shrink-0">RH</div>
                                            <div>
                                                <p class="font-bold text-sm text-on-surface">Rian Hidayat</p>
                                                <p class="text-[10px] text-on-surface-variant">Blok A No.18</p>
                                            </div>
                                        </div>
                                        <div class="sm:hidden mt-2">
                                            <span class="inline-block px-2 py-0.5 bg-error/10 text-error text-[10px] font-semibold rounded-lg">Keamanan</span>
                                        </div>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 hidden sm:table-cell">
                                        <span class="inline-block px-2.5 py-1 bg-error/10 text-error text-[11px] font-semibold rounded-lg">Keamanan</span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-on-surface-variant text-sm hidden md:table-cell">10 Okt 2023</td>
                                    <td class="px-4 sm:px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-green-50 text-green-700 text-[10px] font-bold uppercase">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-700"></span>
                                            Selesai
                                        </span>
                                    </td>
                                    <td class="px-4 sm:px-6 py-4 text-right opacity-0 group-hover:opacity-100 transition">
                                        <div class="flex justify-end gap-2">
                                            <button class="view-btn p-1.5 text-primary hover:bg-primary/10 rounded-lg transition">
                                                <span class="material-symbols-outlined text-sm">visibility</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-4 border-t border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <p class="text-xs text-on-surface-variant text-center sm:text-left">Menampilkan 3 dari 24 laporan</p>
                        <div class="flex justify-center gap-1">
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition">
                                <span class="material-symbols-outlined text-sm">chevron_left</span>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white font-bold">1</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition">2</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition">3</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition">
                                <span class="material-symbols-outlined text-sm">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Action Button Mobile -->
                <button class="w-full lg:hidden bg-primary text-white font-bold py-3 rounded-xl shadow-md hover:bg-primary-dark transition-all btn-action flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">add_circle</span>
                    Laporan Baru
                </button>
            </div>

            <!-- RIGHT COLUMN: Side Panel (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- New Report Button Desktop -->
                <button class="hidden lg:flex w-full bg-primary text-white font-bold py-4 rounded-xl shadow-md hover:bg-primary-dark transition-all btn-action items-center justify-center gap-3">
                    <span class="material-symbols-outlined">add_circle</span>
                    <span>Buat Laporan Baru</span>
                </button>

                <!-- Photo Gallery -->
                <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-headline font-bold text-on-surface text-lg">Galeri Foto</h3>
                        <span class="bg-primary/10 text-primary text-[10px] font-bold px-2 py-1 rounded-full">Hari Ini</span>
                    </div>

                    <div class="space-y-5 max-h-[400px] overflow-y-auto custom-scrollbar pr-1">
                        <!-- Gallery Item 1 -->
                        <div class="group cursor-pointer">
                            <div class="relative aspect-video w-full overflow-hidden rounded-xl mb-3 bg-surface-container">
                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=400&h=250&fit=crop" alt="Lampu jalan rusak">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <span class="absolute bottom-2 left-2 bg-black/50 backdrop-blur-sm text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Blok B / No 12</span>
                            </div>
                            <h4 class="font-bold text-sm text-on-surface group-hover:text-primary transition">Lampu jalan mati di Blok B</h4>
                            <p class="text-xs text-on-surface-variant mt-1 line-clamp-2">Sudah 3 hari lampu padam di depan rumah, mohon segera ditindaklanjuti.</p>
                        </div>

                        <!-- Gallery Item 2 -->
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

                <!-- Emergency Contact Card -->
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
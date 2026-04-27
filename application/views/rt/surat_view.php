
    <!-- Content Area -->
    <div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
        <div class="max-w-7xl mx-auto w-full">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6 sm:mb-8">
                <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Total Antrean</p>
                            <h3 class="text-3xl font-bold mt-1">24</h3>
                        </div>
                        <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                            <span class="material-symbols-outlined text-xl">pending_actions</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-primary-dark font-semibold mt-3 flex items-center gap-1"><span class="material-symbols-outlined text-sm">trending_up</span> +5 hari ini</p>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-tertiary text-xs font-semibold uppercase tracking-wide">Menunggu</p>
                            <h3 class="text-3xl font-bold mt-1">12</h3>
                        </div>
                        <div class="p-2.5 rounded-xl bg-tertiary/10 text-tertiary">
                            <span class="material-symbols-outlined text-xl">hourglass_empty</span>
                        </div>
                    </div>
                    <div class="mt-3 h-1.5 w-full bg-surface-container-low rounded-full overflow-hidden">
                        <div class="h-full bg-tertiary rounded-full" style="width: 50%"></div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-primary text-xs font-semibold uppercase tracking-wide">Disetujui</p>
                            <h3 class="text-3xl font-bold mt-1">158</h3>
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
                            <h3 class="text-3xl font-bold mt-1">3</h3>
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
                <button class="px-4 py-2 bg-primary text-white rounded-full text-sm font-semibold whitespace-nowrap">Permintaan Aktif</button>
                <button class="px-4 py-2 bg-surface-container-low text-on-surface-variant rounded-full text-sm font-semibold whitespace-nowrap">Arsip Selesai</button>
                <button class="px-4 py-2 bg-surface-container-low text-on-surface-variant rounded-full text-sm font-semibold whitespace-nowrap">Template Surat</button>
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
                            <!-- Row 1 - Pending -->
                            <tr class="table-row-hover transition">
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0">BS</div>
                                        <div>
                                            <p class="font-bold text-on-surface text-sm sm:text-base">Bambang Sutejo</p>
                                            <p class="text-[10px] sm:text-xs text-on-surface-variant">NIK: 3271***8901</p>
                                            <span class="sm:hidden text-[10px] text-on-surface-variant mt-1 block">SK Domisili • 12 Okt 2023</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-center hidden sm:table-cell">
                                    <span class="inline-block px-3 py-1 bg-surface-container-low rounded-full text-[10px] sm:text-[11px] font-semibold text-on-surface-variant border border-outline-variant/30">SK Domisili</span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-on-surface-variant text-xs sm:text-sm hidden md:table-cell">12 Okt 2023, 09:15</td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-tertiary/10 text-tertiary font-bold text-[10px] sm:text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
                                        Pending
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-right">
                                    <div class="flex justify-end gap-1 sm:gap-2">
                                        <button class="p-1.5 sm:p-2 text-primary hover:bg-primary/10 rounded-lg transition btn-action" title="Tinjau">
                                            <span class="material-symbols-outlined text-sm sm:text-base">visibility</span>
                                        </button>
                                        <button class="p-1.5 sm:p-2 text-primary hover:bg-primary/10 rounded-lg transition btn-action" title="Verifikasi">
                                            <span class="material-symbols-outlined text-sm sm:text-base">verified</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2 - Disetujui -->
                            <tr class="table-row-hover transition">
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-bold text-sm flex-shrink-0">AN</div>
                                        <div>
                                            <p class="font-bold text-on-surface text-sm sm:text-base">Anisa Nurul</p>
                                            <p class="text-[10px] sm:text-xs text-on-surface-variant">NIK: 3271***8905</p>
                                            <span class="sm:hidden text-[10px] text-on-surface-variant mt-1 block">SKU (Usaha) • 11 Okt 2023</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-center hidden sm:table-cell">
                                    <span class="inline-block px-3 py-1 bg-primary/10 rounded-full text-[10px] sm:text-[11px] font-semibold text-primary border border-primary/20">SKU (Usaha)</span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-on-surface-variant text-xs sm:text-sm hidden md:table-cell">11 Okt 2023, 14:20</td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary/10 text-primary font-bold text-[10px] sm:text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                        Disetujui
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-right">
                                    <button class="inline-flex items-center gap-1 sm:gap-2 px-3 sm:px-4 py-1.5 bg-primary text-white rounded-lg text-[10px] sm:text-xs font-bold hover:bg-primary-dark transition btn-action shadow-sm">
                                        <span class="material-symbols-outlined text-sm">picture_as_pdf</span>
                                        <span class="hidden sm:inline">PDF</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 3 - Ditolak -->
                            <tr class="table-row-hover transition">
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-error/10 flex items-center justify-center text-error font-bold text-sm flex-shrink-0">RR</div>
                                        <div>
                                            <p class="font-bold text-on-surface text-sm sm:text-base">Rian Ramadhan</p>
                                            <p class="text-[10px] sm:text-xs text-on-surface-variant">NIK: 3271***8912</p>
                                            <span class="sm:hidden text-[10px] text-on-surface-variant mt-1 block">SK Tidak Mampu • 10 Okt 2023</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-center hidden sm:table-cell">
                                    <span class="inline-block px-3 py-1 bg-error/10 rounded-full text-[10px] sm:text-[11px] font-semibold text-error border border-error/20">SK Tidak Mampu</span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-on-surface-variant text-xs sm:text-sm hidden md:table-cell">10 Okt 2023, 16:45</td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-error/10 text-error font-bold text-[10px] sm:text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                                        Ditolak
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-right">
                                    <button class="p-1.5 sm:p-2 text-on-surface-variant hover:bg-surface-container-low rounded-lg transition btn-action" title="Lihat Alasan">
                                        <span class="material-symbols-outlined text-sm sm:text-base">chat_bubble_outline</span>
                                    </button>
                                </td>
                            </tr>
                            <!-- Row 4 - Pending -->
                            <tr class="table-row-hover transition">
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold text-sm flex-shrink-0">KD</div>
                                        <div>
                                            <p class="font-bold text-on-surface text-sm sm:text-base">Kartika Dewi</p>
                                            <p class="text-[10px] sm:text-xs text-on-surface-variant">NIK: 3271***8921</p>
                                            <span class="sm:hidden text-[10px] text-on-surface-variant mt-1 block">SKCK • 12 Okt 2023</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-center hidden sm:table-cell">
                                    <span class="inline-block px-3 py-1 bg-surface-container-low rounded-full text-[10px] sm:text-[11px] font-semibold text-on-surface-variant border border-outline-variant/30">SKCK</span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-on-surface-variant text-xs sm:text-sm hidden md:table-cell">12 Okt 2023, 11:30</td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-tertiary/10 text-tertiary font-bold text-[10px] sm:text-[11px]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-pulse"></span>
                                        Pending
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 text-right">
                                    <div class="flex justify-end gap-1 sm:gap-2">
                                        <button class="p-1.5 sm:p-2 text-primary hover:bg-primary/10 rounded-lg transition btn-action">
                                            <span class="material-symbols-outlined text-sm sm:text-base">visibility</span>
                                        </button>
                                        <button class="p-1.5 sm:p-2 text-primary hover:bg-primary/10 rounded-lg transition btn-action">
                                            <span class="material-symbols-outlined text-sm sm:text-base">verified</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4 sm:p-5 border-t border-outline-variant/20 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs sm:text-sm">
                    <p class="text-on-surface-variant text-center sm:text-left">Menampilkan 4 dari 24 permintaan</p>
                    <div class="flex justify-center gap-1 sm:gap-2">
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition btn-action">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white font-bold">1</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition btn-action">2</button>
                        <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition btn-action">3</button>
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

</body>

</html>
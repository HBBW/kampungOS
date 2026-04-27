<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-fit mx-auto w-full">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5 mb-8">
            <div>
                <h2 class="text-3xl font-headline font-bold text-on-surface">Layanan Surat Digital</h2>
                <p class="text-on-surface-variant text-sm sm:text-base mt-2 max-w-md">Urusi keperluan administrasi Anda secara online. Cepat, transparan, dan terverifikasi.</p>
            </div>
            <button class="new-letter-btn bg-primary text-white px-6 py-3 rounded-xl font-bold flex items-center justify-center gap-2 shadow-md hover:bg-primary-dark transition-all btn-action">
                <span class="material-symbols-outlined text-lg">add_circle</span>
                Ajukan Surat Baru
            </button>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- LEFT COLUMN: Active Requests & History (8 cols) -->
            <div class="lg:col-span-8 space-y-6">
                <!-- Active Requests Card -->
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-card border border-outline-variant/20">
                    <div class="flex flex-wrap justify-between items-center gap-3 mb-5">
                        <h3 class="text-xl font-headline font-bold text-on-surface">Status Pengajuan</h3>
                        <a href="#" class="text-primary text-sm font-semibold hover:underline flex items-center gap-1">
                            Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>

                    <div class="space-y-3">
                        <!-- Request 1 - In Progress -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-surface-container-low rounded-xl border border-outline-variant/20 gap-3">
                            <div class="flex items-center gap-4">
                                <div class="w-11 h-11 rounded-xl bg-tertiary/10 flex items-center justify-center text-tertiary flex-shrink-0">
                                    <span class="material-symbols-outlined text-2xl">home_work</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-on-surface">Surat Keterangan Domisili</h4>
                                    <p class="text-xs text-on-surface-variant">Diajukan: 12 Okt 2023 • ID: #SKD-9921</p>
                                </div>
                            </div>
                            <div class="text-left sm:text-right">
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-secondary/10 text-secondary text-xs font-semibold mb-1">
                                    <span class="w-2 h-2 bg-secondary rounded-full mr-2 animate-pulse"></span>
                                    Diproses Ketua RT
                                </span>
                                <p class="text-[10px] text-on-surface-variant mt-1">Estimasi selesai: Besok</p>
                            </div>
                        </div>

                        <!-- Request 2 - Completed -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-surface-container-low rounded-xl border border-outline-variant/20 gap-3">
                            <div class="flex items-center gap-4">
                                <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                    <span class="material-symbols-outlined text-2xl">favorite</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-on-surface">Surat Pengantar Nikah</h4>
                                    <p class="text-xs text-on-surface-variant">Diajukan: 08 Okt 2023 • ID: #SPN-8842</p>
                                </div>
                            </div>
                            <div class="text-left sm:text-right">
                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold mb-1">
                                    <span class="w-2 h-2 bg-primary rounded-full mr-2"></span>
                                    Selesai & Digital Sign
                                </span>
                                <p class="text-[10px] text-primary font-semibold mt-1">Siap diunduh</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- History Table -->
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-card border border-outline-variant/20">
                    <h3 class="text-xl font-headline font-bold text-on-surface mb-5">Riwayat Surat</h3>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="border-b border-outline-variant/20">
                                    <th class="pb-3 text-xs font-bold text-on-surface-variant uppercase tracking-wider">Jenis Surat</th>
                                    <th class="pb-3 text-xs font-bold text-on-surface-variant uppercase tracking-wider hidden sm:table-cell">Tanggal Selesai</th>
                                    <th class="pb-3 text-xs font-bold text-on-surface-variant uppercase tracking-wider hidden md:table-cell">Keperluan</th>
                                    <th class="pb-3 text-right"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/10">
                                <tr class="table-row-hover">
                                    <td class="py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="material-symbols-outlined text-on-surface-variant">description</span>
                                            <span class="font-semibold text-sm text-on-surface">SKCK (Pengantar)</span>
                                        </div>
                                        <div class="sm:hidden text-xs text-on-surface-variant mt-1">15 Sep 2023</div>
                                    </td>
                                    <td class="py-4 text-sm text-on-surface-variant hidden sm:table-cell">15 Sep 2023</td>
                                    <td class="py-4 text-sm text-on-surface-variant hidden md:table-cell">Melamar Pekerjaan</td>
                                    <td class="py-4 text-right">
                                        <button class="download-btn p-2 text-primary hover:bg-primary/10 rounded-lg transition">
                                            <span class="material-symbols-outlined text-sm">download</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="table-row-hover">
                                    <td class="py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="material-symbols-outlined text-on-surface-variant">description</span>
                                            <span class="font-semibold text-sm text-on-surface">Keterangan Usaha</span>
                                        </div>
                                        <div class="sm:hidden text-xs text-on-surface-variant mt-1">02 Agu 2023</div>
                                    </td>
                                    <td class="py-4 text-sm text-on-surface-variant hidden sm:table-cell">02 Agu 2023</td>
                                    <td class="py-4 text-sm text-on-surface-variant hidden md:table-cell">Kredit Usaha Rakyat</td>
                                    <td class="py-4 text-right">
                                        <button class="download-btn p-2 text-primary hover:bg-primary/10 rounded-lg transition">
                                            <span class="material-symbols-outlined text-sm">download</span>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="table-row-hover">
                                    <td class="py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="material-symbols-outlined text-on-surface-variant">description</span>
                                            <span class="font-semibold text-sm text-on-surface">Domisili</span>
                                        </div>
                                        <div class="sm:hidden text-xs text-on-surface-variant mt-1">10 Mei 2023</div>
                                    </td>
                                    <td class="py-4 text-sm text-on-surface-variant hidden sm:table-cell">10 Mei 2023</td>
                                    <td class="py-4 text-sm text-on-surface-variant hidden md:table-cell">Buka Rekening Bank</td>
                                    <td class="py-4 text-right">
                                        <button class="download-btn p-2 text-primary hover:bg-primary/10 rounded-lg transition">
                                            <span class="material-symbols-outlined text-sm">download</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Letter Types & Help (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Help Card -->
                <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-6 text-white relative overflow-hidden shadow-large">
                    <div class="absolute -right-4 -bottom-4 opacity-10">
                        <span class="material-symbols-outlined text-7xl" style="font-variation-settings: 'FILL' 1;">help_center</span>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-2xl font-headline font-bold mb-3">Butuh Bantuan?</h3>
                        <p class="text-primary-faded text-sm mb-5 leading-relaxed">Panduan lengkap mengenai persyaratan masing-masing jenis surat dapat Anda akses di sini.</p>
                        <button class="help-guide-btn bg-white text-primary px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-stone-100 transition-all inline-flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">book</span>
                            Buka Panduan
                        </button>
                    </div>
                </div>

                <!-- Letter Types Selection -->
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-card border border-outline-variant/20">
                    <h3 class="text-lg font-headline font-bold text-on-surface mb-5">Pilih Jenis Surat</h3>
                    <div class="space-y-3">
                        <button class="letter-type-btn w-full flex items-center gap-4 p-3 rounded-xl border border-outline-variant/30 hover:border-primary hover:bg-primary/5 transition-all text-left group">
                            <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-xl">person_pin_circle</span>
                            </div>
                            <div>
                                <p class="font-bold text-sm text-on-surface">Domisili</p>
                                <p class="text-[10px] text-on-surface-variant">Pindah, Tetap, Sementara</p>
                            </div>
                        </button>
                        <button class="letter-type-btn w-full flex items-center gap-4 p-3 rounded-xl border border-outline-variant/30 hover:border-primary hover:bg-primary/5 transition-all text-left group">
                            <div class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-xl">diversity_1</span>
                            </div>
                            <div>
                                <p class="font-bold text-sm text-on-surface">Keluarga</p>
                                <p class="text-[10px] text-on-surface-variant">Lahir, Mati, Nikah</p>
                            </div>
                        </button>
                        <button class="letter-type-btn w-full flex items-center gap-4 p-3 rounded-xl border border-outline-variant/30 hover:border-primary hover:bg-primary/5 transition-all text-left group">
                            <div class="w-10 h-10 rounded-xl bg-tertiary/10 flex items-center justify-center text-tertiary group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-xl">store</span>
                            </div>
                            <div>
                                <p class="font-bold text-sm text-on-surface">Usaha (SKU)</p>
                                <p class="text-[10px] text-on-surface-variant">KUMKM, Izin Usaha</p>
                            </div>
                        </button>
                        <button class="letter-type-btn w-full flex items-center gap-4 p-3 rounded-xl border border-outline-variant/30 hover:border-primary hover:bg-primary/5 transition-all text-left group">
                            <div class="w-10 h-10 rounded-xl bg-surface-container-highest flex items-center justify-center text-on-surface-variant group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-xl">shield_person</span>
                            </div>
                            <div>
                                <p class="font-bold text-sm text-on-surface">Keterangan Lain</p>
                                <p class="text-[10px] text-on-surface-variant">Berkelakuan Baik, Ghaib</p>
                            </div>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
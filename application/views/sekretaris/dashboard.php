<!-- SCROLLABLE DASHBOARD CONTENT (Responsive Grids) -->
<div class="flex-1 p-5 md:p-8 space-y-8 overflow-y-auto">

    <!-- GREETING + QUICK STATS BENTO (fully responsive) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- welcome card with today summary -->
        <div class="lg:col-span-7 bg-gradient-to-br from-[#4a7c59] to-[#2a6038] rounded-2xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="relative z-10">
                <span class="inline-block bg-white/20 text-[10px] font-bold px-3 py-1 rounded-full backdrop-blur-sm uppercase tracking-wide">📅 Ringkasan Hari Ini</span>
                <h3 class="text-2xl md:text-3xl font-headline font-bold mt-4 leading-tight">Selamat pagi, Pak Budi</h3>
                <p class="text-white/80 text-sm md:text-base mt-2 max-w-md">Ada <span class="font-bold underline decoration-white/40">12 surat masuk</span> untuk ditandatangani, dan 3 laporan kegiatan RT perlu divalidasi.</p>
                <div class="flex flex-wrap gap-3 mt-6">
                    <button class="bg-white text-[#2a6038] px-5 py-2 rounded-xl text-sm font-bold shadow-md hover:shadow-lg transition flex items-center gap-1">
                        <span class="material-symbols-outlined text-lg">rate_review</span> Proses Surat
                    </button>
                    <button class="border border-white/30 px-5 py-2 rounded-xl text-sm font-semibold hover:bg-white/10 transition">Lihat Kalender RT</button>
                </div>
            </div>
            <div class="absolute -right-12 -bottom-12 opacity-20">
                <span class="material-symbols-outlined text-[200px]">campaign</span>
            </div>
        </div>

        <!-- right column: 2 metric cards + combined card -->
        <div class="lg:col-span-5 grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#c4c8bc]/20 card-hover">
                <div class="flex justify-between items-start">
                    <div class="w-11 h-11 rounded-xl bg-[#dcc48e]/20 flex items-center justify-center text-[#705c30]">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <span class="text-[10px] font-bold text-green-700 bg-green-50 px-2 py-0.5 rounded-full">+8%</span>
                </div>
                <p class="text-4xl font-headline font-bold mt-4">12</p>
                <p class="text-xs text-[#74796e] mt-1">Surat masuk perlu disposisi</p>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#c4c8bc]/20 card-hover">
                <div class="flex justify-between items-start">
                    <div class="w-11 h-11 rounded-xl bg-[#c8e8d0]/40 flex items-center justify-center text-[#4a7c59]">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <span class="text-[10px] font-bold text-[#4a7c59] bg-[#c8e8d0] px-2 py-0.5 rounded-full">+4 KK</span>
                </div>
                <p class="text-4xl font-headline font-bold mt-4">124</p>
                <p class="text-xs text-[#74796e] mt-1">Total jiwa terdata (RT 04)</p>
            </div>
            <div class="sm:col-span-2 bg-[#f8e0a8]/30 rounded-2xl p-5 border border-[#705c30]/20 flex items-center gap-4 card-hover">
                <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-[#705c30] shadow-sm">
                    <span class="material-symbols-outlined">assignment_late</span>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-[#2e3230]">Laporan Iuran Bulanan</p>
                    <p class="text-xs text-[#4a4e4a]">5 KK belum setor, deadline 3 hari lagi</p>
                    <div class="w-full bg-[#c4c8bc]/40 rounded-full h-1.5 mt-2">
                        <div class="bg-[#705c30] h-1.5 rounded-full w-[70%]"></div>
                    </div>
                </div>
                <span class="material-symbols-outlined text-[#705c30]">arrow_forward</span>
            </div>
        </div>
    </div>

    <!-- QUICK ACTION GRID + DATA WARGA / SURAT TERBARU -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Left: Quick Actions + Info Banner -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#c4c8bc]/20">
                <div class="flex items-center gap-2 border-b border-[#e4e0d8] pb-3 mb-4">
                    <span class="material-symbols-outlined text-[#4a7c59]">flash_on</span>
                    <h4 class="font-headline font-bold text-lg">Aksi Cepat Sekretaris</h4>
                </div>
                <div class="space-y-3">

                    <!-- Tambah Warga -->
                    <a href="<?= base_url('sekretaris/warga') ?>"
                        class="w-full flex items-center gap-4 p-3 rounded-xl bg-[#faf6f0] hover:bg-[#c8e8d0]/20 transition border border-transparent hover:border-[#4a7c59]/30 group">

                        <span class="material-symbols-outlined text-[#4a7c59]">person_add</span>

                        <div class="flex-1 text-left">
                            <p class="text-sm font-semibold">Kelola Data Warga</p>
                            <p class="text-[11px] text-[#74796e]">Tambah, edit, dan update KK/NIK</p>
                        </div>

                        <span class="material-symbols-outlined text-[#74796e] text-sm group-hover:translate-x-1 transition">
                            chevron_right
                        </span>
                    </a>

                    <!-- Buat / Cetak Surat -->
                    <a href="<?= base_url('sekretaris/surat') ?>"
                        class="w-full flex items-center gap-4 p-3 rounded-xl bg-[#faf6f0] hover:bg-[#c8e8d0]/20 transition group">

                        <span class="material-symbols-outlined text-[#4a7c59]">description</span>

                        <div class="flex-1 text-left">
                            <p class="text-sm font-semibold">Buat & Kelola Surat</p>
                            <p class="text-[11px] text-[#74796e]">Draft, edit, dan cetak surat RT</p>
                        </div>

                        <span class="material-symbols-outlined text-[#74796e] text-sm group-hover:translate-x-1 transition">
                            chevron_right
                        </span>
                    </a>

                    <!-- Verifikasi Domisili -->
                    <a href="<?= base_url('sekretaris/verifikasi') ?>"
                        class="w-full flex items-center gap-4 p-3 rounded-xl bg-[#fff3e0] hover:bg-[#ffe0b2] transition border border-[#f0c36d]/30 group">

                        <span class="material-symbols-outlined text-[#b26a00]">fact_check</span>

                        <div class="flex-1 text-left">
                            <p class="text-sm font-semibold text-[#5c3d00]">Verifikasi Surat</p>
                            <p class="text-[11px] text-[#7a5a1a]">Validasi data sebelum ACC RT</p>
                        </div>

                        <span class="material-symbols-outlined text-[#7a5a1a] text-sm group-hover:translate-x-1 transition">
                            chevron_right
                        </span>
                    </a>

                </div>
            </div>

            <!-- Banner informasi jadwal ronda -->
            <div class="bg-gradient-to-r from-[#f0ece4] to-white rounded-2xl p-5 border-l-8 border-[#705c30] shadow-sm">
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-3xl text-[#705c30]">night_shelter</span>
                    <div>
                        <p class="text-sm font-bold">Jadwal Ronda Malam</p>
                        <p class="text-xs text-[#4a4e4a] mt-1">Minggu, 4 Mei 2026 · Kelompok B (RT 04 RW 02)</p>
                        <div class="mt-2 flex flex-wrap gap-2 text-[10px] font-bold"><span class="bg-white px-2 py-1 rounded-full shadow-sm">🕙 20.00 WIB</span><span class="bg-[#c8e8d0] px-2 py-1 rounded-full">Pos Ronda Timur</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Buku Induk Warga / Tabel interaktif -->
        <div class="lg:col-span-8 space-y-5">
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                    <div class="w-1 h-6 bg-[#4a7c59] rounded-full"></div>
                    <h3 class="font-headline font-bold text-xl">📖 Buku Induk Warga (RT 04)</h3>
                </div>
                <button class="text-xs font-bold text-[#4a7c59] bg-[#c8e8d0]/30 px-3 py-1.5 rounded-full flex items-center gap-1">Lihat Semua <span class="material-symbols-outlined text-sm">arrow_forward</span></button>
            </div>

            <div class="bg-white rounded-2xl border border-[#c4c8bc]/20 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-[#f0ece4] text-[#4a4e4a]">
                            <tr>
                                <th class="px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider">Warga</th>
                                <th class="px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider">NIK / KK</th>
                                <th class="px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider">RT/RW</th>
                                <th class="px-5 py-4 text-center text-[11px] font-bold uppercase tracking-wider">Status</th>
                                <th class="px-5 py-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e4e0d8]">
                            <tr class="hover:bg-[#c8e8d0]/10 transition group">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#c8e8d0] flex items-center justify-center font-bold text-[#2a6038]">AD</div>
                                        <div>
                                            <p class="font-semibold">Ahmad Dahlan</p>
                                            <p class="text-[10px] text-[#74796e]">Kepala Keluarga</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-xs font-mono">3271040812700001<br><span class="text-[10px] text-[#74796e]">KK: 3210xxx</span></td>
                                <td class="px-5 py-4">RT 04 / RW 02</td>
                                <td class="px-5 py-4 text-center"><span class="bg-[#c8e8d0] text-[#2a6038] text-[10px] font-bold px-2 py-1 rounded-full">Warga Tetap</span></td>
                                <td class="px-5 py-4 text-right opacity-0 group-hover:opacity-100 transition"><button class="p-1 rounded-md hover:bg-[#e4e0d8]"><span class="material-symbols-outlined text-base">edit</span></button></td>
                            </tr>
                            <tr class="hover:bg-[#c8e8d0]/10 transition group">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#dcc48e]/30 flex items-center justify-center font-bold">SA</div>
                                        <div>
                                            <p class="font-semibold">Siti Aminah</p>
                                            <p class="text-[10px] text-[#74796e]">IRT</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-xs font-mono">3271044405920005</td>
                                <td class="px-5 py-4">RT 04 / RW 02</td>
                                <td class="px-5 py-4 text-center"><span class="bg-[#c8e8d0] text-[#2a6038] text-[10px] font-bold px-2 py-1 rounded-full">Warga Tetap</span></td>
                                <td class="px-5 py-4 text-right opacity-0 group-hover:opacity-100 transition"><button class="p-1 rounded-md hover:bg-[#e4e0d8]"><span class="material-symbols-outlined text-base">edit</span></button></td>
                            </tr>
                            <tr class="hover:bg-[#c8e8d0]/10 transition group">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#e4e0d8] flex items-center justify-center">EP</div>
                                        <div>
                                            <p class="font-semibold">Eko Prasetyo</p>
                                            <p class="text-[10px] text-[#74796e]">Karyawan</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-xs font-mono">3271041109880003</td>
                                <td class="px-5 py-4">RT 04 / RW 02</td>
                                <td class="px-5 py-4 text-center"><span class="bg-[#f0ece4] text-[#6b6358] text-[10px] font-bold px-2 py-1 rounded-full">Pendatang</span></td>
                                <td class="px-5 py-4 text-right opacity-0 group-hover:opacity-100 transition"><button class="p-1 rounded-md hover:bg-[#e4e0d8]"><span class="material-symbols-outlined text-base">edit</span></button></td>
                            </tr>
                            <tr class="hover:bg-[#c8e8d0]/10 transition group bg-[#faf6f0]">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-[#c8e8d0] flex items-center justify-center">SN</div>
                                        <div>
                                            <p class="font-semibold">Siti Nurhaliza</p>
                                            <p class="text-[10px] text-[#74796e]">Mahasiswa</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-xs font-mono">3271046508030002</td>
                                <td class="px-5 py-4">RT 04 / RW 02</td>
                                <td class="px-5 py-4 text-center"><span class="bg-[#c8e8d0] text-[#2a6038] text-[10px] font-bold px-2 py-1 rounded-full">Warga Tetap</span></td>
                                <td class="px-5 py-4 text-right opacity-0 group-hover:opacity-100 transition"><button class="p-1 rounded-md hover:bg-[#e4e0d8]"><span class="material-symbols-outlined text-base">edit</span></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 bg-[#faf6f0]/60 border-t border-[#e4e0d8] flex justify-between items-center text-xs">
                    <span class="text-[#74796e]">Menampilkan 4 dari 48 KK terdaftar</span>
                    <div class="flex gap-2"><button class="px-3 py-1 rounded-lg bg-white border shadow-sm text-sm disabled:opacity-40" disabled>Prev</button><button class="px-3 py-1 rounded-lg bg-[#4a7c59] text-white shadow-sm">1</button><button class="px-3 py-1 rounded-lg bg-white border">2</button><button class="px-3 py-1 rounded-lg bg-white border">Next</button></div>
                </div>
            </div>

            <!-- Ringkasan Surat terbaru (responsive) -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#c4c8bc]/20">
                <div class="flex justify-between items-center mb-3">
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-[#705c30]">draft</span>
                        <h4 class="font-bold">Pengajuan Surat Terbaru</h4>
                    </div>
                    <span class="text-[10px] text-[#4a7c59] font-bold">Lihat semua</span>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center gap-2 border-b border-dashed pb-2">
                        <div>
                            <p class="text-sm font-medium">Surat Keterangan Domisili</p>
                            <p class="text-[10px] text-[#74796e]">Ahmad Dahlan · 28 Apr 2026</p>
                        </div><span class="bg-[#f8e0a8] text-[#554020] text-[10px] font-bold px-2 py-1 rounded-full">Proses</span>
                    </div>
                    <div class="flex justify-between items-center gap-2 border-b border-dashed pb-2">
                        <div>
                            <p class="text-sm font-medium">Surat Keterangan Usaha</p>
                            <p class="text-[10px] text-[#74796e]">Siti Aminah · 29 Apr 2026</p>
                        </div><span class="bg-[#c8e8d0] text-[#2a6038] text-[10px] font-bold px-2 py-1 rounded-full">Siap Ttd</span>
                    </div>
                    <div class="flex justify-between items-center gap-2">
                        <div>
                            <p class="text-sm font-medium">SKTM (Bantuan)</p>
                            <p class="text-[10px] text-[#74796e]">Eko Prasetyo · 27 Apr 2026</p>
                        </div><span class="bg-[#ffdad8] text-[#690005] text-[10px] font-bold px-2 py-1 rounded-full">Perlu Verifikasi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-10 md:h-16"></div>
</div>
</main>
</div>
<!-- SCROLLABLE DASHBOARD CONTENT (Responsive Grids) -->
<div class="flex-1 p-5 md:p-8 space-y-8 overflow-y-auto">

    <!-- GREETING + QUICK STATS BENTO (fully responsive) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- welcome card with today summary -->
        <div class="lg:col-span-7 bg-gradient-to-br from-[#4a7c59] to-[#2a6038] rounded-2xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
            <div class="relative z-10">
                <span class="inline-block bg-white/20 text-[10px] font-bold px-3 py-1 rounded-full backdrop-blur-sm uppercase tracking-wide">Ringkasan Hari Ini</span>
                <h3 class="text-2xl md:text-3xl font-headline font-bold mt-4 leading-tight">Selamat pagi, <?= htmlspecialchars($this->session->userdata('name')) ?></h3>
                <p class="text-white/80 text-sm md:text-base mt-2 max-w-md">Ada <span class="font-bold underline decoration-white/40"><?= $pending_letters ?> surat masuk</span> untuk ditandatangani, dan <?= $total_reports ?> laporan kegiatan RT perlu divalidasi.</p>
                <div class="flex flex-wrap gap-3 mt-6">
                    <a href="<?= base_url('sekretaris/surat') ?>" class="bg-white text-[#2a6038] px-5 py-2 rounded-xl text-sm font-bold shadow-md hover:shadow-lg transition flex items-center gap-1">
                        <span class="material-symbols-outlined text-lg">rate_review</span> Proses Surat
                    </a>
                    <a href="<?= base_url('sekretaris/pengumuman') ?>" class="border border-white/30 px-5 py-2 rounded-xl text-sm font-semibold hover:bg-white/10 transition">Lihat Pengumuman</a>
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
                </div>
                <p class="text-4xl font-headline font-bold mt-4"><?= $pending_letters ?></p>
                <p class="text-xs text-[#74796e] mt-1">Surat masuk perlu disposisi</p>
            </div>
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#c4c8bc]/20 card-hover">
                <div class="flex justify-between items-start">
                    <div class="w-11 h-11 rounded-xl bg-[#c8e8d0]/40 flex items-center justify-center text-[#4a7c59]">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                </div>
                <p class="text-4xl font-headline font-bold mt-4"><?= $total_warga ?></p>
                <p class="text-xs text-[#74796e] mt-1">Total warga terdata</p>
            </div>
            <div class="sm:col-span-2 bg-[#f8e0a8]/30 rounded-2xl p-5 border border-[#705c30]/20 flex items-center gap-4 card-hover">
                <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-[#705c30] shadow-sm">
                    <span class="material-symbols-outlined">assignment_late</span>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-bold text-[#2e3230]">Laporan Iuran Bulanan</p>
                    <p class="text-xs text-[#4a4e4a]"><?= $total_reports ?> total laporan tercatat</p>
                    <div class="w-full bg-[#c4c8bc]/40 rounded-full h-1.5 mt-2">
                        <div class="bg-[#705c30] h-1.5 rounded-full" style="width: <?= $total_reports > 0 ? min(100, ($total_reports * 4)) : 0 ?>%"></div>
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

                    <a href="<?= base_url('sekretaris/surat') ?>"
                        class="w-full flex items-center gap-4 p-3 rounded-xl bg-[#faf6f0] hover:bg-[#c8e8d0]/20 transition border border-transparent hover:border-[#4a7c59]/30 group">

                        <span class="material-symbols-outlined text-[#4a7c59]">person_add</span>

                        <div class="flex-1 text-left">
                            <p class="text-sm font-semibold">Kelola Data Warga</p>
                            <p class="text-[11px] text-[#74796e]">Lihat & kelola pengajuan surat</p>
                        </div>

                        <span class="material-symbols-outlined text-[#74796e] text-sm group-hover:translate-x-1 transition">
                            chevron_right
                        </span>
                    </a>

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

                    <a href="<?= base_url('sekretaris/laporan') ?>"
                        class="w-full flex items-center gap-4 p-3 rounded-xl bg-[#fff3e0] hover:bg-[#ffe0b2] transition border border-[#f0c36d]/30 group">

                        <span class="material-symbols-outlined text-[#b26a00]">fact_check</span>

                        <div class="flex-1 text-left">
                            <p class="text-sm font-semibold text-[#5c3d00]">Lihat Laporan</p>
                            <p class="text-[11px] text-[#7a5a1a]">Pantau laporan warga</p>
                        </div>

                        <span class="material-symbols-outlined text-[#7a5a1a] text-sm group-hover:translate-x-1 transition">
                            chevron_right
                        </span>
                    </a>

                </div>
            </div>

            <div class="bg-gradient-to-r from-[#f0ece4] to-white rounded-2xl p-5 border-l-8 border-[#705c30] shadow-sm">
                <div class="flex gap-3">
                    <span class="material-symbols-outlined text-3xl text-[#705c30]">night_shelter</span>
                    <div>
                        <p class="text-sm font-bold">Jadwal Ronda Malam</p>
                        <p class="text-xs text-[#4a4e4a] mt-1"><?= date('l, d M Y') ?> · Kelompok B (RT 04 RW 02)</p>
                        <div class="mt-2 flex flex-wrap gap-2 text-[10px] font-bold"><span class="bg-white px-2 py-1 rounded-full shadow-sm">20.00 WIB</span><span class="bg-[#c8e8d0] px-2 py-1 rounded-full">Pos Ronda Timur</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Buku Induk Warga / Tabel interaktif -->
        <div class="lg:col-span-8 space-y-5">
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                    <div class="w-1 h-6 bg-[#4a7c59] rounded-full"></div>
                    <h3 class="font-headline font-bold text-xl">Buku Induk Warga</h3>
                </div>
                <span class="text-xs font-bold text-[#4a7c59] bg-[#c8e8d0]/30 px-3 py-1.5 rounded-full flex items-center gap-1"><?= min(6, count($users ?? [])) ?> / <?= count($users ?? 0) ?> warga</span>
            </div>

            <div class="bg-white rounded-2xl border border-[#c4c8bc]/20 overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-[#f0ece4] text-[#4a4e4a]">
                            <tr>
                                <th class="px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider">Warga</th>
                                <th class="px-5 py-4 text-left text-[11px] font-bold uppercase tracking-wider">NIK / KK</th>
                                <th class="px-5 py-4 text-center text-[11px] font-bold uppercase tracking-wider">Status</th>
                                <th class="px-5 py-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e4e0d8]">
                            <?php if (!empty($users)) : ?>
                                <?php foreach (array_slice($users, 0, 6) as $i => $user) : ?>
                                    <tr class="hover:bg-[#c8e8d0]/10 transition group <?= $i % 2 === 0 ? '' : 'bg-[#faf6f0]' ?>">
                                        <td class="px-5 py-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-[#c8e8d0] flex items-center justify-center font-bold text-[#2a6038] text-xs"><?= strtoupper(substr(htmlspecialchars($user->head_name ?? 'U'), 0, 2)) ?></div>
                                                <div>
                                                    <p class="font-semibold"><?= htmlspecialchars($user->head_name ?? '-') ?></p>
                                                    <p class="text-[10px] text-[#74796e]"><?= htmlspecialchars($user->address ?? '') ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 text-xs font-mono"><?= htmlspecialchars($user->nik ?? '-') ?></td>
                                        <td class="px-5 py-4 text-center">
                                            <span class="<?= ($user->role ?? '') === 'warga' ? 'bg-[#c8e8d0] text-[#2a6038]' : 'bg-[#f0ece4] text-[#6b6358]' ?> text-[10px] font-bold px-2 py-1 rounded-full">
                                                <?= htmlspecialchars(ucfirst($user->role ?? 'warga')) ?>
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 text-right opacity-0 group-hover:opacity-100 transition"><button class="p-1 rounded-md hover:bg-[#e4e0d8]"><span class="material-symbols-outlined text-base">edit</span></button></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="px-5 py-8 text-center text-sm text-[#74796e]">Belum ada data warga</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 bg-[#faf6f0]/60 border-t border-[#e4e0d8] flex justify-between items-center text-xs">
                    <span class="text-[#74796e]">Menampilkan <?= min(6, count($users ?? [])) ?> dari <?= count($users ?? 0) ?> warga terdaftar</span>
                </div>
            </div>

            <!-- Ringkasan Surat terbaru (responsive) -->
            <div class="bg-white rounded-2xl p-5 shadow-sm border border-[#c4c8bc]/20">
                <div class="flex justify-between items-center mb-3">
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-[#705c30]">draft</span>
                        <h4 class="font-bold">Pengajuan Surat Terbaru</h4>
                    </div>
                    <a href="<?= base_url('sekretaris/surat') ?>" class="text-[10px] text-[#4a7c59] font-bold">Lihat semua</a>
                </div>
                <div class="space-y-3">
                    <?php if (!empty($recent_letters)) : ?>
                        <?php foreach (array_slice($recent_letters, 0, 3) as $letter) : ?>
                            <div class="flex justify-between items-center gap-2 border-b border-dashed pb-2 last:border-0">
                                <div>
                                    <p class="text-sm font-medium"><?= htmlspecialchars($letter->type ?? '-') ?></p>
                                    <p class="text-[10px] text-[#74796e]"><?= htmlspecialchars($letter->head_name ?? '-') ?> · <?= date('d M Y', strtotime($letter->created_at ?? 'now')) ?></p>
                                </div>
                                <?php
                                $status = $letter->status ?? 'pending';
                                $badge = match($status) {
                                    'pending' => 'bg-[#f8e0a8] text-[#554020]',
                                    'diproses' => 'bg-[#c8e8d0] text-[#2a6038]',
                                    'selesai' => 'bg-[#c8e8d0] text-[#2a6038]',
                                    'ditolak' => 'bg-[#ffdad8] text-[#690005]',
                                    default => 'bg-[#f8e0a8] text-[#554020]'
                                };
                                ?>
                                <span class="<?= $badge ?> text-[10px] font-bold px-2 py-1 rounded-full"><?= htmlspecialchars(ucfirst($status)) ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-sm text-[#74796e] text-center py-4">Belum ada pengajuan surat</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="h-10 md:h-16"></div>
</div>

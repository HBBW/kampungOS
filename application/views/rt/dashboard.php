<!-- Content Canvas -->
<div class="flex-1 p-5 md:p-8 max-w-full mx-auto w-full pb-28 md:pb-8 animate-fade-in">
    <!-- Greeting -->
    <div class="mb-8">
        <p class="text-tertiary font-semibold text-sm uppercase tracking-wide mb-1">✨ Jum'at, 25 April 2026</p>
        <h2 class="text-3xl md:text-4xl font-headline font-bold text-on-surface">Halo, Pak <?= $this->session->userdata('name') ?> 👋</h2>
        <p class="text-on-surface-variant mt-1">Pantau aktivitas warga dan kelola layanan digital dalam satu genggaman.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
            <div class="flex justify-between items-start mb-3">
                <div class="p-2.5 rounded-xl bg-primary-faded text-primary">
                    <span class="material-symbols-outlined text-2xl">groups</span>
                </div>
                <span class="text-[11px] font-bold bg-emerald-50 text-primary-dark px-2 py-0.5 rounded-full">+12</span>
            </div>
            <p class="text-on-surface-variant text-sm font-semibold uppercase tracking-wide">Total Warga</p>
            <h3 class="text-3xl font-bold mt-1">1.248</h3>
            <p class="text-xs text-on-surface-variant/70 mt-2">412 KK terdaftar</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
            <div class="flex justify-between items-start mb-3">
                <div class="p-2.5 rounded-xl bg-tertiary/10 text-tertiary">
                    <span class="material-symbols-outlined text-2xl">report_problem</span>
                </div>
                <span class="text-[11px] font-bold bg-error/10 text-error px-2 py-0.5 rounded-full">butuh respon</span>
            </div>
            <p class="text-on-surface-variant text-sm font-semibold uppercase tracking-wide">Laporan Pending</p>
            <h3 class="text-3xl font-bold mt-1">12</h3>
            <p class="text-xs text-on-surface-variant/70 mt-2">3 darurat, 9 prioritas</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
            <div class="p-2.5 rounded-xl bg-secondary/10 text-secondary mb-3">
                <span class="material-symbols-outlined text-2xl">history_edu</span>
            </div>
            <p class="text-on-surface-variant text-sm font-semibold uppercase tracking-wide">Surat Aktif</p>
            <h3 class="text-3xl font-bold mt-1">4</h3>
            <p class="text-xs text-on-surface-variant/70 mt-2">menunggu paraf digital</p>
        </div>

        <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-6 shadow-card text-white relative overflow-hidden card-hover">
            <div class="absolute right-0 top-0 opacity-10 -translate-y-2 translate-x-4"><span class="material-symbols-outlined text-7xl">account_balance_wallet</span></div>
            <div class="flex justify-between items-start relative z-10">
                <div class="p-2 rounded-xl bg-white/20">
                    <span class="material-symbols-outlined">savings</span>
                </div>
                <span class="material-symbols-outlined opacity-60">trending_up</span>
            </div>
            <p class="text-white/80 text-sm font-semibold uppercase tracking-wide mt-4 relative z-10">Kas RT</p>
            <h3 class="text-2xl font-bold mt-1 relative z-10">Rp 12.500.000</h3>
            <p class="text-white/70 text-xs mt-1 relative z-10">+Rp 750.000 bulan ini</p>
        </div>
    </div>

    <!-- Main 2-Column Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-7">
            <!-- Approval Queue -->
            <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                <div class="flex flex-wrap justify-between items-center p-5 border-b border-outline-variant/20">
                    <h3 class="text-xl font-headline font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">rule</span>
                        Antrean Persetujuan Surat
                    </h3>
                    <a href="<?= base_url('rt/surat') ?>"><button class="text-primary text-sm font-semibold hover:underline flex items-center gap-1">Lihat semua <span class="material-symbols-outlined text-sm">arrow_forward</span></button></a>
                </div>
                <div class="p-5 space-y-4">
                    <!-- Item 1 -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-surface-container-low rounded-xl border border-outline-variant/30 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">BD</div>
                            <div>
                                <p class="font-bold">Bambang Darmawan</p>
                                <p class="text-xs text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">description</span> Surat Domisili • 2 jam lalu</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="px-4 py-2 rounded-xl bg-surface-container-highest text-on-surface-variant font-semibold text-sm hover:bg-outline-variant/30 transition">Detail</button>
                            <button class="px-4 py-2 rounded-xl bg-primary text-white font-semibold text-sm hover:bg-primary-dark transition btn-action flex items-center gap-1"><span class="material-symbols-outlined text-sm">draw</span> TTD</button>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-surface-container-low rounded-xl border border-outline-variant/30 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-full bg-secondary/10 flex items-center justify-center text-secondary font-bold">SR</div>
                            <div>
                                <p class="font-bold">Siti Rahayu</p>
                                <p class="text-xs text-on-surface-variant"><span class="material-symbols-outlined text-[14px]">storefront</span> Surat Keterangan Usaha • 5 jam lalu</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="px-4 py-2 rounded-xl bg-surface-container-highest text-on-surface-variant font-semibold text-sm hover:bg-outline-variant/30 transition">Detail</button>
                            <button class="px-4 py-2 rounded-xl bg-primary text-white font-semibold text-sm hover:bg-primary-dark transition btn-action flex items-center gap-1"><span class="material-symbols-outlined text-sm">draw</span> TTD</button>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-surface-container-low/50 rounded-xl border border-dashed border-outline-variant/40 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-full bg-surface-container-highest flex items-center justify-center text-on-surface-variant font-bold">AH</div>
                            <div>
                                <p class="font-bold">Ahmad Hidayat</p>
                                <p class="text-xs text-on-surface-variant"><span class="material-symbols-outlined text-[14px]">health_and_safety</span> Surat Kematian • Kemarin</p>
                            </div>
                        </div>
                        <button class="px-4 py-2 rounded-xl bg-surface-container-highest text-on-surface-variant font-semibold text-sm">Proses</button>
                    </div>
                </div>
            </div>

            <!-- Feature Card -->
            <div class="relative overflow-hidden rounded-2xl h-56 flex items-end p-7 shadow-card group">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 brightness-90" alt="Kampung asri" src="https://images.unsplash.com/photo-1601024445112-55cf6078b8e9?w=800&h=500&fit=crop">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <div class="relative z-10 text-white">
                    <span class="bg-primary/90 text-white text-[11px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wide">Program Unggulan</span>
                    <h4 class="text-2xl font-bold mt-2">Taman Posyandu & Bank Sampah Digital</h4>
                    <p class="text-sm text-white/80 mt-1">Partisipasi warga meningkat 34%</p>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-surface-container-low rounded-2xl p-6 shadow-card border border-outline-variant/20">
                <h3 class="text-lg font-headline font-bold flex items-center gap-2 mb-5">
                    <span class="material-symbols-outlined text-primary">bolt</span> Aksi Cepat
                </h3>
                <div class="space-y-3">
                    <button class="w-full flex items-center gap-4 p-3 bg-white rounded-xl border border-outline-variant/20 hover:shadow-md transition btn-action">
                        <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                            <span class="material-symbols-outlined">draw</span>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-sm">Tanda Tangan Digital</p>
                            <p class="text-[11px] text-on-surface-variant">Selesaikan draft surat</p>
                        </div>
                    </button>
                    <button class="w-full flex items-center gap-4 p-3 bg-white rounded-xl border border-outline-variant/20 hover:shadow-md transition btn-action">
                        <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                            <span class="material-symbols-outlined">send</span>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-sm">Broadcast Info</p>
                            <p class="text-[11px] text-on-surface-variant">Kirim pesan massal ke grup</p>
                        </div>
                    </button>
                    <button class="w-full flex items-center gap-4 p-3 bg-white rounded-xl border border-outline-variant/20 hover:shadow-md transition btn-action">
                        <div class="p-2.5 rounded-xl bg-primary/10 text-primary">
                            <span class="material-symbols-outlined">calendar_add_on</span>
                        </div>
                        <div class="text-left">
                            <p class="font-bold text-sm">Jadwal Rapat</p>
                            <p class="text-[11px] text-on-surface-variant">Buat agenda warga online</p>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Schedule -->
            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-headline font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">event_available</span> Jadwal Mendatang
                    </h3>
                </div>
                <div class="space-y-4">
                    <div class="flex gap-4 items-center">
                        <div class="flex flex-col items-center justify-center min-w-[52px] h-14 bg-tertiary/10 text-tertiary rounded-xl font-bold">
                            <span class="text-[11px] uppercase">Apr</span>
                            <span class="text-xl">28</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Rapat Koordinasi RT/RW</p>
                            <p class="text-xs text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">schedule</span> 19.30 WIB</p>
                        </div>
                    </div>
                    <div class="flex gap-4 items-center">
                        <div class="flex flex-col items-center justify-center min-w-[52px] h-14 bg-primary/10 text-primary-dark rounded-xl font-bold">
                            <span class="text-[11px] uppercase">Mei</span>
                            <span class="text-xl">03</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold">Kerja Bakti & Penanaman Pohon</p>
                            <p class="text-xs text-on-surface-variant flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">park</span> 07.00 - 10.00</p>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-5 pt-3 border-t border-outline-variant/20 text-primary font-semibold text-sm flex items-center justify-center gap-1 py-2 hover:bg-primary/5 rounded-xl transition">Lihat semua <span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
        </div>
    </div>
</div>
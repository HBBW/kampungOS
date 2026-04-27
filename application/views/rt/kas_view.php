<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="w-full">
        <!-- Header Section -->
        <div class="mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Laporan Keuangan</h2>
            <p class="text-on-surface-variant text-sm sm:text-base mt-1">Pantau arus kas dan kelola keuangan lingkungan</p>
        </div>

        <!-- Summary Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
            <!-- Total Saldo Card -->
            <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-6 text-white relative overflow-hidden card-hover">
                <div class="absolute -right-4 -bottom-4 opacity-10">
                    <span class="material-symbols-outlined text-8xl">account_balance</span>
                </div>
                <div class="relative z-10">
                    <p class="text-primary-faded text-xs font-semibold uppercase tracking-wide opacity-80">Total Saldo Kas</p>
                    <div class="flex items-baseline gap-1 mt-1">
                        <span class="text-sm font-semibold opacity-80">Rp</span>
                        <h3 class="text-3xl font-bold">124.500.000</h3>
                    </div>
                    <div class="mt-4 flex items-center gap-2 bg-white/10 w-fit px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-sm">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        <span>+12.4% vs bulan lalu</span>
                    </div>
                </div>
            </div>

            <!-- Pemasukan Card -->
            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Pemasukan (Bulan Ini)</p>
                <div class="flex items-baseline gap-1 mt-1">
                    <span class="text-sm text-on-surface-variant">Rp</span>
                    <h3 class="text-3xl font-bold text-primary">45.230.000</h3>
                </div>
                <div class="mt-4">
                    <div class="h-1.5 w-full bg-surface-container-low rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full" style="width: 75%"></div>
                    </div>
                    <p class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wide mt-2">75% dari target iuran</p>
                </div>
            </div>

            <!-- Pengeluaran Card -->
            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Pengeluaran (Bulan Ini)</p>
                <div class="flex items-baseline gap-1 mt-1">
                    <span class="text-sm text-on-surface-variant">Rp</span>
                    <h3 class="text-3xl font-bold text-error">12.890.000</h3>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-primary/20 border-2 border-white flex items-center justify-center text-[10px] font-bold text-primary">K</div>
                        <div class="w-8 h-8 rounded-full bg-secondary/20 border-2 border-white flex items-center justify-center text-[10px] font-bold text-secondary">P</div>
                        <div class="w-8 h-8 rounded-full bg-surface-container-highest border-2 border-white flex items-center justify-center text-[10px] font-bold">+2</div>
                    </div>
                    <span class="text-[10px] font-semibold text-on-surface-variant uppercase">Top: Kebersihan</span>
                </div>
            </div>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <!-- LEFT COLUMN: Transaction History (8 cols) -->
            <div class="lg:col-span-8 space-y-5">
                <!-- Header dengan Tombol -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h3 class="text-xl font-headline font-bold text-on-surface">Mutasi Kas</h3>
                        <p class="text-sm text-on-surface-variant">Rekaman arus kas masuk dan keluar</p>
                    </div>
                    <?php if ($this->session->userdata('role') === 'rt') : ?>
                        <div class="flex gap-2">
                            <button class="filter-btn p-2.5 rounded-xl bg-white border border-outline-variant/40 text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                                <span class="material-symbols-outlined text-lg">filter_list</span>
                            </button>
                            <button class="add-transaction-btn flex items-center gap-2 px-4 py-2.5 bg-primary text-white rounded-xl font-semibold text-sm shadow-md hover:bg-primary-dark transition-all btn-action">
                                <span class="material-symbols-outlined text-sm">add</span>
                                Transaksi
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Transactions Card -->
                <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                    <!-- Date Group: 12 Juni 2024 -->
                    <div class="bg-surface-container-low/50 px-4 sm:px-6 py-3 border-b border-outline-variant/20">
                        <span class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Rabu, 12 Juni 2024</span>
                    </div>

                    <div class="divide-y divide-outline-variant/20">
                        <!-- Transaction 1 - Income -->
                        <div class="transaction-row px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-start gap-3">
                                <span class="text-[10px] font-bold text-on-surface-variant mt-1">09:15</span>
                                <div>
                                    <p class="font-bold text-sm text-on-surface">Iuran Kebersihan - Blok A No. 12</p>
                                    <div class="flex flex-wrap items-center gap-2 mt-1">
                                        <span class="text-[9px] font-bold text-primary uppercase bg-primary/10 px-2 py-0.5 rounded">Transfer</span>
                                        <span class="text-[10px] text-on-surface-variant italic">Ref: 09282331</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right sm:text-left">
                                <p class="text-base font-bold text-success">+ Rp 150.000</p>
                                <p class="text-[9px] font-semibold text-on-surface-variant uppercase tracking-wider">Saldo: 124.500.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Date Group: 11 Juni 2024 -->
                    <div class="bg-surface-container-low/50 px-4 sm:px-6 py-3 border-y border-outline-variant/20">
                        <span class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Selasa, 11 Juni 2024</span>
                    </div>

                    <div class="divide-y divide-outline-variant/20">
                        <!-- Transaction 2 - Expense -->
                        <div class="transaction-row px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-start gap-3">
                                <span class="text-[10px] font-bold text-on-surface-variant mt-1">16:40</span>
                                <div>
                                    <p class="font-bold text-sm text-on-surface">Gaji Petugas Keamanan (3 Orang)</p>
                                    <div class="flex flex-wrap items-center gap-2 mt-1">
                                        <span class="text-[9px] font-bold text-error uppercase bg-error/10 px-2 py-0.5 rounded">Operasional</span>
                                        <span class="text-[10px] text-on-surface-variant italic">Periode: Jun-2024</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right sm:text-left">
                                <p class="text-base font-bold text-error">- Rp 7.500.000</p>
                                <p class="text-[9px] font-semibold text-on-surface-variant uppercase tracking-wider">Saldo: 124.350.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Date Group: 10 Juni 2024 -->
                    <div class="bg-surface-container-low/50 px-4 sm:px-6 py-3 border-y border-outline-variant/20">
                        <span class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Senin, 10 Juni 2024</span>
                    </div>

                    <div class="divide-y divide-outline-variant/20">
                        <!-- Transaction 3 - Expense -->
                        <div class="transaction-row px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-start gap-3">
                                <span class="text-[10px] font-bold text-on-surface-variant mt-1">11:20</span>
                                <div>
                                    <p class="font-bold text-sm text-on-surface">Perbaikan Pipa Air Fasum Taman</p>
                                    <div class="flex flex-wrap items-center gap-2 mt-1">
                                        <span class="text-[9px] font-bold text-on-surface-variant uppercase bg-surface-container-highest px-2 py-0.5 rounded">Maintenance</span>
                                        <span class="text-[10px] text-on-surface-variant italic">Ket: Darurat</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right sm:text-left">
                                <p class="text-base font-bold text-error">- Rp 850.000</p>
                                <p class="text-[9px] font-semibold text-on-surface-variant uppercase tracking-wider">Saldo: 131.850.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Date Group: 09 Juni 2024 -->
                    <div class="bg-surface-container-low/50 px-4 sm:px-6 py-3 border-y border-outline-variant/20">
                        <span class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider">Minggu, 09 Juni 2024</span>
                    </div>

                    <div class="divide-y divide-outline-variant/20">
                        <!-- Transaction 4 - Income -->
                        <div class="transaction-row px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-start gap-3">
                                <span class="text-[10px] font-bold text-on-surface-variant mt-1">08:00</span>
                                <div>
                                    <p class="font-bold text-sm text-on-surface">Iuran Tahunan Lapangan Tenis</p>
                                    <div class="flex flex-wrap items-center gap-2 mt-1">
                                        <span class="text-[9px] font-bold text-primary uppercase bg-primary/10 px-2 py-0.5 rounded">Fasum</span>
                                        <span class="text-[10px] text-on-surface-variant italic">Unit: Blok B/C</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right sm:text-left">
                                <p class="text-base font-bold text-success">+ Rp 2.500.000</p>
                                <p class="text-[9px] font-semibold text-on-surface-variant uppercase tracking-wider">Saldo: 132.700.000</p>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="px-4 sm:px-6 py-4 bg-surface-container-low/30 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-t border-outline-variant/20">
                        <p class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wider text-center sm:text-left">Menampilkan 4 dari 142 transaksi</p>
                        <div class="flex justify-center gap-1">
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition">
                                <span class="material-symbols-outlined text-sm">chevron_left</span>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold">1</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition text-xs font-semibold">2</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition text-xs font-semibold">3</button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition">
                                <span class="material-symbols-outlined text-sm">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Charts & Distribution (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Trend Chart Card -->
                <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20">
                    <h4 class="font-headline font-bold text-on-surface text-lg mb-5">Tren Bulanan</h4>
                    <div class="flex items-end justify-between h-32 gap-2 sm:gap-3 px-1">
                        <div class="flex-1 bg-surface-container-highest rounded-t-lg hover:bg-primary/30 transition-all chart-bar" style="height: 40%"></div>
                        <div class="flex-1 bg-surface-container-highest rounded-t-lg hover:bg-primary/30 transition-all chart-bar" style="height: 55%"></div>
                        <div class="flex-1 bg-surface-container-highest rounded-t-lg hover:bg-primary/30 transition-all chart-bar" style="height: 70%"></div>
                        <div class="flex-1 bg-surface-container-highest rounded-t-lg hover:bg-primary/30 transition-all chart-bar" style="height: 45%"></div>
                        <div class="flex-1 bg-surface-container-highest rounded-t-lg hover:bg-primary/30 transition-all chart-bar" style="height: 65%"></div>
                        <div class="flex-1 bg-primary rounded-t-lg shadow-lg shadow-primary/30 chart-bar" style="height: 85%"></div>
                    </div>
                    <div class="flex justify-between mt-4 px-1">
                        <span class="text-[9px] font-bold text-on-surface-variant uppercase">Jan</span>
                        <span class="text-[9px] font-bold text-on-surface-variant uppercase">Feb</span>
                        <span class="text-[9px] font-bold text-on-surface-variant uppercase">Mar</span>
                        <span class="text-[9px] font-bold text-on-surface-variant uppercase">Apr</span>
                        <span class="text-[9px] font-bold text-on-surface-variant uppercase">Mei</span>
                        <span class="text-[9px] font-bold text-primary uppercase">Jun</span>
                    </div>
                </div>

                <!-- Asset Distribution Card -->
                <div class="bg-gradient-to-br from-primary-dark to-primary rounded-2xl p-6 text-white shadow-large">
                    <h4 class="font-headline font-bold text-lg mb-5">Distribusi Aset</h4>
                    <div class="space-y-3">
                        <div class="p-4 bg-white/10 rounded-xl flex justify-between items-center hover:bg-white/15 transition">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary-light">payments</span>
                                <div>
                                    <p class="text-[10px] font-bold text-white/50 uppercase leading-none mb-1">Kas Tunai</p>
                                    <p class="text-sm font-bold">Bendahara RW</p>
                                </div>
                            </div>
                            <p class="text-sm font-bold">Rp 4.500.000</p>
                        </div>
                        <div class="p-4 bg-white/10 rounded-xl flex justify-between items-center hover:bg-white/15 transition">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary-light">account_balance</span>
                                <div>
                                    <p class="text-[10px] font-bold text-white/50 uppercase leading-none mb-1">Bank BCA</p>
                                    <p class="text-sm font-bold">8220-432-11</p>
                                </div>
                            </div>
                            <p class="text-sm font-bold">Rp 112.000.000</p>
                        </div>
                    </div>
                    <button class="w-full bg-white/20 text-white py-3 rounded-xl font-bold text-sm mt-5 hover:bg-white/30 transition-all btn-action">
                        Unduh Laporan PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
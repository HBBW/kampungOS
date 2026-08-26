<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="w-full">
        <!-- Header Section -->
        <div class="mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Manajemen Keuangan</h2>
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
                        <h3 class="text-3xl font-bold"><?= number_format($balance, 0, ',', '.') ?></h3>
                    </div>
                </div>
            </div>

            <!-- Pemasukan Card -->
            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Pemasukan (Bulan Ini)</p>
                <div class="flex items-baseline gap-1 mt-1">
                    <span class="text-sm text-on-surface-variant">Rp</span>
                    <h3 class="text-3xl font-bold text-primary"><?= number_format($month_income, 0, ',', '.') ?></h3>
                </div>
                <div class="mt-4">
                    <div class="h-1.5 w-full bg-surface-container-low rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full" style="width: <?= $month_income > 0 ? min(100, round(($month_income / max($month_income + $month_expense, 1)) * 100)) : 0 ?>%"></div>
                    </div>
                    <p class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wide mt-2">Porsi pemasukan bulan ini</p>
                </div>
            </div>

            <!-- Pengeluaran Card -->
            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Pengeluaran (Bulan Ini)</p>
                <div class="flex items-baseline gap-1 mt-1">
                    <span class="text-sm text-on-surface-variant">Rp</span>
                    <h3 class="text-3xl font-bold text-error"><?= number_format($month_expense, 0, ',', '.') ?></h3>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <p class="text-[10px] font-semibold text-on-surface-variant uppercase">Bulan ini</p>
                    <span class="text-[10px] font-semibold text-on-surface-variant uppercase"><?= number_format($total_transactions) ?> transaksi</span>
                </div>
            </div>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <!-- LEFT COLUMN: Transaction History (8 cols) -->
            <div class="lg:col-span-8 space-y-5">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h3 class="text-xl font-headline font-bold text-on-surface">Mutasi Kas</h3>
                        <p class="text-sm text-on-surface-variant">Rekaman arus kas masuk dan keluar</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="filter-btn p-2.5 rounded-xl bg-white border border-outline-variant/40 text-on-surface-variant hover:text-primary hover:border-primary transition-all">
                            <span class="material-symbols-outlined text-lg">filter_list</span>
                        </button>
                    </div>
                </div>

                <!-- Transactions Card -->
                <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                    <?php if (!empty($transactions)) : ?>
                        <?php
                        $current_date = '';
                        foreach ($transactions as $transaction) :
                            $trans_date = date('d M Y', strtotime($transaction->created_at ?? 'now'));
                            if ($trans_date !== $current_date) :
                                $current_date = $trans_date;
                                $day_name = date('l', strtotime($transaction->created_at ?? 'now'));
                                $day_map = ['Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu'];
                                $day_name_id = $day_map[$day_name] ?? $day_name;
                        ?>
                            <div class="bg-surface-container-low/50 px-4 sm:px-6 py-3 border-b border-outline-variant/20">
                                <span class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider"><?= $day_name_id ?>, <?= $current_date ?></span>
                            </div>
                        <?php endif; ?>
                            <div class="divide-y divide-outline-variant/20">
                                <div class="transaction-row px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div class="flex items-start gap-3">
                                        <span class="text-[10px] font-bold text-on-surface-variant mt-1"><?= date('H:i', strtotime($transaction->created_at ?? 'now')) ?></span>
                                        <div>
                                            <p class="font-bold text-sm text-on-surface"><?= htmlspecialchars($transaction->description ?? '-') ?></p>
                                            <div class="flex flex-wrap items-center gap-2 mt-1">
                                                <span class="text-[9px] font-bold <?= ($transaction->type ?? '') === 'income' ? 'text-primary uppercase bg-primary/10' : 'text-error uppercase bg-error/10' ?> px-2 py-0.5 rounded"><?= ($transaction->type ?? '') === 'income' ? 'Pemasukan' : 'Pengeluaran' ?></span>
                                                <?php if (!empty($transaction->category)) : ?>
                                                    <span class="text-[10px] text-on-surface-variant italic"><?= htmlspecialchars($transaction->category) ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($transaction->head_name)) : ?>
                                                    <span class="text-[10px] text-on-surface-variant">oleh: <?= htmlspecialchars($transaction->head_name) ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right sm:text-left">
                                        <p class="text-base font-bold <?= ($transaction->type ?? '') === 'income' ? 'text-success' : 'text-error' ?>"><?= ($transaction->type ?? '') === 'income' ? '+' : '-' ?> Rp <?= number_format($transaction->amount ?? 0, 0, ',', '.') ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="px-6 py-12 text-center">
                            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-3">receipt_long</span>
                            <p class="text-sm text-on-surface-variant">Belum ada transaksi</p>
                        </div>
                    <?php endif; ?>

                    <!-- Pagination -->
                    <div class="px-4 sm:px-6 py-4 bg-surface-container-low/30 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-t border-outline-variant/20">
                        <p class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wider text-center sm:text-left">Menampilkan <?= count($transactions ?? []) ?> dari <?= $total_transactions ?> transaksi</p>
                        <div class="flex justify-center gap-1">
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/40 hover:bg-surface-container-low transition">
                                <span class="material-symbols-outlined text-sm">chevron_left</span>
                            </button>
                            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-white text-xs font-bold">1</button>
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
                        <?php if (!empty($monthly_summary)) : ?>
                            <?php
                            $all_vals = [];
                            foreach ($monthly_summary as $m) { $all_vals[] = $m['income']; $all_vals[] = $m['expense']; }
                            $max_val = max($all_vals) > 0 ? max($all_vals) : 1;
                            foreach ($monthly_summary as $i => $month) :
                                $height = round(($month['income'] / $max_val) * 100);
                                $is_last = $i === count($monthly_summary) - 1;
                            ?>
                                <div class="flex-1 <?= $is_last ? 'bg-primary rounded-t-lg shadow-lg shadow-primary/30' : 'bg-surface-container-highest rounded-t-lg hover:bg-primary/30' ?> transition-all chart-bar" style="height: <?= max(5, $height) ?>%"></div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="flex-1 bg-surface-container-highest rounded-t-lg" style="height: 20%"></div>
                            <div class="flex-1 bg-surface-container-highest rounded-t-lg" style="height: 20%"></div>
                            <div class="flex-1 bg-surface-container-highest rounded-t-lg" style="height: 20%"></div>
                            <div class="flex-1 bg-surface-container-highest rounded-t-lg" style="height: 20%"></div>
                            <div class="flex-1 bg-surface-container-highest rounded-t-lg" style="height: 20%"></div>
                            <div class="flex-1 bg-surface-container-highest rounded-t-lg" style="height: 20%"></div>
                        <?php endif; ?>
                    </div>
                    <div class="flex justify-between mt-4 px-1">
                        <?php if (!empty($monthly_summary)) : ?>
                            <?php foreach ($monthly_summary as $i => $month) : ?>
                                <span class="text-[9px] font-bold <?= $i === count($monthly_summary) - 1 ? 'text-primary' : 'text-on-surface-variant' ?> uppercase"><?= $month['month'] ?></span>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php for ($i = 0; $i < 6; $i++) : ?>
                                <span class="text-[9px] font-bold text-on-surface-variant uppercase">-</span>
                            <?php endfor; ?>
                        <?php endif; ?>
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
                                    <p class="text-[10px] font-bold text-white/50 uppercase leading-none mb-1">Total Pemasukan</p>
                                    <p class="text-sm font-bold">Bulan Ini</p>
                                </div>
                            </div>
                            <p class="text-sm font-bold">Rp <?= number_format($month_income, 0, ',', '.') ?></p>
                        </div>
                        <div class="p-4 bg-white/10 rounded-xl flex justify-between items-center hover:bg-white/15 transition">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary-light">account_balance</span>
                                <div>
                                    <p class="text-[10px] font-bold text-white/50 uppercase leading-none mb-1">Total Pengeluaran</p>
                                    <p class="text-sm font-bold">Bulan Ini</p>
                                </div>
                            </div>
                            <p class="text-sm font-bold">Rp <?= number_format($month_expense, 0, ',', '.') ?></p>
                        </div>
                    </div>
                    <div class="mt-5 pt-4 border-t border-white/20">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs font-bold text-white/70">Saldo Bersih</span>
                            <span class="text-sm font-bold">Rp <?= number_format($balance, 0, ',', '.') ?></span>
                        </div>
                        <div class="h-2 w-full bg-white/20 rounded-full overflow-hidden">
                            <div class="h-full bg-white rounded-full" style="width: <?= $balance > 0 ? '100' : '0' ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

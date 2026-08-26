<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="w-full">
        <!-- Header Section -->
        <div class="mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Dashboard Bendahara</h2>
            <p class="text-on-surface-variant text-sm sm:text-base mt-1">Pantau arus kas dan kondisi keuangan lingkungan</p>
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

            <!-- LEFT COLUMN: Recent Transactions -->
            <div class="lg:col-span-8 space-y-5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h3 class="text-xl font-headline font-bold text-on-surface">Transaksi Terakhir</h3>
                        <p class="text-sm text-on-surface-variant">Rekaman arus kas masuk dan keluar</p>
                    </div>
                    <a href="<?= base_url('bendahara/keuangan') ?>" class="flex items-center gap-2 px-4 py-2.5 bg-primary text-white rounded-xl font-semibold text-sm shadow-md hover:bg-primary-dark transition-all btn-action">
                        <span class="material-symbols-outlined text-sm">receipt_long</span>
                        Lihat Semua
                    </a>
                </div>

                <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                    <?php if (!empty($transactions)) : ?>
                        <?php
                        $current_date = '';
                        foreach ($transactions as $transaction) :
                            $trans_date = date('d M Y', strtotime($transaction->created_at ?? 'now'));
                            if ($trans_date !== $current_date) :
                                $current_date = $trans_date;
                        ?>
                            <div class="bg-surface-container-low/50 px-4 sm:px-6 py-3 <?= $current_date !== $trans_date ? 'border-b' : '' ?> border-outline-variant/20">
                                <span class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider"><?= $current_date ?></span>
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
                </div>
            </div>

            <!-- RIGHT COLUMN: Quick Actions -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Quick Actions Card -->
                <div class="bg-white rounded-2xl p-5 shadow-card border border-outline-variant/20">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="material-symbols-outlined text-primary">flash_on</span>
                        <h4 class="font-headline font-bold text-on-surface">Aksi Cepat</h4>
                    </div>
                    <div class="space-y-3">
                        <a href="<?= base_url('bendahara/keuangan') ?>" class="w-full flex items-center gap-4 p-3 rounded-xl bg-surface-container-low hover:bg-primary/10 transition group">
                            <span class="material-symbols-outlined text-primary">account_balance_wallet</span>
                            <div class="flex-1 text-left">
                                <p class="text-sm font-semibold text-on-surface">Kelola Keuangan</p>
                                <p class="text-[11px] text-on-surface-variant">Lihat mutasi & laporan</p>
                            </div>
                            <span class="material-symbols-outlined text-on-surface-variant text-sm group-hover:translate-x-1 transition">chevron_right</span>
                        </a>
                        <a href="<?= base_url('bendahara/keuangan') ?>" class="w-full flex items-center gap-4 p-3 rounded-xl bg-surface-container-low hover:bg-primary/10 transition group">
                            <span class="material-symbols-outlined text-primary">assessment</span>
                            <div class="flex-1 text-left">
                                <p class="text-sm font-semibold text-on-surface">Laporan Keuangan</p>
                                <p class="text-[11px] text-on-surface-variant">Ringkasan & tren bulanan</p>
                            </div>
                            <span class="material-symbols-outlined text-on-surface-variant text-sm group-hover:translate-x-1 transition">chevron_right</span>
                        </a>
                        <a href="<?= base_url('bendahara/keuangan') ?>" class="w-full flex items-center gap-4 p-3 rounded-xl bg-surface-container-low hover:bg-primary/10 transition group">
                            <span class="material-symbols-outlined text-primary">history</span>
                            <div class="flex-1 text-left">
                                <p class="text-sm font-semibold text-on-surface">Riwayat Transaksi</p>
                                <p class="text-[11px] text-on-surface-variant">Semua catatan kas</p>
                            </div>
                            <span class="material-symbols-outlined text-on-surface-variant text-sm group-hover:translate-x-1 transition">chevron_right</span>
                        </a>
                    </div>
                </div>

                <!-- Summary Stats Card -->
                <div class="bg-gradient-to-br from-primary/5 to-primary/10 rounded-2xl p-5 border border-primary/20">
                    <h4 class="text-xs font-bold text-primary uppercase tracking-wider mb-3">Ringkasan Cepat</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-on-surface-variant">Total Transaksi</span>
                            <span class="text-sm font-bold text-on-surface"><?= number_format($total_transactions) ?></span>
                        </div>
                        <div class="h-px bg-outline-variant/30"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-on-surface-variant">Pemasukan</span>
                            <span class="text-sm font-bold text-primary">Rp <?= number_format($month_income, 0, ',', '.') ?></span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-on-surface-variant">Pengeluaran</span>
                            <span class="text-sm font-bold text-error">Rp <?= number_format($month_expense, 0, ',', '.') ?></span>
                        </div>
                        <div class="h-px bg-outline-variant/30"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-bold text-on-surface">Saldo Bersih</span>
                            <span class="text-sm font-bold <?= ($balance ?? 0) >= 0 ? 'text-primary' : 'text-error' ?>">Rp <?= number_format($balance, 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

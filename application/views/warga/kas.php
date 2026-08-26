<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="w-full">
        <div class="mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-headline font-bold text-on-surface tracking-tight">Laporan Keuangan</h2>
            <p class="text-on-surface-variant text-sm sm:text-base mt-1">Pantau arus kas dan kelola keuangan lingkungan</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
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
                    <div class="mt-4 flex items-center gap-2 bg-white/10 w-fit px-3 py-1.5 rounded-full text-xs font-semibold backdrop-blur-sm">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        <span><?= $total_transactions ?> transaksi</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Pemasukan (Bulan Ini)</p>
                <div class="flex items-baseline gap-1 mt-1">
                    <span class="text-sm text-on-surface-variant">Rp</span>
                    <h3 class="text-3xl font-bold text-primary"><?= number_format($month_income, 0, ',', '.') ?></h3>
                </div>
                <div class="mt-4">
                    <div class="h-1.5 w-full bg-surface-container-low rounded-full overflow-hidden">
                        <?php $target = ($month_income + $month_expense) > 0 ? round(($month_income / ($month_income + $month_expense)) * 100) : 0; ?>
                        <div class="h-full bg-primary rounded-full" style="width: <?= $target ?>%"></div>
                    </div>
                    <p class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wide mt-2"><?= $target ?>% dari total arus kas</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20 card-hover">
                <p class="text-on-surface-variant text-xs font-semibold uppercase tracking-wide">Pengeluaran (Bulan Ini)</p>
                <div class="flex items-baseline gap-1 mt-1">
                    <span class="text-sm text-on-surface-variant">Rp</span>
                    <h3 class="text-3xl font-bold text-error"><?= number_format($month_expense, 0, ',', '.') ?></h3>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-[10px] font-semibold text-on-surface-variant uppercase">Pengeluaran bulan berjalan</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <div class="lg:col-span-8 space-y-5">
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

                <div class="bg-white rounded-2xl shadow-card border border-outline-variant/20 overflow-hidden">
                    <?php if (!empty($transactions)): ?>
                        <?php
                        $current_date = '';
                        foreach ($transactions as $transaction):
                            $tx_date = date('d-m-Y', strtotime($transaction->created_at));
                            if ($tx_date !== $current_date):
                                $current_date = $tx_date;
                                $day_name = ['Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
                                $day = $day_name[date('l', strtotime($transaction->created_at))];
                        ?>
                            <div class="bg-surface-container-low/50 px-4 sm:px-6 py-3 border-b border-outline-variant/20">
                                <span class="text-[11px] font-bold text-on-surface-variant uppercase tracking-wider"><?= $day . ', ' . date('d F Y', strtotime($transaction->created_at)) ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="divide-y divide-outline-variant/20">
                            <div class="transaction-row px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex items-start gap-3">
                                    <span class="text-[10px] font-bold text-on-surface-variant mt-1"><?= date('H:i', strtotime($transaction->created_at)) ?></span>
                                    <div>
                                        <p class="font-bold text-sm text-on-surface"><?= htmlspecialchars($transaction->description) ?></p>
                                        <div class="flex flex-wrap items-center gap-2 mt-1">
                                            <?php if ($transaction->type == 'income'): ?>
                                                <span class="text-[9px] font-bold text-primary uppercase bg-primary/10 px-2 py-0.5 rounded">Pemasukan</span>
                                            <?php else: ?>
                                                <span class="text-[9px] font-bold text-error uppercase bg-error/10 px-2 py-0.5 rounded">Pengeluaran</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right sm:text-left">
                                    <?php if ($transaction->type == 'income'): ?>
                                        <p class="text-base font-bold text-success">+ Rp <?= number_format($transaction->amount, 0, ',', '.') ?></p>
                                    <?php else: ?>
                                        <p class="text-base font-bold text-error">- Rp <?= number_format($transaction->amount, 0, ',', '.') ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center py-12">
                            <span class="material-symbols-outlined text-5xl text-on-surface-variant/30 mb-3">receipt_long</span>
                            <p class="text-on-surface-variant">Belum ada transaksi</p>
                        </div>
                    <?php endif; ?>

                    <div class="px-4 sm:px-6 py-4 bg-surface-container-low/30 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-t border-outline-variant/20">
                        <p class="text-[10px] font-semibold text-on-surface-variant uppercase tracking-wider text-center sm:text-left">Menampilkan <?= count($transactions) ?> dari <?= $total_transactions ?> transaksi</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-2xl p-6 shadow-card border border-outline-variant/20">
                    <h4 class="font-headline font-bold text-on-surface text-lg mb-5">Ringkasan</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-on-surface-variant">Total Pemasukan</span>
                            <span class="text-sm font-bold text-primary">Rp <?= number_format($month_income, 0, ',', '.') ?></span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-on-surface-variant">Total Pengeluaran</span>
                            <span class="text-sm font-bold text-error">Rp <?= number_format($month_expense, 0, ',', '.') ?></span>
                        </div>
                        <div class="border-t border-outline-variant/20 pt-4 flex items-center justify-between">
                            <span class="text-sm font-bold text-on-surface">Saldo Bersih</span>
                            <span class="text-sm font-bold text-primary">Rp <?= number_format($month_income - $month_expense, 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-primary-dark to-primary rounded-2xl p-6 text-white shadow-large">
                    <h4 class="font-headline font-bold text-lg mb-5">Saldo Total</h4>
                    <div class="space-y-3">
                        <div class="p-4 bg-white/10 rounded-xl flex justify-between items-center hover:bg-white/15 transition">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary-light">account_balance_wallet</span>
                                <div>
                                    <p class="text-[10px] font-bold text-white/50 uppercase leading-none mb-1">Saldo Kas RT</p>
                                    <p class="text-sm font-bold">Total Keseluruhan</p>
                                </div>
                            </div>
                            <p class="text-sm font-bold">Rp <?= number_format($balance, 0, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

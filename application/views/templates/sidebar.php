<body class="bg-background text-on-surface antialiased flex flex-col md:flex-row min-h-screen">

    <!-- ========== SIDEBAR DESKTOP ========== -->
    <aside class="hidden md:flex flex-col w-64 bg-surface shadow-soft sticky top-0 h-screen z-30 border-r border-outline-variant/40">

        <!-- HEADER -->
        <div class="px-5 pt-6 pb-4 border-b border-outline-variant/30">
            <div class="flex items-center gap-2">
                <div class="w-9 h-9 rounded-full bg-primary/15 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-xl">forest</span>
                </div>
                <h1 class="font-headline text-2xl font-bold text-primary tracking-tight">KampungOS</h1>
            </div>
            <p class="text-xs text-on-surface-variant/70 mt-1">Platfrom Digital RT</p>
        </div>

        <?php
        $role = $this->session->userdata('role');
        $current = uri_string();

        $menus = [
            [
                'label' => 'Beranda',
                'icon' => 'dashboard',
                'routes' => [
                    'rt' => 'rt',
                    'sekretaris' => 'sekretaris',
                    'bendahara' => 'bendahara',
                    'warga' => 'warga'
                ],
                'match' => ''
            ],
            [
                'label' => 'Laporan & Pengaduan',
                'icon' => 'campaign',
                'routes' => [
                    'rt' => 'rt/laporan',
                    'sekretaris' => 'sekretaris/laporan',
                    'warga' => 'warga/laporan'
                ],
                'match' => 'laporan'
            ],
            [
                'label' => 'Pengumuman',
                'icon' => 'notifications_active',
                'routes' => [
                    'rt' => 'rt/pengumuman',
                    'sekretaris' => 'sekretaris/pengumuman',
                    'warga' => 'warga/pengumuman'
                ],
                'match' => 'pengumuman'
            ],
            [
                'label' => 'Keuangan & Iuran',
                'icon' => 'payments',
                'routes' => [
                    'rt' => 'rt/keuangan',
                    'bendahara' => 'bendahara/keuangan',
                    'warga' => 'warga/iuran'
                ],
                'match' => 'keuangan'
            ],
            [
                'label' => [
                    'rt' => 'Arsip Surat',
                    'sekretaris' => 'Administrasi Surat',
                    'warga' => 'Surat Saya'
                ],
                'icon' => 'description',
                'routes' => [
                    'rt' => 'rt/surat',
                    'sekretaris' => 'sekretaris/surat',
                    'warga' => 'warga/surat'
                ],
                'match' => 'surat'
            ]
        ];
        ?>

        <!-- NAV MOBILE-->
        <nav class="flex-1 px-3 py-5 space-y-1">

            <?php foreach ($menus as $menu): ?>
                <?php if (!isset($menu['routes'][$role])) continue; ?>

                <?php
                $route = $menu['routes'][$role];
                $href = base_url($route);

                if ($menu['match'] === '') {
                    $isActive = ($current === $route);
                } else {
                    $uri = uri_string();
                    $match = $menu['match'];

                    if (is_array($match)) {
                        $isActive = false;
                        foreach ($match as $m) {
                            if (strpos($uri, $m) !== false) {
                                $isActive = true;
                                break;
                            }
                        }
                    } else {
                        $isActive = strpos($uri, $match) !== false;
                    }
                }

                $label = is_array($menu['label'])
                    ? ($menu['label'][$role] ?? 'Menu')
                    : $menu['label'];
                ?>

                <a href="<?= $href ?>"
                    class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all duration-200
                <?= $isActive
                    ? 'bg-primary/10 text-primary font-semibold shadow-sm'
                    : 'text-on-surface-variant hover:bg-surface-container-low hover:text-primary' ?>">

                    <span class="material-symbols-outlined"><?= $menu['icon'] ?></span>
                    <span><?= $label ?></span>

                    <?php if ($menu['icon'] == 'description' && in_array($role, ['rt', 'sekretaris'])): ?>
                        <?php $pending_letters = $this->db->where('status', 'pending')->count_all_results('letter_requests'); ?>
                        <?php if ($pending_letters > 0): ?>
                        <span class="ml-auto text-[10px] bg-red-500 text-white px-2 py-0.5 rounded-full">
                            <?= $pending_letters ?>
                        </span>
                        <?php endif; ?>
                    <?php endif; ?>

                </a>
            <?php endforeach; ?>

        </nav>


        <!-- FOOTER -->
        <div class="px-3 py-5 border-t border-outline-variant/30 space-y-1">
            <a href="<?= base_url('settings') ?>" class="flex items-center gap-3 px-4 py-2.5 text-on-surface-variant/80 hover:bg-surface-container-low rounded-xl transition">
                <span class="material-symbols-outlined">settings</span>
                <span>Pengaturan</span>
            </a>

            <a href="#" id="logoutBtn" class="flex items-center gap-3 px-4 py-2.5 text-error/80 hover:bg-error/5 rounded-xl transition">
                <span class="material-symbols-outlined">logout</span>
                <span>Keluar</span>
            </a>
        </div>

    </aside>

    <!-- ========== MAIN CONTENT ========== -->
    <main class="flex-1 flex flex-col min-h-screen">
        <!-- Header -->
        <header class="sticky top-0 z-20 bg-surface/95 backdrop-blur-sm border-b border-outline-variant/30 px-5 md:px-8 h-16 flex justify-between items-center shadow-soft">
            <div class="flex items-center gap-3">
                <!-- <span class="md:hidden material-symbols-outlined text-on-surface-variant cursor-pointer">menu</span> -->
                <span class="font-headline text-2xl font-bold text-primary md:hidden">KampungOS</span>
            </div>
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex items-center gap-2 bg-surface-container-low rounded-full px-4 py-1.5 border border-outline-variant/40">
                    <span class="material-symbols-outlined text-on-surface-variant text-sm">search</span>
                    <input type="text" placeholder="Cari warga, surat..." class="bg-transparent border-none focus:outline-none text-sm w-48">
                </div>
                <button id="notifBtn" class="p-2 rounded-full hover:bg-surface-container-low relative">
                    <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
                    <?php $unread = 0; if ($this->session->userdata('user_id')) { $unread = $this->db->where('user_id', $this->session->userdata('user_id'))->where('is_read', 0)->count_all_results('notifications'); } ?>
                    <span id="notifBadge" class="<?= $unread > 0 ? '' : 'hidden' ?> absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] bg-error text-white text-[9px] font-bold rounded-full flex items-center justify-center px-1"><?= $unread ?></span>
                </button>
                <div class="flex items-center gap-3 pl-2 border-l border-outline-variant/40">
                    <div class="text-right hidden lg:block">
                        <p class="text-sm font-bold text-on-surface"><?= htmlspecialchars($this->session->userdata('name')) ?></p>
                        <p class="text-[11px] font-semibold text-primary"><?= htmlspecialchars($this->session->userdata('role'))  ?> RT 02 / RW 04</p>
                    </div>
                    <div class="relative">
                        <div id="profileBtn"
                            class="w-9 h-11 rounded-full bg-gradient-to-br from-primary/30 to-primary/10 border-2 border-primary/20 flex items-center justify-center cursor-pointer">
                            <span class="material-symbols-outlined text-primary text-xl">person</span>
                        </div>

                        <div id="profileDropdown"
                            class="hidden absolute right-0 mt-3 w-44 bg-white rounded-xl shadow-lg border border-outline-variant/40 overflow-hidden z-50">
                            <div class="px-4 py-3 border-b text-sm text-on-surface-variant">
                                <?= htmlspecialchars($this->session->userdata('name')) ?>
                            </div>
                            <a href="<?= base_url('settings') ?>" class="flex items-center gap-2 px-4 py-3 text-sm hover:bg-surface-container-low transition">
                                <span class="material-symbols-outlined text-sm">settings</span>
                                Pengaturan
                            </a>
                            <a href="#" id="logoutBtnDropdown"
                                class="flex items-center gap-2 px-4 py-3 text-sm text-error hover:bg-error/5 transition">
                                <span class="material-symbols-outlined text-sm">logout</span>
                                Logout
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </header>
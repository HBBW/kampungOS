    <!-- Bottom Navigation (Mobile) -->
    <?php
    if (!isset($menus)) return;
    $role = $this->session->userdata('role');
    $current = uri_string();
    ?>

    <nav class="fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-4 pt-2 md:hidden bg-surface/95 backdrop-blur-lg border-t border-outline-variant/30 z-[9999] shadow-lg">

        <?php foreach ($menus as $menu): ?>
            <?php if (!isset($menu['routes'][$role])) continue; ?>

            <?php
            $route = $menu['routes'][$role];
            $href = base_url($route);

            $isActive = ($menu['match'] === '')
                ? ($current === $route)
                : (strpos($current, $menu['match']) !== false);

            $label = is_array($menu['label'])
                ? ($menu['label'][$role] ?? 'Menu')
                : $menu['label'];
            ?>

            <a href="<?= $href ?>"
                class="flex flex-col items-center px-4 py-1 transition active:scale-95
           <?= $isActive ? 'text-primary' : 'text-on-surface-variant' ?>">

                <span class="material-symbols-outlined text-xl">
                    <?= $menu['icon'] ?>
                </span>

                <span class="text-[9px] <?= $isActive ? 'font-bold' : 'font-semibold' ?>">
                    <?= $label ?>
                </span>

            </a>

        <?php endforeach; ?>

    </nav>
    </main>

    <script>
        $(document).ready(function() {
            // Mobile sidebar toggle
            const sidebar = $('#mobileSidebar');
            const overlay = $('#mobileSidebarOverlay');

            $('#menuToggleBtn').click(function() {
                sidebar.addClass('open');
                overlay.css({
                    opacity: 1,
                    visibility: 'visible'
                });
                $('body').css('overflow', 'hidden');
            });

            $('#closeSidebarBtn, #mobileSidebarOverlay').click(function() {
                sidebar.removeClass('open');
                overlay.css({
                    opacity: 0,
                    visibility: 'hidden'
                });
                $('body').css('overflow', '');
            });

            // Tab switching
            $('.tab-btn').click(function() {
                $('.tab-btn').removeClass('active border-b-2 border-primary text-primary').addClass('text-on-surface-variant');
                $(this).addClass('active border-b-2 border-primary text-primary').removeClass('text-on-surface-variant');
            });

            // Form submission
            $('#announcementForm').submit(function(e) {
                e.preventDefault();
                const title = $('#title').val();
                if (!title) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Judul Kosong',
                        text: 'Harap masukkan judul pengumuman',
                        confirmButtonColor: '#0F6E6B'
                    });
                    return;
                }
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Pengumuman telah diterbitkan',
                    confirmButtonColor: '#0F6E6B',
                    timer: 1500,
                    showConfirmButton: false
                });
                $('#title').val('');
                $('#content').val('');
            });

            // Edit button
            $('.edit-btn').click(function(e) {
                e.stopPropagation();
                Swal.fire({
                    icon: 'info',
                    title: 'Edit Pengumuman',
                    text: 'Fitur edit akan segera tersedia',
                    confirmButtonColor: '#0F6E6B'
                });
            });

            // Delete button
            $('.delete-btn').click(function(e) {
                e.stopPropagation();
                Swal.fire({
                    icon: 'question',
                    title: 'Hapus Pengumuman?',
                    text: 'Data yang dihapus tidak dapat dikembalikan',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#D44C3A',
                    cancelButtonColor: '#0F6E6B'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terhapus!',
                            text: 'Pengumuman telah dihapus',
                            confirmButtonColor: '#0F6E6B'
                        });
                    }
                });
            });

            // Add new card click
            $('.border-dashed').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
                $('#title').focus();
            });
        });

        $(document).on('click', '#logoutBtn', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Keluar?',
                text: 'Anda akan logout dari sistem',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {

                    Swal.fire({
                        title: 'Logging out...',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });

                    $.ajax({
                        url: "<?= base_url('auth/logout') ?>",
                        type: "POST",
                        dataType: "json",

                        success: function(res) {
                            if (res.status) {
                                window.location.href = res.redirect;
                            }
                        },

                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });

        const sidebar = $('#mobileSidebar');
        const overlay = $('#mobileSidebarOverlay');

        $('#menuToggleBtn').click(function() {
            sidebar.addClass('open');
            overlay.css({
                opacity: 1,
                visibility: 'visible'
            });
            $('body').css('overflow', 'hidden');
        });

        $('#closeSidebarBtn, #mobileSidebarOverlay').click(function() {
            sidebar.removeClass('open');
            overlay.css({
                opacity: 0,
                visibility: 'hidden'
            });
            $('body').css('overflow', '');
        });

        // Interactive buttons feedback
        $('.btn-action, .card-hover').on('click', function(e) {
            if (!$(e.target).closest('a, button').length) {
                // Optional: add ripple effect or just log
            }
        });

        // Toast notification for demo
        $('.table-row-hover button').on('click', function(e) {
            e.stopPropagation();
            Swal.fire({
                icon: 'info',
                title: 'Fitur dalam Pengembangan',
                text: 'Fungsi ini akan segera tersedia',
                confirmButtonColor: '#0F6E6B',
                background: '#FDFBF7',
                timer: 1500,
                showConfirmButton: false
            });
        });

        //icon person
        $('#profileBtn').click(function(e) {
            e.stopPropagation();
            $('#profileDropdown').toggleClass('hidden');
        });

        // close dropdown kalau klik di luar
        $(document).click(function() {
            $('#profileDropdown').addClass('hidden');
        });

        // logout dari dropdown
        $('#logoutBtnDropdown').click(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Keluar?',
                text: 'Anda akan logout dari sistem',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('auth/logout') ?>",
                        type: "POST",
                        dataType: "json",
                        success: function(res) {
                            if (res.status) {
                                window.location.href = res.redirect;
                            }
                        }
                    });
                }
            });
        });
    </script>
    </body>

    </html>
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
            $isActive = ($menu['match'] === '') ? ($current === $route) : (strpos($current, $menu['match']) !== false);
            $label = is_array($menu['label']) ? ($menu['label'][$role] ?? 'Menu') : $menu['label'];
            ?>
            <a href="<?= $href ?>" class="flex flex-col items-center px-4 py-1 transition active:scale-95 <?= $isActive ? 'text-primary' : 'text-on-surface-variant' ?>">
                <span class="material-symbols-outlined text-xl"><?= $menu['icon'] ?></span>
                <span class="text-[9px] <?= $isActive ? 'font-bold' : 'font-semibold' ?>"><?= $label ?></span>
            </a>
        <?php endforeach; ?>
    </nav>
    </main>

    <script>
    const API_BASE = '<?= base_url('api') ?>';

    function apiPost(endpoint, data) {
        return $.ajax({
            url: API_BASE + '/' + endpoint,
            type: 'POST',
            dataType: 'json',
            data: data
        });
    }

    function showToast(icon, title, text) {
        Swal.fire({ icon, title, text, confirmButtonColor: '#0F6E6B', timer: 2000, showConfirmButton: false });
    }

    function confirmAction(title, text, callback) {
        Swal.fire({
            title, text, icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#0F6E6B',
            cancelButtonColor: '#D44C3A'
        }).then(r => { if (r.isConfirmed) callback(); });
    }

    $(document).ready(function() {
        const sidebar = $('#mobileSidebar');
        const overlay = $('#mobileSidebarOverlay');

        $('#menuToggleBtn').click(function() {
            sidebar.addClass('open');
            overlay.css({ opacity: 1, visibility: 'visible' });
            $('body').css('overflow', 'hidden');
        });

        $('#closeSidebarBtn, #mobileSidebarOverlay').click(function() {
            sidebar.removeClass('open');
            overlay.css({ opacity: 0, visibility: 'hidden' });
            $('body').css('overflow', '');
        });

        $('.tab-btn').click(function() {
            $('.tab-btn').removeClass('active border-b-2 border-primary text-primary').addClass('text-on-surface-variant');
            $(this).addClass('active border-b-2 border-primary text-primary').removeClass('text-on-surface-variant');
        });

        // ====== REPORT FORM ======
        $('#reportForm').submit(function(e) {
            e.preventDefault();
            const title = $('#reportTitle').val();
            const description = $('#reportDescription').val();
            const category = $('#category').val();
            const location = $('#location').val() || '';
            const reportType = $('input[name="report_type"]:checked').val() || 'public';

            if (!title || !description || !category) {
                Swal.fire({ icon: 'warning', title: 'Lengkapi Data', text: 'Judul, deskripsi, dan kategori wajib diisi', confirmButtonColor: '#0F6E6B' });
                return;
            }

            Swal.fire({ title: 'Kirim Laporan?', text: 'Pastikan data laporan sudah benar', icon: 'question', showCancelButton: true, confirmButtonText: 'Kirim', cancelButtonText: 'Batal', confirmButtonColor: '#0F6E6B' }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({ title: 'Mengirim...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    apiPost('create_report', { title, description, category, location, report_type: reportType })
                        .done(res => {
                            if (res.status) {
                                Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                            } else {
                                Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                            }
                        })
                        .fail(() => Swal.fire({ icon: 'error', title: 'Error', text: 'Terjadi kesalahan server', confirmButtonColor: '#0F6E6B' }));
                }
            });
        });

        // Report status update (RT/Sekretaris)
        $(document).on('click', '.update-status-btn', function() {
            const id = $(this).data('id');
            const status = $(this).data('status');
            Swal.fire({ title: 'Update Status?', text: 'Ubah status laporan', icon: 'question', showCancelButton: true, confirmButtonText: 'Ya', cancelButtonText: 'Batal', confirmButtonColor: '#0F6E6B' }).then(r => {
                if (r.isConfirmed) {
                    apiPost('update_report_status', { id, status }).done(res => {
                        if (res.status) { showToast('success', 'Berhasil', res.message); setTimeout(() => location.reload(), 1000); }
                        else Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                    });
                }
            });
        });

        $(document).on('click', '.delete-report-btn', function() {
            const id = $(this).data('id');
            confirmAction('Hapus Laporan?', 'Data tidak dapat dikembalikan', () => {
                apiPost('delete_report', { id }).done(res => {
                    if (res.status) { showToast('success', 'Terhapus', res.message); setTimeout(() => location.reload(), 1000); }
                });
            });
        });

        // ====== ANNOUNCEMENT FORM ======
        $('#announcementForm').submit(function(e) {
            e.preventDefault();
            const title = $('#title').val();
            const content = $('#content').val();
            const category = $('#category').val() || 'umum';

            if (!title || !content) {
                Swal.fire({ icon: 'warning', title: 'Lengkapi Data', text: 'Judul dan isi pengumuman wajib diisi', confirmButtonColor: '#0F6E6B' });
                return;
            }

            Swal.fire({ title: 'Terbitkan?', text: 'Pengumuman akan terlihat oleh semua warga', icon: 'question', showCancelButton: true, confirmButtonText: 'Terbitkan', cancelButtonText: 'Batal', confirmButtonColor: '#0F6E6B' }).then(r => {
                if (r.isConfirmed) {
                    Swal.fire({ title: 'Menerbitkan...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    apiPost('create_announcement', { title, content, category }).done(res => {
                        if (res.status) {
                            Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.delete-announcement-btn', function() {
            const id = $(this).data('id');
            confirmAction('Hapus Pengumuman?', 'Data tidak dapat dikembalikan', () => {
                apiPost('delete_announcement', { id }).done(res => {
                    if (res.status) { showToast('success', 'Terhapus', res.message); setTimeout(() => location.reload(), 1000); }
                });
            });
        });

        // ====== LETTER FORM ======
        $('#letterForm').submit(function(e) {
            e.preventDefault();
            const type = $('#letterType').val();
            const purpose = $('#letterPurpose').val();

            if (!type || !purpose) {
                Swal.fire({ icon: 'warning', title: 'Lengkapi Data', text: 'Jenis surat dan keperluan wajib diisi', confirmButtonColor: '#0F6E6B' });
                return;
            }

            Swal.fire({ title: 'Ajukan Surat?', text: 'Surat akan dikirim ke RT untuk diproses', icon: 'question', showCancelButton: true, confirmButtonText: 'Ajukan', cancelButtonText: 'Batal', confirmButtonColor: '#0F6E6B' }).then(r => {
                if (r.isConfirmed) {
                    Swal.fire({ title: 'Mengirim...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    apiPost('create_letter', { type, purpose }).done(res => {
                        if (res.status) {
                            Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.approve-letter-btn', function() {
            const id = $(this).data('id');
            confirmAction('Setujui Surat?', 'Surat akan diproses dan diterbitkan', () => {
                apiPost('update_letter_status', { id, status: 'approved' }).done(res => {
                    if (res.status) { showToast('success', 'Disetujui', res.message); setTimeout(() => location.reload(), 1000); }
                });
            });
        });

        $(document).on('click', '.reject-letter-btn', function() {
            const id = $(this).data('id');
            confirmAction('Tolak Surat?', 'Permintaan surat akan ditolak', () => {
                apiPost('update_letter_status', { id, status: 'rejected' }).done(res => {
                    if (res.status) { showToast('success', 'Ditolak', res.message); setTimeout(() => location.reload(), 1000); }
                });
            });
        });

        // ====== TRANSACTION FORM ======
        $('#transactionForm').submit(function(e) {
            e.preventDefault();
            const type = $('#transType').val();
            const amount = $('#transAmount').val();
            const description = $('#transDescription').val();
            const category = $('#transCategory').val() || 'umum';

            if (!type || !amount || !description) {
                Swal.fire({ icon: 'warning', title: 'Lengkapi Data', text: 'Semua field wajib diisi', confirmButtonColor: '#0F6E6B' });
                return;
            }

            Swal.fire({ title: 'Tambah Transaksi?', text: 'Konfirmasi transaksi baru', icon: 'question', showCancelButton: true, confirmButtonText: 'Ya', cancelButtonText: 'Batal', confirmButtonColor: '#0F6E6B' }).then(r => {
                if (r.isConfirmed) {
                    Swal.fire({ title: 'Memproses...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    apiPost('create_transaction', { type, amount, description, category }).done(res => {
                        if (res.status) {
                            Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                        }
                    });
                }
            });
        });

        // ====== NEW LETTER BUTTON (warga) ======
        $(document).on('click', '.new-letter-btn, .letter-type-btn', function() {
            Swal.fire({
                title: 'Ajukan Surat Baru',
                html:
                    '<div class="text-left">' +
                    '<label class="block text-xs font-bold mb-1">Jenis Surat</label>' +
                    '<select id="swal-letter-type" class="w-full border rounded-lg p-2 mb-3">' +
                    '<option value="domisili">Surat Domisili</option>' +
                    '<option value="usaha">Surat Keterangan Usaha</option>' +
                    '<option value="nikah">Surat Pengantar Nikah</option>' +
                    '<option value="skck">Surat Keterangan SKCK</option>' +
                    '</select>' +
                    '<label class="block text-xs font-bold mb-1">Keperluan</label>' +
                    '<textarea id="swal-letter-purpose" class="w-full border rounded-lg p-2" rows="3" placeholder="Tuliskan keperluan surat..."></textarea>' +
                    '</div>',
                showCancelButton: true,
                confirmButtonText: 'Ajukan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#0F6E6B',
                preConfirm: () => {
                    const type = $('#swal-letter-type').val();
                    const purpose = $('#swal-letter-purpose').val();
                    if (!purpose) { Swal.showValidationMessage('Keperluan wajib diisi'); return false; }
                    return { type, purpose };
                }
            }).then(r => {
                if (r.isConfirmed) {
                    Swal.fire({ title: 'Mengirim...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    apiPost('create_letter', r.value).done(res => {
                        if (res.status) {
                            Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                        }
                    });
                }
            });
        });

        // ====== ADD TRANSACTION BUTTON ======
        $(document).on('click', '.add-transaction-btn', function() {
            Swal.fire({
                title: 'Tambah Transaksi',
                html:
                    '<div class="text-left">' +
                    '<label class="block text-xs font-bold mb-1">Tipe</label>' +
                    '<select id="swal-trans-type" class="w-full border rounded-lg p-2 mb-3">' +
                    '<option value="income">Pemasukan</option>' +
                    '<option value="expense">Pengeluaran</option>' +
                    '</select>' +
                    '<label class="block text-xs font-bold mb-1">Jumlah (Rp)</label>' +
                    '<input type="number" id="swal-trans-amount" class="w-full border rounded-lg p-2 mb-3" placeholder="0">' +
                    '<label class="block text-xs font-bold mb-1">Keterangan</label>' +
                    '<input type="text" id="swal-trans-desc" class="w-full border rounded-lg p-2 mb-3" placeholder="Keterangan transaksi...">' +
                    '<label class="block text-xs font-bold mb-1">Kategori</label>' +
                    '<select id="swal-trans-cat" class="w-full border rounded-lg p-2">' +
                    '<option value="iuran">Iuran</option>' +
                    '<option value="operasional">Operasional</option>' +
                    '<option value="maintenance">Maintenance</option>' +
                    '<option value="umum">Umum</option>' +
                    '</select>' +
                    '</div>',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#0F6E6B',
                preConfirm: () => {
                    const amount = $('#swal-trans-amount').val();
                    const desc = $('#swal-trans-desc').val();
                    if (!amount || !desc) { Swal.showValidationMessage('Semua field wajib diisi'); return false; }
                    return { type: $('#swal-trans-type').val(), amount, description: desc, category: $('#swal-trans-cat').val() };
                }
            }).then(r => {
                if (r.isConfirmed) {
                    Swal.fire({ title: 'Menyimpan...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    apiPost('create_transaction', r.value).done(res => {
                        if (res.status) {
                            Swal.fire({ icon: 'success', title: 'Berhasil!', text: res.message, confirmButtonColor: '#0F6E6B', timer: 1500, showConfirmButton: false }).then(() => location.reload());
                        } else {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                        }
                    });
                }
            });
        });

        // ====== LOGOUT ======
        $(document).on('click', '#logoutBtn, #logoutBtnDropdown', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Keluar?', text: 'Anda akan logout dari sistem', icon: 'warning',
                showCancelButton: true, confirmButtonText: 'Ya, keluar', cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({ title: 'Logging out...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    $.ajax({
                        url: "<?= base_url('auth/logout') ?>", type: "POST", dataType: "json",
                        success: function(res) { if (res.status) window.location.href = res.redirect; }
                    });
                }
            });
        });

        // Profile dropdown
        $('#profileBtn').click(function(e) { e.stopPropagation(); $('#profileDropdown').toggleClass('hidden'); });
        $(document).click(function() { $('#profileDropdown').addClass('hidden'); });

        // ====== REPORT DETAIL MODAL ======
        function openReportModal(id) {
            const $modal = $('#reportModal');
            if (!$modal.length) return;

            Swal.fire({ title: 'Memuat...', allowOutsideClick: false, didOpen: () => Swal.showLoading(), timer: 8000 });

            $.ajax({
                url: API_BASE + '/get_report?id=' + id,
                type: 'GET',
                dataType: 'json'
            }).done(function(res) {
                Swal.close();
                if (!res.status || !res.data) {
                    Swal.fire({ icon: 'error', title: 'Gagal', text: res.message || 'Laporan tidak ditemukan', confirmButtonColor: '#0F6E6B' });
                    return;
                }
                const r = res.data;
                const name = r.head_name || 'Warga';
                const initials = name.substring(0, 2).toUpperCase();
                const status = (r.status || 'pending').toLowerCase();

                $('#modalAvatar').text(initials);
                $('#modalTitle').text(r.title || 'Laporan');
                $('#modalReporter').text(name + (r.address ? ' \u00b7 ' + r.address : ''));

                // Status badge
                const statusMap = {
                    pending: { cls: 'bg-amber-50 text-amber-700', dot: 'bg-amber-700 animate-pulse', label: 'Pending' },
                    diproses: { cls: 'bg-blue-50 text-blue-700', dot: 'bg-blue-700 animate-pulse', label: 'Diproses' },
                    selesai: { cls: 'bg-green-50 text-green-700', dot: 'bg-green-700', label: 'Selesai' }
                };
                const s = statusMap[status] || statusMap.pending;
                $('#modalStatus').attr('class', 'inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase ' + s.cls)
                    .html('<span class="w-1.5 h-1.5 rounded-full ' + s.dot + '"></span>' + s.label);

                $('#modalCategory').text(r.category || '-');
                $('#modalType').text(r.report_type === 'private' ? 'Pribadi' : 'Umum');
                $('#modalDate').text(r.created_at ? new Date(r.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) : '-');
                $('#modalAddress').text(r.address || '-');
                $('#modalDescription').text(r.description || '-');

                // Images
                const images = r.images || [];
                if (images.length > 0) {
                    $('#modalImagesSection').removeClass('hidden');
                    let imgHtml = '';
                    images.forEach(function(img) {
                        imgHtml += '<div class="aspect-video rounded-xl overflow-hidden bg-surface-container"><img src="' + (img.image_path || img.url || '') + '" alt="Bukti" class="w-full h-full object-cover"></div>';
                    });
                    $('#modalImages').html(imgHtml);
                } else {
                    $('#modalImagesSection').addClass('hidden');
                    $('#modalImages').empty();
                }

                // RT action buttons
                const $actionBtn = $('#modalActionBtn');
                const $actionText = $('#modalActionText');
                const $actions = $('#modalActions');
                const $deleteBtn = $('#modalDeleteBtn');

                if ($actions.length) {
                    if (status === 'pending') {
                        $actionBtn.removeClass('hidden').css('background-color', '#0F6E6B');
                        $actionText.text('Proses Laporan');
                        $actionBtn.find('.material-symbols-outlined').text('play_arrow');
                        $actionBtn.attr('data-next-status', 'diproses');
                        $deleteBtn.removeClass('hidden');
                        $actions.removeClass('hidden');
                    } else if (status === 'diproses') {
                        $actionBtn.removeClass('hidden').css('background-color', '#16a34a');
                        $actionText.text('Tandai Selesai');
                        $actionBtn.find('.material-symbols-outlined').text('check_circle');
                        $actionBtn.attr('data-next-status', 'selesai');
                        $deleteBtn.addClass('hidden');
                        $actions.removeClass('hidden');
                    } else {
                        $actions.addClass('hidden');
                    }
                }

                $actionBtn.attr('data-id', r.id);
                $deleteBtn.attr('data-id', r.id);

                $modal.removeClass('hidden');
                document.body.style.overflow = 'hidden';
            }).fail(function() {
                Swal.close();
                Swal.fire({ icon: 'error', title: 'Error', text: 'Gagal memuat data laporan', confirmButtonColor: '#0F6E6B' });
            });
        }

        function closeReportModal() {
            const $modal = $('#reportModal');
            $modal.addClass('hidden');
            document.body.style.overflow = '';
        }

        $(document).on('click', '.report-row', function(e) {
            if ($(e.target).closest('button').length) return;
            const id = $(this).data('id');
            if (id) openReportModal(id);
        });

        $(document).on('click', '#closeReportModal, #reportModalOverlay', function() {
            closeReportModal();
        });

        // Modal action button (status update)
        $(document).on('click', '#modalActionBtn', function() {
            const id = $(this).data('id');
            const status = $(this).data('next-status');
            if (!id || !status) return;
            confirmAction('Update Status?', 'Ubah status laporan', function() {
                apiPost('update_report_status', { id: id, status: status }).done(function(res) {
                    if (res.status) {
                        closeReportModal();
                        showToast('success', 'Berhasil', res.message);
                        setTimeout(function() { location.reload(); }, 1000);
                    } else {
                        Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                    }
                });
            });
        });

        // Modal delete button
        $(document).on('click', '#modalDeleteBtn', function() {
            const id = $(this).data('id');
            if (!id) return;
            confirmAction('Hapus Laporan?', 'Data tidak dapat dikembalikan', function() {
                apiPost('delete_report', { id: id }).done(function(res) {
                    if (res.status) {
                        closeReportModal();
                        showToast('success', 'Terhapus', res.message);
                        setTimeout(function() { location.reload(); }, 1000);
                    }
                });
            });
        });

        // Prevent row clicks from triggering buttons
        $('.table-row-hover').on('click', function(e) {
            if (!$(e.target).closest('button, a').length) return;
        });

        // ====== REPORT FILTER (RT/Sekretaris) ======
        $(document).on('change', '#filterType, #filterStatus', function() {
            const typeFilter = $('#filterType').val();
            const statusFilter = $('#filterStatus').val();
            const $rows = $('.report-row');
            let visibleCount = 0;

            $rows.each(function() {
                const $row = $(this);
                const rowType = $row.data('type') || 'public';
                const rowStatus = $row.data('status') || 'pending';
                const matchType = (typeFilter === 'all') || (rowType === typeFilter);
                const matchStatus = (statusFilter === 'all') || (rowStatus === statusFilter);

                if (matchType && matchStatus) {
                    $row.show();
                    visibleCount++;
                } else {
                    $row.hide();
                }
            });

            if (typeFilter !== 'all' || statusFilter !== 'all') {
                $rows.first().closest('tbody').find('.filter-empty').remove();
                if (visibleCount === 0) {
                    $rows.first().closest('tbody').append('<tr class="filter-empty"><td colspan="5" class="px-6 py-8 text-center text-sm text-on-surface-variant">Tidak ada laporan yang cocok dengan filter</td></tr>');
                }
            } else {
                $rows.first().closest('tbody').find('.filter-empty').remove();
            }
        });

        // ====== EDIT ANNOUNCEMENT (RT & Sekretaris) ======
        $(document).on('click', '.edit-btn', function(e) {
            e.stopPropagation();
            const id = $(this).data('id');
            if (!id) return;
            Swal.fire({
                title: 'Edit Pengumuman',
                html: '<div class="text-left"><label class="block text-xs font-bold mb-1">Judul</label><input id="swal-edit-title" class="w-full border rounded-lg p-2 mb-3" placeholder="Judul pengumuman"><label class="block text-xs font-bold mb-1">Isi</label><textarea id="swal-edit-content" class="w-full border rounded-lg p-2" rows="4" placeholder="Isi pengumuman"></textarea></div>',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#0F6E6B',
                preConfirm: () => {
                    const t = $('#swal-edit-title').val();
                    const c = $('#swal-edit-content').val();
                    if (!t || !c) { Swal.showValidationMessage('Semua field wajib diisi'); return false; }
                    return { id, title: t, content: c };
                }
            }).then(r => {
                if (r.isConfirmed) {
                    Swal.fire({ title: 'Menyimpan...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                    apiPost('update_announcement', r.value).done(res => {
                        if (res.status) { showToast('success', 'Berhasil', res.message); setTimeout(() => location.reload(), 1000); }
                        else Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                    });
                }
            });
        });

        // ====== VIEW REPORT (Sekretaris) ======
        $(document).on('click', '.view-btn', function(e) {
            e.stopPropagation();
            const id = $(this).data('id');
            if (id) openReportModal(id);
        });

        // ====== FILTER BTN (warga pengumuman) ======
        $(document).on('click', '.filter-btn', function() {
            const $btn = $(this);
            const text = $btn.text().trim().toLowerCase();
            $('.filter-btn').removeClass('active bg-primary text-white shadow-md').addClass('bg-white border border-outline-variant/40 text-on-surface-variant');
            $btn.addClass('active bg-primary text-white shadow-md').removeClass('bg-white border border-outline-variant/40 text-on-surface-variant');
            if (text === 'semua') {
                $('.grid .bg-white.rounded-xl.shadow-card').show();
            } else {
                $('.grid .bg-white.rounded-xl.shadow-card').each(function() {
                    const cardText = $(this).text().toLowerCase();
                    $(this).toggle(cardText.includes(text));
                });
            }
        });

        // ====== READ MORE / FEATURED READ (pengumuman detail) ======
        $(document).on('click', '.read-more-btn, .featured-read-btn', function(e) {
            e.preventDefault();
            const $card = $(this).closest('.bg-white, .relative');
            const title = $card.find('h3, h4').first().text().trim();
            const content = $card.find('p').first().next('p').text().trim() || $card.find('p.line-clamp-2').text().trim();
            Swal.fire({
                title: `<span style="font-family:'Newsreader',serif;font-size:1.15rem;font-weight:700;color:#0F6E6B">${title}</span>`,
                html: `<div style="font-family:'Public Sans',sans-serif;font-size:0.875rem;color:#4F5B5B;text-align:left;line-height:1.7">${content || 'Tidak ada detail tersedia.'}</div>`,
                confirmButtonColor: '#0F6E6B',
                confirmButtonText: 'Tutup',
                width: '36rem'
            });
        });

        // ====== HELP GUIDE (warga surat) ======
        $(document).on('click', '.help-guide-btn', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Panduan Pengajuan Surat',
                html: `<div style="text-align:left;font-size:0.875rem;color:#4F5B5B;line-height:1.8">
                    <p><b>1. SK Domisili</b> — Surat keterangan berdomisili. Wajib tinggal minimal 6 bulan di wilayah RT.</p>
                    <p><b>2. SKU (Usaha)</b> — Surat Keterangan Usaha untuk keperluan perizinan usaha.</p>
                    <p><b>3. Surat Nikah</b> — Surat pengantar nikah dari RT untuk pengurusan di KUA.</p>
                    <p><b>4. SKCK</b> — Surat keterangan tidak catatan kriminal dari kepolisian.</p>
                    <hr style="margin:0.75rem 0;border-color:#D1D9D2">
                    <p>Semua surat akan diverifikasi oleh Ketua RT dan diterbitkan secara digital.</p>
                </div>`,
                confirmButtonColor: '#0F6E6B',
                confirmButtonText: 'Mengerti'
            });
        });

        // ====== EMERGENCY CALL (warga laporan) ======
        $(document).on('click', '#emergencyCallBtn', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Kontak Pengurus RT',
                html: `<div style="text-align:center;font-size:0.875rem;color:#4F5B5B">
                    <p style="margin-bottom:1rem">Hubungi pengurus RT untuk keadaan darurat:</p>
                    <div style="background:#F4EFE8;padding:1rem 1.5rem;border-radius:0.75rem;display:inline-flex;flex-direction:column;gap:0.5rem">
                        <div style="display:flex;align-items:center;gap:0.5rem;justify-content:center"><span style="font-weight:700;font-size:1.1rem">0812-3456-7890</span></div>
                        <div style="font-size:0.75rem;color:#666">Ketua RT 02 / RW 04</div>
                    </div>
                </div>`,
                confirmButtonColor: '#0F6E6B',
                confirmButtonText: 'Tutup'
            });
        });

        // ====== RT QUICK ACTIONS ======
        // Tanda Tangan Digital -> goes to surat page
        $(document).on('click', '.btn-action', function(e) {
            const text = $(this).text().trim();
            if (text.includes('Tanda Tangan Digital')) {
                e.preventDefault();
                window.location.href = "<?= base_url('rt/surat') ?>";
            }
        });

        // Broadcast Info -> opens pengumuman page
        $(document).on('click', '.btn-action', function(e) {
            const text = $(this).text().trim();
            if (text.includes('Broadcast Info')) {
                e.preventDefault();
                window.location.href = "<?= base_url('rt/pengumuman') ?>";
            }
        });

        // Jadwal Rapat -> open Swal form
        $(document).on('click', '.btn-action', function(e) {
            const text = $(this).text().trim();
            if (text.includes('Jadwal Rapat')) {
                e.preventDefault();
                Swal.fire({
                    title: 'Buat Jadwal Rapat',
                    html: '<div class="text-left">' +
                        '<label class="block text-xs font-bold mb-1">Judul Rapat</label>' +
                        '<input id="swal-judul" class="w-full border rounded-lg p-2 mb-3" placeholder="Contoh: Rapat Koordinasi RT">' +
                        '<label class="block text-xs font-bold mb-1">Tanggal</label>' +
                        '<input type="date" id="swal-tanggal" class="w-full border rounded-lg p-2 mb-3">' +
                        '<label class="block text-xs font-bold mb-1">Jam</label>' +
                        '<input type="time" id="swal-jam" class="w-full border rounded-lg p-2 mb-3">' +
                        '<label class="block text-xs font-bold mb-1">Lokasi</label>' +
                        '<input id="swal-lokasi" class="w-full border rounded-lg p-2 mb-3" placeholder="Pos RT / Balai Warga" value="Pos RT">' +
                        '<label class="block text-xs font-bold mb-1">Catatan</label>' +
                        '<textarea id="swal-catatan" class="w-full border rounded-lg p-2" rows="2" placeholder="Agenda rapat..."></textarea>' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonText: 'Buat Jadwal',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#0F6E6B',
                    preConfirm: () => {
                        const t = $('#swal-judul').val();
                        const d = $('#swal-tanggal').val();
                        if (!t || !d) { Swal.showValidationMessage('Judul dan tanggal wajib diisi'); return false; }
                        return { title: t, date: d, time: $('#swal-jam').val(), location: $('#swal-lokasi').val(), description: $('#swal-catatan').val() };
                    }
                }).then(r => {
                    if (r.isConfirmed) {
                        Swal.fire({ title: 'Menyimpan...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                        apiPost('create_jadwal', r.value).done(res => {
                            if (res.status) { showToast('success', 'Berhasil', res.message); setTimeout(() => location.reload(), 1000); }
                            else Swal.fire({ icon: 'error', title: 'Gagal', text: res.message, confirmButtonColor: '#0F6E6B' });
                        });
                    }
                });
            }
        });

        // ====== EXPORT PDF KEUANGAN ======
        $(document).on('click', '.download-laporan-pdf', function(e) {
            e.preventDefault();
            window.open("<?= base_url('pdf/keuangan') ?>", '_blank');
        });

        // ====== NOTIFICATION BELL ======
        $(document).on('click', '#notifBtn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const $dropdown = $('#notifDropdown');
            if (!$dropdown.length) {
                // Create dropdown
                const html = '<div id="notifDropdown" class="absolute right-0 mt-3 w-80 bg-white rounded-xl shadow-lg border border-outline-variant/40 overflow-hidden z-50">' +
                    '<div class="px-4 py-3 border-b flex justify-between items-center">' +
                    '<span class="text-sm font-bold text-on-surface">Notifikasi</span>' +
                    '<button id="markAllRead" class="text-[10px] text-primary font-bold hover:underline">Tandai semua dibaca</button>' +
                    '</div>' +
                    '<div id="notifList" class="max-h-80 overflow-y-auto">' +
                    '<div class="px-4 py-6 text-center text-sm text-on-surface-variant">Memuat...</div>' +
                    '</div>' +
                    '</div>';
                $(this).parent().css('position', 'relative').append(html);
                $dropdown = $('#notifDropdown');
                loadNotifications();
            }
            $dropdown.toggleClass('hidden');
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#notifBtn, #notifDropdown').length) {
                $('#notifDropdown').addClass('hidden');
            }
        });

        $(document).on('click', '#markAllRead', function(e) {
            e.preventDefault();
            apiPost('mark_notification_read', {}).done(function() {
                $('#notifBadge').addClass('hidden').text('0');
                $('#notifList').html('<div class="px-4 py-6 text-center text-sm text-on-surface-variant">Tidak ada notifikasi baru</div>');
            });
        });

        function loadNotifications() {
            $.ajax({ url: API_BASE + '/get_notifications', type: 'GET', dataType: 'json' })
            .done(function(res) {
                if (res.status && res.data.length > 0) {
                    let html = '';
                    res.data.forEach(function(n) {
                        const unread = n.is_read == 0 ? 'bg-primary/5 border-l-2 border-primary' : '';
                        const icon = n.type === 'letter' ? 'description' : (n.type === 'report' ? 'campaign' : 'notifications');
                        html += '<div class="px-4 py-3 border-b border-outline-variant/20 ' + unread + ' cursor-pointer hover:bg-surface-container-low transition notif-item" data-id="' + n.id + '">' +
                            '<div class="flex items-start gap-3">' +
                            '<span class="material-symbols-outlined text-primary text-lg mt-0.5">' + icon + '</span>' +
                            '<div class="flex-1 min-w-0">' +
                            '<p class="text-xs font-semibold text-on-surface">' + (n.title || 'Notifikasi') + '</p>' +
                            '<p class="text-[10px] text-on-surface-variant mt-0.5 truncate">' + (n.message || '') + '</p>' +
                            '<p class="text-[9px] text-on-surface-variant/60 mt-1">' + (n.created_at ? new Date(n.created_at).toLocaleDateString('id-ID', {day:'numeric',month:'short',hour:'2-digit',minute:'2-digit'}) : '') + '</p>' +
                            '</div></div></div>';
                    });
                    $('#notifList').html(html);
                } else {
                    $('#notifList').html('<div class="px-4 py-6 text-center text-sm text-on-surface-variant">Tidak ada notifikasi</div>');
                }
            });
        }

        $(document).on('click', '.notif-item', function() {
            const id = $(this).data('id');
            apiPost('mark_notification_read', { id: id }).done(function() {
                loadNotifications();
                const badge = $('#notifBadge');
                const current = parseInt(badge.text()) || 0;
                if (current > 1) badge.text(current - 1);
                else badge.addClass('hidden').text('0');
            });
        });

        // ====== PAGINATION (disabled for now) ======
        $(document).on('click', '.w-8.h-8, .w-9.h-9', function() {
            const icon = $(this).find('.material-symbols-outlined');
            if (icon.length && (icon.text().includes('chevron_left') || icon.text().includes('chevron_right'))) {
                showToast('info', 'Segera Hadir', 'Halaman berikutnya akan segera tersedia');
            }
        });
    });
    </script>
    </body>
    </html>

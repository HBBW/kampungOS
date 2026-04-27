<!-- Content Area -->
<div class="flex-1 p-4 sm:p-6 md:p-8 w-full animate-fade-in">
    <div class="max-w-7xl mx-auto w-full">

        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center gap-2 mb-3">
                <span class="h-px w-8 bg-primary"></span>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-primary">Informasi Terkini</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-headline font-bold text-on-surface mb-3">Kabar Lingkungan</h2>
            <p class="text-on-surface-variant text-sm sm:text-base max-w-2xl">Informasi terkini, pengumuman penting, dan kegiatan hangat dari RT 04 RW 02.</p>
        </div>

        <!-- Featured Section -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-12">
            <!-- Main Featured Article -->
            <div class="lg:col-span-8 relative rounded-2xl overflow-hidden shadow-large group min-h-[400px] sm:min-h-[450px]">
                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://images.unsplash.com/photo-1593113630400-ea4288922497?w=800&h=500&fit=crop" alt="Taman baca warga">
                <div class="absolute inset-0 featured-gradient"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8 text-white z-10">
                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="bg-tertiary/90 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">Penting</span>
                        <span class="text-white/70 text-xs flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">event</span>
                            14 Oktober 2023
                        </span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-headline font-bold mb-3 leading-tight group-hover:text-primary-faded transition-colors">Peresmian Taman Baca Warga &amp; Gazebo RT 04</h3>
                    <p class="text-sm text-white/80 max-w-xl mb-5 line-clamp-2">Setelah pengerjaan selama 3 minggu penuh gotong royong, akhirnya taman baca kebanggaan kita siap digunakan.</p>
                    <button class="featured-read-btn bg-primary hover:bg-primary-dark text-white px-6 py-2.5 rounded-xl font-bold text-sm transition-all inline-flex items-center gap-2">
                        Baca Selengkapnya
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>

            <!-- Side Cards -->
            <div class="lg:col-span-4 space-y-5">
                <!-- Security Card -->
                <div class="bg-white rounded-xl p-5 shadow-card border border-outline-variant/20 card-hover">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-tertiary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-tertiary text-xl" style="font-variation-settings: 'FILL' 1;">security</span>
                        </div>
                        <span class="text-[9px] font-bold text-on-surface-variant uppercase tracking-wider">Keamanan</span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-lg mb-2">Jadwal Ronda Malam Terbaru</h4>
                    <p class="text-sm text-on-surface-variant mb-4">Terdapat penyesuaian jadwal untuk tim hari Selasa dan Jumat.</p>
                    <a href="#" class="inline-flex items-center gap-1 text-primary text-sm font-semibold hover:gap-2 transition-all">
                        Lihat Jadwal <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>

                <!-- Event Card -->
                <div class="bg-gradient-to-br from-primary/5 to-primary/10 rounded-xl p-5 border border-primary/20 card-hover">
                    <span class="inline-block bg-primary text-white text-[10px] font-bold px-2 py-0.5 rounded-full mb-3">Kegiatan</span>
                    <h4 class="font-headline font-bold text-on-surface text-lg mb-2">Kerja Bakti: Persiapan Musim Hujan</h4>
                    <div class="flex items-center gap-3 mt-3 pt-3 border-t border-primary/10">
                        <div class="bg-primary text-white w-10 h-10 rounded-xl flex flex-col items-center justify-center">
                            <span class="text-sm font-bold leading-none">22</span>
                            <span class="text-[8px] font-bold uppercase">Okt</span>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-on-surface">07:30 - Selesai</p>
                            <p class="text-[10px] text-primary font-semibold">Area Selokan Utama</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap gap-2 mb-8 pb-4 border-b border-outline-variant/30">
            <button class="filter-btn active px-5 py-2 rounded-full text-sm font-semibold transition-all bg-primary text-white shadow-md">Semua</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Kegiatan</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Pembangunan</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Keamanan</button>
            <button class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all bg-white border border-outline-variant/40 text-on-surface-variant hover:border-primary hover:text-primary">Kesehatan</button>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                <div class="h-48 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1557425955-df376b88c6d2?w=400&h=250&fit=crop" alt="Rapat warga">
                    <div class="absolute top-3 left-3">
                        <span class="bg-white/90 backdrop-blur text-tertiary text-[10px] font-bold px-2.5 py-1 rounded-full">Rapat RT</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span>2 hari lalu</span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-base mb-2 group-hover:text-primary transition-colors">Hasil Notulensi Rapat Bulanan September 2023</h4>
                    <p class="text-sm text-on-surface-variant line-clamp-2 mb-4">Pembahasan mencakup pengelolaan dana sampah, rencana penambahan CCTV di gang III.</p>
                    <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-primary/20 flex items-center justify-center text-primary text-xs font-bold">SR</div>
                            <span class="text-xs font-semibold text-on-surface-variant">Sekretaris RT</span>
                        </div>
                        <button class="read-more-btn text-primary text-sm font-semibold hover:underline">Baca</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                <div class="h-48 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=400&h=250&fit=crop" alt="Penghijauan">
                    <div class="absolute top-3 left-3">
                        <span class="bg-white/90 backdrop-blur text-primary text-[10px] font-bold px-2.5 py-1 rounded-full">Lingkungan</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span>4 hari lalu</span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-base mb-2 group-hover:text-primary transition-colors">Program 'Satu Rumah Satu Pohon' Dimulai</h4>
                    <p class="text-sm text-on-surface-variant line-clamp-2 mb-4">Mendukung program Kelurahan Hijau, RT 04 akan membagikan bibit pohon jambu dan mangga.</p>
                    <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-secondary/20 flex items-center justify-center text-secondary text-xs font-bold">IS</div>
                            <span class="text-xs font-semibold text-on-surface-variant">Ibu Siti</span>
                        </div>
                        <button class="read-more-btn text-primary text-sm font-semibold hover:underline">Baca</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                <div class="h-48 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1576765608535-6f04d6a2b2d9?w=400&h=250&fit=crop" alt="Posyandu">
                    <div class="absolute top-3 left-3">
                        <span class="bg-white/90 backdrop-blur text-error text-[10px] font-bold px-2.5 py-1 rounded-full">Kesehatan</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span>1 minggu lalu</span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-base mb-2 group-hover:text-primary transition-colors">Jadwal Imunisasi Balita di Posyandu Melati</h4>
                    <p class="text-sm text-on-surface-variant line-clamp-2 mb-4">Diingatkan kepada warga yang memiliki balita untuk hadir di Posyandu hari Rabu depan.</p>
                    <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-tertiary/20 flex items-center justify-center text-tertiary text-xs font-bold">KM</div>
                            <span class="text-xs font-semibold text-on-surface-variant">Kader Melati</span>
                        </div>
                        <button class="read-more-btn text-primary text-sm font-semibold hover:underline">Baca</button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                <div class="h-48 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=400&h=250&fit=crop" alt="Perbaikan jalan">
                    <div class="absolute top-3 left-3">
                        <span class="bg-white/90 backdrop-blur text-primary text-[10px] font-bold px-2.5 py-1 rounded-full">Infrastruktur</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span>1 minggu lalu</span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-base mb-2 group-hover:text-primary transition-colors">Perbaikan Jalan Lingkungan Blok B</h4>
                    <p class="text-sm text-on-surface-variant line-clamp-2 mb-4">Akan dilakukan pengaspalan ulang jalan di area Blok B mulai tanggal 25 Oktober.</p>
                    <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-primary/20 flex items-center justify-center text-primary text-xs font-bold">RT</div>
                            <span class="text-xs font-semibold text-on-surface-variant">Pengurus RT</span>
                        </div>
                        <button class="read-more-btn text-primary text-sm font-semibold hover:underline">Baca</button>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                <div class="h-48 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=400&h=250&fit=crop" alt="Lomba 17 Agustus">
                    <div class="absolute top-3 left-3">
                        <span class="bg-white/90 backdrop-blur text-tertiary text-[10px] font-bold px-2.5 py-1 rounded-full">Kegiatan</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span>2 minggu lalu</span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-base mb-2 group-hover:text-primary transition-colors">Persiapan Lomba HUT Kemerdekaan</h4>
                    <p class="text-sm text-on-surface-variant line-clamp-2 mb-4">Pendaftaran lomba 17 Agustus dibuka untuk seluruh warga RT 04.</p>
                    <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-tertiary/20 flex items-center justify-center text-tertiary text-xs font-bold">PN</div>
                            <span class="text-xs font-semibold text-on-surface-variant">Panitia</span>
                        </div>
                        <button class="read-more-btn text-primary text-sm font-semibold hover:underline">Baca</button>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-card border border-outline-variant/20 card-hover group">
                <div class="h-48 overflow-hidden relative">
                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=400&h=250&fit=crop" alt="Donor darah">
                    <div class="absolute top-3 left-3">
                        <span class="bg-white/90 backdrop-blur text-error text-[10px] font-bold px-2.5 py-1 rounded-full">Kesehatan</span>
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                        <span class="material-symbols-outlined text-sm">schedule</span>
                        <span>2 minggu lalu</span>
                    </div>
                    <h4 class="font-headline font-bold text-on-surface text-base mb-2 group-hover:text-primary transition-colors">Kegiatan Donor Darah Bersama PMI</h4>
                    <p class="text-sm text-on-surface-variant line-clamp-2 mb-4">Donor darah akan dilaksanakan di Balai Warga pada Minggu, 29 Oktober 2023.</p>
                    <div class="flex items-center justify-between pt-3 border-t border-outline-variant/20">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-error/20 flex items-center justify-center text-error text-xs font-bold">PM</div>
                            <span class="text-xs font-semibold text-on-surface-variant">PMI</span>
                        </div>
                        <button class="read-more-btn text-primary text-sm font-semibold hover:underline">Baca</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
-- =============================================
-- KampungOS - PostgreSQL Schema for Supabase
-- Run this in Supabase SQL Editor
-- =============================================

-- 1. USERS TABLE
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    kk_number VARCHAR(20) UNIQUE NOT NULL,
    nik VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    head_name VARCHAR(100) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'warga',
    address TEXT,
    must_reset_password SMALLINT NOT NULL DEFAULT 1,
    family_members_count INT DEFAULT 0,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- 2. FAMILY MEMBERS TABLE
CREATE TABLE IF NOT EXISTS family_members (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    name VARCHAR(100),
    nik VARCHAR(20),
    relation VARCHAR(50),
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- 3. REPORTS TABLE
CREATE TABLE IF NOT EXISTS reports (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    location VARCHAR(255),
    report_type VARCHAR(20) NOT NULL DEFAULT 'public',
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- 4. REPORT IMAGES TABLE
CREATE TABLE IF NOT EXISTS report_images (
    id SERIAL PRIMARY KEY,
    report_id INT NOT NULL REFERENCES reports(id) ON DELETE CASCADE,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- 5. ANNOUNCEMENTS TABLE
CREATE TABLE IF NOT EXISTS announcements (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    category VARCHAR(100) NOT NULL DEFAULT 'umum',
    created_by INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    is_active SMALLINT NOT NULL DEFAULT 1,
    is_pinned SMALLINT NOT NULL DEFAULT 0,
    image VARCHAR(255),
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- 6. LETTER REQUESTS TABLE
CREATE TABLE IF NOT EXISTS letter_requests (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    nik VARCHAR(20),
    type VARCHAR(20) NOT NULL,
    purpose TEXT NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    approved_by INT REFERENCES users(id),
    approved_at TIMESTAMPTZ,
    created_at TIMESTAMPTZ DEFAULT NOW(),
    CONSTRAINT valid_type CHECK (type IN ('domisili', 'usaha', 'nikah', 'skck')),
    CONSTRAINT valid_status CHECK (status IN ('pending', 'approved', 'rejected'))
);

-- 7. LETTERS TABLE (generated when approved)
CREATE TABLE IF NOT EXISTS letters (
    id SERIAL PRIMARY KEY,
    request_id INT NOT NULL REFERENCES letter_requests(id) ON DELETE CASCADE,
    letter_number VARCHAR(50) NOT NULL UNIQUE,
    generated_at TIMESTAMPTZ DEFAULT NOW()
);

-- 8. LETTER NUMBERING TABLE (auto-increment per year)
CREATE TABLE IF NOT EXISTS letter_numbering (
    id SERIAL PRIMARY KEY,
    year INT NOT NULL UNIQUE,
    last_number INT NOT NULL DEFAULT 0
);

-- 9. CASH TRANSACTIONS TABLE
CREATE TABLE IF NOT EXISTS cash_transactions (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    type VARCHAR(20) NOT NULL,
    amount NUMERIC(15,2) NOT NULL DEFAULT 0,
    description TEXT NOT NULL,
    category VARCHAR(100) NOT NULL DEFAULT 'umum',
    created_by INT REFERENCES users(id),
    created_at TIMESTAMPTZ DEFAULT NOW(),
    CONSTRAINT valid_cash_type CHECK (type IN ('income', 'expense'))
);

-- 10. NOTIFICATIONS TABLE
CREATE TABLE IF NOT EXISTS notifications (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    title VARCHAR(255),
    message TEXT,
    type VARCHAR(50) DEFAULT 'info',
    link VARCHAR(255),
    is_read SMALLINT NOT NULL DEFAULT 0,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- 11. ACTIVITY LOGS TABLE
CREATE TABLE IF NOT EXISTS activity_logs (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    action TEXT NOT NULL,
    created_at TIMESTAMPTZ DEFAULT NOW()
);

-- =============================================
-- SEED DATA - Dummy Users
-- =============================================
-- Password: password123 (hashed with password_hash)
INSERT INTO users (kk_number, nik, password, head_name, role, address, must_reset_password) VALUES
('3275000000000001', '327500000001', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ahmad Sudirman', 'rt', 'Jl. Kampung Sari No. 1, RT 02/RW 04', 0),
('3275000000000002', '327500000002', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Siti Rahayu', 'sekretaris', 'Jl. Kampung Sari No. 5, RT 02/RW 04', 0),
('3275000000000003', '327500000003', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Budi Santoso', 'bendahara', 'Jl. Kampung Sari No. 8, RT 02/RW 04', 0),
('3275000000000004', '327500000004', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dewi Lestari', 'warga', 'Jl. Kampung Sari No. 12, RT 02/RW 04', 0),
('3275000000000005', '327500000005', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Rudi Hermawan', 'warga', 'Jl. Kampung Sari No. 15, RT 02/RW 04', 0),
('3275000000000006', '327500000006', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Rina Wati', 'warga', 'Jl. Kampung Sari No. 20, RT 02/RW 04', 0);

-- =============================================
-- SEED DATA - Sample Announcements
-- =============================================
INSERT INTO announcements (title, content, category, created_by, is_active) VALUES
('Kerja Bakti Bulanan', 'Diundang untuk kerja bakti bersama membersihkan lingkungan pada hari Minggu pukul 07.00 WIB. Tempat kumpul: Pos RT.', 'Kegiatan Warga', 1, 1),
('Pemberitahuan Jadwal Ronda', 'Jadwal ronda malam berganti minggu ini. Kelompok A (RT 01-03) tugas hari Senin dan Rabu. Kelompok B (RT 04-06) tugas hari Selasa dan Kamis.', 'Keamanan', 1, 1),
('Pembangunan Jalan Lingkungan', 'Akan ada pembangunan paving block jalan lingkungan mulai tanggal 15. Mohon kendaraan diparkir di luar area.', 'Pembangunan', 1, 1);

-- =============================================
-- SEED DATA - Sample Transactions
-- =============================================
INSERT INTO cash_transactions (user_id, type, amount, description, category, created_by) VALUES
(1, 'income', 500000, 'Iuran warga bulan Januari', 'iuran', 1),
(1, 'income', 500000, 'Iuran warga bulan Februari', 'iuran', 1),
(1, 'expense', 150000, 'Pembelian alat kebersihan', 'operasional', 1),
(1, 'income', 500000, 'Iuran warga bulan Maret', 'iuran', 1),
(1, 'expense', 200000, 'Perbaikan lampu jalan', 'maintenance', 1),
(3, 'income', 500000, 'Iuran warga bulan April', 'iuran', 3),
(3, 'expense', 75000, 'Pembelian lampu LED', 'maintenance', 3);

-- =============================================
-- SEED DATA - Sample Letter Requests
-- =============================================
INSERT INTO letter_requests (user_id, nik, type, purpose, status, approved_by, approved_at) VALUES
(4, '327500000004', 'domisili', 'Pengajuan KTP baru', 'approved', 1, NOW()),
(5, '327500000005', 'usaha', 'Pengajuan izin usaha warung', 'pending', NULL, NULL),
(6, '327500000006', 'skck', 'Persyaratan melamar kerja', 'approved', 1, NOW());

-- Generated letters for approved requests
INSERT INTO letters (request_id, letter_number, generated_at) VALUES
(1, 'SKD/0001/2026', NOW()),
(3, 'SKCK/0001/2026', NOW());

-- Letter numbering
INSERT INTO letter_numbering (year, last_number) VALUES (2026, 2);

-- =============================================
-- SEED DATA - Sample Reports
-- =============================================
INSERT INTO reports (user_id, title, description, category, location, report_type, status) VALUES
(4, 'Lampu jalan mati', 'Lampu jalan di depan rumah No. 12 sudah mati sejak 3 hari yang lalu. Mohon segera diperbaiki.', 'lampu jalan', 'Depan No. 12', 'public', 'pending'),
(5, 'Sampah menumpuk', 'Tumpukan sampah di taman warga belum diangkut. Sudah 2 hari bau mulai menyengat.', 'sampah', 'Taman Warga', 'public', 'diproses'),
(6, 'Pagar rusak', 'Pagar pembatas komplek rusak setelah hujan deras. Berpotensi bahaya untuk anak-anak.', 'infrastruktur', 'Gerbang Utama', 'private', 'pending');

-- =============================================
-- INDEXES for performance
-- =============================================
CREATE INDEX idx_users_kk_number ON users(kk_number);
CREATE INDEX idx_users_role ON users(role);
CREATE INDEX idx_reports_user_id ON reports(user_id);
CREATE INDEX idx_reports_status ON reports(status);
CREATE INDEX idx_reports_created_at ON reports(created_at);
CREATE INDEX idx_announcements_is_active ON announcements(is_active);
CREATE INDEX idx_announcements_created_at ON announcements(created_at);
CREATE INDEX idx_letter_requests_user_id ON letter_requests(user_id);
CREATE INDEX idx_letter_requests_status ON letter_requests(status);
CREATE INDEX idx_letters_request_id ON letters(request_id);
CREATE INDEX idx_cash_transactions_user_id ON cash_transactions(user_id);
CREATE INDEX idx_cash_transactions_type ON cash_transactions(type);
CREATE INDEX idx_cash_transactions_created_at ON cash_transactions(created_at);
CREATE INDEX idx_notifications_user_id ON notifications(user_id);
CREATE INDEX idx_notifications_is_read ON notifications(is_read);
CREATE INDEX idx_activity_logs_user_id ON activity_logs(user_id);

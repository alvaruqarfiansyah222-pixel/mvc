CREATE DATABASE IF NOT EXISTS perpustakaan_mvc;

USE perpustakaan_mvc;


-- =========================
-- TABEL BUKU
-- =========================

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode VARCHAR(30),
    judul VARCHAR(150),
    pengarang VARCHAR(100),
    penerbit VARCHAR(100),
    tahun INT,
    stok INT DEFAULT 0
);


-- =========================
-- TABEL ANGGOTA
-- =========================

CREATE TABLE anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    telepon VARCHAR(30)
);


-- =========================
-- TABEL PEMINJAMAN
-- =========================

CREATE TABLE peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_buku INT,
    id_anggota INT,
    tanggal_pinjam DATE,
    tanggal_kembali DATE NULL,
    status ENUM('Dipinjam', 'Kembali') DEFAULT 'Dipinjam',

    FOREIGN KEY (id_buku)
        REFERENCES buku(id),

    FOREIGN KEY (id_anggota)
        REFERENCES anggota(id)
);


-- =========================
-- DATA AWAL BUKU
-- =========================

INSERT INTO buku (
    kode,
    judul,
    pengarang,
    penerbit,
    tahun,
    stok
) VALUES
(
    'BK001',
    'Laskar Pelangi',
    'Andrea Hirata',
    'Bentang',
    2005,
    5
),
(
    'BK002',
    'Bumi',
    'Tere Liye',
    'Gramedia',
    2014,
    4
),
(
    'BK003',
    'Pemrograman PHP',
    'Andi',
    'Andi Offset',
    2023,
    3
);
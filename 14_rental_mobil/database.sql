-- ==========================================
-- DATABASE RENTAL MOBIL MVC
-- ==========================================

CREATE DATABASE IF NOT EXISTS rental_mobil_mvc;

USE rental_mobil_mvc;


-- ==========================================
-- TABEL MOBIL
-- ==========================================

CREATE TABLE mobil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nopol VARCHAR(20),
    nama VARCHAR(100),
    merk VARCHAR(80),
    tahun INT,
    harga_harian DECIMAL(12,2),
    status ENUM('Tersedia', 'Dirental') DEFAULT 'Tersedia'
);


-- ==========================================
-- TABEL PELANGGAN
-- ==========================================

CREATE TABLE pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    no_telepon VARCHAR(30),
    alamat VARCHAR(200)
);


-- ==========================================
-- TABEL RENTAL
-- ==========================================

CREATE TABLE rental (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_mobil INT,
    id_pelanggan INT,
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    total DECIMAL(12,2),
    status ENUM('Berjalan', 'Selesai') DEFAULT 'Berjalan',

    FOREIGN KEY (id_mobil)
        REFERENCES mobil(id),

    FOREIGN KEY (id_pelanggan)
        REFERENCES pelanggan(id)
);


-- ==========================================
-- DATA AWAL MOBIL
-- ==========================================

INSERT INTO mobil (
    nopol,
    nama,
    merk,
    tahun,
    harga_harian
) VALUES
(
    'L 1234 AB',
    'Avanza',
    'Toyota',
    2022,
    350000
),
(
    'L 5678 CD',
    'Brio',
    'Honda',
    2023,
    300000
),
(
    'L 9012 EF',
    'Xenia',
    'Daihatsu',
    2021,
    325000
);
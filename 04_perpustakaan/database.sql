CREATE DATABASE IF NOT EXISTS `perpustakaan` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `perpustakaan`;
DROP TABLE IF EXISTS `perpustakaan`;
CREATE TABLE `perpustakaan` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_peminjam VARCHAR(120) NOT NULL, buku VARCHAR(120) NOT NULL, tanggal_pinjam DATE NOT NULL, lama_pinjam INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `perpustakaan` (nama_peminjam, buku, tanggal_pinjam, lama_pinjam) VALUES ('Contoh Peminjam', 'Contoh', '2026-09-19', 1);

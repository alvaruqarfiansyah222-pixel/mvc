CREATE DATABASE IF NOT EXISTS `data_buku` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `data_buku`;
DROP TABLE IF EXISTS `data_buku`;
CREATE TABLE `data_buku` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(120) NOT NULL, penulis VARCHAR(120) NOT NULL, kategori VARCHAR(120) NOT NULL, stok INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `data_buku` (judul, penulis, kategori, stok) VALUES ('Contoh', 'Contoh', 'Pelajaran', 1);

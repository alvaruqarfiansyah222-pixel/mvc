CREATE DATABASE IF NOT EXISTS `inventaris` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `inventaris`;
DROP TABLE IF EXISTS `inventaris`;
CREATE TABLE `inventaris` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(120) NOT NULL, kategori VARCHAR(120) NOT NULL, stok INT NOT NULL, kondisi VARCHAR(120) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `inventaris` (nama_barang, kategori, stok, kondisi) VALUES ('Contoh Barang', 'Elektronik', 1, 'Baik');

CREATE DATABASE IF NOT EXISTS `04_tiket` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `04_tiket`;
DROP TABLE IF EXISTS `tikets`;
CREATE TABLE `tikets` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL, kategori VARCHAR(30) NOT NULL, jumlah INT NOT NULL, harga DECIMAL(12,2) NOT NULL, total DECIMAL(12,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `tikets` (nama, kategori, jumlah, harga, total)
VALUES ('Contoh', 'Contoh', 'Contoh', 25000, 50000);

CREATE DATABASE IF NOT EXISTS `data_laptop` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `data_laptop`;
DROP TABLE IF EXISTS `data_laptop`;
CREATE TABLE `data_laptop` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pemilik VARCHAR(120) NOT NULL, merek VARCHAR(120) NOT NULL, tipe VARCHAR(120) NOT NULL, tahun INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `data_laptop` (pemilik, merek, tipe, tahun) VALUES ('Contoh', 'Contoh', 'Contoh', 1);

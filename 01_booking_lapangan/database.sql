CREATE DATABASE IF NOT EXISTS `01_booking_lapangan` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `01_booking_lapangan`;
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL, lapangan VARCHAR(50) NOT NULL, jam VARCHAR(30) NOT NULL, jumlah_orang INT NOT NULL, harga_per_orang DECIMAL(12,2) NOT NULL, total DECIMAL(12,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `bookings` (nama, lapangan, jam, jumlah_orang, harga_per_orang, total)
VALUES ('Contoh', 'Contoh', 'Contoh', 'Contoh', 10000, 20000);

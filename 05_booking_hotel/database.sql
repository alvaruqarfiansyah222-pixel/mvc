CREATE DATABASE IF NOT EXISTS `05_booking_hotel` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `05_booking_hotel`;
DROP TABLE IF EXISTS `hotel_bookings`;
CREATE TABLE `hotel_bookings` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL, tipe_kamar VARCHAR(30) NOT NULL, malam INT NOT NULL, orang INT NOT NULL, harga_per_malam DECIMAL(12,2) NOT NULL, total DECIMAL(12,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO `hotel_bookings` (nama, tipe_kamar, malam, orang, harga_per_malam, total)
VALUES ('Contoh', 'Contoh', 'Contoh', 'Contoh', 200000, 200000);

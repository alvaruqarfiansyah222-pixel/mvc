# Booking Lapangan

## Cara menjalankan
1. Pastikan XAMPP Apache dan MySQL aktif.
2. Copy folder ini ke `C:\xampp\htdocs\`.
3. Buka phpMyAdmin: `http://localhost/phpmyadmin`
4. Import file `database.sql`.
5. Buka: `http://localhost/01_booking_lapangan/`

## Struktur MVC
- `models/DataModel.php` = akses database
- `controllers/DataController.php` = proses CRUD + perhitungan
- `views/` = tampilan
- `config/database.php` = koneksi MySQL
- `index.php` = router sederhana

# Penjualan

Project MVC latihan ujian.

## Cara menjalankan
1. Aktifkan Apache dan MySQL di XAMPP.
2. Copy folder `12_penjualan` ke `C:\xampp\htdocs\`.
3. Buka `http://localhost/phpmyadmin`.
4. Import `database.sql`.
5. Buka `http://localhost/12_penjualan/`.

## Pola MVC
- Model: `models/DataModel.php`
- Controller: `controllers/DataController.php`
- View: `views/`
- Database: `config/database.php`
- Router: `index.php`

## Fitur
- Tampil data
- Tambah data
- Edit data
- Hapus data
- Perhitungan subtotal harga × jumlah

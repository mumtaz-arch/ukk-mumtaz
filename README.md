# Sistem Inventaris Fakhri 📦

Aplikasi web untuk mengelola inventaris barang dengan fitur transaksi masuk/keluar, laporan, dan export data.

## 🎯 Tujuan Project

Project ini dikembangkan sebagai **studi kasus UKK Level 3** untuk membuat sistem inventaris yang:
- Memudahkan pencatatan barang masuk dan keluar
- Mengelola stok dan harga barang
- Membuat laporan dengan export ke Excel dan PDF
- Menyediakan dashboard untuk monitoring real-time

## ✨ Fitur Utama

- **🔐 Sistem Authentication**
  - Login dan Logout
  - Session management
  - Password hashing dengan bcrypt

- **📊 Dashboard**
  - Overview inventaris
  - Statistik stok dan transaksi
  - Akses cepat ke semua modul

- **📦 Manajemen Barang**
  - Tambah barang baru
  - Edit data barang
  - Hapus barang
  - Lihat daftar semua barang dengan stok terkini

- **💱 Manajemen Transaksi**
  - Pencatatan barang masuk
  - Pencatatan barang keluar
  - Riwayat semua transaksi
  - Keterangan transaksi

- **📈 Laporan**
  - Laporan inventaris lengkap
  - Export ke Excel (.xlsx)
  - Export ke PDF

## 🛠️ Teknologi yang Digunakan

- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Frontend:** HTML5, CSS3, JavaScript
- **Web Server:** Apache (Laragon/XAMPP)
- **Library Tambahan:** PHPExcel/OpenSpout untuk export Excel, mPDF untuk export PDF

## 📋 Prasyarat

Sebelum install, pastikan sudah terinstall:
- **Laragon** atau **XAMPP** (untuk Apache, PHP, dan MySQL)
- **Git** (opsional, untuk clone repository)
- **Browser modern** (Chrome, Firefox, Edge, dll)

## 🚀 Cara Instalasi

### 1. Clone atau Download Project

**Menggunakan Git:**
```bash
git clone https://github.com/username/ukk-mumtaz.git
cd inventaris-fakhri
```

**Atau Download Manual:**
- Download file dari repository
- Extract ke folder project

### 2. Tempatkan Folder di Web Server

Pindahkan folder project ke direktori web server:

**Untuk Laragon:**
```
C:\laragon\www\ukk-mumtaz\
```

**Untuk XAMPP:**
```
C:\xampp\htdocs\ukk-mumtaz\
```

### 3. Setup Database

**Langkah 1:** Buka phpMyAdmin
- Laragon: Klik kanan pada Laragon → `Database` → `PHPMyAdmin`
- XAMPP: Buka `http://localhost/phpmyadmin`

**Langkah 2:** Import database
- Pilih tab `Import`
- Upload file `database.sql` dari folder project
- Klik tombol `Import`

Atau gunakan command line:
```bash
mysql -u root < database.sql
```

**Langkah 3:** Verifikasi database
- Database `inventaris_fakhri` harus sudah terbuat
- Tabel: `users`, `barang`, `transaksi` sudah ada

### 4. Konfigurasi Database (Opsional)

Jika menggunakan username/password MySQL yang berbeda, edit file:
```
app/config/koneksi.php
```

Ubah konfigurasi sesuai setup MySQL Anda:
```php
$host = "localhost";
$user = "root";         // Sesuaikan dengan username MySQL Anda
$password = "";         // Sesuaikan dengan password MySQL Anda
$database = "inventaris_fakhri";
```

### 5. Jalankan Aplikasi

**Untuk Laragon:**
- Pastikan Laragon sudah running
- Akses: `http://ukk-mumtaz.test` atau `http://localhost/ukk-mumtaz`

**Untuk XAMPP:**
- Pastikan Apache dan MySQL sudah running
- Akses: `http://localhost/ukk-mumtaz`

## 🔑 Akun Default

Setelah import database, gunakan akun admin:

- **Username:** `admin`
- **Password:** `admin123`

⚠️ **PENTING:** Ubah password admin setelah login pertama kali untuk keamanan!

## 📁 Struktur Folder

```
ukk-mumtaz/
├── app/
│   ├── assets/              # CSS dan JavaScript
│   │   ├── css/
│   │   └── js/
│   ├── auth/                # Login dan Logout
│   │   ├── login.php
│   │   └── logout.php
│   ├── barang/              # CRUD Barang
│   │   ├── index.php
│   │   ├── tambah.php
│   │   ├── edit.php
│   │   ├── hapus.php
│   │   ├── export_excel.php
│   │   └── export_pdf.php
│   ├── transaksi/           # Manajemen Transaksi
│   │   ├── masuk.php
│   │   ├── keluar.php
│   │   └── riwayat.php
│   ├── laporan/             # Laporan dan Export
│   │   ├── index.php
│   │   ├── export_excel.php
│   │   └── export_pdf.php
│   ├── config/              # Konfigurasi
│   │   ├── config.php
│   │   └── koneksi.php
│   ├── includes/            # Template Header/Footer
│   │   ├── header.php
│   │   └── footer.php
│   └── dashboard.php        # Dashboard utama
├── database.sql             # Database schema
├── index.php                # Entry point
├── setup_admin.php          # Tool setup admin (opsional)
├── test_login.php           # Test login (opsional)
└── README.md                # File ini
```

## 📖 Cara Menggunakan

### 1. Login
- Buka aplikasi dan login dengan akun admin
- Masukkan username dan password

### 2. Dashboard
- Lihat overview inventaris
- Akses semua modul dari menu

### 3. Manajemen Barang
- **Lihat Barang:** Menu Barang → List semua barang
- **Tambah Barang:** Klik tombol "Tambah Barang"
  - Isi nama barang, stok, dan harga
  - Klik "Simpan"
- **Edit Barang:** Klik tombol "Edit" pada barang yang ingin diubah
- **Hapus Barang:** Klik tombol "Hapus" untuk menghapus

### 4. Transaksi
- **Barang Masuk:** Input barang yang diterima
- **Barang Keluar:** Input barang yang dikeluarkan
- **Riwayat:** Lihat history semua transaksi

### 5. Laporan
- Lihat laporan inventaris lengkap
- Export ke Excel untuk analisis lanjutan
- Export ke PDF untuk arsip atau cetak

## 🐛 Troubleshooting

### Error: "Database Connection Failed"
- Pastikan MySQL sudah running
- Periksa username dan password di `app/config/koneksi.php`
- Pastikan database `inventaris_fakhri` sudah di-import

### Error: "Headers already sent"
- Pastikan tidak ada whitespace atau BOM di awal file PHP
- Jangan ada output sebelum `header()` dipanggil

### Halaman Blank atau Error 500
- Periksa error log di folder `logs/` (jika ada)
- Aktifkan display errors di `php.ini` untuk debug
- Pastikan semua file konfigurasi sudah diisi dengan benar

### Export PDF/Excel tidak bekerja
- Pastikan library PHPExcel dan mPDF sudah terinstall
- Cek permissions folder `temp/` atau `uploads/` (jika ada)

## 🔒 Keamanan

- Password disimpan dengan hashing (bcrypt)
- Session management untuk autentikasi
- Input validation untuk mencegah SQL injection
- Belum ada CSRF protection (TODO)

**Rekomendasi:**
- Ubah password admin default setelah instalasi
- Gunakan HTTPS di production
- Backup database secara berkala

## 📝 Catatan Pengembang

- Base URL otomatis terdeteksi dari struktur folder
- Kompatibel dengan folder project dengan nama apapun
- Dokumentasi inline tersedia di setiap file

## 📄 Lisensi

Project ini dibuat untuk tujuan pendidikan UKK Level 3.

## 👨‍💻 Tentang

Dikembangkan sebagai studi kasus sistem inventaris sederhana dengan fitur-fitur dasar yang sering digunakan di dunia kerja.

## 📞 Support

Jika ada pertanyaan atau issue, silakan buat issue di repository atau hubungi developer.

---

**Selamat menggunakan Sistem Inventaris Fakhri! 🎉**

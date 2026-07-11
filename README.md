<div align="center">
  <h1>🛒 Groceria - Aplikasi E-Commerce Sembako</h1>
  <p>
    Aplikasi web e-commerce sederhana yang dibangun dengan <strong>Laravel</strong> untuk simulasi toko online sembako.
  </p>
</div>

---

## ✨ Fitur Utama

Aplikasi ini memiliki dua peran utama: **Pelanggan** dan **Admin**.

### Untuk Pelanggan:
*   👤 **Autentikasi**: Registrasi, Login, Logout, dan Lupa Password.
*   🛍️ **Katalog Produk**: Menjelajahi produk, melihat detail, mencari, dan memfilter berdasarkan kategori.
*   🛒 **Keranjang Belanja**: Menambah produk ke keranjang, mengubah kuantitas, dan melihat subtotal.
*   💳 **Proses Checkout**: Mengisi alamat pengiriman dan menyelesaikan pesanan.
*   📄 **Invoice**: Melihat dan mengunduh invoice setelah pesanan berhasil dibuat.
*   ⚙️ **Manajemen Profil**: Mengubah data pribadi dan password.

### Untuk Admin:
*   🔐 **Akses Terbatas**: Halaman admin hanya bisa diakses oleh pengguna dengan peran 'admin'.
*   📊 **Dashboard**: Halaman utama untuk admin.
*   📦 **Manajemen Produk**: Fungsi CRUD (Create, Read, Update, Delete) untuk mengelola data produk.

## 🛠️ Teknologi yang Digunakan

*   **Backend**: PHP 8.1+, [Laravel](https://laravel.com/)
*   **Frontend**: HTML, CSS, JavaScript
*   **Database**: MySQL
*   **Server**: Apache / Nginx (atau server bawaan Laravel)

## 🚀 Panduan Instalasi & Menjalankan Aplikasi

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal Anda.

### 1. Prasyarat
Pastikan perangkat Anda sudah terinstal:
- [PHP](https://www.php.net/downloads.php) (>= 8.1)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/) & NPM
- Database (misalnya: MySQL, MariaDB)

### 2. Clone Repository
Buka terminal atau command prompt, lalu clone repository ini.
```bash
git clone https://github.com/fira-aho/groceria.git
cd NAMA_REPO_ANDA
```

### 3. Instalasi Dependensi
Instal semua dependensi PHP yang dibutuhkan menggunakan Composer.
```bash
composer install
```

### 4. Konfigurasi Lingkungan
Salin file `.env.example` menjadi `.env` dan generate kunci aplikasi.
```bash
# Untuk Windows (Command Prompt)
copy .env.example .env

# Untuk Linux/macOS atau Git Bash
cp .env.example .env

php artisan key:generate
```

### 5. Konfigurasi Database
Buka file `.env` dan sesuaikan konfigurasi database Anda.
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=groceria # Buat database dengan nama ini
DB_USERNAME=root     # Sesuaikan dengan username database Anda
DB_PASSWORD=         # Sesuaikan dengan password database Anda
```
Pastikan Anda sudah membuat database kosong dengan nama yang sesuai (contoh: `groceria`).

### 6. Migrasi Database
Jalankan migrasi untuk membuat semua tabel yang dibutuhkan oleh aplikasi.
```bash
php artisan migrate
```

*(Opsional)* Jika Anda memiliki seeder untuk data awal (misal: akun admin, produk), jalankan perintah berikut:
```bash
php artisan db:seed
```

### 7. Jalankan Server
Terakhir, jalankan server pengembangan lokal Laravel.
```bash
php artisan serve
```
Aplikasi Anda sekarang dapat diakses melalui browser di alamat **http://127.0.0.1:8000**.

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah MIT License.

# Warungku

Warungku adalah website toko sembako yang dibuat menggunakan Laravel. Website ini digunakan untuk membantu admin mengelola data produk dan kategori barang.

## Fitur

- Login admin
- Dashboard admin
- Tambah, edit, lihat, dan hapus produk
- Tambah, edit, lihat, dan hapus kategori
- Pencarian produk
- Filter stok barang
- Upload gambar produk

## Teknologi

- Laravel
- PHP
- MySQL
- Tailwind CSS
- JavaScript
- Vite

## Cara Menjalankan Project

1. Clone repository:

   ```bash
   git clone https://github.com/fahriajah0986-hub/warungku.git
   ```

2. Masuk ke folder project:

   ```bash
   cd warungku
   ```

3. Install dependency:

   ```bash
   composer install
   npm install
   ```

4. Salin file `.env.example` menjadi `.env`.

5. Buat database MySQL dengan nama `warungku`, lalu sesuaikan konfigurasi database di file `.env`.

6. Jalankan perintah berikut:

   ```bash
   php artisan key:generate
   php artisan migrate
   ```

7. Jalankan Laravel:

   ```bash
   php artisan serve
   ```

8. Buka terminal baru dan jalankan:

   ```bash
   npm run dev
   ```

9. Buka alamat `http://127.0.0.1:8000` di browser.

## Repository

GitHub: https://github.com/fahriajah0986-hub/warungku

---

Project Warungku dibuat untuk pengembangan website pengelolaan toko sembako.

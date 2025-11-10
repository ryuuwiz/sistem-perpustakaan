# Sistem Perpustakaan

Sistem manajemen perpustakaan berbasis Laravel 12 untuk mengelola data anggota, buku, kategori, denda, peminjaman, hingga laporan PDF. Aplikasi ini dibangun di atas Laravel Breeze + Tailwind sehingga tampilannya responsif dan mudah dikembangkan.

## Fitur

- **Manajemen Anggota & Pengguna** – CRUD lengkap untuk anggota perpustakaan dan pengguna aplikasi.
- **Katalog Buku & Kategori** – Kelola buku, kategori, dan detail seperti ISBN, tahun, jumlah halaman, serta tanggal input.
- **Peminjaman Terintegrasi** – Catat transaksi pinjam beserta detail banyak buku sekaligus, tentukan lama pinjam, denda, dan petugas.
- **Denda & Detail Pinjam** – Atur nominal denda serta relasi buku yang dipinjam per transaksi.
- **Laporan PDF** – Unduh laporan anggota, buku, dan peminjaman dalam format PDF menggunakan `barryvdh/laravel-dompdf`.
- **Dashboard Statistik** – Ringkasan cepat jumlah entitas utama setelah login.

## Teknologi

- PHP 8.2+, Laravel 12, Laravel Breeze
- MariaDB/MySQL
- Tailwind CSS, Alpine.js, Vite
- DOMPDF untuk eksport PDF

## Prasyarat

| Komponen | Versi yang disarankan |
| --- | --- |
| PHP | ≥ 8.2 (beserta ekstensi `ctype`, `curl`, `fileinfo`, `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`) |
| Composer | ≥ 2.6 |
| Node.js & NPM | Node ≥ 18, NPM ≥ 9 |
| Database | MariaDB/MySQL |

## Instalasi

```bash
git clone https://github.com/<username>/sistem-perpustakaan.git
cd sistem-perpustakaan
composer install
cp .env.example .env   # atau copy manual di Windows
```

1. Konfigurasikan koneksi database di `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
2. Generate application key dan jalankan migrasi:
   ```bash
   php artisan key:generate
   php artisan migrate --seed   # jalankan tanpa --seed jika tidak diperlukan
   ```
3. Install dependensi front-end:
   ```bash
   npm install
   ```

## Menjalankan Aplikasi

```bash
php artisan serve        # http://localhost:8000
npm run dev              # menjalankan Vite & Tailwind JIT
```

Untuk build produksi:
```bash
npm run build
```

## Testing & Quality

- Jalankan unit/feature test: `php artisan test`
- Format kode PHP (opsional): `./vendor/bin/pint`

## Struktur Penting

| Path | Deskripsi |
| --- | --- |
| `app/Http/Controllers` | Logika CRUD untuk anggota, buku, peminjaman, denda, laporan, dll. |
| `app/Http/Requests` | Validasi terstruktur untuk setiap modul. |
| `resources/views` | Blade view berbasis Breeze + Tailwind. |
| `resources/views/reports` | Template PDF untuk ekspor laporan. |

## Laporan & Ekspor

- Menu **Reports** (akun terotentikasi) menampilkan daftar laporan.  
- Tombol unduh akan menghasilkan PDF menggunakan DOMPDF. Sesuaikan template di `resources/views/reports/pdf/*.blade.php` bila ingin mengubah tampilan.

## Kontribusi
Pull request dan issue selalu terbuka. Silakan buat branch baru, ikuti gaya kode PSR-12, lalu ajukan PR setelah semua tes lulus.

## Lisensi
Proyek ini menggunakan lisensi [MIT](LICENSE). Silakan digunakan, dimodifikasi, dan didistribusikan sesuai kebutuhan.

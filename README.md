# KosComplain — Laravel 12

## Pemrograman Berbasis Web

**Anggota Kelompok**
| No. | Nama | NIM |
|---|---|---|
| 1. | Muhammad shehan algi | 4524210069 |
| 2. | Ririn Verdawati | 4524210090 |
| 3. | Rizka Ainun Nazori | 4524210092 |
| 4. | Sarah Syafitri Hilmi | 4524210096 |
| 5. | Maria Natalia Alyssa Beli | 4524210133 |

**Dosen Pengampu**: Bambang Riono Arsad, S.Kom., MMSI

**Program Studi Teknik Informatika**  
**Fakultas Teknik Universitas Pancasila**  
**2026/2027**

---

Aplikasi pengaduan penghuni kos dengan dua role: `penghuni` dan `admin`.

## Fitur
- Registrasi/login/logout dan pembatasan akses berbasis role.
- Dashboard penghuni dan admin dengan statistik.
- Penghuni membuat laporan, mengunggah bukti, melihat laporan sendiri, detail, tanggapan, dan riwayat status.
- Admin mencari/filter semua laporan, mengubah status, dan mengirim tanggapan.
- Profil dan penggantian password.
- Migration, relasi Eloquent, serta akun/data contoh.

## Kebutuhan
PHP >= 8.2 dengan ekstensi `ctype`, `curl`, `dom`, `fileinfo`, `filter`, `hash`, `mbstring`, `openssl`, `pcre`, `pdo`, `pdo_mysql`, `session`, `tokenizer`, `xml`; Composer 2; MySQL 8/MariaDB; Node tidak wajib karena Bootstrap dimuat dari CDN.

## Instalasi Windows (XAMPP + VS Code)
1. Install XAMPP yang menyediakan PHP 8.2+ dan aktifkan Apache serta MySQL. Untuk menjalankan Laravel via `php artisan serve`, Apache tidak wajib aktif.
2. Install Composer dari https://getcomposer.org/ dan pastikan Composer menggunakan PHP XAMPP. Buka terminal baru, cek `php -v` dan `composer -V`.
3. Buat database bernama `koscomplain` melalui phpMyAdmin.
4. Ekstrak folder project, buka folder `KosComplain` di VS Code.
5. Jalankan:
   ```bash
   composer install
   copy .env.example .env
   php artisan key:generate
   ```
6. Pastikan pengaturan `DB_*` pada `.env` sesuai MySQL lokal (default XAMPP: user `root`, password kosong).
7. Jalankan:
   ```bash
   php artisan migrate --seed
   php artisan storage:link
   php artisan serve
   ```
8. Buka http://127.0.0.1:8000

## Akun pengujian
- Admin: `admin@koscomplain.test` / `password123`
- Penghuni: `penghuni@koscomplain.test` / `password123`

Segera ganti password akun contoh sebelum aplikasi digunakan sungguhan.

## Catatan
- Registrasi publik selalu membuat role `penghuni`; role admin hanya dibuat melalui seeder atau pengelolaan database oleh pemilik sistem.
- Foto bukti disimpan pada disk `public` dan ditampilkan melalui symbolic link `public/storage`.
- Akses detail laporan penghuni diperiksa berdasarkan `user_id`; akses admin diproteksi middleware `role:admin`.
- Bootstrap dan Bootstrap Icons menggunakan CDN, sehingga koneksi internet diperlukan untuk memuat aset tersebut.
- Aplikasi ini adalah source project awal yang disiapkan dari spesifikasi tugas. Jalankan instalasi dan lakukan pengujian lokal sesuai checklist tugas sebelum demo/pengumpulan.
"# UAS-PBW-A-KosComplain-Kelompok-8" 

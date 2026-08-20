# Sistem Informasi Persuratan

Sistem Informasi Persuratan merupakan aplikasi berbasis web yang dikembangkan untuk membantu pengelolaan administrasi surat secara terkomputerisasi, meliputi pencatatan, pengelolaan, penyimpanan, disposisi, dan pelaporan surat.

Aplikasi ini dikembangkan menggunakan **Laravel** dan ditujukan untuk membantu proses administrasi persuratan agar lebih terstruktur, terdokumentasi, dan mudah diakses.

## Fitur

### Autentikasi

- Login pengguna
- Logout
- Manajemen sesi pengguna

### Surat Masuk

- Menampilkan daftar surat masuk
- Menambahkan surat masuk
- Mengubah data surat masuk
- Melihat detail surat
- Menghapus surat
- Upload dan penyimpanan file
- Integrasi penyimpanan Google Drive
- Pencarian dan filter data

### Surat Keluar

- Menampilkan daftar surat keluar
- Menambahkan surat keluar
- Mengubah data surat keluar
- Melihat detail surat
- Menghapus surat
- Integrasi penyimpanan Google Drive
- Pencarian dan filter data

### Disposisi

- Membuat disposisi dari surat masuk
- Mengelola data disposisi
- Mengatur sifat surat
- Menambahkan catatan disposisi
- Mencetak dokumen disposisi

### Surat Keputusan

- Menambahkan data Surat Keputusan
- Mengubah data Surat Keputusan
- Melihat detail Surat Keputusan
- Menghapus Surat Keputusan
- Upload file Surat Keputusan
- Penyimpanan file melalui Google Drive
- Download file

### Arsip

- Pengelolaan arsip surat
- Penyimpanan data surat yang telah diarsipkan

### Laporan

- Laporan Surat Masuk
- Laporan Surat Keluar
- Filter berdasarkan periode tanggal
- Export/cetak laporan dalam format PDF
- Header dan footer dokumen laporan

---

## Teknologi

| Teknologi        | Versi                |
| ---------------- | -------------------- |
| Laravel          | 9.52.21              |
| PHP              | 8.4.1                |
| Composer         | 2.8.8                |
| Database         | MySQL / MariaDB      |
| Bootstrap        | 5                    |
| Vite             | 4.5.14               |
| Node.js          | LTS direkomendasikan |
| Google Drive API | OAuth 2.0            |

---

## Persyaratan Sistem

Sebelum melakukan instalasi, pastikan perangkat/server telah memiliki:

- PHP >= 8.1
- Composer
- MySQL atau MariaDB
- Node.js dan npm
- Web server seperti Apache atau Nginx
- Git
- Ekstensi PHP yang dibutuhkan Laravel
- Koneksi internet untuk integrasi Google Drive

Untuk deployment production, disarankan menggunakan:

- PHP 8.4
- MySQL/MariaDB
- HTTPS/SSL
- Web server Apache atau Nginx

---

# Instalasi

## 1. Clone Repository

```bash
git clone https://github.com/AIFProject/persuratan.git
cd persuratan
```

## 2. Install Dependency PHP

```bash
composer install
```

Untuk environment production:

```bash
composer install --no-dev --optimize-autoloader
```

## 3. Install Dependency Frontend

```bash
npm install
```

## 4. Build Asset Frontend

```bash
npm run build
```

Jika proses berhasil, Vite akan menghasilkan asset production di dalam:

```text
public/build/
```

## 5. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Windows:

```bash
copy .env.example .env
```

Linux/macOS:

```bash
cp .env.example .env
```

Kemudian sesuaikan konfigurasi di dalam `.env`.

Contoh:

```env
APP_NAME="Sistem Informasi Persuratan"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=persuratan
DB_USERNAME=root
DB_PASSWORD=
```

## 6. Generate Application Key

```bash
php artisan key:generate
```

## 7. Konfigurasi Database

Buat database baru, kemudian sesuaikan konfigurasi berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=persuratan
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration:

```bash
php artisan migrate
```

Jika aplikasi memiliki seeder yang diperlukan:

```bash
php artisan db:seed
```

Atau:

```bash
php artisan migrate --seed
```

> **Catatan:** Jangan menggunakan `migrate:fresh` pada database production karena perintah tersebut akan menghapus tabel dan data yang sudah ada.

## 8. Storage Link

Jalankan:

```bash
php artisan storage:link
```

Jika symbolic link sudah tersedia, perintah ini tidak perlu dijalankan kembali.

---

# Konfigurasi Google Drive

Aplikasi menggunakan Google Drive sebagai media penyimpanan file surat.

Konfigurasi Google Drive membutuhkan kredensial OAuth 2.0.

Tambahkan konfigurasi yang diperlukan pada `.env`:

```env
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REFRESH_TOKEN=
```

Nilai tersebut harus diperoleh dari konfigurasi Google Cloud yang digunakan oleh sistem.

### Catatan Keamanan

Jangan menyimpan credential Google Drive secara langsung di repository.

File `.env` harus tetap berada di environment server dan **tidak boleh di-commit ke Git**.

Untuk deployment instansi, disarankan menggunakan akun Google milik instansi sebagai pemilik penyimpanan dokumen, bukan akun pribadi pengembang.

---

# Menjalankan Aplikasi pada Environment Development

Jalankan server Laravel:

```bash
php artisan serve
```

Secara default aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

Untuk menjalankan Vite dalam mode development:

```bash
npm run dev
```

---

# Konfigurasi Production

Untuk deployment production, ubah konfigurasi `.env` menjadi:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.example
```

Database harus menggunakan database production:

```env
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Setelah konfigurasi selesai, jalankan:

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Periksa konfigurasi aplikasi:

```bash
php artisan about
```

Pada production, pastikan:

```text
Environment      production
Debug Mode       OFF
Config           CACHED
Routes           CACHED
Views            CACHED
```

---

# Deployment

Aplikasi Laravel harus diarahkan ke direktori:

```text
public/
```

sebagai document root.

Contoh struktur pada server:

```text
persuratan/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
└── artisan
```

Document root web server harus menunjuk ke:

```text
/path/to/persuratan/public
```

Jangan menjadikan root project Laravel sebagai document root karena dapat mengekspos file aplikasi yang seharusnya tidak dapat diakses langsung melalui web.

---

# Database Backup

Sebelum deployment atau migrasi server, lakukan backup database.

Contoh menggunakan `mysqldump`:

```bash
mysqldump -u USERNAME -p DATABASE_NAME > persuratan_backup.sql
```

Database backup sebaiknya disimpan secara aman dan tidak diunggah ke repository publik.

---

# Keamanan

Beberapa hal yang harus diperhatikan ketika aplikasi digunakan pada production:

- Jangan mengaktifkan `APP_DEBUG=true`.
- Jangan mengunggah file `.env` ke repository.
- Jangan membagikan `APP_KEY`.
- Jangan membagikan Google Client Secret dan Refresh Token secara publik.
- Gunakan HTTPS pada production.
- Gunakan password database yang kuat.
- Lakukan backup database secara berkala.
- Gunakan akun Google milik instansi untuk penyimpanan dokumen production.
- Batasi akses server dan database hanya kepada pihak yang berwenang.

---

# Struktur Database

Aplikasi menggunakan beberapa tabel utama untuk mengelola administrasi persuratan, antara lain:

- `users`
- `surat_masuk`
- `surat_keluar`
- `disposisi`
- `surat_keputusans`
- `arsip`

Struktur database dikelola menggunakan Laravel Migration sehingga database dapat dibuat dan diperbarui melalui Artisan.

Untuk melihat status migration:

```bash
php artisan migrate:status
```

---

# Maintenance

Beberapa perintah yang berguna untuk maintenance aplikasi:

### Membersihkan cache

```bash
php artisan optimize:clear
```

### Mengoptimalkan aplikasi

```bash
php artisan optimize
```

### Melihat status migration

```bash
php artisan migrate:status
```

### Melihat informasi aplikasi

```bash
php artisan about
```

### Melihat log aplikasi

```text
storage/logs/laravel.log
```

---

## Production Deployment Checklist

### Application Readiness

- [x] Source code tersedia
- [x] Database migration tersedia
- [x] `APP_ENV=production`
- [x] `APP_DEBUG=false`
- [x] Config cache tersedia
- [x] Route cache tersedia
- [x] View cache tersedia
- [x] `npm run build` berhasil
- [x] Authentication berfungsi
- [x] Surat Masuk berfungsi
- [x] Surat Keluar berfungsi
- [x] Disposisi berfungsi
- [x] Surat Keputusan berfungsi
- [x] Arsip berfungsi
- [x] Laporan PDF berfungsi
- [x] Integrasi Google Drive berfungsi pada environment development
- [x] `.env.example` tersedia
- [x] Dokumentasi tersedia
- [x] Database backup tersedia

### Production Infrastructure

- [ ] Server/hosting tersedia
- [ ] Domain tersedia
- [ ] HTTPS/SSL aktif
- [ ] Database production dibuat
- [ ] Konfigurasi `.env` production
- [ ] Database production terhubung
- [ ] Storage link tersedia
- [ ] Google Drive OAuth production dikonfigurasi
- [ ] Aplikasi dapat diakses melalui domain
- [ ] Upload file berhasil
- [ ] Download file berhasil
- [ ] Login berhasil
- [ ] Seluruh fitur utama diuji pada production
- [ ] Backup production dikonfigurasi

### Handover

- [ ] Source code diserahkan
- [ ] Database backup diserahkan
- [ ] Dokumentasi diserahkan
- [ ] Informasi deployment diserahkan
- [ ] Sistem diuji bersama pihak instansi
- [ ] Sistem diterima oleh pihak instansi

---

# Status Pengembangan

Sistem Informasi Persuratan telah menyelesaikan fitur utama pengelolaan persuratan dan telah dipersiapkan untuk deployment pada environment production.

Deployment ke server production membutuhkan konfigurasi infrastruktur seperti hosting/server, database production, domain, HTTPS, serta konfigurasi OAuth Google Drive sesuai lingkungan instansi.

---

# Pengembang

**Sistem Informasi Persuratan**

Dikembangkan sebagai bagian dari kegiatan **Praktik Kerja Lapangan (PKL)**.

Repository:

https://github.com/AIFProject/persuratan

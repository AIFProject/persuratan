# Sistem Persuratan

Aplikasi berbasis web untuk mengelola proses administrasi surat secara digital. Sistem ini dibuat untuk membantu pengelolaan surat masuk, surat keluar, serta proses pencatatan dan distribusi dokumen agar lebih terstruktur.

## 🚀 Teknologi yang Digunakan

* **Framework**: Laravel 9
* **Bahasa Pemrograman**: PHP
* **Database**: MySQL
* **Frontend**: Blade Template, CSS, JavaScript
* **Package Manager**: Composer & NPM

## 📌 Fitur Utama

* Manajemen surat masuk
* Manajemen surat keluar
* Pengelolaan data surat
* Routing dan modul persuratan
* Penyimpanan data berbasis database
* Sistem autentikasi pengguna
* Dashboard pengelolaan surat

## 🛠️ Persyaratan Sistem

Pastikan perangkat sudah memiliki:

* PHP >= 8.0
* Composer
* Node.js & NPM
* MySQL / MariaDB
* Git

## 📥 Instalasi

1. Clone repository

```bash
git clone https://github.com/AIFProject/persuratan.git
```

2. Masuk ke direktori project

```bash
cd persuratan
```

3. Install dependency Laravel

```bash
composer install
```

4. Install dependency frontend

```bash
npm install
```

5. Buat file environment

```bash
cp .env.example .env
```

6. Generate application key

```bash
php artisan key:generate
```

7. Konfigurasi database pada file `.env`

Contoh:

```env
DB_DATABASE=persuratan
DB_USERNAME=root
DB_PASSWORD=
```

8. Jalankan migrasi database

```bash
php artisan migrate
```

9. Jalankan aplikasi

```bash
php artisan serve
```

10. Jalankan frontend development server

```bash
npm run dev
```

Aplikasi dapat diakses melalui:

```
http://127.0.0.1:8000
```

## 📂 Struktur Project

```
app/
├── Http/
│   └── Controllers/
├── Models/

database/
├── migrations/
└── seeders/

resources/
├── views/
├── css/
└── js/

routes/
├── web.php
└── api.php
```

## 🤝 Kontribusi

Kontribusi sangat terbuka untuk pengembangan aplikasi ini.

Langkah kontribusi:

1. Fork repository
2. Buat branch baru

```bash
git checkout -b fitur-baru
```

3. Commit perubahan

```bash
git commit -m "Menambahkan fitur baru"
```

4. Push branch

```bash
git push origin fitur-baru
```

5. Buat Pull Request

## 📝 Lisensi

Project ini dibuat untuk kebutuhan pengembangan sistem informasi persuratan.

---

## 👥 Pengembang

**AIF Project**

Sistem Persuratan berbasis Laravel 9.

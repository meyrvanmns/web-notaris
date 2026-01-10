# 🏛️ Web Notaris

## 📌 Deskripsi
Web Notaris merupakan aplikasi berbasis web yang dikembangkan untuk memenuhi kebutuhan klien dalam menyediakan sistem informasi dan administrasi notaris secara digital. Aplikasi ini dirancang untuk membantu pengelolaan data, penyajian informasi, serta mendukung proses administrasi agar lebih terstruktur, efisien, dan mudah digunakan.

Pengembangan website ini mengikuti standar aplikasi web modern dan dapat dikembangkan lebih lanjut sesuai kebutuhan klien.

---

## ✨ Fitur Utama
- Sistem informasi notaris berbasis web
- Manajemen halaman dan konten
- Struktur aplikasi menggunakan pola MVC
- Antarmuka sederhana dan mudah digunakan
- Konfigurasi keamanan dasar aplikasi

---

## 🛠️ Teknologi yang Digunakan
- PHP (Laravel Framework)
- Blade Template (Bootstrap)
- MySQL
- HTML, CSS, JavaScript

---

## 💻 Persyaratan Sistem
- PHP 8.2
- Composer
- MySQL / MariaDB
- Laragon
- Web Browser

---

## 📥 Instalasi & Konfigurasi

### 1️⃣ Clone Repository
`git clone https://github.com/meyrvanmns/web-notaris.git`

`cd web-notaris`
### 2️⃣ Install Dependency
`composer install`
### 3️⃣ Konfigurasi Environment
`cp .env.example .env`

`php artisan key:generate`

---
## 🗄️ Import Database (.sql) – phpMyAdmin (Laragon)

1. Jalankan Laragon
2. Klik Menu → Database → phpMyAdmin
3. Buat database baru (contoh: `db_notaris`)
4. Pilih database tersebut
5. Masuk ke tab Import
6. Pilih file database .sql
7. Klik Go dan tunggu hingga proses import selesai
Sesuaikan konfigurasi database pada file `.env`:
``DB_DATABASE=db_notaris
DB_USERNAME=root
DB_PASSWORD=``



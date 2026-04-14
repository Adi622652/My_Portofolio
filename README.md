# 🌾 Subak Bali Digital Platform

Platform digital berbasis web untuk mendata, mengelola, dan menyajikan informasi sistem irigasi tradisional Subak di wilayah Bali yang merupakan Warisan Budaya UNESCO sejak 2012. Platform ini dibangun untuk mendukung pelestarian budaya melalui digitalisasi data terintegrasi.

---

## 🎯 Fitur Utama

### 🌐 Public Pages (Sisi Pengunjung)
- **Beranda**: Hero section, statistik data, sekilas tentang Subak, fitur platform, serta edukasi filosofi Tri Hita Karana.
- **Tentang Kami**: Informasi detail sejarah Subak, visi & misi platform, serta profil interaktif pengelola.
- **Data Subak**: Katalog lengkap seluruh Subak di Bali yang dilengkapi dengan filter pencarian berdasarkan kata kunci dan dropdown klasifikasi Kabupaten/Kota.
- **Detail Subak (Premium UI)**: Menampilkan data mendalam mengenai satu Subak dengan:
  - Antarmuka layout *2-column* yang modern dan bersih (tanpa garis tepi *border* di setiap ikon).
  - Tab Navigasi interaktif (Alpine.js) untuk memilah: Data Umum, Infrastruktur Irigasi, dan Kondisi Pertanian.
- **Kontak**: Formulir pengiriman pesan yang terhubung eksklusif ke WhatsApp pengelola beserta peta lokasi operasional.

### 🔒 Admin Panel (Sisi Pengelola)
- **Dashboard Interaktif**: Statistik jumlah data Subak, analisis data ketersediaan foto, serta tabel singkat ringkasan subak terbaru.
- **Manajemen Data Subak (CRUD)**: Fungsionalitas utuh untuk Menambah, Mengubah, Melihat, dan Menghapus detail Subak lengkap beserta fitur unggah *cover/foto* subak.
- **Manajemen Pengguna**: Akses untuk level *Superadmin* dalam menambah hak akses panitia/admin lain.

---

## 🛠️ Teknologi yang Digunakan (Tech Stack)
- **Framework**: Laravel 11.x (PHP ^8.2)
- **Template Engine**: Laravel Blade
- **Styling**: Tailwind CSS (Konfigurasi langsung JS script & custom classes)
- **Interactions**: Alpine.js (DOM manipulation & tabs system)
- **Ikon**: Font Awesome 6 (Vektor murni tanpa *inner shadow/border* background)
- **Database**: MySQL / MariaDB
- **Storage**: Laravel Local File Storage (Public symlink)

---

## 📂 Struktur File & Direktori Pendukung
Berikut penjelasan susunan folder yang digunakan di dalam *source-code* ini supaya modifikasi di kemudian hari lebih terarah:

```text
subak-bali/
│
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/         # Pusat sistem operasional dashboard admin (CRUD Subak, Kelola Akun)
│   │   ├── AuthController.php # Autentikasi sistem (Login & Log out) panel Admin
│   │   └── ...            # Controller utama sisi publik untuk penghidang halaman visitor
│   └── Models/            # Model yang langsung merepresentasikan tabel (Subak, User) di Database
│
├── database/
│   ├── migrations/        # Blueprint framework pembuatan dan konfigurasi tabel (Tipe Kolom)
│   └── seeders/           # File database filler untuk mengisi akun admin (Contoh: AdminSeeder)
│
├── public/                # Berisi aset statis yang bisa diakses di internet (favicon, cache lokal)
│
├── resources/
│   └── views/             # Direktori khusus tampilan HTML/antarmuka (Sisi Front-End)
│       ├── admin/         # Kumpulan halaman login, Dashboard, Form Tambah/Edit (Back-End View)
│       ├── layouts/       # Kerangka master dasar web global (`app.blade` & `admin.blade`)
│       └── pages/         # Halaman public pengunjung (home, about, contact, list index subak)
│
├── routes/
│   └── web.php            # File lalu lintas web (Registrasi seluruh fungsi pemanggilan URL)
│
└── .env.example           # Contoh referensi konfigurasi sensitif untuk Server / Database Anda
```

---

## 🔑 Informasi File Penting (Key Files)

Berikut adalah beberapa file krusial yang mengatur logika utama aplikasi ini:

### 1. `app/Models/Subak.php`
Ini adalah **Model** jantung dari aplikasi. File ini merepresentasikan tabel database `subaks` dan menyimpan seluruh atribut teknis Subak (luas lahan, sistem irigasi, kondisi pertanian). Di sini juga diatur logika pembuatan *slug* otomatis untuk URL yang ramah SEO.

### 2. `app/Http/Controllers/AdminSubakController.php`
Pengatur utama operasi **CRUD** (Create, Read, Update, Delete) di panel admin. Mengatur bagaimana data Subak divalidasi, disimpan, hingga proses manajemen unggah foto subak ke server.

### 3. `app/Http/Controllers/SubakController.php`
Mengatur bagaimana data Subak ditampilkan kepada pengunjung umum, termasuk logika pencarian dan filter daftar subak berdasarkan kabupaten.

### 4. `routes/web.php`
**Peta Navigasi** aplikasi. Semua alamat URL (routes) didaftarkan di sini, menghubungkan akses pengguna ke fungsi yang tepat di dalam Controller.

### 5. `app/Http/Middleware/AdminMiddleware.php`
Sistem **Keamanan** (Gatekeeper) yang memastikan halaman dashboard administrasi hanya dapat diakses oleh pengguna yang sudah login dengan hak akses Admin.

---

## 🆕 Pembaruan Terkini & Optimasi
- **Aesthetic Refinement**: Pembersihan antarmuka dari elemen *glassmorphism* berlebihan dan penggunaan "Naked Icons" (ikon tanpa kontainer background) untuk kesan yang lebih premium, bersih, dan modern.
- **Premium Detail UI**: Implementasi layout 2-kolom pada halaman detail Subak dengan sistem tab interaktif untuk pemisahan data teknis yang lebih rapi.
- **Railway Deployment Ready**: Penambahan konfigurasi `railway.json` untuk mendukung deployment ke platform cloud (Railway) secara otomatis.

---


---

## 🚀 Panduan Instalasi (Server Lokal)

Ikuti langkah-langkah di bawah secara berurutan apabila kode web (*Source Code*) ini dipindahkan dan ingin dijalankan pada komputer atau laptop milik orang lain:

### 1. Persiapan Kebutuhan Aplikasi
Pastikan komputer eksekutor setidaknya telah memasang beberapa piranti pendukung (*Environment*) berikut:
- PHP >= 8.2
- Composer (Dependency Manager andalan PHP)
- MySQL Service (Bisa sepaket instalasi XAMPP, Laragon, WAMP)

### 2. Clone atau Ekstrak Repository Project Lokal
Buka terminal (CMD / Git Bash) lalu *Clone* proyek ini (atau bisa juga langsung ekstrak `.zip` bawaan project ke `.zip` di posisi tujuan instalasi web seperti `C/xampp/htdocs`)
```bash
git clone <url-repository-anda/atau directory tujuan>
cd subak-bali
```

### 3. Install Dependensi PHP (Vendor)
Masukkan skrip eksekusi pembacaan perpustakaan backend dari Composer:
```bash
composer install
```

### 4. Konfigurasi Sistem Identitas Environment
Buat file env utama. Copy file `.env.example` lalu *rename* (ubah nama copy-nya) menjadi titik-env yakni `.env`.
JIka di Command-line Windows Anda bisa melayangkan:
```bash
copy .env.example .env
```
Segera bangkitkan kunci perlindungan enkripsi keamanan aplikasi:
```bash
php artisan key:generate
```

### 5. Setup Dan Konfigurasi Database (MySQL)
- Jalankan modul `MySQL` pada interface XAMPP.
- Buka **PhpMyAdmin** (Tautan standard `http://localhost/phpmyadmin/`).
- Buatlah **Satu buah Database baru yang kosong** (Misal beri namanya: `subakbali`).
- Buka kembali kode sumber (`IDE VSCode`), sunting baris kode konfigurasi sensitif koneksi ke database Anda di dalam file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=subakbali    # !! Wajib Disamakan dengan nama DB kosong yang ada phpmyadmin !
DB_USERNAME=root         # !! Username defaultnya root (Khas local XAMPP)
DB_PASSWORD=             # !! Password default umumnya dibiarkan blank
```

### 6. Migrasikan Tabel dan Akun Default Admin
Ini untuk menerjemahkan skema Framework Database ke MySQL betulan, dan *menginjeksi* *dummy entry* untuk kredensial default admin:
```bash
php artisan migrate
php artisan db:seed
```

### 7. Hubungkan Hak Izin Folder Storage
Jembatani aset storage symlink agar seluruh gambar (cover_foto) yang pernah diupload bebas dirender oleh Browser Web:
```bash
php artisan storage:link
```

### 8. Jalankan Virtual Server Secara Optimal!
Misi instalasi sudah purna. Bebaskan eksekusi:
```bash
php artisan serve
```
Akses hasil aplikasi secara *live* melalui link browser: **`http://localhost:8000`** atau **`http://127.0.0.1:8000`**

---

## 🔐 Kredensial Login Akses Admin
Anda mutlak dapat mengakses masuk halaman operasi Admin khusus di navigasi URL `http://127.0.0.1:8000/admin/login` dengan info kunci gembok pasca-seeding:

- **Email Log in**: `admin@subakbali.com`
- **Kata Sandi (Password)**: `subakbali2025`

*(Manajer pengurus situs amat dianjurkan mengganti kata sandi super setelah log in mandiri ke website).*

---

## 👨‍💻 Profil Pemilik Data & Pengembang

Dikembangkan sepenuh sadar oleh tim pengabdi untuk keperluan digitalisasi tata kekayaan Budaya Bali.

- **Developer Utama** : I Gusti Ketut Ngurah Adi Putra (Program Studi: Informatika)
- **NIM Mhs** : 2308561035
- **Afiliasi** : Fakultas Matematika dan Ilmu Pengetahuan Alam, Universitas Udayana
- **Pos-el / Email** : putra.2308561035@student.unud.ac.id
- **Telepon Darurat (WhatsApp)** : 0877-5903-5322

---
Layar Antarmuka & Keseluruhan Hak Cipta dilindungi:
&copy; **2026 Subak Bali Digital**. Menjaga Warisan Menyemai Berkelanjutan | Made in Bali.

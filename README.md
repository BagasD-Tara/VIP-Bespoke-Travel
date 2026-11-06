# VIP Bespoke Travel - Client Portal & Travel Planning Dashboard

Repositori resmi kolaborasi pengembangan platform **VIP Bespoke Travel & Luxury Concierge Advisory**, menghadirkan integrasi arsitektur **Model-View-Controller (MVC) PHP**, **Pemrograman Berorientasi Objek (OOP)**, **REST API Express.js dengan Autentikasi JWT & Bcrypt**, antarmuka **Client-Side Rendering (CSR) berbasis TypeScript**, serta **Server-Side Rendering (SSR) PHP**.

---

## 👥 Identitas Pengembang & Anggota Tim

- **Zaidaan Diandra Eka Putra (NIM: 202410370110420)**
  - **Fokus Kontribusi:**
    - **Week 7:** Perancangan & Implementasi Penuh Arsitektur **Model-View-Controller (MVC)** PHP (`models/`, `controllers/`, `views/`, `index.php`), perancangan dashboard *Quiet Luxury* (Obsidian & Champagne Gold) dengan widget telemetri penerbangan AI privat dan dossier perjalanan VIP.
    - **Week 6:** Perancangan modul **Pemrograman Berorientasi Objek / OOP** (`BespokeConcierge.php`), landing page dinamis dan interaktif (`latihan1.html`, `latihan1.php`) dengan modal autentikasi VIP terintegrasi.
- **Bagas Dewantara (NIM: 202410370110441)**
  - **Fokus Kontribusi:**
    - **Week 5 / Base Framework:** Perancangan arsitektur backend Express.js (`server.js`), sistem autentikasi JWT & hash password Bcrypt (`users.json`, `hash-password.js`), frontend CSR berbasis TypeScript (`src/dashboard.ts`, `src/types.ts`), formulir pengajuan perjalanan baru, serta implementasi dasar SSR PHP (`public/dashboard.php`, `public/data-processor.php`).
- **Branch Aktif:** `Zaidaan-Diandra-Eka-Putra-202410370110420`
- **Repository:** [VIP-Bespoke-Travel (GitHub)](https://github.com/BagasD-Tara/VIP-Bespoke-Travel.git)

---

## 🚀 Fitur & Rincian Implementasi Tugas

### 🏛️ 1. Arsitektur Model-View-Controller / MVC (Week 7 — Zaidaan Diandra)
Implementasi pola arsitektur MVC murni di sisi server PHP untuk memisahkan data layer, business logic, dan presentation layer secara modular:

- **Front Controller (`index.php`)**:
  - Berfungsi sebagai single entry point aplikasi web PHP MVC.
  - Membaca request HTTP dan memanggil method `DashboardController->index()`.
- **Model (`models/TravelModel.php`)**:
  - Bertanggung jawab atas pengelolaan data persistensi dari `dashboard-data.json`.
  - Mengimplementasikan method query data:
    - `getDashboardData()`: Membaca dan memvalidasi struktur data klien, statistik, dan portofolio perjalanan.
    - `getRequestsByFilter($status)`: Memfilter dossier perjalanan berdasarkan status (`Approved`, `In Review`, `Planning`, `Confirmed`, atau `all`).
    - `getAvailableStatuses()`: Menghitung jumlah per kategori status secara dinamis untuk indikator angka pada filter tab.
- **Controller (`controllers/DashboardController.php`)**:
  - Mengatur alur logika bisnis dan orkestrasi data.
  - Menangani parameter query string (`$_GET['status']`), memvalidasi input, dan memanggil fungsi `TravelModel`.
  - Memproses logika penentuan salam dinamis sesuai waktu server (*Time-of-day greeting*).
  - Merender view melalui method `render()` dengan mem-passing data yang telah disanitasi.
- **View (`views/dashboard-view.php`)**:
  - Antarmuka dashboard VIP berestetika *Quiet Luxury* (palet warna Obsidian `#060a08`, Champagne Gold `#c5a059`, dan Ivory `#fcfbf8`) dengan container terpusat (`max-w-6xl mx-auto`).
  - Dilengkapi fitur:
    - **Widget Telemetri Penerbangan AI Privat:** Pelacakan rute udara *Geneva Cointrin (LSGG) &rarr; Samedan / St. Moritz Engadin (LSZS)* dengan profil elevasi, kecepatan jelajah, dan integrasi transfer apron Maybach.
    - **Copilot Query Dispatch Bar:** Input asisten AI concierge dengan saran cepat dan animasi transmisi terenkripsi ke Geneva Desk.
    - **Filter Tabs Real-time:** Tombol filter interaktif (`All`, `Approved`, `In Review`, `Planning`, `Confirmed`) dengan counter dinamis dari Model.
    - **6 Kartu Portofolio Dossier VIP:** Informasi mendalam mencakup aset transportasi (jet/helikopter/yacht), private advisor, catatan kurasi, estimasi anggaran, dan tautan dossier.
    - **Direct Sovereign Desk & PGP Note:** Kontak langsung concierge dan simulasi pengiriman pesan terenkripsi.

---

### 💎 2. Pemrograman Berorientasi Objek & Landing Page (Week 6 — Zaidaan Diandra)
- **Implementasi OOP (`BespokeConcierge.php`)**:
  - Penerapan prinsip Pemrograman Berorientasi Objek (OOP) dalam PHP: Enkapsulasi properti, metode setter/getter, abstraksi layanan concierge, serta metode pengolahan data paket perjalanan.
- **Landing Page Interaktif (`latihan1.html` & `latihan1.php`)**:
  - Antarmuka beranda dengan tipografi elegan (*EB Garamond* & *DM Sans*) dan navigasi sticky glassmorphic.
  - Seksi kurasi destinasi dunia (Swiss Alps, Monaco, Kyoto, Amalfi Coast, Serengeti, Lapland).
  - Seksi *Fleet & Aviation Showcase* serta penjelasan alur kerja *Bespoke Process*.
  - Modal autentikasi login VIP interaktif yang terhubung langsung ke dashboard.

---

### 🛡️ 3. Autentikasi Pengguna & Keamanan Backend (Bagas Dewantara)
- **Autentikasi JWT & Bcrypt (`server.js`, `hash-password.js`, `users.json`)**:
  - Enkripsi kata sandi menggunakan pustaka `bcryptjs`.
  - Endpoint `POST /api/auth/login` yang menerbitkan token JWT (*JSON Web Token*) dengan masa berlaku 2 jam.
  - Middleware `requireAuth` dengan skema `Bearer Token` untuk melindungi rute privat (`/api/profile`).
- **Halaman Login & Profil Klien (`public/login.html`, `public/profile.html`)**:
  - Validasi formulir login, manajemen token di `localStorage`, dan penampilan profil akun pengguna.

---

### ⚡ 4. Client-Side Rendering TypeScript & Server-Side Rendering PHP (Bagas Dewantara)
- **Dashboard CSR TypeScript (`src/dashboard.ts`, `src/types.ts`, `public/dashboard.html`)**:
  - Pengambilan data asinkron via `fetch('/api/dashboard')`.
  - Tipe state generik `ApiState<T>` (`idle`, `loading`, `success`, `error`), mekanisme retry, dan floating toast notifications.
  - Formulir modal pembuatan request perjalanan baru via `POST /api/requests`.
- **Dashboard SSR PHP (`public/dashboard.php`, `public/data-processor.php`)**:
  - Rendering halaman dashboard di sisi server menggunakan PHP murni.
  - Modul pemrosesan data, kalkulasi durasi, konversi mata uang Rupiah, dan filter pencarian.

---

## 📂 Struktur Direktori Proyek

```plaintext
VIP-BESPOKE-TRAVEL/
├── controllers/              # [Week 7 - Zaidaan] Controller Pola Arsitektur MVC
│   └── DashboardController.php # Logika bisnis, filter status, dispatch view
├── models/                   # [Week 7 - Zaidaan] Model Data Layer Pola Arsitektur MVC
│   └── TravelModel.php       # Abstraksi data JSON, query filtering, agregasi statistik
├── views/                    # [Week 7 - Zaidaan] View Presentation Layer Pola Arsitektur MVC
│   └── dashboard-view.php    # UI Patron Dashboard (Quiet Luxury, AI Telemetry, SSR)
├── src/                      # [Bagas] Source Code Frontend TypeScript
│   ├── dashboard.ts          # Logika frontend CSR, API fetcher, & DOM rendering
│   └── types.ts              # Definisi interface TypeScript & generic state API
├── public/                   # [Bagas] Asset Web Statis & Client Application
│   ├── landing_page.html     # Halaman beranda utama
│   ├── login.html            # Halaman login klien
│   ├── login.js              # Script client-side login & JWT store
│   ├── dashboard.html        # Halaman dashboard VIP (Client-Side Rendering via REST API)
│   ├── dashboard.php         # Halaman dashboard VIP (Server-Side Rendering via PHP)
│   ├── data-processor.php    # Modul pemrosesan data & kalkulasi agregasi PHP
│   ├── dashboard.css         # Styling khusus dashboard VIP
│   ├── dashboard.js          # Bundle JavaScript hasil kompilasi TypeScript
│   ├── profile.html          # Halaman profil akun klien
│   ├── profile.js            # Script client-side profil klien
│   ├── types.js              # Script helper tipe data
│   └── style.css             # Desain global & stylesheet landing page
├── index.php                 # [Week 7 - Zaidaan] Front Controller / Entry Point Aplikasi MVC
├── latihan1.php              # [Week 6 - Zaidaan] Landing Page Dinamis & Integrasi VIP Portal
├── latihan1.html             # [Week 6 - Zaidaan] File Desain Landing Page Quiet Luxury
├── BespokeConcierge.php      # [Week 6 - Zaidaan] Implementasi Class Berorientasi Objek (OOP)
├── server.js                 # [Bagas] Server Express.js (REST API & Static Server)
├── users.json                # [Bagas] Database mock pengguna & hash password Bcrypt
├── dashboard-data.json       # Mock database bersama (mendukung Express API & PHP MVC)
├── hash-password.js          # [Bagas] Utilitas pembuatan hash password
├── tsconfig.json             # Konfigurasi compiler TypeScript
├── package.json              # Manifest dependensi & scripts NPM
└── README.md                 # Dokumentasi komprehensif proyek kolaborasi
```

---

## 🛠️ Panduan Menjalankan Proyek Secara Lokal

### 1. Prasyarat Sistem
- **PHP 8.x** (tersedia via instalasi PHP mandiri atau XAMPP)
- **Node.js** (versi 18 ke atas) & **NPM**

---

### 2. Menjalankan Aplikasi PHP MVC (Week 7) & Landing Page (Week 6) ⭐
Untuk menjalankan aplikasi MVC PHP yang dikembangkan oleh **Zaidaan Diandra**, buka terminal di direktori proyek dan jalankan:

```bash
php -S localhost:8080
```

Buka peramban (browser) dan akses:
- 🏛️ **Dashboard VIP MVC (Week 7):** [http://localhost:8080/index.php](http://localhost:8080/index.php)
  - Coba filter status perjalanan dengan mengklik tombol filter atau menambahkan query parameter, contoh:
    - [http://localhost:8080/index.php?status=Approved](http://localhost:8080/index.php?status=Approved)
    - [http://localhost:8080/index.php?status=In+Review](http://localhost:8080/index.php?status=In+Review)
    - [http://localhost:8080/index.php?status=Planning](http://localhost:8080/index.php?status=Planning)
    - [http://localhost:8080/index.php?status=Confirmed](http://localhost:8080/index.php?status=Confirmed)
- 💎 **Landing Page & Modul OOP (Week 6):** [http://localhost:8080/latihan1.php](http://localhost:8080/latihan1.php)
- 📄 **Dashboard SSR PHP (Bagas):** [http://localhost:8080/public/dashboard.php](http://localhost:8080/public/dashboard.php)

---

### 3. Menjalankan Server Node.js (REST API & Frontend CSR TypeScript)
Untuk menjalankan backend Express.js dan antarmuka Client-Side Rendering yang dikembangkan oleh **Bagas Dewantara**:

1. **Instal dependensi:**
   ```bash
   npm install
   ```
2. **Kompilasi TypeScript:**
   ```bash
   npm run build:ts
   ```
3. **Pastikan file `.env` tersedia:**
   ```env
   PORT=3000
   JWT_SECRET=rahasia-super-aman-vip-bespoke-travel-2026
   JWT_EXPIRES_IN=2h
   ```
4. **Jalankan server Express:**
   ```bash
   npm start
   ```
5. **Akses melalui browser:**
   - **Landing Page Tim:** [http://localhost:3000](http://localhost:3000)
   - **Login Klien:** [http://localhost:3000/login.html](http://localhost:3000/login.html)
   - **Dashboard (CSR via TypeScript):** [http://localhost:3000/dashboard](http://localhost:3000/dashboard)

---

## 🔐 Kredensial Pengujian Akun

Gunakan akun berikut untuk menguji formulir login pada server Node.js:

| Email | Kata Sandi | Peran |
| :--- | :--- | :--- |
| `dahlah@contoh.com` | `kucing123` | VIP Client |

---

## 📡 Daftar Endpoint REST API

| Method | Endpoint | Proteksi Auth | Deskripsi |
| :--- | :--- | :--- | :--- |
| `POST` | `/api/auth/login` | Publik | Autentikasi user & penerbitan token JWT |
| `GET` | `/api/dashboard` | Opsional / Bearer Token | Mengambil data lengkap portal dashboard |
| `POST` | `/api/requests` | Publik / Bearer Token | Mengajukan request perjalanan baru |
| `GET` | `/api/profile` | Wajib Bearer Token | Mengambil data profil klien terverifikasi |

---

&copy; 2026 VIP Bespoke Travel Concierge Advisory. Hak Cipta Dilindungi Undang-Undang.

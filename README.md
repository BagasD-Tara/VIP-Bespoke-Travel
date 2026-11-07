# VIP Bespoke Travel - Client Portal & Travel Planning Dashboard

Repositori resmi kolaborasi pengembangan platform **VIP Bespoke Travel & Luxury Concierge Advisory**, menghadirkan integrasi arsitektur **Model-View-Controller (MVC) PHP**, **Pemrograman Berorientasi Objek (OOP)**, **REST API Express.js dengan Autentikasi JWT & Bcrypt**, antarmuka **Client-Side Rendering (CSR) berbasis TypeScript**, serta **Server-Side Rendering (SSR) PHP**.

---

## 👥 Identitas Pengembang & Anggota Tim

- **Zaidaan Diandra Eka Putra (NIM: 202410370110420)**
  - **Fokus Kontribusi:**
    - **Week 7:** Perancangan & Implementasi Penuh Arsitektur **Model-View-Controller (MVC)** PHP (`models/`, `controllers/`, `views/`, `index.php`), perancangan dashboard **Sovereign Reserve** (*Obsidian & Glowing Champagne Gold*) dengan telemetri portofolio aset, grafik SVG area line, alokasi domain 3D donut chart, kesiapan armada jet, dan settlement ledger terenkripsi.
    - **Week 6:** Perancangan modul **Pemrograman Berorientasi Objek / OOP** (`BespokeConcierge.php`), landing page dinamis dan interaktif (**Black Gold Luxury**) (`latihan1.html`, `latihan1.php`) dengan hero banner full-width, kapsul pencarian melayang, 3 kartu showcase, dan modal VIP Portal terintegrasi.
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
  - Antarmuka dashboard VIP berestetika **Sovereign Reserve — Zurich Private Vaults** (palet warna Obsidian `#0c0e12`, Champagne Gold `#f2ca50`, dan Muted Platinum `#d0c5af`) dengan sidebar navigasi tetap di sisi kiri (`w-72 fixed`).
  - Dilengkapi fitur:
    - **Header & Client Dossier:** Sambutan personal `Welcome, Alexander Dubois`, status tier keanggotaan `VIP-8821 • Sovereign Tier`, live search ledger real-time, dan indikator keamanan *Tier-1 Encrypted Zurich Gateway*.
    - **Portfolio Performance Chart:** Grafik area SVG interaktif berpendar emas dengan filter rentang waktu (1M, 3M, 6 MONTHS, 1Y, ALL) serta penanda puncak *Sep 2026 Peak ($2,485,000)*.
    - **Total Wealth & Treasury Card:** Pelacakan kekayaan total $32.78M (+7.8% YTD) dengan grafik gelombang ganda dan breakdown *Global Custody Escrow*, *Gold Bullion*, dan *Liquid Yield Stash*.
    - **Asset Allocation 3D Donut Chart:** Visualisasi alokasi aset & domain (Equities & Jets 52%, Sanctuaries 28%, Charters 15%, Vaults 5%) dengan inti *100% Tier Alpha*.
    - **Market Sentiment & Fleet Readiness:** Grafik pilar indeks global (S&P, NASDAQ, DOW, XAU Gold) dan status kesiapan armada jet privat (*Gulfstream G700 & Global 7500: 4/5 Ready*).
    - **Goals & Capital Allocations:** Progress bar dinamis target aset keluarga (*Estate Reserve*, *Island Acquisition*, *Orbital Aerospace*).
    - **Settlement Ledger Table:** Tabel transaksi mutasi concierge dan escrow privat (Amalfi Coast G700, Zurich Escrow Deposit, Monaco Superyacht, St. Moritz Alpine) lengkap dengan modul *Personal Banker: Lucian Von Bern*.

---

### 💎 2. Pemrograman Berorientasi Objek & Landing Page (Week 6 — Zaidaan Diandra)
- **Implementasi OOP (`BespokeConcierge.php`)**:
  - Penerapan prinsip Pemrograman Berorientasi Objek (OOP) dalam PHP: Enkapsulasi properti, metode setter/getter, abstraksi layanan concierge, serta binding data dinamis `$suiteProfile` dan `$quickStats`.
- **Landing Page Interaktif Black Gold (`latihan1.html` & `latihan1.php`)**:
  - Antarmuka beranda berestetika **Black Gold Obsidian Luxury** dengan tipografi editorial (*EB Garamond* & *DM Sans*).
  - **Full-Width Hero Banner:** Foto editorial koper mewah di podium pantai (`assets/images/luxury-luggage-coastal-hero.jpg`) dengan dark obsidian scrim overlay.
  - **Floating Top Navbar:** Navigasi kaca tembus pandang (*dark frosted glass*) dengan logo monogram emas dan tautan VIP Portal.
  - **Floating Quick Search Capsule:** Bar pencarian 4 segmen melayang (Destinasi, Tanggal, Jumlah Tamu, Anggaran) dengan tombol aksi emas.
  - **3 Showcase Cards Grid:** Kartu sorotan *Santorini Estate Caldera* (`assets/images/santorini-caldera-sunset.jpg`), metrik benchmark komunitas, dan teaser video arsip.
  - **Seksi Lengkap:** 6 Dossier ekspedisi global terkurasi (dengan sistem filter kategori), armada penerbangan privat, protokol concierge 4 tahap, tier keanggotaan berdaulat, sertifikasi FINMA/Trust, dan formulir konsultasi interaktif.

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
├── assets/                   # [Assets] Foto & Media Resolusi Tinggi Lokal
│   └── images/               # Koleksi foto koper pesisir, Santorini, Alpen, dan referensi
├── controllers/              # [Week 7 - Zaidaan] Controller Pola Arsitektur MVC
│   └── DashboardController.php # Logika bisnis, filter status, dispatch view
├── models/                   # [Week 7 - Zaidaan] Model Data Layer Pola Arsitektur MVC
│   └── TravelModel.php       # Abstraksi data JSON, query filtering, agregasi statistik
├── views/                    # [Week 7 - Zaidaan] View Presentation Layer Pola Arsitektur MVC
│   └── dashboard-view.php    # UI Patron Dashboard (Sovereign Reserve, Black Gold, Charts)
├── src/                      # [Bagas] Source Code Frontend TypeScript
│   ├── dashboard.ts          # Logika frontend CSR, API fetcher, & DOM rendering
│   └── types.ts              # Definisi interface TypeScript & generic state API
├── public/                   # [Bagas] Asset Web Statis & Client Application
│   ├── images/               # Cermin aset gambar untuk akses direktori publik
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
├── latihan1.html             # [Week 6 - Zaidaan] File Desain Landing Page Black Gold Luxury
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

# VIP Bespoke Travel - Client Portal & Travel Planning Dashboard

**Pengembang / Identitas:** Zaidaan Diandra (NIM: 202410370110420)  
**Branch:** Zaidaan-Diandra-Eka-Putra-202410370110420  
**Repository:** VIP-Bespoke-Travel  

---

## 📌 Ringkasan Pengerjaan: Week 6
> **Keterangan Kontribusi:**  
> Pada pengerjaan proyek ini, saya berfokus dan menyelesaikan penugasan pada **Week 6**, yang mencakup integrasi asinkronus (Fetch API / REST API Client-Side Rendering), validasi form, penanganan state (loading, error message, retry mechanism), serta penyempurnaan UI/UX interaktif pada portal dashboard. Modul-modul dasar SSR dan data processor PHP sebelumnya diadaptasi dari arsitektur tim.

---

## Fitur & Pekerjaan yang Telah Diselesaikan

### 1. Autentikasi Pengguna & Keamanan (JWT & Bcrypt)
- **Halaman Login Interaktif (`public/login.html`, `public/login.js`):**
  - Validasi input email dan kata sandi di sisi client dan server.
  - Penyimpanan token JWT ke `localStorage` dengan penanganan sesi otomatis.
  - Penanganan pesan error autentikasi dan status loading pada tombol submit.
- **Keamanan Backend (`server.js`, `hash-password.js`):**
  - Penyimpanan kata sandi terenkripsi menggunakan algoritma `bcryptjs`.
  - Endpoint `POST /api/auth/login` dengan respon token berstandar JWT.
  - Middleware proteksi `requireAuth` dengan skema Bearer Token untuk rute-rute privat (`/api/profile`).
  - Script pembantu enkripsi password pengguna (`npm run hash`).

### 2. VIP Client Dashboard Terintegrasi API (`src/dashboard.ts`, `public/dashboard.html`)
- **Implementasi TypeScript Type-Safe (`src/types.ts`):**
  - Definisi interface lengkap untuk struktur data API: `Customer`, `Business`, `TravelRequest`, `ActionItem`, `UpcomingTrip`, `MessageItem`, dan `DashboardData`.
  - Definisi state generic `ApiState<T>` (`idle`, `loading`, `success`, `error`) untuk kontrol aliran data yang ketat.
- **Koneksi REST API & Pengambilan Data (`GET /api/dashboard`):**
  - Mengambil data profil klien, status permintaan perjalanan, daftar tindakan mendesak (*Perlu Tindakan*), jadwal perjalanan mendatang (*Upcoming Trip*), serta pesan dari advisor.
  - Mendukung pembacaan header authorization Bearer Token untuk personalisasi nama pengguna secara dinamis.
- **Handling API State & Umpan Balik Visual (Fokus Week 6):**
  - Indikator status loading (spinner & animasi rotasi tombol refresh).
  - Penanganan kegagalan API (*error state*) dengan pesan jelas dan tombol coba lagi (*Retry*).
  - Tombol Refresh Dashboard untuk memperbarui data secara asinkron tanpa reload halaman penuh.
  - Sistem Toast Notification mengambang (*Floating Toast*) dengan ragam status (`success`, `error`, `info`, `warning`) dan auto-dismiss.

### 3. Formulir Pengajuan Perjalanan Baru (Interactive Modal Form)
- **Modal Request Perjalanan Baru:**
  - Modal interaktif yang dapat dibuka/tutup dengan tombol atau tombol Cancel / Esc.
  - Form mencakup input: Destinasi tujuan, rentang tanggal perjalanan, jumlah tamu/rombongan, dan catatan kebutuhan khusus.
- **Integrasi API Pembuatan Request (`POST /api/requests`):**
  - Validasi data di backend dengan pembuatan ID unik dan inisialisasi tahap pelacakan perjalanan (*step tracker*).
  - Pembaruan file data persistensi `dashboard-data.json`.
  - Auto-refresh daftar permintaan secara instan setelah data berhasil dikirim, disertai notifikasi sukses.

### 4. Halaman Pendukung & Desain UI/UX
- **Landing Page (`public/landing_page.html`):** Memperkenalkan paket liburan mewah, kurasi destinasi, dan navigasi langsung ke portal login.
- **Halaman Profil Klien (`public/profile.html`, `public/profile.js`):** Halaman detail akun pengguna terproteksi token sesi.
- **Desain Mewah & Responsif (`public/dashboard.css`, `public/style.css`):**
  - Tata letak responsif (*mobile*, *tablet*, *desktop*).
  - Tipografi Google Fonts (*Cormorant Garamond* & *Manrope*).
  - Step tracker dinamis progres proposal (*Diajukan → Ditinjau → Proposal → Disetujui → Dikonfirmasi*).

### 5. Arsitektur PHP Server-Side Rendering (SSR) & Data Processor
- Implementasi SSR pada `public/dashboard.php` dan `public/data-processor.php`.
- Kalkulasi metrik KPI portofolio, aggregasi total anggaran, countdown hari keberangkatan, serta sanitasi data via `htmlspecialchars()`.

---

## Struktur Direktori Proyek

```text
VIP-BESPOKE-TRAVEL/
├── src/
│   ├── dashboard.ts        # Logika frontend dashboard, API fetcher, & DOM rendering
│   └── types.ts            # Definisi interface TypeScript & tipe state API
├── public/
│   ├── landing_page.html   # Halaman utama (Landing Page)
│   ├── login.html          # Halaman login klien
│   ├── login.js            # Script client-side login
│   ├── dashboard.html      # Halaman portal dashboard VIP (CSR via REST API)
│   ├── dashboard.php       # Halaman portal dashboard VIP (SSR via PHP)
│   ├── data-processor.php  # Modul pemrosesan data & agregasi PHP
│   ├── dashboard.css       # Styling khusus dashboard VIP
│   ├── dashboard.js        # Bundle JavaScript hasil kompilasi TS
│   ├── profile.html        # Halaman profil klien
│   ├── profile.js          # Script client-side profil
│   └── style.css           # Desain global
├── server.js               # Server Express.js (REST API & static server)
├── users.json              # Mock database akun & credential
├── dashboard-data.json     # Mock database request perjalanan
├── tsconfig.json           # Konfigurasi compiler TypeScript
└── package.json            # Manifest dependensi & scripts

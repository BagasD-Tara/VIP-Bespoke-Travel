# VIP Bespoke Travel - Client Portal & Travel Planning Dashboard

**Pengembang / Identitas:** Bagas Dewantara (NIM: 202410370110441)  
**Branch:** `Bagas-Dewantara-202410370110441`  
**Repository:** [VIP-Bespoke-Travel](https://github.com/BagasD-Tara/VIP-Bespoke-Travel.git)

---

## 🚀 Fitur & Pekerjaan yang Telah Diselesaikan

### 1. Autentikasi Pengguna & Keamanan (JWT & Bcrypt)

- **Halaman Login Interaktif (`public/login.html`, `public/login.js`)**:
  - Validasi input email dan kata sandi di sisi _client_ dan _server_.
  - Penyimpanan token JWT ke _localStorage_ dengan penanganan sesi otomatis.
  - Penanganan pesan _error_ autentikasi dan status loading pada tombol submit.
- **Keamanan Backend (`server.js`, `hash-password.js`)**:
  - Penyimpanan kata sandi terenkripsi menggunakan algoritma `bcryptjs`.
  - Endpoint `POST /api/auth/login` dengan respon token berstandar JWT (_JSON Web Token_).
  - Middleware proteksi `requireAuth` dengan skema `Bearer Token` untuk rute-rute privat (`/api/profile`).
  - Script pembantu enkripsi password pengguna (`npm run hash`).

### 2. VIP Client Dashboard Terintegrasi API (`src/dashboard.ts`, `public/dashboard.html`)

- **Implementasi TypeScript Type-Safe (`src/types.ts`)**:
  - Definisi interface lengkap untuk struktur data API: `Customer`, `Business`, `TravelRequest`, `ActionItem`, `UpcomingTrip`, `MessageItem`, dan `DashboardData`.
  - Definisi state generic `ApiState<T>` (`idle`, `loading`, `success`, `error`) untuk kontrol aliran data yang ketat dan bebas _bug_.
- **Koneksi REST API & Pengambilan Data (`GET /api/dashboard`)**:
  - Mengambil data profil klien, status permintaan perjalanan, daftar tindakan mendesak (_Perlu Tindakan_), jadwal perjalanan mendatang (_Upcoming Trip_), serta pesan dari travel advisor.
  - Mendukung pembacaan header authorization Bearer Token untuk personalisasi nama pengguna secara dinamis.
- **Handling API State & Umpan Balik Visual**:
  - Indikator status loading (_spinner_ & animasi rotasi tombol refresh).
  - Penanganan kegagalan API (_error state_) dengan pesan jelas dan tombol coba lagi (_Retry_).
  - Tombol **Refresh Dashboard** untuk memperbarui data secara asinkron tanpa _reload_ halaman penuh.
  - Sistem **Toast Notification** mengambang (_Floating Toast_) dengan ragam status (`success`, `error`, `info`, `warning`) dan auto-dismiss.

### 3. Formulir Pengajuan Perjalanan Baru (Interactive Modal Form)

- **Modal Request Perjalanan Baru**:
  - Modal interaktif yang dapat dibuka/tutup dengan tombol atau tombol _Cancel_ / _Esc_.
  - Form mencakup input: Destinasi tujuan, rentang tanggal perjalanan, jumlah tamu/rombongan, dan catatan kebutuhan khusus.
- **Integrasi API Pembuatan Request (`POST /api/requests`)**:
  - Validasi data di backend dengan pembuatan ID unik dan inisialisasi tahap pelacakan perjalanan (_step tracker_).
  - Pembaruan file data persistensi `dashboard-data.json`.
  - Auto-refresh daftar permintaan secara instan setelah data berhasil dikirim, disertai notifikasi sukses.

### 4. Halaman Pendukung & Desain UI/UX

- **Landing Page (`public/landing_page.html`)**: Halaman beranda yang memperkenalkan portofolio paket liburan mewah, kurasi destinasi, dan tombol navigasi langsung ke portal login.
- **Halaman Profil Klien (`public/profile.html`, `public/profile.js`)**: Halaman detail akun pengguna yang terproteksi oleh token sesi, menampilkan informasi identitas akun klien.
- **Desain Mewah & Responsif (`public/dashboard.css`, `public/style.css`)**:
  - Tata letak responsif (_mobile, tablet, desktop_).
  - Tipografi dan palet warna elegan bertema _luxury concierge_.
  - Step tracker dinamis yang menunjukkan progres pengajuan proposal (_Diajukan_ ➔ _Ditinjau_ ➔ _Proposal_ ➔ _Disetujui_ ➔ _Dikonfirmasi_).

### 5. Konfigurasi Lingkungan & Tooling

- **Kompilasi TypeScript**: Mengonfigurasi `tsconfig.json` untuk mengompilasi TypeScript dari `src/dashboard.ts` menjadi bundle JavaScript `public/dashboard.js`.
- **Manajemen Variabel Lingkungan (`.env`)**: Pengaturan port server dan `JWT_SECRET` yang fleksibel dan aman.
- **Pembersihan & Pengaturan Git**: Pemisahan repositori dari _nested git/submodule_, pengabaian berkas sensitif lewat `.

---

## 📂 Struktur Direktori Proyek

```plaintext
VIP-BESPOKE-TRAVEL/
├── src/                      # Source code TypeScript
│   ├── dashboard.ts          # Logika frontend dashboard, API fetcher, & DOM rendering
│   └── types.ts              # Definisi interface TypeScript & tipe state API
├── public/                   # Asset statis & halaman web yang disajikan
│   ├── landing_page.html     # Halaman utama (Landing Page)
│   ├── login.html            # Halaman login klien
│   ├── login.js              # Script client-side login
│   ├── dashboard.html        # Halaman portal dashboard VIP
│   ├── dashboard.css         # Styling khusus dashboard VIP
│   ├── dashboard.js          # Hasil kompilasi JavaScript dari src/dashboard.ts
│   ├── profile.html          # Halaman profil klien
│   ├── profile.js            # Script client-side profil
│   └── style.css             # Desain global & landing page
├── server.js                 # Server Express.js (REST API & static server)
├── users.json                # Database pengguna & hash password
├── dashboard-data.json       # Mock database untuk request perjalanan & dashboard
├── hash-password.js          # Utilitas untuk hash password bcrypt
├── tsconfig.json             # Konfigurasi TypeScript Compiler
├── package.json              # Konfigurasi dependensi
```

---

## 🛠️ Panduan Menjalankan Proyek Secara Lokal

### 1. Prasyarat

- [Node.js](https://nodejs.org/) (versi 18 ke atas direkomendasikan)
- NPM

### 2. Instalasi Dependensi

```bash
npm install
```

### 3. Konfigurasi Environment (`.env`)

Pastikan file `.env` telah ada di root direktori dengan isi:

```env
PORT=3000
JWT_SECRET=rahasia-super-aman-vip-bespoke-travel-2026
JWT_EXPIRES_IN=2h
```

### 4. Build TypeScript

Kompilasi kode TypeScript ke JavaScript:

```bash
npm run build:ts
```

_(Atau gunakan `npm run dev:ts` untuk mode watch selama pengembangan)._

### 5. Menjalankan Server

```bash
npm start
```

Buka browser dan akses aplikasi di:

- **Landing Page:** [http://localhost:3000](http://localhost:3000)
- **Login:** [http://localhost:3000/login.html](http://localhost:3000/login.html)
- **Dashboard:** [http://localhost:3000/dashboard](http://localhost:3000/dashboard)

---

## 🔐 Kredensial Pengujian Akun

| Email               | Kata Sandi  | Peran      |
| :------------------ | :---------- | :--------- |
| `dahlah@contoh.com` | `kucing123` | VIP Client |

---

## 📡 Daftar Endpoint API

| Method | Endpoint          | Proteksi Auth      | Deskripsi                                 |
| :----- | :---------------- | :----------------- | :---------------------------------------- |
| `POST` | `/api/auth/login` | Publik             | Autentikasi user & penerbitan token JWT   |
| `GET`  | `/api/dashboard`  | Opsional/Bearer    | Mengambil data lengkap portal dashboard   |
| `POST` | `/api/requests`   | Publik/Bearer      | Mengajukan request perjalanan wisata baru |
| `GET`  | `/api/profile`    | Wajib Bearer Token | Mengambil data profil klien terverifikasi |

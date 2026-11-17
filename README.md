# VIP Bespoke Travel - Client Portal & Travel Planning Dashboard

Repositori resmi kolaborasi pengembangan platform **VIP Bespoke Travel & Luxury Concierge Advisory**, menghadirkan integrasi arsitektur **Model-View-Controller (MVC) PHP**, **Pemrograman Berorientasi Objek (OOP)**, **REST API Express.js dengan Autentikasi JWT & Bcrypt**, antarmuka **Client-Side Rendering (CSR) berbasis TypeScript**, serta **Server-Side Rendering (SSR) PHP**.

---

## 👥 Identitas Pengembang & Anggota Tim

- **Zaidaan Diandra Eka Putra (NIM: 202410370110420)**
  - **Fokus Kontribusi:**
    - **Week 9 (Pertemuan 9):** Implementasi Framework **Laravel 10**, Database **Migration** (`create_programs_table`), **Eloquent ORM Model** (`app/Models/Program.php`), serta pengembangan fitur antarmuka **CRUD Lengkap** (**Program Management**) terintegrasi database MySQL Laragon dan validasi PHPUnit automated test.
    - **Week 7 (Pertemuan 7):** Perancangan & Implementasi Penuh Arsitektur **Model-View-Controller (MVC)** PHP (`models/`, `controllers/`, `views/`, `index.php`), perancangan dashboard **Sovereign Reserve** (*Obsidian & Glowing Champagne Gold*) dengan telemetri portofolio aset, grafik SVG area line, alokasi domain 3D donut chart, kesiapan armada jet, dan settlement ledger terenkripsi.
    - **Week 6 (Pertemuan 6):** Perancangan modul **Pemrograman Berorientasi Objek / OOP** (`BespokeConcierge.php`), landing page dinamis dan interaktif (**Black Gold Luxury**) (`latihan1.html`, `latihan1.php`) dengan hero banner full-width, kapsul pencarian melayang, 3 kartu showcase, dan modal VIP Portal terintegrasi.
- **Bagas Dewantara (NIM: 202410370110441)**
  - **Fokus Kontribusi:**
    - **Pertemuan 3 (Week 3):** Implementasi Client-Side DOM Selection & Manipulation (**Task 01 — Select & Change**), penanganan ragam user event interaktif (**Task 02 — Handle User Event**), dan penyusunan alur interaksi terpadu end-to-end (**Task 03 — Build One Complete Interaction**) pada modal booking demo dan modal request perjalanan.
    - **Pertemuan 4 (Week 4):** Implementasi konektivitas REST API asinkronus via Fetch API (**Task 01: Connect to API**), pengolahan data serialisasi JSON, dan penyajian data API secara dinamis (**Task 02: Display API Data**) dengan manajemen state lengkap (*Loading, Success, Error State*).
    - **Week 5 / Base Framework:** Perancangan arsitektur backend Express.js (`server.js`), sistem autentikasi JWT & hash password Bcrypt (`users.json`, `hash-password.js`), frontend CSR berbasis TypeScript (`src/dashboard.ts`, `src/types.ts`), formulir pengajuan perjalanan baru, serta implementasi dasar SSR PHP (`public/dashboard.php`, `public/data-processor.php`).
- **Branch Aktif:** `Bagas-Dewantara-202410370110441` / `Zaidaan-Diandra-Eka-Putra-202410370110420`
- **Repository:** [VIP-Bespoke-Travel (GitHub)](https://github.com/BagasD-Tara/VIP-Bespoke-Travel.git)

---

## 🚀 Fitur & Rincian Implementasi Tugas

### 🌐 1. Pertemuan 3: Web Programming — Client-Side DOM & User Interaction

Implementasi manipulasi elemen antarmuka web di sisi klien (*client-side*) menggunakan JavaScript murni (Vanilla JS) dan TypeScript untuk menghadirkan pengalaman pengguna yang interaktif, responsif, dan bebas hambatan:

#### 🔹 Task 01 — Select & Change
*Tujuan: Menggunakan JavaScript untuk mengambil elemen DOM pada antarmuka web dan mengubah propertinya secara dinamis.*

```mermaid
flowchart LR
    A["PILIH ELEMENT<br/>(Gunakan selector ID, Class, Tag)"] --> B["JAVASCRIPT<br/>(Jalankan kode manipulasi DOM)"]
    B --> C["ELEMENT BERUBAH<br/>(Tampilan halaman ter-update seketika)"]
```

- **Mekanisme Tiga Langkah:**
  1. **Pilih Element:** Mengambil referensi elemen HTML menggunakan selector JavaScript yang sesuai kebutuhan spesifik.
  2. **JavaScript:** Menjalankan instruksi script untuk mengubah properti elemen (teks, atribut, struktur HTML, maupun kelas CSS).
  3. **Element Berubah:** Perubahan tampilan langsung ter-render pada browser secara instan tanpa perlu me-reload halaman.
- **Ragam Selector yang Diterapkan di Proyek:**
  - **Selector ID (`#id` / `getElementById`):** Memilih elemen unik spesifik pada halaman.
    - `document.getElementById('customer-greeting')` &rarr; Target label sapaan personal klien.
    - `document.getElementById('mobileToggle')` &rarr; Target tombol hamburger menu navigasi mobile.
    - `document.getElementById('demoModal')` &rarr; Target kontainer dialog modal konsultasi VIP.
    - `document.querySelector('#btn-nav')` & `#btn-hero` &rarr; Target tombol call-to-action (CTA).
  - **Selector Class (`.class` / `querySelectorAll`):** Memilih satu atau kumpulan elemen berdasarkan kelas styling.
    - `document.querySelectorAll('[data-open-modal="demo"]')` &rarr; Mengambil seluruh tombol pemicu modal di berbagai seksi halaman.
    - `document.querySelectorAll('.action-card')` &rarr; Mengambil koleksi kartu tugas dan proposal.
    - `document.querySelector('.btn-primary')` &rarr; Tombol aksi utama antarmuka.
  - **Selector Tag (`<tag>`):** Memilih elemen berdasarkan nama tag HTML.
    - `document.querySelector('header')` &rarr; Mengambil elemen header untuk manipulasi scroll navigasi.
    - `document.querySelector('h1')` &rarr; Mengambil elemen heading utama halaman.
- **Bukti Perubahan Properti Elemen pada Kode Proyek (`script.js`, `public/landing_page.html`, `src/dashboard.ts`):**
  - **Mengubah Konten Teks (`textContent`):**
    ```javascript
    // Mengubah sapaan klien secara dinamis berdasarkan data profil
    customerGreetingEl.textContent = `Halo, ${data.customer.name}`;
    // Mengubah label tombol saat proses asinkron berlangsung
    clickedButton.textContent = "Memproses...";
    ```
  - **Memanipulasi Kelas CSS (`classList.add / remove / toggle`):**
    ```javascript
    // Mengubah style navbar saat halaman di-scroll
    header.classList.remove('bg-ink/90');
    header.classList.add('bg-ink', 'shadow-lg');
    // Membuka dan menutup drawer navigasi mobile
    navlinks.classList.toggle('open');
    ```
  - **Mengubah Konten HTML Dinamis (`innerHTML`):**
    ```javascript
    // Mengubah badge status koneksi API secara real-time
    apiStatusContainerEl.innerHTML = `
      <span class="api-badge api-badge-success">
        <span class="pulse-dot pulse-dot-green"></span>
        <span>REST API Terhubung</span>
      </span>
    `;
    ```

---

#### 🔹 Task 02 — Handle User Event
*Tujuan: Menambahkan interaksi responsif yang benar-benar dibutuhkan oleh pengguna pada platform VIP Bespoke Travel.*

```mermaid
flowchart LR
    U["USER<br/>(Aksi Pengguna)"] --> E["CLICK / INPUT / SUBMIT<br/>(Pemicu Event)"]
    E --> EV["EVENT LISTENER<br/>(Menangkap Event)"]
    EV --> JS["JAVASCRIPT<br/>(Fungsi Callback / Handler)"]
    JS --> UI["UI RESPONSE<br/>(Antarmuka Merespons)"]
```

- **Alur Kerja Event Handling:**
  1. **User:** Pengguna melakukan aksi fisik (klik, ketik, submit formulir, scroll, atau tekan keyboard).
  2. **Click / Input / Submit:** Browser membangkitkan event yang bersesuaian.
  3. **Event Listener:** `addEventListener()` menangkap event target pada elemen yang bersangkutan.
  4. **JavaScript:** Fungsi handler dieksekusi untuk memproses logika bisnis dan sanitasi data.
  5. **UI Response:** Antarmuka web memperbarui tampilan visual dan memberikan umpan balik langsung.
- **4 Kategori Interaksi Esensial yang Diimplementasikan:**
  - **1. Klik Tombol (Click Event):**
    - Tombol Buka/Tutup Modal (`openButtons`, `closeBtn`, `cancelModalBtn`): Membuka dialog formulir VIP dan menyembunyikannya kembali.
    - Tombol Refresh Asinkron (`btnRefreshEl`): Memicu pengambilan ulang data dashboard dari server tanpa reload halaman penuh disertai animasi putaran ikon (*spin animation*).
    - Tombol CTA Demo (`btnNav`, `btnHero`): Memberikan feedback status teks "Memproses..." sebelum mengarahkan ke bagian kontak.
  - **2. Input Formulir & Validasi Real-time (Input & Focus Event):**
    - Input login & request perjalanan: Menangkap perubahan karakter untuk sanitasi data dan validasi kelengkapan form sebelum pengiriman.
    - Autofocus input: Secara otomatis mengarahkan kursor (`firstInput.focus()`) ke field pertama saat dialog modal terbuka untuk kenyamanan pengetikan pengguna.
  - **3. Submit Form Asinkron (Submit Event):**
    - Penanganan `event.preventDefault()` pada formulir reservasi demo (`demoBookingForm`), formulir permohonan perjalanan baru (`newRequestForm`), serta form autentikasi (`loginForm`).
    - Mencegah browser melakukan reload halaman bawaan, lalu mengalihkan proses ke alur loading spinner dan pengiriman data via Fetch API.
  - **4. Klik Menu Responsif Mobile (Toggle Navigasi):**
    - Hamburger navigation button (`mobileToggle`): Menangani klik untuk membuka drawer menu navigasi di layar smartphone (`max-width: 768px`) dan memperbarui atribut aksesibilitas `aria-expanded` (true/false).
    - Auto-close navigasi: Menutup drawer secara otomatis ketika salah satu tautan menu di dalamnya diklik oleh pengguna.
  - **5. Interaksi Pendukung (Scroll Window & Keyboard Escape):**
    - `window.addEventListener('scroll', ...)`: Mendeteksi posisi scroll vertikal layar (> 50px) untuk mengaktifkan efek *glassmorphic elevation* pada sticky navbar.
    - `document.addEventListener('keydown', ...)`: Mendeteksi penekanan tombol keyboard `Escape` (ESC) untuk menutup modal yang sedang aktif secara cepat dan ramah aksesibilitas keyboard (*keyboard-accessible dialog*).

---

#### 🔹 Task 03 — Build One Complete Interaction
*Tujuan: Membangun satu interaksi lengkap ujung-ke-ujung (end-to-end) yang fungsional, bernilai guna nyata, dan mematuhi seluruh checklist evaluasi.*

```mermaid
flowchart TD
    A["1. Klik 'Jadwalkan Demo' / '+ Buat Request'<br/>(Pengguna menekan tombol pemicu)"] --> B["2. Event Click Dijalankan<br/>(Event listener mendeteksi aksi & buka modal)"]
    B --> C["3. Input Form & Submit<br/>(Pengguna mengisi data, JavaScript validasi)"]
    C --> D["4. Transisi State (Loading & Process)<br/>(Spinner aktif, e.preventDefault, proses data)"]
    D --> E["5. UI Response & Feedback Muncul<br/>(Pesan sukses tampil, form reset, data ter-update)"]
```

- **Studi Kasus Alur Interaksi Terpadu yang Dikerjakan:**
  1. **Alur Reservasi Konsultasi Demo Concierge (`public/landing_page.html`):**
     - **Pemicu:** Pengguna mengklik tombol "Jadwalkan Demo" pada hero section atau navbar.
     - **Event & DOM Open:** Modal pop-up aktif seketika (`modal.classList.add('active')`), input nama terfokus secara otomatis.
     - **Eksekusi Logika:** Pengguna mengisi data dan menekan tombol konfirmasi. Script menangkap submit (`e.preventDefault()`), menyembunyikan form, dan mengaktifkan animasi loading state (*900ms simulated processing*).
     - **Hasil pada Halaman:** Loading spinner berganti menjadi pesan sukses reservasi concierge (*Success State*), formulir di-reset, dan pengguna dapat menutup modal melalui tombol selesai, klik backdrop luar, maupun tombol ESC keyboard.
  2. **Alur Pembuatan Permohonan Perjalanan Baru (`src/dashboard.ts` & `public/dashboard.html`):**
     - **Pemicu:** Klien menekan tombol "+ Request Perjalanan" pada dashboard VIP.
     - **Event & Input:** Modal formulir terbuka, klien menginputkan destinasi, tanggal, dan preferensi armada.
     - **Eksekusi Logika:** Submit form divalidasi, tombol beralih ke state disabled dengan teks "Menyimpan..." dan spinner, payload dikirim ke API backend via method `POST /api/requests`.
     - **Hasil pada Halaman:** Floating Toast Notification melayang di sudut layar mengonfirmasi data berhasil disimpan, modal tertutup otomatis, dan daftar request di dashboard diperbarui seketika tanpa me-refresh browser.

- **Checklist Kriteria Keberhasilan (Sesuai Standar Penugasan):**
  - [x] **Event Berjalan:** Seluruh aksi pengguna (klik tombol, input formulir, submit, penekanan keyboard `Escape`, klik overlay luar) terdeteksi secara presisi.
  - [x] **JavaScript Berjalan:** Seluruh kode script dieksekusi dengan bersih dan lancar tanpa meninggalkan error maupun unhandled rejection pada konsol peramban (*0 console errors*).
  - [x] **DOM Berubah:** Komponen halaman mengalami pembaruan dinamis secara mulus (manipulasi konten teks, kelas styling transisi, pergantian view form &rarr; loading &rarr; success, dan penambahan kartu baru).
  - [x] **Interaksi Sesuai Kebutuhan:** Memberikan nilai fungsional yang jelas bagi klien (pendaftaran reservasi concierge pribadi, pengajuan trip VIP terstruktur, dan penutupan modal instan).
  - [x] **Tidak Merusak Halaman:** Seluruh tata letak antarmuka tetap stabil, responsif di seluruh resolusi layar (desktop, tablet, mobile), serta tidak mengganggu fungsi komponen lainnya.

---

### ⚡ 2. Pertemuan 4: Web Programming — Asynchronous JavaScript & REST API Integration

Implementasi komunikasi data asinkronus antara antarmuka web klien (*frontend*) dan penyedia data (*backend server*) menggunakan arsitektur REST API, Fetch API, dan serialisasi data JSON:

#### 🔹 Task 01: Connect to API
*Tujuan: Menghubungkan antarmuka aplikasi VIP Bespoke Travel dengan REST API yang menyediakan data relevan secara asinkronus.*

```mermaid
flowchart LR
    WP["WEB PAGE<br/>(Halaman diakses pengguna)"] --> JS["JAVASCRIPT<br/>(Kirim request via Fetch API)"]
    JS --> FT["FETCH API<br/>(GET/POST HTTP Request)"]
    FT --> API["REST API SERVER<br/>(Express.js proses data)"]
    API --> JSN["JSON PAYLOAD<br/>(Respon data terstruktur)"]
```

- **Arsitektur Alur Koneksi API (5 Tahap):**
  1. **Web Page:** Halaman web VIP Bespoke Travel dimuat pada peramban pengguna.
  2. **JavaScript:** Script klien mengeksekusi fungsi asinkronus (`async/await` / `.then()`) untuk meminta data ke endpoint server.
  3. **Fetch API:** Mengirimkan HTTP Request ke URI endpoint target dengan header yang disesuaikan (`Content-Type: application/json`, `Authorization: Bearer <token>`).
  4. **REST API Server:** Server backend (Express.js pada `server.js`) menerima request, memverifikasi token otentikasi klien, membaca basis data mock (`dashboard-data.json`), dan menyiapkan payload respon.
  5. **JSON Data:** Server mengembalikan data terstruktur dalam format JSON dengan status HTTP yang sesuai (200 OK, 201 Created, 401 Unauthorized, dll).
- **Endpoint REST API Terhubung pada Proyek:**
  - `GET /api/dashboard`: Mengambil data agregasi dashboard VIP (profil pelanggan, ringkasan bisnis, item tindakan mendesak, riwayat permohonan perjalanan, jadwal trip mendatang, dan pesan concierge).
  - `POST /api/requests`: Mengirimkan data formulir permohonan perjalanan baru dalam format JSON untuk divalidasi dan disimpan ke basis data persistensi server.
  - `POST /api/auth/login`: Mengirimkan kredensial email dan password dalam format JSON untuk divalidasi dengan algoritma Bcrypt dan menerima token JWT sesi.
  - `GET /api/profile`: Mengambil detail informasi profil pengguna terproteksi token otentikasi Bearer.
- **Contoh Implementasi Kode Koneksi Fetch API (`src/dashboard.ts`):**
  ```javascript
  // Mengirim request GET asinkronus ke server REST API
  const token = sessionStorage.getItem("bespoke_token");
  const headers = { "Content-Type": "application/json" };
  if (token) headers["Authorization"] = `Bearer ${token}`;

  const response = await fetch("/api/dashboard", {
    method: "GET",
    headers: headers
  });

  // Melakukan parsing serialisasi data JSON dari server
  const jsonResult = await response.json();
  ```

---

#### 🔹 Task 02: Display API Data
*Tujuan: Mengambil data JSON dari REST API dan menampilkannya pada antarmuka web platform VIP Bespoke Travel secara dinamis.*

```mermaid
flowchart LR
    API["REST API<br/>(Menyediakan data JSON)"] --> JSN["JSON PAYLOAD<br/>(Data program & travel)"]
    JSN --> JS["JAVASCRIPT<br/>(Parsing & olah data)"]
    JS --> DOM["DOM MANIPULATION<br/>(Masukkan ke elemen HTML)"]
    DOM --> UI["VIP CLIENT UI<br/>(Tampil dinamis di halaman)"]
```

- **Alur Penyajian Data API ke Antarmuka:**
  1. **API:** Server menyediakan data portofolio perjalanan, status tindakan, dan profil akun klien.
  2. **JSON:** API mengirimkan respon dalam struktur data JSON (berupa objek dan array koleksi item).
  3. **JavaScript:** Script klien mem-parsing data JSON (`response.json()`), melakukan validasi ketersediaan field data, dan mengekstraksi properti yang diperlukan.
  4. **DOM:** Data diolah dan dirakit ke dalam struktur dokumen HTML menggunakan template literal, `document.createElement()`, serta manipulasi `innerHTML` dan `textContent`.
  5. **UI Interface:** Komponen visual (kartu status, stepper perjalanan, daftar pesan, badge kategori) ditampilkan pada antarmuka pengguna secara mulus tanpa *page refresh*.
- **Manajemen Siklus Hidup State API (API Lifecycle State Management):**
  Untuk memastikan kenyamanan visual dan *perceived performance* terbaik, aplikasi mengimplementasikan 3 state utama:
  1. **Loading State:** Selagi request API diproses, antarmuka menampilkan komponen *Skeleton Loading* (`.skeleton`) beranimasi dan status badge *“Memproses API...”* dengan spinner berputar.
  2. **Success State:** Setelah data JSON berhasil diterima, skeleton digantikan dengan elemen kartu data riil:
     - **Personal Greeting:** `Halo, ${data.customer.name}` pada header dashboard.
     - **Kartu Perlu Tindakan:** Merender daftar proposal dan tinjauan kebutuhan via `renderActionItems()`.
     - **Daftar Permohonan Perjalanan:** Merender kartu perjalanan via `renderRequests()` lengkap dengan indikator progres 5 tahap (*Diajukan &rarr; Ditinjau &rarr; Proposal &rarr; Disetujui &rarr; Dikonfirmasi*).
     - **Jadwal Trip Mendatang:** Menampilkan kartu destinasi, countdown hari, dan status reservasi via `renderUpcoming()`.
     - **Pesan Concierge:** Menampilkan pesan advisor dan status respons via `renderMessages()`.
  3. **Error State & Tombol Retry:** Jika koneksi API terputus atau server mengembalikan error, antarmuka menampilkan kartu penanganan error komunikatif (`.error-state-card`) dan tombol **“Coba Hubungkan Ulang”** (*Retry Button*) yang memungkinkan pengguna mengulang proses sinkronisasi secara instan tanpa perlu reload browser.
- **Contoh Implementasi Kode Dynamic Rendering (`src/dashboard.ts`):**
  ```typescript
  // Mapping data array JSON menjadi elemen kartu antarmuka dinamis
  function renderRequests(requests: TravelRequest[]): void {
    if (!requestsListEl) return;
    requestsListEl.innerHTML = requests.map(req => `
      <div class="p-5 bg-white rounded-2xl border border-slate-200">
        <div class="flex justify-between items-center mb-3">
          <h4 class="font-bold text-slate-900">${escapeHtml(req.destination)}</h4>
          <span class="badge ${req.statusType === 'warning' ? 'badge-sand' : 'badge-soft-blue'}">
            ${escapeHtml(req.status)}
          </span>
        </div>
        <div class="flex gap-2">
          ${req.steps.map((step, idx) => `
            <div class="flex-1">
              <div class="h-1 rounded-full ${idx <= req.currentStepIndex ? 'bg-amber-600' : 'bg-slate-200'}"></div>
              <span class="text-[11px] text-slate-500">${escapeHtml(step)}</span>
            </div>
          `).join('')}
        </div>
      </div>
    `).join('');
  }
  ```

---

### 🏛️ 3. Arsitektur Model-View-Controller / MVC (Week 7 — Zaidaan Diandra)
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

### 💎 4. Pemrograman Berorientasi Objek & Landing Page (Week 6 — Zaidaan Diandra)
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

### 🛡️ 5. Autentikasi Pengguna & Keamanan Backend (Week 5 — Bagas Dewantara)
- **Autentikasi JWT & Bcrypt (`server.js`, `hash-password.js`, `users.json`)**:
  - Enkripsi kata sandi menggunakan pustaka `bcryptjs`.
  - Endpoint `POST /api/auth/login` yang menerbitkan token JWT (*JSON Web Token*) dengan masa berlaku 2 jam.
  - Middleware `requireAuth` dengan skema `Bearer Token` untuk melindungi rute privat (`/api/profile`).
- **Halaman Login & Profil Klien (`public/login.html`, `public/profile.html`)**:
  - Validasi formulir login, manajemen token di `localStorage`, dan penampilan profil akun pengguna.

---

### ⚡ 6. Client-Side Rendering TypeScript & Server-Side Rendering PHP (Week 5 — Bagas Dewantara)
- **Dashboard CSR TypeScript (`src/dashboard.ts`, `src/types.ts`, `public/dashboard.html`)**:
  - Pengambilan data asinkron via `fetch('/api/dashboard')`.
  - Tipe state generik `ApiState<T>` (`idle`, `loading`, `success`, `error`), mekanisme retry, dan floating toast notifications.
  - Formulir modal pembuatan request perjalanan baru via `POST /api/requests`.
- **Dashboard SSR PHP (`public/dashboard.php`, `public/data-processor.php`)**:
  - Rendering halaman dashboard di sisi server menggunakan PHP murni.
  - Modul pemrosesan data, kalkulasi durasi, konversi mata uang Rupiah, dan filter pencarian.

---

### 🚀 7. Pertemuan 9: Framework Laravel — Migration, Eloquent ORM, & CRUD Program Management (Week 9 — Zaidaan Diandra)

Implementasi framework **Laravel 10** untuk membangun arsitektur modern berorientasi database relasional MySQL, menggunakan fitur **Laravel Migration** untuk version control skema tabel, **Eloquent ORM** untuk pemodelan data objek, serta penyusunan antarmuka **CRUD (Create, Read, Update, Delete)** yang dinamis dan terintegrasi penuh.

#### 🔹 Task 01 — Create Database Structure (Laravel Migration)
*Tujuan: Mendefinisikan dan mengelola struktur tabel database melalui kode PHP terstruktur menggunakan sistem Migration Laravel.*

```mermaid
flowchart LR
    M["MIGRATION FILE<br/>(create_programs_table)"] --> A["PHP ARTISAN MIGRATE<br/>(Jalankan Eksekusi CLI)"]
    A --> DB["DATABASE MYSQL<br/>(Database: vip_bespoke)"]
    DB --> T["TABEL PROGRAMS<br/>(id, nama, deskripsi, timestamps)"]
```

- **File Migration:** `database/migrations/2026_11_17_094920_create_programs_table.php`
- **Skema Kolom Tabel `programs`:**
  - `id`: Primary key auto-increment (`$table->id()`)
  - `nama`: Nama program kerja / layanan (`$table->string('nama')`)
  - `deskripsi`: Penjelasan detail program (`$table->text('deskripsi')`)
  - `created_at` & `updated_at`: Stempel waktu otomatis (`$table->timestamps()`)
- **Perintah Eksekusi:**
  ```bash
  php artisan migrate
  ```

---

#### 🔹 Task 02 — Build Program Model (Eloquent ORM)
*Tujuan: Membangun kelas Model Eloquent sebagai Object-Relational Mapping (ORM) yang menghubungkan tabel database `programs` dengan objek PHP berorientasi entitas.*

```mermaid
flowchart TD
    DB[("Database: programs")] <--> EL["Eloquent ORM Engine"]
    EL <--> MOD["Model: App\\Models\\Program"]
    MOD <--> Q1["Program::all() -> Collection Data"]
    MOD <--> Q2["Program::find($id) -> Single Record"]
    MOD <--> Q3["Program::create($data) -> Insert DB"]
```

- **File Model:** `app/Models/Program.php`
- **Konfigurasi Keamanan Mass-Assignment:**
  ```php
  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Program extends Model
  {
      use HasFactory;

      protected $fillable = [
          'nama',
          'deskripsi',
      ];
  }
  ```
- **Pengujian Query Eloquent via Endpoint JSON:**
  - URL Endpoint: `GET /uji-eloquent`
  - Menguji `Program::all()`, `Program::find(1)`, dan `Program::create([...])`.

---

#### 🔹 Task 03 — Build Program CRUD (Program Management)
*Tujuan: Mengintegrasikan Laravel Migration, Eloquent ORM, Controller, dan Blade Views menjadi satu kesatuan fitur antarmuka Program Management yang interaktif dan responsif.*

```mermaid
flowchart LR
    U["USER"] -->|HTTP Request| C["ProgramController"]
    C -->|Eloquent Query| M["Model: Program"]
    M -->|SQL Query| DB[("MySQL Database")]
    DB -->|Result Set| M
    M -->|Objects / Collection| C
    C -->|Render View| V["Blade Template (programs.index)"]
    V -->|Tampilan Web| U
```

- **Operasi CRUD Lengkap:**
  1. **CREATE (Tambah Data):**
     - Tersedia via Modal Quick Add pada tabel utama serta halaman form mandiri `/programs/create`.
     - Validasi input `nama` (required, string, max:255) dan `deskripsi` (required).
     - Menyimpan data baru ke MySQL via `Program::create($validated)`.
  2. **READ (Tampilkan Data):**
     - Halaman utama `/programs` (dan `/`) menampilkan seluruh data program dalam bentuk tabel responsif.
     - Setiap baris menampilkan No urut, Nama Program, Deskripsi, serta tombol aksi.
     - Mengikuti prinsip penting: *"Data yang ditampilkan bersumber murni dari database MySQL, bukan hardcoded di HTML."*
  3. **UPDATE (Edit Data):**
     - Tombol **Edit** (biru) mengarahkan ke form `/programs/{id}/edit` dengan field terisi data eksisting.
     - Menyimpan perubahan ke MySQL via `$program->update($validated)`.
  4. **DELETE (Hapus Data):**
     - Tombol **Hapus** (merah) dengan dialog konfirmasi keamanan browser.
     - Menghapus record secara permanen via `$program->delete()`.
- **Pengujian Otomatis (Automated Feature Testing):**
  - File pengujian: `tests/Feature/ProgramCrudTest.php`
  - Menjalankan 6 test assertion: List View, Create Page, Store Data, Update Data, Delete Data, dan Uji Eloquent Endpoint. Seluruh pengujian lulus 100% (*Tests: 6 passed, 17 assertions*).
- **Prinsip Integrasi:** Tidak merusak halaman sebelumnya (*Preserves Existing Pages*). Route `/landing` dan `/vip-portal` tetap dapat diakses dengan mulus.

---

## 📂 Struktur Direktori Proyek

```plaintext
VIP-BESPOKE-TRAVEL/
├── app/                      # [Week 9 - Laravel] Inti Logika Aplikasi Laravel
│   ├── Http/Controllers/     # Controller Laravel (ProgramController.php)
│   └── Models/               # Model Eloquent (Program.php, User.php)
├── bootstrap/                # [Laravel] Inisialisasi framework & cache
├── config/                   # [Laravel] Konfigurasi database, app, session, dll.
├── database/                 # [Week 9 - Laravel] Database Migrations & Seeders
│   ├── migrations/           # File migrasi (create_programs_table.php)
│   └── seeders/              # Seeder data program (ProgramSeeder.php)
├── resources/                # [Week 9 - Laravel] Blade Template Views
│   └── views/
│       ├── layouts/app.blade.php      # Layout dasar, navbar, & flash message
│       └── programs/
│           ├── index.blade.php        # Tampilan tabel VIP Bespoke Programs + Modal Quick Add
│           ├── create.blade.php       # Form tambah program mandiri
│           └── edit.blade.php         # Form edit program terisi data eksisting
├── routes/                   # [Week 9 - Laravel] Definisi Routing Web & API
│   └── web.php               # Resource routes CRUD programs & endpoint uji-eloquent
├── tests/                    # [Week 9 - Laravel] Pengujian Otomatis Feature Test
│   └── Feature/ProgramCrudTest.php    # Automated testing 6 skenario CRUD
├── artisan                   # [Laravel] CLI Tool Runner
├── assets/                   # [Assets] Foto & Media Resolusi Tinggi Lokal
│   └── images/               # Koleksi foto koper pesisir, Santorini, Alpen, dan referensi
├── controllers/              # [Week 7 - Zaidaan] Controller Pola Arsitektur MVC PHP
│   └── DashboardController.php # Logika bisnis, filter status, dispatch view
├── models/                   # [Week 7 - Zaidaan] Model Data Layer Pola Arsitektur MVC PHP
│   └── TravelModel.php       # Abstraksi data JSON, query filtering, agregasi statistik
├── views/                    # [Week 7 - Zaidaan] View Presentation Layer Pola Arsitektur MVC PHP
│   └── dashboard-view.php    # UI Patron Dashboard (Sovereign Reserve, Black Gold, Charts)
├── src/                      # [Bagas] Source Code Frontend TypeScript
│   ├── dashboard.ts          # Logika frontend CSR, API fetcher, & DOM rendering
│   └── types.ts              # Definisi interface TypeScript & generic state API
├── public/                   # [Laravel & Bagas] Asset Web Statis & Public Entrypoint
│   ├── index.php             # Laravel Public Entrypoint
│   ├── landing_page.html     # Halaman beranda utama
│   ├── login.html            # Halaman login klien
│   ├── dashboard.html        # Halaman dashboard VIP (CSR via REST API)
│   ├── dashboard.php         # Halaman dashboard VIP (SSR via PHP)
│   └── assets/               # Aset gambar publik
├── index.php                 # [Week 7 - Zaidaan] Front Controller / Entry Point Aplikasi MVC
├── latihan1.php              # [Week 6 - Zaidaan] Landing Page Dinamis & Integrasi VIP Portal
├── latihan1.html             # [Week 6 - Zaidaan] File Desain Landing Page Black Gold Luxury
├── BespokeConcierge.php      # [Week 6 - Zaidaan] Implementasi Class Berorientasi Objek (OOP)
├── script.js                 # [Pertemuan 3 & 4] Script Client-Side DOM Selection & Fetch API
├── server.js                 # [Bagas] Server Express.js (REST API & Static Server)
├── users.json                # [Bagas] Database mock pengguna & hash password Bcrypt
├── dashboard-data.json       # Mock database bersama (mendukung Express API & PHP MVC)
├── composer.json             # Manifest dependensi Composer Laravel 10
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

### 4. Menjalankan Aplikasi Laravel & CRUD Program Management (Week 9) ⭐
Untuk menjalankan aplikasi Laravel yang mengimplementasikan Migration, Eloquent ORM, dan CRUD Program Management yang dikembangkan oleh **Zaidaan Diandra**:

1. **Pastikan MySQL berjalan (via Laragon / XAMPP):**
   - Database: `vip_bespoke` (port 3306, user `root`, password kosong / default Laragon).
2. **Jalankan Migration & Seeder (jika pertama kali setup):**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```
3. **Jalankan Server Laravel Artisan:**
   ```bash
   php artisan serve
   ```
4. **Akses melalui browser:**
   - 🌟 **Program Management CRUD (Week 9):** [http://localhost:8000/programs](http://localhost:8000/programs) atau [http://localhost:8000](http://localhost:8000)
   - ➕ **Form Tambah Program:** [http://localhost:8000/programs/create](http://localhost:8000/programs/create)
   - 📡 **Endpoint Uji Eloquent JSON (Task 02):** [http://localhost:8000/uji-eloquent](http://localhost:8000/uji-eloquent)
   - 💎 **Landing Page VIP (Preserved):** [http://localhost:8000/landing](http://localhost:8000/landing)
5. **Menjalankan Pengujian Otomatis (Automated Testing):**
   ```bash
   php artisan test tests/Feature/ProgramCrudTest.php
   ```

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

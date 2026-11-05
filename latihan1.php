<?php
/**
 * Pertemuan 6 - Web Programming
 * Implementasi Task 01 - 03 pada Proyek Bespoke:
 * 
 * TASK 01: Create a Class (CLASS -> OBJECT)
 * TASK 02: Add Properties & Methods (OBJECT = DATA + BEHAVIOR)
 * TASK 03: Generate Dynamic Content with Object (OBJECT -> PHP -> HTML)
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
 */

require_once __DIR__ . '/BespokeConcierge.php';

// =============================================================================
// TASK 01: MEMBUAT OBJECT DARI CLASS (CLASS -> OBJECT)
// =============================================================================
$bespoke = new BespokeConcierge(
    suiteName: 'The Alpine Retreat',
    destination: 'Zermatt & St. Moritz, Swiss',
    client: 'VIP Member #8821',
    status: 'Proposal Approved',
    totalCurated: '4 Vendor Premium Terverifikasi',
    stats: [
        ['label' => 'Respon', 'value' => '< 15 Menit', 'color' => 'text-brass'],
        ['label' => 'Keamanan', 'value' => '100% Privat', 'color' => 'text-emerald-400'],
        ['label' => 'Sinkronisasi', 'value' => 'Real-Time', 'color' => 'text-ivory']
    ],
    services: [
        [
            'title'       => 'Private Jet Charter',
            'description' => 'Akses instan ke armada jet pribadi premium untuk perjalanan tanpa hambatan lintas benua.',
            'icon'        => '✈',
            'badge'       => 'Aviation'
        ],
        [
            'title'       => 'Luxury Yacht Rental',
            'description' => 'Eksplorasi maritim eksklusif dengan kapal pesiar mewah berstandar bintang lima dan awak profesional.',
            'icon'        => '⚓',
            'badge'       => 'Maritime'
        ],
        [
            'title'       => 'VIP Event Access',
            'description' => 'Akses tiket prioritas dan red carpet ke acara bergengsi kelas internasional serta private backstage pass.',
            'icon'        => '✦',
            'badge'       => 'Exclusive'
        ]
    ]
);

// =============================================================================
// TASK 02: MEMANGGIL METHOD OBJEK (DATA + BEHAVIOR)
// =============================================================================
$suiteProfile  = $bespoke->getSuiteProfile();
$extraServices = $bespoke->getServices();
$quickStats    = $bespoke->getStats();
$statusBadge   = $bespoke->getStatusBadge();
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bespoke — Private Concierge Platform (PHP OOP Active)</title>

    <!-- Google Fonts: Cormorant Garamond & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Stylesheet Utama Proyek Bespoke -->
    <link rel="stylesheet" href="style.css" />

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              ink: '#0d1712',
              'ink-soft': '#17241d',
              paper: '#ffffff',
              'paper-tint': '#f8fafc',
              brass: '#c5a059',
              'brass-deep': '#967431',
              ivory: '#fcfbf8',
              'ivory-dim': '#cbd5e1',
              charcoal: '#1e293b',
              'charcoal-dim': '#64748b',
            },
            fontFamily: {
              serif: ['"Cormorant Garamond"', 'Georgia', 'serif'],
              sans: ['"Plus Jakarta Sans"', 'Manrope', 'sans-serif'],
            },
            maxWidth: {
              'wrap': '1140px',
            }
          }
        }
      }
    </script>
  </head>
  <body>

    <!-- ======================================================================
         BANNER EVALUASI PRAKTIKUM (PERTEMUAN 6: TASK 01 - 03)
         Menunjukkan verifikasi pengerjaan OOP secara elegan & informatif
         ====================================================================== -->
    <div class="bg-ink text-ivory-dim border-b border-brass/20 text-xs py-2 px-4">
      <div class="max-w-wrap mx-auto flex flex-wrap items-center justify-between gap-2">
        <div class="flex items-center gap-2">
          <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-brass/20 text-brass border border-brass/40 font-semibold text-[11px]">
            <span class="w-1.5 h-1.5 rounded-full bg-brass animate-pulse"></span> PHP OOP Active
          </span>
          <span class="text-slate-300">Pertemuan 6: Task 01 - 03 Terintegrasi di Website Bespoke</span>
        </div>
        <div class="flex items-center gap-3 text-[11px]">
          <span class="text-emerald-400 font-medium">✓ Class: BespokeConcierge</span>
          <span class="text-emerald-400 font-medium">✓ Method: getSuiteProfile() &amp; getServices()</span>
          <span class="text-brass font-bold">✓ Dynamic Content Generated</span>
        </div>
      </div>
    </div>

    <!-- ======================================================================
         1. NAVBAR / HEADER
         ====================================================================== -->
    <header class="sticky top-0 z-50 bg-ink/90 backdrop-blur-md border-b border-white/10 transition-all duration-300">
      <nav class="max-w-wrap mx-auto px-6 flex items-center justify-between py-4">
        <!-- Logo Brand -->
        <a href="#" class="flex items-center gap-2.5 font-serif text-2xl tracking-wide text-ivory font-semibold">
          <span class="w-2.5 h-2.5 rounded-full bg-brass inline-block shadow-[0_0_8px_rgba(197,160,89,0.8)]"></span>
          Bespoke
        </a>

        <!-- Menu Navigasi Tengah -->
        <div class="hidden md:flex items-center gap-8 text-[14.5px] text-ivory-dim font-medium">
          <a href="#masalah" class="hover:text-brass transition-colors">Masalah</a>
          <a href="#alur" class="hover:text-brass transition-colors">Alur Kerja</a>
          <a href="#fitur" class="hover:text-brass transition-colors">Fitur</a>
          <a href="#api-data" class="hover:text-brass transition-colors">Layanan Dinamis</a>
          <a href="#kontak" class="hover:text-brass transition-colors">Kontak</a>
        </div>

        <!-- Tombol Aksi Kanan -->
        <div class="flex items-center gap-3">
          <!-- Tombol Login (Membuka Modal) -->
          <button id="btn-open-login" class="text-sm font-semibold px-4 py-2 text-ivory hover:text-brass transition-colors">
            Login
          </button>
          <!-- Tombol Demo -->
          <a href="#kontak" class="text-sm font-semibold px-5 py-2.5 bg-brass text-ink hover:bg-[#d4b885] rounded-md transition-all duration-200 shadow-sm" id="btn-nav">
            Jadwalkan Demo
          </a>
        </div>
      </nav>
    </header>


    <!-- ======================================================================
         2. HERO SECTION
         Dua kolom: Value proposition di kiri & kartu visual dinamis di kanan
         ====================================================================== -->
    <section class="relative min-h-[85vh] flex items-center pt-24 pb-20 text-ivory bg-[url('Switzerland.jfif')] bg-cover bg-center bg-no-repeat bg-fixed">
      <!-- Dark Gradient Overlay -->
      <div class="absolute inset-0 bg-gradient-to-r from-ink/95 via-ink/85 to-ink/70 z-0"></div>

      <div class="max-w-wrap mx-auto px-6 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
        <!-- Kolom Kiri: Teks & CTA (7 Kolom) -->
        <div class="lg:col-span-7">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brass/15 border border-brass/30 text-brass text-xs font-semibold uppercase tracking-wider mb-6">
            <span>✦</span> Private Concierge Platform — B2B / White-label
          </div>
          <h1 class="font-serif font-semibold text-4xl md:text-5xl lg:text-[58px] leading-[1.12] mb-6 text-ivory">
            Setiap permintaan pelanggan, menjadi pengalaman yang dirancang khusus.
          </h1>
          <p class="text-base md:text-lg text-slate-300 leading-relaxed max-w-[54ch] mb-8 font-normal">
            Bespoke menyatukan seluruh alur concierge — mulai dari permintaan, kurasi, itinerary, proposal, hingga booking — ke dalam satu ekosistem terpadu.
          </p>
          <div class="flex flex-wrap items-center gap-4">
            <a href="#kontak" class="bg-brass text-ink font-bold text-sm md:text-base px-7 py-3.5 rounded-md hover:bg-[#d4b885] transition-all duration-200 shadow-md hover:-translate-y-0.5" id="btn-hero">
              Jadwalkan Demo
            </a>
            <a href="#alur" class="border border-white/20 text-ivory font-medium text-sm md:text-base px-6 py-3.5 rounded-md hover:bg-white/10 hover:border-white/40 transition-colors">
              Lihat Alur Kerja ↓
            </a>
          </div>
        </div>

        <!-- ==================================================================
             TASK 03: KARTU DASHBOARD HERO DI-GENERATE DINAMIS DARI OBJECT PHP
             Menggunakan $bespoke->getSuiteProfile() & $bespoke->getStats()
             ================================================================== -->
        <div class="lg:col-span-5 hidden md:block">
          <div class="bg-ink-soft/85 backdrop-blur-md border border-white/15 p-6 rounded-2xl shadow-2xl relative">
            <!-- Header Kartu Dinamis -->
            <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-5">
              <div>
                <span class="text-xs text-brass font-semibold uppercase tracking-wider">Live Concierge Suite</span>
                <h3 class="text-base font-serif font-bold text-ivory">
                  <?= htmlspecialchars($suiteProfile['suiteName']) ?>
                </h3>
              </div>
              <!-- Status Badge Dinamis dari Method getStatusBadge() -->
              <?= $statusBadge ?>
            </div>

            <!-- Detail Perjalanan Dinamis dari Data Object -->
            <div class="space-y-3 mb-5">
              <div class="flex justify-between text-xs py-2 px-3 rounded-lg bg-white/5 border border-white/5">
                <span class="text-slate-400">Destinasi</span>
                <span class="text-ivory font-semibold">
                  <?= htmlspecialchars($suiteProfile['destination']) ?>
                </span>
              </div>
              <div class="flex justify-between text-xs py-2 px-3 rounded-lg bg-white/5 border border-white/5">
                <span class="text-slate-400">Klien</span>
                <span class="text-ivory font-semibold">
                  <?= htmlspecialchars($suiteProfile['client']) ?>
                </span>
              </div>
              <div class="flex justify-between text-xs py-2 px-3 rounded-lg bg-white/5 border border-white/5">
                <span class="text-slate-400">Total Kurasi</span>
                <span class="text-brass font-semibold">
                  <?= htmlspecialchars($suiteProfile['totalCurated']) ?>
                </span>
              </div>
            </div>

            <!-- 3 Poin Keunggulan Cepat (Looping dari Method getStats()) -->
            <div class="grid grid-cols-3 gap-2 pt-3 border-t border-white/10 text-center">
              <?php foreach ($quickStats as $stat): ?>
                <div class="p-2 rounded bg-white/5">
                  <p class="text-[11px] text-slate-400"><?= htmlspecialchars($stat['label']) ?></p>
                  <p class="text-xs font-bold <?= htmlspecialchars($stat['color']) ?>"><?= htmlspecialchars($stat['value']) ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ======================================================================
         3. STRIP KATEGORI MITRA
         ====================================================================== -->
    <div class="strip">
      <div class="wrap">
        <span>Luxury Travel Agency</span>
        <span>Private Travel Consultant</span>
        <span>Wedding &amp; Event Planner</span>
        <span>Villa / Resort Management</span>
        <span>Private Concierge Business</span>
      </div>
    </div>


    <!-- ======================================================================
         4. SECTION MASALAH & SOLUSI
         ====================================================================== -->
    <section id="masalah" class="bg-white">
      <div class="wrap">
        <div class="section-head">
          <h2>Layanan premium tidak seharusnya dikelola secara manual.</h2>
          <p>
            Ketika perencanaan perjalanan atau acara mewah dikoordinasikan lintas aplikasi yang terpisah, pelanggan dan concierge sama-sama kehilangan waktu — dan sentuhan personalnya memudar.
          </p>
        </div>

        <div class="split">
          <!-- Kotak Masalah -->
          <div class="masalah">
            <span class="badge-tag">✕ Tantangan Saat Ini</span>
            <h3>Masalah Pengelolaan Manual</h3>
            <p>
              Perencanaan perjalanan atau acara premium membutuhkan koordinasi berbagai layanan secara terpisah (WhatsApp, email, spreadsheet). Pelanggan harus menghabiskan banyak waktu untuk mencari, memilih, dan mencocokkan setiap kebutuhan sendiri.
            </p>
          </div>

          <!-- Kotak Solusi -->
          <div class="solusi">
            <span class="badge-tag">✓ Solusi Bespoke</span>
            <h3>Satu Ekosistem Terintegrasi</h3>
            <p>
              Bespoke membantu merancang, mengoordinasikan, dan mengelola seluruh pengalaman pelanggan secara personal berdasarkan preferensi, kebutuhan, dan anggaran mereka — semuanya dalam satu sistem terintegrasi yang rapi.
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- ======================================================================
         5. SECTION ALUR KERJA (WORKFLOW 01 - 08)
         ====================================================================== -->
    <section id="alur" class="bg-slate-50/70">
      <div class="wrap">
        <div class="section-head">
          <h2>Dari permintaan hingga booking, dalam satu alur.</h2>
          <p>
            Pelanggan mengisi Experience Brief, sistem membentuk Preference Profile, dan concierge Anda menyusun pengalaman yang sesuai — dengan ruang revisi sebelum disetujui.
          </p>
        </div>

        <div class="steps">
          <div class="step">
            <div class="num">01</div>
            <h4>Customer Request</h4>
            <p>Pelanggan mengajukan kebutuhan lewat Experience Brief — preferensi, anggaran, dan konteks acara.</p>
          </div>

          <div class="step">
            <div class="num">02</div>
            <h4>Concierge Review</h4>
            <p>Tim concierge meninjau permintaan dan preference profile yang terbentuk otomatis dari brief.</p>
          </div>

          <div class="step">
            <div class="num">03</div>
            <h4>Curated Experiences</h4>
            <p>Concierge memilih dan menyusun layanan serta vendor yang paling sesuai dengan kebutuhan pelanggan.</p>
          </div>

          <div class="step">
            <div class="num">04</div>
            <h4>Itinerary Builder</h4>
            <p>Rangkaian pengalaman disusun menjadi jadwal harian yang terstruktur, visual, dan mudah dipahami.</p>
          </div>

          <div class="step">
            <div class="num">05</div>
            <h4>Proposal Presentation</h4>
            <p>Proposal digital dikirimkan ke pelanggan lengkap dengan detail visual, opsi, dan rincian biaya.</p>
          </div>

          <div class="step">
            <div class="num">06</div>
            <h4>Revision &amp; Notes</h4>
            <p>Pelanggan dapat meminta penyesuaian atau memberikan catatan khusus langsung di dalam proposal.</p>
          </div>

          <div class="step">
            <div class="num">07</div>
            <h4>Customer Approval</h4>
            <p>Setelah seluruh detail disetujui, pelanggan mengonfirmasi proposal secara resmi di platform.</p>
          </div>

          <div class="step">
            <div class="num">08</div>
            <h4>Vendor Booking</h4>
            <p>Concierge mengonfirmasi ketersediaan dan melakukan booking langsung ke vendor-vendor terpilih.</p>
          </div>
        </div>
      </div>
    </section>


    <!-- ======================================================================
         6. SECTION FITUR UTAMA
         ====================================================================== -->
    <section id="fitur" class="bg-white">
      <div class="wrap">
        <div class="section-head">
          <h2>Dirancang untuk alur kerja concierge yang sesungguhnya.</h2>
          <p>
            Bukan CRM generik. Setiap fitur dibangun khusus untuk mendukung kecepatan respon, ketepatan kurasi, dan keanggunan presentasi proposal kepada pelanggan kelas atas.
          </p>
        </div>

        <div class="feature-list">
          <div class="feature feature-highlight">
            <div class="tag">✦ Inti Platform</div>
            <h4>Curated Experience Catalog</h4>
            <p>
              Simpan, kelola, dan akses direktori vendor, properti, dan pengalaman eksklusif Anda di satu tempat yang selalu mutakhir.
            </p>
          </div>

          <div class="feature">
            <h4>Live Proposal Experience</h4>
            <p>
              Kirimkan proposal dalam format digital interaktif yang elegan, dapat diakses langsung oleh pelanggan dari perangkat apa pun.
            </p>
          </div>

          <div class="feature">
            <h4>Concierge Activity Feed</h4>
            <p>
              Pantau status setiap permintaan, revisi, dan konfirmasi booking secara real-time tanpa ada detail yang terlewat.
            </p>
          </div>

          <div class="feature">
            <h4>White-Label &amp; Multi-Brand</h4>
            <p>
              Gunakan nama, domain, dan identitas visual bisnis Anda sendiri di hadapan seluruh pelanggan Anda.
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- ======================================================================
         7. SEGMEN & ARSITEKTUR AI
         ====================================================================== -->
    <section class="bg-slate-50/70">
      <div class="wrap">
        <div class="section-head">
          <h2>Satu platform untuk berbagai model bisnis pengalaman.</h2>
          <p>
            Bespoke dirancang cukup fleksibel untuk mendukung berbagai jenis bisnis yang mengutamakan kurasi dan sentuhan personal.
          </p>
        </div>

        <div class="segments mb-12">
          <span class="segment main">Luxury Travel Agency</span>
          <span class="segment main">Private Travel Consultant</span>
          <span class="segment">Wedding Planner</span>
          <span class="segment">Villa / Resort Management</span>
          <span class="segment">Private Concierge Business</span>
        </div>

        <!-- AI Note Box -->
        <div class="ai-note-box">
          <span class="label">✦ Arsitektur AI di Bespoke</span>
          <p>
            AI pada Bespoke bersifat modular dan opsional — sistem operasional inti tetap berjalan 100% tanpa ketergantungan AI. Di masa depan, AI dapat diaktifkan sebagai add-on cerdas untuk smart recommendation vendor, penyusunan rute otomatis, atau AI Assistant Concierge 24/7.
          </p>
        </div>
      </div>
    </section>


    <!-- ======================================================================
         8. SECTION LAYANAN DINAMIS (TASK 03: DYNAMIC CONTENT WITH PHP OBJECT)
         OBJECT -> PHP -> GENERATED HTML
         ====================================================================== -->
    <section id="api-data" class="bg-white">
      <div class="wrap">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-brass/15 text-brass text-xs font-semibold mb-3">
            <span>⚡</span> Dynamic Content with Object (PHP)
          </div>
          <h2 class="font-serif text-3xl md:text-4xl font-semibold text-ink mb-3">
            Layanan Ekstra Berkelanjutan
          </h2>
          <p class="text-slate-600 text-sm md:text-base">
            Kartu-kartu di bawah ini di-generate secara dinamis menggunakan perulangan PHP dari pemanggilan method <code class="font-mono text-xs text-brass font-bold bg-amber-50 px-2 py-1 rounded">$bespoke->getServices()</code>.
          </p>
        </div>

        <!-- Render Kartu Layanan Dinamis via PHP Loop -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <?php foreach ($extraServices as $index => $service): ?>
            <div class="bg-white p-7 border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 relative">
              <div class="flex items-center justify-between mb-4">
                <div class="w-10 h-10 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg flex items-center justify-center font-bold text-base">
                  <?= htmlspecialchars($service['icon']) ?>
                </div>
                <span class="text-[11px] font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 border border-slate-200">
                  <?= htmlspecialchars($service['badge']) ?>
                </span>
              </div>
              <h3 class="font-bold text-lg mb-2 text-slate-800">
                <?= htmlspecialchars($service['title']) ?>
              </h3>
              <p class="text-sm text-slate-600 leading-relaxed">
                <?= htmlspecialchars($service['description']) ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>


    <!-- ======================================================================
         9. SECTION CALL TO ACTION (KONTAK)
         ====================================================================== -->
    <section id="kontak" class="bg-slate-50/70 border-b-0">
      <div class="wrap">
        <div class="cta-block">
          <h2>Beri bisnis Anda ruang kerja concierge sendiri.</h2>
          <p>
            Bespoke hadir dengan branding bisnis Anda sendiri — B2B, white-label, dan siap disesuaikan dengan cara kerja tim Anda.
          </p>
          <a class="btn-primary" href="mailto:hello@bespoke.id">
            Jadwalkan Demo Sekarang
          </a>
          <div class="tags">
            <span>B2B / White-label</span>
            <span>PHP OOP Ready</span>
            <span>Tailwind + Semantic HTML</span>
            <span>High Performance</span>
          </div>
        </div>
      </div>
    </section>


    <!-- ======================================================================
         10. MODAL LOGIN (REST API POST)
         ====================================================================== -->
    <div id="login-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
      <div class="bg-white p-7 md:p-8 rounded-2xl max-w-md w-full relative shadow-2xl border border-slate-100">
        <!-- Tombol Tutup -->
        <button id="btn-close-login" class="absolute top-4 right-4 text-slate-400 hover:text-slate-800 font-bold text-2xl w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 transition">
          &times;
        </button>

        <span class="text-xs font-bold text-brass uppercase tracking-wider">Portal Autentikasi</span>
        <h2 class="text-2xl font-serif font-bold text-ink mt-1 mb-1">Masuk Bespoke</h2>
        <p class="text-sm text-slate-500 mb-6">Gunakan akun demonstrasi di bawah ini untuk menguji koneksi API.</p>

        <form id="login-form" class="flex flex-col gap-4">
          <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-1.5">
              Email Demo <span class="text-brass font-normal">(eve.holt@reqres.in)</span>
            </label>
            <input
              type="email"
              id="email"
              value="eve.holt@reqres.in"
              class="w-full border border-slate-300 px-3.5 py-2.5 rounded-lg text-slate-800 text-sm focus:outline-none focus:border-brass focus:ring-2 focus:ring-brass/20 transition"
              required
            />
          </div>

          <div>
            <label class="block text-xs font-bold text-slate-700 uppercase mb-1.5">Password</label>
            <input
              type="password"
              id="password"
              value="cityslicka"
              placeholder="Masukkan password"
              class="w-full border border-slate-300 px-3.5 py-2.5 rounded-lg text-slate-800 text-sm focus:outline-none focus:border-brass focus:ring-2 focus:ring-brass/20 transition"
              required
            />
          </div>

          <button type="submit" class="bg-brass text-ink font-bold py-3 rounded-lg mt-2 hover:bg-[#d4b885] transition-colors shadow-sm">
            Masuk ke Dashboard
          </button>
        </form>

        <!-- Wadah Notifikasi Pesan -->
        <div id="login-message" class="hidden mt-4 p-3 text-sm text-center font-semibold rounded-lg"></div>
      </div>
    </div>


    <!-- ======================================================================
         11. FOOTER
         ====================================================================== -->
    <footer>
      <div class="wrap">
        <span class="font-medium text-slate-400">Bespoke — Private Concierge Platform</span>
        <span class="text-slate-500">© 2026. Praktikum Web Programming &bull; Pertemuan 6 (OOP PHP).</span>
      </div>
    </footer>

    <!-- Logic JavaScript untuk Interaksi UI & Modal Login -->
    <script src="script.js"></script>
  </body>
</html>

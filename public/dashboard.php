<?php
/**
 * VIP Bespoke Travel - Customer Dashboard (Server-Side Rendered dengan PHP)
 * 
 * ALUR PROSES GENERASI KONTEN DASHBOARD DINAMIS:
 * 1. PHP DATA       : Seluruh data program disimpan dalam variabel & array (struktur terstruktur).
 * 2. PROCCESS       : Data diproses oleh PHP menggunakan perulangan (looping), logika kondisional,
 *                     kalkulasi agregasi, filter pencarian, dan normalisasi format.
 * 3. GENERATED HTML : PHP menghasilkan blok kode tag HTML secara dinamis berbasis data hasil proses,
 *                     sehingga tidak ada komponen berulang yang ditulis manual satu per satu.
 * 4. TAMPIL KONTEN  : Hasil render HTML utuh dikirimkan ke browser untuk ditampilkan ke pengguna.
 */

// =====================================================================
// TAHAP 1: PHP DATA (Data Program Disimpan dalam Variabel & Array)
// =====================================================================

// 1.1 Muat modul logika pemrosesan data PHP
require_once __DIR__ . '/data-processor.php';

// 1.2 Muat data dari file database/mock JSON, atau gunakan data array bawaan PHP
$jsonFilePath = __DIR__ . '/../dashboard-data.json';
if (!file_exists($jsonFilePath)) {
    $jsonFilePath = __DIR__ . '/dashboard-data.json';
}

$rawData = null;
if (file_exists($jsonFilePath)) {
    $rawJson = @file_get_contents($jsonFilePath);
    if ($rawJson !== false) {
        $rawData = json_decode($rawJson, true);
    }
}

// Fallback data default dalam array PHP jika file JSON belum tersedia
if (!is_array($rawData)) {
    $rawData = [
        "business" => [
            "name" => "Bespoke",
            "logo" => "B"
        ],
        "customer" => [
            "name" => "Dragon",
            "email" => "dahlah@contoh.com"
        ],
        "perluTindakan" => [
            [
                "id" => "act-1",
                "type" => "proposal",
                "title" => "Proposal v2 siap ditinjau",
                "subtitle" => "Kyoto Autumn Luxury Escape • diperbarui 12 Okt 2026",
                "badge" => "Versi 2",
                "actionLabel" => "Lihat Proposal",
                "actionUrl" => "#"
            ],
            [
                "id" => "act-2",
                "type" => "review",
                "title" => "Permintaan perubahan Anda sedang ditinjau",
                "subtitle" => "Concierge akan mengirim versi baru bila perubahan diterima.",
                "badge" => "In Review",
                "actionLabel" => null,
                "actionUrl" => null
            ]
        ],
        "requestSaya" => [
            [
                "id" => "req-1",
                "destination" => "The Alpine Retreat: Zermatt & St. Moritz",
                "dateRange" => "18 Nov – 25 Nov 2026",
                "guests" => 2,
                "statusBadge" => "Proposal Dikirim",
                "statusType" => "warning",
                "currentStepIndex" => 2,
                "image" => "Switzerland.jfif",
                "steps" => ["Diajukan", "Ditinjau", "Proposal", "Disetujui", "Dikonfirmasi"],
                "footerType" => "estimate",
                "costEstimate" => "Rp 145.000.000",
                "costBadge" => "Estimasi"
            ],
            [
                "id" => "req-2",
                "destination" => "Como Lake Private Villa & Vintage Yacht",
                "dateRange" => "10 Des – 16 Des 2026",
                "guests" => 4,
                "statusBadge" => "Dikonfirmasi",
                "statusType" => "info",
                "currentStepIndex" => 4,
                "steps" => ["Diajukan", "Ditinjau", "Proposal", "Disetujui", "Dikonfirmasi"],
                "footerType" => "confirmed",
                "confirmedText" => "Booking 4 dari 4 Confirmed"
            ]
        ],
        "perjalananMendatang" => [
            "dateDay" => "18",
            "dateMonth" => "NOV",
            "destination" => "Kyoto, Jepang",
            "confirmedSummary" => "3 dari 4 booking Confirmed"
        ],
        "pesanTerbaru" => [
            [
                "id" => "msg-1",
                "sender" => "Michael (Concierge)",
                "initial" => "C",
                "time" => "10m lalu",
                "message" => "Proposal v2 siap ditinjau dengan kurasi villa dan private dining di Kyoto."
            ],
            [
                "id" => "msg-2",
                "sender" => "Michael (Concierge)",
                "initial" => "C",
                "time" => "2 jam lalu",
                "message" => "Permintaan perubahan jadwal privat onsen telah disesuaikan dengan concierge lokal."
            ]
        ]
    ];
}

// Pastikan data customer tersedia
if (!isset($rawData['customer'])) {
    $rawData['customer'] = [
        "name" => "Dragon",
        "email" => "dahlah@contoh.com"
    ];
}

// 1.3 Data Struktur Menu Navigasi Sidebar (Array Data PHP)
$sidebarNavData = [
    [
        'id' => 'nav-home',
        'label' => 'Beranda',
        'href' => 'dashboard.php',
        'active' => true,
        'svgPath' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'
    ],
    [
        'id' => 'nav-request',
        'label' => 'Request Saya',
        'href' => '#request-section',
        'active' => false,
        'svgPath' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'
    ],
    [
        'id' => 'nav-proposal',
        'label' => 'Proposal',
        'href' => '#action-section',
        'active' => false,
        'svgPath' => 'M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'
    ],
    [
        'id' => 'nav-booking',
        'label' => 'Booking',
        'href' => '#upcoming-section',
        'active' => false,
        'svgPath' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'
    ],
    [
        'id' => 'nav-messages',
        'label' => 'Pesan',
        'href' => '#messages-section',
        'active' => false,
        'svgPath' => 'M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'
    ]
];

// =====================================================================
// TAHAP 2: PROCCESS (Data Diproses oleh PHP: Loop, Kondisional, Agregasi)
// =====================================================================

// 2.1 Pemrosesan Pengajuan Form POST Server-Side (Buat Request Baru)
$notification = null;
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && ($_POST['action'] ?? '') === 'new_request') {
    $destination = trim($_POST['destination'] ?? '');
    $dateRange   = trim($_POST['dateRange'] ?? '');
    $guests      = (int)($_POST['guests'] ?? 2);
    $notes       = trim($_POST['notes'] ?? '');

    // Logika Kondisional Validasi Input
    if ($destination !== '' && $dateRange !== '') {
        $newRequest = [
            'id' => 'req-' . time(),
            'destination' => $destination,
            'dateRange' => $dateRange,
            'guests' => $guests > 0 ? $guests : 1,
            'statusBadge' => 'Diajukan',
            'statusType' => 'warning',
            'currentStepIndex' => 0,
            'steps' => ["Diajukan", "Ditinjau", "Proposal", "Disetujui", "Dikonfirmasi"],
            'footerType' => 'estimate',
            'costEstimate' => 'Menunggu Kurasi',
            'costBadge' => 'Baru'
        ];

        if (!isset($rawData['requestSaya']) || !is_array($rawData['requestSaya'])) {
            $rawData['requestSaya'] = [];
        }
        array_unshift($rawData['requestSaya'], $newRequest);

        if (file_exists($jsonFilePath) && is_writable($jsonFilePath)) {
            @file_put_contents($jsonFilePath, json_encode($rawData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        $notification = [
            'type' => 'success',
            'title' => 'Permintaan Berhasil Diproses',
            'message' => 'Concierge kami telah menerima dan memproses data perjalanan untuk "' . htmlspecialchars($destination) . '".'
        ];
    } else {
        $notification = [
            'type' => 'error',
            'title' => 'Gagal Mengirim',
            'message' => 'Destinasi dan tanggal perjalanan wajib diisi.'
        ];
    }
}

// 2.2 Eksekusi Pipeline Pemrosesan Data Utama (Data Processing Pipeline)
// Mengolah: greeting waktu server, inisial avatar, kalkulasi durasi, hitung mundur tanggal,
// kalkulasi agregat portofolio anggaran, dan filter pencarian kata kunci.
$processed = processDashboardData($rawData, $_GET);

$business            = $processed['business'];
$customer            = $processed['customer'];
$greeting            = $processed['greeting'];
$metrics             = $processed['metrics'];
$perluTindakan       = $processed['perluTindakan'];
$requestSaya         = $processed['requestSaya'];
$allRequestsCount    = $processed['allRequestsCount'];
$perjalananMendatang = $processed['perjalananMendatang'];
$pesanTerbaru        = $processed['pesanTerbaru'];
$filterState         = $processed['filterState'];

// 2.3 Pemrosesan & Penyusunan Struktur Kartu KPI / Metrik Ringkasan (PHP Array)
$kpiCards = [
    [
        'id' => 'card-total-request',
        'title' => 'Total Permintaan',
        'value' => (int)$metrics['totalRequests'],
        'unit' => 'Perjalanan',
        'subtext' => '<span class="text-sky-600 font-semibold">' . (int)$metrics['activeRequests'] . ' aktif</span> • <span>' . (int)$metrics['confirmedRequests'] . ' selesai</span>',
        'theme' => 'sky',
        'svgPath' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'
    ],
    [
        'id' => 'card-budget-portfolio',
        'title' => 'Portofolio Anggaran',
        'value' => htmlspecialchars($metrics['formattedBudget']),
        'unit' => '',
        'subtext' => 'Kalkulasi otomatis PHP',
        'theme' => 'amber',
        'svgPath' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'
    ],
    [
        'id' => 'card-upcoming-trip',
        'title' => 'Trip Terdekat',
        'value' => htmlspecialchars($metrics['daysCountdownText']),
        'unit' => '',
        'subtext' => htmlspecialchars($perjalananMendatang['destination'] ?? 'Belum ada agenda'),
        'theme' => 'sky',
        'svgPath' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
    ],
    [
        'id' => 'card-pending-actions',
        'title' => 'Tindakan Menunggu',
        'value' => (int)$metrics['pendingActionsCount'],
        'unit' => 'Item',
        'subtext' => $metrics['pendingActionsCount'] > 0 ? 'Perlu respon persetujuan' : 'Semua telah selesai',
        'theme' => 'rose',
        'svgPath' => 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9'
    ]
];

// 2.4 Pemrosesan Pilihan Tab Filter (PHP Array)
$filterTabs = [
    [
        'key' => 'all',
        'label' => 'Semua',
        'url' => 'dashboard.php' . (!empty($filterState['q']) ? '?q=' . urlencode($filterState['q']) : '')
    ],
    [
        'key' => 'proposal',
        'label' => 'Proposal',
        'url' => 'dashboard.php?filter=proposal' . (!empty($filterState['q']) ? '&q=' . urlencode($filterState['q']) : '')
    ],
    [
        'key' => 'confirmed',
        'label' => 'Confirmed',
        'url' => 'dashboard.php?filter=confirmed' . (!empty($filterState['q']) ? '&q=' . urlencode($filterState['q']) : '')
    ]
];
?>
<!-- ===================================================================== -->
<!-- TAHAP 3 & 4: GENERATED HTML & KONTEN TAMPIL DI DASHBOARD             -->
<!-- (PHP Menghasilkan Struktur HTML Secara Dinamis dan Merendernya)       -->
<!-- ===================================================================== -->
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard — Bespoke Travel Concierge</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400&family=Manrope:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="dashboard.css" />
  </head>
  <body class="bg-[#f5f7f5] text-[#142b1f] min-h-screen antialiased flex flex-col md:flex-row">
    <!-- SIDEBAR -->
    <aside class="sidebar w-full md:w-[250px] shrink-0 bg-white border-b md:border-b-0 md:border-r border-[#e1e9e3] p-6 flex flex-col justify-between">
      <div>
        <!-- Brand / Logo Dinamis dari PHP -->
        <div class="flex items-center gap-3 mb-8">
          <div class="w-9 h-9 rounded-lg bg-[#0284c7] text-white flex items-center justify-center font-bold text-xs shadow-xs">
            <span><?= htmlspecialchars($business['logo']) ?></span>
          </div>
          <span id="business-name" class="font-bold text-lg tracking-tight text-[#142b1f]"><?= htmlspecialchars($business['name']) ?></span>
        </div>

        <!-- TAHAP 3: GENERATED HTML DARI LOOP PHP ($sidebarNavData) -->
        <nav class="space-y-1.5" aria-label="Menu Utama">
          <?php foreach ($sidebarNavData as $nav): 
            // Logika Kondisional: Pemberian class 'active'
            $navClass = !empty($nav['active']) ? 'nav-link active' : 'nav-link';
          ?>
            <a href="<?= htmlspecialchars($nav['href']) ?>" class="<?= $navClass ?>">
              <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="<?= $nav['svgPath'] ?>"></path>
              </svg>
              <span><?= htmlspecialchars($nav['label']) ?></span>
            </a>
          <?php endforeach; ?>
        </nav>
      </div>

      <!-- Informasi Klien & Navigasi Arsitektur -->
      <div class="pt-4 mt-auto border-t border-[#edf2ee] flex flex-col gap-3">
        <!-- Client Profile Badge Dinamis (Nama & Inisial Avatar) -->
        <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-50 border border-slate-100">
          <div class="w-8 h-8 rounded-full bg-[#0284c7] text-white flex items-center justify-center font-bold text-xs shrink-0">
            <?= htmlspecialchars($customer['initials']) ?>
          </div>
          <div class="min-w-0 flex-1">
            <p class="text-xs font-bold text-slate-800 truncate"><?= htmlspecialchars($customer['name']) ?></p>
            <p class="text-[11px] text-slate-400 truncate"><?= htmlspecialchars($customer['email']) ?></p>
          </div>
        </div>

        <a href="dashboard.html" class="text-xs font-semibold text-sky-600 hover:text-sky-800 transition flex items-center gap-1.5">
          <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span>
          <span>Buka Versi HTML + JS (CSR)</span>
        </a>
        <div class="flex items-center justify-between">
          <a href="landing_page.html" class="text-xs text-slate-400 hover:text-slate-600 transition">Ke Beranda Publik</a>
          <a href="login.html" class="text-xs font-semibold text-slate-500 hover:text-red-700 transition" title="Keluar dari akun">Keluar</a>
        </div>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6 md:p-10 max-w-7xl mx-auto w-full">
      <!-- HEADER -->
      <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <div>
          <div class="flex items-center gap-3">
            <h1 id="customer-greeting" class="text-2xl sm:text-3xl font-bold text-[#142b1f] tracking-tight">Halo, <?= htmlspecialchars($customer['name']) ?></h1>
            <div id="api-status-container"></div>
          </div>
          <p class="text-sm text-[#5d6a62] mt-1">Pantau perjalanan Anda dan tinjau proposal dari concierge.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
          <a href="dashboard.php" class="p-2.5 rounded-lg border border-[#e1e9e3] bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition shadow-xs flex items-center gap-1.5 text-xs font-semibold" title="Sinkronkan data dari server">
            <svg id="refresh-icon" class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="hidden sm:inline">Refresh Data</span>
          </a>
          <button id="btn-open-modal" type="button" class="btn-primary-dark">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Buat Request Baru</span>
          </button>
        </div>
      </header>

      <!-- SERVER NOTIFICATION / FLASH MESSAGE (Logika Kondisional PHP) -->
      <?php if ($notification): ?>
        <div class="mb-6 p-4 rounded-xl border flex items-center justify-between gap-3 shadow-xs <?= $notification['type'] === 'success' ? 'bg-sky-50 border-sky-200 text-sky-900' : 'bg-rose-50 border-rose-200 text-rose-900' ?>">
          <div class="flex items-center gap-3">
            <?php if ($notification['type'] === 'success'): ?>
              <svg class="w-5 h-5 text-sky-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            <?php else: ?>
              <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            <?php endif; ?>
            <div>
              <h4 class="text-xs font-bold leading-tight"><?= htmlspecialchars($notification['title']) ?></h4>
              <p class="text-xs opacity-90 mt-0.5"><?= htmlspecialchars($notification['message']) ?></p>
            </div>
          </div>
          <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600 text-base font-bold leading-none">&times;</button>
        </div>
      <?php endif; ?>

      <!-- ===================================================================== -->
      <!-- TAHAP 3: GENERATED HTML DAFTAR PERLU TINDAKAN ANDA                     -->
      <!-- Dihasilkan secara dinamis lewat Loop Foreach & Kondisional Jenis Aksi -->
      <!-- ===================================================================== -->
      <section id="action-section" class="mb-9">
        <h2 class="text-base sm:text-[17px] font-bold text-[#162d20] mb-3">Perlu tindakan Anda</h2>
        <div class="bg-white rounded-2xl border border-[#e1e9e3] shadow-xs divide-y divide-[#edf3ef] overflow-hidden">
          <?php if (empty($perluTindakan)): ?>
            <div class="p-6 text-sm text-slate-400">Tidak ada tindakan yang diperlukan saat ini.</div>
          <?php else: ?>
            <?php foreach ($perluTindakan as $item): 
              // Logika Kondisional: Jenis Aksi (Proposal vs Review)
              $isProposal = ($item['type'] ?? '') === 'proposal';
            ?>
              <div class="action-card flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 md:p-5">
                <div class="flex items-start sm:items-center gap-3.5">
                  <?php if ($isProposal): ?>
                    <div class="action-icon action-icon-gold">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                      </svg>
                    </div>
                  <?php else: ?>
                    <div class="action-icon action-icon-mint">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                  <?php endif; ?>
                  <div>
                    <h3 class="text-[15px] font-semibold text-slate-900 leading-snug"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="text-xs sm:text-[13px] text-slate-500 mt-0.5"><?= htmlspecialchars($item['subtitle']) ?></p>
                  </div>
                </div>
                <div class="self-end sm:self-auto shrink-0">
                  <?php if ($isProposal): ?>
                    <div class="flex items-center gap-3">
                      <span class="badge-gold"><?= htmlspecialchars($item['badge']) ?></span>
                      <a href="<?= htmlspecialchars($item['actionUrl'] ?? '#') ?>" class="btn-primary-sm" onclick="alert('Membuka detail proposal v2...')">
                        <?= htmlspecialchars($item['actionLabel'] ?? 'Lihat Proposal') ?>
                      </a>
                    </div>
                  <?php else: ?>
                    <div>
                      <span class="badge-mint-outline"><?= htmlspecialchars($item['badge']) ?></span>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </section>

      <!-- GRID DUA KOLOM: REQUEST SAYA & RIGHT COLUMN -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        <!-- LEFT COLUMN: REQUEST SAYA -->
        <section id="request-section" class="lg:col-span-7">
          <div class="flex items-center justify-between mb-3.5">
            <h2 class="text-base sm:text-[17px] font-bold text-[#162d20]">Request Saya</h2>
            <a href="dashboard.php" class="text-xs font-semibold text-sky-600 hover:text-sky-800 hover:underline">Lihat semua</a>
          </div>

          <div id="requests-list" class="space-y-4">
            <?php if (empty($requestSaya)): ?>
              <div class="p-8 text-center text-sm text-slate-400 bg-white rounded-2xl border border-slate-200">Belum ada request perjalanan aktif.</div>
            <?php else: ?>
              <?php foreach ($requestSaya as $req): 
                $isWarning = ($req['statusType'] ?? '') === 'warning';
                $statusBadgeClass = $isWarning ? "badge-sand" : "badge-soft-blue";
              ?>
                <div class="request-card p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm transition hover:shadow-md">
                  <div class="flex items-start justify-between gap-3 mb-1">
                    <h4 class="text-[15px] sm:text-base font-bold text-slate-900 leading-snug"><?= htmlspecialchars($req['destination']) ?></h4>
                    <span class="<?= $statusBadgeClass ?> shrink-0"><?= htmlspecialchars($req['statusBadge']) ?></span>
                  </div>
                  
                  <p class="text-xs sm:text-[13px] text-slate-500 mb-4"><?= htmlspecialchars($req['dateRange']) ?> • <?= (int)($req['guests'] ?? 2) ?> peserta</p>

                  <?php if (!empty($req['image'])): ?>
                    <div class="mb-4 overflow-hidden rounded-xl border border-slate-200/70 bg-slate-100">
                      <img 
                        src="<?= htmlspecialchars($req['image']) ?>" 
                        alt="<?= htmlspecialchars($req['destination']) ?>" 
                        class="w-full h-44 sm:h-48 object-cover rounded-xl hover:scale-[1.02] transition duration-300"
                        loading="lazy"
                      />
                    </div>
                  <?php endif; ?>

                  <div class="steps-container flex items-center justify-between gap-1 sm:gap-2 mb-5">
                    <?php 
                    $steps = $req['steps'] ?? ["Diajukan", "Ditinjau", "Proposal", "Disetujui", "Dikonfirmasi"];
                    $currentIndex = $req['currentStepIndex'] ?? 0;
                    foreach ($steps as $idx => $stepName): 
                      $isCompletedOrActive = $idx <= $currentIndex;
                      $isCurrentActive = $idx === $currentIndex;
                      $labelClass = $isCurrentActive ? "font-bold text-slate-900" : ($isCompletedOrActive ? "font-medium text-slate-700" : "text-slate-400");
                      $barClass = $isCompletedOrActive ? "step-bar-active" : "step-bar-inactive";
                    ?>
                      <div class="flex-1 flex flex-col items-center">
                        <div class="step-bar <?= $barClass ?> w-full h-[3.5px] rounded-full mb-1.5"></div>
                        <span class="step-label text-[11px] sm:text-xs <?= $labelClass ?>"><?= htmlspecialchars($stepName) ?></span>
                      </div>
                    <?php endforeach; ?>
                  </div>

                  <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                    <?php if (($req['footerType'] ?? '') === 'estimate'): ?>
                      <div class="flex items-center gap-2 text-xs sm:text-[13px] text-slate-600">
                        <span>Estimasi biaya <strong class="text-slate-900"><?= htmlspecialchars($req['costEstimate'] ?? 'Rp -') ?></strong></span>
                        <span class="badge-neutral"><?= htmlspecialchars($req['costBadge'] ?? 'Estimasi') ?></span>
                      </div>
                    <?php else: ?>
                      <div class="flex items-center gap-2 text-xs sm:text-[13px] text-slate-700 font-medium">
                        <svg class="w-4 h-4 text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span><?= htmlspecialchars($req['confirmedText'] ?? 'Booking Confirmed') ?></span>
                      </div>
                    <?php endif; ?>
                    <a href="#" class="text-xs sm:text-[13px] font-semibold text-sky-600 hover:text-sky-800 transition">Lihat detail</a>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </section>

        <!-- RIGHT COLUMN: PERJALANAN MENDATANG & PESAN TERBARU -->
        <aside class="lg:col-span-5 space-y-8">
          <!-- Widget 1: Perjalanan Mendatang -->
          <section id="upcoming-section">
            <h2 class="text-base sm:text-[17px] font-bold text-[#162d20] mb-3">Perjalanan mendatang</h2>
            <div id="upcoming-card" class="bg-white rounded-2xl border border-[#e1e9e3] p-4 sm:p-5 shadow-xs">
              <?php if ($perjalananMendatang): ?>
                <div class="flex items-center gap-4">
                  <div class="date-tile flex flex-col items-center justify-center w-14 h-14 rounded-xl bg-[#e0f2fe] text-[#0369a1] shrink-0 font-sans shadow-xs">
                    <span class="text-base font-extrabold leading-tight"><?= htmlspecialchars($perjalananMendatang['dateDay']) ?></span>
                    <span class="text-[11px] font-bold tracking-wider leading-none uppercase"><?= htmlspecialchars($perjalananMendatang['dateMonth']) ?></span>
                  </div>
                  <div>
                    <h4 class="text-[15px] font-bold text-slate-900 leading-snug"><?= htmlspecialchars($perjalananMendatang['destination']) ?></h4>
                    <p class="text-xs sm:text-[13px] text-slate-500 mt-0.5"><?= htmlspecialchars($perjalananMendatang['confirmedSummary']) ?></p>
                  </div>
                </div>
              <?php else: ?>
                <p class="text-xs text-slate-400 py-2">Belum ada perjalanan mendatang.</p>
              <?php endif; ?>
            </div>
          </section>

          <!-- Widget 2: Pesan Terbaru -->
          <section id="messages-section">
            <div class="flex items-center justify-between mb-3">
              <h2 class="text-base sm:text-[17px] font-bold text-[#162d20]">Pesan terbaru</h2>
              <a href="#" class="text-xs font-semibold text-sky-600 hover:text-sky-800 hover:underline">Buka pesan</a>
            </div>
            <div class="bg-white rounded-2xl border border-[#e1e9e3] p-4 sm:p-5 shadow-xs">
              <div class="divide-y divide-[#edf3ef]">
                <?php if (empty($pesanTerbaru)): ?>
                  <p class="text-xs text-slate-400 py-2">Tidak ada pesan masuk.</p>
                <?php else: ?>
                  <?php foreach ($pesanTerbaru as $msg): ?>
                    <div class="flex items-start gap-3.5 py-2.5 first:pt-0 last:pb-0">
                      <!-- Inisial Dinamis Diproses PHP -->
                      <div class="w-8 h-8 rounded-full bg-[#e0f2fe] text-[#0369a1] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">
                        <?= htmlspecialchars($msg['initial']) ?>
                      </div>
                      <div class="flex-1 min-w-0">
                        <div class="flex items-baseline gap-2">
                          <h5 class="text-xs sm:text-[13px] font-semibold text-slate-800 truncate"><?= htmlspecialchars($msg['sender']) ?></h5>
                          <!-- Waktu Relatif Dinormalisasi PHP -->
                          <span class="text-[11px] text-slate-400 shrink-0">• <?= htmlspecialchars($msg['timeHuman'] ?? $msg['time']) ?></span>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5 line-clamp-2 leading-relaxed"><?= htmlspecialchars($msg['message']) ?></p>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </section>
        </aside>
      </div>
    </main>

    <!-- MODAL: + BUAT REQUEST BARU (PHP Server-Side Form Submission) -->
    <div id="new-request-modal" class="modal-overlay fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
      <div class="bg-white rounded-2xl border border-[#e1e9e3] shadow-xl w-full max-w-lg overflow-hidden animate-fade-in">
        <div class="px-6 py-5 border-b border-[#edf3ef] flex items-center justify-between">
          <h3 class="text-lg font-bold text-[#142b1f]">Buat Request Perjalanan Baru</h3>
          <button id="btn-close-modal" type="button" class="text-slate-400 hover:text-slate-600 text-xl font-bold leading-none">&times;</button>
        </div>
        <form method="POST" action="dashboard.php" class="p-6 space-y-4">
          <input type="hidden" name="action" value="new_request" />

          <div>
            <label for="req-destination" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Destinasi / Nama Acara</label>
            <input
              id="req-destination"
              name="destination"
              type="text"
              required
              placeholder="Contoh: Swiss Alps Winter Chalet"
              class="w-full px-3.5 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
            />
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="req-dates" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Tanggal Perjalanan</label>
              <input
                id="req-dates"
                name="dateRange"
                type="text"
                required
                placeholder="Contoh: 15 Jan – 22 Jan 2027"
                class="w-full px-3.5 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
              />
            </div>
            <div>
              <label for="req-guests" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jumlah Peserta</label>
              <input
                id="req-guests"
                name="guests"
                type="number"
                min="1"
                value="2"
                class="w-full px-3.5 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
              />
            </div>
          </div>
          <div>
            <label for="req-notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Catatan Khusus Concierge (Opsional)</label>
            <textarea
              id="req-notes"
              name="notes"
              rows="3"
              placeholder="Preferensi villa pribadi, private jet, chef bintang michelin, dll."
              class="w-full px-3.5 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
            ></textarea>
          </div>
          <div class="pt-3 border-t border-[#edf3ef] flex items-center justify-end gap-3">
            <button
              type="button"
              id="btn-cancel-modal"
              class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-slate-800 transition"
            >
              Batal
            </button>
            <button
              type="submit"
              class="btn-primary-dark"
            >
              <span>Kirim Request</span>
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- SCRIPT SEDERHANA UNTUK MODAL INTERAKSI -->
    <script>
      const modal = document.getElementById('new-request-modal');
      const openBtn = document.getElementById('btn-open-modal');
      const closeBtn = document.getElementById('btn-close-modal');
      const cancelBtn = document.getElementById('btn-cancel-modal');

      if (openBtn && modal) {
        openBtn.addEventListener('click', () => {
          modal.classList.remove('hidden');
        });
      }

      function closeModal() {
        if (modal) {
          modal.classList.add('hidden');
        }
      }

      if (closeBtn) closeBtn.addEventListener('click', closeModal);
      if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
      if (modal) {
        modal.addEventListener('click', (e) => {
          if (e.target === modal) closeModal();
        });
      }
    </script>
  </body>
</html>

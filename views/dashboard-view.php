<?php
/**
 * Pertemuan 7 - Web Programming
 * Task 01 - 03: VIEW (dashboard-view.php) - Remodeled & Refined
 * 
 * Tampilan Dashboard VIP yang telah dirombak total:
 * - Terpusat rapi dengan max-width terukur (max-w-6xl), tidak melebar ke seluruh layar monitor
 * - Spacing bernapas dan nyaman dibaca (Quiet Luxury Aesthetic)
 * - Sentuhan AI Telemetry & Copilot yang elegan dan proporsional
 * - 100% Terintegrasi MVC: Model -> Controller -> View dengan sanitasi htmlspecialchars()
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
 * Proyek: VIP Bespoke Travel
 */

function safe(mixed $value): string {
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html class="dark scroll-smooth" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Patron Portal — Bespoke Private Travel &amp; Advisory</title>
  
  <!-- Google Fonts: EB Garamond (Serif) & DM Sans / Plus Jakarta Sans (Sans) -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300..700;1,9..40,300..700&family=EB+Garamond:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            obsidian: {
              DEFAULT: '#060a08',
              surface: '#0d1310',
              card: '#121a16',
              border: '#1f2d25'
            },
            gold: {
              DEFAULT: '#c5a059',
              light: '#f5e4bb',
              bright: '#dfbe7e',
              dark: '#9a7736'
            },
            ivory: '#fcfbf8',
            emeraldCustom: '#34d399'
          },
          fontFamily: {
            serif: ['"EB Garamond"', 'Georgia', 'serif'],
            sans: ['"DM Sans"', 'sans-serif']
          }
        }
      }
    }
  </script>

  <style>
    body {
      background-color: #060a08;
      color: #cbd5e1;
      font-family: 'DM Sans', sans-serif;
    }
    .gold-glow-subtle {
      box-shadow: 0 0 25px -5px rgba(197, 160, 89, 0.15);
    }
    .text-gold-gradient {
      background: linear-gradient(135deg, #f5e4bb 0%, #dfbe7e 50%, #c5a059 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col bg-obsidian text-slate-300 antialiased selection:bg-gold selection:text-obsidian">

  <!-- =========================================================================
       1. TOPBAR NAVIGATION (ELEGANT & CLEAN)
       ========================================================================= -->
  <header class="sticky top-0 z-50 bg-obsidian/90 backdrop-blur-xl border-b border-white/10">
    <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
      
      <!-- Left: Logo & Back Link -->
      <div class="flex items-center gap-6">
        <a href="latihan1.php" class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.16em] text-slate-400 hover:text-gold transition-colors py-1.5 px-3 rounded-full border border-white/10 hover:border-gold/40 bg-white/[0.02]">
          <span class="material-symbols-outlined text-[15px]">arrow_back</span>
          <span class="hidden sm:inline">Landing Page</span>
        </a>

        <div class="h-4 w-px bg-white/15 hidden sm:block"></div>

        <a href="index.php" class="flex items-center gap-3 group">
          <div class="w-2.5 h-2.5 rounded-full bg-gold animate-pulse shadow-[0_0_8px_#dfbe7e]"></div>
          <span class="font-serif text-2xl tracking-[0.25em] font-medium text-ivory group-hover:text-gold transition-colors">BESPOKE</span>
          <span class="hidden md:inline text-[10px] uppercase tracking-widest text-gold px-2 py-0.5 rounded border border-gold/30 bg-gold/5 font-sans">
            Patron Portal
          </span>
        </a>
      </div>

      <!-- Center: Status Quick Telemetry -->
      <div class="hidden lg:flex items-center gap-4 text-xs font-mono">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[11px]">
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
          <span>Encrypted Signal 256-bit</span>
        </span>
        <span class="text-slate-400 text-[11px]">
          Geneva Desk: <strong class="text-ivory font-normal">Online</strong>
        </span>
      </div>

      <!-- Right: User Avatar & Tier -->
      <div class="flex items-center gap-3">
        <div class="text-right hidden sm:block">
          <div class="text-sm font-medium text-ivory leading-tight"><?= safe($client['title'] ?? $client['name']) ?></div>
          <div class="text-[11px] text-gold tracking-wider font-mono"><?= safe($client['tier'] ?? 'Black Diamond Sovereign') ?></div>
        </div>
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold-bright to-gold text-obsidian font-bold flex items-center justify-center text-sm shadow-md ring-2 ring-gold/30">
          <?= safe($client['avatar_initials'] ?? 'AW') ?>
        </div>
      </div>

    </div>
  </header>

  <!-- =========================================================================
       2. MAIN CONTENT (TERPUSAT DI CONTAINER MAX-W-6XL)
       ========================================================================= -->
  <main class="flex-1 max-w-6xl w-full mx-auto px-6 py-10 sm:py-12 space-y-10">

    <!-- HERO SECTION: WELCOME & GREETING -->
    <section class="space-y-6">
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-2">
        <div class="space-y-2">
          <div class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.2em] text-gold font-medium">
            <span class="material-symbols-outlined text-sm">verified_user</span>
            <span>Vault ID: <?= safe($client['member_id'] ?? 'VIP-8821') ?> &bull; Sovereign Desk</span>
          </div>
          <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-ivory tracking-tight leading-tight">
            <?= safe($greeting) ?>
          </h1>
          <p class="text-sm sm:text-base text-slate-400 max-w-2xl leading-relaxed">
            Swiss Concierge Desk aktif. Managing Partner <strong class="text-slate-200 font-medium">Marc-André V.</strong> bersiaga di Geneva HQ untuk seluruh jadwal armada dan akomodasi privat Anda.
          </p>
        </div>

        <!-- Quick Telemetry Action Pills -->
        <div class="flex flex-wrap items-center gap-2.5 self-start md:self-end">
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-obsidian-card border border-white/10 text-xs text-slate-300">
            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
            <span>Direct Secure Line</span>
          </span>
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-obsidian-card border border-white/10 text-xs text-slate-300">
            <span class="material-symbols-outlined text-[14px] text-gold">flight</span>
            <span>Tail HB-BSK Ready</span>
          </span>
        </div>
      </div>

      <!-- AI Concierge Copilot Bar (Elegan & Rapi) -->
      <div class="p-4 sm:p-5 rounded-2xl bg-obsidian-surface border border-gold/30 gold-glow-subtle space-y-3">
        <div class="flex items-center justify-between text-xs">
          <div class="flex items-center gap-2 text-gold font-medium uppercase tracking-wider text-[11px]">
            <span class="material-symbols-outlined text-sm animate-pulse">auto_awesome</span>
            <span>Bespoke Concierge AI Copilot (Encrypted Private Instance)</span>
          </div>
          <span class="text-[10px] text-slate-500 font-mono hidden sm:inline">E2EE: 4096-BIT POST-QUANTUM</span>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-3">
          <div class="relative w-full">
            <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-500 text-lg">travel_explore</span>
            <input id="copilot-input" 
                   type="text" 
                   placeholder="Ajukan instruksi concierge (misal: tambah armada helikopter, ubah katering jet, jadwal sommelier)..." 
                   class="w-full pl-11 pr-4 py-3 bg-obsidian rounded-xl text-sm text-ivory placeholder-slate-500 border border-white/10 focus:border-gold focus:outline-none transition-colors" />
          </div>
          <button id="copilot-btn" class="w-full sm:w-auto shrink-0 px-6 py-3 rounded-xl bg-gold hover:bg-gold-bright text-obsidian text-xs uppercase tracking-wider font-bold transition-all shadow flex items-center justify-center gap-2">
            <span>Submit to Advisor</span>
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </button>
        </div>

        <!-- Quick Suggestions -->
        <div class="flex items-center gap-2 overflow-x-auto pt-1 text-xs text-slate-400">
          <span class="text-[10px] uppercase tracking-wider text-slate-500 shrink-0">Direct Mandates:</span>
          <button class="copilot-chip shrink-0 px-3 py-1 rounded-full bg-white/5 hover:bg-white/10 text-slate-300 text-xs transition-colors">
            + Tambah Caviar Service di G650ER
          </button>
          <button class="copilot-chip shrink-0 px-3 py-1 rounded-full bg-white/5 hover:bg-white/10 text-slate-300 text-xs transition-colors">
            + Request Transfer Heli di St. Moritz
          </button>
          <button class="copilot-chip shrink-0 px-3 py-1 rounded-full bg-white/5 hover:bg-white/10 text-slate-300 text-xs transition-colors">
            + Perpanjang Monaco Yacht Berth
          </button>
        </div>
      </div>
    </section>

    <!-- =======================================================================
         3. METRIC KPI CARDS (4 KOLOM DENGAN SPACING RAPI)
         ======================================================================= -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      
      <!-- Card 1: Destinations -->
      <div class="p-6 rounded-2xl bg-obsidian-surface border border-white/10 hover:border-gold/30 transition-all flex flex-col justify-between space-y-4">
        <div class="flex items-center justify-between text-xs text-slate-400 uppercase tracking-wider">
          <span>Global Envelopes</span>
          <span class="material-symbols-outlined text-gold text-lg">public</span>
        </div>
        <div>
          <div class="text-3xl font-serif text-ivory font-normal"><?= safe($stats['total_requests'] ?? count($requests)) ?> Destinasi</div>
          <p class="text-xs text-slate-400 mt-1">4 Active Planning &bull; 2 Confirmed</p>
        </div>
        <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-slate-400 font-mono">
          <span>Portfolio Status</span>
          <span class="text-emerald-400 font-semibold">100% On-Track</span>
        </div>
      </div>

      <!-- Card 2: Budget -->
      <div class="p-6 rounded-2xl bg-obsidian-surface border border-white/10 hover:border-gold/30 transition-all flex flex-col justify-between space-y-4">
        <div class="flex items-center justify-between text-xs text-slate-400 uppercase tracking-wider">
          <span>Allocated Escrow</span>
          <span class="material-symbols-outlined text-gold text-lg">account_balance</span>
        </div>
        <div>
          <div class="text-3xl font-serif text-gold-bright font-normal font-mono"><?= safe($stats['total_budget'] ?? '$536,000') ?></div>
          <p class="text-xs text-emerald-400 mt-1 flex items-center gap-1 font-medium">
            <span class="material-symbols-outlined text-sm">trending_up</span>
            +12% Charter Allocation (BCGE)
          </p>
        </div>
        <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-slate-400 font-mono">
          <span>Private Escrow Vault</span>
          <span class="text-ivory">Zurich &bull; Verified</span>
        </div>
      </div>

      <!-- Card 3: Fleet Ready -->
      <div class="p-6 rounded-2xl bg-obsidian-surface border border-white/10 hover:border-gold/30 transition-all flex flex-col justify-between space-y-4">
        <div class="flex items-center justify-between text-xs text-slate-400 uppercase tracking-wider">
          <span>Fleet Contingency</span>
          <span class="material-symbols-outlined text-emerald-400 text-lg">flight</span>
        </div>
        <div>
          <div class="text-3xl font-serif text-ivory font-normal">100% Ready</div>
          <p class="text-xs text-slate-400 mt-1">Dual Standby: LSGG &bull; LFMN</p>
        </div>
        <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-slate-400 font-mono">
          <span>Airborne Clearance</span>
          <span class="text-emerald-400 font-medium">Immediate</span>
        </div>
      </div>

      <!-- Card 4: Response SLA -->
      <div class="p-6 rounded-2xl bg-obsidian-surface border border-white/10 hover:border-gold/30 transition-all flex flex-col justify-between space-y-4">
        <div class="flex items-center justify-between text-xs text-slate-400 uppercase tracking-wider">
          <span>Concierge SLA</span>
          <span class="material-symbols-outlined text-gold text-lg">schedule</span>
        </div>
        <div>
          <div class="text-3xl font-serif text-gold-bright font-normal font-mono"><?= safe($stats['response_time'] ?? '< 12 Mins') ?></div>
          <p class="text-xs text-slate-400 mt-1">Dedicated Senior Partner Channel</p>
        </div>
        <div class="pt-3 border-t border-white/5 flex items-center justify-between text-xs text-slate-400 font-mono">
          <span>Average Today</span>
          <span class="text-emerald-400 font-bold">4.2 Menit</span>
        </div>
      </div>

    </section>

    <!-- =======================================================================
         4. AI FLIGHT RADAR & TELEMETRY WIDGET (PROPORSIONAL & TIDAK SESAK)
         ======================================================================= -->
    <section class="p-6 sm:p-8 rounded-2xl bg-obsidian-surface border border-white/10 space-y-6">
      
      <!-- Header Radar -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-5 border-b border-white/10">
        <div>
          <div class="flex items-center gap-2 text-emerald-400 text-xs font-semibold uppercase tracking-wider">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
            <span>Bespoke Intelligence™ &bull; Live Flight Telemetry</span>
          </div>
          <h2 class="font-serif text-xl sm:text-2xl text-ivory mt-1">
            Flight Dossier #BSK-904: Geneva Cointrin (LSGG) &rarr; Samedan / St. Moritz (LSZS)
          </h2>
          <p class="text-xs text-slate-400 font-mono mt-0.5">
            Gulfstream G650ER &bull; Cruising Altitude: <span class="text-ivory">FL410</span> &bull; Estimated En-Route: <span class="text-gold">38 Mins</span>
          </p>
        </div>
        <div class="flex items-center gap-2 self-start sm:self-center font-mono text-xs">
          <span class="px-3 py-1 rounded-full bg-white/5 border border-white/10 text-slate-300">
            Transponder: 7421 (VIP)
          </span>
          <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
            In-Flight
          </span>
        </div>
      </div>

      <!-- Visual Altitude Profile Curve (SVG Ringan & Jelas) -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
        <div class="lg:col-span-8 bg-obsidian rounded-xl p-4 sm:p-5 border border-white/10 space-y-3">
          <div class="flex items-center justify-between text-xs font-mono text-slate-400">
            <span>LSGG (Geneva Apron &bull; 1,411 FT)</span>
            <span class="text-emerald-400 font-semibold">Cruising FL410 (Mach 0.88)</span>
            <span>LSZS (Engadin Alpine &bull; 5,600 FT)</span>
          </div>

          <!-- Curve SVG -->
          <div class="relative w-full h-28 sm:h-32">
            <svg class="w-full h-full" viewBox="0 0 700 120" preserveAspectRatio="none">
              <defs>
                <linearGradient id="grad-curve" x1="0%" y1="0%" x2="0%" y2="100%">
                  <stop offset="0%" stop-color="#34d399" stop-opacity="0.3"></stop>
                  <stop offset="100%" stop-color="#34d399" stop-opacity="0.0"></stop>
                </linearGradient>
              </defs>
              <path d="M 20 100 C 120 100, 180 20, 260 20 L 440 20 C 520 20, 580 80, 680 90 L 680 120 L 20 120 Z" fill="url(#grad-curve)"></path>
              <path d="M 20 100 C 120 100, 180 20, 260 20 L 440 20 C 520 20, 580 80, 680 90" stroke="#34d399" stroke-width="2.5" fill="none" stroke-linecap="round"></path>
              <!-- Waypoints -->
              <circle cx="20" cy="100" r="4" fill="#dfbe7e"></circle>
              <circle cx="350" cy="20" r="4" fill="#dfbe7e"></circle>
              <circle cx="410" cy="20" r="6" fill="#34d399" class="animate-pulse"></circle>
              <circle cx="410" cy="20" r="3" fill="#ffffff"></circle>
              <circle cx="680" cy="90" r="4" fill="#dfbe7e"></circle>
            </svg>
          </div>

          <div class="flex items-center justify-between text-[11px] font-mono text-slate-500 pt-1">
            <span>Departure: 19:22 CEST (On-Time)</span>
            <span class="text-slate-400">Turbulence: Nil</span>
            <span>Arrival: 20:00 CEST</span>
          </div>
        </div>

        <!-- 4 Badges AI Telemetri -->
        <div class="lg:col-span-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-2.5">
          <div class="p-3 rounded-xl bg-obsidian border border-white/5 flex items-center gap-3">
            <span class="material-symbols-outlined text-emerald-400 text-xl">verified</span>
            <div>
              <div class="text-xs font-medium text-ivory">AI Route Optimized</div>
              <div class="text-[11px] text-slate-400">0% Turbulence Risk &bull; Alpine Vector</div>
            </div>
          </div>
          <div class="p-3 rounded-xl bg-obsidian border border-white/5 flex items-center gap-3">
            <span class="material-symbols-outlined text-gold text-xl">flight_land</span>
            <div>
              <div class="text-xs font-medium text-ivory">Instant Alpine Slot Clearance</div>
              <div class="text-[11px] text-slate-400">Samedan VIP Apron Guaranteed (99.4%)</div>
            </div>
          </div>
          <div class="p-3 rounded-xl bg-obsidian border border-white/5 flex items-center gap-3">
            <span class="material-symbols-outlined text-emerald-400 text-xl">ac_unit</span>
            <div>
              <div class="text-xs font-medium text-ivory">Alpine METAR Weather</div>
              <div class="text-[11px] text-slate-400">Wind: Nil &bull; Temp: -4°C &bull; Powder Groomed</div>
            </div>
          </div>
          <div class="p-3 rounded-xl bg-obsidian border border-white/5 flex items-center gap-3">
            <span class="material-symbols-outlined text-gold text-xl">directions_car</span>
            <div>
              <div class="text-xs font-medium text-ivory">Apron Armored Transfer</div>
              <div class="text-[11px] text-slate-400">Range Rover Sentinel &amp; Security Escort</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =======================================================================
         5. CORE MVC: ITINERARY DOSSIERS & FILTER TABS
         ======================================================================= -->
    <section class="space-y-6">
      
      <!-- Section Header & Filter Tabs -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
        <div>
          <span class="text-xs uppercase tracking-[0.2em] text-gold font-medium">Sovereign Vault Portfolio</span>
          <h2 class="font-serif text-2xl sm:text-3xl text-ivory tracking-tight mt-0.5">
            Daftar Reservasi &amp; Permintaan Perjalanan
          </h2>
          <p class="text-xs text-slate-400 font-mono mt-0.5">
            Menampilkan <strong class="text-gold"><?= $totalFiltered ?></strong> rencana perjalanan
            <?php if ($activeFilter !== 'all'): ?>
              (Filter aktif: <span class="text-emerald-400 capitalize"><?= safe($activeFilter) ?></span>)
            <?php endif; ?>
          </p>
        </div>

        <!-- Filter Tabs (Koneksi ke Controller MVC) -->
        <div class="flex items-center gap-1.5 p-1 bg-obsidian-surface rounded-xl border border-white/10 text-xs overflow-x-auto max-w-full">
          <a href="index.php?status=all" 
             class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap font-medium <?= ($activeFilter === 'all') ? 'bg-gold text-obsidian font-bold shadow' : 'text-slate-400 hover:text-ivory' ?>">
            Semua (<?= safe($availableStatuses['all'] ?? count($requests)) ?>)
          </a>
          <a href="index.php?status=approved" 
             class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap font-medium <?= (strtolower($activeFilter) === 'approved') ? 'bg-gold text-obsidian font-bold shadow' : 'text-slate-400 hover:text-ivory' ?>">
            Approved (<?= safe($availableStatuses['approved']['count'] ?? 2) ?>)
          </a>
          <a href="index.php?status=in+review" 
             class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap font-medium <?= (strtolower($activeFilter) === 'in review' || strtolower($activeFilter) === 'in-review') ? 'bg-gold text-obsidian font-bold shadow' : 'text-slate-400 hover:text-ivory' ?>">
            In Review (<?= safe($availableStatuses['in review']['count'] ?? 2) ?>)
          </a>
          <a href="index.php?status=planning" 
             class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap font-medium <?= (strtolower($activeFilter) === 'planning') ? 'bg-gold text-obsidian font-bold shadow' : 'text-slate-400 hover:text-ivory' ?>">
            Planning (<?= safe($availableStatuses['planning']['count'] ?? 1) ?>)
          </a>
          <a href="index.php?status=confirmed" 
             class="px-3.5 py-1.5 rounded-lg transition-all whitespace-nowrap font-medium <?= (strtolower($activeFilter) === 'confirmed') ? 'bg-gold text-obsidian font-bold shadow' : 'text-slate-400 hover:text-ivory' ?>">
            Confirmed (<?= safe($availableStatuses['confirmed']['count'] ?? 1) ?>)
          </a>
        </div>
      </div>

      <!-- Grid Kartu Perjalanan (3 Kolom Proporsional) -->
      <?php if (empty($requests)): ?>
        <div class="text-center py-16 bg-obsidian-surface rounded-2xl border border-dashed border-white/10 p-8 space-y-3">
          <span class="material-symbols-outlined text-4xl text-gold">travel_explore</span>
          <h3 class="font-serif text-xl text-ivory">Tidak Ada Permintaan dengan Status "<?= safe($activeFilter) ?>"</h3>
          <p class="text-xs text-slate-400 max-w-md mx-auto">
            Silakan pilih filter status lainnya untuk melihat rencana perjalanan Anda atau hubungi penasihat pribadi Anda.
          </p>
          <a href="index.php?status=all" class="inline-block mt-3 px-5 py-2 rounded-lg bg-gold text-obsidian font-bold text-xs uppercase tracking-wider hover:bg-gold-bright transition-colors">
            Reset Filter ke Semua
          </a>
        </div>
      <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($requests as $trip): ?>
            <?php
              $statusName = $trip['status'] ?? 'Draft';
              $badgeColor = match (strtolower($statusName)) {
                  'approved', 'confirmed' => 'bg-emerald-500/15 text-emerald-400 border-emerald-500/30',
                  'in review'             => 'bg-amber-500/15 text-gold-bright border-amber-500/30',
                  'planning'              => 'bg-sky-500/15 text-sky-400 border-sky-500/30',
                  default                 => 'bg-slate-500/15 text-slate-300 border-slate-500/30'
              };
            ?>
            <article class="rounded-2xl bg-obsidian-surface border border-white/10 hover:border-gold/40 transition-all duration-300 flex flex-col justify-between overflow-hidden shadow-lg hover:-translate-y-1">
              <div>
                <!-- Foto Destinasi (Aspect Ratio 16/10) -->
                <div class="relative w-full h-44 bg-cover bg-center" style="background-image: url('<?= safe($trip['image_url'] ?? '') ?>')">
                  <div class="absolute inset-0 bg-gradient-to-t from-obsidian-surface via-obsidian-surface/40 to-transparent"></div>
                  
                  <!-- Status & Anggaran -->
                  <div class="absolute top-3 left-3 flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold border backdrop-blur-md <?= $badgeColor ?>">
                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                    <span><?= safe($statusName) ?></span>
                  </div>
                  <div class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-obsidian/80 backdrop-blur-md text-gold font-mono text-xs font-semibold border border-white/10">
                    <?= safe($trip['budget'] ?? '$0') ?>
                  </div>

                  <div class="absolute bottom-2.5 left-4 right-4 flex items-end justify-between">
                    <span class="text-[10px] uppercase font-mono tracking-wider text-slate-400"><?= safe($trip['dossier_ref'] ?? $trip['id']) ?></span>
                    <span class="text-[11px] text-slate-400 font-mono"><?= safe($trip['nights'] ?? 'VIP') ?></span>
                  </div>
                </div>

                <!-- Konten Kartu -->
                <div class="p-5 space-y-3.5">
                  <h3 class="font-serif text-xl font-medium text-ivory leading-snug">
                    <?= safe($trip['destination']) ?>
                  </h3>

                  <!-- Jadwal & Armada -->
                  <div class="space-y-1.5 py-2.5 border-y border-white/5 text-xs text-slate-300">
                    <div class="flex items-center justify-between">
                      <span class="text-slate-500">Jadwal:</span>
                      <span class="font-medium text-ivory"><?= safe($trip['dates']) ?></span>
                    </div>
                    <div class="flex items-center justify-between">
                      <span class="text-slate-500">Armada / Aset:</span>
                      <span class="font-medium text-gold font-mono"><?= safe($trip['asset_tag'] ?? $trip['guests']) ?></span>
                    </div>
                  </div>

                  <!-- Tag Layanan -->
                  <?php if (!empty($trip['services']) && is_array($trip['services'])): ?>
                    <div class="flex flex-wrap gap-1.5">
                      <?php foreach ($trip['services'] as $srv): ?>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-white/5 text-slate-300 border border-white/5">
                          ✓ <?= safe($srv) ?>
                        </span>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>

                  <!-- Deskripsi -->
                  <p class="text-xs text-slate-400 leading-relaxed line-clamp-2 italic">
                    "<?= safe($trip['notes']) ?>"
                  </p>
                </div>
              </div>

              <!-- Footer Kartu: Advisor & Link -->
              <div class="px-5 py-3.5 border-t border-white/5 flex items-center justify-between text-xs text-slate-400 bg-black/20">
                <div class="flex items-center gap-2">
                  <div class="w-6 h-6 rounded-full bg-gold/20 text-gold text-[10px] font-bold flex items-center justify-center font-mono">
                    <?= safe($trip['advisor_initials'] ?? 'MV') ?>
                  </div>
                  <span class="text-[11px]">Advisor: <strong class="text-slate-200"><?= safe($trip['advisor']) ?></strong></span>
                </div>
                <a href="#" class="text-gold hover:text-gold-bright text-[11px] uppercase tracking-wider font-semibold inline-flex items-center gap-1">
                  <span>Dossier</span>
                  <span class="material-symbols-outlined text-[13px]">arrow_forward</span>
                </a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </section>

    <!-- =======================================================================
         6. DIRECT CONCIERGE SECURE RELAY BANNER
         ======================================================================= -->
    <section class="p-6 rounded-2xl bg-obsidian-surface border border-white/10 flex flex-col sm:flex-row items-center justify-between gap-5">
      <div class="flex items-center gap-4 text-left w-full sm:w-auto">
        <div class="w-12 h-12 rounded-xl bg-gold/10 border border-gold/30 flex items-center justify-center text-gold shrink-0">
          <span class="material-symbols-outlined text-2xl">phonelink_ring</span>
        </div>
        <div>
          <div class="flex items-center gap-2">
            <h3 class="font-serif text-lg font-medium text-ivory">Direct 24/7 Sovereign Desk</h3>
            <span class="px-2 py-0.5 rounded-full bg-emerald-500/15 text-emerald-400 text-[10px] font-mono">
              Available &bull; 0s Queue
            </span>
          </div>
          <p class="text-xs text-slate-400 font-mono mt-0.5">
            +41 22 819 0088 &bull; Managing Partner Marc-André V. on Duty
          </p>
        </div>
      </div>

      <button id="pgp-btn" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-white/5 hover:bg-white/10 text-ivory text-xs uppercase tracking-wider font-medium border border-white/10 transition-colors flex items-center justify-center gap-2">
        <span class="material-symbols-outlined text-sm text-gold">key</span>
        <span>Send Encrypted PGP Note</span>
      </button>
    </section>

  </main>

  <!-- =========================================================================
       7. MVC ARCHITECTURAL FOOTER
       ========================================================================= -->
  <footer class="bg-black/60 border-t border-white/10 py-8 px-6 mt-12 text-xs text-slate-400">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
      <div class="space-y-1">
        <div class="font-serif text-base text-ivory">Bespoke Concierge Framework &bull; Arsitektur MVC Week 7</div>
        <p class="text-[11px] text-slate-500 font-mono">
          Model: <code class="text-emerald-400">TravelModel.php</code> &bull; 
          Controller: <code class="text-sky-400">DashboardController.php</code> &bull; 
          View: <code class="text-gold">dashboard-view.php</code>
        </p>
      </div>
      <div class="text-[11px] sm:text-right text-slate-400">
        <div>Pengembang: <strong class="text-ivory font-medium">Zaidaan Diandra Eka Putra</strong> (202410370110420)</div>
        <div class="text-slate-500 mt-0.5">&copy; <?= date('Y') ?> VIP Bespoke Travel Concierge. All Rights Reserved.</div>
      </div>
    </div>
  </footer>

  <!-- Interaktivitas Sederhana -->
  <script>
    // Copilot chip click
    document.querySelectorAll('.copilot-chip').forEach(chip => {
      chip.addEventListener('click', () => {
        const input = document.getElementById('copilot-input');
        input.value = chip.textContent.replace('+', '').trim();
        input.focus();
      });
    });

    // Copilot submit animation
    const copilotBtn = document.getElementById('copilot-btn');
    if (copilotBtn) {
      copilotBtn.addEventListener('click', () => {
        const input = document.getElementById('copilot-input');
        if (input.value.trim() !== '') {
          const originalText = copilotBtn.innerHTML;
          copilotBtn.innerHTML = '<span>Transmitting...</span>';
          setTimeout(() => {
            copilotBtn.innerHTML = '<span>✓ Dispatched to Geneva</span>';
            setTimeout(() => {
              input.value = '';
              copilotBtn.innerHTML = originalText;
            }, 2000);
          }, 800);
        }
      });
    }

    // PGP Tunnel alert
    const pgpBtn = document.getElementById('pgp-btn');
    if (pgpBtn) {
      pgpBtn.addEventListener('click', () => {
        alert("Membuka Tunnel PGP Terenkripsi ke Managing Partner Marc-André V. (Geneva Desk)...");
      });
    }
  </script>

</body>
</html>

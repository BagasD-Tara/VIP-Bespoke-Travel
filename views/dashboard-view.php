<?php
/**
 * Pertemuan 7 - Web Programming
 * Task 02 & Task 03: VIEW (views/dashboard-view.php)
 * 
 * Presentasi antarmuka VIP Bespoke Travel & Sovereign Concierge
 * Mengimplementasikan arsitektur Model-View-Controller (MVC) PHP.
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
 * Proyek: VIP Bespoke Travel
 */

if (!function_exists('safe')) {
    function safe($value): string {
        return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

// Fallback data jika file view diakses langsung tanpa controller
$client = $client ?? [
    'name'            => 'Alexander Dubois',
    'title'           => 'Alexander Dubois',
    'member_id'       => 'VIP-8821',
    'tier'            => 'Sovereign Tier',
    'city'            => 'Geneva / Zurich',
    'avatar_initials' => 'AD'
];

$stats = $stats ?? [
    'total_requests' => 6,
    'total_budget'   => '$2,485,000',
    'response_time'  => '< 12 Mins Direct'
];

$requests = $requests ?? [];
$activeFilter = $activeFilter ?? 'all';
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="web_dashboard" name="shell-type"/>
  <title>Sovereign Reserve — Wealth &amp; Concierge Ledger (Zurich Private Vaults)</title>
  
  <style>
    @layer base {
      html, body { margin: 0; padding: 0; }
      body { overscroll-behavior: none; }
      main > :first-child { margin-top: 0 !important; }
      main > :last-child { margin-bottom: 0 !important; }
    }
    ::-webkit-scrollbar { display: none; }
  </style>

  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "on-secondary": "#3d2f00",
            "inverse-surface": "#e2e2e8",
            "secondary": "#e7c35a",
            "primary-fixed": "#ffe088",
            "outline": "#99907c",
            "surface-container": "#1e2024",
            "on-surface": "#e2e2e8",
            "on-secondary-fixed-variant": "#584400",
            "on-primary-fixed": "#241a00",
            "secondary-fixed-dim": "#e7c35a",
            "background": "#111317",
            "on-tertiary": "#3a3000",
            "on-surface-variant": "#d0c5af",
            "on-tertiary-container": "#524500",
            "tertiary": "#e3cf7c",
            "outline-variant": "#4d4635",
            "on-error": "#690005",
            "tertiary-container": "#c6b364",
            "surface-dim": "#111317",
            "surface-container-lowest": "#0c0e12",
            "tertiary-fixed": "#f7e28e",
            "primary-fixed-dim": "#e9c349",
            "on-primary-fixed-variant": "#574500",
            "inverse-on-surface": "#2f3035",
            "inverse-primary": "#735c00",
            "on-secondary-fixed": "#241a00",
            "on-primary-container": "#554300",
            "primary": "#f2ca50",
            "surface-variant": "#333539",
            "surface": "#111317",
            "primary-container": "#d4af37",
            "surface-container-highest": "#333539",
            "surface-container-high": "#282a2e",
            "error-container": "#93000a",
            "on-primary": "#3c2f00",
            "tertiary-fixed-dim": "#dac675",
            "on-tertiary-fixed-variant": "#534600",
            "on-error-container": "#ffdad6",
            "surface-tint": "#e9c349",
            "surface-container-low": "#1a1c20",
            "secondary-fixed": "#ffe08b",
            "on-background": "#e2e2e8",
            "on-secondary-container": "#fff3dc",
            "surface-bright": "#37393e",
            "secondary-container": "#896c00",
            "on-tertiary-fixed": "#221b00",
            "error": "#ffb4ab"
          },
          borderRadius: {
            "DEFAULT": "0.125rem",
            "lg": "0.25rem",
            "xl": "0.5rem",
            "full": "0.75rem"
          },
          spacing: {
            "space-sm": "0.5rem",
            "gutter-mobile": "1rem",
            "space-xs": "0.25rem",
            "space-md": "1rem",
            "margin": "3rem",
            "margin-mobile": "1.25rem",
            "space-lg": "1.75rem",
            "space-xl": "3rem",
            "gutter": "1.5rem"
          },
          fontFamily: {
            "label-caps": ["DM Sans"],
            "body-md": ["DM Sans"],
            "title-md": ["DM Sans"],
            "headline-sm": ["DM Sans"],
            "headline-lg-mobile": ["EB Garamond"],
            "body-lg": ["DM Sans"],
            "headline-md": ["EB Garamond"],
            "label-meta": ["DM Sans"],
            "body-sm": ["DM Sans"],
            "numeric-data-md": ["DM Sans"],
            "display-hero": ["EB Garamond"],
            "numeric-data-lg": ["DM Sans"],
            "display-hero-mobile": ["EB Garamond"],
            "headline-lg": ["EB Garamond"]
          },
          fontSize: {
            "label-caps": ["11px", { "lineHeight": "16px", "letterSpacing": "0.14em", "fontWeight": "600" }],
            "body-md": ["14px", { "lineHeight": "22px", "fontWeight": "400" }],
            "title-md": ["16px", { "lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "500" }],
            "headline-sm": ["20px", { "lineHeight": "28px", "letterSpacing": "0.01em", "fontWeight": "600" }],
            "headline-lg-mobile": ["28px", { "lineHeight": "34px", "fontWeight": "400" }],
            "body-lg": ["16px", { "lineHeight": "26px", "fontWeight": "400" }],
            "headline-md": ["26px", { "lineHeight": "34px", "fontWeight": "400" }],
            "label-meta": ["10px", { "lineHeight": "14px", "letterSpacing": "0.08em", "fontWeight": "500" }],
            "body-sm": ["12px", { "lineHeight": "18px", "fontWeight": "400" }],
            "numeric-data-md": ["20px", { "lineHeight": "26px", "letterSpacing": "-0.01em", "fontWeight": "500" }],
            "display-hero": ["56px", { "lineHeight": "64px", "letterSpacing": "-0.02em", "fontWeight": "400" }],
            "numeric-data-lg": ["32px", { "lineHeight": "36px", "letterSpacing": "-0.02em", "fontWeight": "500" }],
            "display-hero-mobile": ["38px", { "lineHeight": "44px", "letterSpacing": "-0.01em", "fontWeight": "400" }],
            "headline-lg": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.01em", "fontWeight": "400" }]
          }
        }
      }
    };
  </script>
</head>
<body class="bg-surface-container-lowest font-body-md text-on-surface antialiased selection:bg-primary-container selection:text-on-primary-container">

  <!-- =========================================================================
       SIDEBAR NAVIGATION (Fixed Left, 72 cols)
       ========================================================================= -->
  <aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-low/90 backdrop-blur-2xl z-50 flex flex-col justify-between py-space-lg px-space-md shadow-[0_1px_8px_rgba(0,0,0,0.04)] border-r border-surface-container/40">
    <div class="flex flex-col gap-space-lg">
      
      <!-- Logo: Sovereign Reserve & Zurich Vaults -->
      <a href="index.php" class="flex items-center gap-space-sm px-space-sm group">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary via-secondary to-secondary-container text-on-primary flex items-center justify-center font-bold text-base shadow-md group-hover:scale-105 transition-transform">
          ✦
        </div>
        <div class="flex flex-col">
          <span class="font-headline-sm text-title-md tracking-wider uppercase text-primary font-bold">SOVEREIGN RESERVE</span>
          <span class="font-label-meta text-label-meta tracking-widest text-outline uppercase">Zurich Private Vaults</span>
        </div>
      </a>

      <!-- Navigation Links -->
      <nav class="flex flex-col gap-space-xs">
        <a aria-current="page" class="flex items-center gap-space-sm px-space-md py-space-sm rounded-full transition-all duration-300 bg-surface-container-high text-primary shadow-[0_0_20px_-2px_rgba(212,175,55,0.15)]" href="index.php">
          <span class="material-symbols-outlined text-[20px]">grid_view</span>
          <span class="font-body-md text-body-md tracking-wide font-medium">Dashboard</span>
        </a>
        <a class="flex items-center gap-space-sm px-space-md py-space-sm rounded-full text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all duration-300" href="#performance-section">
          <span class="material-symbols-outlined text-[20px]">account_balance</span>
          <span class="font-body-md text-body-md tracking-wide">Portfolio / Sanctuaries</span>
        </a>
        <a class="flex items-center gap-space-sm px-space-md py-space-sm rounded-full text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all duration-300" href="#ledger-section">
          <span class="material-symbols-outlined text-[20px]">flight_takeoff</span>
          <span class="font-body-md text-body-md tracking-wide">Expeditions / Flights</span>
        </a>
        <a class="flex items-center gap-space-sm px-space-md py-space-sm rounded-full text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all duration-300" href="#fleet-section">
          <span class="material-symbols-outlined text-[20px]">directions_boat</span>
          <span class="font-body-md text-body-md tracking-wide">Markets / Charters</span>
        </a>
        <a class="flex items-center gap-space-sm px-space-md py-space-sm rounded-full text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all duration-300" href="#ledger-section">
          <span class="material-symbols-outlined text-[20px]">lock_clock</span>
          <span class="font-body-md text-body-md tracking-wide">Transfers / Escrow</span>
        </a>
        <a class="flex items-center gap-space-sm px-space-md py-space-sm rounded-full text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all duration-300" href="#ledger-section">
          <span class="material-symbols-outlined text-[20px]">description</span>
          <span class="font-body-md text-body-md tracking-wide">Dossiers / Reports</span>
        </a>
        <a class="flex items-center gap-space-sm px-space-md py-space-sm rounded-full text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all duration-300" href="latihan1.php">
          <span class="material-symbols-outlined text-[20px]">arrow_back</span>
          <span class="font-body-md text-body-md tracking-wide text-primary">Public Advisory &rarr;</span>
        </a>
      </nav>
    </div>

    <!-- Bottom Encryption Badge -->
    <div class="px-space-sm">
      <div class="p-space-sm rounded-xl bg-surface-container/60 backdrop-blur-xl flex items-center gap-space-xs border border-surface-container-high/40">
        <span class="material-symbols-outlined text-primary text-[18px]">shield</span>
        <div class="flex flex-col">
          <span class="font-label-meta text-label-meta uppercase tracking-wider text-on-surface-variant">Tier-1 Encrypted</span>
          <span class="font-label-meta text-label-meta uppercase tracking-wider text-outline">Zurich Gateway &bull; 4096-bit</span>
        </div>
      </div>
    </div>
  </aside>

  <!-- =========================================================================
       MAIN CONTENT CONTAINER
       ========================================================================= -->
  <div class="pl-72">
    
    <!-- TOP FIXED HEADER -->
    <header class="fixed top-0 left-72 right-0 h-20 bg-surface-container-lowest/80 backdrop-blur-2xl z-40 shadow-[0_1px_8px_rgba(0,0,0,0.04)] border-b border-surface-container/30">
      <div class="h-20 w-full px-space-lg flex items-center justify-between gap-space-md">
        
        <!-- Welcome Greeting & Client Dossier -->
        <div class="flex items-center gap-space-md">
          <div class="flex flex-col">
            <span class="font-body-md text-body-md text-on-surface font-medium">Welcome, <?= safe($client['title'] ?? 'Alexander Dubois') ?></span>
            <span class="font-label-meta text-label-meta uppercase tracking-wider text-secondary"><?= safe($client['member_id'] ?? 'VIP-8821') ?> &bull; <?= safe($client['tier'] ?? 'Sovereign Tier') ?></span>
          </div>
          <div class="hidden lg:flex items-center px-space-sm py-space-xs rounded-full bg-surface-container border border-surface-container-high/40">
            <span class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-widest"><?= date('M d, Y') ?></span>
          </div>
        </div>

        <!-- Search Bar -->
        <div class="flex-1 max-w-md hidden md:flex items-center gap-space-xs px-space-md py-space-xs bg-surface-container/80 rounded-full border border-surface-container-high/50">
          <span class="material-symbols-outlined text-outline text-[18px]">search</span>
          <input id="global-search-input" class="bg-transparent w-full text-on-surface placeholder:text-outline font-body-sm text-body-sm focus:outline-none" placeholder="Search dossiers, charters, vaults..." type="text"/>
        </div>

        <!-- Notification & Profile Tray -->
        <div class="flex items-center gap-space-md">
          <button onclick="alert('Zurich Core Signal: Zero security alerts. All escrow vaults synchronized.')" class="relative p-space-xs rounded-full hover:bg-surface-container-high transition-colors cursor-pointer">
            <span class="material-symbols-outlined text-on-surface-variant text-[22px]">notifications</span>
            <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-primary animate-pulse"></span>
          </button>
          <button onclick="alert('Connecting to Dedicated Attaché Desk (Geneva Quorum)...')" class="relative p-space-xs rounded-full hover:bg-surface-container-high transition-colors cursor-pointer">
            <span class="material-symbols-outlined text-on-surface-variant text-[22px]">support_agent</span>
            <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-secondary"></span>
          </button>
          
          <div class="flex items-center gap-space-sm pl-space-xs">
            <div class="relative rounded-full p-[2px] bg-secondary-container">
              <img alt="Profile" class="w-8 h-8 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAttuZoSQhLh0t3Q6VKC-Y1OhfDBagwl5g5Uo_k36JUrEyqs2C-QTue4ntkMCGnar6sowcrwtZNolb1YrDBUPf3WVeJGEHGRmJt4H-K6A5sl3GkHro1yrLmQsutNqaZQyTp9cg8VZTw7VlrwASZ72BH6YOZ4H_x43tPLkUo7F3qaNnVWL46dynQtfqyjY25OWRp-JIEhJbRVkJjreGATRNtQr-ivyvHAUn_ollc9_7p"/>
            </div>
            <a href="latihan1.php" class="hidden sm:inline-block px-3 py-1 rounded-full text-xs font-semibold bg-surface-container hover:bg-surface-container-high text-primary border border-surface-container-high transition-colors">
              Exit to Web
            </a>
          </div>
        </div>

      </div>
    </header>

    <!-- =========================================================================
         DASHBOARD BODY
         ========================================================================= -->
    <main class="relative pt-20 w-full px-space-lg min-h-screen bg-surface-container-lowest">
      <div class="flex flex-col w-full pb-space-xl gap-space-lg">

        <!-- Ambient Specular Glow Elements -->
        <div class="relative w-full">
          <div class="absolute -top-10 left-1/4 w-96 h-96 bg-primary/5 rounded-full blur-[140px] pointer-events-none"></div>
          <div class="absolute top-48 right-10 w-80 h-80 bg-secondary/5 rounded-full blur-[120px] pointer-events-none"></div>
          
          <!-- Sovereign Sub-header / Status Node Bar -->
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md pb-space-sm pt-4">
            <div class="flex flex-col gap-space-xs">
              <div class="flex items-center gap-space-xs">
                <span class="inline-block w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                <span class="font-label-caps text-label-caps uppercase text-primary tracking-[0.2em]">Zurich Core Enclave &bull; Biometric Node #09</span>
              </div>
              <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Sovereign Wealth &amp; Concierge Ledger</h1>
            </div>
            
            <div class="flex items-center gap-space-sm flex-wrap">
              <div class="px-space-md py-space-xs rounded-full bg-surface-container-high/60 backdrop-blur-md flex items-center gap-space-xs shadow-sm border border-surface-container-high">
                <span class="material-symbols-outlined text-primary text-[16px]">verified</span>
                <span class="font-label-caps text-label-caps text-on-surface tracking-wider uppercase">Vault Integrity: 99.998%</span>
              </div>
              <div class="px-space-md py-space-xs rounded-full bg-primary text-on-primary font-body-sm text-body-sm font-semibold flex items-center gap-space-xs shadow-md shadow-primary/10">
                <span class="material-symbols-outlined text-[16px]">key</span>
                <span>Dual-Custody Key Active</span>
              </div>
            </div>
          </div>
        </div>

        <!-- =====================================================================
             PRIMARY PERFORMANCE & TOTAL WEALTH BENTO GRID
             ===================================================================== -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md" id="performance-section">
          
          <!-- CARD 1: LARGE PERFORMANCE CHART (8 cols) -->
          <div class="lg:col-span-8 group relative rounded-xl bg-surface-container-low/70 backdrop-blur-2xl p-space-lg shadow-xl overflow-hidden transition-all duration-500 hover:bg-surface-container-low/85 border border-surface-container-high/30">
            <!-- Top Specular Highlight Line -->
            <div class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
            
            <!-- Card Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md mb-space-lg">
              <div class="flex flex-col gap-space-xs">
                <div class="flex items-center gap-space-sm">
                  <span class="font-label-caps text-label-caps text-outline uppercase tracking-[0.18em]">PORTFOLIO PERFORMANCE</span>
                  <span class="px-space-xs py-[2px] rounded-full bg-primary/10 text-primary font-label-meta text-label-meta tracking-wide">+5.42% Growth</span>
                </div>
                <div class="flex items-baseline gap-space-sm">
                  <span class="font-numeric-data-lg text-numeric-data-lg text-on-surface font-light tracking-tight">$2,485,000</span>
                  <span class="font-body-sm text-body-sm text-outline">USD Consolidated</span>
                </div>
              </div>
              
              <!-- Filter Pills -->
              <div class="flex items-center gap-1 p-1 bg-surface-container-lowest/80 rounded-full shadow-inner self-start sm:self-auto border border-surface-container-high/40">
                <button onclick="setChartFilter(this, '1M')" class="chart-filter-btn px-3 py-1 rounded-full font-label-caps text-label-caps text-outline hover:text-on-surface transition-colors cursor-pointer">1M</button>
                <button onclick="setChartFilter(this, '3M')" class="chart-filter-btn px-3 py-1 rounded-full font-label-caps text-label-caps text-outline hover:text-on-surface transition-colors cursor-pointer">3M</button>
                <button onclick="setChartFilter(this, '6M')" class="chart-filter-btn px-3 py-1 rounded-full font-label-caps text-label-caps bg-primary text-on-primary font-semibold shadow-sm cursor-pointer active">6 MONTHS</button>
                <button onclick="setChartFilter(this, '1Y')" class="chart-filter-btn px-3 py-1 rounded-full font-label-caps text-label-caps text-outline hover:text-on-surface transition-colors cursor-pointer">1Y</button>
                <button onclick="setChartFilter(this, 'ALL')" class="chart-filter-btn px-3 py-1 rounded-full font-label-caps text-label-caps text-outline hover:text-on-surface transition-colors cursor-pointer">ALL</button>
              </div>
            </div>

            <!-- Glowing Smooth Area Line Chart (Inline SVG) -->
            <div class="relative w-full h-72">
              <svg class="w-full h-full overflow-visible" fill="none" preserveAspectRatio="none" viewBox="0 0 760 260">
                <defs>
                  <!-- Primary Line Gradient Fill -->
                  <linearGradient id="goldAreaGrad" x1="0" x2="0" y1="0" y2="1">
                    <stop offset="0%" stop-color="#faecc5" stop-opacity="0.32"></stop>
                    <stop offset="50%" stop-color="#d4af37" stop-opacity="0.12"></stop>
                    <stop offset="100%" stop-color="#d4af37" stop-opacity="0.0"></stop>
                  </linearGradient>
                  <!-- Line Stroke Gradient -->
                  <linearGradient id="goldStrokeGrad" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0%" stop-color="#faecc5"></stop>
                    <stop offset="60%" stop-color="#f2ca50"></stop>
                    <stop offset="100%" stop-color="#d4af37"></stop>
                  </linearGradient>
                  <!-- Specular Glow Filter -->
                  <filter height="140%" id="glowGold" width="140%" x="-20%" y="-20%">
                    <feGaussianBlur result="blur" stdDeviation="3"></feGaussianBlur>
                    <feMerge>
                      <feMergeNode in="blur"></feMergeNode>
                      <feMergeNode in="SourceGraphic"></feMergeNode>
                    </feMerge>
                  </filter>
                </defs>
                
                <!-- Horizontal Soft Guidelines -->
                <line stroke="#99907c" stroke-dasharray="3 3" stroke-opacity="0.12" x1="0" x2="760" y1="40" y2="40"></line>
                <line stroke="#99907c" stroke-dasharray="3 3" stroke-opacity="0.12" x1="0" x2="760" y1="95" y2="95"></line>
                <line stroke="#99907c" stroke-dasharray="3 3" stroke-opacity="0.12" x1="0" x2="760" y1="150" y2="150"></line>
                <line stroke="#99907c" stroke-dasharray="3 3" stroke-opacity="0.12" x1="0" x2="760" y1="205" y2="205"></line>
                
                <!-- Area Gradient Fill Path -->
                <path d="M 0 210 C 80 190, 140 180, 200 150 C 260 120, 310 145, 380 110 C 450 75, 520 95, 600 50 C 670 15, 710 32, 760 22 L 760 250 L 0 250 Z" fill="url(#goldAreaGrad)"></path>
                
                <!-- Smooth Glowing Line Stroke -->
                <path d="M 0 210 C 80 190, 140 180, 200 150 C 260 120, 310 145, 380 110 C 450 75, 520 95, 600 50 C 670 15, 710 32, 760 22" fill="none" filter="url(#glowGold)" stroke="url(#goldStrokeGrad)" stroke-width="2.5"></path>
                
                <!-- Peak Marker Vertical Line -->
                <line stroke="#d4af37" stroke-dasharray="2 2" stroke-opacity="0.35" x1="600" x2="600" y1="50" y2="240"></line>
                
                <!-- Peak Data Node (Sep 2026: $2,485,000) -->
                <circle class="animate-ping" cx="600" cy="50" fill="#f2ca50" fill-opacity="0.3" r="7"></circle>
                <circle cx="600" cy="50" fill="#f2ca50" r="5"></circle>
                <circle cx="600" cy="50" fill="#0c0e12" r="2.5"></circle>
              </svg>
              
              <!-- Peak Float Tooltip Floating Tag -->
              <div class="absolute top-2 right-32 sm:right-40 bg-surface-container-high/90 backdrop-blur-xl px-space-sm py-1 rounded shadow-lg pointer-events-none flex flex-col items-center border border-primary/20">
                <span class="font-label-meta text-label-meta text-outline uppercase tracking-wider">Sep 2026 Peak</span>
                <span class="font-numeric-data-md text-numeric-data-md text-primary font-semibold">$2,485,000</span>
              </div>
            </div>

            <!-- Date Axis Labels -->
            <div class="flex justify-between items-center pt-space-xs text-outline font-label-meta text-label-meta uppercase tracking-wider">
              <span>May 2026</span>
              <span>Jun 2026</span>
              <span>Jul 2026</span>
              <span>Aug 2026</span>
              <span class="text-primary font-bold">Sep 2026</span>
              <span>Oct 2026</span>
            </div>
          </div>

          <!-- CARD 2: TOTAL WEALTH & TREASURY (4 cols) -->
          <div class="lg:col-span-4 relative rounded-xl bg-surface-container-low/70 backdrop-blur-2xl p-space-lg shadow-xl flex flex-col justify-between overflow-hidden transition-all duration-500 hover:bg-surface-container-low/85 border border-surface-container-high/30">
            <div class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
            <div>
              <div class="flex items-center justify-between mb-space-xs">
                <span class="font-label-caps text-label-caps text-outline uppercase tracking-[0.18em]">TOTAL WEALTH &amp; TREASURY</span>
                <span class="px-space-xs py-[2px] rounded-full bg-emerald-500/10 text-emerald-400 font-label-meta text-label-meta tracking-wide flex items-center gap-1 border border-emerald-500/20">
                  <span class="material-symbols-outlined text-[13px]">trending_up</span>+7.8% YTD
                </span>
              </div>
              <div class="font-headline-lg text-headline-lg text-on-surface font-light tracking-tight mb-space-sm">
                $32,780,900
              </div>
              
              <!-- Dual Layer Smooth Wave Area Chart -->
              <div class="relative w-full h-28 my-space-xs">
                <svg class="w-full h-full overflow-visible" fill="none" preserveAspectRatio="none" viewBox="0 0 320 110">
                  <defs>
                    <linearGradient id="waveGrad1" x1="0" x2="0" y1="0" y2="1">
                      <stop offset="0%" stop-color="#f2ca50" stop-opacity="0.25"></stop>
                      <stop offset="100%" stop-color="#f2ca50" stop-opacity="0.0"></stop>
                    </linearGradient>
                    <linearGradient id="waveGrad2" x1="0" x2="0" y1="0" y2="1">
                      <stop offset="0%" stop-color="#faecc5" stop-opacity="0.18"></stop>
                      <stop offset="100%" stop-color="#d4af37" stop-opacity="0.0"></stop>
                    </linearGradient>
                  </defs>
                  <!-- Background Secondary Wave -->
                  <path d="M 0 80 Q 80 50, 160 65 T 320 40 L 320 110 L 0 110 Z" fill="url(#waveGrad2)"></path>
                  <path d="M 0 80 Q 80 50, 160 65 T 320 40" fill="none" stroke="#faecc5" stroke-opacity="0.5" stroke-width="1.5"></path>
                  <!-- Foreground Primary Wave -->
                  <path d="M 0 95 Q 70 70, 150 45 T 320 20 L 320 110 L 0 110 Z" fill="url(#waveGrad1)"></path>
                  <path d="M 0 95 Q 70 70, 150 45 T 320 20" fill="none" stroke="#f2ca50" stroke-width="2"></path>
                  <circle cx="320" cy="20" fill="#f2ca50" r="3.5"></circle>
                </svg>
              </div>
            </div>

            <!-- Quick Treasury Balances List -->
            <div class="flex flex-col gap-space-xs mt-space-sm pt-space-sm bg-surface-container-lowest/50 p-space-sm rounded-lg border border-surface-container-high/30">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-primary text-[16px]">account_balance</span>
                  <span class="font-body-sm text-body-sm text-on-surface-variant">Global Custody Escrow</span>
                </div>
                <span class="font-body-sm text-body-sm text-on-surface font-semibold tracking-tight">$32,780,900</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-secondary text-[16px]">shield_with_house</span>
                  <span class="font-body-sm text-body-sm text-on-surface-variant">Gold Bullion (Zurich)</span>
                </div>
                <span class="font-body-sm text-body-sm text-on-surface font-semibold tracking-tight">$14,250,000</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-emerald-400 text-[16px]">bolt</span>
                  <span class="font-body-sm text-body-sm text-on-surface-variant">Liquid Yield Stash</span>
                </div>
                <span class="font-body-sm text-body-sm text-emerald-400 font-semibold tracking-tight">+$34,780 today</span>
              </div>
            </div>

          </div>

        </div>

        <!-- =====================================================================
             MIDDLE ROW: 3D DONUT ALLOCATION + MARKET/FLEET + GOALS TRACKER
             ===================================================================== -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-space-md" id="fleet-section">
          
          <!-- CARD 3: ASSET & DOMAIN ALLOCATION (DONUT CHART) - 4 cols -->
          <div class="lg:col-span-4 rounded-xl bg-surface-container-low/70 backdrop-blur-2xl p-space-lg shadow-xl flex flex-col justify-between relative overflow-hidden transition-all duration-500 hover:bg-surface-container-low/85 border border-surface-container-high/30">
            <div class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
            <div>
              <div class="flex items-center justify-between mb-space-md">
                <span class="font-label-caps text-label-caps text-outline uppercase tracking-[0.18em]">ASSET ALLOCATION — 3D RING</span>
                <span class="material-symbols-outlined text-outline text-[18px]">donut_small</span>
              </div>
              
              <!-- 3D Segmented Donut SVG Visual -->
              <div class="relative flex items-center justify-center my-space-sm">
                <svg class="w-48 h-48 -rotate-90 drop-shadow-[0_12px_24px_rgba(0,0,0,0.6)]" viewBox="0 0 160 160">
                  <defs>
                    <linearGradient id="goldDonut" x1="0" x2="1" y1="0" y2="1">
                      <stop offset="0%" stop-color="#faecc5"></stop>
                      <stop offset="100%" stop-color="#d4af37"></stop>
                    </linearGradient>
                    <linearGradient id="brassDonut" x1="0" x2="1" y1="0" y2="1">
                      <stop offset="0%" stop-color="#e7c35a"></stop>
                      <stop offset="100%" stop-color="#896c00"></stop>
                    </linearGradient>
                    <linearGradient id="obsidianDonut" x1="0" x2="1" y1="0" y2="1">
                      <stop offset="0%" stop-color="#37393e"></stop>
                      <stop offset="100%" stop-color="#1e2024"></stop>
                    </linearGradient>
                    <linearGradient id="silverDonut" x1="0" x2="1" y1="0" y2="1">
                      <stop offset="0%" stop-color="#e2e2e8"></stop>
                      <stop offset="100%" stop-color="#99907c"></stop>
                    </linearGradient>
                  </defs>
                  <!-- Background Track -->
                  <circle cx="80" cy="80" fill="transparent" r="58" stroke="#1e2024" stroke-width="18"></circle>
                  <!-- Segments: Circumference = 2 * pi * 58 ≈ 364.4 -->
                  <!-- Segment 1: Equities & Aviation (52% -> 189.5) -->
                  <circle cx="80" cy="80" fill="transparent" r="58" stroke="url(#goldDonut)" stroke-dasharray="189.5 364.4" stroke-dashoffset="0" stroke-width="18"></circle>
                  <!-- Segment 2: Fixed Income & Sanctuaries (28% -> 102.0) -->
                  <circle cx="80" cy="80" fill="transparent" r="58" stroke="url(#brassDonut)" stroke-dasharray="102.0 364.4" stroke-dashoffset="-193.5" stroke-width="18"></circle>
                  <!-- Segment 3: Real Estate & Charters (15% -> 54.6) -->
                  <circle cx="80" cy="80" fill="transparent" r="58" stroke="url(#obsidianDonut)" stroke-dasharray="54.6 364.4" stroke-dashoffset="-298.5" stroke-width="18"></circle>
                  <!-- Segment 4: Alternatives & Vaults (5% -> 18.2) -->
                  <circle cx="80" cy="80" fill="transparent" r="58" stroke="url(#silverDonut)" stroke-dasharray="18.2 364.4" stroke-dashoffset="-355.1" stroke-width="18"></circle>
                </svg>
                <!-- Donut Cutout Center Core -->
                <div class="absolute flex flex-col items-center justify-center text-center">
                  <span class="font-numeric-data-lg text-numeric-data-lg text-primary font-bold tracking-tight">100%</span>
                  <span class="font-label-meta text-label-meta text-outline uppercase tracking-widest">Tier Alpha</span>
                </div>
              </div>
            </div>

            <!-- Legend -->
            <div class="grid grid-cols-2 gap-x-space-sm gap-y-space-xs pt-space-sm">
              <div class="flex items-center gap-space-xs">
                <span class="w-2.5 h-2.5 rounded-full bg-primary shadow-sm shadow-primary/30"></span>
                <div class="flex flex-col">
                  <span class="font-label-meta text-label-meta text-on-surface">Equities &amp; Jets</span>
                  <span class="font-numeric-data-md text-body-sm text-primary font-bold">52%</span>
                </div>
              </div>
              <div class="flex items-center gap-space-xs">
                <span class="w-2.5 h-2.5 rounded-full bg-secondary"></span>
                <div class="flex flex-col">
                  <span class="font-label-meta text-label-meta text-on-surface">Sanctuaries</span>
                  <span class="font-numeric-data-md text-body-sm text-secondary font-bold">28%</span>
                </div>
              </div>
              <div class="flex items-center gap-space-xs">
                <span class="w-2.5 h-2.5 rounded-full bg-surface-bright"></span>
                <div class="flex flex-col">
                  <span class="font-label-meta text-label-meta text-on-surface">Charters</span>
                  <span class="font-numeric-data-md text-body-sm text-on-surface font-bold">15%</span>
                </div>
              </div>
              <div class="flex items-center gap-space-xs">
                <span class="w-2.5 h-2.5 rounded-full bg-inverse-surface"></span>
                <div class="flex flex-col">
                  <span class="font-label-meta text-label-meta text-on-surface">Vault Vaults</span>
                  <span class="font-numeric-data-md text-body-sm text-outline font-bold">5%</span>
                </div>
              </div>
            </div>
          </div>

          <!-- CARD 4: MARKET SENTIMENT & FLEET READINESS - 4 cols -->
          <div class="lg:col-span-4 rounded-xl bg-surface-container-low/70 backdrop-blur-2xl p-space-lg shadow-xl flex flex-col justify-between relative overflow-hidden transition-all duration-500 hover:bg-surface-container-low/85 border border-surface-container-high/30">
            <div class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
            <div>
              <div class="flex items-center justify-between mb-space-md">
                <span class="font-label-caps text-label-caps text-outline uppercase tracking-[0.18em]">MARKET SENTIMENT &amp; FLEET</span>
                <span class="material-symbols-outlined text-outline text-[18px]">flight_takeoff</span>
              </div>
              
              <!-- Vertical Pillar Charts for Global Asset Indices -->
              <div class="flex items-end justify-between gap-space-sm h-36 px-space-sm pb-space-sm bg-surface-container-lowest/60 rounded-lg border border-surface-container-high/30">
                <!-- S&P 500 -->
                <div class="flex-1 flex flex-col items-center gap-space-xs h-full justify-end">
                  <span class="font-label-meta text-label-meta text-emerald-400 font-semibold">+1.2%</span>
                  <div class="w-full max-w-[28px] h-24 rounded-t-sm bg-gradient-to-t from-secondary-container via-primary to-emerald-400 shadow-sm shadow-primary/20"></div>
                  <span class="font-label-caps text-label-caps text-outline">S&amp;P</span>
                </div>
                <!-- NASDAQ -->
                <div class="flex-1 flex flex-col items-center gap-space-xs h-full justify-end">
                  <span class="font-label-meta text-label-meta text-primary font-semibold">+0.9%</span>
                  <div class="w-full max-w-[28px] h-20 rounded-t-sm bg-gradient-to-t from-surface-variant via-secondary to-primary shadow-sm shadow-secondary/15"></div>
                  <span class="font-label-caps text-label-caps text-outline">NASD</span>
                </div>
                <!-- DOW -->
                <div class="flex-1 flex flex-col items-center gap-space-xs h-full justify-end">
                  <span class="font-label-meta text-label-meta text-secondary font-semibold">+0.5%</span>
                  <div class="w-full max-w-[28px] h-14 rounded-t-sm bg-gradient-to-t from-surface-container via-surface-bright to-secondary"></div>
                  <span class="font-label-caps text-label-caps text-outline">DOW</span>
                </div>
                <!-- GOLD FIX -->
                <div class="flex-1 flex flex-col items-center gap-space-xs h-full justify-end">
                  <span class="font-label-meta text-label-meta text-primary font-semibold">+2.1%</span>
                  <div class="w-full max-w-[28px] h-28 rounded-t-sm bg-gradient-to-t from-secondary-container to-primary shadow-md shadow-primary/30"></div>
                  <span class="font-label-caps text-label-caps text-outline">XAU</span>
                </div>
              </div>
            </div>

            <!-- Fleet Readiness Status Module -->
            <div class="mt-space-md p-space-sm rounded-lg bg-surface-container-high/60 backdrop-blur-sm flex items-center justify-between border border-surface-container-high/40">
              <div class="flex items-center gap-space-sm">
                <div class="relative">
                  <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 block"></span>
                  <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 absolute inset-0 animate-ping opacity-75"></span>
                </div>
                <div class="flex flex-col">
                  <span class="font-body-sm text-body-sm text-on-surface font-medium">Gulfstream G700 &amp; Global 7500</span>
                  <span class="font-label-meta text-label-meta text-outline">Zurich (LSZH) &bull; Le Bourget (LFPB)</span>
                </div>
              </div>
              <span class="font-label-caps text-label-caps text-emerald-400 font-semibold uppercase bg-emerald-950/40 px-2.5 py-1 rounded border border-emerald-500/20">4/5 Ready</span>
            </div>
          </div>

          <!-- CARD 5: GOALS & MILESTONE TRACKER - 4 cols -->
          <div class="lg:col-span-4 rounded-xl bg-surface-container-low/70 backdrop-blur-2xl p-space-lg shadow-xl flex flex-col justify-between relative overflow-hidden transition-all duration-500 hover:bg-surface-container-low/85 border border-surface-container-high/30">
            <div class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
            <div>
              <div class="flex items-center justify-between mb-space-md">
                <span class="font-label-caps text-label-caps text-outline uppercase tracking-[0.18em]">GOALS &amp; CAPITAL ALLOCATIONS</span>
                <span class="material-symbols-outlined text-outline text-[18px]">track_changes</span>
              </div>
              
              <div class="flex flex-col gap-space-md">
                <!-- Milestone 1 -->
                <div class="flex flex-col gap-space-xs">
                  <div class="flex justify-between items-baseline">
                    <span class="font-body-sm text-body-sm text-on-surface font-medium">Family Estate Reserve</span>
                    <span class="font-label-caps text-label-caps text-primary font-bold">100% ($47.2B)</span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden p-[1px]">
                    <div class="h-full rounded-full bg-gradient-to-r from-secondary to-primary shadow-[0_0_12px_rgba(242,202,80,0.6)] w-full"></div>
                  </div>
                </div>
                <!-- Milestone 2 -->
                <div class="flex flex-col gap-space-xs">
                  <div class="flex justify-between items-baseline">
                    <span class="font-body-sm text-body-sm text-on-surface font-medium">Island Sanctuary Acquisition</span>
                    <span class="font-label-caps text-label-caps text-secondary font-bold">60% ($33.2B)</span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden p-[1px]">
                    <div class="h-full rounded-full bg-gradient-to-r from-surface-bright via-secondary to-primary w-[60%]"></div>
                  </div>
                </div>
                <!-- Milestone 3 -->
                <div class="flex flex-col gap-space-xs">
                  <div class="flex justify-between items-baseline">
                    <span class="font-body-sm text-body-sm text-on-surface font-medium">Orbital Aerospace Venture</span>
                    <span class="font-label-caps text-label-caps text-outline font-bold">35% ($10.0B)</span>
                  </div>
                  <div class="w-full h-2 rounded-full bg-surface-container-highest overflow-hidden p-[1px]">
                    <div class="h-full rounded-full bg-gradient-to-r from-secondary-container to-secondary w-[35%]"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Biometric Seal Note -->
            <div class="mt-space-md flex items-center justify-between pt-space-xs border-t border-surface-container-high/30">
              <span class="font-label-meta text-label-meta text-outline uppercase tracking-wider">Multi-Generational Trust Lock</span>
              <span class="material-symbols-outlined text-primary text-[18px]">verified_user</span>
            </div>
          </div>

        </div>

        <!-- =====================================================================
             BOTTOM WIDE CARD 6: RECENT TRANSACTIONS & PRIVATE ESCROW LEDGER
             ===================================================================== -->
        <div class="w-full rounded-xl bg-surface-container-low/70 backdrop-blur-2xl p-space-lg shadow-xl relative overflow-hidden transition-all duration-500 hover:bg-surface-container-low/85 border border-surface-container-high/30" id="ledger-section">
          <div class="absolute inset-x-0 top-0 h-[1px] bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
          
          <!-- Header & Action Tray -->
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md mb-space-md">
            <div class="flex items-center gap-space-sm">
              <div class="p-2 rounded-lg bg-primary/10 text-primary">
                <span class="material-symbols-outlined text-[20px]">receipt_long</span>
              </div>
              <div class="flex flex-col">
                <span class="font-label-caps text-label-caps text-outline uppercase tracking-[0.18em]">SETTLEMENT LEDGER</span>
                <h2 class="font-title-md text-title-md text-on-surface font-semibold">Recent Transactions &amp; Private Escrow</h2>
              </div>
            </div>
            
            <div class="flex items-center gap-space-xs self-start sm:self-auto">
              <button onclick="toggleFilterPrompt()" class="px-space-md py-1.5 rounded-full bg-surface-container-high/80 text-on-surface hover:text-primary font-label-caps text-label-caps tracking-wider transition-colors flex items-center gap-1 shadow-sm cursor-pointer border border-surface-container-high">
                <span class="material-symbols-outlined text-[16px]">tune</span> Filter
              </button>
              <button onclick="exportStatementCSV()" class="px-space-md py-1.5 rounded-full bg-surface-container-high/80 text-on-surface hover:text-primary font-label-caps text-label-caps tracking-wider transition-colors flex items-center gap-1 shadow-sm cursor-pointer border border-surface-container-high">
                <span class="material-symbols-outlined text-[16px]">file_download</span> Export Statement
              </button>
              <button class="p-1.5 rounded-full bg-surface-container-high/80 text-outline hover:text-primary transition-colors cursor-pointer border border-surface-container-high">
                <span class="material-symbols-outlined text-[18px]">more_vert</span>
              </button>
            </div>
          </div>

          <!-- Micro Champagne Gold Header Accent Bar -->
          <div class="w-full h-[1px] bg-gradient-to-r from-primary/40 via-secondary/20 to-transparent mb-space-xs"></div>

          <!-- Transactions Responsive Table -->
          <div class="w-full overflow-x-auto">
            <table class="w-full text-left border-collapse" id="transactions-table">
              <thead>
                <tr class="text-outline font-label-caps text-label-caps uppercase tracking-wider">
                  <th class="py-space-sm px-space-sm font-medium">Date</th>
                  <th class="py-space-sm px-space-sm font-medium">Description / Route</th>
                  <th class="py-space-sm px-space-sm font-medium">Domain</th>
                  <th class="py-space-sm px-space-sm font-medium">Escrow Status</th>
                  <th class="py-space-sm px-space-sm font-medium text-right">Settled Amount</th>
                </tr>
              </thead>
              <tbody class="divide-y-0">
                <!-- Row 1 -->
                <tr class="group hover:bg-surface-container-high/40 transition-colors">
                  <td class="py-space-sm px-space-sm font-label-meta text-label-meta text-outline">10/23/2026</td>
                  <td class="py-space-sm px-space-sm">
                    <div class="flex items-center gap-space-sm">
                      <span class="material-symbols-outlined text-primary text-[18px]">flight</span>
                      <div class="flex flex-col">
                        <span class="font-body-md text-body-md text-on-surface font-medium">Charter to Amalfi Coast</span>
                        <span class="font-label-meta text-label-meta text-outline">Gulfstream G700 &bull; Tail SR-901</span>
                      </div>
                    </div>
                  </td>
                  <td class="py-space-sm px-space-sm font-body-sm text-body-sm text-on-surface-variant">Aviation</td>
                  <td class="py-space-sm px-space-sm">
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-emerald-950/40 text-emerald-400 border border-emerald-500/20">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Cleared
                    </span>
                  </td>
                  <td class="py-space-sm px-space-sm font-numeric-data-md text-numeric-data-md text-on-surface text-right font-medium">$45,000</td>
                </tr>

                <!-- Row 2 -->
                <tr class="group hover:bg-surface-container-high/40 transition-colors bg-surface-container-lowest/30">
                  <td class="py-space-sm px-space-sm font-label-meta text-label-meta text-outline">10/21/2026</td>
                  <td class="py-space-sm px-space-sm">
                    <div class="flex items-center gap-space-sm">
                      <span class="material-symbols-outlined text-secondary text-[18px]">lock</span>
                      <div class="flex flex-col">
                        <span class="font-body-md text-body-md text-on-surface font-medium">Zurich Escrow Vault Deposit</span>
                        <span class="font-label-meta text-label-meta text-outline">Physical 999.9 Fine Gold Allocation</span>
                      </div>
                    </div>
                  </td>
                  <td class="py-space-sm px-space-sm font-body-sm text-body-sm text-on-surface-variant">Escrow &amp; Bullion</td>
                  <td class="py-space-sm px-space-sm">
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-primary/10 text-primary border border-primary/20">
                      <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Settled
                    </span>
                  </td>
                  <td class="py-space-sm px-space-sm font-numeric-data-md text-numeric-data-md text-primary text-right font-medium">$120,000</td>
                </tr>

                <!-- Row 3 -->
                <tr class="group hover:bg-surface-container-high/40 transition-colors">
                  <td class="py-space-sm px-space-sm font-label-meta text-label-meta text-outline">10/18/2026</td>
                  <td class="py-space-sm px-space-sm">
                    <div class="flex items-center gap-space-sm">
                      <span class="material-symbols-outlined text-on-surface-variant text-[18px]">directions_boat</span>
                      <div class="flex flex-col">
                        <span class="font-body-md text-body-md text-on-surface font-medium">Monaco Superyacht Mooring &amp; Berth</span>
                        <span class="font-label-meta text-label-meta text-outline">Port Hercule Marina Quay 4</span>
                      </div>
                    </div>
                  </td>
                  <td class="py-space-sm px-space-sm font-body-sm text-body-sm text-on-surface-variant">Maritime</td>
                  <td class="py-space-sm px-space-sm">
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-emerald-950/40 text-emerald-400 border border-emerald-500/20">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> Cleared
                    </span>
                  </td>
                  <td class="py-space-sm px-space-sm font-numeric-data-md text-numeric-data-md text-on-surface text-right font-medium">$82,500</td>
                </tr>

                <!-- Row 4 -->
                <tr class="group hover:bg-surface-container-high/40 transition-colors bg-surface-container-lowest/30">
                  <td class="py-space-sm px-space-sm font-label-meta text-label-meta text-outline">10/14/2026</td>
                  <td class="py-space-sm px-space-sm">
                    <div class="flex items-center gap-space-sm">
                      <span class="material-symbols-outlined text-secondary text-[18px]">chalet</span>
                      <div class="flex flex-col">
                        <span class="font-body-md text-body-md text-on-surface font-medium">St. Moritz Alpine Sanctuary Maintenance</span>
                        <span class="font-label-meta text-label-meta text-outline">Helipad De-icing &amp; Security Garrison</span>
                      </div>
                    </div>
                  </td>
                  <td class="py-space-sm px-space-sm font-body-sm text-body-sm text-on-surface-variant">Sanctuaries</td>
                  <td class="py-space-sm px-space-sm">
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full font-label-caps text-label-caps bg-primary/10 text-primary border border-primary/20">
                      <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Settled
                    </span>
                  </td>
                  <td class="py-space-sm px-space-sm font-numeric-data-md text-numeric-data-md text-primary text-right font-medium">$28,400</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Concierge Dispatch Sticky Footer Anchor -->
          <div class="mt-space-md p-space-md rounded-lg bg-surface-container-high/40 flex flex-col md:flex-row md:items-center justify-between gap-space-sm border border-surface-container-high/30">
            <div class="flex items-center gap-space-md">
              <div class="relative">
                <span class="w-3 h-3 rounded-full bg-primary block"></span>
                <span class="w-3 h-3 rounded-full bg-primary absolute inset-0 animate-ping"></span>
              </div>
              <div class="flex flex-col">
                <span class="font-title-md text-title-md text-on-surface font-medium">Personal Banker: Lucian Von Bern</span>
                <span class="font-body-sm text-body-sm text-outline">Direct Encrypted Terminal &bull; Response latency ~20s</span>
              </div>
            </div>
            
            <div class="flex items-center gap-space-sm">
              <button onclick="handleCallBanker()" class="px-space-md py-space-xs rounded-full bg-surface-container text-primary hover:bg-surface-container-highest transition-colors font-body-sm text-body-sm flex items-center gap-space-xs border border-surface-container-high cursor-pointer">
                <span class="material-symbols-outlined text-[16px]">call</span>
                <span>Encrypted Line</span>
              </button>
              <button onclick="handleDispatchWire()" class="px-space-md py-space-xs rounded-full bg-primary text-on-primary hover:bg-primary-fixed transition-colors font-body-sm text-body-sm font-semibold flex items-center gap-space-xs shadow-md shadow-primary/20 cursor-pointer">
                <span class="material-symbols-outlined text-[16px]">send</span>
                <span>Dispatch Wire Order</span>
              </button>
            </div>
          </div>

        </div>

      </div>
    </main>
  </div>

  <!-- Lightweight Interactive Script -->
  <script>
    function setChartFilter(btn, filter) {
      document.querySelectorAll('.chart-filter-btn').forEach(b => {
        b.classList.remove('bg-primary', 'text-on-primary', 'font-semibold', 'shadow-sm');
        b.classList.add('text-outline');
      });
      btn.classList.add('bg-primary', 'text-on-primary', 'font-semibold', 'shadow-sm');
      btn.classList.remove('text-outline');
    }

    function handleCallBanker() {
      alert('Establishing 4096-bit encrypted audio connection with Attache Lucian Von Bern (Zurich Desks)...');
    }

    function handleDispatchWire() {
      const amount = prompt('Enter Escrow Wire Authorization Amount (USD):', '$50,000');
      if (amount) {
        alert('Wire directive for ' + amount + ' securely queued for dual-custody authorization quorum.');
      }
    }

    function toggleFilterPrompt() {
      const q = prompt('Filter ledger transactions by keyword or domain (e.g. Aviation, Maritime, Escrow):', '');
      if (q !== null) {
        const rows = document.querySelectorAll('#transactions-table tbody tr');
        rows.forEach(r => {
          if (r.textContent.toLowerCase().includes(q.toLowerCase())) {
            r.style.display = '';
          } else {
            r.style.display = 'none';
          }
        });
      }
    }

    function exportStatementCSV() {
      alert('Generating certified FINMA-compliant Swiss Vault statement (PDF/CSV)... Download initiated.');
    }

    // Live search input filtering
    document.getElementById('global-search-input')?.addEventListener('input', function(e) {
      const term = e.target.value.toLowerCase();
      document.querySelectorAll('#transactions-table tbody tr').forEach(r => {
        r.style.display = r.textContent.toLowerCase().includes(term) ? '' : 'none';
      });
    });
  </script>

</body>
</html>

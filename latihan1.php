<?php
/**
 * Pertemuan 6 & 7 - Web Programming
 * Landing Page: Bespoke — VIP Private Travel & Luxury Concierge Platform
 * 
 * Mengintegrasikan prinsip OOP BespokeConcierge dengan desain terbaru.
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
 */

require_once __DIR__ . '/BespokeConcierge.php';

// Inisialisasi Object BespokeConcierge (OOP Pertemuan 6)
$bespoke = new BespokeConcierge(
    suiteName: 'The Alpine Retreat: Zermatt & St. Moritz',
    destination: 'Zermatt & St. Moritz, Swiss',
    client: 'Lord Alexander Wright (VIP-8821)',
    status: 'Proposal Approved',
    totalCurated: '4 Vendor Premium Terverifikasi'
);

$suiteProfile = $bespoke->getSuiteProfile();
$quickStats   = $bespoke->getStats();
?>
<!DOCTYPE html>

<html class="dark scroll-smooth" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Bespoke — VIP Private Travel &amp; Luxury Concierge Platform</title>
<meta content="Ultra-luxurious private travel and concierge advisory for UHNWIs, family offices, and executives worldwide." name="description"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
    @layer base {
      html, body {
        margin: 0;
        padding: 0;
        background-color: #080e0b;
        color: #e2e8f0;
      }
      body { overscroll-behavior: none; }
    }
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #080e0b; }
    ::-webkit-scrollbar-thumb { background: #262b29; border-radius: 9999px; }
    ::-webkit-scrollbar-thumb:hover { background: #c5a059; }
    .gold-glow {
      box-shadow: 0 0 35px -5px rgba(197, 160, 89, 0.25);
    }
    .gold-glow-subtle {
      box-shadow: 0 0 20px -3px rgba(197, 160, 89, 0.12);
    }
    .text-gradient-gold {
      background: linear-gradient(135deg, #fcedc7 0%, #dfbe7e 45%, #bfa16b 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "obsidian": "#040806",
            "surface-dim": "#080e0b",
            "surface": "#0d1712",
            "surface-container": "#131e18",
            "surface-container-high": "#1b2821",
            "surface-container-highest": "#24332b",
            "gold-light": "#f6e4bb",
            "gold-bright": "#dfbe7e",
            "gold": "#c5a059",
            "gold-dark": "#9c7937",
            "ivory": "#fcfbf8",
            "slate-subtle": "#94a3b8",
            "outline-dim": "rgba(255, 255, 255, 0.08)",
            "outline-gold": "rgba(197, 160, 89, 0.3)"
          },
          fontFamily: {
            "serif": ["EB Garamond", "Cormorant Garamond", "serif"],
            "display": ["Cormorant Garamond", "EB Garamond", "serif"],
            "sans": ["DM Sans", "sans-serif"]
          }
        }
      }
    }
  </script>
</head>
<body class="bg-surface-dim font-sans text-slate-300 antialiased selection:bg-gold selection:text-obsidian">
<!-- ================= STICKY GLASSMORPHIC NAVBAR ================= -->
<header class="fixed top-0 left-0 right-0 z-50 bg-obsidian/80 backdrop-blur-xl border-b border-white/[0.08] transition-all duration-300">
<div class="max-w-7xl mx-auto h-20 px-6 lg:px-10 flex items-center justify-between">
<!-- Wordmark -->
<a class="flex items-center gap-3.5 group" href="#">
<div class="w-2.5 h-2.5 rounded-full bg-gold animate-pulse shadow-[0_0_10px_#dfbe7e]"></div>
<span class="font-serif text-2xl tracking-[0.28em] font-medium text-ivory group-hover:text-gold transition-colors duration-300">BESPOKE</span>
<span class="h-3.5 w-px bg-white/20"></span>
<span class="text-[10px] tracking-[0.25em] font-medium uppercase text-gold/90 px-2.5 py-0.5 rounded-full border border-gold/30 bg-gold/5">
          Private Concierge
        </span>
</a>
<!-- Center Links -->
<nav class="hidden xl:flex items-center gap-8">
<a class="text-xs uppercase tracking-[0.2em] text-slate-300 hover:text-gold transition-colors duration-200" href="#experiences">Curated Destinations</a>
<a class="text-xs uppercase tracking-[0.2em] text-slate-300 hover:text-gold transition-colors duration-200" href="#aviation">Fleet &amp; Aviation</a>
<a class="text-xs uppercase tracking-[0.2em] text-slate-300 hover:text-gold transition-colors duration-200" href="#workflow">Bespoke Process</a>
<a class="text-xs uppercase tracking-[0.2em] text-slate-300 hover:text-gold transition-colors duration-200" href="#membership">Membership</a>
<a class="text-xs uppercase tracking-[0.2em] text-slate-300 hover:text-gold transition-colors duration-200" href="#advantage">The Standard</a>
</nav>
<!-- Right CTAs -->
<div class="flex items-center gap-4 sm:gap-6">
<button class="text-xs uppercase tracking-[0.2em] text-slate-300 hover:text-ivory transition-colors flex items-center gap-1.5 py-2" onclick="toggleModal(true)">
<span class="material-symbols-outlined text-sm text-gold">lock</span>
<span class="hidden sm:inline">VIP Portal</span>
</button>
<a class="relative group overflow-hidden px-5 py-2.5 rounded-sm bg-gradient-to-r from-gold via-gold-bright to-gold text-obsidian text-xs uppercase tracking-[0.22em] font-semibold hover:shadow-[0_0_25px_rgba(223,190,126,0.5)] transition-all duration-300" href="#consultation">
<span class="relative z-10">Private Consult</span>
</a>
</div>
</div>
</header>
<main class="w-full pt-20">
<!-- ================= HERO SECTION ================= -->
<section class="relative min-h-[92vh] flex items-center justify-center overflow-hidden px-6 lg:px-12 py-16 lg:py-24 border-b border-white/[0.06]">
<!-- Background Ambient Glow & Architectural Grid -->
<div class="absolute inset-0 pointer-events-none">
<div class="absolute -top-40 left-1/4 w-[600px] h-[600px] bg-gold/10 rounded-full blur-[140px]"></div>
<div class="absolute bottom-10 right-10 w-[500px] h-[500px] bg-emerald-950/20 rounded-full blur-[120px]"></div>
<div class="w-full h-full opacity-[0.03]" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 36px 36px;"></div>
</div>
<div class="max-w-7xl mx-auto w-full relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
<!-- Left Hero Copy -->
<div class="lg:col-span-7 space-y-7">
<div class="inline-flex items-center gap-3 px-4 py-1.5 rounded-full bg-white/[0.04] border border-gold/30 backdrop-blur-md">
<span class="text-gold text-xs">✦</span>
<span class="text-[11px] font-medium uppercase tracking-[0.24em] text-gold-light">
              Private Aviation &amp; Exclusive Island Estates — B2B / White-Label
            </span>
</div>
<h1 class="font-serif text-4xl sm:text-6xl lg:text-[70px] lg:leading-[1.1] text-ivory font-normal tracking-tight">
            Every Extraordinary Journey, <br class="hidden sm:inline"/>
<span class="italic font-light text-gradient-gold">Curated Without Compromise.</span>
</h1>
<p class="text-slate-300 text-base sm:text-lg max-w-xl font-light leading-relaxed">
            Bespoke unites every facet of high-end travel — private jet charters, superyachts, discreet villas, and dedicated 24/7 personal concierges — into one seamless private ecosystem.
          </p>
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
<a class="px-8 py-4 rounded-sm bg-gradient-to-r from-gold via-gold-bright to-gold text-obsidian text-xs uppercase tracking-[0.25em] font-semibold text-center hover:translate-y-[-2px] hover:shadow-[0_10px_30px_rgba(197,160,89,0.35)] transition-all duration-300" href="#consultation">
              Curate Your Itinerary
            </a>
<a class="px-8 py-4 rounded-sm bg-white/[0.03] border border-white/15 hover:border-gold/60 text-ivory text-xs uppercase tracking-[0.25em] font-medium text-center backdrop-blur-sm transition-all duration-300 group flex items-center justify-center gap-2" href="#experiences">
<span>Explore 2027 Portfolio</span>
<span class="material-symbols-outlined text-sm text-gold transition-transform group-hover:translate-y-0.5">south</span>
</a>
</div>
<div class="pt-6 border-t border-white/[0.08] flex items-center gap-8 text-xs text-slate-400">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-gold text-base">verified</span>
<span>Swiss Fiduciary Discretion</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-gold text-base">security</span>
<span>Strict Mutual NDA</span>
</div>
<div class="hidden sm:flex items-center gap-2">
<span class="material-symbols-outlined text-gold text-base">schedule</span>
<span>24/7 Global Dispatch</span>
</div>
</div>
</div>
<!-- Right Live Concierge Itinerary Preview Card -->
<div class="lg:col-span-5">
<div class="relative rounded-2xl bg-gradient-to-b from-surface-container/90 to-obsidian/90 p-7 sm:p-8 border border-gold/30 backdrop-blur-2xl gold-glow shadow-2xl space-y-6">
<!-- Card Header -->
<div class="flex items-center justify-between pb-5 border-b border-white/[0.08]">
<div class="space-y-1">
<div class="text-[10px] uppercase tracking-[0.25em] text-gold font-semibold">Live Concierge Itinerary Preview</div>
<div class="text-xs text-slate-400">Dossier REF: #VIP-CH-8820 (OOP Active)</div>
</div>
<div class="flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30">
<span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
<span class="text-[10px] uppercase tracking-widest text-emerald-300 font-medium"><?= htmlspecialchars($suiteProfile['status']) ?></span>
</div>
</div>
<!-- Route & Asset Details -->
<div class="space-y-3">
<div class="flex justify-between items-baseline">
<span class="font-serif text-xl sm:text-2xl text-ivory font-medium"><?= htmlspecialchars($suiteProfile['suiteName']) ?></span>
<span class="text-xs text-gold font-sans font-medium">7 Nights</span>
</div>
<p class="text-xs text-slate-300 leading-relaxed">
                Direct apron boarding via Geneva FBO to St. Moritz heli-corridor. Exclusive private estate sanctuary with private sommelier and FIS mountain guide.
              </p>
</div>
<!-- Asset Badges Grid -->
<div class="grid grid-cols-2 gap-3 pt-1">
<div class="p-3 rounded-lg bg-white/[0.02] border border-white/[0.06] space-y-1">
<span class="text-[9px] uppercase tracking-widest text-slate-400 block">Air Asset</span>
<span class="text-xs text-ivory font-medium flex items-center gap-1.5">
<span class="material-symbols-outlined text-gold text-sm">flight</span> Gulfstream G650ER
                </span>
</div>
<div class="p-3 rounded-lg bg-white/[0.02] border border-white/[0.06] space-y-1">
<span class="text-[9px] uppercase tracking-widest text-slate-400 block">Private Residence</span>
<span class="text-xs text-ivory font-medium flex items-center gap-1.5">
<span class="material-symbols-outlined text-gold text-sm">villa</span> Chalet Zermatt Peak
                </span>
</div>
</div>
<!-- Interactive Timeline Steps -->
<div class="space-y-2 pt-2">
<div class="text-[10px] uppercase tracking-[0.2em] text-slate-400">Itinerary Orchestration</div>
<div class="flex items-center gap-2 overflow-x-auto pb-1 text-[11px]">
<span class="px-2.5 py-1 rounded bg-gold/15 text-gold-light border border-gold/40 whitespace-nowrap">Day 1: LSGG Apron VIP</span>
<span class="text-white/20">→</span>
<span class="px-2.5 py-1 rounded bg-white/[0.04] text-slate-300 border border-white/10 whitespace-nowrap">Day 2: Heliskiing</span>
<span class="text-white/20">→</span>
<span class="px-2.5 py-1 rounded bg-white/[0.04] text-slate-300 border border-white/10 whitespace-nowrap">Day 5: Caviar Gala</span>
</div>
</div>
<!-- Footer Details: Advisor + SLA -->
<div class="pt-4 border-t border-white/[0.08] flex items-center justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-full bg-gradient-to-tr from-gold-dark to-gold flex items-center justify-center text-obsidian font-serif font-bold text-sm">
                  MV
                </div>
<div>
<div class="text-xs font-medium text-ivory">Marc-André V.</div>
<div class="text-[10px] text-gold tracking-wider">Senior Partner · Geneva Desk</div>
</div>
</div>
<div class="text-right">
<div class="text-[10px] text-slate-400 uppercase tracking-widest">Guaranteed SLA</div>
<div class="text-xs font-semibold text-emerald-400">&lt; 12 Mins Response</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- ================= TRUST & KEY METRICS BAR ================= -->
<section class="w-full bg-obsidian py-12 border-b border-white/[0.08]">
<div class="max-w-7xl mx-auto px-6 lg:px-12 grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-12">
<div class="space-y-1.5 text-center md:text-left">
<div class="font-serif text-3xl sm:text-4xl lg:text-5xl text-gradient-gold">150+</div>
<div class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">Private Jet Hubs &amp; FBOs</div>
</div>
<div class="space-y-1.5 text-center md:text-left border-l border-white/[0.06] pl-6 md:pl-8">
<div class="font-serif text-3xl sm:text-4xl lg:text-5xl text-gradient-gold">&lt; 15 Mins</div>
<div class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">Guaranteed SLA Response</div>
</div>
<div class="space-y-1.5 text-center md:text-left border-l border-white/[0.06] pl-6 md:pl-8">
<div class="font-serif text-3xl sm:text-4xl lg:text-5xl text-gradient-gold">100%</div>
<div class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">End-to-End NDA Privacy</div>
</div>
<div class="space-y-1.5 text-center md:text-left border-l border-white/[0.06] pl-6 md:pl-8">
<div class="font-serif text-3xl sm:text-4xl lg:text-5xl text-gradient-gold">$500M+</div>
<div class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">Curated Asset Portfolio</div>
</div>
</div>
</section>
<!-- ================= CURATED SIGNATURE EXPERIENCES ================= -->
<section class="w-full px-6 lg:px-12 py-24 lg:py-32 bg-surface-dim" id="experiences">
<div class="max-w-7xl mx-auto space-y-14">
<!-- Header & Category Filter Tabs -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8 pb-4">
<div class="space-y-3">
<span class="text-xs uppercase tracking-[0.28em] text-gold font-medium">Selected 2026–2027 Portfolio</span>
<h2 class="font-serif text-3xl sm:text-5xl text-ivory">Curated Signature Experiences</h2>
<p class="text-sm text-slate-400 max-w-xl">Every destination vetted for absolute solitude, bespoke sovereign access, and high-altitude or oceanic luxury.</p>
</div>
<!-- Filter Tabs -->
<div class="flex flex-wrap items-center gap-2 p-1.5 rounded-lg bg-surface border border-white/[0.08]" id="filterTabs">
<button class="filter-btn active px-4 py-2 text-xs uppercase tracking-wider rounded font-medium transition-all bg-gold text-obsidian shadow-sm">All</button>
<button class="filter-btn px-4 py-2 text-xs uppercase tracking-wider rounded font-medium text-slate-300 hover:text-white hover:bg-white/[0.05] transition-all">Private Aviation</button>
<button class="filter-btn px-4 py-2 text-xs uppercase tracking-wider rounded font-medium text-slate-300 hover:text-white hover:bg-white/[0.05] transition-all">Superyachts</button>
<button class="filter-btn px-4 py-2 text-xs uppercase tracking-wider rounded font-medium text-slate-300 hover:text-white hover:bg-white/[0.05] transition-all">Alpine Chalets</button>
<button class="filter-btn px-4 py-2 text-xs uppercase tracking-wider rounded font-medium text-slate-300 hover:text-white hover:bg-white/[0.05] transition-all">Cultural Sanctuaries</button>
</div>
</div>
<!-- Cards Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
<!-- Card 1 -->
<article class="group rounded-xl overflow-hidden bg-surface border border-white/[0.08] hover:border-gold/40 transition-all duration-500 hover:shadow-[0_15px_35px_rgba(0,0,0,0.6)] flex flex-col">
<div class="relative aspect-[16/10] overflow-hidden bg-obsidian">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Chalet in Engadin valley St Moritz winter twilight interior glow modern glass architecture surrounded by snowy pines" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCi94rZfSAWbhdj8vbItyYADutLhWJhXHZFRjI6V5xg5mPRSbOsXJnqOZm-XMdahRkndjaCeTKKxV3vL1jTB3VvtPoo7Yhyyj_cBTfBYeI8maW9qzlo2h9tu9PtBtt9gYtZ0K-Pq5lsg12B3VcaP-s9Bos2CkUMSgA-f5yZ4raMTgDRrjtvuHI_R5OGfYrcdOaW85kNlWx2wYw_J7Hpkyh4hF4Iqgmsh8INSf2pijib"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent opacity-80"></div>
<div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3.5 py-1 text-gold text-[10px] uppercase tracking-widest rounded border border-gold/30">
                Alpine Chalets &amp; Heliski
              </div>
<div class="absolute bottom-4 right-4 bg-obsidian/90 px-3 py-1 text-[10px] tracking-widest text-slate-300 rounded font-mono">
                SAMEDAN / LSZS
              </div>
</div>
<div class="p-8 flex flex-col justify-between flex-1 space-y-6">
<div class="space-y-3">
<h3 class="font-serif text-2xl text-ivory group-hover:text-gold-bright transition-colors">
                  St. Moritz Glacier &amp; Chalet Zermatt Peak
                </h3>
<p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                  Direct helicopter glacier drop, dedicated Michelin-trained private chef, and ski-in seclusion across private alpine corridors inaccessible to commercial traffic.
                </p>
</div>
<div class="pt-4 border-t border-white/[0.08] flex items-center justify-between">
<span class="text-[11px] uppercase tracking-widest text-slate-400">Swiss Alps · 7 Suites · Private Wellness Spa</span>
<a class="text-xs uppercase tracking-[0.2em] text-gold hover:text-ivory transition-colors flex items-center gap-1" href="#consultation">
<span>Explore Itinerary</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Card 2 -->
<article class="group rounded-xl overflow-hidden bg-surface border border-white/[0.08] hover:border-gold/40 transition-all duration-500 hover:shadow-[0_15px_35px_rgba(0,0,0,0.6)] flex flex-col">
<div class="relative aspect-[16/10] overflow-hidden bg-obsidian">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Elegant superyacht anchored in crystal turquoise Mediterranean bay near rocky coastline" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDidQKQ9BEiqxEEZZ9zwR2v7XYKQA9IKAuzj1BiwNiNcIfarAOgyR-3csskRaeX-drCppHDcd0svVGITO82j48dhqlx_9h_laF33ujBNXlPP_9gyLYJhdQB519mb1QOmugnZ4CxVICEsgOfg_6me5TqTKIpDMNfPZ3EkHVrLxgFMfq5gsVxmRtB0_E7hl7tZdLm8_HEGBhX9DleFHC47qa__VLZU0JT1w-ePP_C2ybb"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent opacity-80"></div>
<div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3.5 py-1 text-gold text-[10px] uppercase tracking-widest rounded border border-gold/30">
                Superyacht Charter
              </div>
<div class="absolute bottom-4 right-4 bg-obsidian/90 px-3 py-1 text-[10px] tracking-widest text-slate-300 rounded font-mono">
                PORT HERCULE // BERTH A
              </div>
</div>
<div class="p-8 flex flex-col justify-between flex-1 space-y-6">
<div class="space-y-3">
<h3 class="font-serif text-2xl text-ivory group-hover:text-gold-bright transition-colors">
                  Monaco Grand Prix Superyacht Charter
                </h3>
<p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                  Trackside Zone 1 Berth in Port Hercule with direct tender transfers, custom helicopter shuttles from Nice Côte d'Azur FBO, and sommelier-curated onboard galas.
                </p>
</div>
<div class="pt-4 border-t border-white/[0.08] flex items-center justify-between">
<span class="text-[11px] uppercase tracking-widest text-slate-400">French Riviera · 65M Vessel · 14 Guests</span>
<a class="text-xs uppercase tracking-[0.2em] text-gold hover:text-ivory transition-colors flex items-center gap-1" href="#consultation">
<span>Explore Itinerary</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Card 3 -->
<article class="group rounded-xl overflow-hidden bg-surface border border-white/[0.08] hover:border-gold/40 transition-all duration-500 hover:shadow-[0_15px_35px_rgba(0,0,0,0.6)] flex flex-col">
<div class="relative aspect-[16/10] overflow-hidden bg-obsidian">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Traditional Japanese wooden machiya courtyard with moss garden and quiet bamboo serenity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAihTqojf3t7wunv_kRXj7XE0QXydxcnjdswlEg6C3jw0sRRcgHGlKMhTfs5k_Ac6JvVRcsc-6Av2OAdR1sDxp0rp7yusNy2FdKkVp5gSygR5AWxsAb9Tidb3dbzpamVf0zaRfRa7JL0UwoeDU0qFSX2kYcovNQKIXWWvUyD7pGEAZLeTccVTjixsC0qujmGbdhJtfyH_p6CCLFAE09TfndNk4sflmuOJJjskyjDUE"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent opacity-80"></div>
<div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3.5 py-1 text-gold text-[10px] uppercase tracking-widest rounded border border-gold/30">
                Cultural Sanctuaries
              </div>
<div class="absolute bottom-4 right-4 bg-obsidian/90 px-3 py-1 text-[10px] tracking-widest text-slate-300 rounded font-mono">
                KYOTO // CLOSED TEMPLE
              </div>
</div>
<div class="p-8 flex flex-col justify-between flex-1 space-y-6">
<div class="space-y-3">
<h3 class="font-serif text-2xl text-ivory group-hover:text-gold-bright transition-colors">
                  Private Machiya &amp; Amanemu Sanctuary
                </h3>
<p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                  Privately unescorted temple tea ceremonies at midnight, restored 200-year-old Machiya residence, and private thermal onsen pavilions over Ago Bay.
                </p>
</div>
<div class="pt-4 border-t border-white/[0.08] flex items-center justify-between">
<span class="text-[11px] uppercase tracking-widest text-slate-400">Kyoto &amp; Ise-Shima · Private Kaiseki Master</span>
<a class="text-xs uppercase tracking-[0.2em] text-gold hover:text-ivory transition-colors flex items-center gap-1" href="#consultation">
<span>Explore Itinerary</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</article>
<!-- Card 4 -->
<article class="group rounded-xl overflow-hidden bg-surface border border-white/[0.08] hover:border-gold/40 transition-all duration-500 hover:shadow-[0_15px_35px_rgba(0,0,0,0.6)] flex flex-col">
<div class="relative aspect-[16/10] overflow-hidden bg-obsidian">
<img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Serengeti vast plains with private aviation twin engine aircraft on gravel runway at sunset" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA4SI5-M-CF74ipJBM49mkhc52uNy2LrnFPs2HFmYk4qLYbtwGUDLm7rllc-zk433DE6fcDvlGbz-AP4HPWa8D1qH4h6ypDjx2wrByr6DotpHjSiZp3OZX9g2x-6sYpNDQViHA7lH12tj97soDf0V-0NKNZZAKhnvx9qa18YJQXACdfqb2JbXIVVq2Yxm_bPnfElYR4KAfktmJK4QlwhEJ-N2i0CUvRxRO73qqqwj4"/>
<div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent opacity-80"></div>
<div class="absolute top-4 left-4 bg-obsidian/80 backdrop-blur-md px-3.5 py-1 text-gold text-[10px] uppercase tracking-widest rounded border border-gold/30">
                Private Aviation Safari
              </div>
<div class="absolute bottom-4 right-4 bg-obsidian/90 px-3 py-1 text-[10px] tracking-widest text-slate-300 rounded font-mono">
                SERONERA // PRIVATE AIRSTRIP
              </div>
</div>
<div class="p-8 flex flex-col justify-between flex-1 space-y-6">
<div class="space-y-3">
<h3 class="font-serif text-2xl text-ivory group-hover:text-gold-bright transition-colors">
                  Singita Serengeti Luxury Flying Safari
                </h3>
<p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
                  Dedicated Pilatus PC-12 bush asset on standby, private 350,000-acre Grumeti reserve buyout, sunrise hot-air champagne ballooning, and armed field conservationists.
                </p>
</div>
<div class="pt-4 border-t border-white/[0.08] flex items-center justify-between">
<span class="text-[11px] uppercase tracking-widest text-slate-400">Tanzania · Exclusive Reserve · Dedicated Bush Pilot</span>
<a class="text-xs uppercase tracking-[0.2em] text-gold hover:text-ivory transition-colors flex items-center gap-1" href="#consultation">
<span>Explore Itinerary</span>
<span class="material-symbols-outlined text-sm">arrow_forward</span>
</a>
</div>
</div>
</article>
</div>
</div>
</section>
<!-- ================= THE BESPOKE ADVANTAGE (PROBLEM VS SOLUTION) ================= -->
<section class="w-full px-6 lg:px-12 py-24 bg-obsidian border-y border-white/[0.06]" id="advantage">
<div class="max-w-7xl mx-auto space-y-16">
<div class="text-center max-w-3xl mx-auto space-y-3">
<span class="text-xs uppercase tracking-[0.28em] text-gold font-semibold">Architectural Rigor</span>
<h2 class="font-serif text-3xl sm:text-5xl text-ivory">The Bespoke Advantage</h2>
<p class="text-sm sm:text-base text-slate-400">Why UHNW individuals and single-family offices abandon conventional fragmented luxury brokers.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
<!-- Fragmented Booking Card -->
<div class="p-8 sm:p-10 rounded-2xl bg-surface-container/40 border border-red-500/20 space-y-6">
<div class="flex items-center justify-between pb-4 border-b border-red-500/20">
<span class="text-xs uppercase tracking-widest text-red-400 font-medium">Conventional Friction</span>
<span class="material-symbols-outlined text-red-400">warning</span>
</div>
<h3 class="font-serif text-2xl text-slate-200">The Fragmented Booking Dilemma</h3>
<ul class="space-y-4 text-xs sm:text-sm text-slate-400 leading-relaxed">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-red-400/80 text-base mt-0.5">close</span>
<span><strong>5+ Independent Brokers:</strong> Juggling separate aviation brokers, yacht agents, concierge reps, and villa managers with zero mutual synchronization.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-red-400/80 text-base mt-0.5">close</span>
<span><strong>Exposed Privacy Leaks:</strong> Passenger manifests shared over unsecured commercial email threads and multi-tier third-party databases.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-red-400/80 text-base mt-0.5">close</span>
<span><strong>Impersonal Call Desks:</strong> Shuffled to generic call-center attendants when flight weather diversions or slot delays occur.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-red-400/80 text-base mt-0.5">close</span>
<span><strong>Opaque Markups:</strong> Arbitrary intermediary fees tacked onto aviation empty legs and charter leases.</span>
</li>
</ul>
</div>
<!-- Unified Bespoke Standard Card -->
<div class="p-8 sm:p-10 rounded-2xl bg-gradient-to-b from-surface-container to-surface border border-gold/40 gold-glow space-y-6">
<div class="flex items-center justify-between pb-4 border-b border-gold/30">
<span class="text-xs uppercase tracking-widest text-gold font-medium">Unified Private Advisory</span>
<span class="material-symbols-outlined text-gold">verified</span>
</div>
<h3 class="font-serif text-2xl text-ivory">The Unified Bespoke Standard</h3>
<ul class="space-y-4 text-xs sm:text-sm text-slate-300 leading-relaxed">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-gold text-base mt-0.5">check</span>
<span><strong>Single Dedicated Senior Partner:</strong> One accountable Swiss partner managing your profile from wheels-up to final return.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-gold text-base mt-0.5">check</span>
<span><strong>Encrypted Sovereign Dossier:</strong> Zero third-party indexing. Passports, manifests, and schedules encrypted behind Swiss statutory privacy walls.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-gold text-base mt-0.5">check</span>
<span><strong>Instant Verified Tail &amp; Berth Allocations:</strong> Direct operator access ensures authentic tail verification, short-field permits, and prime harbor slots.</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-gold text-base mt-0.5">check</span>
<span><strong>Proactive 24/7 Butler &amp; Flight Dispatch:</strong> Automatic secondary aircraft contingency standby and tarmac apron VIP clearance.</span>
</li>
</ul>
</div>
</div>
</div>
</section>
<!-- ================= THE 3-STEP JOURNEY WORKFLOW ================= -->
<section class="w-full px-6 lg:px-12 py-24 lg:py-32 bg-surface-dim" id="workflow">
<div class="max-w-7xl mx-auto space-y-16">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-white/[0.08]">
<div class="space-y-2">
<span class="text-xs uppercase tracking-[0.28em] text-gold font-semibold">Trajectory</span>
<h2 class="font-serif text-3xl sm:text-5xl text-ivory">The 3-Step Journey Workflow</h2>
</div>
<p class="text-xs sm:text-sm text-slate-400 max-w-sm">Crafted to ensure zero operational oversight and uncompromising personal discretion.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<!-- Step 1 -->
<div class="p-8 rounded-xl bg-surface border border-white/[0.08] hover:border-gold/40 transition-all space-y-5 flex flex-col justify-between">
<div class="space-y-4">
<div class="flex items-center justify-between">
<span class="font-serif text-2xl text-gradient-gold font-bold">01</span>
<span class="text-[10px] uppercase tracking-widest text-slate-400 font-mono">INITIATION</span>
</div>
<h3 class="font-serif text-xl text-ivory">Private Briefing &amp; Lifestyle Preference Profiling</h3>
<p class="text-xs text-slate-300 leading-relaxed font-light">
                Confidential consultation exploring family cadence, dietary parameters, cabin atmosphere preferences, ground protection details, and aircraft tail preferences under executed NDA.
              </p>
</div>
<div class="pt-4 border-t border-white/[0.08] text-[11px] text-gold tracking-wider">
              Turnaround: 24 Hours
            </div>
</div>
<!-- Step 2 -->
<div class="p-8 rounded-xl bg-surface border border-white/[0.08] hover:border-gold/40 transition-all space-y-5 flex flex-col justify-between">
<div class="space-y-4">
<div class="flex items-center justify-between">
<span class="font-serif text-2xl text-gradient-gold font-bold">02</span>
<span class="text-[10px] uppercase tracking-widest text-slate-400 font-mono">ARCHITECTURE</span>
</div>
<h3 class="font-serif text-xl text-ivory">Tailored Proposal &amp; Discreet Asset Curation</h3>
<p class="text-xs text-slate-300 leading-relaxed font-light">
                Tail numbers locked, private berths allocated in Monaco or St. Barth, estate buyouts verified, and dual contingency alternate air routes chartered to prevent slot volatility.
              </p>
</div>
<div class="pt-4 border-t border-white/[0.08] text-[11px] text-gold tracking-wider">
              Delivery: 48 - 72 Hours
            </div>
</div>
<!-- Step 3 -->
<div class="p-8 rounded-xl bg-surface border border-white/[0.08] hover:border-gold/40 transition-all space-y-5 flex flex-col justify-between">
<div class="space-y-4">
<div class="flex items-center justify-between">
<span class="font-serif text-2xl text-gradient-gold font-bold">03</span>
<span class="text-[10px] uppercase tracking-widest text-slate-400 font-mono">FULFILLMENT</span>
</div>
<h3 class="font-serif text-xl text-ivory">Seamless VIP Execution &amp; 24/7 Live Butler Oversight</h3>
<p class="text-xs text-slate-300 leading-relaxed font-light">
                Real-time satellite flight watch, tarmac-side VIP diplomatic customs clearance, and direct uninhibited liaison with personal estate head stewards and yacht captains.
              </p>
</div>
<div class="pt-4 border-t border-white/[0.08] text-[11px] text-gold tracking-wider">
              Active: Continuous 24/7 Dispatch
            </div>
</div>
</div>
</div>
</section>
<!-- ================= AVIATION FLEET SPECIFICATION STRIP ================= -->
<section class="w-full px-6 lg:px-12 py-16 bg-obsidian" id="aviation">
<div class="max-w-7xl mx-auto rounded-2xl bg-surface p-8 lg:p-12 border border-white/[0.08] space-y-8">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-6 border-b border-white/[0.08]">
<div class="space-y-1">
<span class="text-xs uppercase tracking-[0.25em] text-gold font-medium">Aviation Network</span>
<h3 class="font-serif text-2xl sm:text-3xl text-ivory">Intercontinental Long-Range Readiness</h3>
</div>
<div class="flex items-center gap-3">
<span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
<span class="text-xs text-slate-300 tracking-wider">Fleet Status: Immediate Global Slot Clearance</span>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="p-5 rounded-lg bg-surface-dim border border-white/[0.04] space-y-2">
<div class="text-ivory font-serif text-xl">Bombardier Global 7500</div>
<div class="text-xs text-slate-300">Range: 7,700 nm · Geneva to Tokyo Non-Stop</div>
<div class="text-[11px] text-gold font-mono">Crew: 2 Pilots, 1 In-Flight Butler · Master Suite with Bed</div>
</div>
<div class="p-5 rounded-lg bg-surface-dim border border-white/[0.04] space-y-2">
<div class="text-ivory font-serif text-xl">Gulfstream G650ER</div>
<div class="text-xs text-slate-300">Range: 7,500 nm · London to Singapore Direct</div>
<div class="text-[11px] text-gold font-mono">Ultra-low Cabin Altitude: 3,000 ft at FL450 · Ka-band Wi-Fi</div>
</div>
<div class="p-5 rounded-lg bg-surface-dim border border-white/[0.04] space-y-2">
<div class="text-ivory font-serif text-xl">Dassault Falcon 8X</div>
<div class="text-xs text-slate-300">Range: 6,450 nm · Steep Approach: London City &amp; St. Moritz</div>
<div class="text-[11px] text-gold font-mono">Tri-Jet Short Field Performance · Quietest Cabin in Class</div>
</div>
</div>
</div>
</section>
<!-- ================= MEMBERSHIP TIERS & ACCESS SUITE ================= -->
<section class="w-full px-6 lg:px-12 py-24 lg:py-32 bg-surface-dim" id="membership">
<div class="max-w-7xl mx-auto space-y-16">
<div class="text-center max-w-2xl mx-auto space-y-3">
<span class="text-xs uppercase tracking-[0.28em] text-gold font-semibold">Tiers of Stewardship</span>
<h2 class="font-serif text-3xl sm:text-5xl text-ivory">Membership &amp; Access Suite</h2>
<p class="text-sm text-slate-400">Strictly capped client roster ensuring our Managing Partners never compromise operational agility.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Tier 1 -->
<div class="p-8 rounded-2xl bg-surface border border-white/[0.08] flex flex-col justify-between space-y-8 hover:border-white/20 transition-all">
<div class="space-y-6">
<div class="space-y-2">
<span class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Corporate &amp; Executive</span>
<h3 class="font-serif text-2xl text-ivory">Executive Private Access</h3>
<p class="text-xs text-slate-300 leading-relaxed font-light">
                  Engineered for active executives and frequent transcontinental flyers requiring rapid on-demand aviation booking and priority villa allocations.
                </p>
</div>
<div class="pt-4 border-t border-white/[0.08] space-y-3 text-xs text-slate-300">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>On-demand private jet charter dispatch</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Priority access to vetted luxury estates</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Guaranteed 2-hour concierge response SLA</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Encrypted client portal access</span>
</div>
</div>
</div>
<a class="w-full py-3.5 rounded bg-white/[0.05] hover:bg-white/[0.1] text-ivory text-xs uppercase tracking-[0.2em] font-medium text-center transition-all" href="#consultation">
              Apply For Access
            </a>
</div>
<!-- Tier 2 (Most Popular) -->
<div class="relative p-8 rounded-2xl bg-gradient-to-b from-surface-container to-surface border-2 border-gold gold-glow flex flex-col justify-between space-y-8">
<div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-gold via-gold-bright to-gold text-obsidian text-[10px] uppercase font-bold tracking-widest px-4 py-1 rounded-full shadow">
              Most Selected
            </div>
<div class="space-y-6">
<div class="space-y-2 pt-2">
<span class="text-[10px] uppercase tracking-widest text-gold font-semibold">Family Office &amp; Principals</span>
<h3 class="font-serif text-2xl text-ivory">Presidential Suite Charter</h3>
<p class="text-xs text-slate-200 leading-relaxed font-light">
                  Complete white-glove advisory for high-net-worth families with complex multi-destination itineraries, superyacht charters, and discrete security.
                </p>
</div>
<div class="pt-4 border-t border-gold/30 space-y-3 text-xs text-slate-200">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span><strong>Dedicated Managing Partner</strong> assigned</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span><strong>&lt; 15-Minute Response SLA</strong> 24/7/365</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Guaranteed Monaco &amp; St. Barth yacht berths</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Dual contingency aircraft on standby</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Apron-side VIP customs clearance</span>
</div>
</div>
</div>
<a class="w-full py-3.5 rounded bg-gradient-to-r from-gold via-gold-bright to-gold text-obsidian text-xs uppercase tracking-[0.2em] font-semibold text-center hover:shadow-[0_0_20px_rgba(223,190,126,0.4)] transition-all" href="#consultation">
              Initiate Retainer Consult
            </a>
</div>
<!-- Tier 3 (Black Diamond) -->
<div class="p-8 rounded-2xl bg-surface border border-white/[0.08] flex flex-col justify-between space-y-8 hover:border-gold/30 transition-all">
<div class="space-y-6">
<div class="space-y-2">
<span class="text-[10px] uppercase tracking-widest text-slate-400 font-semibold">Invitation Only</span>
<h3 class="font-serif text-2xl text-ivory">Black Diamond Sovereign</h3>
<p class="text-xs text-slate-300 leading-relaxed font-light">
                  Unrestricted worldwide bespoke authority. Reserved for sovereign families, heads of state, and individuals requiring maximum anonymity and diplomatic protocol.
                </p>
</div>
<div class="pt-4 border-t border-white/[0.08] space-y-3 text-xs text-slate-300">
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Unrestricted worldwide asset holdings</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Sovereign encrypted communications</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Diplomatic liaison &amp; close protection fleet</span>
</div>
<div class="flex items-center gap-2.5">
<span class="material-symbols-outlined text-gold text-sm">check_circle</span>
<span>Closed-door private island acquisitions</span>
</div>
</div>
</div>
<button class="w-full py-3.5 rounded bg-white/[0.05] hover:bg-white/[0.1] text-ivory text-xs uppercase tracking-[0.2em] font-medium text-center transition-all" onclick="toggleModal(true)">
              Request Sovereign Vetting
            </button>
</div>
</div>
</div>
</section>
<!-- ================= DISCREET CLIENT TESTIMONIALS ================= -->
<section class="w-full px-6 lg:px-12 py-24 bg-obsidian border-b border-white/[0.06]">
<div class="max-w-7xl mx-auto space-y-14">
<div class="text-center max-w-xl mx-auto space-y-2">
<span class="text-xs uppercase tracking-[0.28em] text-gold font-semibold">Testimonials</span>
<h2 class="font-serif text-3xl sm:text-4xl text-ivory">Discreet Client Endorsements</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="p-8 rounded-xl bg-surface border border-white/[0.08] space-y-5">
<div class="text-gold text-lg">“</div>
<p class="text-xs sm:text-sm text-slate-300 italic leading-relaxed">
              When weather closed the Engadin corridor in January, Bespoke rerouted our Global 7500 to Milan and had private helicopters waiting before we even received the control tower advisory. Flawless execution.
            </p>
<div class="pt-4 border-t border-white/[0.08]">
<div class="text-xs font-semibold text-ivory">Family Office Principal</div>
<div class="text-[10px] text-gold uppercase tracking-wider">Zurich, Switzerland</div>
</div>
</div>
<div class="p-8 rounded-xl bg-surface border border-white/[0.08] space-y-5">
<div class="text-gold text-lg">“</div>
<p class="text-xs sm:text-sm text-slate-300 italic leading-relaxed">
              Securing our Monaco Grand Prix yacht berth alongside immediate diplomatic customs clearance in Nice saved our executive team dozens of hours. The standard of confidentiality is unmatched.
            </p>
<div class="pt-4 border-t border-white/[0.08]">
<div class="text-xs font-semibold text-ivory">Global Tech Founder</div>
<div class="text-[10px] text-gold uppercase tracking-wider">London, United Kingdom</div>
</div>
</div>
<div class="p-8 rounded-xl bg-surface border border-white/[0.08] space-y-5">
<div class="text-gold text-lg">“</div>
<p class="text-xs sm:text-sm text-slate-300 italic leading-relaxed">
              Having a single Senior Partner who knows our security parameters, children's preferences, and tail requirements means we make one phone call and the entire journey simply materializes.
            </p>
<div class="pt-4 border-t border-white/[0.08]">
<div class="text-xs font-semibold text-ivory">Private Equity Chairman</div>
<div class="text-[10px] text-gold uppercase tracking-wider">Geneva, Switzerland</div>
</div>
</div>
</div>
</div>
</section>
<!-- ================= PRIVATE INQUIRY & HIGH CONVERSION BANNER ================= -->
<section class="w-full px-6 lg:px-12 py-24 lg:py-32 bg-surface-dim" id="consultation">
<div class="max-w-6xl mx-auto space-y-16">
<!-- High-End Champagne Callout Banner -->
<div class="relative overflow-hidden rounded-2xl p-8 sm:p-14 bg-gradient-to-r from-[#17251d] via-[#203328] to-[#17251d] border border-gold/40 gold-glow shadow-2xl flex flex-col lg:flex-row items-center justify-between gap-8">
<div class="space-y-3 text-center lg:text-left">
<span class="text-xs uppercase tracking-[0.25em] text-gold font-bold">Priority Family Registry</span>
<h3 class="font-serif text-3xl sm:text-4xl text-ivory">Accepting 12 New Family Portfolios for 2026</h3>
<p class="text-xs sm:text-sm text-slate-300 max-w-xl">
              Connect directly with our Swiss Senior Partners to initiate your confidential travel profile or audit existing charter efficiencies.
            </p>
</div>
<a class="px-8 py-4 rounded-sm bg-gradient-to-r from-gold via-gold-bright to-gold text-obsidian text-xs uppercase tracking-[0.25em] font-semibold whitespace-nowrap hover:shadow-[0_0_25px_rgba(223,190,126,0.6)] transition-all" href="#consultForm">
            Schedule Private Consult
          </a>
</div>
<!-- Consultation Form Grid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 pt-6">
<div class="lg:col-span-5 space-y-6">
<span class="text-xs uppercase tracking-[0.28em] text-gold font-semibold">Direct Intake Desk</span>
<h2 class="font-serif text-3xl sm:text-5xl text-ivory">Initiate Advisory Consultation</h2>
<p class="text-xs sm:text-sm text-slate-300 leading-relaxed font-light">
              All inquiries received under Swiss fiduciary discretion. A Managing Partner responds via Signal, encrypted phone, or private email within 12 hours.
            </p>
<div class="pt-6 border-t border-white/[0.08] space-y-4 text-xs text-slate-300">
<div>
<span class="text-ivory font-medium block">Executive Advisory Desk</span>
<span class="text-slate-400">concierge@bespoke-advisory.ch</span>
</div>
<div>
<span class="text-ivory font-medium block">Encrypted Signal &amp; Direct Wire</span>
<span class="text-slate-400">+41 22 819 09 00</span>
</div>
<div>
<span class="text-ivory font-medium block">Swiss Headquarters</span>
<span class="text-slate-400">Rue du Rhône 42, 1204 Geneva</span>
</div>
</div>
</div>
<div class="lg:col-span-7 p-8 sm:p-10 rounded-2xl bg-surface border border-white/[0.08] shadow-xl">
<form class="space-y-6" id="consultForm" onsubmit="event.preventDefault(); showSuccessState();">
<div class="space-y-2">
<label class="block text-[11px] uppercase tracking-wider text-slate-300" for="fullName">
                  Full Name / Family Office Representative
                </label>
<input class="w-full bg-surface-dim border border-white/10 rounded px-4 py-3 text-ivory text-xs sm:text-sm placeholder:text-slate-500 focus:outline-none focus:border-gold transition-colors" id="fullName" placeholder="e.g. Lord Sterling / Family Office Trustee" required="" type="text"/>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="block text-[11px] uppercase tracking-wider text-slate-300" for="contactEmail">
                    Encrypted Email Address
                  </label>
<input class="w-full bg-surface-dim border border-white/10 rounded px-4 py-3 text-ivory text-xs sm:text-sm placeholder:text-slate-500 focus:outline-none focus:border-gold transition-colors" id="contactEmail" placeholder="principal@domain.com" required="" type="email"/>
</div>
<div class="space-y-2">
<label class="block text-[11px] uppercase tracking-wider text-slate-300" for="phoneSignal">
                    Signal Number / Direct Line
                  </label>
<input class="w-full bg-surface-dim border border-white/10 rounded px-4 py-3 text-ivory text-xs sm:text-sm placeholder:text-slate-500 focus:outline-none focus:border-gold transition-colors" id="phoneSignal" placeholder="+41 ..." type="tel"/>
</div>
</div>
<div class="space-y-2">
<label class="block text-[11px] uppercase tracking-wider text-slate-300" for="scope">
                  Primary Scope of Engagement
                </label>
<select class="w-full bg-surface-dim border border-white/10 rounded px-4 py-3 text-ivory text-xs sm:text-sm focus:outline-none focus:border-gold transition-colors" id="scope">
<option value="multi-destination">Complex Multi-Destination Itinerary</option>
<option value="private-aviation">Private Jet Aviation Retainer</option>
<option value="superyacht">Superyacht Mediterranean/Caribbean Charter</option>
<option value="estate-buyout">Private Island or Alpine Estate Buyout</option>
<option value="annual-membership">Annual Family Office Retainer</option>
</select>
</div>
<div class="space-y-2">
<label class="block text-[11px] uppercase tracking-wider text-slate-300" for="details">
                  Preliminary Timing &amp; Route Parameters
                </label>
<textarea class="w-full bg-surface-dim border border-white/10 rounded px-4 py-3 text-ivory text-xs sm:text-sm placeholder:text-slate-500 focus:outline-none focus:border-gold transition-colors resize-none" id="details" placeholder="Anticipated travel window, passenger count, preferred aircraft or harbor destinations..." rows="3"></textarea>
</div>
<button class="w-full py-4 rounded-sm bg-gradient-to-r from-gold via-gold-bright to-gold text-obsidian text-xs uppercase tracking-[0.25em] font-semibold hover:shadow-[0_0_20px_rgba(223,190,126,0.5)] transition-all" type="submit">
                Transmit Confidential Dossier
              </button>
<p class="text-center text-[10px] text-slate-400">
                Submissions are encrypted end-to-end. Full mutual non-disclosure covenants apply immediately.
              </p>
</form>
<div class="hidden text-center py-12 space-y-4" id="formSuccess">
<span class="material-symbols-outlined text-gold text-5xl">verified_user</span>
<h4 class="font-serif text-2xl text-ivory">Dossier Transmitted</h4>
<p class="text-xs sm:text-sm text-slate-300 max-w-sm mx-auto">
                Your dossier has entered our encrypted dispatch registry. A Senior Managing Partner will initiate contact via your preferred line within 12 hours.
              </p>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- ================= GLOBAL CONCIERGE DESKS FOOTER ================= -->
<footer class="w-full bg-obsidian border-t border-white/[0.08] py-16 px-6 lg:px-12 text-slate-400 text-xs">
<div class="max-w-7xl mx-auto space-y-12">
<!-- Top Row -->
<div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8 pb-10 border-b border-white/[0.06]">
<div class="space-y-1">
<div class="font-serif text-2xl tracking-[0.25em] text-ivory">BESPOKE</div>
<div class="text-[10px] uppercase tracking-[0.2em] text-gold">VIP Private Travel &amp; Luxury Concierge Platform</div>
</div>
<!-- Global Hubs -->
<div class="flex flex-wrap items-center gap-x-6 gap-y-2 uppercase tracking-[0.2em] text-[11px] text-slate-300">
<span>Geneva</span>
<span class="text-gold">·</span>
<span>London</span>
<span class="text-gold">·</span>
<span>Monaco</span>
<span class="text-gold">·</span>
<span>Tokyo</span>
<span class="text-gold">·</span>
<span>New York</span>
<span class="text-gold">·</span>
<span>Zurich</span>
</div>
</div>
<!-- Bottom Disclaimer Row -->
<div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
<p class="text-[11px] text-slate-400 max-w-2xl leading-relaxed">
          Discretion is our foundational tenet. Advisory engagements, itinerary architectural records, and private passenger manifests remain held under strict Swiss non-disclosure statutory covenants.
        </p>
<div class="text-[11px] text-slate-400 whitespace-nowrap">
          © 2026 Bespoke Advisory SA. All rights reserved. &bull; Zaidaan Diandra Eka Putra
        </div>
</div>
</div>
</footer>
<!-- ================= INTERACTIVE VIP PORTAL MODAL ================= -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md hidden transition-opacity duration-300" id="vipModal">
<div class="relative w-full max-w-md p-8 rounded-2xl bg-surface-container border border-gold/40 gold-glow shadow-2xl space-y-6">
<button class="absolute top-5 right-5 text-slate-400 hover:text-white transition-colors" onclick="toggleModal(false)">
<span class="material-symbols-outlined text-xl">close</span>
</button>
<div class="text-center space-y-2">
<div class="w-12 h-12 rounded-full bg-gold/10 border border-gold/30 flex items-center justify-center mx-auto text-gold mb-3">
<span class="material-symbols-outlined text-2xl">shield</span>
</div>
<h3 class="font-serif text-2xl text-ivory">VIP Client Portal</h3>
<p class="text-xs text-slate-400">Authenticate using your Swiss security key or registered client token.</p>
</div>
<form class="space-y-4" onsubmit="event.preventDefault(); window.location.href='index.php';">
<div class="space-y-1.5">
<label class="text-[10px] uppercase tracking-wider text-slate-300 block">Dossier Key / Client ID</label>
<input class="w-full bg-surface-dim border border-white/10 rounded px-4 py-2.5 text-ivory text-xs tracking-wider placeholder:text-slate-600 focus:outline-none focus:border-gold" placeholder="BSPK-CH-XXXX" value="BSPK-CH-8821" required="" type="text"/>
</div>
<div class="space-y-1.5">
<label class="text-[10px] uppercase tracking-wider text-slate-300 block">Encrypted Passphrase</label>
<input class="w-full bg-surface-dim border border-white/10 rounded px-4 py-2.5 text-ivory text-xs placeholder:text-slate-600 focus:outline-none focus:border-gold" placeholder="••••••••••••" value="concierge-pass" required="" type="password"/>
</div>
<button class="w-full py-3 rounded bg-gradient-to-r from-gold via-gold-bright to-gold text-obsidian text-xs uppercase tracking-[0.2em] font-bold hover:shadow-lg transition-all" type="submit">
          Authorize Session
        </button>
</form>
<div class="text-center text-[10px] text-slate-400 pt-2 border-t border-white/[0.06]">
        Emergency dispatch key assistance: +41 22 819 09 00
      </div>
</div>
</div>
<!-- Interactive Scripts -->
<script>
    // Form Success Handler
    function showSuccessState() {
      const form = document.getElementById('consultForm');
      const success = document.getElementById('formSuccess');
      if (form && success) {
        form.classList.add('hidden');
        success.classList.remove('hidden');
      }
    }

    // Modal Toggle
    function toggleModal(open) {
      const modal = document.getElementById('vipModal');
      if (modal) {
        if (open) {
          modal.classList.remove('hidden');
        } else {
          modal.classList.add('hidden');
        }
      }
    }

    // Interactive filter tabs
    document.querySelectorAll('#filterTabs .filter-btn').forEach(button => {
      button.addEventListener('click', function() {
        document.querySelectorAll('#filterTabs .filter-btn').forEach(btn => {
          btn.classList.remove('bg-gold', 'text-obsidian', 'shadow-sm');
          btn.classList.add('text-slate-300');
        });
        this.classList.remove('text-slate-300');
        this.classList.add('bg-gold', 'text-obsidian', 'shadow-sm');
      });
    });
  </script>
</body></html>

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
    suiteName: 'Santorini Estate Caldera',
    destination: 'Santorini, Greece',
    client: 'Lord Alexander Wright (VIP-8821)',
    status: 'Proposal Approved',
    totalCurated: '4 Vendor Premium Terverifikasi'
);

$suiteProfile = $bespoke->getSuiteProfile();
$quickStats   = $bespoke->getStats();
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="web_standard" name="shell-type"/>
  <title>Bespoke — Ultra-Luxury Private Travel &amp; Diplomatic Concierge</title>
  <meta content="Private Travel Office & Diplomatic Hospitality Atelier. Access granted exclusively via peer recommendation and private board clearance." name="description"/>

  <!-- Google Fonts: EB Garamond, DM Sans & Material Symbols -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

  <style>
    @layer base {
      html, body {
        margin: 0;
        padding: 0;
        background-color: #0c0e12;
        color: #e2e2e8;
      }
      body { overscroll-behavior: none; }
      main > :first-child { margin-top: 0 !important; }
      main > :last-child { margin-bottom: 0 !important; }
    }
    ::-webkit-scrollbar { display: none; }
  </style>

    <!-- Tailwind CSS CDN with Black Gold Theme Config -->
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
            "margin-tablet": "2.5rem",
            "gutter-tablet": "2rem",
            "space-md": "1rem",
            "space-xs": "0.25rem",
            "space-xl": "3rem",
            "space-lg": "1.75rem",
            "margin-desktop": "5rem",
            "gutter": "1.5rem",
            "space-sm": "0.5rem",
            "margin": "1.25rem",
            "gutter-desktop": "3rem"
          },
          fontFamily: {
            "display-mobile": ["EB Garamond"],
            "label-lg": ["DM Sans"],
            "label-sm": ["DM Sans"],
            "body-md": ["DM Sans"],
            "body-lg": ["DM Sans"],
            "label-md": ["DM Sans"],
            "headline-md": ["EB Garamond"],
            "headline-lg-mobile": ["EB Garamond"],
            "display": ["EB Garamond"],
            "body-sm": ["DM Sans"],
            "headline-sm": ["EB Garamond"],
            "headline-lg": ["EB Garamond"]
          },
          fontSize: {
            "display-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.01em", "fontWeight": "400" }],
            "label-lg": ["12px", { "lineHeight": "16px", "letterSpacing": "0.14em", "fontWeight": "600" }],
            "label-sm": ["9px", { "lineHeight": "12px", "letterSpacing": "0.22em", "fontWeight": "600" }],
            "body-md": ["15px", { "lineHeight": "24px", "letterSpacing": "0em", "fontWeight": "400" }],
            "body-lg": ["18px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "400" }],
            "label-md": ["11px", { "lineHeight": "14px", "letterSpacing": "0.18em", "fontWeight": "500" }],
            "headline-md": ["32px", { "lineHeight": "40px", "letterSpacing": "0em", "fontWeight": "400" }],
            "headline-lg-mobile": ["32px", { "lineHeight": "40px", "letterSpacing": "0em", "fontWeight": "400" }],
            "display": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.02em", "fontWeight": "400" }],
            "body-sm": ["13px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "400" }],
            "headline-sm": ["24px", { "lineHeight": "32px", "letterSpacing": "0.01em", "fontWeight": "500" }],
            "headline-lg": ["44px", { "lineHeight": "52px", "letterSpacing": "-0.015em", "fontWeight": "400" }]
          }
        }
      }
    };
  </script>
</head>
<body class="bg-surface-container-lowest font-body-md text-on-surface antialiased selection:bg-primary-container selection:text-on-primary-container">

    <!-- =========================================================================
       1. TOP FLOATING NAVIGATION (Black Gold Obsidian Luxury)
       ========================================================================= -->
  <header class="fixed top-0 inset-x-0 z-50 transition-all duration-300 bg-surface-container-lowest/80 backdrop-blur-xl border-b border-surface-container/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3.5 sm:py-4 flex items-center justify-between">
      
      <!-- Logo: Monogram & Brand -->
      <a href="latihan1.php" class="flex items-center gap-2.5 group">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary via-secondary to-secondary-container text-on-primary flex items-center justify-center font-bold tracking-tighter text-sm shadow-md group-hover:scale-105 transition-transform">
          ✦
        </div>
        <div class="flex flex-col">
          <span class="font-bold tracking-widest text-xs uppercase text-primary leading-none">BESPOKE</span>
          <span class="text-[9px] tracking-wider uppercase text-outline mt-0.5">Zurich &bull; Geneva Private Office</span>
        </div>
      </a>

      <!-- Center Floating Pill Menu in Dark Frosted Glass -->
      <nav class="hidden md:flex items-center gap-1 bg-surface-container-low/90 backdrop-blur-md px-2 py-1 rounded-full shadow-sm border border-surface-container-high/50">
        <a href="#" class="bg-primary text-on-primary px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide shadow-sm shadow-primary/20">Home</a>
        <a href="#expeditions" class="text-on-surface-variant hover:text-primary px-3.5 py-1.5 text-xs font-medium transition-colors">Destinations</a>
        <a href="#fleet" class="text-on-surface-variant hover:text-primary px-3.5 py-1.5 text-xs font-medium transition-colors">Tours</a>
        <a href="#protocol" class="text-on-surface-variant hover:text-primary px-3.5 py-1.5 text-xs font-medium transition-colors">Experiences</a>
        <a href="#membership" class="text-on-surface-variant hover:text-primary px-3.5 py-1.5 text-xs font-medium transition-colors">About</a>
        <a href="#consultation" class="text-on-surface-variant hover:text-primary px-3.5 py-1.5 text-xs font-medium transition-colors">Contact</a>
      </nav>

      <!-- Right Action Buttons -->
      <div class="flex items-center gap-2.5">
        <button class="w-10 h-10 rounded-full bg-surface-container-low/90 backdrop-blur-md border border-surface-container-high/60 flex items-center justify-center text-on-surface-variant hover:text-primary hover:bg-surface-container shadow-sm cursor-pointer transition-all">
          <span class="material-symbols-outlined text-[18px]">search</span>
        </button>
        <button onclick="openVipModal()" class="bg-primary hover:bg-primary-fixed text-on-primary pl-5 pr-2 py-2 rounded-full text-xs font-bold tracking-wide flex items-center gap-3 shadow-md shadow-primary/20 cursor-pointer transition-all">
          <span>VIP Portal</span>
          <span class="w-6 h-6 rounded-full bg-on-primary text-primary flex items-center justify-center shadow-xs">
            <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
          </span>
        </button>
      </div>

    </div>
  </header>

  <!-- =========================================================================
       MAIN BODY SECTIONS
       ========================================================================= -->
  <main class="w-full bg-surface-container-lowest text-on-surface">

    <!-- =====================================================================
         SECTION 1: FULL-WIDTH HERO BANNER (Black Gold Obsidian Luxury)
         ===================================================================== -->
    <section class="relative w-full min-h-[580px] lg:min-h-[700px] bg-cover bg-center flex flex-col justify-between" style="background-image: url('assets/images/luxury-luggage-coastal-hero.jpg')">
      
      <!-- Dark Obsidian Scrim Overlay: Highlights mountain vista while making gold & white typography pop -->
      <div class="absolute inset-0 bg-gradient-to-r from-surface-container-lowest/95 via-surface-container-lowest/65 to-surface-container-lowest/20 pointer-events-none"></div>
      <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/70 to-transparent pointer-events-none"></div>

      <!-- Hero Main Content -->
      <div class="relative z-10 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 pt-32 sm:pt-36 lg:pt-40 pb-20 sm:pb-24 flex flex-col lg:flex-row lg:items-start justify-between gap-8">
        
        <!-- Left Editorial Narrative -->
        <div class="max-w-2xl">
          
          <!-- Micro Eyebrow in Champagne Gold -->
          <div class="font-sans text-xs uppercase tracking-[0.25em] font-semibold text-primary mb-3 flex items-center gap-2">
            <span class="inline-block w-2 h-2 rounded-full bg-primary animate-pulse"></span>
            <span>TRAVEL</span>
            <span>&mdash;</span>
            <span>EXPLORE</span>
            <span>&mdash;</span>
            <span>EXPERIENCE</span>
            <span>&mdash;</span>
            <span>BELONG</span>
          </div>

          <!-- Headline in White & Radiant Gold -->
          <h1 class="font-serif text-5xl sm:text-6xl lg:text-[72px] leading-[1.08] text-on-surface font-normal tracking-tight">
            Discover Journeys<br/>
            <span class="text-primary italic font-normal drop-shadow-[0_0_25px_rgba(242,202,80,0.3)]">Beyond Ordinary</span>
          </h1>

          <!-- Lead Subtitle in Muted Platinum -->
          <p class="mt-4 font-sans text-on-surface-variant text-sm sm:text-base max-w-lg leading-relaxed font-normal">
            Curated travel experiences to the world's most extraordinary destinations. More than trips, we create stories you'll never forget.
          </p>

          <!-- Dual CTAs -->
          <div class="mt-8 flex flex-wrap items-center gap-4">
            <a href="#expeditions" class="bg-primary hover:bg-primary-fixed text-on-primary px-7 py-3 rounded-full text-xs font-bold uppercase tracking-wider flex items-center gap-2 shadow-lg shadow-primary/20 hover:shadow-primary/30 transition-all group">
              <span>Explore Destinations</span>
              <span class="material-symbols-outlined text-[16px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
            <button onclick="openVideoModal()" class="flex items-center gap-2.5 group cursor-pointer bg-surface-container-high/70 hover:bg-surface-container-high backdrop-blur-md px-5 py-2.5 rounded-full border border-surface-container-highest/60 text-on-surface shadow-sm transition-all">
              <span class="w-7 h-7 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-xs group-hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-[16px]">play_arrow</span>
              </span>
              <span class="text-xs font-semibold tracking-wider uppercase text-on-surface">Watch Guide</span>
            </button>
          </div>

        </div>

        <!-- Right Side Badge in Black Gold -->
        <div class="hidden xl:flex flex-col border-l-2 border-primary/50 pl-3.5 py-1 text-left self-start mt-2 bg-surface-container-lowest/50 backdrop-blur-sm pr-4 rounded-r-lg">
          <span class="text-[10px] tracking-[0.2em] uppercase font-bold text-primary leading-tight">Extraordinary</span>
          <span class="text-[10px] tracking-[0.2em] uppercase font-bold text-on-surface leading-tight">Destinations</span>
          <span class="text-[10px] tracking-[0.2em] uppercase font-semibold text-secondary leading-tight mt-1.5">Meaningful</span>
          <span class="text-[10px] tracking-[0.2em] uppercase font-semibold text-on-surface-variant leading-tight">Experiences</span>
        </div>

      </div>

    </section>

    <!-- =====================================================================
         FLOATING QUICK SEARCH CAPSULE (Black Gold Glassmorphism)
         ===================================================================== -->
    <div class="relative z-20 max-w-5xl mx-auto px-4 -mt-10 sm:-mt-12">
      <div class="bg-surface-container-low/90 backdrop-blur-2xl rounded-full shadow-[0_20px_50px_rgba(0,0,0,0.8)] border border-primary/30 p-2 sm:p-2.5">
        <form id="hero-search-form" onsubmit="event.preventDefault(); handleSearchSubmit();" class="flex flex-col lg:flex-row items-center justify-between gap-2">
          
          <!-- Segment 1: Destination -->
          <div class="flex items-center gap-3 px-4 py-2 flex-1 hover:bg-surface-container rounded-full cursor-pointer transition-colors w-full lg:w-auto">
            <span class="material-symbols-outlined text-primary text-[22px]">flight_takeoff</span>
            <div class="flex flex-col min-w-0">
              <span class="text-xs font-bold text-on-surface leading-none">Destinations</span>
              <span class="text-[11px] text-outline mt-1 truncate">Where to go?</span>
            </div>
          </div>

          <!-- Divider -->
          <div class="hidden lg:block w-px h-8 bg-surface-container-highest"></div>

          <!-- Segment 2: Dates -->
          <div class="flex items-center gap-3 px-4 py-2 flex-1 hover:bg-surface-container rounded-full cursor-pointer transition-colors w-full lg:w-auto">
            <span class="material-symbols-outlined text-primary text-[22px]">calendar_today</span>
            <div class="flex flex-col min-w-0">
              <span class="text-xs font-bold text-on-surface leading-none">Dates</span>
              <span class="text-[11px] text-outline mt-1 truncate">Add dates</span>
            </div>
          </div>

          <!-- Divider -->
          <div class="hidden lg:block w-px h-8 bg-surface-container-highest"></div>

          <!-- Segment 3: Travelers -->
          <div class="flex items-center justify-between gap-2 px-4 py-2 flex-1 hover:bg-surface-container rounded-full cursor-pointer transition-colors w-full lg:w-auto">
            <div class="flex items-center gap-3">
              <span class="material-symbols-outlined text-primary text-[22px]">group</span>
              <div class="flex flex-col min-w-0">
                <span class="text-xs font-bold text-on-surface leading-none">Travelers</span>
                <span class="text-[11px] text-outline mt-1 truncate">2 Travelers</span>
              </div>
            </div>
            <span class="material-symbols-outlined text-outline text-[18px]">expand_more</span>
          </div>

          <!-- Divider -->
          <div class="hidden lg:block w-px h-8 bg-surface-container-highest"></div>

          <!-- Segment 4: Budget -->
          <div class="flex items-center justify-between gap-2 px-4 py-2 flex-1 hover:bg-surface-container rounded-full cursor-pointer transition-colors w-full lg:w-auto">
            <div class="flex items-center gap-3">
              <span class="material-symbols-outlined text-primary text-[22px]">sell</span>
              <div class="flex flex-col min-w-0">
                <span class="text-xs font-bold text-on-surface leading-none">Budget</span>
                <span class="text-[11px] text-outline mt-1 truncate">Any budget</span>
              </div>
            </div>
            <span class="material-symbols-outlined text-outline text-[18px]">expand_more</span>
          </div>

          <!-- Segment 5: Submit Button -->
          <button type="submit" class="bg-primary hover:bg-primary-fixed text-on-primary px-6 py-3 rounded-full text-xs font-bold tracking-wider flex items-center justify-center gap-2 shadow-md shadow-primary/20 transition-all shrink-0 w-full lg:w-auto cursor-pointer">
            <span class="material-symbols-outlined text-[18px]">search</span>
            <span>Search Journeys</span>
          </button>

        </form>
      </div>
    </div>

    <!-- =====================================================================
         SHOWCASE 3-CARD GRID (Obsidian Frosted Glass & Gold Highlights)
         ===================================================================== -->
    <section class="bg-surface-container-lowest pt-8 pb-16 px-4 sm:px-6 lg:px-8 border-b border-surface-container/60">
      <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-stretch">
          
          <!-- CARD 1: FEATURED DESTINATION (Santorini) -->
          <div class="md:col-span-4 bg-surface-container-low/80 backdrop-blur-xl rounded-3xl p-4 shadow-xl border border-surface-container-high/60 hover:border-primary/40 flex flex-col justify-between group transition-all">
            <div>
              <div class="relative h-48 rounded-2xl overflow-hidden mb-3">
                <img src="assets/images/santorini-caldera-sunset.jpg" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Santorini, Greece" />
                <span class="absolute top-3 left-3 bg-surface-container-lowest/90 backdrop-blur-md text-primary text-[10px] tracking-wider uppercase font-bold px-3 py-1 rounded-full shadow-xs border border-primary/20">
                  Featured Destination
                </span>
                <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-surface-container-lowest/80 backdrop-blur-md flex items-center justify-center text-outline hover:text-rose-400 shadow-xs transition-colors cursor-pointer border border-white/10">
                  <span class="material-symbols-outlined text-[16px]">favorite</span>
                </button>
              </div>
              <div>
                <h3 class="font-serif text-lg font-bold text-on-surface">Santorini, Greece</h3>
                <div class="flex items-center gap-1.5 mt-0.5">
                  <span class="text-primary text-xs">★</span>
                  <span class="text-xs font-semibold text-primary">4.9</span>
                  <span class="text-[11px] text-outline">(1.2K Reviews)</span>
                </div>
                <p class="text-xs text-on-surface-variant mt-1.5 line-clamp-2 leading-relaxed">
                  Iconic views, timeless charm and unforgettable sunsets.
                </p>
              </div>
            </div>
            <div class="mt-4 pt-3 flex items-center justify-between border-t border-surface-container-high/40">
              <span class="text-xs font-semibold text-primary">From $3,450 <span class="text-outline font-normal">/ night</span></span>
              <a href="#expeditions" class="w-8 h-8 rounded-full border border-surface-container-high/80 flex items-center justify-center text-on-surface-variant hover:bg-primary hover:text-on-primary transition-all">
                <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
              </a>
            </div>
          </div>

          <!-- CARD 2: PATRONAGE BENCHMARK (Stats & Community Quote) -->
          <div class="md:col-span-5 bg-surface-container-low/80 backdrop-blur-xl rounded-3xl p-6 shadow-xl border border-surface-container-high/60 flex flex-col justify-between">
            <!-- 4 Column Stats -->
            <div class="grid grid-cols-4 gap-2 text-center pb-4 border-b border-surface-container-high/40">
              <div>
                <span class="material-symbols-outlined text-primary text-[20px] mb-1">flight</span>
                <div class="font-bold text-base text-primary">250+</div>
                <div class="text-[10px] text-outline leading-tight">Unique Destinations</div>
              </div>
              <div>
                <span class="material-symbols-outlined text-primary text-[20px] mb-1">group</span>
                <div class="font-bold text-base text-primary">50K+</div>
                <div class="text-[10px] text-outline leading-tight">Happy Travelers</div>
              </div>
              <div>
                <span class="material-symbols-outlined text-primary text-[20px] mb-1">map</span>
                <div class="font-bold text-base text-primary">1,200+</div>
                <div class="text-[10px] text-outline leading-tight">Curated Experiences</div>
              </div>
              <div>
                <span class="material-symbols-outlined text-primary text-[20px] mb-1">public</span>
                <div class="font-bold text-base text-primary">95+</div>
                <div class="text-[10px] text-outline leading-tight">Countries Worldwide</div>
              </div>
            </div>

            <!-- Testimonial & Overlapping Avatars -->
            <div class="pt-4 flex flex-col gap-2">
              <div class="flex items-center gap-3">
                <div class="flex -space-x-2 shrink-0">
                  <img class="w-8 h-8 rounded-full border-2 border-surface-container-lowest object-cover" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Avatar 1"/>
                  <img class="w-8 h-8 rounded-full border-2 border-surface-container-lowest object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" alt="Avatar 2"/>
                  <img class="w-8 h-8 rounded-full border-2 border-surface-container-lowest object-cover" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=100&q=80" alt="Avatar 3"/>
                  <div class="w-8 h-8 rounded-full border-2 border-surface-container-lowest bg-surface-container flex items-center justify-center text-xs font-bold text-primary">+</div>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-xs italic text-on-surface-variant leading-snug">
                    "Incredible planning, unforgettable experiences. Truly a trip of a lifetime!"
                  </p>
                  <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="text-primary text-[11px]">★★★★★</span>
                    <span class="text-[11px] font-semibold text-on-surface">Sarah M.</span>
                    <span class="text-[10px] text-outline">&mdash; Traveled to Italy</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- CARD 3: REAL PLACES REAL STORIES (Video Card) -->
          <div onclick="openVideoModal()" class="md:col-span-3 relative rounded-3xl overflow-hidden shadow-xl min-h-[220px] bg-surface-container-lowest group cursor-pointer flex flex-col justify-end p-5 border border-surface-container-high/60">
            <img src="https://images.unsplash.com/photo-1514282401047-d79a71a590e8?auto=format&fit=crop&w=800&q=80" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-60" alt="Tropical Lagoon"/>
            <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/60 to-transparent"></div>
            
            <!-- Centered Play Button in Radiant Gold -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
              <div class="w-11 h-11 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-lg shadow-primary/30 group-hover:scale-110 transition-transform">
                <span class="material-symbols-outlined text-[22px]">play_arrow</span>
              </div>
            </div>

            <!-- Text at Bottom -->
            <div class="relative z-10">
              <h4 class="font-serif text-on-surface font-bold text-base leading-tight">Real Places. Real Stories.</h4>
              <p class="text-[11px] text-on-surface-variant mt-1 leading-snug">Watch traveler stories from around the world.</p>
            </div>
          </div>

        </div>
      </div>
    </section>

<!-- =====================================================================
           SECTION 2: CURATED EXPEDITIONS & SANCTUARIES (6 DOSSIERS)
           ===================================================================== -->
      <section class="py-space-xl px-margin sm:px-margin-tablet lg:px-margin-desktop" id="expeditions">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12">
          <div>
            <div class="inline-flex items-center gap-2 mb-3">
              <span class="w-2 h-2 rounded-full bg-secondary"></span>
              <span class="font-label-md text-label-md uppercase tracking-widest text-secondary">Seasonal Itineraries</span>
            </div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Curated Global Expeditions</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-xl mt-2">
              Hand-orchestrated missions where commercial aviation does not venture. Private access protocols secured 12 months in advance.
            </p>
          </div>

          <!-- Filter Capsule Tabs -->
          <div class="flex items-center flex-wrap gap-2 bg-surface-container p-1.5 rounded-full" id="filter-container">
            <button class="filter-btn active px-4 py-2 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary transition-all cursor-pointer" data-category="all">All</button>
            <button class="filter-btn px-4 py-2 rounded-full font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-all cursor-pointer" data-category="alpine">Alpine Winter</button>
            <button class="filter-btn px-4 py-2 rounded-full font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-all cursor-pointer" data-category="maritime">Maritime</button>
            <button class="filter-btn px-4 py-2 rounded-full font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-all cursor-pointer" data-category="cultural">Cultural</button>
            <button class="filter-btn px-4 py-2 rounded-full font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-all cursor-pointer" data-category="safari">Safari</button>
            <button class="filter-btn px-4 py-2 rounded-full font-label-md text-label-md uppercase tracking-wider text-on-surface-variant hover:text-on-surface transition-all cursor-pointer" data-category="arctic">Arctic</button>
          </div>
        </div>

        <!-- 6 Detailed Dossier Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="expeditions-grid">
          
          <!-- Card 1: Zermatt -->
          <div class="expedition-card bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between border border-surface-container" data-category="alpine">
            <div>
              <div class="relative h-64 overflow-hidden">
                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCmWTz_6mJSD1BWR4sn_eMbD1MXYaBAGDUMK73-BiW0xZERWifQ1lB3dDajkBtTHt6VJcQiJfVGnLaMXMz1pkTycfgouXkaz41WuDwUJWm41-3vwplQ7Ahn0R38TWwrXiqwHIcUUw3QPEkTZPQQfn9vVxaqqzWKkjJQaVtW9TUAVvYZ9iFy95eIM4EaO6QEGillKVdV_Ku9z3l7I6MugjecxGUbt_9iNaKNE8aGUqw')"></div>
                <div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full font-label-sm text-label-sm uppercase tracking-widest text-on-surface">Alpine Reserve</div>
                <div class="absolute bottom-4 right-4 bg-primary/85 backdrop-blur-sm px-3 py-1 rounded font-label-md text-label-md text-on-primary">$85,000 / week</div>
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-1">
                  <span>Switzerland</span>
                  <span>&bull;</span>
                  <span>Sion Tarmac Clearance</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Zermatt &amp; St. Moritz Penthouse</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">
                  Private Bombardier Global 7500 landing directly into Sion, accompanied by daily heli-skiing with former Swiss national guides.
                </p>
                <div class="grid grid-cols-2 gap-2 text-on-surface-variant font-label-sm text-label-sm bg-surface p-3 rounded-xl mb-4">
                  <div><strong class="text-on-surface block">Vessel:</strong> Bombardier 7500</div>
                  <div><strong class="text-on-surface block">Access:</strong> Heli-Ski Private</div>
                  <div><strong class="text-on-surface block">Capacity:</strong> 10 Guests</div>
                  <div><strong class="text-on-surface block">Cuisine:</strong> 3-Star Michelin Chef</div>
                </div>
              </div>
            </div>
            <div class="p-6 pt-0">
              <button class="w-full py-3 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container-high text-on-surface hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center gap-2 cursor-pointer" onclick="openConsultation('Zermatt & St. Moritz')">
                <span>Request Mission Dossier</span>
                <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
              </button>
            </div>
          </div>

          <!-- Card 2: Monaco & French Riviera -->
          <div class="expedition-card bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between border border-surface-container" data-category="maritime">
            <div>
              <div class="relative h-64 overflow-hidden">
                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDEbmZ9bKNwgDbxo5zYPQoS_OfO8N47YX_hecUt5OXI4ZuQbuOs7FNF9LBIjG_Ck5w-EqXQrGV214T4CRsAcxCjYkYimqJ_6bD-Q4-GGjPgwMyfreNpbmgiEqOClPmZcetriKHCRewlmdNGscvU3YCpGpOCZLPnoxYb-x3Y_OKrcGfmeOn3XAalE3p33S00b8suhj8pASseYCDI-YOMkmTxqnlhHW7ull7RuSvw9nc')"></div>
                <div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full font-label-sm text-label-sm uppercase tracking-widest text-on-surface">Maritime Charter</div>
                <div class="absolute bottom-4 right-4 bg-primary/85 backdrop-blur-sm px-3 py-1 rounded font-label-md text-label-md text-on-primary">$145,000 / week</div>
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-1">
                  <span>C&ocirc;te d&rsquo;Azur</span>
                  <span>&bull;</span>
                  <span>Quai des &Eacute;tats-Unis Berth</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Monaco Grand Prix &amp; Riviera</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">
                  Mooring at the prestigious Port Hercule with uninterrupted paddock-terrace line of sight. Seamless tenders to Hotel du Cap-Eden-Roc.
                </p>
                <div class="grid grid-cols-2 gap-2 text-on-surface-variant font-label-sm text-label-sm bg-surface p-3 rounded-xl mb-4">
                  <div><strong class="text-on-surface block">Vessel:</strong> 65m Custom Benetti</div>
                  <div><strong class="text-on-surface block">Berth:</strong> Zone 1 Trackside</div>
                  <div><strong class="text-on-surface block">Crew:</strong> 16 Fully Cleared</div>
                  <div><strong class="text-on-surface block">Aviation:</strong> Nice Heli Shuttles</div>
                </div>
              </div>
            </div>
            <div class="p-6 pt-0">
              <button class="w-full py-3 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container-high text-on-surface hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center gap-2 cursor-pointer" onclick="openConsultation('Monaco Grand Prix & Riviera')">
                <span>Request Mission Dossier</span>
                <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
              </button>
            </div>
          </div>

          <!-- Card 3: Kyoto & Amanemu -->
          <div class="expedition-card bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between border border-surface-container" data-category="cultural">
            <div>
              <div class="relative h-64 overflow-hidden">
                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBNJu_VQLCRADN-ju1Dsh3RdydL_XpoGsctYhpfot-zWzT3iCbRhdlxUNJXzaoW9sKoL9-pm9rXcKyjiE1QFmN3lhy_Y4rws_VoEnbZEIPWGcNzrwWODLeyv7I9FUx9txIs-lIsGibIEHsJ-1Dy_fNwDnRB_qIbnHZqHsKS8Tjv9Ff87uqxaalC4FTHBBIgUzFvOrHpsTsyRHYe92EqPuxDzdBaBC9uqLzQOD05vAw')"></div>
                <div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full font-label-sm text-label-sm uppercase tracking-widest text-on-surface">Cultural Cloister</div>
                <div class="absolute bottom-4 right-4 bg-primary/85 backdrop-blur-sm px-3 py-1 rounded font-label-md text-label-md text-on-primary">$58,000 / week</div>
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-1">
                  <span>Japan</span>
                  <span>&bull;</span>
                  <span>Off-Market Shinto Access</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Kyoto Machiya &amp; Onsen Sanctuary</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">
                  Restricted temple access closed to the public since 1868. Private tea masters, imperial swordsmith consultations, and shinkansen salon car.
                </p>
                <div class="grid grid-cols-2 gap-2 text-on-surface-variant font-label-sm text-label-sm bg-surface p-3 rounded-xl mb-4">
                  <div><strong class="text-on-surface block">Locale:</strong> Gion Private Preserve</div>
                  <div><strong class="text-on-surface block">Transport:</strong> Shinkansen Gran Class</div>
                  <div><strong class="text-on-surface block">Liaison:</strong> Bilingual Attach&eacute;</div>
                  <div><strong class="text-on-surface block">Wellness:</strong> Private Onsen Springs</div>
                </div>
              </div>
            </div>
            <div class="p-6 pt-0">
              <button class="w-full py-3 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container-high text-on-surface hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center gap-2 cursor-pointer" onclick="openConsultation('Kyoto Machiya Sanctuary')">
                <span>Request Mission Dossier</span>
                <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
              </button>
            </div>
          </div>

          <!-- Card 4: Amalfi Coast & Capri -->
          <div class="expedition-card bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between border border-surface-container" data-category="maritime">
            <div>
              <div class="relative h-64 overflow-hidden">
                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCJmGxUbOWmLblSo7_tU6alyH0DLGourtksxJjJKj9pBzM9DIl_SjkecjW4bOQSN_i-G6ccmLbTkq3rP3tBYv99orvEkbwHA-KDkdT8nxD9VAV2ZcrcqhUDCcEa2QCODiNGB90lkksFO8TMGOoF-CV000uEwKH_3ZYHa_yRcsI8Oa93KmAJ301Zfq5RUumwy5LQkZB0YT_PuYrZ9JFgGBjvYMIJV8jiMIHbVAjBqqU')"></div>
                <div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full font-label-sm text-label-sm uppercase tracking-widest text-on-surface">Maritime Coastline</div>
                <div class="absolute bottom-4 right-4 bg-primary/85 backdrop-blur-sm px-3 py-1 rounded font-label-md text-label-md text-on-primary">$110,000 / week</div>
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-1">
                  <span>Italy</span>
                  <span>&bull;</span>
                  <span>Private Marina Grande Pier</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Amalfi Coast &amp; Capri Estate</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">
                  Historic 17th-century private cliff estate reachable solely via chartered Riva tender or rooftop helipad with panoramic Faraglioni vistas.
                </p>
                <div class="grid grid-cols-2 gap-2 text-on-surface-variant font-label-sm text-label-sm bg-surface p-3 rounded-xl mb-4">
                  <div><strong class="text-on-surface block">Vessel:</strong> Riva Dolceriva 48</div>
                  <div><strong class="text-on-surface block">Villa:</strong> 8-Bedroom Historic</div>
                  <div><strong class="text-on-surface block">Clearance:</strong> Naples FBO Priority</div>
                  <div><strong class="text-on-surface block">Staff:</strong> Sommelier &amp; Security</div>
                </div>
              </div>
            </div>
            <div class="p-6 pt-0">
              <button class="w-full py-3 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container-high text-on-surface hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center gap-2 cursor-pointer" onclick="openConsultation('Amalfi Coast & Capri')">
                <span>Request Mission Dossier</span>
                <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
              </button>
            </div>
          </div>

          <!-- Card 5: Serengeti Flying Safari -->
          <div class="expedition-card bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between border border-surface-container" data-category="safari">
            <div>
              <div class="relative h-64 overflow-hidden">
                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAKNT-WB0NK7ZhyZRPJ8Y54dUL61ATiHlpldIXh6CB1uTy3w7Jwff5g_DwIouse1Gp46Z8ti2Q9RGcXFk15o2F5lSVk29twL94KqHG_u5_DKDx4tODWekokMCq_dwPWhrXpbzlUs3Au15cRNOfOAyt-Ae9BbZLM7uTBkBrigqjOeLTzxVXTpaiLcI-EVKMk01EP3vWfyDrO9Z7FpVzjPrE4jMLVcgVcaxa7bsMlvqo')"></div>
                <div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full font-label-sm text-label-sm uppercase tracking-widest text-on-surface">Savanna Wilderness</div>
                <div class="absolute bottom-4 right-4 bg-primary/85 backdrop-blur-sm px-3 py-1 rounded font-label-md text-label-md text-on-primary">$92,000 / week</div>
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-1">
                  <span>Tanzania</span>
                  <span>&bull;</span>
                  <span>Private Bush Strip Access</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Serengeti Flying Private Safari</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">
                  Dedicated Pilatus PC-12 NGX stationed with your party. Total privatization of Singita reserve concession with armed anti-poaching security escort.
                </p>
                <div class="grid grid-cols-2 gap-2 text-on-surface-variant font-label-sm text-label-sm bg-surface p-3 rounded-xl mb-4">
                  <div><strong class="text-on-surface block">Aircraft:</strong> Pilatus PC-12 NGX</div>
                  <div><strong class="text-on-surface block">Lodge:</strong> Exclusive Concession</div>
                  <div><strong class="text-on-surface block">Rangers:</strong> Lead Conservationist</div>
                  <div><strong class="text-on-surface block">Comm:</strong> Starlink Field Uplink</div>
                </div>
              </div>
            </div>
            <div class="p-6 pt-0">
              <button class="w-full py-3 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container-high text-on-surface hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center gap-2 cursor-pointer" onclick="openConsultation('Serengeti Flying Safari')">
                <span>Request Mission Dossier</span>
                <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
              </button>
            </div>
          </div>

          <!-- Card 6: Lapland Aurora Glass Igloo -->
          <div class="expedition-card bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between border border-surface-container" data-category="arctic">
            <div>
              <div class="relative h-64 overflow-hidden">
                <div class="w-full h-full bg-cover bg-center group-hover:scale-105 transition-transform duration-700" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAQx6v9zMNVbWoGybOrikU0xPB12JHJzlqJej-td_f4-_kxCbxZybgZuYBbBybcpIAywk9llDfbB9sd7ETUky7xmBOs5JFaludLGCbyr51bGEXgMJ4Tvv5CcgqjK0_4k73i8CSkAx1aY0kVGPWjIR1nrlFUWpHHyUxfj6ZEG2y9sOX-hcXPeXYJUBtpQf8_xwf9XgugTqhqyFCwGaV9nMslqXZgOY8Shrh7OGXi1ro')"></div>
                <div class="absolute top-4 left-4 bg-surface-container-lowest/90 backdrop-blur-md px-3 py-1 rounded-full font-label-sm text-label-sm uppercase tracking-widest text-on-surface">Polar Solitude</div>
                <div class="absolute bottom-4 right-4 bg-primary/85 backdrop-blur-sm px-3 py-1 rounded font-label-md text-label-md text-on-primary">$46,000 / week</div>
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 font-label-sm text-label-sm uppercase tracking-widest text-secondary mb-1">
                  <span>Finland / Arctic</span>
                  <span>&bull;</span>
                  <span>Ivalo Private Terminal</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-2">Lapland Glass Igloo Aurora</h3>
                <p class="font-body-md text-body-md text-on-surface-variant mb-4">
                  Falcon 8X direct to Ivalo tarmac. Heated geodesic architectural pods, private reindeer sledding reserves, and customized thermal sauna retreats.
                </p>
                <div class="grid grid-cols-2 gap-2 text-on-surface-variant font-label-sm text-label-sm bg-surface p-3 rounded-xl mb-4">
                  <div><strong class="text-on-surface block">Aviation:</strong> Falcon 8X Charter</div>
                  <div><strong class="text-on-surface block">Sanctuary:</strong> Heated Glass Dome</div>
                  <div><strong class="text-on-surface block">Expedition:</strong> Arctic Ice Driving</div>
                  <div><strong class="text-on-surface block">Privacy:</strong> 400 Hectares Private</div>
                </div>
              </div>
            </div>
            <div class="p-6 pt-0">
              <button class="w-full py-3 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container-high text-on-surface hover:bg-primary hover:text-on-primary transition-all flex items-center justify-center gap-2 cursor-pointer" onclick="openConsultation('Lapland Glass Igloo Aurora')">
                <span>Request Mission Dossier</span>
                <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
              </button>
            </div>
          </div>

        </div>
      </section>

      <!-- =====================================================================
           SECTION 3: PRIVATE AVIATION & FLEET PORTFOLIO
           ===================================================================== -->
      <section class="py-space-xl bg-surface-container-low px-margin sm:px-margin-tablet lg:px-margin-desktop border-y border-surface-container" id="fleet">
        <div class="max-w-4xl mb-12">
          <div class="inline-flex items-center gap-2 mb-3">
            <span class="w-2 h-2 rounded-full bg-secondary"></span>
            <span class="font-label-md text-label-md uppercase tracking-widest text-secondary">Aeronautical &amp; Maritime Sovereignty</span>
          </div>
          <h2 class="font-headline-lg text-headline-lg text-on-surface">The Bespoke Private Fleet</h2>
          <p class="font-body-lg text-body-lg text-on-surface-variant mt-3">
            Guaranteed zero-notice tarmac boarding across 450 general aviation terminals worldwide. Maintained under Swiss and EASA commercial air operator certificates.
          </p>
        </div>

        <!-- Fleet Cards Mosaic -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          
          <!-- Fleet 1: Gulfstream G650ER -->
          <div class="bg-surface rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all flex flex-col justify-between border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-4">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Ultra Long-Range Jet</span>
                  <h3 class="font-headline-md text-headline-md text-on-surface">Gulfstream G650ER</h3>
                </div>
                <div class="px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm uppercase tracking-wider">
                  Ready &bull; Geneva GVA
                </div>
              </div>
              <div class="relative h-60 rounded-xl overflow-hidden mb-6">
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAmFEg-gz-TqswUX4SLHNqK_yXf3OYh03BtwOEjE-3cJ40x0x7Ie4af21jV45CzaS53AfEs48T4PGrODWMEf1987ymZOYErRdiCQazVLdGtDbdPradIditpyXzkt6H6hY3v-pabT5VwjTEvzB3vwz6KC_7d112OMDFMWxph1bi9BCqPc9eoouOl0x2tJ0CFqlO4oJLt3Bno2OquAA28lIP1d22EzSrlKjUCnXSlUCI')"></div>
              </div>
              <div class="grid grid-cols-3 gap-3 bg-surface-container-low p-4 rounded-xl text-center mb-6">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Max Velocity</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">Mach 0.925</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Global Range</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">7,500 NM</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Capacity</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">14 Staterooms</span>
                </div>
              </div>
              <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                Equipped with discrete private master stateroom, private en-suite shower, Ku-band ultra-high-speed satellite datalink, and sound levels quieter than a whisper (42 dB).
              </p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-surface-container">
              <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Charter Hourly Rate: CHF 14,200</span>
              <button class="px-6 py-2.5 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary hover:bg-surface-container-highest hover:text-on-surface transition-all cursor-pointer" onclick="openConsultation('Gulfstream G650ER Tail Allocation')">
                Allocate Tail
              </button>
            </div>
          </div>

          <!-- Fleet 2: Dassault Falcon 8X -->
          <div class="bg-surface rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all flex flex-col justify-between border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-4">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Tri-Jet Alpine Access</span>
                  <h3 class="font-headline-md text-headline-md text-on-surface">Dassault Falcon 8X</h3>
                </div>
                <div class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm uppercase tracking-wider">
                  Ready &bull; London FAB
                </div>
              </div>
              <div class="relative h-60 rounded-xl overflow-hidden mb-6">
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA8ZkovbocU6WPoelQcPOC5rH3HvgeM43epqUTPvCWM2-6Jr8NEeqVqf00bfWEGyohoPoooxOWxdxDvf3Upi8TQhK8xMq6lriGCDV4BXx_czP0s6B4PcpOXXwlxccCbrlJiKLzGmBJDQ96a_9RglZC4M6hWF1b4PB5H3Zz5Ni0JY9SdqfwnV0cXGk-bUsNuBMvXAXXVzkSw9KYjXTLZE1UtzoSD4bAxOozlKBxgpGs')"></div>
              </div>
              <div class="grid grid-cols-3 gap-3 bg-surface-container-low p-4 rounded-xl text-center mb-6">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Cruise Speed</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">Mach 0.90</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Max Range</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">6,450 NM</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Short Field</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">Sion &amp; LCY</span>
                </div>
              </div>
              <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                Renowned tri-engine security margin allowing steep alpine approaches into London City, Lugano, and Aspen with uninterrupted 3-zone acoustic silence.
              </p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-surface-container">
              <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Charter Hourly Rate: CHF 12,800</span>
              <button class="px-6 py-2.5 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary hover:bg-surface-container-highest hover:text-on-surface transition-all cursor-pointer" onclick="openConsultation('Dassault Falcon 8X Tail Allocation')">
                Allocate Tail
              </button>
            </div>
          </div>

          <!-- Fleet 3: Riva Dolceriva 48 Tender -->
          <div class="bg-surface rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all flex flex-col justify-between border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-4">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Italian Day Vessel</span>
                  <h3 class="font-headline-md text-headline-md text-on-surface">Riva Dolceriva 48</h3>
                </div>
                <div class="px-3 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm uppercase tracking-wider">
                  Moored &bull; Monaco
                </div>
              </div>
              <div class="relative h-60 rounded-xl overflow-hidden mb-6">
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCYAvUeECwjWZ6-X7khhvbAMsVGUrWhNfmd0gzPf-fXhmzmot8YTRFhlqf4ECv0yAD8NOIZw_E9wDTk5iJeSQtQfYSDiFn79F2155lk4XYSPLncdJ-Q3lXGr7omXfMWkB08j6qIrZgJUL30ay3o1Vj8olUyaJEv1dNGd91PyxstExtmv-8dMq2XzDPPWKCgSjST4yKAJPZD4Yx-ybkyBOPp5oc6RvNis7EY3X5fw8Y')"></div>
              </div>
              <div class="grid grid-cols-3 gap-3 bg-surface-container-low p-4 rounded-xl text-center mb-6">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Top Speed</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">40 Knots</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Day Capacity</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">10 Guests</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Master Cabin</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">1 Luxury Suite</span>
                </div>
              </div>
              <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                The epitome of Mediterranean nautical elegance. Handcrafted high-gloss mahogany transom, electro-hydraulic swim platform, and dedicated Riva Captain.
              </p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-surface-container">
              <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Daily Charter: &euro;8,500 / day</span>
              <button class="px-6 py-2.5 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary hover:bg-surface-container-highest hover:text-on-surface transition-all cursor-pointer" onclick="openConsultation('Riva Dolceriva 48 Tender')">
                Reserve Tender
              </button>
            </div>
          </div>

          <!-- Fleet 4: Airbus H145 Penthouse Heli -->
          <div class="bg-surface rounded-2xl p-6 sm:p-8 shadow-sm hover:shadow-md transition-all flex flex-col justify-between border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-4">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">Alpine &amp; Rotor Transport</span>
                  <h3 class="font-headline-md text-headline-md text-on-surface">Airbus H145 Penthouse</h3>
                </div>
                <div class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm uppercase tracking-wider">
                  Ready &bull; Zurich / ZRH
                </div>
              </div>
              <div class="relative h-60 rounded-xl overflow-hidden mb-6">
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC6GifUehevpUuewFQ2hqMUbsQvo8zdojczLfW9c_5yEGKf3gCdtbExYjXTx7YpBt6jVN-YC0jg8qksxNnrMWVbQq_DcE0iCaV8AdofCJwJ2luF1U-UYyDvikFyW__itkXiI0p3sHIZ3KQUhsBt4OL-MGfM_SRIZf-kNNlf7f0gFS0thkVzKTIntVIrGUhY7FJnKgJCs3BSR60HeNbE7M-Lsd2-eHhrlaF4ZlWMcfA')"></div>
              </div>
              <div class="grid grid-cols-3 gap-3 bg-surface-container-low p-4 rounded-xl text-center mb-6">
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Cruise Speed</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">135 Knots</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Rotor Range</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">350 NM</span>
                </div>
                <div>
                  <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Seating</span>
                  <span class="font-headline-sm text-headline-sm text-on-surface">6 Executive</span>
                </div>
              </div>
              <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                Configured for direct rooftop touch-downs, yacht helipads, and remote high-altitude Swiss chalet landings. Active vibration suppression system installed.
              </p>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-surface-container">
              <span class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Flight Hour: CHF 4,900 / hr</span>
              <button class="px-6 py-2.5 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary hover:bg-surface-container-highest hover:text-on-surface transition-all cursor-pointer" onclick="openConsultation('Airbus H145 Helicopter')">
                Dispatch Heli
              </button>
            </div>
          </div>

        </div>
      </section>

      <!-- =====================================================================
           SECTION 4: THE CONCIERGE PROTOCOL (WORKFLOW)
           ===================================================================== -->
      <section class="py-space-xl px-margin sm:px-margin-tablet lg:px-margin-desktop bg-surface" id="protocol">
        <div class="text-center max-w-2xl mx-auto mb-16">
          <span class="font-label-md text-label-md uppercase tracking-widest text-secondary block mb-2">Operational Precision</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface">The Concierge Protocol</h2>
          <p class="font-body-lg text-body-lg text-on-surface-variant mt-3">
            From initial encrypted brief to tarmac touchdown, every movement follows a four-stage sovereign workflow.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative">
          
          <!-- Step 01 -->
          <div class="bg-surface-container-low p-6 sm:p-8 rounded-2xl flex flex-col justify-between relative group hover:bg-surface-container transition-colors border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-8">
                <span class="font-headline-md text-headline-md text-secondary font-light">01</span>
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                  <span class="material-symbols-outlined text-[20px]">lock</span>
                </div>
              </div>
              <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Phase I</span>
              <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">Confidential Briefing</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Direct single point-of-contact via encrypted liaison. Security vetting, private dietary requirements, and biological rhythm preferences established.
              </p>
            </div>
            <div class="mt-6 pt-4 border-t border-surface-container">
              <span class="font-label-sm text-label-sm text-on-surface-variant">SLA Window: &lt; 15 Minutes</span>
            </div>
          </div>

          <!-- Step 02 -->
          <div class="bg-surface-container-low p-6 sm:p-8 rounded-2xl flex flex-col justify-between relative group hover:bg-surface-container transition-colors border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-8">
                <span class="font-headline-md text-headline-md text-secondary font-light">02</span>
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                  <span class="material-symbols-outlined text-[20px]">hub</span>
                </div>
              </div>
              <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Phase II</span>
              <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">Asset Allocation</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Direct requisition of off-market private estates, priority air traffic slots, diplomatic ramp access, and vetted support staff worldwide.
              </p>
            </div>
            <div class="mt-6 pt-4 border-t border-surface-container">
              <span class="font-label-sm text-label-sm text-on-surface-variant">Zero Third-Party Brokers</span>
            </div>
          </div>

          <!-- Step 03 -->
          <div class="bg-surface-container-low p-6 sm:p-8 rounded-2xl flex flex-col justify-between relative group hover:bg-surface-container transition-colors border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-8">
                <span class="font-headline-md text-headline-md text-secondary font-light">03</span>
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                  <span class="material-symbols-outlined text-[20px]">draft</span>
                </div>
              </div>
              <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Phase III</span>
              <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">Dossier Delivery</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Dispatched via physical wax-sealed archival parcel to your residence, or synchronized directly to our biometric patron portal.
              </p>
            </div>
            <div class="mt-6 pt-4 border-t border-surface-container">
              <span class="font-label-sm text-label-sm text-on-surface-variant">PGP 4096-bit Encrypted</span>
            </div>
          </div>

          <!-- Step 04 -->
          <div class="bg-surface-container-low p-6 sm:p-8 rounded-2xl flex flex-col justify-between relative group hover:bg-surface-container transition-colors border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-8">
                <span class="font-headline-md text-headline-md text-secondary font-light">04</span>
                <div class="w-10 h-10 rounded-full bg-surface-container-high flex items-center justify-center text-primary">
                  <span class="material-symbols-outlined text-[20px]">shield</span>
                </div>
              </div>
              <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Phase IV</span>
              <h3 class="font-headline-sm text-headline-sm text-on-surface mb-3">Ground Execution</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                24/7 on-ground liaison shadowing your itinerary. Discrete security detachment, customs bypass, and seamless real-time adaptability.
              </p>
            </div>
            <div class="mt-6 pt-4 border-t border-surface-container">
              <span class="font-label-sm text-label-sm text-on-surface-variant">Swiss Standard Discretion</span>
            </div>
          </div>

        </div>
      </section>

      <!-- =====================================================================
           SECTION 5: SOVEREIGN MEMBERSHIP TIERS
           ===================================================================== -->
      <section class="py-space-xl bg-surface-container-low px-margin sm:px-margin-tablet lg:px-margin-desktop border-y border-surface-container" id="membership">
        <div class="text-center max-w-2xl mx-auto mb-16">
          <span class="font-label-md text-label-md uppercase tracking-widest text-secondary block mb-2">Bespoke Guild</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface">Private Office Membership</h2>
          <p class="font-body-lg text-body-lg text-on-surface-variant mt-3">
            Membership is strictly capped at three hundred global patrons annually to guarantee uninterrupted concierge responsiveness.
          </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
          
          <!-- Tier 1: Silver Horizon -->
          <div class="bg-surface rounded-3xl p-8 sm:p-10 shadow-sm flex flex-col justify-between border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-4">
                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Tier I</span>
                <span class="font-label-sm text-label-sm uppercase tracking-widest bg-surface-container px-3 py-1 rounded-full text-on-surface">Regional Distinction</span>
              </div>
              <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Silver Horizon</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant mb-6">Designed for patrons with active intra-continental European and Mediterranean movements.</p>
              <div class="mb-8">
                <span class="font-display text-[44px] leading-none text-on-surface">$25,000</span>
                <span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider block mt-1">Annual Retainer</span>
              </div>
              <ul class="space-y-4 mb-8">
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>24-Hour SLA response guarantee</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Regional light &amp; mid-size jet fleet access</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Access to 120 curated partner villas</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Dedicated seasonal travel coordinator</span>
                </li>
              </ul>
            </div>
            <button class="w-full py-3.5 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" onclick="openConsultation('Membership Retainer: Silver Horizon')">
              Apply For Retainer
            </button>
          </div>

          <!-- Tier 2: Gold Sovereign (Featured) -->
          <div class="bg-surface rounded-3xl p-8 sm:p-10 shadow-xl flex flex-col justify-between relative transform lg:-translate-y-4 bg-gradient-to-b from-surface via-surface to-surface-container-low border-2 border-secondary-fixed">
            <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm uppercase tracking-widest px-4 py-1 rounded-full shadow-sm font-semibold">
              Most Requested Tier
            </div>
            <div>
              <div class="flex items-center justify-between mb-4 mt-2">
                <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary font-semibold">Tier II</span>
                <span class="font-label-sm text-label-sm uppercase tracking-widest bg-secondary-fixed/40 text-on-surface px-3 py-1 rounded-full">Global Sovereign</span>
              </div>
              <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Gold Sovereign</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant mb-6">Unrestricted global access for high-profile principals and their immediate family trusts.</p>
              <div class="mb-8">
                <span class="font-display text-[44px] leading-none text-on-surface">$65,000</span>
                <span class="font-label-md text-label-md text-secondary uppercase tracking-wider block mt-1">Annual Retainer</span>
              </div>
              <ul class="space-y-4 mb-8">
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>4-Hour SLA priority dispatch guarantee</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Ultra long-range jets (G650ER, 7500) &amp; 60m+ yachts</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>250+ private off-market sanctuaries worldwide</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Diplomatic tarmac immigration and priority FBO</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>24/7 designated Private Office Director</span>
                </li>
              </ul>
            </div>
            <button class="w-full py-4 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary hover:bg-secondary hover:text-on-secondary transition-all shadow-md cursor-pointer" onclick="openConsultation('Membership Retainer: Gold Sovereign')">
              Petition For Sovereign Seal
            </button>
          </div>

          <!-- Tier 3: Black Diamond Elite -->
          <div class="bg-surface rounded-3xl p-8 sm:p-10 shadow-sm flex flex-col justify-between border border-surface-container">
            <div>
              <div class="flex items-center justify-between mb-4">
                <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant">Tier III</span>
                <span class="font-label-sm text-label-sm uppercase tracking-widest bg-primary text-on-primary px-3 py-1 rounded-full">Imperial Status</span>
              </div>
              <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Black Diamond Elite</h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant mb-6">Confidential mission coordination for sovereign heads, state delegations, and royal dynasties.</p>
              <div class="mb-8">
                <span class="font-display text-[44px] leading-none text-on-surface">$150,000</span>
                <span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider block mt-1">Annual Retainer</span>
              </div>
              <ul class="space-y-4 mb-8">
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Immediate (&lt;15 min) SLA response at all hours</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Unlimited mission orchestrations worldwide</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Direct personal line to Founder &amp; Senior Quorum</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Dedicated encrypted satellite communications terminal</span>
                </li>
                <li class="flex items-center gap-3 font-body-sm text-body-sm text-on-surface">
                  <span class="material-symbols-outlined text-secondary text-[18px]">check_circle</span>
                  <span>Pre-cleared global asset commandeering rights</span>
                </li>
              </ul>
            </div>
            <button class="w-full py-3.5 rounded-full font-label-md text-label-md uppercase tracking-wider bg-surface-container text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" onclick="openConsultation('Membership Retainer: Black Diamond Elite')">
              Confidential Vetting Request
            </button>
          </div>

        </div>
      </section>

      <!-- =====================================================================
           SECTION 6: DIPLOMATIC STANDARD & TRUST
           ===================================================================== -->
      <section class="py-space-xl px-margin sm:px-margin-tablet lg:px-margin-desktop bg-surface" id="protocol-trust">
        <div class="rounded-3xl bg-surface-container-low p-8 sm:p-12 lg:p-16 border border-surface-container">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-12">
            <div>
              <span class="font-label-md text-label-md uppercase tracking-widest text-secondary block mb-2">Institutional Assurance</span>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">The Diplomatic Standard</h2>
              <p class="font-body-lg text-body-lg text-on-surface-variant mt-4 leading-relaxed">
                Operating under strict Swiss regulatory oversight in the Canton of Geneva. Our operations bridge private international banking confidentiality with diplomatic aviation privileges.
              </p>
            </div>
            
            <!-- Trust Credentials List -->
            <div class="bg-surface rounded-2xl p-6 sm:p-8 shadow-sm flex flex-col justify-around gap-4 border border-surface-container">
              <div class="flex items-center gap-4">
                <span class="material-symbols-outlined text-secondary text-[32px]">balance</span>
                <div>
                  <span class="font-headline-sm text-headline-sm text-on-surface text-[18px]">Article 47 Swiss Banking Secrecy</span>
                  <p class="font-body-sm text-body-sm text-on-surface-variant">Patron identities and itineraries safeguarded under penal confidentiality legislation.</p>
                </div>
              </div>
              <div class="h-px bg-surface-container"></div>
              <div class="flex items-center gap-4">
                <span class="material-symbols-outlined text-secondary text-[32px]">vpn_key</span>
                <div>
                  <span class="font-headline-sm text-headline-sm text-on-surface text-[18px]">Biometric Zero-Terminal Customs</span>
                  <p class="font-body-sm text-body-sm text-on-surface-variant">Pre-inspected sovereign transfers without passing public commercial gates.</p>
                </div>
              </div>
            </div>
          </div>

          <!-- 4 Trust Pillars -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-surface p-6 rounded-2xl border border-surface-container">
              <div class="w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center text-secondary mb-4">
                <span class="material-symbols-outlined text-[24px]">verified</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface text-[20px] mb-2">FINMA Protocols</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant">All financial transactions and escrow retainers cleared through verified Swiss clearing accounts.</p>
            </div>

            <div class="bg-surface p-6 rounded-2xl border border-surface-container">
              <div class="w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center text-secondary mb-4">
                <span class="material-symbols-outlined text-[24px]">fingerprint</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface text-[20px] mb-2">Encrypted Vaults</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant">Client itineraries stored in air-gapped bunkers carved beneath the Swiss Alps.</p>
            </div>

            <div class="bg-surface p-6 rounded-2xl border border-surface-container">
              <div class="w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center text-secondary mb-4">
                <span class="material-symbols-outlined text-[24px]">flight</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface text-[20px] mb-2">Diplomatic Corridors</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant">Unrestricted bilateral flight clearances secured through direct embassy liaison desks.</p>
            </div>

            <div class="bg-surface p-6 rounded-2xl border border-surface-container">
              <div class="w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center text-secondary mb-4">
                <span class="material-symbols-outlined text-[24px]">group_work</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface text-[20px] mb-2">Dual-Advisor Quorum</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant">Every mission itinerary is reviewed and signed off by two senior partner directors.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- =====================================================================
           SECTION 7: INTERACTIVE CONSULTATION DESK
           ===================================================================== -->
      <section class="py-space-xl bg-surface-container-low px-margin sm:px-margin-tablet lg:px-margin-desktop border-t border-surface-container" id="consultation">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
          
          <!-- Narrative Column -->
          <div class="lg:col-span-5 flex flex-col justify-between">
            <div>
              <span class="font-label-md text-label-md uppercase tracking-widest text-secondary block mb-2">Private Office Inquiry</span>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">Initiate a Confidential Mission</h2>
              <p class="font-body-lg text-body-lg text-on-surface-variant mt-4 leading-relaxed">
                Please submit your confidential operational brief. Your assigned Private Office Attach&eacute; will establish communication via your preferred encrypted channel within 14 minutes.
              </p>
              <div class="mt-8 space-y-4">
                <div class="flex items-center gap-4 bg-surface p-4 rounded-xl border border-surface-container">
                  <span class="material-symbols-outlined text-secondary text-[24px]">phone_in_talk</span>
                  <div>
                    <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Swiss Direct Desk</span>
                    <span class="font-headline-sm text-headline-sm text-on-surface text-[18px]">+41 22 819 9000</span>
                  </div>
                </div>
                <div class="flex items-center gap-4 bg-surface p-4 rounded-xl border border-surface-container">
                  <span class="material-symbols-outlined text-secondary text-[24px]">mark_chat_read</span>
                  <div>
                    <span class="font-label-sm text-label-sm uppercase tracking-widest text-on-surface-variant block">Encrypted Signal &amp; Wire</span>
                    <span class="font-headline-sm text-headline-sm text-on-surface text-[18px]">office@bespoke-geneva.ch</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-8 p-4 bg-surface rounded-xl border border-surface-container">
              <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Covenant of Discretion</span>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                No submissions are stored on commercial web servers. All form telemetry is directly piped to our private on-premises Zurich cluster.
              </p>
            </div>
          </div>

          <!-- Interactive Consultation Form Card -->
          <div class="lg:col-span-7 bg-surface rounded-3xl p-8 sm:p-10 shadow-sm border border-surface-container">
            <form class="space-y-6" id="consultation-form" onsubmit="event.preventDefault(); handleConsultationSubmit();">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                  <label class="block font-label-md text-label-md uppercase tracking-wider text-on-surface mb-2">Principal or Liaison Name</label>
                  <input class="w-full bg-surface-container-low px-4 py-3 rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:bg-surface-container transition-all" placeholder="e.g. Lord Sterling / Family Office" required type="text"/>
                </div>
                <div>
                  <label class="block font-label-md text-label-md uppercase tracking-wider text-on-surface mb-2">Encrypted Contact (Signal / Phone)</label>
                  <input class="w-full bg-surface-container-low px-4 py-3 rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:bg-surface-container transition-all" placeholder="+41 22 000 0000" required type="tel"/>
                </div>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                  <label class="block font-label-md text-label-md uppercase tracking-wider text-on-surface mb-2">Primary Destination / Region</label>
                  <input class="w-full bg-surface-container-low px-4 py-3 rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:bg-surface-container transition-all" id="consultation-dest-input" placeholder="e.g. Swiss Alps, St. Tropez, Kyoto" type="text"/>
                </div>
                <div>
                  <label class="block font-label-md text-label-md uppercase tracking-wider text-on-surface mb-2">Target Departure Window</label>
                  <select class="w-full bg-surface-container-low px-4 py-3 rounded-xl font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container transition-all cursor-pointer">
                    <option>Within 48 Hours (Urgent SLA)</option>
                    <option selected>Winter High Season (Dec - Feb)</option>
                    <option>Spring Solstice (Mar - May)</option>
                    <option>Summer Mediterranean (Jun - Aug)</option>
                    <option>Autumn Harvest / Custom</option>
                  </select>
                </div>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                  <label class="block font-label-md text-label-md uppercase tracking-wider text-on-surface mb-2">Party Size &amp; Entourage</label>
                  <select class="w-full bg-surface-container-low px-4 py-3 rounded-xl font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container transition-all cursor-pointer">
                    <option>Solo Principal (1)</option>
                    <option selected>Private Family (2 - 4)</option>
                    <option>Extended Delegation (5 - 8)</option>
                    <option>Royal Retinue &amp; Security (9+)</option>
                  </select>
                </div>
                <div>
                  <label class="block font-label-md text-label-md uppercase tracking-wider text-on-surface mb-2">Asset Class Preference</label>
                  <select class="w-full bg-surface-container-low px-4 py-3 rounded-xl font-body-md text-body-md text-on-surface focus:outline-none focus:bg-surface-container transition-all cursor-pointer">
                    <option>Ultra Long-Range Jet (G650 / 7500)</option>
                    <option>Superyacht Charter (50m+)</option>
                    <option>Private Alpine Estate &amp; Heli</option>
                    <option selected>Integrated Sovereign Portfolio</option>
                  </select>
                </div>
              </div>
              <div>
                <label class="block font-label-md text-label-md uppercase tracking-wider text-on-surface mb-2">Confidential Operational Directives</label>
                <textarea class="w-full bg-surface-container-low p-4 rounded-xl font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant/60 focus:outline-none focus:bg-surface-container transition-all resize-none" placeholder="Detail any non-disclosure specifications, customs protocol requirements, armed security coordination, or specialized culinary demands..." rows="4"></textarea>
              </div>
              <div class="flex items-center gap-3">
                <input checked class="w-4 h-4 rounded text-primary focus:ring-0 accent-primary cursor-pointer" id="nda-agree" type="checkbox"/>
                <label class="font-body-sm text-body-sm text-on-surface-variant cursor-pointer" for="nda-agree">
                  Enforce Swiss Private Banking Article 47 reciprocal Non-Disclosure Agreement.
                </label>
              </div>
              <button class="w-full py-4 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary hover:bg-secondary hover:text-on-secondary transition-all shadow-md flex items-center justify-center gap-2 cursor-pointer" type="submit">
                <span>Dispatch Request to Senior Partner</span>
                <span class="material-symbols-outlined text-[18px]">send</span>
              </button>
            </form>
          </div>

        </div>
      </section>

      <!-- =====================================================================
           VIP PORTAL AUTHENTICATION MODAL (CONNECTING TO MVC DASHBOARD)
           ===================================================================== -->
      <div class="fixed inset-0 z-50 bg-primary/70 backdrop-blur-md hidden items-center justify-center p-4" id="vip-modal">
        <div class="bg-surface rounded-3xl max-w-md w-full p-8 sm:p-10 shadow-2xl relative border border-surface-container">
          <button class="absolute top-6 right-6 w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" onclick="closeVipModal()">
            <span class="material-symbols-outlined text-[18px]">close</span>
          </button>
          <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl bg-secondary-fixed mx-auto mb-4 flex items-center justify-center text-on-secondary-fixed shadow-sm">
              <span class="material-symbols-outlined text-[28px]">lock</span>
            </div>
            <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block mb-1">Encrypted Patron Gateway</span>
            <h3 class="font-headline-md text-headline-md text-on-surface">VIP Sovereign Vault</h3>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-2">Enter your designated Patron Dossier identifier and secondary biometric key.</p>
          </div>
          
          <form class="space-y-4" onsubmit="event.preventDefault(); handleVipLogin();">
            <div>
              <label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-2">Member ID / Dossier N&deg;</label>
              <input class="w-full bg-surface-container-low px-4 py-3 rounded-xl font-label-md text-label-md uppercase tracking-wider text-on-surface focus:outline-none focus:bg-surface-container transition-all" value="BSPK-8849-CH" required type="text"/>
            </div>
            <div>
              <label class="block font-label-sm text-label-sm uppercase tracking-wider text-on-surface mb-2">6-Digit Cryptographic PIN</label>
              <input class="w-full bg-surface-container-low px-4 py-3 rounded-xl text-center tracking-[0.5em] text-xl font-mono text-on-surface focus:outline-none focus:bg-surface-container transition-all" maxlength="6" value="123456" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;" required type="password"/>
            </div>
            <button id="btn-auth-submit" class="w-full mt-2 py-3.5 rounded-full font-label-md text-label-md uppercase tracking-wider bg-primary text-on-primary hover:bg-secondary hover:text-on-secondary transition-all flex items-center justify-center gap-2 cursor-pointer shadow-md" type="submit">
              <span>Authenticate &amp; Enter Portal</span>
              <span class="material-symbols-outlined text-[18px]">key</span>
            </button>
          </form>

          <div class="mt-6 pt-4 border-t border-surface-container text-center">
            <span class="font-label-sm text-label-sm text-on-surface-variant block">Protected under 256-bit AES Elliptic Curve Encryption</span>
            <span class="font-label-sm text-label-sm text-secondary uppercase tracking-widest mt-1 block">Z&uuml;rich Data Bunker Online</span>
          </div>
        </div>
      </div>

      <!-- =====================================================================
           FILM / MONOGRAPH MODAL (POPUP)
           ===================================================================== -->
      <div class="fixed inset-0 z-50 bg-primary/80 backdrop-blur-lg hidden items-center justify-center p-4" id="video-modal">
        <div class="bg-surface rounded-3xl max-w-3xl w-full p-6 sm:p-8 shadow-2xl relative border border-surface-container">
          <button class="absolute top-6 right-6 w-9 h-9 rounded-full bg-surface-container flex items-center justify-center text-on-surface hover:bg-surface-container-high transition-colors cursor-pointer" onclick="closeVideoModal()">
            <span class="material-symbols-outlined text-[18px]">close</span>
          </button>
          <div class="mb-4">
            <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary block">Archival Motion Picture</span>
            <h3 class="font-headline-md text-headline-md text-on-surface">Winter in the Engadin Valley &mdash; 4K Reel</h3>
          </div>
          <div class="relative w-full h-80 sm:h-96 rounded-2xl overflow-hidden bg-primary flex items-center justify-center">
            <div class="w-full h-full bg-cover bg-center opacity-85" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBvQ1kbpBf37NdpnskkiN1aer5-1e8UiXYYIJt1u9UZKiEYAnlG-h-QmczU9Fr9rIVGiMYF51GOAe7rhJmB7pOsHHuETtsisMP6M04fiO7Uu1HfwCaBuh_zZ59pHwNcX9a0oNFMryazk6wVao7_9lbQF6rNXd17a6fQochVzKoRLj3nHLLM-QRXGQRadozgUScaySw3L2OFSs5R-dl9JXSK7AO8JhEk7vpb5CyCcD4')"></div>
            <div class="absolute inset-0 bg-primary/40 flex flex-col items-center justify-center text-center p-6">
              <div class="w-16 h-16 rounded-full bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed mb-4 shadow-xl">
                <span class="material-symbols-outlined text-[32px]">play_arrow</span>
              </div>
              <span class="font-headline-sm text-headline-sm text-surface-container-lowest">Stream Initialized (Private Feed)</span>
              <span class="font-label-sm text-label-sm text-surface-container-high uppercase tracking-widest mt-1">Direct Encrypted Satellite Stream</span>
            </div>
          </div>
          <div class="mt-4 flex items-center justify-between font-label-sm text-label-sm text-on-surface-variant">
            <span>Runtime: 03:45 &bull; Shot on Arri Alexa LF</span>
            <span>Geneva Archive No. 2026-WTR-04</span>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- =========================================================================
       FOOTER
       ========================================================================= -->
  <footer class="w-full bg-surface-container-low py-space-xl border-t border-surface-container">
    <div class="w-full px-margin-tablet lg:px-margin-desktop">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-gutter-desktop mb-space-xl">
        <div class="lg:col-span-2 flex flex-col gap-space-sm">
          <div class="flex items-center gap-space-xs">
            <span class="font-headline-sm text-headline-sm uppercase tracking-widest text-on-surface">BESPOKE</span>
          </div>
          <p class="font-body-sm text-body-sm text-on-surface-variant max-w-md">Private Travel Office &amp; Diplomatic Hospitality Atelier. Access granted exclusively via peer recommendation and private board clearance.</p>
          <div class="flex items-center gap-space-sm pt-space-xs">
            <span class="font-label-sm text-label-sm uppercase tracking-widest text-secondary">FINMA &bull; Swiss Regulatory Discretion Assured</span>
          </div>
        </div>
        <div class="flex flex-col gap-space-xs">
          <span class="font-label-md text-label-md uppercase tracking-widest text-on-surface mb-space-xs">Global Desks</span>
          <div class="flex flex-col font-body-sm text-body-sm text-on-surface-variant gap-space-xs">
            <div><span class="text-on-surface block font-medium">Geneva (HQ)</span>Rue du Rh&ocirc;ne 42 &bull; +41 22 819 9000</div>
            <div><span class="text-on-surface block font-medium">London Mayfair</span>Berkeley Square 14 &bull; +44 20 7946 0910</div>
          </div>
        </div>
        <div class="flex flex-col gap-space-xs">
          <span class="font-label-md text-label-md uppercase tracking-widest text-on-surface mb-space-xs">Pacific &amp; Americas</span>
          <div class="flex flex-col font-body-sm text-body-sm text-on-surface-variant gap-space-xs">
            <div><span class="text-on-surface block font-medium">Kyoto Atelier</span>Gion-machi Minamigawa &bull; +81 75 531 8200</div>
            <div><span class="text-on-surface block font-medium">New York Salon</span>Madison Ave 740 &bull; +1 212 555 0198</div>
          </div>
        </div>
        <div class="flex flex-col gap-space-xs">
          <span class="font-label-md text-label-md uppercase tracking-widest text-on-surface mb-space-xs">Covenants</span>
          <nav class="flex flex-col font-body-sm text-body-sm text-on-surface-variant gap-space-xs">
            <a class="hover:text-on-surface transition-colors" href="#protocol">Security Protocol</a>
            <a class="hover:text-on-surface transition-colors" href="#fleet">Aviation Manifest</a>
            <a class="hover:text-on-surface transition-colors" href="dashboard.php">Encrypted Dossier Vault</a>
            <a class="hover:text-on-surface transition-colors" href="#consultation">Private Treaty Consultation</a>
          </nav>
        </div>
      </div>
      <div class="pt-space-md flex flex-col md:flex-row items-center justify-between gap-space-sm font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest border-t border-surface-container">
        <div class="flex items-center gap-space-sm">
          <span>&copy; MMXXVI BESPOKE PRIVATE OFFICE SA. ALL RIGHTS RESERVED.</span>
          <span>&bull;</span>
          <span class="text-on-surface font-medium">Zaidaan Diandra (202410370110420)</span>
        </div>
        <div class="flex items-center gap-space-md">
          <span class="text-secondary">Strictly Confidential</span>
          <span>SWIFT / BIC &bull; BESPCHGG</span>
          <span>Encrypted PGP 4096-bit</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- =========================================================================
       LIGHTWEIGHT INTERACTIVE JAVASCRIPT LOGIC
       ========================================================================= -->
  <script>
    // Expeditions Filter Tab Interaction
    document.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-btn').forEach(b => {
          b.classList.remove('bg-primary', 'text-on-primary', 'active');
          b.classList.add('text-on-surface-variant');
        });
        btn.classList.add('bg-primary', 'text-on-primary', 'active');
        btn.classList.remove('text-on-surface-variant');

        const cat = btn.getAttribute('data-category');
        document.querySelectorAll('.expedition-card').forEach(card => {
          if (cat === 'all' || card.getAttribute('data-category') === cat) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    // VIP Modal Triggers
    function openVipModal() {
      const modal = document.getElementById('vip-modal');
      if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    }

    function closeVipModal() {
      const modal = document.getElementById('vip-modal');
      if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }

    // Video Modal Triggers
    function openVideoModal() {
      const modal = document.getElementById('video-modal');
      if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    }

    function closeVideoModal() {
      const modal = document.getElementById('video-modal');
      if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }

    // Helpers
    function openConsultation(destinationName) {
      const destInput = document.getElementById('consultation-dest-input');
      if (destInput) {
        destInput.value = destinationName;
      }
      const section = document.getElementById('consultation');
      if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
      }
    }

    function handleConsultationSubmit() {
      alert('Mission directive registered with the Private Office Quorum. Your designated duty attaché will establish encrypted contact within 14 minutes.');
      document.getElementById('consultation-form').reset();
    }

    function handleSearchSubmit() {
      const dest = document.getElementById('quick-dest')?.value || 'Bespoke Expedition';
      alert('Inquiring private route availability for: ' + dest + '\nRedirecting to VIP Patron Portal...');
      window.location.href = 'dashboard.php';
    }

    function handleVipLogin() {
      const btn = document.getElementById('btn-auth-submit');
      if (btn) btn.innerHTML = '<span>Authorizing Biometrics...</span>';
      setTimeout(() => {
        window.location.href = 'dashboard.php';
      }, 500);
    }
  </script>

</body>
</html>

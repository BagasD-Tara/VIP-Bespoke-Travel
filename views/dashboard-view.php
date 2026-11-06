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
    'name' => 'Alexander Wright',
    'title' => 'Lord Alexander Wright',
    'member_id' => 'VIP-8821',
    'tier' => 'Black Diamond Tier',
    'city' => 'Geneva / Zurich',
    'avatar_initials' => 'AW'
];

$stats = $stats ?? [
    'total_requests' => 6,
    'total_budget' => '$536,000',
    'response_time' => '< 12 Mins Direct'
];

$requests = $requests ?? [];
$availableStatuses = $availableStatuses ?? [
    'all' => count($requests) > 0 ? count($requests) : 6,
    'Approved' => 2,
    'In Review' => 2,
    'Planning' => 1,
    'Confirmed' => 1
];
$activeFilter = $activeFilter ?? 'all';
?>
<!DOCTYPE html>
<html class="dark" lang="en"><head><meta charset="utf-8"/><meta content="width=device-width, initial-scale=1.0" name="viewport"/><meta content="web_dashboard" name="shell-type"/><title>Bespoke — Sovereign VIP Patron Portal</title><link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=EB+Garamond:ital,wght@0,400..800;1,400..800&amp;display=swap" rel="stylesheet"/><link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/><style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style><script src="https://cdn.tailwindcss.com"></script><script id="tailwind-config">tailwind.config = { darkMode: "class", theme: { extend: { "colors": { "on-tertiary": "#19362b", "inverse-surface": "#dee4de", "tertiary-container": "#aacaba", "secondary-fixed-dim": "#e9c176", "secondary": "#e9c176", "on-secondary-fixed-variant": "#5d4201", "primary-container": "#dfbe7e", "surface-container-high": "#252b28", "on-surface-variant": "#d0c5b5", "on-tertiary-fixed": "#022016", "on-background": "#dee4de", "secondary-container": "#604403", "tertiary": "#c5e6d5", "on-secondary-fixed": "#261900", "surface-container": "#1b211e", "surface-variant": "#303632", "on-tertiary-fixed-variant": "#304d40", "surface-dim": "#0f1512", "primary-fixed-dim": "#e3c282", "background": "#0f1512", "surface": "#0f1512", "error": "#ffb4ab", "surface-container-low": "#171d1a", "on-tertiary-container": "#395649", "on-primary-fixed-variant": "#5a430f", "secondary-fixed": "#ffdea5", "on-error-container": "#ffdad6", "on-primary": "#402d00", "primary": "#fdda97", "surface-container-lowest": "#090f0c", "inverse-primary": "#745b25", "surface-tint": "#e3c282", "error-container": "#93000a", "surface-bright": "#343b37", "tertiary-fixed-dim": "#adcebe", "on-primary-container": "#644c17", "tertiary-fixed": "#c9ead9", "on-secondary-container": "#dab36a", "inverse-on-surface": "#2b322e", "on-error": "#690005", "primary-fixed": "#ffdea1", "on-surface": "#dee4de", "on-primary-fixed": "#261900", "outline-variant": "#4d463a", "on-secondary": "#412d00", "outline": "#998f81", "surface-container-highest": "#303632" }, "borderRadius": { "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem" }, "spacing": { "space-lg": "1.75rem", "margin-mobile": "1rem", "space-sm": "0.5rem", "space-xl": "3rem", "gutter-mobile": "0.75rem", "margin": "3rem", "space-md": "1rem", "space-xs": "0.25rem", "gutter": "1.5rem" }, "fontFamily": { "headline-lg-mobile": [ "EB Garamond" ], "headline-sm": [ "EB Garamond" ], "title-lg": [ "DM Sans" ], "label-md": [ "DM Sans" ], "headline-md": [ "EB Garamond" ], "label-caps": [ "DM Sans" ], "body-lg": [ "DM Sans" ], "display-hero-mobile": [ "EB Garamond" ], "display-hero": [ "EB Garamond" ], "headline-lg": [ "EB Garamond" ], "body-md": [ "DM Sans" ], "telemetry-numeric": [ "DM Sans" ] }, "fontSize": { "headline-lg-mobile": [ "28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "400" } ], "headline-sm": [ "22px", { "lineHeight": "28px", "letterSpacing": "0em", "fontWeight": "500" } ], "title-lg": [ "18px", { "lineHeight": "24px", "letterSpacing": "0.01em", "fontWeight": "500" } ], "label-md": [ "12px", { "lineHeight": "16px", "letterSpacing": "0.06em", "fontWeight": "500" } ], "headline-md": [ "28px", { "lineHeight": "36px", "letterSpacing": "-0.01em", "fontWeight": "400" } ], "label-caps": [ "10px", { "lineHeight": "14px", "letterSpacing": "0.14em", "fontWeight": "600" } ], "body-lg": [ "16px", { "lineHeight": "26px", "letterSpacing": "0em", "fontWeight": "400" } ], "display-hero-mobile": [ "36px", { "lineHeight": "44px", "letterSpacing": "-0.01em", "fontWeight": "400" } ], "display-hero": [ "56px", { "lineHeight": "64px", "letterSpacing": "-0.02em", "fontWeight": "400" } ], "headline-lg": [ "40px", { "lineHeight": "48px", "letterSpacing": "-0.015em", "fontWeight": "400" } ], "body-md": [ "14px", { "lineHeight": "22px", "letterSpacing": "0.01em", "fontWeight": "400" } ], "telemetry-numeric": [ "13px", { "lineHeight": "18px", "letterSpacing": "0.04em", "fontWeight": "500" } ] } } } };</script></head><body class="bg-surface-container-lowest font-body-md text-on-surface antialiased">

<!-- FIXED SOVEREIGN SIDEBAR -->
<aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-low/95 backdrop-blur-xl z-50 flex flex-col justify-between shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="flex flex-col"><div class="h-20 px-space-md flex items-center gap-space-sm bg-surface-container-lowest/60"><span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span><span class="font-headline-sm text-headline-sm text-primary tracking-[0.25em] uppercase font-medium">BESPOKE</span><span class="ml-auto font-label-caps text-label-caps uppercase text-primary px-space-xs py-0.5 bg-surface-container-high rounded text-opacity-90"><?= safe($client['member_id'] ?? 'VIP-8821') ?></span></div><div class="px-space-md pt-space-md pb-space-sm"><span class="font-label-caps text-label-caps uppercase text-outline tracking-widest">Sovereign Consoles</span></div><nav class="flex flex-col gap-space-xs px-space-sm" data-active-classes="bg-surface-container-high text-primary font-title-lg"><a aria-current="page" class="flex items-center gap-space-sm px-space-sm py-2.5 rounded transition-all bg-surface-container-high text-primary font-title-lg" data-path="overview" href="index.php"><span class="material-symbols-outlined text-[18px]">radar</span><span class="font-body-md text-body-md">Mission Telemetry</span></a><a class="flex items-center gap-space-sm px-space-sm py-2.5 rounded text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="flight-manifest" href="#aviation-radar"><span class="material-symbols-outlined text-[18px]">flight_takeoff</span><span class="font-body-md text-body-md">Aviation Manifest</span></a><a class="flex items-center gap-space-sm px-space-sm py-2.5 rounded text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="itinerary-planner" href="#dossiers-section"><span class="material-symbols-outlined text-[18px]">calendar_today</span><span class="font-body-md text-body-md">Curated Itinerary</span></a><a class="flex items-center gap-space-sm px-space-sm py-2.5 rounded text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="concierge-desk" href="#concierge-section"><span class="material-symbols-outlined text-[18px]">support_agent</span><span class="font-body-md text-body-md">Geneva Desk</span></a><a class="flex items-center gap-space-sm px-space-sm py-2.5 rounded text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="vault-ledger" href="#metrics-section"><span class="material-symbols-outlined text-[18px]">account_balance</span><span class="font-body-md text-body-md">Vault &amp; Ledger</span></a><a class="flex items-center gap-space-sm px-space-sm py-2.5 rounded text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all" data-path="patron-credentials" href="public/dashboard.php"><span class="material-symbols-outlined text-[18px]">verified_user</span><span class="font-body-md text-body-md">SSR Portal</span></a></nav></div><div class="p-space-md bg-surface-container-lowest/80 flex flex-col gap-space-xs"><div class="flex items-center justify-between text-outline"><span class="font-label-caps text-label-caps uppercase">Swiss Sovereign Node</span><span class="font-telemetry-numeric text-telemetry-numeric text-tertiary">GENEVA-01</span></div><div class="flex items-center justify-between text-outline"><span class="font-label-caps text-label-caps uppercase">Transit Clearance</span><span class="font-telemetry-numeric text-telemetry-numeric text-primary">DIPLOMATIC</span></div></div></aside>

<!-- MAIN CONTENT WRAPPER -->
<div class="pl-72 flex flex-col min-h-screen">

<!-- TOP HEADER -->
<header class="fixed top-0 left-72 right-0 h-20 bg-surface-container-low/90 backdrop-blur-xl z-40 shadow-[0_1px_8px_rgba(0,0,0,0.04)]"><div class="w-full h-full px-space-lg flex items-center justify-between"><div class="flex items-center gap-space-md"><a class="flex items-center gap-space-xs text-on-surface-variant hover:text-primary transition-colors py-1.5 px-space-sm rounded bg-surface-container/60 hover:bg-surface-container-high" href="latihan1.php"><span class="material-symbols-outlined text-[16px]">arrow_back</span><span class="font-body-md text-body-md font-medium tracking-wide">Back to Public Advisory</span></a><div class="h-4 w-px bg-outline-variant/40 hidden sm:block"></div><span class="font-label-caps text-label-caps text-outline uppercase tracking-wider hidden md:inline">Patron Vault: <?= safe($client['member_id'] ?? 'VIP-8821') ?></span></div><div class="flex items-center gap-space-sm"><div class="hidden xl:flex items-center gap-1.5 px-space-sm py-1 bg-surface-container-lowest/80 rounded text-on-surface-variant"><span class="material-symbols-outlined text-[14px] text-primary">lock</span><span class="font-telemetry-numeric text-telemetry-numeric">Encrypted Signal 256-bit</span></div><div class="hidden lg:flex items-center gap-1.5 px-space-sm py-1 bg-surface-container-lowest/80 rounded text-on-surface-variant"><span class="w-1.5 h-1.5 rounded-full bg-tertiary animate-ping"></span><span class="font-telemetry-numeric text-telemetry-numeric text-tertiary">Geneva Desk Online</span></div><button class="relative p-2 rounded hover:bg-surface-container-high text-on-surface-variant hover:text-primary transition-colors" title="Notifications"><span class="material-symbols-outlined text-[20px]">notifications</span><span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-secondary ring-2 ring-surface-container-low"></span></button><div class="flex items-center gap-space-sm pl-space-xs py-1 pr-space-sm rounded bg-surface-container/70"><div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center font-bold text-on-primary text-xs"><?= safe($client['avatar_initials'] ?? 'AW') ?></div><div class="hidden md:flex flex-col text-left"><span class="font-title-lg text-title-lg text-on-surface leading-tight"><?= safe($client['title'] ?? 'Lord Alexander Wright') ?></span><span class="font-label-caps text-label-caps text-primary tracking-widest uppercase"><?= safe($client['tier'] ?? 'Black Diamond Tier') ?></span></div></div></div></div></header>

<div class="pt-20"><div class="w-full bg-surface-container-lowest/90 px-space-lg py-2 flex flex-wrap items-center justify-between text-outline text-label-caps font-label-caps tracking-widest uppercase"><div class="flex items-center gap-space-sm"><span class="text-tertiary">FINMA Compliant</span><span>·</span><span>Session: CH-GVA-990422-AUTH</span><span>·</span><span>Dual-Signoff Quorum Active</span></div><div class="flex items-center gap-space-md"><span class="text-on-surface-variant">UTC <?= date('H:i:s') ?></span><span>·</span><span class="text-primary">Zurich Vault Mirror Synced</span></div></div>

<main class="w-full px-space-lg py-space-lg bg-surface-container-lowest"><div class="flex flex-col w-full">

<!-- Top Sovereign Header / Hero Section -->
<section class="relative w-full mb-space-lg" id="concierge-section">
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md mb-space-md">
<div class="flex flex-col gap-1.5">
<div class="flex items-center gap-space-xs text-primary font-label-caps text-label-caps uppercase tracking-widest">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary shadow-[0_0_8px_rgba(197,230,213,0.8)]"></span>
<span>Sovereign Patron Tier · Vault Ref #BW-8821-SWISS</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface font-normal tracking-tight">
  Good evening, <?= safe($client['title'] ?? 'Lord Alexander Wright') ?>
</h1>
<div class="flex items-center gap-2 text-on-surface-variant font-body-md text-body-md">
<span class="inline-flex items-center justify-center w-2 h-2 rounded-full bg-tertiary animate-pulse"></span>
<span>Swiss Concierge Desk Active</span>
<span class="text-outline-variant">·</span>
<span class="text-secondary font-medium">Managing Partner: Marc-André V. on standby (Geneva HQ)</span>
</div>
</div>
<div class="flex items-center gap-space-xs bg-surface-container-low px-space-md py-space-sm rounded shadow-sm self-start lg:self-auto">
<span class="material-symbols-outlined text-primary text-[18px]">verified</span>
<div class="flex flex-col">
<span class="font-label-caps text-label-caps uppercase text-outline">Authentication Status</span>
<span class="font-telemetry-numeric text-telemetry-numeric text-tertiary">Diplomatic Biometric Quorum · Validated</span>
</div>
</div>
</div>

<!-- Intelligent Concierge AI Query Bar -->
<div class="w-full bg-surface-container-low/90 backdrop-blur-xl p-space-md rounded shadow-md relative overflow-hidden">
<div class="absolute -right-16 -top-16 w-64 h-64 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
<div class="flex flex-col md:flex-row items-stretch md:items-center gap-space-sm mb-space-xs">
<div class="relative flex-1 flex items-center">
<span class="material-symbols-outlined absolute left-3.5 text-primary text-[20px] pointer-events-none">auto_awesome</span>
<input class="w-full bg-surface-container-lowest text-on-surface font-body-md text-body-md pl-11 pr-4 py-3 rounded placeholder:text-outline focus:outline-none focus:bg-surface-container-high transition-all" id="concierge-input" placeholder="✦ Ask Concierge AI: Dispatch tail number, request private chef, or view tarmac security clearance..." type="text"/>
</div>
<button class="bg-primary text-on-primary font-label-md text-label-md px-space-md py-3 rounded tracking-wider uppercase font-semibold flex items-center justify-center gap-2 hover:bg-primary-container active:scale-[0.99] transition-all shadow-sm" id="btn-submit-advisor">
<span class="material-symbols-outlined text-[16px]">lock</span>
<span>Submit to Advisor</span>
</button>
</div>
<!-- Actionable Chips -->
<div class="flex flex-wrap items-center gap-2 pt-space-xs">
<span class="font-label-caps text-label-caps uppercase text-outline mr-1">Direct Prompts:</span>
<button class="px-2.5 py-1 rounded bg-surface-container text-on-surface-variant hover:text-primary hover:bg-surface-container-high text-telemetry-numeric font-telemetry-numeric transition-colors cursor-pointer" onclick="applyPrompt('Add caviar service to G650ER catering profile')">
  + Add caviar service to G650ER
</button>
<button class="px-2.5 py-1 rounded bg-surface-container text-on-surface-variant hover:text-primary hover:bg-surface-container-high text-telemetry-numeric font-telemetry-numeric transition-colors cursor-pointer" onclick="applyPrompt('Request St. Moritz heli transfer from Samedan (LSZS)')">
  + Request St. Moritz heli transfer
</button>
<button class="px-2.5 py-1 rounded bg-surface-container text-on-surface-variant hover:text-primary hover:bg-surface-container-high text-telemetry-numeric font-telemetry-numeric transition-colors cursor-pointer" onclick="applyPrompt('Confirm Monaco Paddock Club biometric tarmac passes')">
  + Verify Monaco tarmac clearance
</button>
</div>
</div>
</section>

<!-- Metric & Telemetry KPI Grid -->
<section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg" id="metrics-section">
<!-- Card 1 -->
<div class="bg-surface-container-low p-space-lg rounded shadow-sm relative group hover:bg-surface-container transition-all">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-caps text-label-caps uppercase text-outline tracking-wider">Active Expeditions</span>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-tertiary font-telemetry-numeric text-telemetry-numeric"><?= safe($availableStatuses['In Review'] ?? 2) + safe($availableStatuses['Planning'] ?? 1) + safe($availableStatuses['Approved'] ?? 2) ?> Active · <?= safe($availableStatuses['Confirmed'] ?? 1) ?> Confirmed</span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2"><?= safe($availableStatuses['all'] ?? count($requests)) ?> Portfolios</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-sm">Alps, Cote d'Azur, Kansai, Amalfi &amp; Serengeti</p>
<div class="w-full bg-surface-container-lowest h-1.5 rounded-full overflow-hidden flex">
<div class="bg-primary h-full w-2/3"></div>
<div class="bg-tertiary h-full w-1/3"></div>
</div>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-low p-space-lg rounded shadow-sm relative group hover:bg-surface-container transition-all">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-caps text-label-caps uppercase text-outline tracking-wider">Allocated Vault Portfolio</span>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-secondary font-telemetry-numeric text-telemetry-numeric">+12% Charter</span>
</div>
<div class="font-headline-lg text-headline-lg text-primary leading-none mb-2"><?= safe($stats['total_budget'] ?? '$536,000') ?></div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-sm">Escrow verified via Swiss Sovereign Clearing</p>
<div class="flex items-center gap-space-xs text-outline font-telemetry-numeric text-telemetry-numeric">
<span class="text-tertiary">CHF 482,000 Equiv</span>
<span>·</span>
<span>Zero Liquidity Lock</span>
</div>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-low p-space-lg rounded shadow-sm relative group hover:bg-surface-container transition-all">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-caps text-label-caps uppercase text-outline tracking-wider">Aviation Contingency</span>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-tertiary font-telemetry-numeric text-telemetry-numeric">99.4% Slot Direct</span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">100% Ready</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-sm">Dual standby: LSGG (Geneva) &amp; LFMN (Nice)</p>
<div class="flex items-center gap-1.5 text-secondary font-label-caps text-label-caps uppercase">
<span class="material-symbols-outlined text-[14px]">flight_takeoff</span>
<span>Gulfstream G650ER Crew Activated</span>
</div>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-low p-space-lg rounded shadow-sm relative group hover:bg-surface-container transition-all">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-caps text-label-caps uppercase text-outline tracking-wider">Senior Partner SLA</span>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-primary font-telemetry-numeric text-telemetry-numeric"><?= safe($stats['response_time'] ?? '< 12 Mins Direct') ?></span>
</div>
<div class="font-headline-lg text-headline-lg text-on-surface leading-none mb-2">Geneva Desk</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-space-sm">Dedicated Senior Dispatch: Marc-André V.</p>
<div class="flex items-center gap-1.5 text-outline font-telemetry-numeric text-telemetry-numeric">
<span class="w-2 h-2 rounded-full bg-tertiary"></span>
<span class="text-tertiary">Signal Channel Online</span>
<span>· Quorum Dual-Auth</span>
</div>
</div>
</section>

<!-- Live Flight Telemetry & Airspace Radar Banner -->
<section class="bg-surface-container-low p-space-lg rounded shadow-md mb-space-xl relative overflow-hidden" id="aviation-radar">
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-sm mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded bg-primary/10 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[20px]">radar</span>
</div>
<div>
<div class="flex items-center gap-2">
<h2 class="font-title-lg text-title-lg text-on-surface font-medium">Bespoke Intelligence™ · Live Flight Telemetry</h2>
<span class="px-2 py-0.5 rounded bg-surface-container-high text-tertiary font-label-caps text-label-caps uppercase tracking-wider">AI Route Optimized</span>
</div>
<span class="font-label-caps text-label-caps text-outline uppercase tracking-wider">Transponder Mode-S Transmit: HB-BSK · Trans-Alpine Corridor Safe</span>
</div>
</div>
<div class="flex items-center gap-space-md text-telemetry-numeric font-telemetry-numeric text-on-surface-variant">
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-tertiary animate-ping"></span>
<span class="text-tertiary">0% Turbulence Risk</span>
</div>
<span>·</span>
<span>Ground ETA: 15:42 CEST</span>
<span>·</span>
<span class="text-primary">Apron Maybach Ready</span>
</div>
</div>
<!-- Route Telemetry Graphics -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-md items-center bg-surface-container-lowest p-space-md rounded">
<div class="lg:col-span-4 flex flex-col gap-2">
<div class="flex items-baseline justify-between">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-outline uppercase">Departure Point</span>
<span class="font-headline-sm text-headline-sm text-primary">LSGG · Geneva</span>
<span class="font-body-md text-body-md text-on-surface-variant">Terminal VIP Jet Aviation</span>
</div>
<span class="material-symbols-outlined text-outline text-[24px]">trending_flat</span>
<div class="flex flex-col text-right">
<span class="font-label-caps text-label-caps text-outline uppercase">Destination Airstrip</span>
<span class="font-headline-sm text-headline-sm text-tertiary">LSZS · Samedan</span>
<span class="font-body-md text-body-md text-on-surface-variant">Engadin Airport St. Moritz</span>
</div>
</div>
<div class="bg-surface-container-low p-space-sm rounded mt-1 flex flex-col gap-1 text-telemetry-numeric font-telemetry-numeric">
<div class="flex justify-between text-outline">
<span>Airframe Model</span>
<span class="text-on-surface">Gulfstream G650ER</span>
</div>
<div class="flex justify-between text-outline">
<span>Cruising Speed &amp; Altitude</span>
<span class="text-on-surface">510 kts · FL410</span>
</div>
<div class="flex justify-between text-outline">
<span>Chauffeur Integration</span>
<span class="text-secondary font-medium">Maybach 62S Apron Standby</span>
</div>
</div>
</div>
<!-- SVG Flight Vector Path & Radar -->
<div class="lg:col-span-8 flex flex-col">
<div class="w-full h-32 relative flex items-center justify-center">
<svg class="w-full h-full" fill="none" preserveaspectratio="none" viewbox="0 0 600 120">
<!-- Grid Lines -->
<line class="text-surface-variant/40" stroke="currentColor" stroke-dasharray="4 4" x1="0" x2="600" y1="30" y2="30"></line>
<line class="text-surface-variant/40" stroke="currentColor" stroke-dasharray="4 4" x1="0" x2="600" y1="60" y2="60"></line>
<line class="text-surface-variant/40" stroke="currentColor" stroke-dasharray="4 4" x1="0" x2="600" y1="90" y2="90"></line>
<!-- Mountainous Horizon Silhouette (Subtle) -->
<path class="text-surface-container-high/40" d="M0 110 L80 95 L140 105 L230 75 L310 90 L400 65 L480 85 L540 70 L600 100 L600 120 L0 120 Z" fill="currentColor"></path>
<!-- Primary Flight Vector Trajectory -->
<path class="text-primary/30" d="M40 90 Q 220 15, 540 90" stroke="currentColor" stroke-dasharray="6 6" stroke-width="2"></path>
<path class="text-primary" d="M40 90 Q 220 15, 340 42" stroke="currentColor" stroke-width="2.5"></path>
<!-- Origin Beacon -->
<circle class="text-primary" cx="40" cy="90" fill="currentColor" r="5"></circle>
<circle class="text-primary/40" cx="40" cy="90" r="10" stroke="currentColor" stroke-width="1.5"></circle>
<text class="text-on-surface font-label-caps" fill="currentColor" font-size="10" text-anchor="middle" x="40" y="112">LSGG 14:45</text>
<!-- Destination Beacon -->
<circle class="text-tertiary" cx="540" cy="90" fill="currentColor" r="5"></circle>
<circle class="text-tertiary/40" cx="540" cy="90" r="12" stroke="currentColor" stroke-width="1.5"></circle>
<text class="text-on-surface font-label-caps" fill="currentColor" font-size="10" text-anchor="middle" x="540" y="112">LSZS 15:23</text>
<!-- Live Aircraft Coordinate -->
<g transform="translate(340, 42)">
<circle class="text-primary/20" cx="0" cy="0" fill="currentColor" r="14"></circle>
<circle class="text-primary" cx="0" cy="0" fill="currentColor" r="4"></circle>
<polygon class="text-primary" fill="currentColor" points="0,-7 6,5 0,3 -6,5" transform="rotate(50)"></polygon>
<text class="text-primary font-telemetry-numeric" fill="currentColor" font-size="11" font-weight="bold" x="12" y="-4">HB-BSK (38 min en-route)</text>
<text class="text-outline font-telemetry-numeric" fill="currentColor" font-size="9" x="12" y="10">FL410 · 510 KTS</text>
</g>
</svg>
</div>
<div class="flex items-center justify-between text-label-caps font-label-caps text-outline uppercase pt-2">
<span>Swiss Alpine Corridor Alpha</span>
<span>Live GPS Telemetry: 46.5050° N, 9.8789° E</span>
<span>Transponder Mode S / ADS-B Ver. 2</span>
</div>
</div>
</div>
</section>

<!-- Dossier Portfolio Grid & Filter Controls -->
<section class="w-full mb-space-xl" id="dossiers-section">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-md">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<h2 class="font-headline-md text-headline-md text-on-surface font-normal">Patron Itinerary Dossiers &amp; Expeditions</h2>
</div>
<p class="font-body-md text-body-md text-on-surface-variant">Confidential portfolios under bilateral non-disclosure protocols.</p>
</div>

<!-- Tab Filter System (Mendukung Client-side JS & URL Server Query) -->
<div class="flex items-center bg-surface-container-low p-1 rounded gap-1 overflow-x-auto max-w-full">
<button class="tab-filter-btn px-space-sm py-1.5 rounded font-label-md text-label-md transition-all <?= ($activeFilter === 'all' || $activeFilter === '') ? 'bg-primary text-on-primary font-semibold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" onclick="filterDossiers('all', this)">
  All Requests (<?= safe($availableStatuses['all'] ?? count($requests)) ?>)
</button>
<button class="tab-filter-btn px-space-sm py-1.5 rounded font-label-md text-label-md transition-all <?= (strtolower($activeFilter) === 'approved') ? 'bg-primary text-on-primary font-semibold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" onclick="filterDossiers('approved', this)">
  Approved (<?= safe($availableStatuses['Approved'] ?? 2) ?>)
</button>
<button class="tab-filter-btn px-space-sm py-1.5 rounded font-label-md text-label-md transition-all <?= (in_array(strtolower($activeFilter), ['in review', 'in-review'])) ? 'bg-primary text-on-primary font-semibold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" onclick="filterDossiers('in-review', this)">
  In Review (<?= safe($availableStatuses['In Review'] ?? 2) ?>)
</button>
<button class="tab-filter-btn px-space-sm py-1.5 rounded font-label-md text-label-md transition-all <?= (strtolower($activeFilter) === 'planning') ? 'bg-primary text-on-primary font-semibold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" onclick="filterDossiers('planning', this)">
  Planning (<?= safe($availableStatuses['Planning'] ?? 1) ?>)
</button>
<button class="tab-filter-btn px-space-sm py-1.5 rounded font-label-md text-label-md transition-all <?= (strtolower($activeFilter) === 'confirmed') ? 'bg-primary text-on-primary font-semibold' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-container' ?>" onclick="filterDossiers('confirmed', this)">
  Confirmed (<?= safe($availableStatuses['Confirmed'] ?? 1) ?>)
</button>
</div>
</div>

<!-- 3-Column Luxury Cards Grid (Render Dinamis dari PHP Model) -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-space-md" id="dossiers-grid">

<?php foreach ($requests as $item): ?>
  <?php
    $statusRaw = $item['status'] ?? 'Planning';
    $statusSlug = strtolower(str_replace(' ', '-', $statusRaw));
    
    // Status color badge
    $badgeColor = 'text-tertiary';
    $badgePulse = true;
    if ($statusSlug === 'in-review') {
      $badgeColor = 'text-secondary';
    } elseif ($statusSlug === 'planning') {
      $badgeColor = 'text-tertiary-fixed';
      $badgePulse = false;
    }
    
    $dossierRef = safe($item['dossier_ref'] ?? ('EXP-' . ($item['id'] ?? 'REF')));
    $destTitle = safe($item['destination'] ?? 'Luxury Expedition');
    $dates = safe($item['dates'] ?? '');
    $budget = safe($item['budget'] ?? '$0');
    $advisor = safe($item['advisor'] ?? 'Marc-André V.');
    $assetTag = safe($item['asset_tag'] ?? 'Private Jet & Chauffeur');
    $imgUrl = safe($item['image_url'] ?? '');
    $notes = safe($item['notes'] ?? '');
    $hash = 'SHA-256: ' . substr(hash('sha256', $dossierRef . $destTitle), 0, 16);
  ?>
  <div class="dossier-card bg-surface-container-low rounded p-space-lg flex flex-col justify-between shadow-sm hover:bg-surface-container transition-all relative overflow-hidden group" data-status="<?= $statusSlug ?>">
    <div class="flex flex-col gap-space-sm">
      <div class="flex items-center justify-between">
        <span class="font-telemetry-numeric text-telemetry-numeric text-outline"><?= $dossierRef ?></span>
        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded bg-surface-container-high <?= $badgeColor ?> font-label-caps text-label-caps uppercase">
          <?php if ($badgePulse): ?>
            <span class="w-1.5 h-1.5 rounded-full <?= ($statusSlug === 'in-review') ? 'bg-secondary' : 'bg-tertiary' ?> animate-pulse"></span>
          <?php endif; ?>
          <?= safe($statusRaw) ?>
        </span>
      </div>
      <!-- Image Container -->
      <div class="w-full h-36 rounded overflow-hidden relative">
        <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="<?= $destTitle ?>" alt="<?= $destTitle ?>" src="<?= $imgUrl ?>"/>
        <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-transparent to-transparent"></div>
        <div class="absolute bottom-2 left-3 text-on-surface font-telemetry-numeric text-telemetry-numeric"><?= $dates ?></div>
      </div>
      <div>
        <h3 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">
          <?= $destTitle ?>
        </h3>
        <p class="font-body-md text-body-md text-on-surface-variant mt-0.5">Asset: <?= $assetTag ?></p>
      </div>
      <div class="flex flex-wrap gap-1.5 pt-1">
        <?php if (!empty($item['services']) && is_array($item['services'])): ?>
          <?php foreach ($item['services'] as $svc): ?>
            <span class="px-2 py-0.5 rounded bg-surface-container-highest text-on-surface font-label-caps text-label-caps">✓ <?= safe($svc) ?></span>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="mt-space-md pt-space-sm border-t border-transparent bg-surface-container-lowest/50 -mx-space-lg -mb-space-lg p-space-md flex items-center justify-between">
      <div class="flex flex-col">
        <span class="font-label-caps text-label-caps uppercase text-outline">Budget / Advisor</span>
        <span class="font-title-lg text-title-lg text-primary"><?= $budget ?> <span class="text-label-caps text-outline font-normal">· <?= $advisor ?></span></span>
      </div>
      <button class="text-primary hover:text-secondary font-label-md text-label-md flex items-center gap-1 cursor-pointer" onclick="openDossierModal('<?= addslashes($destTitle) ?>', '<?= $budget ?>', '<?= addslashes($advisor) ?>', '<?= safe($statusRaw) ?>', '<?= $dossierRef ?>', '<?= $hash ?>')">
        <span>Encrypted Dossier</span>
        <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
      </button>
    </div>
  </div>
<?php endforeach; ?>

</div>
</section>

<!-- Architectural MVC & Vault Assurance Bar -->
<section class="bg-surface-container-low/70 p-space-md rounded shadow-sm flex flex-col md:flex-row items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<span class="material-symbols-outlined text-primary text-[20px]">account_balance</span>
<div class="flex flex-col">
<span class="font-body-md text-body-md text-on-surface font-medium">Bespoke Concierge Framework · MVC Architecture</span>
<span class="font-label-caps text-label-caps text-outline uppercase">Model: TravelModel · Controller: DashboardController · View: dashboard-view · Dev: Zaidaan Diandra (202410370110420)</span>
</div>
</div>
<div class="flex items-center gap-space-sm text-telemetry-numeric font-telemetry-numeric text-tertiary">
<span class="w-2 h-2 rounded-full bg-tertiary"></span>
<span>FINMA Protocol &amp; Article 47 Covenants Active</span>
</div>
</section>

<!-- Encrypted Dossier Drawer / Modal -->
<div class="fixed inset-0 z-50 bg-surface-container-lowest/80 backdrop-blur-md hidden items-center justify-center p-4" id="dossier-modal">
<div class="bg-surface-container-low max-w-2xl w-full rounded p-space-lg shadow-xl relative flex flex-col gap-space-md">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-caps text-label-caps text-primary uppercase tracking-widest" id="modal-ref">REF-ID</span>
<h3 class="font-headline-sm text-headline-sm text-on-surface" id="modal-title">Expedition Title</h3>
</div>
<button class="text-outline hover:text-on-surface p-1 rounded hover:bg-surface-container cursor-pointer" onclick="closeDossierModal()">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<div class="bg-surface-container-lowest p-space-md rounded flex flex-col gap-2 font-telemetry-numeric text-telemetry-numeric">
<div class="flex justify-between">
<span class="text-outline">Cryptographic Fingerprint:</span>
<span class="text-tertiary select-all" id="modal-hash">SHA-256: 000000</span>
</div>
<div class="flex justify-between">
<span class="text-outline">Managing Advisor:</span>
<span class="text-on-surface" id="modal-advisor">Marc-André V.</span>
</div>
<div class="flex justify-between">
<span class="text-outline">Authorized Allocation:</span>
<span class="text-primary font-medium" id="modal-budget">$0</span>
</div>
<div class="flex justify-between">
<span class="text-outline">Swiss Diplomatic Clearance:</span>
<span class="text-tertiary">GEN-POL-APR-VALID</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<span class="font-label-caps text-label-caps text-outline uppercase tracking-wider">Direct Advisor Message Signal</span>
<textarea class="w-full bg-surface-container-lowest text-on-surface font-body-md text-body-md p-3 rounded h-20 placeholder:text-outline focus:outline-none focus:bg-surface-container-high resize-none" placeholder="Send high-priority directive directly to assigned managing partner..."></textarea>
</div>
<div class="flex items-center justify-between pt-space-xs">
<div class="flex items-center gap-2 text-outline font-label-caps text-label-caps uppercase">
<span class="material-symbols-outlined text-[16px] text-primary">security</span>
<span>End-to-End Encrypted Quorum</span>
</div>
<div class="flex items-center gap-2">
<button class="px-space-md py-2 rounded bg-surface-container hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors cursor-pointer" onclick="closeDossierModal()">
  Dismiss
</button>
<button class="px-space-md py-2 rounded bg-primary text-on-primary font-label-md text-label-md uppercase tracking-wider font-semibold hover:bg-primary-container transition-all cursor-pointer" onclick="confirmAdvisorDispatch()">
  Transmit Directive
</button>
</div>
</div>
</div>
</div>

</div>
</main>
</div>

<!-- FOOTER -->
<footer class="mt-auto w-full bg-surface-container-low/95 text-on-surface-variant py-space-lg">
<div class="w-full px-space-lg flex flex-col md:flex-row items-start md:items-center justify-between gap-space-md">
<div class="flex flex-col gap-1">
<p class="font-body-md text-body-md text-on-surface">Bespoke Concierge Framework · MVC Architecture (Model: TravelModel · Controller: DashboardController · View: dashboard-view)</p>
<p class="font-label-caps text-label-caps text-outline uppercase tracking-wider">All data encrypted under Swiss bilateral non-disclosure covenants · Article 47 Swiss Federal Banking Law standard.</p>
</div>
<div class="flex items-center gap-space-md font-telemetry-numeric text-telemetry-numeric text-outline">
<span class="text-primary">Geneva <?= date('H:i') ?> CEST</span>
<span>·</span>
<span class="text-secondary">Zurich Ops Verified</span>
</div>
</div>
</footer>

</div>

<!-- INTERACTIVE SCRIPTS -->
<script>
  function applyPrompt(promptText) {
    const input = document.getElementById('concierge-input');
    if (input) {
      input.value = promptText;
      input.focus();
    }
  }

  function filterDossiers(status, btnElement) {
    // Update active tab styles
    const buttons = document.querySelectorAll('.tab-filter-btn');
    buttons.forEach(btn => {
      btn.className = 'tab-filter-btn px-space-sm py-1.5 rounded font-label-md text-label-md text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all cursor-pointer';
    });
    btnElement.className = 'tab-filter-btn px-space-sm py-1.5 rounded font-label-md text-label-md transition-all bg-primary text-on-primary font-semibold cursor-pointer';

    // Filter cards
    const cards = document.querySelectorAll('.dossier-card');
    cards.forEach(card => {
      const cardStatus = card.getAttribute('data-status');
      if (status === 'all' || cardStatus === status) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  function openDossierModal(title, budget, advisor, status, refId, hash) {
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-budget').innerText = budget;
    document.getElementById('modal-advisor').innerText = advisor;
    document.getElementById('modal-ref').innerText = 'ENCRYPTED DOSSIER · ' + refId + ' (' + status + ')';
    document.getElementById('modal-hash').innerText = hash;
    
    const modal = document.getElementById('dossier-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeDossierModal() {
    const modal = document.getElementById('dossier-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  }

  function confirmAdvisorDispatch() {
    alert("Encrypted transmission queued for Geneva Desk Managing Partner. Dual-key handshake confirmed.");
    closeDossierModal();
  }

  document.getElementById('btn-submit-advisor')?.addEventListener('click', () => {
    const val = document.getElementById('concierge-input').value.trim();
    if (val) {
      alert("AI Copilot request transmitted to Marc-André V. at Geneva Ops: \"" + val + "\"");
      document.getElementById('concierge-input').value = '';
    } else {
      document.getElementById('concierge-input').focus();
    }
  });
</script>

</body></html>

<!DOCTYPE html>
<html class="dark" lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Bespoke Programs — VIP Bespoke Travel & Private Concierge')</title>

  <!-- Tailwind CSS CDN with Bespoke Theme Extensions -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            background: "#0c0e12",
            surface: "#111317",
            "surface-low": "#16191f",
            "surface-container": "#1e2024",
            "surface-high": "#282a2e",
            "surface-highest": "#333539",
            primary: "#f2ca50",
            "primary-container": "#d4af37",
            "primary-dim": "#b8972e",
            "on-surface": "#e2e2e8",
            "on-surface-variant": "#d0c5af",
            outline: "#99907c",
            "outline-variant": "#4d4635",
          },
          fontFamily: {
            serif: ['"EB Garamond"', 'serif'],
            sans: ['"DM Sans"', 'sans-serif'],
          }
        }
      }
    }
  </script>

  <!-- Google Fonts: EB Garamond (Serif) & DM Sans (Sans) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
  
  <style>
    body {
      background-color: #0c0e12;
      color: #e2e2e8;
      font-family: 'DM Sans', sans-serif;
    }
    .font-serif-luxury {
      font-family: 'EB Garamond', serif;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col bg-background text-on-surface antialiased selection:bg-primary-container selection:text-black">

  <!-- TOP CONCIERGE HEADER -->
  <header class="sticky top-0 z-40 bg-surface/90 backdrop-blur-xl border-b border-outline-variant/30 shadow-[0_4px_24px_rgba(0,0,0,0.6)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        
        <!-- Brand / Identity -->
        <a href="{{ route('programs.index') }}" class="flex items-center gap-3.5 group">
          <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary via-primary-container to-amber-700 p-[1px] shadow-[0_0_15px_rgba(242,202,80,0.2)]">
            <div class="w-full h-full bg-surface-low rounded-[11px] flex items-center justify-center">
              <span class="font-serif-luxury text-xl font-bold text-primary group-hover:scale-110 transition-transform">B</span>
            </div>
          </div>
          <div class="flex flex-col">
            <span class="font-serif-luxury text-lg tracking-wider uppercase text-primary font-bold leading-tight">
              VIP BESPOKE TRAVEL
            </span>
            <span class="text-[10px] tracking-[0.2em] uppercase text-outline font-semibold">
              Bespoke Programs &bull; Week 9 CRUD
            </span>
          </div>
        </a>

        <!-- Concierge Navigation -->
        <nav class="hidden md:flex items-center gap-1.5 text-xs tracking-wider uppercase font-semibold">
          <a href="{{ route('programs.index') }}" class="px-4 py-2 rounded-full transition-all duration-300 {{ request()->routeIs('programs.*') ? 'bg-surface-high text-primary shadow-[0_0_15px_rgba(242,202,80,0.15)] border border-primary/30' : 'text-on-surface-variant hover:text-on-surface hover:bg-surface-high/60' }}">
            Programs Ledger
          </a>
          <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-full text-on-surface-variant hover:text-on-surface hover:bg-surface-high/60 transition-all duration-300">
            Sovereign Ledger (Week 7)
          </a>
          <a href="{{ url('/landing') }}" class="px-4 py-2 rounded-full text-on-surface-variant hover:text-on-surface hover:bg-surface-high/60 transition-all duration-300">
            Landing Editorial (Week 6)
          </a>
          <a href="{{ url('/uji-eloquent') }}" target="_blank" class="px-3.5 py-1.5 rounded-full text-[11px] text-primary/80 hover:text-primary bg-primary/10 border border-primary/20 hover:bg-primary/20 transition-all duration-300" title="Uji Coba Query Eloquent JSON">
            Eloquent API
          </a>
        </nav>

        <!-- Right Enclave Status Badge -->
        <div class="hidden sm:flex items-center gap-2.5 px-3 py-1.5 rounded-full bg-surface-container border border-outline-variant/40">
          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
          <span class="text-[11px] font-mono tracking-wider uppercase text-on-surface-variant">
            DB: <span class="text-primary font-bold">vip_bespoke</span>
          </span>
        </div>

      </div>
    </div>
  </header>

  <!-- FLASH ALERTS CONTAINER -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-6">
    @if(session('success'))
      <div class="flex items-center justify-between p-4 mb-4 text-sm text-primary rounded-xl bg-surface-container/90 border border-primary/40 shadow-[0_0_20px_rgba(242,202,80,0.1)] backdrop-blur-md animate-fade-in" role="alert">
        <div class="flex items-center gap-3">
          <svg class="w-5 h-5 text-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <span class="font-medium tracking-wide">{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="text-primary/70 hover:text-primary text-xl font-bold leading-none">&times;</button>
      </div>
    @endif

    @if($errors->any())
      <div class="p-4 mb-4 text-sm text-red-300 rounded-xl bg-red-950/40 border border-red-800/50 shadow-md backdrop-blur-md" role="alert">
        <div class="flex items-center gap-2 font-bold mb-1.5 text-red-400">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
          </svg>
          <span>Instruksi tidak dapat diproses:</span>
        </div>
        <ul class="list-disc list-inside ml-6 text-xs space-y-1 text-red-200/90">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

  <!-- MAIN BODY -->
  <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
    @yield('content')
  </main>

  <!-- LUXURY FOOTER -->
  <footer class="bg-surface-low border-t border-outline-variant/30 py-8 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between text-xs text-outline gap-4">
      <div class="flex items-center gap-2">
        <span class="font-serif-luxury text-sm font-semibold text-primary">VIP BESPOKE TRAVEL</span>
        <span>&bull; Zurich Private Vaults & Concierge Registry &bull; Week 9 Sprint</span>
      </div>
      <div class="flex items-center gap-4 font-mono text-[11px]">
        <span class="text-on-surface-variant">Laravel Framework v{{ Illuminate\Foundation\Application::VERSION }}</span>
        <span>&bull;</span>
        <span class="text-on-surface-variant">PHP v{{ PHP_VERSION }}</span>
        <span>&bull;</span>
        <span class="text-primary">MySQL Relational CRUD</span>
      </div>
    </div>
  </footer>

  @stack('scripts')
</body>
</html>

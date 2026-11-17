<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Program PresidentKu — Program Management')</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              500: '#0284c7',
              600: '#0369a1',
              700: '#075985',
            }
          }
        }
      }
    }
  </script>

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'DM Sans', sans-serif; }
  </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">

  <!-- TOP HEADER / NAVBAR -->
  <header class="bg-white border-b border-slate-200 sticky top-0 z-30 shadow-sm">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        
        <!-- Brand / Identity -->
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-lg bg-sky-600 text-white flex items-center justify-center font-bold text-lg shadow-sm">
            P
          </div>
          <div>
            <a href="{{ route('programs.index') }}" class="font-bold text-lg text-slate-900 tracking-tight hover:text-sky-600 transition">
              Program PresidentKu
            </a>
            <span class="hidden sm:inline-block text-xs text-slate-400 ml-2 border-l border-slate-200 pl-2">
              Laravel Eloquent CRUD &bull; Sprint 07
            </span>
          </div>
        </div>

        <!-- Navigation Links -->
        <nav class="flex items-center gap-2 sm:gap-4 text-sm font-medium">
          <a href="{{ route('programs.index') }}" class="px-3 py-1.5 rounded-md text-sky-700 bg-sky-50 font-semibold transition">
            Daftar Program
          </a>
          <a href="{{ url('/uji-eloquent') }}" target="_blank" class="px-3 py-1.5 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition" title="Lihat hasil uji Eloquent JSON (Task 02)">
            Uji Eloquent JSON
          </a>
          <a href="{{ url('/landing') }}" class="px-3 py-1.5 rounded-md text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition" title="Kunjungi halaman landing page VIP Bespoke">
            VIP Portal
          </a>
        </nav>

      </div>
    </div>
  </header>

  <!-- FLASH MESSAGES -->
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
    @if(session('success'))
      <div class="flex items-center justify-between p-4 mb-4 text-sm text-emerald-800 rounded-xl bg-emerald-50 border border-emerald-200 shadow-sm" role="alert">
        <div class="flex items-center gap-2.5">
          <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <span class="font-medium">{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 font-bold ml-4 text-lg leading-none">&times;</button>
      </div>
    @endif

    @if($errors->any())
      <div class="p-4 mb-4 text-sm text-red-800 rounded-xl bg-red-50 border border-red-200 shadow-sm" role="alert">
        <div class="flex items-center gap-2 font-semibold mb-1">
          <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <span>Terdapat kesalahan input:</span>
        </div>
        <ul class="list-disc list-inside ml-7 text-xs space-y-0.5">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

  <!-- MAIN CONTENT CONTAINER -->
  <main class="flex-grow max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 w-full">
    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer class="bg-white border-t border-slate-200 py-6 mt-auto">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-2">
      <div>
        &copy; 2026 <strong>PresidentKu / VIP Bespoke Travel</strong> &bull; Week 9 Web Programming.
      </div>
      <div class="flex items-center gap-3">
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
          <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
          Database MySQL Terhubung
        </span>
        <span class="text-slate-400">Laravel v{{ Illuminate\Foundation\Application::VERSION }}</span>
      </div>
    </div>
  </footer>

  @stack('scripts')
</body>
</html>

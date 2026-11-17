@extends('layouts.app')

@section('title', 'Bespoke Programs Ledger — VIP Bespoke Travel')

@section('content')
<div class="space-y-8">

  <!-- TOP HEADER & METRIC SUMMARY -->
  <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-outline-variant/30">
    <div>
      <div class="flex items-center gap-2 mb-2">
        <span class="inline-block w-2 h-2 rounded-full bg-primary shadow-[0_0_8px_#f2ca50]"></span>
        <span class="text-xs uppercase tracking-[0.2em] text-primary font-semibold">Concierge Expedition Catalog &bull; Week 10</span>
      </div>
      <h1 class="font-serif-luxury text-3xl sm:text-4xl text-on-surface font-normal tracking-wide">
        Curated Bespoke Programs
      </h1>
      <p class="text-sm text-on-surface-variant max-w-2xl mt-1.5 leading-relaxed">
        Direktori program ekspedisi privat yang dikelola secara dinamis melalui arsitektur <strong>Laravel Controller</strong>, <strong>Request & Validation (max:100)</strong>, serta <strong>RESTful Program API</strong> terhubung ke database <strong>MySQL</strong>.
      </p>
    </div>

    <!-- Actions -->
    <div class="flex items-center gap-3 flex-shrink-0">
      <a href="#api-section" class="px-4 py-3 rounded-full text-xs font-bold uppercase tracking-wider text-primary bg-primary/10 hover:bg-primary/20 border border-primary/30 transition-all">
        REST API Docs &darr;
      </a>
      <a href="{{ route('programs.create') }}" 
         onclick="event.preventDefault(); openCreateModal();"
         class="inline-flex items-center gap-2 px-5 py-3 rounded-full text-xs font-bold uppercase tracking-wider text-black bg-gradient-to-r from-primary to-primary-container hover:from-amber-400 hover:to-primary shadow-[0_0_20px_rgba(242,202,80,0.25)] hover:shadow-[0_0_30px_rgba(242,202,80,0.4)] transition-all duration-300">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
        </svg>
        <span>+ Inisiasi Program Baru</span>
      </a>
    </div>
  </div>

  <!-- STATS TILES -->
  <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
    <div class="p-5 rounded-2xl bg-surface-container/60 border border-outline-variant/30 backdrop-blur-md">
      <span class="text-[11px] uppercase tracking-widest text-outline font-semibold">Total Programs</span>
      <div class="font-serif-luxury text-3xl text-primary font-medium mt-1">
        {{ str_pad($programs->count(), 2, '0', STR_PAD_LEFT) }} <span class="text-xs font-sans text-on-surface-variant uppercase tracking-wider">Ekspedisi</span>
      </div>
    </div>
    <div class="p-5 rounded-2xl bg-surface-container/60 border border-outline-variant/30 backdrop-blur-md">
      <span class="text-[11px] uppercase tracking-widest text-outline font-semibold">Controller Architecture</span>
      <div class="font-serif-luxury text-xl text-on-surface font-medium mt-1">
        ProgramController <span class="text-xs font-sans text-emerald-400">&bull; Task 01</span>
      </div>
    </div>
    <div class="p-5 rounded-2xl bg-surface-container/60 border border-outline-variant/30 backdrop-blur-md">
      <span class="text-[11px] uppercase tracking-widest text-outline font-semibold">Input Validation</span>
      <div class="font-serif-luxury text-xl text-on-surface font-medium mt-1">
        required|max:100 <span class="text-xs font-sans text-primary">&bull; Task 02</span>
      </div>
    </div>
    <div class="p-5 rounded-2xl bg-surface-container/60 border border-outline-variant/30 backdrop-blur-md">
      <span class="text-[11px] uppercase tracking-widest text-outline font-semibold">RESTful API Status</span>
      <div class="font-serif-luxury text-xl text-on-surface font-medium mt-1">
        /api/programs <span class="text-xs font-sans text-sky-400">&bull; Task 03</span>
      </div>
    </div>
  </div>

  <!-- MAIN TABLE CARD (TASK 01 - READ) -->
  <div class="bg-surface rounded-2xl border border-outline-variant/30 shadow-[0_10px_40px_rgba(0,0,0,0.5)] overflow-hidden">
    <div class="px-6 py-5 border-b border-outline-variant/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 bg-surface-low/80">
      <div class="flex items-center gap-3">
        <span class="font-serif-luxury text-lg text-primary font-medium tracking-wide">Registry Program Ekspedisi</span>
        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold uppercase tracking-wider bg-primary/10 text-primary border border-primary/20">
          Database Driven
        </span>
      </div>
      <span class="text-xs text-outline font-mono">
        SELECT * FROM `programs` ORDER BY `id` ASC
      </span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-sm">
        <thead>
          <tr class="bg-surface-container/40 border-b border-outline-variant/30 text-[11px] font-bold text-outline uppercase tracking-widest">
            <th class="py-4 px-5 w-16 text-center">No</th>
            <th class="py-4 px-6 w-1/3">Nama Program Ekspedisi</th>
            <th class="py-4 px-6">Deskripsi Layanan Concierge</th>
            <th class="py-4 px-6 w-48 text-center">Protokol Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-outline-variant/20">
          @forelse($programs as $index => $program)
            <tr class="hover:bg-surface-high/40 transition-colors group">
              <!-- Index / No -->
              <td class="py-5 px-5 text-center font-mono text-xs text-primary/80 font-bold">
                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
              </td>

              <!-- Nama Program -->
              <td class="py-5 px-6">
                <div class="flex items-baseline gap-2">
                  <span class="inline-block w-1.5 h-1.5 rounded-full bg-primary/60 group-hover:bg-primary transition-colors flex-shrink-0"></span>
                  <span class="font-serif-luxury text-base text-on-surface font-medium tracking-wide group-hover:text-primary transition-colors">
                    {{ $program->nama }}
                  </span>
                </div>
                <span class="text-[10px] font-mono text-outline/80 ml-3.5">
                  ID: #{{ $program->id }} &bull; {{ $program->created_at ? $program->created_at->format('d M Y') : 'Active' }}
                </span>
              </td>

              <!-- Deskripsi Program -->
              <td class="py-5 px-6 text-on-surface-variant text-xs leading-relaxed font-sans">
                {{ $program->deskripsi }}
              </td>

              <!-- Aksi (Edit & Hapus) -->
              <td class="py-5 px-6 text-center">
                <div class="flex items-center justify-center gap-2">
                  <!-- Tombol Edit -->
                  <a href="{{ route('programs.edit', $program->id) }}" 
                     class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-primary hover:text-black bg-primary/10 hover:bg-primary border border-primary/30 transition-all duration-200"
                     title="Edit Data Program Ekspedisi">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit</span>
                  </a>

                  <!-- Tombol Hapus -->
                  <form action="{{ route('programs.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin membatalkan dan menghapus program ini: \'{{ $program->nama }}\'?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold text-red-400 hover:text-white bg-red-950/30 hover:bg-red-800 border border-red-900/50 transition-all duration-200"
                            title="Hapus Program Ekspedisi">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                      </svg>
                      <span>Hapus</span>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="py-16 text-center text-outline">
                <div class="flex flex-col items-center justify-center">
                  <div class="w-12 h-12 rounded-full bg-surface-container flex items-center justify-center text-primary/40 mb-3 border border-outline-variant/30">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                  </div>
                  <p class="font-serif-luxury text-lg text-on-surface">Belum ada dossier program ekspedisi di database.</p>
                  <p class="text-xs text-outline mt-1 font-sans">Klik tombol "+ Inisiasi Program Baru" di atas untuk menambahkan program perdana.</p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- RESTFUL API DOCUMENTATION & LIVE TESTER (TASK 03) -->
  <div id="api-section" class="bg-surface rounded-2xl border border-outline-variant/30 shadow-[0_10px_40px_rgba(0,0,0,0.5)] overflow-hidden">
    <div class="px-6 py-5 border-b border-outline-variant/20 bg-surface-low/80 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
      <div class="flex items-center gap-3">
        <span class="w-2.5 h-2.5 rounded-full bg-sky-400 shadow-[0_0_10px_#38bdf8]"></span>
        <div>
          <h2 class="font-serif-luxury text-xl text-on-surface font-medium">RESTful Program API Explorer (Task 03)</h2>
          <p class="text-xs text-outline">Endpoint REST API resmi terdaftar pada <code class="text-primary font-mono">routes/api.php</code></p>
        </div>
      </div>
      <button 
        type="button" 
        onclick="testLiveApi()"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider text-black bg-sky-400 hover:bg-sky-300 shadow-sm transition">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>Uji Live GET /api/programs</span>
      </button>
    </div>

    <!-- Endpoint Catalog -->
    <div class="p-6 space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-xs font-mono">
        
        <div class="p-3.5 rounded-xl bg-surface-container/60 border border-outline-variant/30 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-bold">GET</span>
            <span class="text-on-surface">/api/programs</span>
          </div>
          <span class="text-[10px] text-outline font-sans">Semua Data (200)</span>
        </div>

        <div class="p-3.5 rounded-xl bg-surface-container/60 border border-outline-variant/30 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-sky-500/20 text-sky-400 font-bold">POST</span>
            <span class="text-on-surface">/api/programs</span>
          </div>
          <span class="text-[10px] text-outline font-sans">Tambah (201/422)</span>
        </div>

        <div class="p-3.5 rounded-xl bg-surface-container/60 border border-outline-variant/30 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-400 font-bold">GET</span>
            <span class="text-on-surface">/api/programs/{id}</span>
          </div>
          <span class="text-[10px] text-outline font-sans">Detail (200/404)</span>
        </div>

        <div class="p-3.5 rounded-xl bg-surface-container/60 border border-outline-variant/30 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-amber-500/20 text-amber-400 font-bold">PUT</span>
            <span class="text-on-surface">/api/programs/{id}</span>
          </div>
          <span class="text-[10px] text-outline font-sans">Update (200/422)</span>
        </div>

        <div class="p-3.5 rounded-xl bg-surface-container/60 border border-outline-variant/30 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-red-500/20 text-red-400 font-bold">DELETE</span>
            <span class="text-on-surface">/api/programs/{id}</span>
          </div>
          <span class="text-[10px] text-outline font-sans">Hapus (200/404)</span>
        </div>

        <div class="p-3.5 rounded-xl bg-surface-container/60 border border-outline-variant/30 flex items-center justify-between">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-purple-500/20 text-purple-400 font-bold">TEST</span>
            <a href="{{ url('/uji-eloquent') }}" target="_blank" class="text-primary hover:underline">/uji-eloquent</a>
          </div>
          <span class="text-[10px] text-outline font-sans">JSON Telemetri</span>
        </div>

      </div>

      <!-- Live JSON Result Viewer -->
      <div id="live-api-box" class="hidden mt-4 p-4 rounded-xl bg-surface-low border border-outline-variant/40">
        <div class="flex items-center justify-between mb-2">
          <span class="text-xs font-mono text-primary font-bold">HASIL RESPON JSON DARI SERVER:</span>
          <span id="api-status-badge" class="px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-emerald-900/60 text-emerald-400">200 OK</span>
        </div>
        <pre id="api-response-content" class="text-xs font-mono text-emerald-300 overflow-x-auto p-3 rounded-lg bg-black/60 max-h-60"></pre>
      </div>
    </div>
  </div>

</div>

<!-- MODAL QUICK ADD PROGRAM -->
<div id="create-modal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md hidden flex items-center justify-center p-4">
  <div class="bg-surface rounded-2xl border border-outline-variant/40 shadow-[0_20px_60px_rgba(0,0,0,0.8)] w-full max-w-lg overflow-hidden animate-fade-in">
    <div class="px-6 py-5 border-b border-outline-variant/20 flex items-center justify-between bg-surface-low">
      <div class="flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_8px_#f2ca50]"></span>
        <h3 class="font-serif-luxury text-xl font-medium text-on-surface tracking-wide">Inisiasi Program Ekspedisi Baru</h3>
      </div>
      <button type="button" onclick="closeCreateModal()" class="text-outline hover:text-on-surface font-bold text-xl leading-none">&times;</button>
    </div>

    <form action="{{ route('programs.store') }}" method="POST" class="p-6 space-y-5" novalidate>
      @csrf

      <div>
        <div class="flex items-center justify-between mb-2">
          <label for="modal-nama" class="block text-xs font-bold text-outline uppercase tracking-widest">
            Nama Program Ekspedisi <span class="text-primary">*</span>
          </label>
          <span class="text-[10px] font-mono text-outline/70">Maks. 100 karakter</span>
        </div>
        <input 
          type="text" 
          id="modal-nama" 
          name="nama" 
          required 
          maxlength="120"
          placeholder="Contoh: Swiss Alpine Winter Sanctuary & Heli-Chalet"
          class="w-full px-4 py-3 text-sm bg-surface-container border border-outline-variant/40 rounded-xl text-on-surface placeholder:text-outline/50 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/40 transition-all"
        />
      </div>

      <div>
        <label for="modal-deskripsi" class="block text-xs font-bold text-outline uppercase tracking-widest mb-2">
          Deskripsi Layanan Concierge <span class="text-primary">*</span>
        </label>
        <textarea 
          id="modal-deskripsi" 
          name="deskripsi" 
          rows="4" 
          required 
          placeholder="Rincian privasi perjalanan, transfer privat, staf concierge, akomodasi, dsb..."
          class="w-full px-4 py-3 text-sm bg-surface-container border border-outline-variant/40 rounded-xl text-on-surface placeholder:text-outline/50 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/40 transition-all leading-relaxed"
        ></textarea>
      </div>

      <div class="pt-4 border-t border-outline-variant/20 flex items-center justify-end gap-3">
        <button 
          type="button" 
          onclick="closeCreateModal()"
          class="px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-outline hover:text-on-surface transition">
          Batal
        </button>
        <button 
          type="submit" 
          class="px-6 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider text-black bg-gradient-to-r from-primary to-primary-container hover:from-amber-400 hover:to-primary shadow-[0_0_20px_rgba(242,202,80,0.2)] transition-all">
          Simpan Program
        </button>
      </div>
    </form>
  </div>
</div>

@endsection

@push('scripts')
<script>
  function openCreateModal() {
    const modal = document.getElementById('create-modal');
    if (modal) {
      modal.classList.remove('hidden');
      document.getElementById('modal-nama')?.focus();
    }
  }

  function closeCreateModal() {
    const modal = document.getElementById('create-modal');
    if (modal) {
      modal.classList.add('hidden');
    }
  }

  window.addEventListener('click', function(e) {
    const modal = document.getElementById('create-modal');
    if (e.target === modal) {
      closeCreateModal();
    }
  });

  async function testLiveApi() {
    const box = document.getElementById('live-api-box');
    const content = document.getElementById('api-response-content');
    const badge = document.getElementById('api-status-badge');
    if (!box || !content) return;

    box.classList.remove('hidden');
    content.textContent = 'Memuat data dari /api/programs...';

    try {
      const res = await fetch('/api/programs', {
        headers: { 'Accept': 'application/json' }
      });
      badge.textContent = `${res.status} ${res.statusText}`;
      if (res.ok) {
        badge.className = 'px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-emerald-900/60 text-emerald-400';
      } else {
        badge.className = 'px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-red-900/60 text-red-400';
      }
      const data = await res.json();
      content.textContent = JSON.stringify(data, null, 2);
    } catch (err) {
      badge.textContent = 'Error';
      badge.className = 'px-2 py-0.5 rounded text-[10px] font-mono font-bold bg-red-900/60 text-red-400';
      content.textContent = 'Gagal menghubungi /api/programs: ' + err.message;
    }
  }
</script>
@endpush

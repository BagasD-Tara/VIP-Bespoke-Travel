@extends('layouts.app')

@section('title', 'Bespoke Programs Ledger — VIP Bespoke Travel')

@section('content')
<div class="space-y-8">

  <!-- TOP HEADER & METRIC SUMMARY -->
  <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-outline-variant/30">
    <div>
      <div class="flex items-center gap-2 mb-2">
        <span class="inline-block w-2 h-2 rounded-full bg-primary shadow-[0_0_8px_#f2ca50]"></span>
        <span class="text-xs uppercase tracking-[0.2em] text-primary font-semibold">Concierge Expedition Catalog</span>
      </div>
      <h1 class="font-serif-luxury text-3xl sm:text-4xl text-on-surface font-normal tracking-wide">
        Curated Bespoke Programs
      </h1>
      <p class="text-sm text-on-surface-variant max-w-2xl mt-1.5 leading-relaxed">
        Direktori program ekspedisi privat dan rencana perjalanan eksklusif yang dikelola secara dinamis melalui arsitektur <strong>Laravel 10</strong>, <strong>Migration</strong>, <strong>Eloquent ORM</strong>, dan database relasional <strong>MySQL</strong>.
      </p>
    </div>

    <!-- Actions -->
    <div class="flex items-center gap-3 flex-shrink-0">
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
  <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
    <div class="p-5 rounded-2xl bg-surface-container/60 border border-outline-variant/30 backdrop-blur-md">
      <span class="text-[11px] uppercase tracking-widest text-outline font-semibold">Total Programs Terdaftar</span>
      <div class="font-serif-luxury text-3xl text-primary font-medium mt-1">
        {{ str_pad($programs->count(), 2, '0', STR_PAD_LEFT) }} <span class="text-xs font-sans text-on-surface-variant uppercase tracking-wider">Ekspedisi</span>
      </div>
    </div>
    <div class="p-5 rounded-2xl bg-surface-container/60 border border-outline-variant/30 backdrop-blur-md">
      <span class="text-[11px] uppercase tracking-widest text-outline font-semibold">ORM Data Layer</span>
      <div class="font-serif-luxury text-2xl text-on-surface font-medium mt-1">
        Laravel Eloquent <span class="text-xs font-sans text-primary">&bull; Live</span>
      </div>
    </div>
    <div class="p-5 rounded-2xl bg-surface-container/60 border border-outline-variant/30 backdrop-blur-md">
      <span class="text-[11px] uppercase tracking-widest text-outline font-semibold">Relational Database</span>
      <div class="font-serif-luxury text-2xl text-on-surface font-medium mt-1">
        MySQL <span class="text-xs font-sans text-emerald-400">&bull; Port 3306</span>
      </div>
    </div>
  </div>

  <!-- MAIN TABLE CARD (TASK 03 - READ) -->
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

  <!-- CONCIERGE INFORMATION TILES -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-4">
    <div class="p-5 rounded-2xl bg-surface-container/40 border border-outline-variant/30">
      <div class="flex items-center gap-2.5 font-semibold text-primary text-xs uppercase tracking-wider mb-2">
        <span class="w-5 h-5 rounded-md bg-primary/10 border border-primary/20 flex items-center justify-center font-mono">01</span>
        <span>Migration & Schema</span>
      </div>
      <p class="text-xs text-on-surface-variant/80 leading-relaxed">
        Tabel database <code class="text-primary font-mono bg-surface-high px-1.5 py-0.5 rounded">programs</code> didefinisikan melalui Laravel Migration dengan kolom id, nama, deskripsi, dan timestamps.
      </p>
    </div>

    <div class="p-5 rounded-2xl bg-surface-container/40 border border-outline-variant/30">
      <div class="flex items-center gap-2.5 font-semibold text-primary text-xs uppercase tracking-wider mb-2">
        <span class="w-5 h-5 rounded-md bg-primary/10 border border-primary/20 flex items-center justify-center font-mono">02</span>
        <span>Eloquent ORM Model</span>
      </div>
      <p class="text-xs text-on-surface-variant/80 leading-relaxed">
        Model <code class="text-primary font-mono bg-surface-high px-1.5 py-0.5 rounded">App\Models\Program</code> mengelola relasi objek dengan proteksi mass-assignment <code class="text-primary font-mono bg-surface-high px-1.5 py-0.5 rounded">$fillable</code>.
      </p>
    </div>

    <div class="p-5 rounded-2xl bg-surface-container/40 border border-outline-variant/30">
      <div class="flex items-center gap-2.5 font-semibold text-primary text-xs uppercase tracking-wider mb-2">
        <span class="w-5 h-5 rounded-md bg-primary/10 border border-primary/20 flex items-center justify-center font-mono">03</span>
        <span>Full CRUD Cycle</span>
      </div>
      <p class="text-xs text-on-surface-variant/80 leading-relaxed">
        Integrasi penuh Create, Read, Update, dan Delete terhubung langsung ke controller dan tabel MySQL tanpa data statis (hardcoded).
      </p>
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

    <form action="{{ route('programs.store') }}" method="POST" class="p-6 space-y-5">
      @csrf

      <div>
        <label for="modal-nama" class="block text-xs font-bold text-outline uppercase tracking-widest mb-2">
          Nama Program Ekspedisi <span class="text-primary">*</span>
        </label>
        <input 
          type="text" 
          id="modal-nama" 
          name="nama" 
          required 
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
</script>
@endpush

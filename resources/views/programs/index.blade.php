@extends('layouts.app')

@section('title', 'Program PresidentKu — Daftar Program')

@section('content')
<div class="space-y-6">

  <!-- TOP ACTION BAR -->
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-2 border-b border-slate-200">
    <div>
      <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
        Program PresidentKu
      </h1>
      <p class="text-sm text-slate-500 mt-1">
        Manajemen data program kerja terintegrasi Laravel Migration, Model Eloquent, dan MySQL.
      </p>
    </div>

    <div class="flex items-center gap-3">
      <!-- Tombol Tambah Program (Memicu Modal atau Halaman Create) -->
      <a href="{{ route('programs.create') }}" 
         onclick="event.preventDefault(); openCreateModal();"
         class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-sky-600 hover:bg-sky-700 shadow-sm hover:shadow transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        <span>+ Tambah Program</span>
      </a>
    </div>
  </div>

  <!-- TABLE CARD (TASK 03 - READ) -->
  <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
      <div class="flex items-center gap-2">
        <span class="font-bold text-slate-800 text-base">Daftar Program Terdaftar</span>
        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-sky-100 text-sky-800">
          {{ $programs->count() }} Data
        </span>
      </div>
      <span class="text-xs text-slate-400">Data bersumber langsung dari MySQL Database</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse text-sm">
        <thead>
          <tr class="bg-slate-100/70 border-b border-slate-200 text-xs font-bold text-slate-600 uppercase tracking-wider">
            <th class="py-3.5 px-4 w-16 text-center">No</th>
            <th class="py-3.5 px-6 w-1/4">Nama Program</th>
            <th class="py-3.5 px-6">Deskripsi</th>
            <th class="py-3.5 px-6 w-44 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse($programs as $index => $program)
            <tr class="hover:bg-sky-50/40 transition-colors">
              <td class="py-4 px-4 text-center font-medium text-slate-500">
                {{ $index + 1 }}
              </td>
              <td class="py-4 px-6 font-semibold text-slate-900">
                {{ $program->nama }}
              </td>
              <td class="py-4 px-6 text-slate-600 leading-relaxed">
                {{ $program->deskripsi }}
              </td>
              <td class="py-4 px-6 text-center">
                <div class="flex items-center justify-center gap-2">
                  <!-- Tombol Edit (Biru) -->
                  <a href="{{ route('programs.edit', $program->id) }}" 
                     class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-white bg-sky-600 hover:bg-sky-700 transition shadow-sm"
                     title="Edit Data Program">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit</span>
                  </a>

                  <!-- Tombol Hapus (Merah) -->
                  <form action="{{ route('programs.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini: \'{{ $program->nama }}\'?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold text-white bg-red-600 hover:bg-red-700 transition shadow-sm"
                            title="Hapus Data Program">
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
              <td colspan="4" class="py-12 text-center text-slate-400">
                <div class="flex flex-col items-center justify-center">
                  <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                  </svg>
                  <p class="font-medium text-slate-600">Belum ada program di database.</p>
                  <p class="text-xs text-slate-400 mt-1">Klik tombol "+ Tambah Program" di atas untuk menambahkan data baru.</p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- KOTAK INFORMASI / DOKUMENTASI TASK -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4">
    <div class="p-4 rounded-xl bg-white border border-slate-200">
      <div class="flex items-center gap-2 font-bold text-slate-800 text-sm mb-1">
        <span class="w-6 h-6 rounded-md bg-sky-100 text-sky-700 flex items-center justify-center text-xs">01</span>
        <span>Migration & Database</span>
      </div>
      <p class="text-xs text-slate-500 leading-relaxed">
        Tabel <code class="bg-slate-100 px-1 py-0.5 rounded text-sky-800 font-mono">programs</code> dibuat via Laravel Migration dengan kolom id, nama, deskripsi, timestamps.
      </p>
    </div>

    <div class="p-4 rounded-xl bg-white border border-slate-200">
      <div class="flex items-center gap-2 font-bold text-slate-800 text-sm mb-1">
        <span class="w-6 h-6 rounded-md bg-sky-100 text-sky-700 flex items-center justify-center text-xs">02</span>
        <span>Eloquent ORM Model</span>
      </div>
      <p class="text-xs text-slate-500 leading-relaxed">
        Model <code class="bg-slate-100 px-1 py-0.5 rounded text-sky-800 font-mono">App\Models\Program</code> dengan properti <code class="bg-slate-100 px-1 py-0.5 rounded text-sky-800 font-mono">$fillable</code> untuk keamanan mass-assignment.
      </p>
    </div>

    <div class="p-4 rounded-xl bg-white border border-slate-200">
      <div class="flex items-center gap-2 font-bold text-slate-800 text-sm mb-1">
        <span class="w-6 h-6 rounded-md bg-sky-100 text-sky-700 flex items-center justify-center text-xs">03</span>
        <span>CRUD Lengkap</span>
      </div>
      <p class="text-xs text-slate-500 leading-relaxed">
        Fitur Create, Read, Update, dan Delete terhubung langsung ke controller dan tabel MySQL tanpa data statis (hardcoded).
      </p>
    </div>
  </div>

</div>

<!-- MODAL TAMBAH PROGRAM (CREATE MODAL) -->
<div id="create-modal" class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm hidden flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-lg overflow-hidden animate-fade-in">
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50">
      <h3 class="font-bold text-lg text-slate-900">Tambah Program Baru</h3>
      <button type="button" onclick="closeCreateModal()" class="text-slate-400 hover:text-slate-600 font-bold text-xl leading-none">&times;</button>
    </div>

    <form action="{{ route('programs.store') }}" method="POST" class="p-6 space-y-4">
      @csrf

      <div>
        <label for="modal-nama" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
          Nama Program <span class="text-red-500">*</span>
        </label>
        <input 
          type="text" 
          id="modal-nama" 
          name="nama" 
          required 
          placeholder="Contoh: Pendidikan / Kesehatan / Infrastruktur"
          class="w-full px-3.5 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
        />
      </div>

      <div>
        <label for="modal-deskripsi" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
          Deskripsi Program <span class="text-red-500">*</span>
        </label>
        <textarea 
          id="modal-deskripsi" 
          name="deskripsi" 
          rows="4" 
          required 
          placeholder="Jelaskan tujuan dan detail program secara ringkas..."
          class="w-full px-3.5 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
        ></textarea>
      </div>

      <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
        <button 
          type="button" 
          onclick="closeCreateModal()"
          class="px-4 py-2 text-sm font-semibold text-slate-600 hover:text-slate-800 transition">
          Batal
        </button>
        <button 
          type="submit" 
          class="px-5 py-2.5 rounded-lg text-sm font-semibold text-white bg-sky-600 hover:bg-sky-700 shadow-sm transition">
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

  // Tutup modal jika klik di luar area modal
  window.addEventListener('click', function(e) {
    const modal = document.getElementById('create-modal');
    if (e.target === modal) {
      closeCreateModal();
    }
  });
</script>
@endpush

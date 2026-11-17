@extends('layouts.app')

@section('title', 'Perbarui Program Ekspedisi — ' . $program->nama)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

  <!-- BREADCRUMB -->
  <div>
    <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold tracking-wider uppercase text-outline hover:text-primary transition-colors">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
      </svg>
      <span>Kembali ke Programs Ledger</span>
    </a>
  </div>

  <!-- FORM CARD (WEEK 10: TASK 01 & TASK 02) -->
  <div class="bg-surface rounded-2xl border border-outline-variant/30 shadow-[0_10px_40px_rgba(0,0,0,0.5)] overflow-hidden">
    <div class="p-6 sm:p-8 border-b border-outline-variant/20 bg-surface-low/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <div>
        <div class="flex items-center gap-2 mb-1.5">
          <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_8px_#f2ca50]"></span>
          <span class="text-xs uppercase tracking-[0.2em] text-primary font-semibold">Update Itinerary Dossier &bull; Task 02</span>
        </div>
        <h1 class="font-serif-luxury text-2xl sm:text-3xl text-on-surface font-normal">
          Perbarui Program Ekspedisi
        </h1>
        <p class="text-xs text-on-surface-variant mt-1.5 leading-relaxed">
          Memperbarui data dossier pada MySQL database via Controller dengan validasi ketat.
        </p>
      </div>

      <span class="px-3.5 py-1.5 rounded-full text-xs font-mono font-bold text-primary bg-primary/10 border border-primary/25 w-fit">
        ID: #{{ $program->id }}
      </span>
    </div>

    <form action="{{ route('programs.update', $program->id) }}" method="POST" class="p-6 sm:p-8 space-y-6" novalidate>
      @csrf
      @method('PUT')

      <!-- Field Nama Program -->
      <div>
        <div class="flex items-center justify-between mb-2">
          <label for="nama" class="block text-xs font-bold text-outline uppercase tracking-widest">
            Nama Program Ekspedisi <span class="text-primary">*</span>
          </label>
          <span class="text-[11px] font-mono text-outline/70">Maksimal 100 karakter</span>
        </div>
        <input 
          type="text" 
          id="nama" 
          name="nama" 
          required 
          maxlength="120"
          value="{{ old('nama', $program->nama) }}"
          placeholder="Contoh: Swiss Alpine Winter Sanctuary & Heli-Chalet"
          class="w-full px-4 py-3.5 text-sm bg-surface-container border {{ $errors->has('nama') ? 'border-red-500/80 focus:border-red-500 focus:ring-1 focus:ring-red-500/40' : 'border-outline-variant/40 focus:border-primary focus:ring-1 focus:ring-primary/40' }} rounded-xl text-on-surface placeholder:text-outline/50 focus:outline-none transition-all"
        />
        @error('nama')
          <p class="text-xs text-red-400 mt-2 flex items-center gap-1.5 font-medium">
            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            <span>{{ $message }}</span>
          </p>
        @enderror
      </div>

      <!-- Field Deskripsi Program -->
      <div>
        <label for="deskripsi" class="block text-xs font-bold text-outline uppercase tracking-widest mb-2">
          Deskripsi Layanan Concierge <span class="text-primary">*</span>
        </label>
        <textarea 
          id="deskripsi" 
          name="deskripsi" 
          rows="6" 
          required 
          placeholder="Jelaskan secara mendalam kurasi perjalanan, fasilitas private jet/yacht, akomodasi, dan layanan eksklusif lainnya..."
          class="w-full px-4 py-3.5 text-sm bg-surface-container border {{ $errors->has('deskripsi') ? 'border-red-500/80 focus:border-red-500 focus:ring-1 focus:ring-red-500/40' : 'border-outline-variant/40 focus:border-primary focus:ring-1 focus:ring-primary/40' }} rounded-xl text-on-surface placeholder:text-outline/50 focus:outline-none transition-all leading-relaxed"
        >{{ old('deskripsi', $program->deskripsi) }}</textarea>
        @error('deskripsi')
          <p class="text-xs text-red-400 mt-2 flex items-center gap-1.5 font-medium">
            <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            <span>{{ $message }}</span>
          </p>
        @enderror
      </div>

      <div class="pt-6 border-t border-outline-variant/20 flex items-center justify-end gap-4">
        <a 
          href="{{ route('programs.index') }}" 
          class="px-5 py-2.5 text-xs font-bold uppercase tracking-wider text-outline hover:text-on-surface transition">
          Batal
        </a>
        <button 
          type="submit" 
          class="px-7 py-3 rounded-full text-xs font-bold uppercase tracking-wider text-black bg-gradient-to-r from-primary to-primary-container hover:from-amber-400 hover:to-primary shadow-[0_0_20px_rgba(242,202,80,0.2)] hover:shadow-[0_0_30px_rgba(242,202,80,0.35)] transition-all">
          Perbarui Program Ekspedisi
        </button>
      </div>
    </form>
  </div>

</div>
@endsection

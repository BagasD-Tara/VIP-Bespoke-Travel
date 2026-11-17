@extends('layouts.app')

@section('title', 'Inisiasi Program Ekspedisi Baru — VIP Bespoke Travel')

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

  <!-- FORM CARD (TASK 03 - CREATE) -->
  <div class="bg-surface rounded-2xl border border-outline-variant/30 shadow-[0_10px_40px_rgba(0,0,0,0.5)] overflow-hidden">
    <div class="p-6 sm:p-8 border-b border-outline-variant/20 bg-surface-low/80">
      <div class="flex items-center gap-2 mb-1.5">
        <span class="w-2 h-2 rounded-full bg-primary shadow-[0_0_8px_#f2ca50]"></span>
        <span class="text-xs uppercase tracking-[0.2em] text-primary font-semibold">New Itinerary Registration</span>
      </div>
      <h1 class="font-serif-luxury text-2xl sm:text-3xl text-on-surface font-normal">
        Inisiasi Program Ekspedisi Baru
      </h1>
      <p class="text-xs text-on-surface-variant mt-1.5 leading-relaxed">
        Data program akan disimpan langsung ke database relasional MySQL via Laravel Eloquent ORM.
      </p>
    </div>

    <form action="{{ route('programs.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
      @csrf

      <div>
        <label for="nama" class="block text-xs font-bold text-outline uppercase tracking-widest mb-2.5">
          Nama Program Ekspedisi <span class="text-primary">*</span>
        </label>
        <input 
          type="text" 
          id="nama" 
          name="nama" 
          required 
          value="{{ old('nama') }}"
          placeholder="Contoh: Swiss Alpine Winter Sanctuary & Heli-Chalet"
          class="w-full px-4 py-3.5 text-sm bg-surface-container border border-outline-variant/40 rounded-xl text-on-surface placeholder:text-outline/50 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/40 transition-all"
        />
      </div>

      <div>
        <label for="deskripsi" class="block text-xs font-bold text-outline uppercase tracking-widest mb-2.5">
          Deskripsi Layanan Concierge <span class="text-primary">*</span>
        </label>
        <textarea 
          id="deskripsi" 
          name="deskripsi" 
          rows="6" 
          required 
          placeholder="Jelaskan secara mendalam kurasi perjalanan, fasilitas private jet/yacht, akomodasi, dan layanan eksklusif lainnya..."
          class="w-full px-4 py-3.5 text-sm bg-surface-container border border-outline-variant/40 rounded-xl text-on-surface placeholder:text-outline/50 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary/40 transition-all leading-relaxed"
        >{{ old('deskripsi') }}</textarea>
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
          Simpan Program Ekspedisi
        </button>
      </div>
    </form>
  </div>

</div>
@endsection

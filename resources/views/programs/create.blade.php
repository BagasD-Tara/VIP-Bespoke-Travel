@extends('layouts.app')

@section('title', 'Tambah Program Baru — PresidentKu')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

  <!-- BREADCRUMB / NAV BACK -->
  <div>
    <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-slate-800 transition">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
      </svg>
      <span>Kembali ke Daftar Program</span>
    </a>
  </div>

  <!-- FORM CARD (TASK 03 - CREATE) -->
  <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
      <h1 class="text-xl font-bold text-slate-900">Tambah Program Baru</h1>
      <p class="text-xs text-slate-500 mt-1">
        Data yang dimasukkan akan disimpan ke dalam database MySQL via model Eloquent.
      </p>
    </div>

    <form action="{{ route('programs.store') }}" method="POST" class="p-6 space-y-5">
      @csrf

      <div>
        <label for="nama" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
          Nama Program <span class="text-red-500">*</span>
        </label>
        <input 
          type="text" 
          id="nama" 
          name="nama" 
          required 
          value="{{ old('nama') }}"
          placeholder="Contoh: Pendidikan / Kesehatan / Lingkungan"
          class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
        />
      </div>

      <div>
        <label for="deskripsi" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
          Deskripsi Program <span class="text-red-500">*</span>
        </label>
        <textarea 
          id="deskripsi" 
          name="deskripsi" 
          rows="5" 
          required 
          placeholder="Tuliskan deskripsi lengkap dari program kerja yang diajukan..."
          class="w-full px-4 py-2.5 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500"
        >{{ old('deskripsi') }}</textarea>
      </div>

      <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
        <a 
          href="{{ route('programs.index') }}" 
          class="px-4 py-2.5 text-sm font-semibold text-slate-600 hover:text-slate-800 transition">
          Batal
        </a>
        <button 
          type="submit" 
          class="px-6 py-2.5 rounded-lg text-sm font-semibold text-white bg-sky-600 hover:bg-sky-700 shadow-sm transition">
          Simpan
        </button>
      </div>
    </form>
  </div>

</div>
@endsection

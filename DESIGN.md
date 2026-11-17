# DESIGN.md — Bespoke Private Concierge Platform

## Brand Identity & Soul
Bespoke adalah platform *private concierge* B2B & *white-label* untuk bisnis yang merancang pengalaman mewah: *luxury travel agencies*, *private travel consultants*, *wedding & event planners*, dan pengelola vila/resor eksklusif.

Karakter desain ini memancarkan aura **keanggunan klasik, presisi profesional, dan kehangatan taktil** (bukan *sterile corporate software*, bukan *crypto-gradient*, dan bukan *cartoon 3D*).

## Dials
- **ENERGY: 2** (Balanced — percaya diri, elegan, berwibawa, mewah tanpa teriak)
- **RHYTHM: 2** (Varied Editorial — variasi struktur antar seksi yang mengalir alami dan menarik pembaca)
- **MOTION: 2** (Subtle & Intentional — micro-interactions, transisi elevasi kartu yang halus, modal responsif, ramah *reduced-motion*)

## Visual Language
- **Kanvas:** *Warm Ivory & Soft Sand* (`#FAF8F5`, `#F5F1E8`), menciptakan nuansa kertas surat mewah (*bespoke stationery*).
- **Tipografi:** 
  - *Serif Editorial:* **Cormorant Garamond** (bobot 400, 500, 600, italic) untuk judul besar yang berkarakter aristokratik.
  - *Modern Sans:* **Manrope** (bobot 400, 500, 600, 700) untuk kejelasan data, label, dan kenyamanan membaca teks panjang.
- **Palet Warna Inti (3 Warna + 1 Aksen):**
  - **Forest Ink (`#141C17`):** Warna primer untuk teks judul, aksen gelap berwibawa, dan kartu hero utama.
  - **Warm Ivory Canvas (`#FAF8F5`):** Warna latar utama yang hangat dan ramah di mata.
  - **Linen Sand (`#F2ECE1`):** Warna permukaan kartu dan seksi transisi.
  - **Champagne Brass (`#C2A46D` / `#8A6D3A`):** Aksen tunggal terarah untuk fokal point, status aktif, dan stempel kurasi.
  - **Line Sand (`#E5DFD3`):** Garis batas halus yang memisahkan elemen tanpa kekakuan.

## Levers & Rules
- **One Focal Point per Screen:** Setiap lipatan layar memiliki satu kartu atau pesan utama yang paling menonjol.
- **Radius Terukur:** 6px (tag/badge/input), 14px–16px (kartu fitur & alur), 24px (kontainer utama/modal).
- **Elevasi Taktil:** Menggunakan bayangan lembut berlapis (`--shadow-sm`, `--shadow-md`, `--shadow-lg`) untuk memberi rasa kedalaman fisik yang nyata.
- **No Em Dash (`—`):** Seluruh copy menggunakan tanda baca alami (koma, titik dua, tanda hubung tipis berjarak, atau kurung).
- **Semantik & Aksesibilitas:** Tag semantik lengkap (`<header>`, `<nav>`, `<main>`, `<section>`, `<footer>`), fokus keyboard terlihat jelas, serta touch target minimum 44px di mobile.


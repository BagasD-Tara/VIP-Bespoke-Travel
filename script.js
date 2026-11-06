// ==========================================================================
// BESPOKE JAVASCRIPT LOGIC
// Dibuat rapi dan terstruktur agar mudah dijelaskan saat presentasi tugas
// ==========================================================================

// --------------------------------------------------------------------------
// 1. UI INTERAKSI: NAVBAR SCROLL & BUTTON HANDLER
// --------------------------------------------------------------------------
const header = document.querySelector('header');
const btnNav = document.querySelector('#btn-nav');
const btnHero = document.querySelector('#btn-hero');

// Mengubah tampilan navbar saat pengguna men-scroll halaman (Scroll Event)
window.addEventListener('scroll', () => {
  if (window.scrollY > 50) {
    header.classList.remove('bg-ink/90');
    header.classList.add('bg-ink', 'shadow-lg');
  } else {
    header.classList.remove('bg-ink', 'shadow-lg');
    header.classList.add('bg-ink/90');
  }
});

// Penanganan klik tombol "Jadwalkan Demo" dengan feedback visual
function handleButtonClick(event) {
  event.preventDefault(); 
  const clickedButton = event.target;
  const originalText = clickedButton.textContent;
  
  clickedButton.textContent = "Memproses...";
  alert("Halo! Permintaan demo Anda sedang diproses oleh tim Bespoke.");
  
  setTimeout(() => {
    clickedButton.textContent = originalText;
    window.location.href = "#kontak";
  }, 800);
}

if (btnNav) btnNav.addEventListener('click', handleButtonClick);
if (btnHero) btnHero.addEventListener('click', handleButtonClick);


// --------------------------------------------------------------------------
// 2. FETCH API (GET) - MEMUAT DATA LAYANAN DINAMIS (SPA)
// Mengambil data dari public dummy API (JSONPlaceholder) secara asinkronus
// --------------------------------------------------------------------------
const API_URL_SERVICES = 'https://jsonplaceholder.typicode.com/posts?_limit=3';
const loadingIndicator = document.getElementById('loading-indicator');
const errorMessage = document.getElementById('error-message');
const apiContainer = document.getElementById('api-container');

async function fetchApiData() {
  if (!apiContainer) return;

  // 1. Tampilkan status loading, sembunyikan container data & error
  loadingIndicator.classList.remove('hidden');
  loadingIndicator.classList.add('flex');
  apiContainer.classList.add('hidden');
  if (errorMessage) errorMessage.classList.add('hidden');

  try {
    // 2. Request GET ke server API
    const response = await fetch(API_URL_SERVICES);
    if (!response.ok) throw new Error("Gagal terhubung ke server API (Status: " + response.status + ")");
    
    // 3. Parsing respons JSON
    const data = await response.json();

    // 4. Sembunyikan loading, munculkan container
    loadingIndicator.classList.add('hidden');
    loadingIndicator.classList.remove('flex');
    apiContainer.classList.remove('hidden');

    // Kosongkan container sebelum append agar tidak duplikat saat reload
    apiContainer.innerHTML = '';

    // Data layanan pelengkap
    const layananBespoke = [
      { title: "Private Jet Charter", desc: "Akses instan ke armada jet pribadi premium untuk perjalanan tanpa hambatan." },
      { title: "Luxury Yacht Rental", desc: "Eksplorasi maritim eksklusif dengan kapal pesiar mewah berstandar bintang lima." },
      { title: "VIP Event Access", desc: "Akses tiket prioritas dan red carpet ke acara bergengsi kelas internasional." }
    ];

    // 5. Render elemen HTML kartu secara dinamis
    data.forEach((item, index) => {
      const card = document.createElement('div');
      card.className = 'bg-white p-7 border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1';
      card.innerHTML = `
        <div class="w-10 h-10 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg flex items-center justify-center font-bold mb-4 text-sm">✦</div>
        <h3 class="font-bold text-lg mb-2 text-slate-800">${layananBespoke[index].title}</h3>
        <p class="text-sm text-slate-600 leading-relaxed">${layananBespoke[index].desc}</p>
      `;
      apiContainer.appendChild(card);
    });

  } catch (error) {
    // 6. Tangani jika terjadi error koneksi
    loadingIndicator.classList.add('hidden');
    loadingIndicator.classList.remove('flex');
    if (errorMessage) {
      errorMessage.classList.remove('hidden');
      document.getElementById('error-text').textContent = error.message;
    }
  }
}

// Jalankan fetch otomatis saat halaman selesai dimuat (DOM Ready)
document.addEventListener('DOMContentLoaded', fetchApiData);


// --------------------------------------------------------------------------
// 3. REST API (POST) & PARSING JSON - FORM LOGIN DENGAN TOKEN
// Mengirim data email & password ke ReqRes API lalu menerima token otentikasi
// --------------------------------------------------------------------------
const loginModal = document.getElementById('login-modal');
const btnOpenLogin = document.getElementById('btn-open-login');
const btnCloseLogin = document.getElementById('btn-close-login');
const loginForm = document.getElementById('login-form');
const loginMessage = document.getElementById('login-message');

// Membuka dan menutup jendela modal login
if (btnOpenLogin) {
  btnOpenLogin.addEventListener('click', () => {
    loginModal.classList.remove('hidden');
  });
}

if (btnCloseLogin) {
  btnCloseLogin.addEventListener('click', () => {
    loginModal.classList.add('hidden');
  });
}

// Tutup modal jika user klik area gelap di luar form
if (loginModal) {
  loginModal.addEventListener('click', (e) => {
    if (e.target === loginModal) {
      loginModal.classList.add('hidden');
    }
  });
}

// Proses submit form login asinkronus (POST Method)
if (loginForm) {
  loginForm.addEventListener('submit', async (e) => {
    e.preventDefault(); // Mencegah reload halaman secara default

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Tampilkan status proses (Loading state)
    loginMessage.className = 'mt-4 p-3 text-sm text-center font-semibold rounded-lg bg-blue-50 text-blue-700 border border-blue-200';
    loginMessage.textContent = "Sedang memverifikasi data ke server...";
    loginMessage.classList.remove('hidden');

    try {
      // Mengirim request POST ke endpoint autentikasi
      const response = await fetch('https://reqres.in/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email: email, password: password })
      });

      // Melakukan parsing response JSON dari server
      const data = await response.json();

      if (response.ok) {
        // Status Sukses: Token berhasil didapatkan
        loginMessage.className = 'mt-4 p-3 text-sm text-center font-semibold rounded-lg bg-emerald-50 text-emerald-800 border border-emerald-200';
        loginMessage.textContent = `Berhasil! Token Sesi: ${data.token}`;

        // Otomatis menutup modal setelah 2 detik
        setTimeout(() => {
          loginModal.classList.add('hidden');
          if (btnOpenLogin) {
            btnOpenLogin.textContent = "Hi, Admin!";
            btnOpenLogin.classList.add('text-brass');
          }
        }, 1800);
      } else {
        // Status Gagal: Server mengembalikan pesan error (misal password salah)
        loginMessage.className = 'mt-4 p-3 text-sm text-center font-semibold rounded-lg bg-red-50 text-red-700 border border-red-200';
        loginMessage.textContent = `Login Gagal: ${data.error || 'Kredensial tidak valid'}`;
      }
    } catch (error) {
      // Tangani kesalahan jaringan / internet offline
      loginMessage.className = 'mt-4 p-3 text-sm text-center font-semibold rounded-lg bg-red-50 text-red-700 border border-red-200';
      loginMessage.textContent = "Terjadi gangguan jaringan. Silakan coba lagi.";
    }
  });
}
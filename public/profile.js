const TOKEN_KEY = "bespoke_token";
const statusEl = document.getElementById("status");
const profileEl = document.getElementById("profile");
const jsonEl = document.getElementById("json");

function goToLogin() {
  sessionStorage.removeItem(TOKEN_KEY);
  window.location.href = "login.html";
}

document.getElementById("logout-btn").addEventListener("click", goToLogin);

async function loadProfile() {
  const token = sessionStorage.getItem(TOKEN_KEY);
  if (!token) return goToLogin();

  try {
    const response = await fetch("/api/profile", {
      headers: { Authorization: "Bearer " + token },
    });

    let result;
    try {
      result = await response.json();
    } catch {
      throw new Error("Respons server tidak valid.");
    }

    if (response.status === 401) return goToLogin();

    if (!response.ok || !result.success) {
      statusEl.textContent = result.message || "Gagal memuat profil.";
      return;
    }

    const u = result.data;
    document.getElementById("f-name").textContent = u.name;
    document.getElementById("f-email").textContent = u.email;
    document.getElementById("f-role").textContent = u.role;
    document.getElementById("f-company").textContent = u.company;
    document.getElementById("f-created").textContent = new Date(u.createdAt).toLocaleString("id-ID");

    jsonEl.textContent = JSON.stringify(result, null, 2); // objek -> JSON rapi
    statusEl.classList.add("hidden");
    profileEl.classList.remove("hidden");
  } catch (err) {
    statusEl.textContent = "Tidak dapat terhubung ke server. Periksa koneksi Anda.";
  }
}

loadProfile();
const form = document.getElementById("login-form");
const messageEl = document.getElementById("message");
const submitBtn = document.getElementById("submit-btn");

function showMessage(text, type) {
  messageEl.textContent = text;
  messageEl.className =
    "text-sm px-4 py-3 border-l-[3px] " +
    (type === "success"
      ? "bg-tint border-brass text-charcoal"
      : "bg-red-50 border-red-700 text-red-800");
}

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const payload = {
    email: form.email.value.trim(),
    password: form.password.value,
  };

  if (!payload.email || !payload.password) {
    showMessage("Email dan password wajib diisi.", "error");
    return;
  }

  submitBtn.disabled = true;
  submitBtn.textContent = "Memproses...";

  try {
    const response = await fetch("/api/auth/login", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload), // objek -> JSON
    });

    // JSON -> objek (aman jika server membalas non-JSON)
    let data;
    try {
      data = await response.json();
    } catch {
      throw new Error("Respons server tidak valid.");
    }

    if (!response.ok || !data.success) {
      showMessage(data.message || "Login gagal. Coba lagi.", "error");
      return;
    }

    sessionStorage.setItem("bespoke_token", data.token);
    showMessage("Berhasil masuk. Mengalihkan ke dashboard...", "success");
    form.reset();
    setTimeout(() => {
      window.location.href = "dashboard.html";
    }, 600);
  } catch (err) {
    showMessage("Tidak dapat terhubung ke server. Periksa koneksi Anda.", "error");
  } finally {
    submitBtn.disabled = false;
    submitBtn.textContent = "Masuk";
  }
});
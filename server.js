require("dotenv").config();
const express = require("express");
const path = require("path");
const fs = require("fs");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");

const PORT = process.env.PORT || 3000;
const JWT_SECRET = process.env.JWT_SECRET;
const JWT_EXPIRES_IN = process.env.JWT_EXPIRES_IN || "2h";

if (!JWT_SECRET) {
  console.error("JWT_SECRET belum diisi. Buat file .env lalu isi nilainya.");
  process.exit(1);
}

const app = express();
app.use(express.json({ limit: "10kb" }));

app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "landing_page.html"));
});

app.use(express.static(path.join(__dirname, "public")));

function loadUsers() {
  const raw = fs.readFileSync(path.join(__dirname, "users.json"), "utf8");
  return JSON.parse(raw);
}

// Data publik pengguna (tanpa passwordHash)
function toPublicUser(user) {
  const { passwordHash, ...publicData } = user;
  return publicData;
}

const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const DUMMY_HASH = bcrypt.hashSync("tidak-dipakai", 10);

// Middleware: verifikasi token "Authorization: Bearer <token>"
function requireAuth(req, res, next) {
  const header = req.headers.authorization || "";
  const [scheme, token] = header.split(" ");

  if (scheme !== "Bearer" || !token) {
    return res.status(401).json({ success: false, message: "Token tidak ditemukan." });
  }

  try {
    req.auth = jwt.verify(token, JWT_SECRET); // { sub: email, iat, exp }
    next();
  } catch (err) {
    const message = err.name === "TokenExpiredError" ? "Sesi telah berakhir. Silakan masuk lagi." : "Token tidak valid.";
    return res.status(401).json({ success: false, message });
  }
}

// POST /api/auth/login
app.post("/api/auth/login", async (req, res) => {
  const { email, password } = req.body || {};

  if (typeof email !== "string" || typeof password !== "string" || !email.trim() || !password) {
    return res.status(400).json({ success: false, message: "Email dan password wajib diisi." });
  }
  if (!EMAIL_PATTERN.test(email.trim())) {
    return res.status(400).json({ success: false, message: "Format email tidak valid." });
  }

  const normalizedEmail = email.trim().toLowerCase();
  let users;
  try {
    users = loadUsers();
  } catch (err) {
    console.error("Gagal membaca users.json:", err.message);
    return res.status(500).json({ success: false, message: "Terjadi kesalahan pada server." });
  }

  const user = users.find((u) => u.email.toLowerCase() === normalizedEmail);
  const isMatch = await bcrypt.compare(password, user ? user.passwordHash : DUMMY_HASH);

  if (!user || !isMatch) {
    return res.status(401).json({ success: false, message: "Email atau password salah." });
  }

  const token = jwt.sign({ sub: user.email }, JWT_SECRET, { expiresIn: JWT_EXPIRES_IN });
  return res.status(200).json({ success: true, user: { email: user.email }, token });
});

// Data Dashboard
function loadDashboardData() {
  const raw = fs.readFileSync(path.join(__dirname, "dashboard-data.json"), "utf8");
  return JSON.parse(raw);
}

function saveDashboardData(data) {
  fs.writeFileSync(path.join(__dirname, "dashboard-data.json"), JSON.stringify(data, null, 2), "utf8");
}

app.get("/dashboard", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "dashboard.html"));
});

// GET /api/dashboard (REST API endpoint)
app.get("/api/dashboard", (req, res) => {
  let customerName = "Dragon";
  let customerEmail = "dahlah@contoh.com";

  // Cek token jika ada
  const header = req.headers.authorization || "";
  const [scheme, token] = header.split(" ");
  if (scheme === "Bearer" && token) {
    try {
      const decoded = jwt.verify(token, JWT_SECRET);
      const users = loadUsers();
      const user = users.find((u) => u.email.toLowerCase() === String(decoded.sub).toLowerCase());
      if (user) {
        customerName = user.name || user.email.split("@")[0];
        customerEmail = user.email;
      }
    } catch (err) {
      // jika token expired/invalid tapi request ingin data, fallback ke user default atau error
    }
  }

  try {
    const data = loadDashboardData();
    data.customer = {
      name: customerName,
      email: customerEmail,
    };
    return res.status(200).json({ success: true, data });
  } catch (err) {
    console.error("Gagal memuat dashboard-data.json:", err.message);
    return res.status(500).json({ success: false, message: "Terjadi kesalahan server saat memuat data dashboard." });
  }
});

// POST /api/requests (Menambahkan request baru)
app.post("/api/requests", (req, res) => {
  const { destination, dateRange, guests, notes } = req.body || {};

  if (!destination || !dateRange) {
    return res.status(400).json({ success: false, message: "Destinasi dan tanggal perjalanan wajib diisi." });
  }

  try {
    const dashboard = loadDashboardData();
    const newRequest = {
      id: "req-" + Date.now(),
      destination: destination.trim(),
      dateRange: dateRange.trim(),
      guests: parseInt(guests, 10) || 2,
      statusBadge: "Diajukan",
      statusType: "info",
      currentStepIndex: 0,
      steps: ["Diajukan", "Ditinjau", "Proposal", "Disetujui", "Dikonfirmasi"],
      footerType: "estimate",
      costEstimate: "Sedang dikalkulasi",
      costBadge: "Estimasi",
    };

    dashboard.requestSaya.unshift(newRequest);
    saveDashboardData(dashboard);

    return res.status(201).json({ success: true, message: "Request baru berhasil diajukan.", data: newRequest });
  } catch (err) {
    console.error("Gagal menyimpan request:", err.message);
    return res.status(500).json({ success: false, message: "Gagal menyimpan request perjalanan." });
  }
});

// GET /api/profile  (wajib login)
app.get("/api/profile", requireAuth, (req, res) => {
  let users;
  try {
    users = loadUsers();
  } catch (err) {
    console.error("Gagal membaca users.json:", err.message);
    return res.status(500).json({ success: false, message: "Terjadi kesalahan pada server." });
  }

  const user = users.find((u) => u.email.toLowerCase() === String(req.auth.sub).toLowerCase());
  if (!user) {
    return res.status(404).json({ success: false, message: "Pengguna tidak ditemukan." });
  }

  return res.status(200).json({ success: true, data: toPublicUser(user) });
});

app.use((err, req, res, next) => {
  if (err.type === "entity.parse.failed") {
    return res.status(400).json({ success: false, message: "Body request bukan JSON yang valid." });
  }
  if (err.type === "entity.too.large") {
    return res.status(413).json({ success: false, message: "Body request terlalu besar." });
  }
  console.error(err);
  return res.status(500).json({ success: false, message: "Terjadi kesalahan pada server." });
});

app.listen(PORT, () => console.log(`Bespoke berjalan di http://localhost:${PORT}`));
// Membuat/mengubah akun di users.json.
// Pemakaian: npm run hash -- email@contoh.com PasswordAnda "Nama Lengkap" "Peran" "Perusahaan"
const fs = require("fs");
const path = require("path");
const bcrypt = require("bcryptjs");

const [email, password, name, role, company] = process.argv.slice(2);
if (!email || !password) {
  console.error('Pemakaian: npm run hash -- email@contoh.com PasswordAnda "Nama" "Peran" "Perusahaan"');
  process.exit(1);
}

const file = path.join(__dirname, "users.json");
const users = fs.existsSync(file) ? JSON.parse(fs.readFileSync(file, "utf8")) : [];

const entry = {
  id: undefined,
  email: email.toLowerCase(),
  passwordHash: bcrypt.hashSync(password, 10),
  name: name || email.split("@")[0],
  role: role || "Concierge",
  company: company || "-",
  createdAt: new Date().toISOString(),
};

const idx = users.findIndex((u) => u.email === entry.email);
if (idx >= 0) {
  // pertahankan id & createdAt lama saat akun diperbarui
  entry.id = users[idx].id;
  entry.createdAt = users[idx].createdAt || entry.createdAt;
  users[idx] = entry;
} else {
  entry.id = users.length ? Math.max(...users.map((u) => u.id || 0)) + 1 : 1;
  users.push(entry);
}

fs.writeFileSync(file, JSON.stringify(users, null, 2) + "\n");
console.log(`Akun ${entry.email} disimpan di users.json`);
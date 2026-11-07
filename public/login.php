<?php
/**
 * VIP Bespoke Travel - Login Page (PHP)
 * Desain presisi mengikuti public/login.html
 */
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}

$errorMessage = null;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $errorMessage = "Email dan password wajib diisi.";
    } else {
        $usersFile = file_exists(__DIR__ . '/users.json') 
            ? __DIR__ . '/users.json' 
            : dirname(__DIR__) . '/users.json';
        
        $users = [];
        if (file_exists($usersFile)) {
            $users = json_decode(file_get_contents($usersFile), true) ?: [];
        }

        $authenticatedUser = null;
        foreach ($users as $u) {
            if (strcasecmp($u['email'], $email) === 0) {
                if (isset($u['passwordHash']) && password_verify($password, $u['passwordHash'])) {
                    $authenticatedUser = $u;
                }
                break;
            }
        }

        if ($authenticatedUser) {
            $_SESSION['user'] = [
                'email' => $authenticatedUser['email'],
                'name'  => $authenticatedUser['name'] ?? explode('@', $authenticatedUser['email'])[0]
            ];
            header("Location: dashboard.php");
            exit;
        } else {
            $errorMessage = "Email atau password salah.";
        }
    }
}
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Masuk — Bespoke</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,400&family=Manrope:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              ink: "#141c17",
              "ink-soft": "#1f2a23",
              ivory: "#ede6d8",
              "ivory-dim": "#b9b2a2",
              charcoal: "#2b332e",
              "charcoal-dim": "#6b7570",
              brass: "#c2a46d",
              "brass-deep": "#8a6d3a",
              tint: "#f5f2ea",
            },
            fontFamily: {
              serif: ['"Cormorant Garamond"', "serif"],
              sans: ["Manrope", "sans-serif"],
            },
          },
        },
      };
    </script>
  </head>
  <body class="font-sans text-charcoal antialiased bg-white">
    <main class="grid min-h-screen lg:grid-cols-2">
      <section class="bg-ink text-ivory flex flex-col justify-between p-8 sm:p-12 lg:p-16">
        <a href="landing_page.html" class="flex items-baseline gap-2.5 font-serif text-2xl w-fit">
          <span class="inline-block w-[9px] h-[9px] rounded-full bg-brass -translate-y-0.5"></span>
          Bespoke
        </a>
        <div class="py-16 lg:py-0">
          <h1 class="font-serif font-medium text-4xl sm:text-5xl leading-[1.08] max-w-[14ch]">
            Ruang kerja concierge Anda.
          </h1>
          <p class="mt-6 text-ivory-dim max-w-[40ch]">
            Masuk untuk mengelola permintaan, itinerary, dan booking pelanggan dalam satu tempat.
          </p>
        </div>
        <a href="landing_page.html" class="text-sm text-ivory-dim hover:text-ivory transition-colors w-fit">
          Kembali ke beranda
        </a>
      </section>

      <section class="flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-sm">
          <h2 class="font-serif font-medium text-3xl text-ink">Masuk</h2>
          <p class="mt-2 text-sm text-charcoal-dim">Gunakan akun yang diberikan oleh administrator Anda.</p>

          <form id="login-form" class="mt-8 space-y-5" method="POST" action="login.php">
            <div>
              <label for="email" class="block text-sm font-semibold text-ink mb-1.5">Email</label>
              <input
                id="email"
                name="email"
                type="email"
                autocomplete="username"
                required
                value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                class="w-full border border-ink/20 bg-white px-4 py-3 text-[15px] outline-none rounded-sm focus:border-brass-deep focus:ring-2 focus:ring-brass/40"
              />
            </div>
            <div>
              <label for="password" class="block text-sm font-semibold text-ink mb-1.5">Password</label>
              <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                required
                class="w-full border border-ink/20 bg-white px-4 py-3 text-[15px] outline-none rounded-sm focus:border-brass-deep focus:ring-2 focus:ring-brass/40"
              />
            </div>

            <p id="message" role="alert" class="<?= $errorMessage ? 'text-sm px-4 py-3 border-l-[3px] bg-red-50 border-red-700 text-red-800' : 'hidden text-sm px-4 py-3 border-l-[3px]' ?>">
              <?= $errorMessage ? htmlspecialchars($errorMessage) : '' ?>
            </p>

            <button
              id="submit-btn"
              type="submit"
              class="w-full bg-brass text-ink font-bold text-[15px] py-3.5 rounded-sm hover:bg-[#d4b885] transition-colors focus:outline-none focus:ring-2 focus:ring-ink focus:ring-offset-2 disabled:opacity-60 disabled:cursor-not-allowed"
            >
              Masuk
            </button>
          </form>
        </div>
      </section>
    </main>
  </body>
</html>

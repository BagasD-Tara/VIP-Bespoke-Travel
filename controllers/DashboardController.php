<?php
/**
 * Pertemuan 7 - Web Programming
 * Task 02 & Task 03: CONTROLLER (DashboardController)
 * 
 * Bertanggung jawab menangani alur request:
 * 1. Menerima request dari user (misal: filter status perjalanan lewat $_GET['status'])
 * 2. Memanggil Model (TravelModel) untuk mengambil data
 * 3. Memproses logika data (filtering, greeting dinamis, kalkulasi metrik)
 * 4. Mengirim / melempar data ke View (views/dashboard-view.php)
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
 * Proyek: VIP Bespoke Travel
 */

require_once dirname(__DIR__) . '/models/TravelModel.php';

class DashboardController {
    private TravelModel $travelModel;

    /**
     * Inisialisasi controller dan instansiasi TravelModel
     */
    public function __construct(?TravelModel $travelModel = null) {
        $this->travelModel = $travelModel ?? new TravelModel();
    }

    /**
     * Method index(): Menangani request halaman dashboard utama
     * Alur: Request -> Controller -> Model -> Process -> View
     */
    public function index(): void {
        // ---------------------------------------------------------------------
        // 1. REQUEST HANDLING: Tangkap & bersihkan query parameter 'status'
        // ---------------------------------------------------------------------
        $rawStatus = isset($_GET['status']) ? trim($_GET['status']) : 'all';
        // Normalisasi status untuk keamanan
        $activeFilter = preg_replace('/[^a-zA-Z0-9_\-\s]/', '', $rawStatus);
        if (empty($activeFilter)) {
            $activeFilter = 'all';
        }

        // ---------------------------------------------------------------------
        // 2. MEMANGGIL MODEL: Ambil data dari TravelModel
        // ---------------------------------------------------------------------
        $dashboardData     = $this->travelModel->getDashboardData();
        $requests          = $this->travelModel->getRequestsByFilter($activeFilter);
        $availableStatuses = $this->travelModel->getAvailableStatuses();

        // ---------------------------------------------------------------------
        // 3. LOGIKA PROSES: Siapkan data siap pakai untuk View
        // ---------------------------------------------------------------------
        $client = $dashboardData['client'] ?? [
            'name'            => 'Alexander Wright',
            'title'           => 'Lord Alexander Wright',
            'member_id'       => 'VIP-8821',
            'tier'            => 'Black Diamond Concierge Elite',
            'city'            => 'Zurich',
            'avatar_initials' => 'AW'
        ];

        $stats = $dashboardData['stats'] ?? [
            'total_requests' => count($requests),
            'total_budget'   => '$0',
            'response_time'  => '< 15 Menit'
        ];

        // Buat ucapan salam dinamis berdasarkan jam lokal
        $greeting = $this->generateGreeting($client['name'] ?? 'VIP Member');

        // Hitung total hasil filter
        $totalFiltered = count($requests);

        // ---------------------------------------------------------------------
        // 4. MENGIRIM DATA KE VIEW
        // Variabel ($client, $stats, $requests, $activeFilter, $availableStatuses,
        // $greeting, $totalFiltered) akan dapat langsung diakses di dalam file view
        // ---------------------------------------------------------------------
        $viewPath = dirname(__DIR__) . '/views/dashboard-view.php';

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Error: View template tidak ditemukan di: " . htmlspecialchars($viewPath) . "</h1>";
        }
    }

    /**
     * Helper untuk membuat greeting kontekstual berdasarkan waktu
     */
    private function generateGreeting(string $clientName): string {
        $hour = (int) date('H');

        if ($hour >= 5 && $hour < 12) {
            $timeGreeting = 'Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 18) {
            $timeGreeting = 'Selamat Siang';
        } else {
            $timeGreeting = 'Selamat Malam';
        }

        return "{$timeGreeting}, " . $clientName;
    }
}


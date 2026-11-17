<?php
/**
 * Pertemuan 7 - Web Programming
 * Task 02 & Task 03: CONTROLLER (DashboardController)
 * 
 * Bertanggung jawab menangani alur request MVC:
 * 1. Menerima request dari user (misal: filter status atau pengajuan request baru via POST)
 * 2. Memanggil Model (TravelModel) untuk mengambil data
 * 3. Memproses logika data dan sanitasi
 * 4. Mengirim data ke View (views/dashboard-view.php)
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra & Bagas Dewantara
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
        $notification = null;

        // ---------------------------------------------------------------------
        // 1. REQUEST HANDLING: POST Request (Buat Request Baru dari Modal)
        // ---------------------------------------------------------------------
        if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && ($_POST['action'] ?? '') === 'new_request') {
            $destination = trim($_POST['destination'] ?? '');
            $dateRange   = trim($_POST['dateRange'] ?? '');
            $guests      = (int)($_POST['guests'] ?? 2);
            $notes       = trim($_POST['notes'] ?? '');

            if ($destination !== '' && $dateRange !== '') {
                $newRequest = [
                    'id'               => 'req-' . time(),
                    'destination'      => $destination,
                    'dateRange'        => $dateRange,
                    'guests'           => $guests > 0 ? $guests : 1,
                    'statusBadge'      => 'Diajukan',
                    'statusType'       => 'warning',
                    'currentStepIndex' => 0,
                    'steps'            => ["Diajukan", "Ditinjau", "Proposal", "Disetujui", "Dikonfirmasi"],
                    'footerType'       => 'estimate',
                    'costEstimate'     => 'Menunggu Kurasi',
                    'costBadge'        => 'Baru'
                ];

                $this->travelModel->addRequest($newRequest);

                $notification = [
                    'type'    => 'success',
                    'title'   => 'Permintaan Berhasil Diproses',
                    'message' => 'Concierge kami telah menerima dan memproses data perjalanan untuk "' . htmlspecialchars($destination) . '".'
                ];
            } else {
                $notification = [
                    'type'    => 'error',
                    'title'   => 'Gagal Mengirim',
                    'message' => 'Destinasi dan tanggal perjalanan wajib diisi.'
                ];
            }
        }

        // ---------------------------------------------------------------------
        // 2. REQUEST HANDLING: Filter Status dari Query Parameter
        // ---------------------------------------------------------------------
        $rawFilter = isset($_GET['status']) ? trim($_GET['status']) : (isset($_GET['filter']) ? trim($_GET['filter']) : 'all');
        $activeFilter = preg_replace('/[^a-zA-Z0-9_\-\s]/', '', $rawFilter);
        if (empty($activeFilter)) {
            $activeFilter = 'all';
        }

        // ---------------------------------------------------------------------
        // 3. MEMANGGIL MODEL: Ambil data dari TravelModel
        // ---------------------------------------------------------------------
        $business            = $this->travelModel->getBusiness();
        $customer            = $this->travelModel->getCustomer();
        $perluTindakan       = $this->travelModel->getActionItems();
        $requestSaya         = $this->travelModel->getRequestSaya($activeFilter);
        $perjalananMendatang = $this->travelModel->getUpcomingTrip();
        $pesanTerbaru        = $this->travelModel->getLatestMessages();

        // ---------------------------------------------------------------------
        // 4. MENGIRIM DATA KE VIEW
        // ---------------------------------------------------------------------
        $viewPath = dirname(__DIR__) . '/views/dashboard-view.php';

        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "<h1>Error: View template tidak ditemukan di: " . htmlspecialchars($viewPath) . "</h1>";
        }
    }
}

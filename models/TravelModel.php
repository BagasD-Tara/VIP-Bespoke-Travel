<?php
/**
 * Pertemuan 7 - Web Programming
 * Task 01 & Task 03: MODEL (TravelModel)
 * 
 * Bertanggung jawab mengelola akses dan persistensi data dashboard:
 * - Membaca data dari sumber data persistensi (dashboard-data.json)
 * - Menyediakan method data getter untuk customer, business, perluTindakan, requestSaya, dll.
 * - Menyediakan persistensi untuk penambahan request perjalanan baru
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra & Bagas Dewantara
 * Proyek: VIP Bespoke Travel
 */

class TravelModel {
    private string $filePath;

    /**
     * Inisialisasi lokasi file dashboard-data.json
     */
    public function __construct(string $filePath = '') {
        if (!empty($filePath)) {
            $this->filePath = $filePath;
        } else {
            $defaultPath = dirname(__DIR__) . '/dashboard-data.json';
            $this->filePath = file_exists($defaultPath) ? $defaultPath : __DIR__ . '/dashboard-data.json';
        }
    }

    /**
     * Membaca dan mengambil seluruh data dari dashboard-data.json
     * 
     * @return array
     */
    public function getDashboardData(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $rawJson = @file_get_contents($this->filePath);
        if ($rawJson === false) {
            return [];
        }

        $data = json_decode($rawJson, true);
        return is_array($data) ? $data : [];
    }

    /**
     * Menyimpan data kembali ke dashboard-data.json
     * 
     * @param array $data
     * @return bool
     */
    public function saveDashboardData(array $data): bool {
        return @file_put_contents(
            $this->filePath, 
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        ) !== false;
    }

    /**
     * Mengambil data profil bisnis / concierge
     */
    public function getBusiness(): array {
        $data = $this->getDashboardData();
        return $data['business'] ?? ['name' => 'Bespoke', 'logo' => 'B'];
    }

    /**
     * Mengambil data customer aktif
     */
    public function getCustomer(): array {
        $data = $this->getDashboardData();
        return $data['customer'] ?? ['name' => 'Dragon', 'email' => 'dahlah@contoh.com'];
    }

    /**
     * Mengambil daftar item aksi (perlu tindakan)
     */
    public function getActionItems(): array {
        $data = $this->getDashboardData();
        return $data['perluTindakan'] ?? [];
    }

    /**
     * Mengambil daftar request perjalanan aktif (Request Saya)
     */
    public function getRequestSaya(?string $filter = null): array {
        $data = $this->getDashboardData();
        $requests = $data['requestSaya'] ?? [];

        if (empty($filter) || strtolower($filter) === 'all') {
            return $requests;
        }

        $normalized = strtolower(trim($filter));
        $filtered = array_filter($requests, function ($req) use ($normalized) {
            $status = strtolower($req['statusBadge'] ?? '');
            return str_contains($status, $normalized);
        });

        return array_values($filtered);
    }

    /**
     * Mengambil data jadwal perjalanan mendatang
     */
    public function getUpcomingTrip(): array {
        $data = $this->getDashboardData();
        return $data['perjalananMendatang'] ?? [
            'dateDay' => '18',
            'dateMonth' => 'NOV',
            'destination' => 'Kyoto, Jepang',
            'confirmedSummary' => '3 dari 4 booking Confirmed'
        ];
    }

    /**
     * Mengambil daftar pesan terbaru dari concierge
     */
    public function getLatestMessages(): array {
        $data = $this->getDashboardData();
        return $data['pesanTerbaru'] ?? [];
    }

    /**
     * Menambahkan request perjalanan baru ke dalam dashboard-data.json
     */
    public function addRequest(array $newRequest): bool {
        $data = $this->getDashboardData();
        if (!isset($data['requestSaya']) || !is_array($data['requestSaya'])) {
            $data['requestSaya'] = [];
        }

        array_unshift($data['requestSaya'], $newRequest);
        return $this->saveDashboardData($data);
    }

    /**
     * Backward-compatibility method untuk filter requests
     */
    public function getRequestsByFilter(?string $status = null): array {
        return $this->getRequestSaya($status);
    }
}

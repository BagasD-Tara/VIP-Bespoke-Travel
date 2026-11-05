<?php
/**
 * Pertemuan 7 - Web Programming
 * Task 01 & Task 03: MODEL (TravelModel)
 * 
 * Bertanggung jawab mengelola akses dan pengolahan data perjalanan:
 * - Membaca data dari sumber data persistensi (dashboard-data.json)
 * - Menyediakan method getDashboardData()
 * - Menyediakan method getRequestsByFilter($status)
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
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
            // Default path relative to models/ directory
            $this->filePath = dirname(__DIR__) . '/dashboard-data.json';
        }
    }

    /**
     * Membaca dan mengambil seluruh data dari dashboard-data.json
     * 
     * @return array
     */
    public function getDashboardData(): array {
        if (!file_exists($this->filePath)) {
            return [
                'client'   => [
                    'name'            => 'VIP Client',
                    'title'           => 'VIP Guest',
                    'member_id'       => 'VIP-0000',
                    'tier'            => 'Exclusive Member',
                    'avatar_initials' => 'VIP'
                ],
                'stats'    => [
                    'total_requests' => 0,
                    'total_budget'   => '$0',
                    'response_time'  => 'Instant'
                ],
                'requests' => []
            ];
        }

        $rawJson = file_get_contents($this->filePath);
        $data = json_decode($rawJson, true);

        return is_array($data) ? $data : [];
    }

    /**
     * Mengambil daftar request perjalanan yang telah difilter berdasarkan status.
     * Jika status bernilai 'all', null, atau kosong, kembalikan semua data.
     * 
     * @param string|null $status
     * @return array
     */
    public function getRequestsByFilter(?string $status = null): array {
        $dashboardData = $this->getDashboardData();
        $allRequests   = $dashboardData['requests'] ?? [];

        // Jika tidak ada filter atau filter 'all', tampilkan semua request
        if (empty($status) || strtolower($status) === 'all') {
            return $allRequests;
        }

        $normalizedStatus = strtolower(trim($status));

        // Filter request sesuai status yang diminta
        $filtered = array_filter($allRequests, function ($request) use ($normalizedStatus) {
            $requestStatus = strtolower($request['status'] ?? '');
            return $requestStatus === $normalizedStatus;
        });

        // Re-index array agar key berurutan dari 0
        return array_values($filtered);
    }

    /**
     * Mengambil daftar seluruh status unik yang ada beserta total itemnya
     * Sangat berguna untuk filter tabs dinamis di View
     * 
     * @return array
     */
    public function getAvailableStatuses(): array {
        $dashboardData = $this->getDashboardData();
        $allRequests   = $dashboardData['requests'] ?? [];

        $counts = ['all' => count($allRequests)];

        foreach ($allRequests as $req) {
            $st = $req['status'] ?? 'Unknown';
            $key = strtolower($st);
            if (!isset($counts[$key])) {
                $counts[$key] = [
                    'label' => $st,
                    'count' => 0
                ];
            }
            $counts[$key]['count']++;
        }

        return $counts;
    }
}


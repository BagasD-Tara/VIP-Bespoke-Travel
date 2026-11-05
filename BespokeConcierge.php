<?php
/**
 * Pertemuan 6 - Web Programming
 * Class: BespokeConcierge
 * 
 * Class ini merepresentasikan data dan perilaku (behavior) sistem Bespoke Concierge
 * Mengimplementasikan prinsip Object-Oriented Programming (OOP) sesuai:
 * - TASK 01: Create a Class (CLASS -> OBJECT)
 * - TASK 02: Add Properties & Methods (OBJECT = DATA + BEHAVIOR)
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
 */

class BespokeConcierge {
    // =========================================================================
    // TASK 01: PROPERTY DEFINITIONS (DATA)
    // =========================================================================
    public string $suiteName;
    public string $destination;
    public string $client;
    public string $status;
    public string $totalCurated;
    public array $stats;
    public array $services;

    /**
     * Constructor untuk inisialisasi object BespokeConcierge
     */
    public function __construct(
        string $suiteName = 'The Alpine Retreat',
        string $destination = 'Zermatt & St. Moritz, Swiss',
        string $client = 'VIP Member #8821',
        string $status = 'Proposal Approved',
        string $totalCurated = '4 Vendor Premium Terverifikasi',
        array $stats = [],
        array $services = []
    ) {
        $this->suiteName    = $suiteName;
        $this->destination  = $destination;
        $this->client       = $client;
        $this->status       = $status;
        $this->totalCurated = $totalCurated;
        
        // Default Stats jika kosong
        $this->stats = !empty($stats) ? $stats : [
            ['label' => 'Respon', 'value' => '< 15 Menit', 'color' => 'text-brass'],
            ['label' => 'Keamanan', 'value' => '100% Privat', 'color' => 'text-emerald-400'],
            ['label' => 'Sinkronisasi', 'value' => 'Real-Time', 'color' => 'text-ivory']
        ];

        // Default Services jika kosong
        $this->services = !empty($services) ? $services : [
            [
                'title'       => 'Private Jet Charter',
                'description' => 'Akses instan ke armada jet pribadi premium untuk perjalanan tanpa hambatan lintas benua.',
                'icon'        => '✈',
                'badge'       => 'Aviation'
            ],
            [
                'title'       => 'Luxury Yacht Rental',
                'description' => 'Eksplorasi maritim eksklusif dengan kapal pesiar mewah berstandar bintang lima dan awak profesional.',
                'icon'        => '⚓',
                'badge'       => 'Maritime'
            ],
            [
                'title'       => 'VIP Event Access',
                'description' => 'Akses tiket prioritas dan red carpet ke acara bergengsi kelas internasional serta private backstage.',
                'icon'        => '✦',
                'badge'       => 'Exclusive'
            ]
        ];
    }

    // =========================================================================
    // TASK 02: METHODS (BEHAVIOR)
    // =========================================================================

    /**
     * Method untuk mengambil profil suite concierge (Hero Section)
     * @return array
     */
    public function getSuiteProfile(): array {
        return [
            'suiteName'    => $this->suiteName,
            'destination'  => $this->destination,
            'client'       => $this->client,
            'status'       => $this->status,
            'totalCurated' => $this->totalCurated
        ];
    }

    /**
     * Method untuk mengambil daftar layanan kurasi eksklusif
     * @return array
     */
    public function getServices(): array {
        return $this->services;
    }

    /**
     * Method untuk mengambil metrik statistik operasional
     * @return array
     */
    public function getStats(): array {
        return $this->stats;
    }

    /**
     * Method untuk merender status badge beranimasi secara dinamis
     * @return string
     */
    public function getStatusBadge(): string {
        return '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> ' . htmlspecialchars($this->status) . '
        </span>';
    }

    /**
     * Method untuk menambahkan layanan baru ke koleksi
     * @param array $service
     * @return void
     */
    public function addService(array $service): void {
        $this->services[] = $service;
    }
}
?>

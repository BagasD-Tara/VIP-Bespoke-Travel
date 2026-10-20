<?php
/**
 * VIP Bespoke Travel - Data Processing Layer (PHP)
 * Berkas ini bertanggung jawab untuk memproses, memvalidasi, mengagregasi,
 * memformat, memfilter, dan mempersiapkan seluruh data mentah sebelum dirender ke view.
 */

// 1. Pemformatan Mata Uang Rupiah
function formatRupiah(int|float $amount): string {
    if ($amount <= 0) {
        return 'Sedang dikalkulasi';
    }
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

// 2. Ekstraksi Angka dari Format Rupiah
function parseRupiah(?string $str): int {
    if (empty($str)) {
        return 0;
    }
    $clean = preg_replace('/[^0-9]/', '', $str);
    return !empty($clean) ? (int)$clean : 0;
}

// 3. Greeting Cerdas Sesuai Waktu Server (Time-of-Day)
function getTimeBasedGreeting(): array {
    date_default_timezone_set('Asia/Jakarta');
    $hour = (int)date('H');

    if ($hour >= 4 && $hour < 11) {
        return [
            'greeting' => 'Selamat Pagi',
            'timeOfDay' => 'morning',
            'period' => 'Pagi'
        ];
    } elseif ($hour >= 11 && $hour < 15) {
        return [
            'greeting' => 'Selamat Siang',
            'timeOfDay' => 'afternoon',
            'period' => 'Siang'
        ];
    } elseif ($hour >= 15 && $hour < 18) {
        return [
            'greeting' => 'Selamat Sore',
            'timeOfDay' => 'evening',
            'period' => 'Sore'
        ];
    } else {
        return [
            'greeting' => 'Selamat Malam',
            'timeOfDay' => 'night',
            'period' => 'Malam'
        ];
    }
}

// 4. Generator Inisial Nama (Avatar Initials)
function getAvatarInitials(string $name): string {
    $cleanName = trim(preg_replace('/\s*\(.*?\)\s*/', '', $name));
    if ($cleanName === '') {
        return 'VIP';
    }

    $words = preg_split('/\s+/', $cleanName);
    if (count($words) >= 2) {
        return strtoupper(mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1));
    }
    
    if (mb_strlen($cleanName) >= 2) {
        return strtoupper(mb_substr($cleanName, 0, 2));
    }
    return strtoupper(mb_substr($cleanName, 0, 1));
}

// 5. Kalkulator Durasi Hari & Malam dari Rentang Tanggal
function calculateDuration(string $dateRange): array {
    $normalized = str_replace(['–', '—', 'to'], '-', $dateRange);
    $parts = explode('-', $normalized);

    if (count($parts) === 2) {
        $startStr = trim($parts[0]);
        $endStr = trim($parts[1]);

        $year = (int)date('Y');
        if (preg_match('/(20\d{2})/', $endStr, $yMatch)) {
            $year = (int)$yMatch[1];
        }

        $monthMap = [
            'jan' => 1, 'feb' => 2, 'mar' => 3, 'apr' => 4,
            'mei' => 5, 'may' => 5, 'jun' => 6, 'jul' => 7,
            'agu' => 8, 'aug' => 8, 'sep' => 9, 'okt' => 10,
            'oct' => 10, 'nov' => 11, 'des' => 12, 'dec' => 12
        ];

        $startDay = null; $startMonth = null;
        if (preg_match('/(\d{1,2})\s+([a-zA-Z]{3})/i', $startStr, $m)) {
            $startDay = (int)$m[1];
            $monthKey = strtolower(substr($m[2], 0, 3));
            $startMonth = $monthMap[$monthKey] ?? 1;
        }

        $endDay = null; $endMonth = null;
        if (preg_match('/(\d{1,2})\s+([a-zA-Z]{3})/i', $endStr, $m)) {
            $endDay = (int)$m[1];
            $monthKey = strtolower(substr($m[2], 0, 3));
            $endMonth = $monthMap[$monthKey] ?? $startMonth;
        }

        if ($startDay && $endDay && $startMonth && $endMonth) {
            $startDate = new DateTime("$year-$startMonth-$startDay");
            $endDate = new DateTime("$year-$endMonth-$endDay");
            
            if ($endDate >= $startDate) {
                $diff = $startDate->diff($endDate);
                $nights = $diff->days;
                $days = $nights + 1;
                return [
                    'days' => $days,
                    'nights' => $nights,
                    'formatted' => "{$days} Hari • {$nights} Malam"
                ];
            }
        }
    }

    return [
        'days' => 0,
        'nights' => 0,
        'formatted' => 'Durasi Fleksibel'
    ];
}

// 6. Hitung Mundur Hari Perjalanan Mendatang (Countdown)
function calculateDaysUntilTrip(string $day, string $month, int $year = 2026): array {
    date_default_timezone_set('Asia/Jakarta');
    $monthMap = [
        'JAN' => 1, 'FEB' => 2, 'MAR' => 3, 'APR' => 4,
        'MEI' => 5, 'MAY' => 5, 'JUN' => 6, 'JUL' => 7,
        'AGU' => 8, 'AUG' => 8, 'SEP' => 9, 'OKT' => 10,
        'OCT' => 10, 'NOV' => 11, 'DES' => 12, 'DEC' => 12
    ];

    $monthNum = $monthMap[strtoupper(trim($month))] ?? 11;
    $dayNum = (int)trim($day);

    $today = new DateTime('today');
    $tripDate = new DateTime("{$year}-{$monthNum}-{$dayNum}");

    if ($tripDate < $today) {
        $interval = $tripDate->diff($today);
        return [
            'days' => $interval->days,
            'isPast' => true,
            'formatted' => $interval->days . ' hari lalu'
        ];
    } else {
        $interval = $today->diff($tripDate);
        $days = $interval->days;
        return [
            'days' => $days,
            'isPast' => false,
            'formatted' => $days === 0 ? 'Hari Ini' : $days . ' Hari Lagi'
        ];
    }
}

// 7. Normalisasi Waktu Relatif Pesan
function humanizeRelativeTime(string $timeStr): string {
    $time = trim($timeStr);
    if (preg_match('/^(\d+)m\s*lalu$/i', $time, $m)) {
        return $m[1] . ' menit yang lalu';
    }
    if (preg_match('/^(\d+)\s*jam\s*lalu$/i', $time, $m)) {
        return $m[1] . ' jam yang lalu';
    }
    return $time;
}

// 8. Klasifikasi Status & Style Badge Permintaan
function classifyRequestStatus(int $stepIndex, string $statusBadge): array {
    if ($stepIndex >= 4 || stripos($statusBadge, 'konfirmasi') !== false) {
        return [
            'type' => 'success',
            'badgeClass' => 'badge-soft-blue',
            'stepColor' => 'step-bar-active',
            'label' => 'Dikonfirmasi',
            'percent' => 100
        ];
    } elseif ($stepIndex >= 2 || stripos($statusBadge, 'proposal') !== false) {
        return [
            'type' => 'warning',
            'badgeClass' => 'badge-sand',
            'stepColor' => 'step-bar-active',
            'label' => 'Proposal Siap',
            'percent' => 60
        ];
    } else {
        return [
            'type' => 'info',
            'badgeClass' => 'badge-soft-blue',
            'stepColor' => 'step-bar-active',
            'label' => 'Dalam Peninjauan',
            'percent' => 20
        ];
    }
}

// 9. Agregasi Metrik & Statistik Portofolio Dashboard
function calculateDashboardMetrics(array $requests, array $actions, ?array $upcomingTrip): array {
    $totalRequests = count($requests);
    $activeRequests = 0;
    $confirmedRequests = 0;
    $totalBudget = 0;
    $totalProgressPoints = 0;

    foreach ($requests as $req) {
        $stepIndex = (int)($req['currentStepIndex'] ?? 0);
        $totalProgressPoints += $stepIndex;

        if ($stepIndex >= 4) {
            $confirmedRequests++;
        } else {
            $activeRequests++;
        }

        if (isset($req['costEstimate'])) {
            $costVal = parseRupiah($req['costEstimate']);
            $totalBudget += $costVal;
        }
    }

    $avgProgress = $totalRequests > 0 
        ? round(($totalProgressPoints / ($totalRequests * 4)) * 100) 
        : 0;

    $countdown = ['days' => 0, 'formatted' => '-'];
    if (!empty($upcomingTrip['dateDay']) && !empty($upcomingTrip['dateMonth'])) {
        $countdown = calculateDaysUntilTrip($upcomingTrip['dateDay'], $upcomingTrip['dateMonth']);
    }

    return [
        'totalRequests' => $totalRequests,
        'activeRequests' => $activeRequests,
        'confirmedRequests' => $confirmedRequests,
        'totalBudget' => $totalBudget,
        'formattedBudget' => formatRupiah($totalBudget),
        'pendingActionsCount' => count($actions),
        'averageProgress' => $avgProgress,
        'daysCountdown' => $countdown['days'],
        'daysCountdownText' => $countdown['formatted']
    ];
}

// 10. Filter & Urutkan Permintaan (Data Filtering & Sorting via Query)
function filterAndSortRequests(array $requests, array $queryParams): array {
    $filtered = $requests;

    // Filter berdasarkan Keyword Pencarian (q)
    $q = trim($queryParams['q'] ?? '');
    if ($q !== '') {
        $filtered = array_filter($filtered, function ($item) use ($q) {
            $dest = $item['destination'] ?? '';
            $date = $item['dateRange'] ?? '';
            return stripos($dest, $q) !== false || stripos($date, $q) !== false;
        });
    }

    // Filter berdasarkan Kategori Status (filter)
    $filterType = $queryParams['filter'] ?? 'all';
    if ($filterType === 'proposal') {
        $filtered = array_filter($filtered, function ($item) {
            return ($item['currentStepIndex'] ?? 0) === 2 || stripos($item['statusBadge'] ?? '', 'proposal') !== false;
        });
    } elseif ($filterType === 'confirmed') {
        $filtered = array_filter($filtered, function ($item) {
            return ($item['currentStepIndex'] ?? 0) >= 4 || stripos($item['statusBadge'] ?? '', 'konfirmasi') !== false;
        });
    } elseif ($filterType === 'active') {
        $filtered = array_filter($filtered, function ($item) {
            return ($item['currentStepIndex'] ?? 0) < 4;
        });
    }

    // Pengurutan (Sorting)
    $sort = $queryParams['sort'] ?? 'default';
    if ($sort === 'guests') {
        usort($filtered, function ($a, $b) {
            return ($b['guests'] ?? 0) <=> ($a['guests'] ?? 0);
        });
    } elseif ($sort === 'progress') {
        usort($filtered, function ($a, $b) {
            return ($b['currentStepIndex'] ?? 0) <=> ($a['currentStepIndex'] ?? 0);
        });
    }

    return array_values($filtered);
}

// 11. Pipeline Utama Pemrosesan Data (Main Orchestration)
function processDashboardData(array $rawData, array $queryParams = []): array {
    // 1. Ekstraksi dan sanitasi Customer & Business
    $customerName = trim($rawData['customer']['name'] ?? 'Tamu VIP');
    $customerEmail = trim($rawData['customer']['email'] ?? '');
    $businessName = trim($rawData['business']['name'] ?? 'Bespoke Travel');
    $businessLogo = trim($rawData['business']['logo'] ?? 'B');

    // 2. Greeting dan Inisial Avatar
    $greetingInfo = getTimeBasedGreeting();
    $customerInitials = getAvatarInitials($customerName);

    // 3. Raw Data Collections
    $rawRequests = $rawData['requestSaya'] ?? [];
    $rawActions = $rawData['perluTindakan'] ?? [];
    $rawUpcoming = $rawData['perjalananMendatang'] ?? null;
    $rawMessages = $rawData['pesanTerbaru'] ?? [];

    // 4. Hitung Metrik Agregat sebelum difilter (untuk KPI global)
    $metrics = calculateDashboardMetrics($rawRequests, $rawActions, $rawUpcoming);

    // 5. Filter & Sort Requests sesuai query parameter
    $filteredRequests = filterAndSortRequests($rawRequests, $queryParams);

    // 6. Transformasi & Pembubuhan Informasi Tambahan pada Setiap Request
    $processedRequests = array_map(function ($req) {
        $duration = calculateDuration($req['dateRange'] ?? '');
        $statusInfo = classifyRequestStatus((int)($req['currentStepIndex'] ?? 0), $req['statusBadge'] ?? '');
        
        $req['duration'] = $duration;
        $req['statusInfo'] = $statusInfo;
        $req['guestsFormatted'] = ((int)($req['guests'] ?? 1)) . ' peserta';
        
        return $req;
    }, $filteredRequests);

    // 7. Pemrosesan Perjalanan Mendatang
    $processedUpcoming = null;
    if ($rawUpcoming) {
        $countdown = calculateDaysUntilTrip($rawUpcoming['dateDay'] ?? '01', $rawUpcoming['dateMonth'] ?? 'JAN');
        $processedUpcoming = $rawUpcoming;
        $processedUpcoming['countdown'] = $countdown;
        $processedUpcoming['fullFormattedDate'] = ($rawUpcoming['dateDay'] ?? '') . ' ' . ($rawUpcoming['dateMonth'] ?? '') . ' 2026';
    }

    // 8. Pemrosesan Pesan Masuk
    $processedMessages = array_map(function ($msg) {
        $msg['initial'] = getAvatarInitials($msg['sender'] ?? 'Concierge');
        $msg['timeHuman'] = humanizeRelativeTime($msg['time'] ?? '');
        return $msg;
    }, $rawMessages);

    // 9. Pemrosesan Perlu Tindakan
    $processedActions = array_map(function ($act) {
        $act['badgeFormatted'] = strtoupper(trim($act['badge'] ?? 'Perhatian'));
        return $act;
    }, $rawActions);

    return [
        'customer' => [
            'name' => $customerName,
            'email' => $customerEmail,
            'initials' => $customerInitials
        ],
        'business' => [
            'name' => $businessName,
            'logo' => $businessLogo
        ],
        'greeting' => $greetingInfo,
        'metrics' => $metrics,
        'perluTindakan' => $processedActions,
        'requestSaya' => $processedRequests,
        'allRequestsCount' => count($rawRequests),
        'perjalananMendatang' => $processedUpcoming,
        'pesanTerbaru' => $processedMessages,
        'filterState' => [
            'q' => trim($queryParams['q'] ?? ''),
            'filter' => $queryParams['filter'] ?? 'all',
            'sort' => $queryParams['sort'] ?? 'default',
            'totalResults' => count($processedRequests)
        ]
    ];
}

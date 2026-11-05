<?php
/**
 * Pertemuan 7 - Web Programming
 * ENTRY POINT / ROUTER (index.php)
 * 
 * Bertindak sebagai Front Controller yang menerima seluruh HTTP request,
 * menginisialisasi controller terkait, dan mengeksekusi action method.
 * 
 * Alur Kerja MVC:
 * [Browser Request] -> index.php -> DashboardController@index -> TravelModel -> views/dashboard-view.php
 * 
 * Mahasiswa: Zaidaan Diandra Eka Putra (202410370110420)
 * Proyek: VIP Bespoke Travel
 */

// Muat controller utama
require_once __DIR__ . '/controllers/DashboardController.php';

// Inisialisasi controller
$controller = new DashboardController();

// Eksekusi method index untuk memproses data dan merender view
$controller->index();


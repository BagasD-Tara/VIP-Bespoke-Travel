<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds for VIP Bespoke Travel.
     */
    public function run(): void
    {
        $programs = [
            [
                'nama' => 'Alpine Swiss Sanctuary & Winter Heli-Chalet',
                'deskripsi' => 'Ekspedisi privat chalet mewah Zermatt & St. Moritz dengan transfer helikopter pribadi, instruktur ski eksklusif, dan koki bintang Michelin.'
            ],
            [
                'nama' => 'Amalfi Coast & Capri Yacht Charter',
                'deskripsi' => 'Pelayaran superyacht privat melintasi pesisir Positano dan pulau Capri dengan reservasi VIP beach club dan sommelier anggur privat.'
            ],
            [
                'nama' => 'Kyoto Ryokan & Zen Heritage Retreat',
                'deskripsi' => 'Akses eksklusif ke kuil suci tertutup di Kyoto, upacara minum teh bersama Master Zen, serta akomodasi sukiya-zukuri bersejarah.'
            ],
            [
                'nama' => 'Monaco Grand Prix Superyacht Paddock',
                'deskripsi' => 'Akses premier berth Port Hercule di Monaco, gala dinner privat bersama tim balap, dan helipad transfer langsung dari Bandara Nice.'
            ],
            [
                'nama' => 'Serengeti Migration & Private Sky Safari',
                'deskripsi' => 'Eksplorasi savana Serengeti dengan perkemahan tenda mewah berpindah, penerbangan balon udara privat saat matahari terbit, dan pengawalan ranger elit.'
            ]
        ];

        foreach ($programs as $item) {
            Program::firstOrCreate(
                ['nama' => $item['nama']],
                ['deskripsi' => $item['deskripsi']]
            );
        }
    }
}

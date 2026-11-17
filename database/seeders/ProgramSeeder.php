<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'nama' => 'Pendidikan',
                'deskripsi' => 'Meningkatkan akses pendidikan, mutu pengajaran, serta penyediaan beasiswa berprestasi di seluruh pelosok.'
            ],
            [
                'nama' => 'Kesehatan',
                'deskripsi' => 'Meningkatkan layanan fasilitas kesehatan primer, pencegahan stunting, dan jaminan medis merata bagi masyarakat.'
            ],
            [
                'nama' => 'Lingkungan',
                'deskripsi' => 'Menjaga kelestarian lingkungan hidup, rehabilitasi hutan, dan percepatan transisi energi hijau berkelanjutan.'
            ],
            [
                'nama' => 'Infrastruktur',
                'deskripsi' => 'Membangun infrastruktur konektivitas digital, jalan antar daerah, dan sistem logistik terpadu.'
            ],
        ];

        foreach ($programs as $item) {
            Program::firstOrCreate(
                ['nama' => $item['nama']],
                ['deskripsi' => $item['deskripsi']]
            );
        }
    }
}

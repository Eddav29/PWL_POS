<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'KTG01',
                'kategori_nama' => 'Elektronik',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'KTG02',
                'kategori_nama' => 'Kecantikan',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'PTG03',
                'kategori_nama' => 'Peralatan Rumah Tangga',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'KTG04',
                'kategori_nama' => 'Laptop',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'KTG05',
                'kategori_nama' => 'Handphone',
            ],
        ];

        DB::table('m_kategoris')->insert($data);
    }
}
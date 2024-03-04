<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    
    public function run(): void
    {
        // Data yang akan di-seed
        $data = [
            [
                'level_kode' => 'ADM',
                'level_nama' => 'Administrator',
            ],
            [
                'level_kode' => 'MNG',
                'level_nama' => 'Manager',
            ],
            [
                'level_kode' => 'STF',
                'level_nama' => 'Staff/Kasir',
            ],
        ];

        // Insert data ke dalam tabel m_levels
        DB::table('m_levels')->insert($data);
    }
}

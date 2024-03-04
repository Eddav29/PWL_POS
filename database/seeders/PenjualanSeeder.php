<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => '1',
                'user_id' => '3',
                'pembeli' => 'Agus',
                'penjualan_kode' => 'PJL2023001',
                'penjualan_tanggal' => '2023-02-01',
            ],
            [
                'penjualan_id' => '2',
                'user_id' => '3',
                'pembeli' => 'Gaco',
                'penjualan_kode' => 'PJL2023002',
                'penjualan_tanggal' => '2023-02-02',
            ],
            [
                'penjualan_id' => '3',
                'user_id' => '3',
                'pembeli' => 'Boni',
                'penjualan_kode' => 'PJL2023003',
                'penjualan_tanggal' => '2023-02-03',
            ],
            [
                'penjualan_id' => '4',
                'user_id' => '3',
                'pembeli' => 'Farel',
                'penjualan_kode' => 'PJL2023004',
                'penjualan_tanggal' => '2023-02-04',
            ],
            [
                'penjualan_id' => '5',
                'user_id' => '3',
                'pembeli' => 'Syahrul',
                'penjualan_kode' => 'PJL2023005',
                'penjualan_tanggal' => '2023-02-05',
            ],
            [
                'penjualan_id' => '6',
                'user_id' => '3',
                'pembeli' => 'Asep',
                'penjualan_kode' => 'PJL2023006',
                'penjualan_tanggal' => '2023-02-06',
            ],
            [
                'penjualan_id' => '7',
                'user_id' => '3',
                'pembeli' => 'GUa',
                'penjualan_kode' => 'PJL2023007',
                'penjualan_tanggal' => '2023-02-07',
            ],
            [
                'penjualan_id' => '8',
                'user_id' => '3',
                'pembeli' => 'Pamungkas',
                'penjualan_kode' => 'PJL2023008',
                'penjualan_tanggal' => '2023-02-08',
            ],
            [
                'penjualan_id' => '9',
                'user_id' => '3',
                'pembeli' => 'Biba',
                'penjualan_kode' => 'PJL2023009',
                'penjualan_tanggal' => '2023-02-09',
            ],
            [
                'penjualan_id' => '10',
                'user_id' => '3',
                'pembeli' => 'Putri',
                'penjualan_kode' => 'PJL2023010',
                'penjualan_tanggal' => '2023-02-10',
            ],
        ];

        DB::table('t_penjualans')->insert($data);
    }
}
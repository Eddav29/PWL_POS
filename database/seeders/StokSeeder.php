<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => '1',
                'barang_id' => '1',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-15', // Updated date
                'stok_jumlah' => 60, // Updated stock quantity
            ],
            [
                'stok_id' => '2',
                'barang_id' => '2',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-16', // Updated date
                'stok_jumlah' => 85, // Updated stock quantity
            ],
            [
                'stok_id' => '3',
                'barang_id' => '3',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-17', // Updated date
                'stok_jumlah' => 40, // Updated stock quantity
            ],
            [
                'stok_id' => '4',
                'barang_id' => '4',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-18', // Updated date
                'stok_jumlah' => 100, // Updated stock quantity
            ],
            [
                'stok_id' => '5',
                'barang_id' => '5',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-19', // Updated date
                'stok_jumlah' => 75, // Updated stock quantity
            ],
            [
                'stok_id' => '6',
                'barang_id' => '6',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-20', // Updated date
                'stok_jumlah' => 50, // Updated stock quantity
            ],
            [
                'stok_id' => '7',
                'barang_id' => '7',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-21', // Updated date
                'stok_jumlah' => 65, // Updated stock quantity
            ],
            [
                'stok_id' => '8',
                'barang_id' => '8',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-22', // Updated date
                'stok_jumlah' => 90, // Updated stock quantity
            ],
            [
                'stok_id' => '9',
                'barang_id' => '9',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-23', // Updated date
                'stok_jumlah' => 70, // Updated stock quantity
            ],
            [
                'stok_id' => '10',
                'barang_id' => '10',
                'user_id' => '3',
                'stok_tanggal' => '2022-02-24', // Updated date
                'stok_jumlah' => 45, // Updated stock quantity
            ],
        ];
        DB::table('m_stoks')->insert($data);
    }
}

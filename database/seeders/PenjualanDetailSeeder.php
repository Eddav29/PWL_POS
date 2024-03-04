<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['detail_id' => 1, 'penjualan_id' => 1, 'barang_id' => 1, 'harga' => 999999, 'jumlah' => 1],
            ['detail_id' => 2, 'penjualan_id' => 2, 'barang_id' => 2, 'harga' => 4999999, 'jumlah' => 1],
            ['detail_id' => 3, 'penjualan_id' => 2, 'barang_id' => 3, 'harga' => 5000, 'jumlah' => 2],
            ['detail_id' => 4, 'penjualan_id' => 3, 'barang_id' => 4, 'harga' => 4000, 'jumlah' => 5],
            ['detail_id' => 5, 'penjualan_id' => 3, 'barang_id' => 5, 'harga' => 500000, 'jumlah' => 4],
            ['detail_id' => 6, 'penjualan_id' => 3, 'barang_id' => 6, 'harga' => 250000, 'jumlah' => 1],
            ['detail_id' => 7, 'penjualan_id' => 4, 'barang_id' => 7, 'harga' => 29000, 'jumlah' => 6],
            ['detail_id' => 8, 'penjualan_id' => 4, 'barang_id' => 8, 'harga' => 12000, 'jumlah' => 7],
            ['detail_id' => 9, 'penjualan_id' => 5, 'barang_id' => 9, 'harga' => 2500, 'jumlah' => 31],
            ['detail_id' => 10, 'penjualan_id' => 5, 'barang_id' => 10, 'harga' => 24000, 'jumlah' => 1],
            ['detail_id' => 11, 'penjualan_id' => 6, 'barang_id' => 9, 'harga' => 2500, 'jumlah' => 4],
            ['detail_id' => 12, 'penjualan_id' => 7, 'barang_id' => 10, 'harga' => 24000, 'jumlah' => 2],
            ['detail_id' => 13, 'penjualan_id' => 7, 'barang_id' => 1, 'harga' => 10000000, 'jumlah' => 11],
            ['detail_id' => 14, 'penjualan_id' => 7, 'barang_id' => 2, 'harga' => 500000, 'jumlah' => 22],
            ['detail_id' => 15, 'penjualan_id' => 8, 'barang_id' => 3, 'harga' => 2000, 'jumlah' => 12],
            ['detail_id' => 16, 'penjualan_id' => 8, 'barang_id' => 4, 'harga' => 4000, 'jumlah' => 151],
            ['detail_id' => 17, 'penjualan_id' => 9, 'barang_id' => 5, 'harga' => 500000, 'jumlah' => 3],
            ['detail_id' => 18, 'penjualan_id' => 9, 'barang_id' => 6, 'harga' => 250000, 'jumlah' => 12],
            ['detail_id' => 19, 'penjualan_id' => 10, 'barang_id' => 7, 'harga' => 29000, 'jumlah' => 221],
            ['detail_id' => 20, 'penjualan_id' => 10, 'barang_id' => 8, 'harga' => 12000, 'jumlah' => 2],
            ['detail_id' => 21, 'penjualan_id' => 1, 'barang_id' => 9, 'harga' => 2500, 'jumlah' => 92],
            ['detail_id' => 22, 'penjualan_id' => 2, 'barang_id' => 10, 'harga' => 24000, 'jumlah' => 13],
            ['detail_id' => 23, 'penjualan_id' => 1, 'barang_id' => 1, 'harga' => 10000000, 'jumlah' => 451],
            ['detail_id' => 24, 'penjualan_id' => 4, 'barang_id' => 2, 'harga' => 500000, 'jumlah' => 42],
            ['detail_id' => 25, 'penjualan_id' => 5, 'barang_id' => 3, 'harga' => 2000, 'jumlah' => 25],
            ['detail_id' => 26, 'penjualan_id' => 6, 'barang_id' => 4, 'harga' => 4000, 'jumlah' => 83],
            ['detail_id' => 27, 'penjualan_id' => 7, 'barang_id' => 5, 'harga' => 500000, 'jumlah' => 91],
            ['detail_id' => 28, 'penjualan_id' => 8, 'barang_id' => 6, 'harga' => 250000, 'jumlah' => 33],
            ['detail_id' => 29, 'penjualan_id' => 9, 'barang_id' => 7, 'harga' => 29000, 'jumlah' => 32],
            ['detail_id' => 30, 'penjualan_id' => 10, 'barang_id' => 8, 'harga' => 12000, 'jumlah' => 54]
        ];
        DB::table('t_penjualan_details')->insert($data);
    }
}
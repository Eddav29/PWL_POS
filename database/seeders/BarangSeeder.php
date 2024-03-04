<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 3,
                'barang_kode' => 'PAN001',
                'barang_nama' => 'Panci',
                'harga_beli' => 50000,
                'harga_jual' => 100000
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 3,
                'barang_kode' => 'SPA001',
                'barang_nama' => 'Spatula',
                'harga_beli' => 90000,
                'harga_jual' => 120000
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 1,
                'barang_kode' => 'KUL001',
                'barang_nama' => 'Kulkas',
                'harga_beli' => 900000,
                'harga_jual' => 1000000
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 4,
                'barang_kode' => 'ASU001',
                'barang_nama' => 'Asuwus',
                'harga_beli' => 50000000,
                'harga_jual' => 60000000
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 5,
                'barang_kode' => 'OPP001',
                'barang_nama' => 'Oppo Ae',
                'harga_beli' => 5000000,
                'harga_jual' => 10000000
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => 'BED001',
                'barang_nama' => 'KASUR',
                'harga_beli' => 50000,
                'harga_jual' => 65000
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 3,
                'barang_kode' => 'OVN001',
                'barang_nama' => 'Microwaves',
                'harga_beli' => 5000000,
                'harga_jual' => 4500000
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'HPA001',
                'barang_nama' => 'HPSUSA',
                'harga_beli' => 5000000,
                'harga_jual' => 5500000
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 4,
                'barang_kode' => 'MSI001',
                'barang_nama' => 'NSI BRAVO',
                'harga_beli' => 10000000,
                'harga_jual' => 12500000
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 3,
                'barang_kode' => 'KMPR01',
                'barang_nama' => 'Kompor Elektrik',
                'harga_beli' => 50000,
                'harga_jual' => 100000
            ],
        ];
        DB::table('m_barangs')->insert($data);
    }
}
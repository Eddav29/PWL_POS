<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KategoriSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StokSeeder::class);
        $this->call(PenjualanSeeder::class);
        
        $this->call(PenjualanDetailSeeder::class);
    }
}

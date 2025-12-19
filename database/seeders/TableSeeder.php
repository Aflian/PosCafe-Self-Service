<?php
namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Table::create([
                'kode_meja' => 'Meja ' . $i,
                'status' => 'kosong',
            ]);
        }
    }
}

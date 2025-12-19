<?php
namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $makanan = Category::where('nama_kategori', 'Makanan')->first();
        $minuman = Category::where('nama_kategori', 'Minuman')->first();

        Menu::create([
            'category_id' => $makanan->id,
            'nama_menu' => 'Nasi Goreng',
            'harga' => 20000,
            'is_active' => true,
        ]);

        Menu::create([
            'category_id' => $makanan->id,
            'nama_menu' => 'Mie Goreng',
            'harga' => 18000,
            'is_active' => true,
        ]);

        Menu::create([
            'category_id' => $minuman->id,
            'nama_menu' => 'Es Teh',
            'harga' => 5000,
            'is_active' => true,
        ]);

        Menu::create([
            'category_id' => $minuman->id,
            'nama_menu' => 'Kopi Hitam',
            'harga' => 8000,
            'is_active' => true,
        ]);
    }
}

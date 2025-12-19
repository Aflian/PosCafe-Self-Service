<?php
namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Cash', 'QRIS', 'Transfer'] as $method) {
            PaymentMethod::create([
                'nama_metode' => $method,
                'is_active' => true,
            ]);
        }
    }
}

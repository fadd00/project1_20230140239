<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari user admin (pooki) atau user pertama, untuk dijadikan owner product
        $user = User::where('role', 'admin')->first() ?? User::first();

        $userId = $user ? $user->id : 1;

        $products = [
            ['name' => 'Laptop ROG', 'qty' => 10, 'price' => 20000000],
            ['name' => 'Monitor Samsung', 'qty' => 25, 'price' => 3500000],
            ['name' => 'Keyboard Mechanical', 'qty' => 50, 'price' => 850000],
            ['name' => 'Mouse Gaming', 'qty' => 45, 'price' => 450000],
            ['name' => 'Headset bluetooth', 'qty' => 30, 'price' => 600000],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'qty' => $product['qty'],
                'price' => $product['price'],
                'user_id' => $userId,
            ]);
        }
    }
}

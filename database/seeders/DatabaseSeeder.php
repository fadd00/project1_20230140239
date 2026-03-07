<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        Product::factory(10)->create([
            'user_id' => fn () => $users->random()->id,
        ]);

        $products = Product::query()->get();

        Category::factory(10)->create([
            'product_id' => fn () => $products->random()->id,
        ]);

    }
}

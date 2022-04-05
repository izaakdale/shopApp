<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory()->create();
        Product::factory()->tofu()->create();
        Product::factory()->chickPeas()->create();
        Product::factory()->blackBeans()->create();
        Product::factory()->vega()->create();
    }
}

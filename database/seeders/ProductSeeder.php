<?php

namespace Database\Seeders;

use App\Models\NutritionInfo;
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
        $product = Product::factory()->tofu()->create();
        NutritionInfo::factory()->create(['product_id' => $product->id]);
        $product = Product::factory()->chickPeas()->create();
        NutritionInfo::factory()->create(['product_id' => $product->id]);
        $product = Product::factory()->blackBeans()->create();
        NutritionInfo::factory()->create(['product_id' => $product->id]);
        $product = Product::factory()->vega()->create();
        NutritionInfo::factory()->create(['product_id' => $product->id]);
    }
}

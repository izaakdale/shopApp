<?php

namespace Database\Seeders;

use App\Models\NutritionInfo;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function createNutritionInfo($product){
        NutritionInfo::factory()->create(['product_id' => $product->id]);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::factory()->tofu()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->chickPeas()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->blackBeans()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->vega()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->tempeh()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->soyMilk()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->oatMilk()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->beyondSausage()->create();
        $this->createNutritionInfo($product);

        $product = Product::factory()->beyondBurger()->create();
        $this->createNutritionInfo($product);

    }

}

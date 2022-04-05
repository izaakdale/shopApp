<?php

namespace Database\Factories;

use App\Models\NutritionInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        $nutritionInfo = NutritionInfo::factory()->create();
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => random_int(1, 5) + 0.99,
            'nutrition_info_id' => $nutritionInfo->id
        ];
    }

    public function tofu()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Tofu',
                'description' => $this->faker->paragraph(),
                'price' => 2.99,
                'image_url' => 'images/products/tofu.png',
            ];
        });
    }
    public function chickPeas()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Chick Peas',
                'description' => $this->faker->paragraph(),
                'price' => 6.99,
                'image_url' => 'images/products/chickpeas.png',
            ];
        });
    }
    public function vega()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Vega Protein Powder',
                'description' => $this->faker->paragraph(),
                'price' => 39.99,
                'image_url' => 'images/products/vegapowder.png',
            ];
        });
    }
    public function blackBeans()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Black Beans',
                'description' => $this->faker->paragraph(),
                'price' => 5.99,
                'image_url' => 'images/products/blackbeans.png',
            ];
        });
    }
}

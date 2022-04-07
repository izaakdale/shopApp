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
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => random_int(1, 5) + 0.99,
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
    public function soyMilk()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Soy Milk',
                'description' => $this->faker->paragraph(),
                'price' => 2.99,
                'image_url' => 'images/products/soyMilk.png',
            ];
        });
    }
    public function oatMilk()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Oat Milk',
                'description' => $this->faker->paragraph(),
                'price' => 4.99,
                'image_url' => 'images/products/oatMilk.png',
            ];
        });
    }
    public function beyondBurger()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Beyond Burger',
                'description' => $this->faker->paragraph(),
                'price' => 17.99,
                'image_url' => 'images/products/beyondBurger.png',
            ];
        });
    }
    public function beyondSausage()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Beyond Sausage',
                'description' => $this->faker->paragraph(),
                'price' => 9.99,
                'image_url' => 'images/products/beyondSausage.png',
            ];
        });
    }
    public function tempeh()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Tempeh',
                'description' => $this->faker->paragraph(),
                'price' => 6.99,
                'image_url' => 'images/products/tempeh.png',
            ];
        });
    }
    public function justEgg()
    {
        return $this->state(function (array $attributes)
        {
            return [
                'name' => 'Just Egg',
                'description' => $this->faker->paragraph(),
                'price' => 7.49,
                'image_url' => 'images/products/justEgg.png',
            ];
        });
    }
}

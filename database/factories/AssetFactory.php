<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asset;

class AssetFactory extends Factory
{
    protected $model = Asset::class;

    public function definition()
    {
        return [
            'asset_name' => $this->faker->word,
            'manufacturer' => $this->faker->company,
            'model' => $this->faker->word,
            'serial_number' => $this->faker->unique()->ean13,
            'purchase_date' => $this->faker->date,
            'warranty_expiry' => $this->faker->date,
            'cost' => $this->faker->randomFloat(2, 100, 5000),
            'condition' => $this->faker->randomElement(['new', 'good', 'fair', 'poor']),
            'status' => $this->faker->randomElement(['active', 'in_use', 'maintenance', 'retired']),
            'location' => $this->faker->word,
            'description' => $this->faker->sentence,
            'with_whom' => $this->faker->name,
            'department_id' => 1, // Or use Department::factory(),
            'category_id' => 1, // Or use Category::factory(),
        ];
    }
}
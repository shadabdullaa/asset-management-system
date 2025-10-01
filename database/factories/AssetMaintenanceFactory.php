<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AssetMaintenance;

class AssetMaintenanceFactory extends Factory
{
    protected $model = AssetMaintenance::class;

    public function definition()
    {
        return [
            'maintenance_date' => $this->faker->date,
            'description' => $this->faker->sentence,
            'performed_by' => $this->faker->name,
            'next_due' => $this->faker->date,
        ];
    }
}

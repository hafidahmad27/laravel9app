<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'NamaSales' => $this->faker->name(),
            'Aktif' => 1,
            'Tanggal_Lahir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'Paraf' => 'images/1717177069.png'
        ];
    }
}

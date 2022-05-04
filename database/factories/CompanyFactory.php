<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $shortName = $this->faker->company();
        return [
            'edrpou' => $this->faker->unique()->ean8(),
            'full_name' => $this->faker->randomElement(['TOV', 'PF', 'PC', 'AO', 'ZAO', 'FOP']) . ' ' .
                $shortName . ' ' . $this->faker->companySuffix(),
            'short_name' => $shortName,
        ];
    }
}

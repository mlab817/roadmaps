<?php

namespace Database\Factories;

use App\Models\ReportPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportPeriodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReportPeriod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}

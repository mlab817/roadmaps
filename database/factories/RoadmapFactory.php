<?php

namespace Database\Factories;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\Roadmap;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadmapFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Roadmap::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'office_id'     => Office::factory()->create(),
            'commodity_id'  => Commodity::factory()->create(),
            'start_date'    => $this->faker->date(),
        ];
    }
}

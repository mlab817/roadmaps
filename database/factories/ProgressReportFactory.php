<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\ProgressReport;
use App\Models\ReportPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProgressReport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'office_id'         => Office::factory()->create(),
            'report_period_id'  => ReportPeriod::factory()->create(),
            'attachment_path'   => $this->faker->url,
            'attachment_url'    => $this->faker->url,
            'remarks'           => $this->faker->sentence,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;


class JobVacancyFactory extends Factory
{

    protected $model = JobVacancy::class;

    public function definition()
    {
        return [
            'type' => $this->faker->word,
            'status' => $this->faker->boolean(),
        ];
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActionDomainFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug(2),
            'title_fr' => $this->faker->words(3, true),
            'title_en' => $this->faker->words(3, true),
            'summary_fr' => $this->faker->sentence(),
            'summary_en' => $this->faker->sentence(),
            'order' => 0,
            'is_published' => true,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'hostname' => $this->faker->domainName(),
            'ip' => $this->faker->ipv4(),
            'name' => $this->faker->name(),
            'running' => $this->faker->numberBetween(0, 1),
            'availability' => 1,
        ];
    }
}

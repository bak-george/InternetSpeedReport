<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = Carbon::now()->subDays(rand(0, 30));

        return [
            'name' => $this->faker->sentence(3),
            'created_at' => $createdAt,
            'updated_at' => $createdAt->copy()->addMinutes(rand(1, 1440)), // Ensure updated_at is not null
            'download' => $this->faker->randomFloat(6, 1, 200),
            'upload' => $this->faker->randomFloat(6, 1, 50),
            'ping' => $this->faker->randomFloat(3, 1, 100),
            'server_url' => $this->faker->url(),
            'server_lat' => $this->faker->latitude(),
            'server_lon' => $this->faker->longitude(),
            'server_name' => $this->faker->city(),
            'server_country' => $this->faker->country(),
            'server_id' => (string) $this->faker->randomNumber(5, true),
            'server_latency' => (string) $this->faker->randomFloat(3, 1, 100),
            'timestamp' => $createdAt->copy()->subSeconds(rand(0, 86400)), // Ensure timestamp is not null
            'bytes_sent' => $this->faker->numberBetween(1000000, 50000000),
            'bytes_received' => $this->faker->numberBetween(10000000, 500000000),
            'client_ip' => $this->faker->ipv4(),
            'client_lat' => $this->faker->latitude(),
            'client_lon' => $this->faker->longitude(),
            'client_isp' => $this->faker->company(),
            'client_country' => $this->faker->country(),
        ];
    }
}

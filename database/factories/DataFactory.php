<?php

namespace Database\Factories;

use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

use function PHPUnit\Framework\isEmpty;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    private array $places = [
        [
            'lat' => '40.6264',
            'lon' => '22.9483',
        ],

        [
            'lat' => '47.4103',
            'lon' => '8.5448',
        ],

        [
            'lat' => '40.5885',
            'lon' => '23.0279',
        ],

        [
            'lat' => '40.5197',
            'lon' => '22.9709',
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = Carbon::now()->subDays(rand(0, 30));

        [$serverLatitude, $serverLongitude] = $this->getCoordinates();
        [$clientLatitude, $clientLongitude] = $this->getCoordinates();

        return [
            'name' => $this->generateUniqueName(),
            'created_at' => $createdAt,
            'updated_at' => $createdAt->copy()->addMinutes(rand(1, 1440)),
            'download' => $this->faker->randomFloat(null, 100, 200),
            'upload' => $this->faker->randomFloat(null, 8, 60),
            'ping' => $this->faker->randomFloat(null, 8, 40),
            'server_url' => $this->faker->url(),
            'server_lat' => $serverLatitude,
            'server_lon' => $serverLongitude,
            'server_name' => $this->faker->city(),
            'server_country' => $this->faker->country(),
            'server_id' => $this->faker->randomNumber(5, true),
            'server_latency' => $this->faker->randomFloat(3, 1, 100),
            'timestamp' => $createdAt->copy()->subSeconds(rand(0, 86400)),
            'bytes_sent' => $this->faker->numberBetween(1000000, 50000000),
            'bytes_received' => $this->faker->numberBetween(10000000, 500000000),
            'client_ip' => $this->faker->ipv4(),
            'client_lat' => $clientLatitude,
            'client_lon' => $clientLongitude,
            'client_isp' => $this->faker->company(),
            'client_country' => $this->faker->country(),
        ];
    }

    private function getCoordinates()
    {
        $randomIndex = rand(0, count($this->places) - 1);

        $latitude = $this->places[$randomIndex]['lat'];
        $longitude = $this->places[$randomIndex]['lon'];

        return [$latitude, $longitude];
    }

    private function generateUniqueName()
    {
        do {
            $name = 'Dummy data ' . $this->faker->biasedNumberBetween();

            $data = Data::where('name', $name)->get();
        } while (isEmpty($data));

        return $name;
    }
}

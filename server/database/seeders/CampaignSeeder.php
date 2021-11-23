<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            Campaign::create([
                "name" => $faker->company(),
                "from" => $faker->dateTimeBetween("-2 years", "now"),
                "to" => $faker->dateTimeBetween('now', '+2 years'),
                "daily_budget" => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 300),
                "total_budget" => $faker->randomFloat($nbMaxDecimals = 2, $min = 300, $max = 500),
                "status" => $faker->boolean($chanceOfGettingTrue = 50),
                "uploads" => json_encode([
                    $faker->image('public/storage/uploads', 640, 480, null, false),
                    $faker->image('public/storage/uploads', 640, 480, null, false),
                    $faker->image('public/storage/uploads', 640, 480, null, false),
                    $faker->image('public/storage/uploads', 640, 480, null, false),
                ])
            ]);
        }
    }
}

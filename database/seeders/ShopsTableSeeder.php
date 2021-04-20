<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 4; $i++){
            Shop::create([
                'name' => $faker->sentence,
                'capacity' => $faker->randomDigit(2),
            ]);
        }
    }
}

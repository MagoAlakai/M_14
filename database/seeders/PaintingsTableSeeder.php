<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Painting;

class PaintingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
            Painting::create([
                'name' => $faker->sentence,
                'price' => $faker->randomDigit(2),
                'arrival_date' => $faker->date(),
                'author_name' => $faker->sentence,
                'tienda_id' => $faker->randomElement([1, 2, 3, 4])
            ]);
        }

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        Event::create([
            'user_id' => 1,
            'name' => $faker->name,
            'category' => $faker->randomElement(['performance', 'lecture']),
            'place' => $faker->address,
            'day' => $faker->randomElement([1,2]),
            'from_time' => $faker->time,
            'to_time' => $faker->time,
            'outline' => $faker->numerify('Descriptioon ###'),
            'detail' => $faker->numerify('Detail ###'),
        ]);
    }
}

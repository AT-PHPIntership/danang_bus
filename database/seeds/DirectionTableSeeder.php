<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Directions;

class DirectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $route_ids = factory(App\Models\Route::class, 10)->create()->pluck('id');
        $stop_ids = factory(App\Models\Stop::class, 30)->create()->pluck('id');
        for ($i = 1; $i <= 30; $i++) {
            factory(App\Models\Directions::class)->create([
                'route_id' => $faker->randomElement($route_ids->toArray()),
                'stop_id' => $faker->randomElement($stop_ids->toArray())
            ]);
        }
    }
}

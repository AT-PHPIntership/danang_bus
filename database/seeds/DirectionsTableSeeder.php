<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $i = 10;
        for ($j = 0; $j <= $i; $j++){
        	DB::table ('directions')->insert([
        		'order' => $faker->biasedNumberBetween($min = 1, $max = 10),
        		'fee' => $faker->numberBetween($min = 5000, $max = 40000),
        		'status' => $faker->biasedNumberBetween($min = 0, $max = 1),
        		'time' => $faker->time($format = 'H:i:s'),
        		'route_id' =>$faker->biasedNumberBetween($min = 1, $max = 10),
        		'stop_id' =>$faker->biasedNumberBetween($min = 1, $max = 10),
        		'created_at'=> new DateTime(),
        		'updated_at'=> new DateTime(),
        	]);
        }
    }
}

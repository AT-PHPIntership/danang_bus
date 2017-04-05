<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoutesTableSeeder extends Seeder
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
        for ($j = 0; $j < $i; $j++){
        	DB::table ('routes')->insert([
        		'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        		'type' => $faker->biasedNumberBetween($min = 1, $max = 2),
        		'distance'   => $faker->biasedNumberBetween($min = 10, $max = 50),
        		'frequency'   => $faker->biasedNumberBetween($min = 5, $max = 8),
        		'frequency_peak'   => $faker->biasedNumberBetween($min = 7, $max = 10),
        		'start_time'   => $faker->time($format = 'H:i:s'),
        		'end_time'=> $faker->time($format = 'H:i:s'),
        		'created_at'=> new DateTime(),
        		'updated_at'=> new DateTime(),
        	]);
        }
    }
}

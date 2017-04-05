<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StopsTableSeeder extends Seeder
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
        	DB::table ('stops')->insert([
        		'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        		'lat' => $faker->latitude($min = 0, $max = 180) ,
        		'lng'   => $faker->longitude($min = 0, $max = 180),
        		'address'   => $faker->streetName,
        		'created_at'=> new DateTime(),
        		'updated_at'=> new DateTime(),
        	]);
        }
    }
}

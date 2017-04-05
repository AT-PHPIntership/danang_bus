<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FeedBacksTableSeeder extends Seeder
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
        	DB::table ('feedbacks')->insert([
        		'email' => $faker->email,
        		'content' => $faker->sentence($nbWords = 13, $variableNbWords = true),
        		'reply'   => $faker->sentence($nbWords = 15, $variableNbWords = true),
        		'created_at'=> new DateTime(),
        		'updated_at'=> new DateTime(),
        	]);
        }
    }
}

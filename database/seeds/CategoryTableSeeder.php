<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
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
        	DB::table ('categories')->insert([
        		'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        		'created_at'=> new DateTime(),
        		'updated_at'=> new DateTime(),
        	]);
        }
    }
}

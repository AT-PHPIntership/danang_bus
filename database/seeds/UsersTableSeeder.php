<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
        	DB::table ('users')->insert([
        		'username' => $faker->firstName,
        		'email' => $faker->email,
        		'password' => $faker->password,
        		'fullname' =>$faker->name,
        		'created_at'=> new DateTime(),
        		'updated_at'=> new DateTime(),
        	]);
        }
    }
}

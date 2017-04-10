<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use App\User;
use App\Models\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$faker = Faker::create();
    	$category_ids = factory(App\Models\Category::class, 10)->create()->pluck('id');
    	$user_ids = factory(App\User::class, 10)->create()->pluck('id');
    	for ($i = 1; $i <= 30; $i++) {
    		factory(App\Models\News::class)->create([
	        	'user_id' => $faker->randomElement($user_ids->toArray()),
	        	'category_id' => $faker->randomElement($category_ids->toArray())
        	]);
    	}
    }
}

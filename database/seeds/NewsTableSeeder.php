<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Category;
use App\User;
class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::all()->pluck('id');
        $user = User::all()->pluck('id');
        $faker = Faker::create();
        $i = 10;
        for ($j = 0; $j <= $i; $j++){
        	DB::table ('news')->insert([
        		'title' => $faker->text($maxNbChars = 200),
        		'content' => $faker->paragraph($nbSentences = 12, $variableNbSentences = true),
        		'picture_path' => $faker->imageUrl($width = 340, $height = 250),
        		'category_id' =>$faker->randomElement($category->toArray()), 
        		'user_id' =>$faker->randomElement($user->toArray()),
        		'created_at'=> new DateTime(),
        		'updated_at'=> new DateTime(),

        	]);
        }
    }
}

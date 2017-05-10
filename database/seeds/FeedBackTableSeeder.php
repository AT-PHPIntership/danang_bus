<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Feedback;

class FeedBackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\FeedBack::class, 10)->create();
    }
}

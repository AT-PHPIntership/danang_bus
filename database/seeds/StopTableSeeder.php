<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Stop;

class StopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Stop::class, 50)->create();
    }
}

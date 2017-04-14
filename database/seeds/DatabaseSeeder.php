<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RouteTableSeeder::class);
        $this->call(FeedBackTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(StopTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(DirectionTableSeeder::class);
    }
}

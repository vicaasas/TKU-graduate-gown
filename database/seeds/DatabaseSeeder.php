<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClothSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(TimeSeeder::class);
        $this->call(UserSeeder::class);
    }
}

<?php

use App\Models\App\UserStructure;
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
        $this->call(UsersTableSeeder::class);
        $this->call(StructuresTableSeeder::class);
        $this->call(UserStructureTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
    }
}

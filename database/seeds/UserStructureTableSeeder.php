<?php

use App\Models\App\Structure;
use App\Models\App\UserStructure;
use App\User;
use Illuminate\Database\Seeder;

class UserStructureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function (User $user) {
            $user->userStructure->structure()->associate(Structure::all()->random());
            $user->userStructure->save();
            $user->save();
        });
    }
}

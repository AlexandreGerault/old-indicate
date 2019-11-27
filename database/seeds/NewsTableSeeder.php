<?php

use App\Models\App\News;
use App\User;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::each(function (User $user) {
            if($user->userStructure->structure_id !== null) {
                $user->news()
                    ->saveMany(
                        factory(News::class, random_int(1, 12))
                            ->create([
                                'author_id' => $user->id,
                                'structure_id' => $user->userStructure->structure->id
                            ])
                    );
            }
        });
    }
}

<?php

use App\Models\App\News;
use App\Models\App\Rating;
use App\Models\App\Structure;
use App\Models\App\UserStructure;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
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
                $type = preg_replace('/_data$/', '', $user->userStructure->structure->data_type);

                $ratingType = ucfirst($type) . 'Rating';
                $dataRating = factory('App\Models\App\\' . $ratingType)->create();

                $user->ratings()
                    ->save(
                        factory(Rating::class)
                            ->make([
                                'author_id' => $user->id,
                                'structure_id' => $user->userStructure->structure->id,
                                'rating_type' => preg_replace('/_data$/', '_rating', $user->userStructure->structure->data_type),
                                'rating_id' => $dataRating->id
                            ]));
            }
        });
    }
}

<?php

use App\Models\App\Address;
use App\Models\App\ContactMeans;
use App\Models\App\News;
use App\Models\App\Rating;
use App\Models\App\Structure;
use App\Models\App\UserStructure;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class StructuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $structures = factory(Structure::class, 100)->create()->each(function (Structure $structure) {
            $structure->address()->associate(factory(Address::class)->create());
            $structure->contact()->associate(factory(ContactMeans::class)->create());

            $dataClass = 'App\Models\App\\' . ucfirst(preg_replace('/_data$/', '', $structure->data_type)) . 'Data';
            $structure->data()->associate(factory($dataClass)->create());

            $structure->save();
        });
    }
}

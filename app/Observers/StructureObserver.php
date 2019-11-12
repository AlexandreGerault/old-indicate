<?php

namespace App\Observers;

use App\Models\App\Structure;
use Schema;

class StructureObserver
{
    /**
     * Handle the structure "created" event.
     *
     * @param  Structure  $structure
     * @return void
     */
    public function created(Structure $structure)
    {
        $dataClass = 'App\Models\App\\' . ucfirst($structure->data_type) . 'Data';
        $data = new $dataClass();
        $data->save();

        $structure->data()->associate($data);
        $structure->save();
    }

    /**
     * Handle the structure "updated" event.
     *
     * @param  Structure  $structure
     * @return void
     */
    public function updated(Structure $structure)
    {
        //
    }

    /**
     * Handle the structure "deleted" event.
     *
     * @param  Structure  $structure
     * @return void
     */
    public function deleted(Structure $structure)
    {
        //
    }

    /**
     * Handle the structure "restored" event.
     *
     * @param  Structure  $structure
     * @return void
     */
    public function restored(Structure $structure)
    {
        //
    }

    /**
     * Handle the structure "force deleted" event.
     *
     * @param  Structure  $structure
     * @return void
     */
    public function forceDeleted(Structure $structure)
    {
        //
    }
}

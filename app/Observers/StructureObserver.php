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
        $dataClass = 'App\Models\App\\' . ucfirst($structure->data_type ) . 'Data';
        $data = new $dataClass();
        $data->save();

        $structure->data()->associate($data);
        $structure->save();

        $member = auth()->user()->userStructure;
        $member->structure_id = $structure->id;
        $member->status = config('enums.structure_membership_request_status.ACCEPTED');
        $member->jobname = 'Fondateur';
        $member->save();

        $authorizations = auth()->user()->authorizations;
        $columns = \array_diff(Schema::getColumnListing('users_authorizations'), ['id', 'user_id', 'created_at', 'updated_at']);
        foreach ($columns as $key => $value) {
            $authorizations->$value = 1;
        }
        $authorizations->save();
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

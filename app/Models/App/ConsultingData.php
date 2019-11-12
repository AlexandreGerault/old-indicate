<?php

namespace App\Models\App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\App\ConsultingData
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ConsultingData newModelQuery()
 * @method static Builder|ConsultingData newQuery()
 * @method static Builder|ConsultingData query()
 * @method static Builder|ConsultingData whereCreatedAt($value)
 * @method static Builder|ConsultingData whereId($value)
 * @method static Builder|ConsultingData whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ConsultingData extends Model
{
    /**
     * @return mixed
     */
    public function structure()
    {
        return $this->morphOne(Structure::class, 'data');
    }
}

<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\App\Address
 *
 * @property int $id
 * @property int $postal_code
 * @property int $house_number
 * @property string $county
 * @property string $country
 * @property string $road
 * @property string $city
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ContactMeans newModelQuery()
 * @method static Builder|ContactMeans newQuery()
 * @method static Builder|ContactMeans query()
 * @method static Builder|ContactMeans whereCreatedAt($value)
 * @method static Builder|ContactMeans whereId($value)
 * @method static Builder|ContactMeans wherePostalCode($value)
 * @method static Builder|ContactMeans whereHouseNumber($value)
 * @method static Builder|ContactMeans whereCounty($value)
 * @method static Builder|ContactMeans whereCountry($value)
 * @method static Builder|ContactMeans whereRoad($value)
 * @method static Builder|ContactMeans whereCity($value)
 * @method static Builder|ContactMeans whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Address extends Model
{
    protected $fillable = ['postcode', 'house_number', 'county', 'country', 'road', 'city'];
}

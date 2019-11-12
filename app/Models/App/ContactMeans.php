<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\App\ContactMeans
 *
 * @property int $id
 * @property int $mailing_address_id
 * @property int $phone_number
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ContactMeans newModelQuery()
 * @method static Builder|ContactMeans newQuery()
 * @method static Builder|ContactMeans query()
 * @method static Builder|ContactMeans whereCreatedAt($value)
 * @method static Builder|ContactMeans whereId($value)
 * @method static Builder|ContactMeans wherePhoneNumber($value)
 * @method static Builder|ContactMeans whereEmail($value)
 * @method static Builder|ContactMeans whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ContactMeans extends Model
{
    protected $fillable = ['phone_number', 'email'];

    public function mailingAddress()
    {
        return $this->belongsTo(Address::class);
    }
}

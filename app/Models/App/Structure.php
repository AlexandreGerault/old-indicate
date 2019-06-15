<?php

namespace App\Models\App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use App\Models\App\News;
use App\Models\App\UserStructure;
use Auth;

class Structure extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'comment', 'siret', 'siren', 'type'
    ];

    /**
     * Scope a query to search structures by name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByName($query, $name) {
        return $query->where('name', 'LIKE', '%'.$name.'%');
    }

    /**
     * Get the UserStructure relationships
     */
    public function structureUsers() {
        return $this->hasMany(UserStructure::class, 'structure_id');
    }

    /**
     * Return users related to the structure
     */
    public function members() {
        $structure = $this;
        return $this->belongsToMany(User::class, 'users_structures', 'structure_id', 'user_id')
                    ->whereHas('UserStructure', function ($q) use ($structure) {
                        $q->where('status', '=', config('enums.structure_membership_request_status.ACCEPTED'))
                            ->where('structure_id', '=', $structure->id);
                        });
    }

    /**
     * Get the name of the structure type
     * 
     * @return string
     */
    public function typename() {
        switch ($this->type) {
            case config('enums.structure_type.INVESTOR'):
                return __('investor');
                break;
            case config('enums.structure_type.COMPANY'):
                return __('company');
                break;
            case config('enums.structure_type.CONSULTING'):
                return __('consulting');
                break;
        }
    }

    /**
     * Get the name of the structure type
     * 
     * @return string
     */
    public function displayTypename() {
        switch ($this->type) {
            case config('enums.structure_type.INVESTOR'):
                return __('Investisseur');
                break;
            case config('enums.structure_type.COMPANY'):
                return __('Entreprise');
                break;
            case config('enums.structure_type.CONSULTING'):
                return __('Consultant');
                break;
        }
    }

    /**
     * Returns an array of data depending on the structure type
     * 
     * @return array
     */
    public function data() {
        switch ($this->type) {
            case config('enums.structure_type.INVESTOR'):
                return DB::table('structures')
                          ->where('structures.id', '=', $this->id)
                          ->join('investor_data', 'structures.id', '=', 'investor_data.structure_id')
                          ->get();
                break;
            case config('enums.structure_type.COMPANY'):
                return DB::table('structures')
                          ->where('structures.id', '=', $this->id)
                          ->join('company_data', 'structures.id', '=', 'company_data.structure_id')
                          ->get()
                          ->all();
                break;
            case config('enums.structure_type.CONSULTING'):
                return DB::table('structures')
                          ->where('structures.id', '=', $this->id)
                          ->join('consulting_data', 'structures.id', '=', 'consulting_data.structure_id')
                          ->get();
                break;
        }
    }

    /**
     * Get news from the current structure
     */
    public function news() {
        return $this->hasMany(News::class, 'structure_id');
    }

    /**
     * Get the news from the structure this one is following
     */
    public function timeline() {
        return News::byFollowersOf(Auth::user()->structure);
    }

    public function following() {
        return $this->belongsToMany(Structure::class, 'followers', 'follower_id', 'following_id');
    }

    public function followers() {
        return $this->belongsToMany(Structure::class, 'followers', 'following_id', 'follower_id');
    }

    /**
     * Determine wether the structure is subscribed to the target timeline
     */
    public function follows(Structure $struct) {
        return $this->following->contains($struct);
    }

}

<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Listing extends Model
{
    protected $table = 'listings';

    use Filterable;

    protected $fillable = [
        'list_name',
        'address',
        'latitude',
        'longitude',
    ];

    public function submitter()
    {
        return $this->belongsTo(User::class, 'submitter_id', 'id');
    }

    public function scopeSubmitter($query, $user_id)
    {
        return $query->where('submitter_id', $user_id);
    }

    public function listingsWithDistance($filter_data, $current_latitude, $current_longitude)
    {
        $listings = DB::table($this->table)
            ->select(DB::raw('*, ST_Distance_Sphere(
                    point(' .$current_longitude. ', ' .$current_latitude. '),
                    point(longitude, latitude)
                ) * .001 as distance')
            )
            ->when(data_get($filter_data, 'user_id'), function ($query, $user_id) {
                return $query->where('submitter_id', $user_id);
            })
            ->paginate(data_get($filter_data, 'limit', 50));

        return $listings;
    }
}

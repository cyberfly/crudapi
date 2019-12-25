<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Listing extends Model
{
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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
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

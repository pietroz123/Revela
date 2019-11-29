<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Disable timestamps
    public $timestamps = false;

    // Relationships
    public function state() {
        return $this->belongsTo('App\State', 'state_id', 'id');
    }
}

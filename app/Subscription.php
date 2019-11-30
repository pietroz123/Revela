<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    // Disable timestamps
    public $timestamps = false;

    // Relationships
    public function plan() {
        return $this->belongsTo('App\Plan', 'plan_id', 'id');
    }
}

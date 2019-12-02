<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Relationships
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function album() {
        return $this->belongsTo('App\Album');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // Relationships
    public function template() {
        return $this->belongsTo('App\Template');
    }
    public function photos() {
        return $this->hasMany('App\Photo');
    }
}

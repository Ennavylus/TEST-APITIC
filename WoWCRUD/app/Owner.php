<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get the characters for this owner.
     */
    public function characters()
    {
        return $this->hasMany('App\Character');
    }
}

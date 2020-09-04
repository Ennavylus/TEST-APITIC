<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{

    /**
     * Get the specializations for this classes.
     */
    public function specializations()
    {
        return $this->hasMany('App\Specialization');
    }
}

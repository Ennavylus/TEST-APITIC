<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $with = ['classe'];

    /**
     * Get the Classe that owns the specialization.
     */
    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }
}

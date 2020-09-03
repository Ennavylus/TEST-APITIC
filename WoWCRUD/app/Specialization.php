<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $with = ['classe'];

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }
}

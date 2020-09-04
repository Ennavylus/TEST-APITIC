<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{



    public function specializations()
    {
        return $this->hasMany('App\Specialization');
    }
}

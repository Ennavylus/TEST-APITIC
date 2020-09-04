<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $with = ['specialization', 'owner', 'race', 'classe'];

    protected $fillable = [
        'pseudo', 'owner_id', 'specialization_id', 'healthPoints', 'race_id', 'class_id'
    ];

    public function specialization()
    {
        return $this->belongsTo('App\Specialization');
    }

    public function classe(Type $var = null)
    {
        return $this->belongsTo('App\Classe');
    }

    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
    /**
     * Undocumented function
     *
     * @return
     */
    public function race()
    {
        return $this->belongsTo('App\Race');
    }
}

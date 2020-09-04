<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $with = ['specialization', 'owner', 'race', 'classe'];

    protected $fillable = [
        'pseudo', 'owner_id', 'specialization_id', 'healthPoints', 'race_id', 'classe_id'
    ];

    /**
     * Match the class with to the character
     */
    public function ClasseAction()
    {
        $classe = $this->classe->type;
        return  new $classe($this->specialization->name);
    }

    /**
     * Get the specialization that owns the character.
     */
    public function specialization()
    {
        return $this->belongsTo('App\Specialization');
    }
    /**
     * Get the Classe that owns the character.
     */
    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }

    /**
     * Get the Owner that owns the character.
     */
    public function owner()
    {
        return $this->belongsTo('App\Owner');
    }
    /**
     * Get the Race that owns the character.
     *
     * @return
     */
    public function race()
    {
        return $this->belongsTo('App\Race');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chasseur extends Model
{
    private $coup_prefere = 'Hurlement de la bête';
    private $specialization;


    public function __construct($specialization)
    {
        $this->specialization = $specialization;
    }

    function detail()
    {
        return "Je suis un Chasseur et mon coups preféré est $this->coup_prefere";
    }

    function Hurlement_de_la_bête()
    {
        return "Je suis un Chasseur avec la spécialisation $this->specialization";
    }
}

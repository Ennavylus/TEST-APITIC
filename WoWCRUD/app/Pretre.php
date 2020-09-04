<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pretre extends Model
{
    private $soin_prefere = 'Hymne divin';
    private $sort_preferere = 'Eruption du Vide';
    private $specialization;


    public function __construct($specialization)
    {
        $this->specialization = $specialization;
    }

    function detail()
    {
        if ($this->specialization->type == 'dps') {
            return "Je suis un Prêtre et mon sort preféré est $this->sort_preferere";
        }
        return "Je suis un Prêtre et mon soin preféré est $this->soin_prefere";
    }

    public function Eruption_du_Vide()
    {
        return "Je suis un Prêtre avec la spécialisation $this->specialization";
    }

    function Hymne_divin()
    {
        return "Je suis un Prêtre avec la spécialisation $this->specialization";
    }
}

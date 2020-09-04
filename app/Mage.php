<?php

namespace App;


class Mage
{
    private $sort_prefere = 'Murmure de magie';
    private $specialization;

    public function __construct($specialization)
    {
        $this->specialization = $specialization;
    }


    function detail()
    {
        return "Je suis un Mage et mon sort preféré est $this->sort_prefere";
    }

    function Murmure_de_magie()
    {
        return "Je suis un Mage avec la spécialisation $this->specialization";
    }
}

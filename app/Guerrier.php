<?php

namespace App;



class Guerrier
{

    private $coup_prefere = 'Cri de guerre';
    private $specialization;


    public function __construct($specialization)
    {
        $this->specialization = $specialization;
    }


    function detail()
    {
        return "Je suis un Guerrier et mon coups preféré est $this->coup_prefere";
    }

    function Cri_de_guerre()
    {
        return "Je suis un Guerrier avec la spécialisation $this->specialization";
    }
}

<?php

use App\Classe;
use App\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialisationByClasse = [
            "Mage" => [
                'Feu',
                'Givre',
                'Arcane'
            ],
            "Prêtre" => [
                'Sacré',
                'Discipline',
                'Ombre'
            ],
            'Chasseur' => [
                'Maitrise des bêtes',
                'Précision',
                'Survie'
            ],
            "Guerrier" => [
                'Arme',
                'Fureur',
                'Protection',
            ],

        ];

        foreach ($specialisationByClasse as $classe => $specialisations) {
            $thisClasse = Classe::where('name', $classe)->first();
            foreach ($specialisations as $specialisation) {
                $spe = new Specialization();
                $spe->name = $specialisation;
                $spe->classe_id = $thisClasse->id;
                $spe->icon = "image/$classe/$specialisation.png";
                $spe->save();
            }
        }
    }
}

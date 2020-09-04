<?php

use App\Classe;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $classesByArmor = [
        //     'tissu' => ['Mage' => '#69CCF0', 'Prêtre' => '#FFFFFF', 'Démoniste' => '#9482C9',],
        //     'cuir' => ['Voleur' => '#FFF569', 'Moine' => '#00FF96', 'Druide' => '#FF7D0A', 'Chasseur de démons' => '#A330C9',],
        //     'mailles' => ['Chasseur' => '#ABD473', 'Chaman' => '#0070DE',],
        //     'plaque' => ['Guerrier' => '#C79C6E', 'Paladin' => "#F58CBA", 'Chevalier de la mort' => "#C41F3B"],
        // ];
        // foreach ($classesByArmor as $armor => $classes) {
        //     foreach ($classes as $classe => $color) {
        //         $newClasse = new Classe();
        //         $newClasse->armor = $armor;
        //         $newClasse->name = $classe;
        //         $newClasse->color = $color;
        //         $newClasse->save();
        //     }
        // }
        $classes = [
            'Mage' => [
                'color' => '#69CCF0',
                'armor' => 'tissu',
                'name' => 'Mage',
                'type' => 'App\Mage'
            ],
            'Prêtre' => [
                'color' => '#FFFFFF',
                'armor' => 'tissu',
                'name' => 'Prêtre',
                'type' => 'App\Pretre'
            ],
            'Chasseur' => [
                'color' => '#ABD473',
                'armor' => 'mailles',
                'name' => 'Chasseur',
                'type' => 'App\Chasseur'
            ],
            'Guerrier' => [
                'color' => '#C79C6E',
                'armor' => 'plaque',
                'name' => 'Guerrier',
                'type' => 'App\Guerrier'
            ]
        ];
        foreach ($classes as  $classe) {
            Classe::create($classe);
            // $newClasse = new Classe();
            // $newClasse->armor = 'plaque';
            // $newClasse->name = 'Guerrier';
            // $newClasse->color = '#C79C6E';
            // $newClasse->type = 'App\Guerrier';
            // $newClasse->save();
        }
    }
}

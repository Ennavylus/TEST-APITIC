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
                'Feu' => ['Sort préféré', 'Pyrotechnique()'],
                'Givre' => ['Sort préféré', 'Pointe_glaciere()'],
                'Arcane' => ['Sort préféré', 'Murmure_de_magie()']
            ],
            "Prêtre" => [
                'Sacré' => ['Soin préféré', 'Hymne_divin()'],
                'Discipline' => ['Soin préféré', 'Pénitence()'],
                'Ombre' => ['Sort préféré', 'Eruption_du_Vide()']
            ],
            'Démoniste' => [
                'Affliction' => ['Sort préféré', 'Graine_de_Corruption()'],
                'Démonologie' => ['Sort préféré', 'Main_de_Gul\'dan()'],
                'Destruction' => ['Sort préféré', 'Trait_du_chaos()'],
            ],
            'Voleur' => [
                'Assassinat' => ['Coup préféré', 'Envenimer()'],
                'Hors-la-loi' => ['Coup préféré', 'Entre_les_deux_yeux()'],
                'Finesse' => ['Coup préféré', 'Lamenuit()']
            ],
            'Moine' => [
                'Maître brasseur' => ['Coup préféré', 'Infusion_purificatrice()'],
                'Tisse-brume' => ['Soin préféré', 'Regain()'],
                'Marche-vent' => ['Coup préféré', 'Toucher_de_la_mort()']
            ],
            "Druide" => [
                'Equilibre' => ['Sort préféré', 'Alignement_céleste()'],
                'Farouche' => ['Coup préféré', 'Morsure_féroce()'],
                'Gardien' => ['Coup préféré', 'Régénration_frénétique()'],
                'Restauration' => ['Soin préféré', 'Tranquillité()']
            ],
            "Chasseur de démons" => [
                'Devastation' => ['Coup préféré', 'Rayon_accablant()'],
                'Vengeance' => ['Coup préféré', 'Métamorphose()'],
            ],
            'Chasseur' => [
                'Maitrise des bêtes' => ['Coup préféré', 'Hurlement_de_la_bête()'],
                'Précision' => ['Coup préféré', 'Visée()'],
                'Survie' => ['Coup préféré', 'Assaut_coordonné()'],
            ],
            'Chaman' => [
                'Elémentaire' => ['Sort préféré', 'Horion_de_terre()'],
                'Amélioration' => ['Coup préféré', 'Frappe_tempête()'],
                'Restauration' => ['Soin préféré', 'Totem_de_marée_de_soins()'],
            ],
            "Guerrier" => [
                'Arme' => ['Coup préféré', 'Cri_de_guerre()'],
                'Fureur' => ['Coup préféré', 'Sanguinaire()'],
                'Protection' => ['Coup préféré', 'Dur_au_mal()'],
            ],
            "Paladin" => [
                'Sacré' => ['Soin préféré', 'Horion_sacré()'],
                'Protection' => ['Coup préféré', 'Bouclier_du_vertueux()'],
                'Vindicte' => ['Coup préféré', 'Verdict_du_templier()'],
            ],
            "Chevalier de la mort" => [
                'Sang' => ['Coup préféré', 'Mort_et_décomposition()'],
                'Givre' => ['Coup préféré', 'Souffle_de_Sindragosa()'],
                'Impie' => ['Coup préféré', 'Voile_mortel()'],
            ]
        ];

        foreach ($specialisationByClasse as $classe => $specialisations) {
            $thisClasse = Classe::where('name', $classe)->first();
            foreach ($specialisations as $specialisation => $value) {
                $spe = new Specialization();
                $spe->name = $specialisation;
                $spe->property = $value[0];
                $spe->methode = $value[1];
                $spe->classe_id = $thisClasse->id;
                $spe->icon = "image/$classe/$specialisation.png";
                $spe->save();
            }
        }
    }
}

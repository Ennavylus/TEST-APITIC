<?php

use App\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $racesByFaction = [
            'Horde' => ['Orc', 'Tauren', 'Gobelin', 'Troll', 'Mort-vivant', 'elfe de sang',],
            'Alliance' => ['Humain', 'Nain', 'Elfe de la nuit', 'Gnome', 'Draeneï', 'Worgen']
        ];
        foreach ($racesByFaction as $faction => $races) {
            foreach ($races as $race) {
                $newRace = new Race();
                $newRace->faction = $faction;
                $newRace->name = $race;
                $newRace->save();
            }
        }
    }
}

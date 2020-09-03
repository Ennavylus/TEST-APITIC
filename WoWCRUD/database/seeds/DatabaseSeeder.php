<?php

use App\Character;
use App\Owner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RaceSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(SpecializationSeeder::class);
        $owner = new Owner();
        $owner->name = 'Tom';
        $owner->save();
        $character = new Character();
        $character->pseudo = 'Ennavylus';
        $character->healthPoints = 200;
        $character->race_id = 2;
        $character->specialization_id = 19;
        $character->owner_id = $owner->id;
        $character->save();
    }
}

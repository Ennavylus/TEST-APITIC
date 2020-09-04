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
        $owners = [
            ['name' => 'Tom'], ['name' => 'Ennavylus'], ['name' => 'Azillis']
        ];
        foreach ($owners as $owner) {
            Owner::create($owner);
        }
        $characters = [
            [
                "pseudo" => 'Tominator', "healthPoints" => 200, "race_id" => 1,
                "classe_id" => 1, "specialization_id" => 2, "owner_id" => 1
            ],
            [
                "pseudo" => 'Azillis', "healthPoints" => 200, "race_id" => 3, "classe_id" => 2,
                "specialization_id" => 4, "owner_id" => 3
            ],
            [
                "pseudo" => 'Ennavylus', "healthPoints" => 200, "race_id" => 7,
                "classe_id" => 3, "specialization_id" => 8, "owner_id" => 2
            ],
            [
                "pseudo" => 'Arthius', "healthPoints" => 250, "race_id" => 5,
                "classe_id" => 4, "specialization_id" => 10, "owner_id" => 1
            ],

        ];
        foreach ($characters as $character) {
            Character::create($character);
        };
    }
}

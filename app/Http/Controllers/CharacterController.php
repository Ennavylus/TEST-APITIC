<?php

namespace App\Http\Controllers;

use App\Character;
use App\Classe;
use App\Owner;
use App\Race;
use App\Specialization;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($classe = null)
    {

        if ($classe == 'classe') {
            $characters = Character::orderBy('classe_id', 'desc')->get();
        } else {
            $characters = Character::all();
        }
        foreach ($characters as  $character) {
            if ($character->owner->name == 'Tom') {
                $character->pseudo = $this->colorName($character->pseudo);
            }
            $character->detail = 'Je suis un ' . $character->specialization->classe->name . ' et mon ' . $character->specialization->property . ' est ' .
                $character->specialization->methode;
        }

        return view('character.index', [
            'characters' => $characters,
        ]);
    }

    /**
     * Allows to split string into array whith random color for each letter
     *
     * @param [string] $pseudo
     * @return array letters with random color
     */
    public function colorName($pseudo)
    {
        $newPseudo = [];
        foreach (str_split($pseudo) as $value) {
            $color = "rgb(";
            for ($i = 0; $i < 3; $i++) {
                $color .= mt_rand(0, 200);
                $i < 2 ? $color .= "," : null;
            }
            $color .= ')';
            $newPseudo[] = [$value, $color];
        }
        return $newPseudo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $races = Race::all();
        $classes = Classe::all();
        $specializations = Specialization::all();
        return view('character.create', [
            'races' => $races,
            'classes' => $classes,
            'specializations' => $specializations
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "owner" => ['required', 'string', 'min:2', 'max:50'],
            "pseudo" => ['required', 'string', 'min:2', 'max:50'],
            "race_id" => ['required', 'numeric'],
            "classe_id" => ['required', 'numeric'],
            "specialization_id" => ['required', 'numeric'],
            "healthPoints" => ['required', 'numeric']
        ]);

        $owner = Owner::firstOrCreate(['name' => $data['owner']]);
        $data['owner_id'] = $owner->id;
        unset($data['owner']);

        if (Character::create($data)) {
            return redirect()->route('character.index')->with('success', "Le personnage a bien été créer");
        }

        return redirect()->back()->with('error', "Un probleme est survenu lors de la création du personnage");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Character $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        $data = $request->validate([
            "pseudo" => ['required', 'string', 'min:2', 'max:50'],
            "race_id" => ['required', 'numeric'],
            "classe_id" => ['required', 'numeric'],
            "specialization_id" => ['required', 'numeric'],
            "healthPoints" => ['required', 'numeric']
        ]);

        if ($character->update($data)) {
            return redirect()->route('character.index')->with('success', "Le personnage a bien été modifier");
        }

        return redirect()->back()->with('error', "Un probleme est survenu lors de la modification du personnage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   Character $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        if ($character->delete()) {
            return redirect()->route('character.index')->with('success', "Le personnage a bien été suprrimer");
        }

        return redirect()->back()->with('error', "Un probleme est survenu lors de la suppression du personnage");
    }
}
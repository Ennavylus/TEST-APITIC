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
    public function index()
    {

        $characters = Character::all();
        return view('character.index', [
            'characters' => $characters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner = Owner::all();
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

        return redirect()->back()->with('error', "Un probleme est survenu, échec de la création du personnage");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

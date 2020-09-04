@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center">
        <div class="card w-100">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Ma guilde</h4>
                <form action="{{route('character.create')}}" method="get">
                    <button class="btn btn-outline-secondary">Ajouter personnage</button>
                </form>
            </div>
            <div class="card-body align-items-center " style="background-color:rgb(240,240,240,0.8);">
                <div class="row">

                    {{-- Order byClasse --}}
                    <div class="form-group col-md-4">
                        <form action="{{route('character.byClasse', 'classe')}}" method="get">
                            <button class="btn btn-outline-secondary">classer par classe</button>
                        </form>
                    </div>
                    @if ($orderByClasse)
                    {{-- OrderBySpecialization --}}
                    <div class="form-group col-md-4">
                        <form action="{{route('character.byClasse', 'specialization')}}" method="get">
                            <button class="btn btn-outline-secondary">classer par specialisation</button>
                        </form>
                    </div>
                    @endif

                </div>

                <div class="table-responsive-md">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center text-primary">Pseudo</th>
                                <th class="text-center text-primary">Race</th>
                                <th class="text-center text-primary">Points de vie</th>
                                <th class="text-center text-primary">Armure</th>
                                <th class="text-center text-primary">Détail</th>
                                <th class="text-center text-primary">Propriétaire</th>
                                <th class="text-center text-primary">Action</th>
                            </tr>
                        </thead>
                        <tbody class="action-bar">
                            @foreach ($characters as $character)
                            <tr
                                style="background-color:{{$character->specialization->classe->color}} semi-transparent; ">
                                <td class="text-center pt-4 pb-4" style="min-width: 15vw">
                                    @if ($character->owner->name === 'Tom')
                                    <p style="word-spacing:-3px">
                                        @foreach ($character->pseudo as $letter)
                                        <span style="color:{{ $letter[1]}}; font-weight:bolder;">{{ $letter[0] }}</span>
                                        @endforeach
                                    </p>
                                    @else
                                    {{ $character->pseudo ?? ''}}
                                    @endif
                                </td>
                                <td class="text-center"
                                    style="background-color: {{$character->specialization->classe->color}}">
                                    <div class="d-flex flex-column align-items-center">
                                        {{ $character->race->name ?? ''}} <img
                                            src="{{ asset("image/".$character->race->faction.'.png')}}" alt=""
                                            width="30vw">
                                    </div>



                                </td>
                                <td class="text-center">{{ $character->healthPoints?? ''}}</td>
                                <td class="text-center">{{ $character->specialization->classe->armor?? ''}}</td>
                                <td class="text-center"><img src="{{ asset($character->specialization->icon)}}" alt=""
                                        height="20vw">
                                    {{ $character->classeAction()->detail() }}</td>
                                <td class="text-center"
                                    style="background-color: {{$character->specialization->classe->color}}">
                                    {{ $character->owner->name ?? ''}}</td>
                                <td class="text-center">
                                    <a href="{{route('character.edit', $character)}}">Modifier/supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

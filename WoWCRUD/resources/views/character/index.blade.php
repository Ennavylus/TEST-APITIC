@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center">
        <div class="card w-100">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Tous les joueurs</h4>
                <form action="{{route('character.create')}}" method="get">
                    <button class="btn btn-outline-secondary">Ajouter personnage</button>
                </form>
            </div>
            <div class="card-body align-items-center " style="background-color:rgb(240,240,240,0.8);">
                <div class="table-responsive-lg">
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
                            <tr>
                                <td class="text-center">{{ $character->pseudo ?? ''}}</td>
                                <td class="text-center"
                                    style="background-color: {{$character->specialization->classe->color}}">
                                    {{ $character->race->name ?? ''}}</td>
                                <td class="text-center">{{ $character->healthPoints?? ''}}</td>
                                <td class="text-center">{{ $character->specialization->classe->armor?? ''}}</td>
                                <td class="text-center"><img src="{{ asset($character->specialization->icon)}}" alt=""
                                        height="20vw">
                                    {{ 'Je suis un '. $character->specialization->classe->name. ' et mon ' . $character->specialization->property .' est ' .
                                $character->specialization->methode }}</td>
                                <td class="text-center"
                                    style="background-color: {{$character->specialization->classe->color}}">
                                    {{ $character->owner->name ?? ''}}</td>
                                <td class="text-center"><a
                                        href="{{route('character.edit', $character)}}">Modifier/supprimer</a>
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

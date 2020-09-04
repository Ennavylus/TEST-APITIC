@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class=" d-flex justify-content-between">
        <h4 class="card-title">Création de personnage</h4>
        <form action="{{route('character.index')}}" method="GET">

            <button class="btn btn-outline-secondary">retour</button>
        </form>
    </div>
    <div class="row justify-content-center w-100">
        <form method="POST" action="{{ route('character.store') }}" class="col-md-10">
            @csrf
            <div class="row mt-3">
                {{-- Owner --}}
                <div class="form-group col-md-4">
                    <label for="owner" class="">Propriétaire</label>
                    <div class="">
                        <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror"
                            name="owner" value="{{ old('owner') }}" required autocomplete="owner" autofocus>
                        @error('owner')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- pseudo --}}
                <div class="form-group col-md-4">
                    <label for="pseudo" class="">Pseudo</label>
                    <div class="">
                        <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror"
                            name="pseudo" value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>
                        @error('pseudo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                {{-- pseudo --}}
                <div class="form-group col-md-4">
                    <label for="healthPoints" class="">Point de vie</label>
                    <div class="">
                        <input id="healthPoints" type="text"
                            class="form-control @error('healthPoints') is-invalid @enderror" name="healthPoints"
                            value="{{ old('healthPoints') }}" required autocomplete="healthPoints" autofocus>
                        @error('healthPoints')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                {{-- Race --}}
                <div class="form-group col-md-4">
                    <label for="pseudo" class="">Race</label>
                    <select name="race_id" id="race_id" class="custom-select @error('race_id') is-invalid @enderror">
                        <option value="">Selectionner une race</option>
                        @foreach ($races as $race)
                        <option value="{{ $race->id }}"> {{ $race->name }} </option>
                        @endforeach
                    </select>
                    @error('race_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- Classe --}}
                <div class="form-group col-md-4">
                    <label for="pseudo" class="">Classe</label>
                    <select name="classe_id" id="classe_id"
                        class="custom-select @error('classe_id') is-invalid @enderror" onchange="onChangeClasse(event)">
                        <option value="">Selectionner une classe</option>
                        @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}">
                            {{ $classe->name }} </option>
                        @endforeach
                    </select>
                    @error('classe_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                {{-- Spécialisation --}}
                <div class="form-group col-md-4" id="specializationSelector">
                    <label for="pseudo" class="">Spécialisation</label>
                    <select name="specialization_id" id="specialization_id"
                        class="custom-select @error('specialization_id') is-invalid @enderror ">
                        <option value="">Selectionner une classe</option>
                        @foreach ($specializations as $specialization)
                        <option data-classe="{{ $specialization->classe_id }}" value="{{ $specialization->id }}">
                            {{ $specialization->name }}</option>
                        @endforeach
                    </select>
                    @error('specialization_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            {{-- button submit --}}
            <div class="form-group row mb-0 mt-3 ">
                <div class="col-md-5 offset-md-7">
                    <button type="submit" class="btn btn-outline-success">
                        Ajouter le personnage
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('extra-js')
<script>
    let divSelector = document.getElementById('specializationSelector').style.display='none'
    function onChangeClasse(event){
       let classe = event.target.value;
        let divSelector = document.getElementById('specializationSelector');
        let specializationSelector = document.getElementById('specialization_id');
        for(let specialization of specializationSelector.children ){
            if(specialization.getAttribute('data-classe') == classe){
                specialization.style.display = 'block'
            }
            else{
                specialization.style.display = 'none'
            }
            specializationSelector.children[0].selected =true;
        }
        divSelector.style.display='block'
    }

</script>
@endsection

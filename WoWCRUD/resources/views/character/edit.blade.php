@extends('layouts.master')

@section('content')
<div class="container mt-5 ">
    <div class=" d-flex justify-content-between mb-4">
        <h4 class="card-title">Modifier le personnage</h4>
        <form action="{{route('character.destroy', $character)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger">Supprimer le personnage</button>
        </form>
    </div>
    <div class="row justify-content-center w-100">
        <form method="POST" action="{{ route('character.update',$character) }}" class="col-md-10" id="updateThis">
            @csrf
            @method('PUT')
            <div class="row mt-3">
                {{-- Owner --}}
                <div class="form-group col-md-4">
                    <label for="owner" class="">Propriétaire</label>
                    <div class="">
                        <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror"
                            name="owner" value="{{ old('owner') }}" placeholder="{{ $character->owner->name }}"
                            autofocus>
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
                            name="pseudo" value="{{ old('pseudo') }}" placeholder="{{ $character->pseudo }}" autofocus>
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
                            value="{{ old('healthPoints') }}" placeholder="{{ $character->healthPoints }}" autofocus>
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
                    <select name="race_id" id="race_id" class="form-control">
                        @foreach ($races as $race)
                        <option value="{{ $race->id }}" {{$character->race_id == $race->id?'selected':''}}>
                            {{ $race->name }} </option>
                        @endforeach
                    </select>
                </div>
                {{-- Classe --}}
                {{-- Classe --}}
                <div class="form-group col-md-4">
                    <label for="pseudo" class="">Classe</label>
                    <select name="classe_id" id="classe_id" class="form-control" onchange="onChangeClasse(event)">
                        <option value="">Selectionner une classe</option>
                        @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}" {{$character->classe_id== $classe->id?'selected':''}}>
                            {{ $classe->name }} </option>
                        @endforeach
                    </select>
                </div>
                {{-- Spécialisation --}}
                <div class="form-group col-md-4" id="specializationSelector">
                    <label for="pseudo" class="">Spécialisation</label>
                    <select name="specialization_id" id="specialization_id" class="form-control">
                        <option value="" style="display: none">Selectionner une classe</option>
                        @foreach ($specializations as $specialization)
                        <option data-classe="{{ $specialization->classe_id }}" value="{{ $specialization->id }}"
                            {{$character->specialization_id== $specialization->id?'selected':''}}
                            style="{{$specialization->classe_id!= $character->classe_id?'display:none;':''}}">
                            {{ $specialization->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" form="updateThis" class="btn btn-outline-secondary">
                    modifier le personnage
                </button>
            </div>
        </form>
        {{-- button submit --}}
        <div class="d-flex justify-content-between w-100">
            <form action="{{route('character.index')}}" method="GET" id="return">

                <button class="btn btn-outline-secondary" form="return">retour</button>
            </form>
        </div>

    </div>
</div>
@endsection
@section('extra-js')
<script>
    // let divSelector = document.getElementById('specializationSelector').style.display='none'
    function onChangeClasse(event){
       let classe = event.target.value;
        let divSelector = document.getElementById('specializationSelector');
        let specializationSelector = document.getElementById('specialization_id');
        console.log(classe);
        for(let specialization of specializationSelector.children ){
            console.log(specialization.getAttribute('data-classe'))
            if(specialization.getAttribute('data-classe') == classe){
                specialization.style.display = 'block'
                console.log('classe');
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

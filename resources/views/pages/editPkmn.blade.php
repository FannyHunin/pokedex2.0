@extends('template')

@section('content')
    <h1 class="mb-5">Edit a Pokémon</h1>
    <form enctype="multipart/form-data" action="/updatePkmn/{{$newPkmn->id}}" method="post" class="border border-dark rounded p-5 w-50 d-flex justify-content-center flex-column align-items-center text-center">
        @csrf
        <label for="name">Pokémon's name :
            <input type="text" name="name" value="{{$newPkmn->name}}">
        </label>
        <label for="level">Pokémon's level :
            <input type="number" name="level" value="{{$newPkmn->level}}">
        </label>
        <label for="type_id">Pokémon's type :
            <select name="type_id" id="">
                @foreach ($typeData as $type)
                <option {{$type->id == $type->id ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </label>
        <label for="src">Pokémon's image :
            <input type="file" name="src" value="{{$newPkmn->src}}"> Source : {{$newPkmn->src}}
        </label>
        <button class="btn btn-danger w-50" type="submit">Edit</button>
    </form>
@endsection
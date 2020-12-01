@extends('template')

@section('content')
    <h1 class="mb-5">Add a Pokémon</h1>
    @if ($errors->any())
        <div class="alert alert-danger w-25">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" action="/storePkmn" method="post" class="border border-dark rounded p-5 w-50 d-flex justify-content-center flex-column align-items-center text-center">
        @csrf
        <label for="name">Pokémon's name :
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        <label for="level">Pokémon's level :
            <input type="number" name="level" value="{{old('level')}}">
        </label>
        <label for="type_id">Pokémon's type :
            <select name="type_id" id="">
                @foreach ($typeData as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </label>
        <label for="src">Pokémon's image :
            <input type="file" name="src" value="{{old('src')}}">
        </label>
        <button class="btn btn-danger w-50" type="submit">Add</button>
    </form>
@endsection
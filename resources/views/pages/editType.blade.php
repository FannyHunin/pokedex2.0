@extends('template')

@section('content')
<h1 class="mb-5">Edit a type</h1>
@if ($errors->any())
    <div class="alert alert-danger w-25">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/updateType/{{$newType->id}}" method="post" class="border border-dark rounded p-5 w-25 d-flex justify-content-center flex-column text-center">
    @csrf
    <label for="name">Type's name :
        <input type="text" name="name" id="" value="{{$newType->name}}">
    </label>

    <button class="btn btn-danger" type="submit">Edit</button>
</form>
@endsection
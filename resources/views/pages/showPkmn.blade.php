@extends('template')

@section('content')
    <div class="card text-center p-3" style="width: 18rem;">
        <img src="{{asset('images/'.$newPkmn->src)}}" style="height: 17rem" class="card-img-top" alt="...">
        <div class="card-body"><h5 class="card-title">
            {{$newPkmn->name}}
        </h5>
          <h5 class="card-title">{{$newPkmn->type->name}}</h5>
          <p class="card-text">{{$newPkmn->level}}</p>
          <div>
            <a href="/editPkmn/{{$newPkmn->id}}" class="btn btn-light border border-muted">Edit</a>
            <a href="/deletePkmn/{{$newPkmn->id}}" class="btn btn-danger">Delete</a>
          </div>
        </div>
  </div>
@endsection
@extends('template')

@section('content')
    <section>
        <h1 class="mt-3">My Pokémons</h1>
        <div class="row">
            @foreach ($pkmnData as $pkmn)
                <div class="col-4">
                    <div class="card text-center p-3" style="width: 18rem; height: 22rem">
                        <img src="{{asset('images/'.$pkmn->src)}}" style="height: 17rem" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a class="card-title" href="/showPkmn/{{$pkmn->id}}">{{$pkmn->name}}</a>
                        </div>
                      </div>
                </div>
                @if ($loop->iteration % 3 == 0 )
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
    </section>
@endsection
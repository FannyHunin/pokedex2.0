@extends('template')

@section('content')
    <h1 class="mb-5">Add a type</h1>
    @if ($errors->any())
        <div class="alert alert-danger w-25">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/storeType" method="post" class="border border-dark rounded p-5 w-25 d-flex justify-content-center flex-column text-center">
        @csrf
        <label for="name">Type's name :
            <input type="text" name="name" id="" value="{{old('name')}}">
        </label>

        <button class="btn btn-danger" type="submit">Add</button>
    </form>

    <div class="row mt-5">
        @foreach ($typeData as $type)
            <div class="col-4 text-center mt-2">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                      {{$type->name}}
                      <div>
                        <a href="/editType/{{$type->id}}" class="btn btn-light border border-muted">Edit</a>
                        <a href="/deleteType/{{$type->id}}" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
            </div>
            @if ($loop->iteration % 3 == 0)
                </div>
                <div class="row">
            @endif
        @endforeach
    </div>
@endsection
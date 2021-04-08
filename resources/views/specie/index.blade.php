@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Rusies pavadinimas:
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($species as $specie)
                        <li class="list-group-item list-element">
                            <div class="content-group list-element__group">
                                <h3 class="list-element__name">{{$specie->name}}</h3>
                            </div>
                            <div class="list-element__buttons">
                                <a class="btncustom" href="{{route('specie.edit', $specie)}}">Pakeisti</a>
                                <form action="{{route('specie.delete', [$specie])}}" method="POST">
                                    @csrf
                                    <button class="btncustom red" type="submit">Istrinti</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

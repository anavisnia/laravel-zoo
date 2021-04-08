@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Priziuretojai:</h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <ul class="list-group">
                            @foreach($managers as $manager)
                            <li class="list-group-item list-element">
                                <div class="content-group list-element-group">
                                    <label class="list-element__group__name">Priziuretojas</label>
                                    <h3>{{$manager->name}} {{$manager->surname}}</h3>
                                    <label class="list-element__group__name">Priziuri</label>
                                    <h4>
                                        @foreach($species as $specie)
                                        @if($manager->specie_id == $specie->id)
                                        {{$specie->name}}
                                        @endif
                                        @endforeach
                                    </h4>
                                </div>
                                <div class="list-element__buttons">
                                    <a class="btncustom" href="{{route('manager.edit', $manager)}}">Pakeisti</a>
                                    <form action="{{route('manager.delete', [$manager])}}" method="POST">
                                        @csrf
                                        <button class="btncustom red" type="submit">Istrinti</button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endsection
                </div>
            </div>
        </div>
    </div>
</div>

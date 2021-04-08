@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Gyvunai:</h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <ul class="list-group">
                            @foreach($animals as $animal)
                            <li class="list-group-item list-element">
                                <div class="content-group list-element-group">
                                    <label class="list-element__group__name">Gyvunas</label>
                                    <h3>{{$animal->name}}, {{$animal->birth_year}}</h3>
                                    <label class="list-element__group__name">Rusys</label>
                                    <h4>
                                        @foreach($species as $specie)
                                        @if($animal->specie_id == $specie->id)
                                        {{$specie->name}}
                                        @endif
                                        @endforeach
                                    </h4>
                                </div>
                                <div class="list-element__buttons">
                                    <a class="btncustom info" href="{{route('animal.pdf', $animal)}}">PDF</a>
                                    <a class="btncustom" href="{{route('animal.edit', $animal)}}">Pakeisti</a>
                                        <form action="{{route('animal.delete', [$animal])}}" method="POST">
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
</div>

@endsection
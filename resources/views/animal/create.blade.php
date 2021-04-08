@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add New Animal
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('animal.store')}}">
                        <div class="form-group">
                            <label>Vardas:</label>
                            <input type="text" class="form-control" name="animal_name" value="{{old('animal_name')}}">
                            <small class="form-text text-muted">Iveskite gyvuno varda</small>
                        </div>

                        <div class="form-group">
                            <label>Gimimo metai:</label>
                            <input type="text" class="form-control" name="animal_birth_year" value="{{old('animal_birth_year')}}">
                            <small class="form-text text-muted">Iveskite gyvuno gimimo metus</small>
                        </div>

                        <div class="form-group">
                            <label>Rusys:</label>
                            <select name="specie_id">
                                @foreach ($species as $specie)
                                <option value="{{$specie->id}}">{{$specie->name}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pasirinkite gyvuno rusi</small>
                        </div>

                        <div class="form-group">
                            <label>Priziuretojas:</label>
                            <select name="manager_id">
                                @foreach ($managers as $manager)
                                <option value="{{$manager->id}}">{{$manager->name}} {{$manager->surname}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pasirinkite gyvuno priziuretoja</small>
                        </div>

                        <div class="form-group">
                            <label>Apie gyvuna:</label>
                            <textarea name="animal_book" id="summernote">{{old('animal_book')}}</textarea>
                            <small class="form-text text-muted">Apie si gyvuna</small>
                        </div>
                        @csrf
                        <button type="submit" class="btncustom">Prideti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });

</script>
@endsection

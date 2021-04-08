@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('manager.update', $manager)}}">
                        <div class="form-group">
                            <label>Vardas:</label>
                            <input type="text" class="form-control" name="manager_name" value="{{old('manager_name', $manager->name)}}">
                            <small class="form-text text-muted">Iveskite priziuretoja varda</small>
                        </div>

                        <div class="form-group">
                            <label>Pavarde:</label>
                            <input type="text" class="form-control" name="manager_surname" value="{{old('manager_surname', $manager->surname)}}">
                            <small class="form-text text-muted">Iveskite priziuretojo pavarde</small>
                        </div>

                        <div class="form-group">
                            <label>Rusys:</label>
                            <select name="specie_id">
                                @foreach ($species as $specie)
                                <option value="{{$specie->id}}" @if($specie->id == $manager->specie_id) selected @endif> {{$specie->name}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Pasirinkite gyvuno rusi</small>
                        </div>
                        @csrf
                        <button type="submit" class="btncustom">Issauguoti</button>
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

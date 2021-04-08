@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Species
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('specie.update', $specie)}}">
                        <div class="form-group">
                            <label>Pavadinimas:</label>
                            <input type="text" class="form-control" name="specie_name" value="{{old('specie_name', $specie->name)}}">
                            <small class="form-text text-muted">Iveskite rusies pavadinima</small>
                        </div>
                        @csrf
                        <button type="submit" class="btncustom">Issaugoti</button>
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

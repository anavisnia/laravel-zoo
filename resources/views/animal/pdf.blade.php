<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{$animal->name}} {{$animal->birth_year}}</title>
        <style>
            @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url({{ asset('fonts/Roboto-Regular.ttf') }});
            }
            @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: bold;
            src: url({{ asset('fonts/Roboto-Bold.ttf') }});
            }
            body {
                font-family: 'Roboto';
            }
        </style>
    </head>
    <body>
        <h1>Apie gyvuna:</h1>
        <h3 style="text-align: center;">{{$animal->name}}, @foreach($species as $specie) @if($animal->specie_id == $specie->id)
            <span style="font-style: italic;">{{$specie->name}}</span> @endif @endforeach
        </h3>
        <div>{!!$animal->animal_book!!}</div>
    </body>
</html>
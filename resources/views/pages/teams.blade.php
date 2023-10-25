<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.menu')

    <div class="container">
        <div class="row">
            <div class="col">
            <h1 class="text-center m-3">Csapatok</h1>
            <div >
                @foreach ($teams as $team)
                    <div class="card shadow p-2 m-2  d-flex flex-row justify-content-end">
                        <div class="col ms-2">
                            <h3>{{$team->name}}</h3>
                            <p>csatár: {{$team->csatar->name}}</p>
                            <p>kapus: {{$team->kapus->name}}</p>
                        </div>

                        <div class="col d-flex flex-row justify-content-end">
                            {!! Form::open(['action' => ['App\Http\Controllers\TeamController@edit', $team->id], 'method' => 'get']) !!}
                            {!! Form::submit('Módosítás', ['class' => 'btn btn-warning p-2 m-2']) !!}
                            {!! Form::close('Módosítás') !!}

                            {!! Form::open(['action' => ['App\Http\Controllers\TeamController@destroy', $team->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Törlés', ['class' => 'btn btn-danger p-2 m-2']) !!}
                            {!! Form::close('Törlés') !!}
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="btn btn-success text-center" href={{ route('teams.create') }}>Csapat hozzáadása</a>

            </div>
        </div>
    </div>
</body>
</html>

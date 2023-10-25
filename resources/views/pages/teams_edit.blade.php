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
        <h1 class="text-center m-3">Csapat hozzáadása</h1>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {!! Form::open(['action' => ['App\Http\Controllers\TeamController@update', $team->id], 'method' => 'put']) !!}
                {!! Form::model($team, ['route' => ['teams.update', $team->id]]) !!}

                {!! Form::label('name', 'Csapat neve:') !!}
                {!!  Form::text('name', $team->name,  ['class' => 'form-control shadow', 'style' => 'width: 300px']) !!}
                <br>
                {!! Form::label('csatar_id', 'Csatár:') !!}
                {!! Form::select('csatar_id', $players, $team->csatar->id) !!}
                <br class="m-2">
                {!! Form::label('kapus_id', 'Kapus:') !!}
                {!! Form::select('kapus_id', $players, $team->kapus->id) !!}
                <br>
                {!!  Form::submit('Játékos hozzáadása', ['class' => 'btn btn-success shadow m-2']) !!}
                {!!  Form::close('Csapat hozzáadása') !!}
            </div>
        </div>
    </div>
</body>
</html>

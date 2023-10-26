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
        <h1 class="text-center m-3">Meccs lejátszása</h1>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {!! Form::open(['action' => ['App\Http\Controllers\GameController@update', $game->id], 'method' => 'put']) !!}
                {!! Form::model($game, ['route' => ['games.update', $game->id]]) !!}
                
                {!! Form::label('team_1_name', $game->team_1->name . ' pontja:', ['class' => 'mt-3 fs-5']) !!}
                {!! Form::number('team_1_score', $game->team_1_score, ['min' => '0', 'max' => 10, 'class' => 'form-control shadow m-2 mx-auto', 'style' => 'width: 80px']) !!}

                {!! Form::label('team_2_name', $game->team_2->name . ' pontja:', ['class' => 'mt-3 fs-5']) !!}
                {!! Form::number('team_2_score', $game->team_2_score, ['min' => '0', 'max' => 10, 'class' => 'form-control shadow m-2 mx-auto', 'style' => 'width: 80px']) !!}
                
                <div class="col">
                    {!! Form::submit('Mentés',  ['class' => 'btn btn-success shadow mt-2 mx-auto', 'style' => 'width: 300px']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>

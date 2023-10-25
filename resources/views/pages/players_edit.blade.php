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
        <h1 class="text-center m-3">Játékos módosítása</h1>

        <div class="row">
            <div class="col d-flex justify-content-center">

                {!! Form::open(['action' => ['App\Http\Controllers\PlayerController@update', $player->id], 'method' => 'put']) !!}

                {!! Form::model($player, ['route' => ['players.update', $player->id]]) !!}

                {!! Form::label('name', 'Játékos neve:') !!}

                {!!  Form::text('name', $player->name,  ['class' => 'form-control shadow', 'style' => 'width: 300px']) !!}

                {!!  Form::submit('Játékos módosítása', ['class' => 'btn btn-success shadow mt-2 ']) !!}
                
                {!! Form::close('Játékos hozzáadása') !!}
            </div>
        </div>
    </div>
</body>
</html>

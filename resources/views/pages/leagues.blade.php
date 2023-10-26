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
                <h1 class="text-center m-3">Bajnokságok</h1>
                <div class="row">
                    <a class="btn btn-success shadow text-center m-2 mx-auto" href={{ route('leagues.create') }} style="width: 300px">Bajnokság hozzáadása</a>
                    @foreach ($leagues as $league)
                        <div class="card shadow p-2 m-2  d-flex flex-row justify-content-end">
                            <div class='col ms-2'>
                                <h3>{{$league->name}}</h3>
                                <span class="badge bg-secondary">Kezdve: {{$league->startDate()}}</span>
                                <br>
                                @if($league->status() =='finished')         
                                    <span class="badge bg-success">Befejezve: {{$league->finishDate()}}</span>
                                    <p>Nyertes csapat: {{$league->winner()->name}}</p>
                                @else
                                    <span class="badge bg-secondary">Befejezettlen</span>     
                                @endif
                            </div>

                            <div class='col d-flex flex-row justify-content-end'>
                                {!! Form::open(['action' => ['App\Http\Controllers\LeagueController@show', $league->id], 'method' => 'get']) !!}
                                {!! Form::submit('Megtekintés', ['class' => 'btn btn-success p-2 m-2']) !!}
                                {!! Form::close() !!}

                                {!! Form::open(['action' => ['App\Http\Controllers\LeagueController@edit', $league->id], 'method' => 'get']) !!}
                                {!! Form::submit('Módosítás', ['class' => 'btn btn-warning p-2 m-2']) !!}
                                {!! Form::close() !!}

                                {!! Form::open(['action' => ['App\Http\Controllers\LeagueController@destroy', $league->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Törlés', ['class' => 'btn btn-danger p-2 m-2']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>

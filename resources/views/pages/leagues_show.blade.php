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
        <div class="row mb-4">
            <div class="col text-center fs-4">
                <h1 class="m-3">{{$league->name}}</h1>
                @if($league->status() =='finished')         
                    <span class="badge bg-success">Befejezve: {{$league->finishDate()}}</span>
                    <p>Nyertes csapat: {{$league->winner()->name}}</p>
                @else
                    <span class="badge bg-secondary">Befejezettlen</span>     
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2 class="text-center">Összes meccsek</h2>
                @foreach ($league->games as $game)
                    <div class="card shadow mb-2 p-1">

                        @if($game->status() == 'played')
                            <span class="badge bg-success m-1">Befejezve: {{$game->updated_at->format('Y.m.d H:i')}}</span>
                        @endif

                        <div class="row align-items-center m-1  pt-1">
                            <div class="col-xl-5 col-lg-12 ">
                                <div class="row align-items-center">
                                    @if($game->team_1_score == 10)         
                                        <span class="badge bg-warning fs-6">{{$game->team_1->name}}</span>
                                    @else
                                        <span class="badge bg-secondary fs-6">{{$game->team_1->name}}</span>    
                                    @endif
                                    <h5 class="text-center">{{$game->team_1_score}}</h5>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-12">
                                <p class="text-center">VS</p>
                            </div>

                            <div class="col-xl-5 col-lg-12">
                                <div class="row align-items-center">
                                    @if($game->team_2_score == 10)         
                                        <span class="badge bg-warning fs-6">{{$game->team_2->name}}</span>
                                    @else
                                        <span class="badge bg-secondary fs-6">{{$game->team_2->name}}</span>    
                                    @endif
                                    <h5 class="text-center">{{$game->team_2_score}}</h5>
                                </div>
                            </div>                            
                        </div>

                        @if($game->status() != 'played')         
                            {!! Form::open(['action' => ['App\Http\Controllers\GameController@edit', $game->id], 'method' => 'get']) !!}
                            {!! Form::submit('Játék', ['class' => 'btn btn-success p-2 m-2']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="col">
                <h2 class="text-center">Toplista</h2>
                <div >
                    @foreach ($league->topList() as $team)
                        <div class="card shadow m-2 p-2">
                            <span class="badge bg-secondary fs-5">{{$team->name}}</span>    
                            <h5 class="text-center">Nyerések száma: {{$team->gamesWon($league->id)}}</h5>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col">
                <h2 class="text-center">Mászó toplista</h2>
                @if ( empty($league->crawlingList()) )
                    <h4 class="text-center text-muted">Senki nem mászott még</h4>
                @else
                    @foreach ($league->crawlingList() as $team)
                        <div class="card shadow m-2 p-2">
                            <span class="badge bg-secondary fs-5">{{$team->name}}</span>    

                            <h5 class="text-center">Mászás száma: {{$team->gamesWon($league->id)}}</h5>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
</html>

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
                    <p>Nyertes csapat: {{$league->winnerOfLeague()}}</p>
                @else
                    <span class="badge bg-secondary">Befejezettlen</span>     
                @endif
            </div>
        </div>


        <div class="row">
            <div class="col">

                <h2 class="text-center">Összes meccsek</h2>

                <div >
                    @foreach ($league->games as $game)
                        <div class="card shadow m-1 p-1">
                            @if($game->status() == 'played')         
                                <p>Befejezve: {{$game->updated_at}}</p> 
                            @endif
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-6 ">
                                    <div class="row align-items-center">
                                    @if($game->team_1_score == 10)         
                                        <span class="badge bg-warning ms-3 me-2">{{$game->team_1->name}}</span>
                                    @else
                                        <span class="badge bg-secondary">{{$game->team_1->name}}</span>    
                                    @endif
                                    <p class="text-center">{{$game->team_1_score}}</p>
                                    </div>

                                </div>


                                <div class="col-lg-2 col-md-6">
                                    <p class="text-center">VS</p>
                                </div>

                                <div class="col-lg-5 col-md-6">

                                    
                                    @if($game->team_2_score == 10)         
                                        <span class="badge bg-warning">{{$game->team_2->name}}</span>
                                    @else
                                        <span class="badge bg-secondary">{{$game->team_2->name}}</span>    
                                    @endif
                                    <br>

                                    <p class="text-center">{{$game->team_2_score}}</p>

                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="col">

                <h2 class="text-center">Toplista</h2>

                <div >
                    @foreach ($league->games as $game)
                        <div class="card shadow m-1 p-1">
                            @if($game->status() == 'played')         
                                <p>Befejezve: {{$game->updated_at}}</p> 
                            @endif
                            
                            <div class="row">
                                <div class="col">

                                    @if($game->team_1_score == 10)         
                                        <span class="badge bg-warning">{{$game->team_1->name}}</span>
                                    @else
                                        <span class="badge bg-secondary">{{$game->team_1->name}}</span>    
                                    @endif
                                    <br>
                                    @if($game->team_2_score == 10)         
                                        <span class="badge bg-warning">{{$game->team_2->name}}</span>
                                    @else
                                        <span class="badge bg-secondary">{{$game->team_2->name}}</span>    
                                    @endif
                                </div>
                                <div class="col">
                                    <p>{{$game->team_1_score}}</p>
                                    <p>{{$game->team_2_score}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col">

                <h2 class="text-center">Mászó toplista</h2>

                <div >
                    @foreach ($league->games as $game)
                        <div class="card shadow m-1 p-1">
                            <h1>1. {{  implode(',', $league->crawlingList()) }}</h1>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>

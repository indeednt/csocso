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
            <div class="col w-75 mx-auto justify-content-center">

            <h1 class="text-center">Csapatok</h1>

            <div >
                @foreach ($teams as $team)
                    <div class="card shadow p-2 m-2  d-flex flex-row justify-content-between align-items-center">
                        <div class="col">
                            <h3>{{$team->name}}</h3>
                            <p>csatár: {{$team->csatar->name}}</p>
                            <p>kapus: {{$team->kapus->name}}</p>

                            <p>mászások száma: {{$team->countCrawls()}}</p>
                        </div>
                        <a class="btn btn-danger p-2" href={{ route('teams.destroy', [$team->id]) }}>Törlés</a>
                    </div>
                @endforeach
            </div>

            <a class="btn btn-success text-center" href={{ route('teams.create') }}>Csapat hozzáadása</a>

            </div>
        </div>
    </div>
</body>
</html>

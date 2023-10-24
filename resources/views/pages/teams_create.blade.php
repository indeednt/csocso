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

            <h1 class="text-center">Csapatok hozzáadása</h1>
                {!! Form::open(['action' => ['App\Http\Controllers\TeamController@store']]) !!}

                {!! Form::label('name', 'Csapat neve:') !!}

                {!!  Form::text('name') !!}

                <br>

                {!! Form::label('csatar', 'Csatár:') !!}

                {!! Form::select('csatarId', ['L' => 'Large', 'S' => 'Small']) !!}

                <br>

                {!! Form::label('kapus', 'Kapus:') !!}

                {!! Form::select('kapusId', ['L' => 'Large', 'S' => 'Small']) !!}
                
                
                <br>
                {!!  Form::submit('Játékos hozzáadása', ['class' => 'btn btn-success shadow m-2']) !!}
                
                
                {!!  Form::close('Játékos hozzáadása') !!}
            </div>
        </div>
    </div>
</body>
</html>

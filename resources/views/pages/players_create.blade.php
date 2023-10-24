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

            <h1 class="text-center">Játékosok</h1>
                {!! Form::open(['action' => ['App\Http\Controllers\PlayerController@store']]) !!}

                {!! Form::label('name', 'Játékos neve:', ['class' => 'awesome']) !!}

                {!!  Form::text('name') !!}

                {!!  Form::submit('Játékos hozzáadása') !!}
                
                {!!  Form::close('Játékos hozzáadása') !!}
            </div>
        </div>
    </div>
</body>
</html>

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

    <h1>Players</h1>

    <label>Játékos neve:</label>
    <br>
    {!!  Form::text('username', 'Péter') !!}

   <!-- {!! Form::model($player, ['route' => ['player.update', $player->id]]) !!} -->

    <a class="btn btn-success" href="/players/add">Játékos hozzáadása</a>

</body>
</html>

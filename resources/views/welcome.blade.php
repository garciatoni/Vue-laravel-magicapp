<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Liber</title>
    <link rel="shortcut icon" type="image/png" href="../resources/js/img/Liber.png"/>


    <link href="css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <app></app>

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

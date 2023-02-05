<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- sempre legal utilizar essa função de asset() pra evitar erros de paginas futuramente --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }} - Controle de Séries</title>
</head>
<body>
    <div class="container">
        <h1>{{ $title }}</h1>

        {{ $slot }}
    </div>
</body>
</html>

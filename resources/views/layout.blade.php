<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Controle de Séries</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
            <a href="{{ route('listar_series') }}" class="navbar-brand">Home</a>
            @auth
            <a href="/sair" class="text-danger">Sair</a>
            @endauth

            @guest
            <a href="/entrar" class="text-info">Entrar</a>
            @endguest
        </nav>
        <div class="container">
            <div class="jumbotron">
                <h1>@yield('titulo')</h1>
            </div>

            @yield('conteudo')
        </div>
        <footer class="mt-1"></footer>
    </body>
</html>
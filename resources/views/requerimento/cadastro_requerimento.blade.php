<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de requerimento</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-sidebar />
    <div class="main-content">
        <x-headerinicio />
        <div id="app">
            <x-requerimento :usuario="$usuario" :sexo="$sexo" :edital="$edital" :cidades="$cidades" :titulo="$titulo"
                :rota="$rota" :requerimento="$requerimento" />
        </div>
    </div>
    <script src="{{ asset('js/inicio.js') }}"></script>
    <script src="{{ asset('js/requerimento.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cadastro - SHI</title>
    <link rel="stylesheet" href="{{ asset('css/editar-usuario.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
<x-sidebar/>

<div class="main-content">
    <x-headerinicio/>
    <main class="flex-grow-1">
        <div id="app">
            <x-form-editar-cadastro :usuario="$usuario"/>
        </div>
    </main>
</div>

<script src="{{ asset('js/validacoes.js') }}"></script>
<script src="{{ asset('js/editar-usuario.js') }}"></script>
</body>

</html>

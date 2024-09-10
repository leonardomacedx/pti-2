<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interpor recurso</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<x-sidebar />
<div class="main-content">
    <x-headerinicio />
    <div id="app" class="container my-5">
        <div class="card">
            <div class="card-body">
                <x-recurso :usuario="$usuario" :protocolo="$protocolo"/>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/recurso.js') }}"></script>
<script src="{{ asset('js/inicio.js') }}"></script>
</body>

</html>


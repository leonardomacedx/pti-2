<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de paciente</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-sidebar/>
<div class="main-content">
    <x-cadastro-paciente/>
</div>

</body>
<script src="{{ asset('js/inicio.js') }}"></script>
</html>

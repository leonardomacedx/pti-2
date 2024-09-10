<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de autenticidade - SHI</title>
    <link rel="stylesheet" href="{{ asset('css/consultar-assinatura.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
<x-header/>

<main class="flex-grow-1">
    <x-form-consultar-assinatura/>
</main>


<script src="{{ asset('js/consulta-publica.js') }}"></script>
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
</body>

</html>

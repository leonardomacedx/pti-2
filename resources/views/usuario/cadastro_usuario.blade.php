<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário - SHI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
    <x-header/>

    <main class="flex-grow-1">
        <x-form-cadastro />
    </main>

    <script src="{{ asset('js/validacoes.js') }}"></script>
    <script src="{{ asset('js/cadastro_usuario.js') }}"></script>
</body>

</html>

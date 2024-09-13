<!-- resources/views/inicio/manutencao.blade.php -->
@php use Carbon\Carbon; @endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar atendimentos</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-sidebar/>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-lg-4">
                <h1 class="text-center my-5 font-weight-bold card-title">Cadastro de Funcionário</h1>
                <form id="form" method="POST" action="/cadastro-usuario/salvar" class="w-90 mx-auto form row">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">
                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="cpf">CPF*</label>
                        <div class="input-group">
                            <input class="form-control form-control-sm cpf" type="text" id="cpf" name="cpf"
                                   required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="999.999.999-99">
                            <button type="button" class="btn btn-secondary" onclick="pesquisarFuncionario()">Pesquisar</button>
                        </div>
                        <small hidden="" id="erro-cpf" class="erro text-danger font-weight-light">*CPF inválido!</small>
                    </div>

                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="nome">Nome Completo*</label>
                        <input class="form-control form-control-sm" type="text" id="nome" name="nome"
                               placeholder="Digite o nome completo" required>
                        <label hidden="" id="erro-nome" class="erro text-danger font-weight-light">*Nome inválido!</label>
                    </div>

                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="senha">Senha*</label>
                        <input class="form-control form-control-sm" type="password" id="senha" name="senha"
                               required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}" placeholder="Digite a senha (mínimo 8 caracteres)">
                        <label hidden="" id="erro-senha" class="erro text-danger font-weight-light">*Senha inválida!</label>
                    </div>

                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="permissao">Permissão*</label>
                        <select class="form-control form-control-sm" id="permissao" name="permissao" required>
                            <option value="2">2 - Médico</option>
                            <option value="3">3 - Atendente</option>
                        </select>
                        <label hidden="" id="erro-permissao" class="erro text-danger font-weight-light">*Permissão inválida!</label>
                    </div>

                    <div class="my-1 text-end">
                        <a type="button" href="{{ route('inicio') }}" class="btn btn-secondary my-4 w-15">Voltar</a>
                        <input type="submit" class="btn btn-primary my-4" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
        @if ($errors->any())
            <div id='error-alert' class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<script>
    function pesquisarFuncionario() {
        const cpf = document.getElementById('cpf').value;
        fetch(`/verificar-usuario?cpf=${cpf}`)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    if (data.permissao == 1) {
                        alert('Não é possível editar o administrador!');
                        return;
                    }
                    document.getElementById('nome').value = data.nome;
                    document.getElementById('form').action = '/editar-usuario/salvar';

                }
            })
            .catch(error => console.error('Erro:', error));
    }
</script>

</body>
<script src="{{ asset('js/inicio.js') }}"></script>
</html>

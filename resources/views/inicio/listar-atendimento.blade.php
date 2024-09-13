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
<div class="main-content">
    <div class="container my-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Atendimentos</h2>
                <a href="{{ route('cadastro-atendimento') }}" class="btn btn-primary">Cadastrar Novo Atendimento</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>CPF</th>
                        <th>Data e Hora</th>
                        {{--                        <th>Nome do Médico</th>--}}
                        {{--                        <th>Tipo de Consulta</th>--}}
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($atendimentos as $atendimento)
                        <tr>
                            <td>{{ $atendimento->id }}</td>
                            <td>{{ $atendimento->cpf }}</td>
                            <td>{{  Carbon::parse($atendimento->data_hora_atendimento)->format('d/m/Y H:i') }}</td>
                            {{--                            <td>{{ $atendimento->nome_medico }}</td>--}}
                            {{--                            <td>{{ $atendimento->tipo_consulta }}</td>--}}
                            <td>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal" data-id="{{ $atendimento->id }}">Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja marcar este atendimento como atendido?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="post" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var form = document.getElementById('deleteForm');
            form.action = '/atendimentos/' + id;
        });
    });
</script>

</body>
<script src="{{ asset('js/inicio.js') }}"></script>
</html>

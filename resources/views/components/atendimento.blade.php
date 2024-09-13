<div class="container my-4 d-flex justify-content-center">
    <div class="card w-50">
        <h2 class="card-header text-center">Atendimento</h2>
        <form class="card-body" method="post" action="/salvar-atendimento">
            @csrf
            <div class="mb-3 form-group">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required value="{{ $cpf }}">
            </div>
            <div class="mb-3 form-group">
                <label for="datahora" class="form-label">Data e Hora</label>
                <input type="datetime-local" class="form-control" id="datahora" name="datahora" required
                       value="{{ $dataHoraAtual }}">
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrar Atendimento</button>
        </form>
    </div>
</div>

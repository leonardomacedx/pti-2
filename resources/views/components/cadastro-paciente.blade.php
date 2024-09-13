<div class="container my-4 d-flex justify-content-center">
    <div class="card w-50">
        <h2 class="card-header text-center">Cadastro de Paciente</h2>
        <form class="card-body" method="post" action="/salvar-paciente">
            @csrf
            <div class="mb-3 form-group">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf"
                       @isset($cpf) value="{{ $cpf }}" @endisset
                       required>
            </div>
            <div class="mb-3 form-group">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3 form-group">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="mb-3 form-group">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 form-group">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <label for="convenio" class="form-label">Convênio</label>
                <input type="text" class="form-control" id="convenio" name="convenio" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
        </form>
    </div>
</div>

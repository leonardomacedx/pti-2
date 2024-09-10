<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="text-center my-5 font-weight-bold card-title">Recuperar senha</h1>

                    <form method="post" onsubmit="return validarForm()" action="/recuperar-senha/salvar">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="cpf"
                                   class="col-md-4 col-form-label text-md-end">CPF</label>
                            <div class="col-md-6">
                                <input id="cpf" type="text"
                                       class="form-control" name="cpf"
                                       required placeholder="999.999.999-99">
                                <label hidden="" id="erro-cpf" class="erro text-danger font-weight-light">*CPF
                                    inválido!</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dtnascimento"
                                   class="col-md-4 col-form-label text-md-end">Data de nascimento</label>
                            <div class="col-md-6">
                                <input id="dtnascimento" type="date" class="form-control" name="dtnascimento">
                                <label hidden="" id="erro-dtnascimento" class="erro text-danger font-weight-light">
                                    *Data inválida!</label>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-around">

                            <a class="btn btn-secondary w-25" href="{{ route('login') }}" type="button">Voltar</a>
                            <input class="btn btn-primary w-50" type="submit" value="Recuperar">
                        </div>

                    </form>
                </div>
            </div>
            @if(session('error'))
                <div id='error-alert' class="alert alert-danger my-3">
                    <ul>
                        <li>{{ session('error') }}</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

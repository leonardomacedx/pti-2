<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-lg-4">
                <h1 class="text-center my-5 font-weight-bold card-title">Cadastro de usuário</h1>
                <form method="POST" onsubmit="return validarForm();" action="/cadastro-usuario/salvar"
                      class="w-90 mx-auto form row">
                    @csrf
                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="nome">Nome Completo*</label>
                        <input class="form-control form-control-sm" type="text" id="nome"
                               name="nome"
                               placeholder="Digite seu nome completo"
                        required>

                        <label hidden="" id="erro-nome" class="erro text-danger font-weight-light">*Nome inválido!</label>
                    </div>

                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="cpf">CPF*</label>
                        <input class="form-control form-control-sm cpf" type="text" id="cpf" name="cpf"
                               required
                               pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="999.999.999-99">
                        <small hidden="" id="erro-cpf" class="erro text-danger font-weight-light">*CPF
                            inválido!</small>
                    </div>

                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="senha">Senha*</label>
                        <input class="form-control form-control-sm" type="password" id="senha" name="senha"
                               required
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}" placeholder="Digite sua senha
                           (mínimo 8 caracteres)">
                        <label hidden="" id="erro-senha" class="erro text-danger font-weight-light">*Senha
                            inválida!</label>
                    </div>

                    <div class="my-1 text-end">
                        <a type="button" href="{{ route('logar') }}"
                           class="btn btn-secondary my-4 w-15">Voltar</a>
                        <input type="submit" class="btn btn-primary my-4" value="Cadastrar">
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

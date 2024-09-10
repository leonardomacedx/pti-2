<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-lg-4">
                <h1 class="text-center my-5 font-weight-bold card-title">Cadastro de usuário</h1>
                <form method="POST" onsubmit="return validarForm();" action="/cadastro-usuario/salvar"
                      class="w-90 mx-auto form row">
                    @csrf
                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="nome_completo">Nome Completo*</label>
                        <input class="form-control form-control-sm" type="text" id="nome_completo"
                               name="nome_completo"
                               placeholder="Digite seu nome completo"
                        required>

                        <label hidden="" id="erro-nome_completo" class="erro text-danger font-weight-light">*Nome inválido!</label>
                    </div>

                    <div class="w-50 my-1">
                        <label class="form-label" for="nome_social">Nome Social</label>
                        <input class="form-control form-control-sm" type="text" id="nome_social"
                               name="nome_social"
                               placeholder="Digite seu nome social (opcional)">

                    </div>

                    <div class="w-50 my-1 ">
                        <label style="font-size: 1.67vh" class="form-label fw-semibold"
                               for="data_nascimento">Data de Nascimento*</label>
                        <input class="form-control form-control-sm" type="date" id="data_nascimento"
                               name="data_nascimento"
                               required>
                        <label hidden="" id="erro-data_nascimento"
                               class="erro text-danger font-weight-light">*Data
                            inválida!</label>
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
                        <label class="form-label fw-semibold" for="telefone">Telefone Celular*</label>
                        <input class="form-control form-control-sm" type="text" id="telefone"
                               name="telefone" required
                               pattern="\(\d{2}\)\d{5}-\d{4}"  placeholder="(99)99999-9999">
                        <label hidden="" id="erro-telefone" class="erro text-danger font-weight-light">*Telefone
                            inválido!</label>
                    </div>

                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="sexo">Sexo*</label>
                        <select id="sexo" class="form-select form-control-sm" name="sexo" required>
                            <option value="" selected>Selecione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                        <label hidden="" id="erro-sexo" class="erro text-danger font-weight-light">*Selecione
                            uma opção!</label>
                    </div>

                    <div class="w-100 my-1">
                        <label class="form-label fw-semibold" for="email">Email*</label>
                        <input class="form-control form-control-sm" type="email" id="email" name="email"
                               required
                               placeholder="Digite seu email">
                        <label hidden="" id="erro-email" class="erro text-danger font-weight-light">*Email
                            inválido!</label>
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

                    <div class="w-50 my-1">
                        <label class="form-label fw-semibold" for="confirmarSenha">Confirme a Senha*</label>
                        <input class="form-control form-control-sm" type="password" id="confirmarSenha"
                               name="confirmarSenha"
                               required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}"
                               placeholder="Repita sua senha">
                        <label hidden="" id="erro-confirmarSenha"
                               class="erro text-danger font-weight-light">*Senhas não coincidem!</label>
                    </div>

                    <div id="passwordHelpBlock" class="form-text">
                        Sua senha precisa ter no mínimo 8 caracteres, uma letra maiúscula, uma letra
                        minúscula, um
                        número e um
                        caractere especial.
                    </div>

                    <div class="my-1 text-end">
                        <a type="button" href="{{ route('login') }}"
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

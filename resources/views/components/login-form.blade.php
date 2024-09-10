<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('/img/Designer.jpeg') }}" alt="Logo" class="mb-3 justify-content-center"
                        style="width: 200px; height: auto;">

                    <p class="mb-4 justify-content-center">ACESSO AO SISTEMA</p>



                    <form method="post" action="/logar">
                        @csrf

                            @if (session('error'))
                            <div id="error-alert" class="alert alert-danger col-12" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div id="success-alert" class="alert alert-success col-12" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <br>
                        <div class="row mb-3">
                            <label for="cpf"
                                class="col-md-4 col-form-label text-md-end">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="cpf" class="form-control " name="cpf"
                                    value="{{ old('cpf') }}" placeholder="999.999.999-99" required autocomplete="cpf"
                                    autofocus>

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <small hidden="" id="erro-cpf" class="erro text-danger font-weight-light">*CPF
                                inválido!</small>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required placeholder="********" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <input name="" id="" class="btn btn-primary w-50" type="submit"
                                value="ENTRAR">
                        </div>

                    </form>
                </div>

            </div>


        </div>
        <script src="{{ asset('js/login.js') }}"></script>
        <script src="{{ asset('js/validacoes.js') }}"></script>
    </div>
</div>

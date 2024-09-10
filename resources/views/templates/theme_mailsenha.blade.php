<body>
<div class="container mt-5">
    <div class="card">
        <!-- Brasão da Empresa -->
        <div class="mx-auto d-block text-center" style="text-align: center">
            <img style="height: auto; width:200px;" src='cid:logo' alt="Logo do TJBA">
        </div>
        <div class="card-body text-start" style="text-align: justify;">
            <!-- Informações adicionais podem ser incluídas aqui -->
            @if($tipo =='Recuperação')
                <h3 style="text-align: center;"><?= $tipo ?> de Senha</h3>
                <p class="card-text">Sua senha foi alterada.</p>
                <p class="card-text">Acesse seu cadastro com a nova senha em: <a
                        href="https://heteroidentificacao.tjba.jus.br/">https://heteroidentificacao.tjba.jus.br/</a>
                <p class="card-text">Senha provisória: <?= $senha ?>. É recomendada a alteração da senha provisória após
                    o primeiro acesso.</p>
            @else
                <h3 style="text-align: center;"><?= $tipo ?> de cadastro</h3>
                <p class="card-text">Seu cadastro foi alterado.</p>
                <p class="card-text">Acesse seu cadastro em: <a href="https://heteroidentificacao.tjba.jus.br/">https://heteroidentificacao.tjba.jus.br/</a>
            @endif
            <p>Esta é uma mensagem automática; favor, não responder este a e-mail.</p>
        </div>
    </div>
</div>
</body>


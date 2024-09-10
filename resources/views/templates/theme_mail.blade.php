@if(!$isEmail) <title>2ª via do protocolo</title> @endif
<body>
    <div class="container mt-5">
        <div class="card">
            <!-- Brasão da Empresa -->
            <div class="mx-auto text-center" style="text-align: center">
                @if($isEmail)
                <img class="d-block" style="height: auto; width:200px;" src='cid:logo' alt="Logo do TJBA">
                @else
                <img class="d-block" style="height: auto; width:200px;" src="{{ asset('img/img/brasao_tjba_vertical_preto.png')  }}" alt="Logo do TJBA">
                    <script>
                        window.onload = function() {
                            window.print();
                        };
                    </script>

                @endif
            </div>
            <div class="card-body text-start" style="text-align: justify;">

                <p><b>Prezado(a) Senhor(a) candidato(a) <?= $nome ?></b></p>

                <p>Informamos que sua solicitação de validação da autodeclaração da condição de pessoa negra foi
                    recebida com sucesso.</p>

                <p><b>Número de Protocolo:</b> <?= $protocolo ?></p>

                <p class="card-text">
                    Atenção: O mero protocolo do pedido não significa que a documentação apresentada já foi devidamente
                    conferida. A verificação do atendimento das exigências documentais, conforme Edital de
                    Heteroidentificação n° <?=$edital?>, será realizada oportunamente pela Comissão e não se confunde com o
                    mero recebimento da solicitação de validação da autodeclaração da condição de pessoa negra.
                </p>

                <p class="card-text">
                    Atente-se: A falta ou envio incorreto de quaisquer dos documentos indicados no edital implica a não
                    validação da condição de pessoa negra, uma vez que restará prejudicada a análise pela Comissão de
                    Heteroidentificação, tendo em vista a não apresentação de documentação obrigatória, conforme
                    disposição do item 2.10 do Edital de Heteroidentificação n° <?=$edital?>.
                </p>

                <p class="card-text">
                    Alteração ou Inclusão de Documentação: Caso necessário, é possível alterar ou incluir documentação
                    após o envio do requerimento, até as <?=$editalhora?> horas do dia <?=$editaldia?> de <?=$editalmes?> de <?=$editalano?>, conforme previsão do item
                    1.4.1 do Edital de Heteroidentificação nº <?=$edital?>.
                </p>


                <!-- Informações adicionais podem ser incluídas aqui -->
                <p>Atenciosamente,</p>
                <p>Comissão de Heteroidentificação do Tribunal de Justiça do Estado da Bahia</p>
                <p>Esta é uma mensagem automática; favor, não responder a este e-mail.</p>
            </div>
        </div>
    </div>
</body>

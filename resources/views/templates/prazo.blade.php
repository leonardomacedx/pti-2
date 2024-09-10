<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
    </script>
    <style>
    .requerid{
        color: red;
    }
    .title-principal{
        background-color:#0270c5;
        color: aliceblue;
    }
    .title-second{
        color: #0a57be;
    }
    .card{
        background-color: #e7f2fa;
    }
    html,body{
        width: 100%;
        height: 100%;
        background: rgb(80,70,236);
        background: linear-gradient(165deg, rgba(80,70,236,1) 2%, rgba(77,69,239,1) 5%, rgba(60,60,255,1) 24%, rgba(171,207,236,1) 100%);
    }
    .custom-file-label::after {
            content: "Selecione um arquivo";
    }
    .form-text {
        display: inherit;
        margin-top: 0px;
    }

    #footer{
        background: url("<?=url('views/img/background-rodape.png')?>") no-repeat;
        background-size: auto;
        background-size: 100% 100%;
        position: relative;
        bottom: 0;
        width: 100%;
        padding: 0.1% 0;
        z-index: 1;
        color: aliceblue;

    }
    #formPrincipal{
        margin-bottom: 10%;
    }
</style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <!-- Brasão da Empresa -->
            <div class="mx-auto d-block text-center" style="text-align: center">
                <img style="height: auto; width:200px;" src='cid:logo' alt="Logo do TJBA">
            </div>
            <div class="card-body text-start" style="text-align: justify;">
                <h5 class="card-title mt-3">REQUERIMENTO DE VALIDAÇÃO DA CONDIÇÃO DE PESSOA AUTODECLARADA NEGRA</h5>
                <br><p><b><?= $msg?></b></p><br>
                <p class="card-text">
Acompanhe o cronograma conforme o Edital nº 01/2024 da Comissão de Heteroindentificação do TJBA, disponível em <a href="https://www.tjba.jus.br/portal/comissao-heteroidentificacao">https://www.tjba.jus.br/portal/comissao-heteroidentificacao</a> .</p>
                <!-- Informações adicionais podem ser incluídas aqui -->
            </div>
        </div>
        <!-- <div class="text-center mt-3">
            <button  class="btn btn-primary btn-print">Imprimir Comprovante</button>
        </div> -->
    </div>
</body>
</html>

@php use Illuminate\Support\Facades\Route; @endphp
    <!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHI- Sistema de Heteroidentificação</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php

    @endphp

<body>
<x-sidebar/>
<div class="main-content">
    <x-headerinicio/>
    <div id="app">
        <div class="container mt-5">
            <h5 class="text-right mb-4">{{ $titulo }}</h5>
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
            @if ($errors->any())
                <div id='error-alert' class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="identificacao-tab" data-bs-toggle="tab" href="#identificacao"
                       role="tab" aria-controls="identificacao" aria-selected="true">Identificação da pessoa
                        candidata</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="edital-tab" data-bs-toggle="tab" href="#edital" role="tab"
                       aria-controls="edital" aria-selected="false">Identificação do Edital</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="domicilio-tab" data-bs-toggle="tab" href="#domicilio" role="tab"
                       aria-controls="domicilio" aria-selected="false">Identificação do domicílio da pessoa
                        candidata</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="documentos-tab" data-bs-toggle="tab" href="#documentos" role="tab"
                       aria-controls="documentos" aria-selected="false">Documentos da pessoa candidata</a>
                </li>
            </ul>

            <form action="{{ $rota }}" id="Formrequerimento" method="POST" enctype="multipart/form-data">
                @csrf
                @if(Route::currentRouteName() == 'editar-requerimento')
                    @method('put')
                @endif
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="identificacao" role="tabpanel"
                         aria-labelledby="identificacao-tab">


                        <div class="card mb-3">
                            <div class="card-body">
                                <div hidden class="mb-3">
                                    <label for="id" class="form-label">Código</label>
                                    <input type="text" disabled class="form-control" value='{{ $usuario->id }}'
                                           id="id" name="idusuarioexterno" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nome_completo" class="form-label">Nome Completo</label>
                                    <input type="text" disabled class="form-control" value='{{ $usuario->name }}'
                                           id="nome_completo" name="nome_completo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" disabled class="form-control" value='{{ $usuario->cpf }}'
                                           id="cpf" name="cpf" required>
                                </div>
                                <div class="mb-3">
                                    <label for="data_nascimento" class="form-label">Data Nascimento</label>
                                    <input type="date" disabled class="form-control"
                                           value='{{ $usuario->dtnascimento }}' id="data_nascimento"
                                           name="data_nascimento"
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" disabled class="form-control" id="email"
                                           value='{{ $usuario->email }}' name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone Celular</label>
                                    <input type="tel" disabled class="form-control" id="telefone" name="telefone"
                                           value='{{ $usuario->telefone }}' required>
                                </div>
                                <div class="mb-3">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <input type="text" disabled class="form-control" id="sexo" name="sexo"
                                           value='{{ $sexo }}' required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="edital" role="tabpanel" aria-labelledby="edital-tab">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="edital2" class="form-label">Edital</label>
                                    <select id="edital2" disabled name="edital2" class="form-select" required>
                                        <option readonly>{{ $edital->numero }}-{{ $edital->descricao }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="domicilio" role="tabpanel" aria-labelledby="domicilio-tab">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="cep" class="form-label">CEP</label>
                                    <div class="input-group">
                                        <input minlength="9" maxlength="9" type="text" class="form-control"
                                               id="cep" name="cep" required
                                               @isset($requerimento) value="{{ $requerimento->dom_cep }}" @endisset
                                               placeholder="Informe o CEP">
                                        @if(Route::currentRouteName() != 'ver-requerimento')
                                            <button type="button" class="btn btn-success"
                                                    onclick="buscarEnderecoPorCEP();">Buscar
                                            </button>
                                        @endif
                                    </div>
                                    <small hidden id="error-cep" class="form-text text-danger mb-2">
                                        *CEP inválido ou não pertence à Bahia.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="logradouro" class="form-label">Logradouro</label>
                                    <input maxlength="255" type="text" class="form-control" id="logradouro"
                                           name="logradouro" required
                                           @isset($requerimento) value="{{ $requerimento->dom_logradouro }}" @endisset
                                           placeholder="Informe o logradouro">
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="number" class="form-control" id="numero" name="numero" required
                                           @isset($requerimento) value="{{ $requerimento->dom_numero_domicilio }}"
                                           @endisset
                                           placeholder="Informe o número do endereço">
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Protocolo</label>
                                    <input type="number" hidden value='{{$requerimento->protocolo}}'
                                           class="form-control" id="protocolo" name="protocolo" required/>


                                </div>
                                <div class="mb-3">
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input maxlength="255" type="text" class="form-control" id="complemento"
                                           name="complemento"
                                           @isset($requerimento) value="{{ $requerimento->dom_complemento }}" @endisset
                                           placeholder="Informe o complemento (opcional)">
                                </div>
                                <div class="mb-3">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input maxlength="255" type="text" class="form-control" id="bairro"
                                           name="bairro" required
                                           @isset($requerimento) value="{{ $requerimento->dom_bairro }}" @endisset
                                           placeholder="Informe o bairro">
                                </div>
                                <div class="mb-3">
                                    <label for="cidade" class="form-label">Cidade da BAHIA</label>
                                    <select class="form-select form-select-sm" name="cidade" id="cidade">
                                        <option value="">Selecione a cidade</option>
                                        @foreach ($cidades as $rowc)
                                            @if($rowc == $requerimento->dom_cidade)
                                                <option selected>{{ $rowc }}</option>
                                            @else
                                                <option>{{ $rowc }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Modal de arquivos -->
                    <div class="modal fade" id="fileTypeModal" tabindex="-1" role="dialog"
                         aria-labelledby="fileTypeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="fileTypeModalLabel">Tipo de Arquivo Inválido</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-danger text-white">
                                    Por favor, selecione um arquivo do tipo PNG, JPEG ou JPG.
                                </div>
                                <div class="modal-footer bg-danger">
                                    <button type="button" class="btn btn-secondary"
                                            style='window.close();' data-bs-dismiss="modal">Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal de arquivos -->
                    <!-- Modal de arquivos -->
                    <div class="modal fade" id="fileTypeModalpdf" tabindex="-1" role="dialog"
                         aria-labelledby="fileTypeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="fileTypeModalLabel">Tipo de Arquivo Inválido</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-danger text-white">
                                    Por favor, selecione um arquivo do tipo PNG, JPEG ,JPG ou PDF.
                                </div>
                                <div class="modal-footer bg-danger">
                                    <button type="button" class="btn btn-secondary"
                                            style='window.close();' data-bs-dismiss="modal">Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal de arquivos -->
                    <!-- Modal de arquivos -->
                    <div class="modal fade" id="fileSizeModal" tabindex="-1" role="dialog"
                         aria-labelledby="fileSizModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="fileSizModalLabel">Tamanho do Arquivo Inválido</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-danger text-white">
                                    Por favor, selecione um arquivo com tamanho máximo de 5MB.
                                </div>
                                <div class="modal-footer bg-danger">
                                    <button type="button" class="btn btn-secondary"
                                            style='window.close();' data-bs-dismiss="modal">Fechar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal de arquivos -->
                    <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
                        <div class="card mb-3">
                            <div class="card-body">
                                <small class="form-text text-muted mb-4">De acordo com o Edital de Heteroidentificação
                                    nº {{ $edital->numero }}, item 2, o requerimento de validação da condição de pessoa
                                    autodeclarada negra deverá ser instruído
                                    com os cinco documentos obrigatórios indicados abaixo. As imagens dos documentos
                                    deverão estar em perfeitas condições, compatíveis com o fenótipo atual da pessoa
                                    candidata,
                                    de forma a permitir a análise da documentação com clareza. A pessoa candidata deve
                                    se atentar
                                    as extensões permitidas para cada tipo de documento.</small>
                                <div class="mb-4 my-3">
                                    <label for="doc_identificacao_colorido" class="form-label">Insira aqui uma
                                        <b>imagem colorida do documento oficial atualizado de identificação com foto (frente e
                                            verso).</b></label>

                                    <div class="input-group">
                                        <input type="file" class="form-control doc-input" id="doc_identificacao_colorido"
                                               name="doc_identificacao_colorido"
                                               accept="image/png,image/jpeg,image/jpg,application/pdf">
                                        <a type="button" class="btn btn-outline-secondary doc-button"
                                           href="{{ route('abrir-docs', ['id' => $requerimento->protocolo, 'doc' => 'doc_identificacao_colorido']) }}"
                                           target="_blank">
                                            Visualizar
                                        </a>
                                    </div>
                                    <small class="form-text text-muted mb-2">Os documentos podem estar no formato PDF, JPEG, JPG ou
                                        PNG.</small><br>
                                    <small class="form-text text-muted mb-2">Serão aceitos como documentos de identidade oficiais
                                        válidos com foto aqueles que bem identifiquem o(a) candidato(a), de forma atualizada, por
                                        exemplo: carteiras e/ou cédulas de identidade expedidas pelas Secretarias de Segurança
                                        Pública, pelas Forças Armadas, pelo Ministério das Relações Exteriores e pela Polícia
                                        Militar; cédula de identidade para estrangeiros; carteiras expedidas por órgãos
                                        fiscalizadores de exercício profissional (ordens, conselhos etc.); passaporte; Carteira de
                                        Trabalho e Previdência Social, bem como Carteira Nacional de Habilitação (com fotografia na
                                        forma da Lei nº 9.503/1997); e outras carteiras funcionais expedidas por órgão público que,
                                        por lei federal, valham como identidade.</small>
                                </div>

                                <div class="mb-4 my-3">
                                    <label for="doc_comprovante_domicilio" class="form-label">Insira aqui o seu
                                        <b>comprovante de domicílio.</b></label>

                                    <div class="input-group">
                                        <input type="file" class="form-control doc-input" id="doc_comprovante_domicilio"
                                               name="doc_comprovante_domicilio"
                                               accept="image/png,image/jpeg,image/jpg,application/pdf">
                                        <a type="button" class="btn btn-outline-secondary doc-button"
                                           href="{{ route('abrir-docs', ['id' => $requerimento->protocolo, 'doc' => 'doc_comprovante_domicilio']) }}"
                                           target="_blank">
                                            Visualizar
                                        </a>
                                    </div>
                                    <small class="form-text text-muted mb-2">Os documentos podem estar no formato PDF, JPEG, JPG ou
                                        PNG.</small><br>
                                    <small class="form-text text-muted mb-2">O comprovante de domicílio deve ser atualizado, ou
                                        seja, expedido há menos de 01 (um) ano, em nome próprio ou, sendo em nome de terceiro,
                                        acompanhado de declaração assinada por esse terceiro, com a respectiva firma reconhecida.

                                        O domicílio da pessoa candidata não é presumido pelo domicílio de cônjuge ou parente. Em
                                        qualquer situação em que o comprovante de domicílio não esteja no nome da pessoa candidata,
                                        deve ser enviado, além do comprovante, a declaração, com firma reconhecida, da pessoa cujo
                                        nome consta no comprovante. Esta declaração NÃO poderá ser substituída por certidão de
                                        casamento ou grau de parentesco.</small>
                                </div>


                                <div class="mb-4 my-3">
                                    <label for="doc_foto_colorida_frente" class="form-label">Insira aqui a sua
                                        <b>foto colorida de frente.</b></label>

                                    <div class="input-group">
                                        <input type="file" class="form-control doc-input" id="doc_foto_colorida_frente"
                                               name="doc_foto_colorida_frente" accept="image/png,image/jpeg,image/jpg">
                                        <a type="button" class="btn btn-outline-secondary doc-button"
                                           href="{{ route('abrir-docs', ['id' => $requerimento->protocolo, 'doc' => 'doc_foto_colorida_frente']) }}"
                                           target="_blank">
                                            Visualizar
                                        </a>
                                    </div>
                                    <small class="form-text text-muted mb-2">Os documentos podem estar no formato JPEG, JPG ou
                                        PNG.</small><br>
                                    <small class="form-text text-muted mb-2">
                                        1. O ambiente deve ser bem iluminado;<br>
                                        2. O fundo da foto deve ser branco, sem exposição de objetos;<br>
                                        3. O(A) candidato(a) deve manter postura corporal reta e cabelo solto;<br>
                                        4. O(A) candidato(a) não deve estar de cabeça baixa, nem de cabeça erguida, ou seja, deve
                                        olhar para a frente;<br>
                                        5. O(A) candidato(a) não deve usar acessórios (exemplo: óculos, chapéus, bonés, lenços etc.)
                                        ou trajar roupas que
                                        dificultem a identificação dos seus traços fenotípicos;<br>
                                        6. O(A) candidato(a) não deverá usar qualquer tipo de maquiagem;<br>
                                        7. Não deve haver qualquer tipo de edição ou filtro. <br>
                                    </small>
                                </div>

                                <div class="mb-4 my-3">
                                    <label for="doc_foto_colorida_lateral" class="form-label">Insira aqui a sua
                                        <b>foto colorida de perfil.</b></label>
                                    <div class="input-group">
                                        <input type="file" class="form-control doc-input" id="doc_foto_colorida_lateral"
                                               name="doc_foto_colorida_perfil" accept="image/png,image/jpeg,image/jpg">
                                        <a type="button" class="btn btn-outline-secondary doc-button"
                                           href="{{ route('abrir-docs', ['id' =>$requerimento->protocolo, 'doc' => 'doc_foto_colorida_perfil']) }}"
                                           target="_blank">
                                            Visualizar
                                        </a>
                                    </div>
                                    <small class="form-text text-muted mb-2">Os documentos podem estar no formato JPEG, JPG ou
                                        PNG.</small><br>
                                    <small class="form-text text-muted mb-2">
                                        1. O ambiente deve ser bem iluminado;<br>
                                        2. O fundo da foto deve ser branco, sem exposição de objetos;<br>
                                        3. O(A) candidato(a) deve manter postura corporal reta e cabelo solto;<br>
                                        4. O(A) candidato(a) não deve estar de cabeça baixa, nem de cabeça erguida, ou seja, deve
                                        olhar para a frente;<br>
                                        5. O(A) candidato(a) não deve usar acessórios (exemplo: óculos, chapéus, bonés, lenços etc.)
                                        ou trajar roupas que
                                        dificultem a identificação dos seus traços fenotípicos;<br>
                                        6. O(A) candidato(a) não deverá usar qualquer tipo de maquiagem;<br>
                                        7. Não deve haver qualquer tipo de edição ou filtro. <br>
                                    </small>
                                </div>

                                <div class="mb-4 my-3">
                                    <label for="doc_autodeclaracao_pessoa_negra" class="form-label">Insira aqui a sua
                                        <b>autodeclaração de pessoa negra.</b></label>

                                    <div class="input-group">
                                        <input type="file" class="form-control doc-input" id="doc_documento_original"
                                               name="doc_autodeclaracao_pessoa_negra"
                                               accept="image/png,image/jpeg,image/jpg,application/pdf">
                                        <a type="button" class="btn btn-outline-secondary doc-button"
                                           href="{{ route('abrir-docs', ['id' => $requerimento->protocolo, 'doc' => 'doc_autodeclaracao_pessoa_negra']) }}"
                                           target="_blank">
                                            Visualizar
                                        </a>
                                    </div>
                                    <small class="form-text text-muted mb-2">Os documentos podem estar no formato PDF, JPEG,
                                        JPG ou PNG.</small><br>
                                    <small class="form-text text-muted mb-2">Autodeclaração conforme quesito de cor ou raça
                                        utilizado pelo Instituto Brasileiro de Geografia e Estatística (IGBE), consoante modelo do
                                        Edital de Heteroidentificação nº {{ $edital->numero }} .

                                        A pessoa candidata deve se atentar ao preenchimento completo do documento: nome; tipo de
                                        documento oficial de identificação; número do documento oficial; data e, principalmente, a
                                        assinatura. O documento oficial de identificação informado no formulário de autodeclaração
                                        deve ser o mesmo informado no cadastro e enviado como documento para análise.
                                        <a href='/modelodeclaracao' target="_blank">Clique aqui para baixar</a> o modelo padrão da
                                        autodeclaração.
                                    </small>
                                </div>

                                <br>
                                <div id='dados'>


                                </div>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-left mt-3 d-flex justify-content-lg-start my-2">

                    <a type="button" class="btn btn-danger me-2" href="{{ route('inicio') }}">Voltar</a>
                    @if(Route::currentRouteName() != 'ver-requerimento')
                        <button type="button" id='btnedt' class="btn btn-primary" onclick="validarFormEditar();">Salvar</button>

                    @endif

                </div>
                <div id="mensagem" style="display: none;color:red;">Aguarde...</div>
            </form>

        </div>
    </div>
</div>
<script src="{{ asset('js/inicio.js') }}"></script>
<script src="{{ asset('js/requerimento.js') }}"></script>

</body>

</html>

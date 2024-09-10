<div class="form-container">

    <div class="d-flex justify-content-between">
        <h2>Lista de Requerimentos</h2>
        <div class="row group">
            <button type="button" onclick="location='cadastro-requerimento'" class="btn btn-success">Novo Requerimento
            </button>
        </div>
    </div>

    <div class="row group justify-content-between">
        <div class="w-50">
            <x-select :editais="$editais"></x-select>
        </div>

        <div id="error-alert-recurso" class="alert alert-danger w-25 my-3" role="alert" style="display: none;"></div>

        @if(session('semEditais'))
            <div id="error-alert" class="alert alert-danger w-25 my-3" role="alert">
                {{ session('semEditais') }}
            </div>
        @endif
        @if(session('success'))
        <div id="error-alert" class="alert alert-success w-25 my-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
    <div id="error-alert" class="alert alert-danger w-25 my-3" role="alert">
        {{ session('error') }}
    </div>
@endif
    </div>


    <x-table-requerimentos/>

    <!-- Modal -->
    <div class="modal fade" id="recursoModal" tabindex="-1" aria-labelledby="recursoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recursoModalLabel">Recurso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="recursoModalBody">
                    <!-- O texto do recurso será inserido aqui -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="{{ asset('js/inicio.js') }}"></script>

<!-- resources/views/components/recurso.blade.php -->

<form id="recursoForm" action="/recurso/salvar" method="POST" onsubmit="return validateForm()">
    @csrf
    <input type="hidden" name="usuario_id" value="{{ $usuario }}">
    <input type="hidden" name="protocolo" value="{{ $protocolo }}">

    <div class="mb-3">
        <label for="recurso" class="form-label my-3"><b>Apresente aqui suas razões de recurso:</b></label>
        <textarea id="recurso" name="recurso" class="form-control" maxlength="4000" rows="10" oninput="updateCharCount()" required></textarea>
        <small id="charCount" class="form-text text-muted">0/4000 caracteres</small>
    </div>

    <button type="button" class="btn btn-primary" onclick="checkRecursoBeforeModal()">Enviar Recurso</button>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Envio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    O recurso, uma vez enviado, não poderá ser editado. Confirma a ação?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="confirmar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="{{ asset('js/inicio.js') }}"></script>
<div class="row">

    <div class="form-group col-md-6">
        <label for="edital">Edital *</label>
        <select class="form-control" name="edital" id="edital">
            <option value="">Todos</option>
            @foreach ($editais as $rowe)
                <option>{{ $rowe->numero }}-{{ $rowe->descricao }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="status">Situação *</label>
        <select class="form-control" name="status" id="status">
            <option value="">Todos</option>
            <option>Requerimento recebido</option>
            <option>Aguardar videoconferência</option>
            <option>Recurso interposto</option>
            <option>Encerrado</option>
        </select>
    </div>
</div>
<div class="form-buttons">
    <button type="reset" onclick="location='/inicio'" id="limparFiltros" class="btn btn-danger">Limpar</button>
    <button type="button" onclick='Pesquisar();'class="btn btn-primary">Pesquisar</button>
</div>

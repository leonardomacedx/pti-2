<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card my-lg-4">
                <h1 class="text-center my-5 font-weight-bold card-title">Consulta Pública</h1>
                <form id="consulta-form" class="mx-auto form row form-container">
                    @csrf
                    <div class="col-md-8 my-1">
                        <label class="form-label fw-semibold" for="codigo">Código de Autenticidade*</label>
                        <input class="form-control form-control-sm" type="text" id="codigo" name="codigo" required>
                    </div>

                    <div class="col-md-8 my-1">
                        <label class="form-label fw-semibold">Tipo*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="parecer" name="tipo" value="parecer" checked required>
                            <label class="form-check-label" for="parecer">Consulta parecer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="parecer_recursal" name="tipo" value="parecer_recursal" required>
                            <label class="form-check-label" for="parecer_recursal">Consulta parecer recursal</label>
                        </div>
                    </div>

                    <div class="col-md-12 my-1 d-flex justify-content-between">
                        <a type="button" href="/" id="voltar" class="btn btn-secondary my-4">Voltar</a>
                        <button type="button" id="consultar" class="btn btn-primary my-4">Consultar</button>
                    </div>
                </form>

                <div id="resultado" class="table-container"></div>
            </div>
        </div>
    </div>
</div>

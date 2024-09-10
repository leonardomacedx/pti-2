document.getElementById('consulta-form').addEventListener('submit', function (e) {
    e.preventDefault();
    document.getElementById('consultar').click();
});

document.getElementById('consultar').addEventListener('click', function (e) {
    e.preventDefault();

    let codigo = document.getElementById('codigo').value;
    if (!validarCodigo(codigo)) return; // Se o código não for válido, interrompe a execução
    let tipo = document.querySelector('input[name="tipo"]:checked').value;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url: '/consultar-assinatura',
        type: 'POST',
        data: {
            codigo: codigo,
            tipo: tipo,
            _token: csrfToken
        },
        dataType: "json",
        success: function (data) {
            let resultadoDiv = document.getElementById('resultado');
            if (data.error) {
                resultadoDiv.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
            } else if (!data.assinantes || data.assinantes.length === 0) {
                resultadoDiv.innerHTML = `<div class="alert alert-warning">Nenhum dado encontrado.</div>`;
            } else {
                let resultadoHtml = `
                <div class="table-responsive d-flex justify-content-center">
                    <table class="table table-striped rounded mx-auto">
                        <thead>
                            <tr>
                                <th scope="col">Assinante</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Data/Hora</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                `;
                data.assinantes.forEach((assinante) => {
                    let dataHora = new Date(assinante.datahora_assinatura || assinante.data_hora_assinatura);
                    let formattedDate = dataHora.toLocaleString('pt-BR', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: false
                    }).replace(',', ' -');

                    resultadoHtml += `
                        <tr>
                            <td>${assinante.pes_nome}</td>
                            <td>${assinante.pes_cargo}</td>
                            <td>${formattedDate}</td>
                            <td>${assinante.descricao}</td>
                        </tr>
                    `;
                });
                resultadoHtml += `
                        </tbody>
                    </table>
                </div>
                `;
                resultadoDiv.innerHTML = resultadoHtml;
            }
        },
        error: function (xhr, status, error) {
            console.error('Erro ao consultar assinatura:', error);
        }
    });
});

function validarCodigo(codigo) {
    if (codigo === '') {
        alert('Informe o código da consulta pública');
        return false;
    }
    return true;
}

function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.classList.toggle("show");
}

function adjustTableHeight() {
    const tableDiv = document.querySelector('.table-responsive');
    tableDiv.style.overflow = 'visible';
}

function Pesquisar() {
    let edital = document.getElementById('edital').value;
    let status = document.getElementById('status').value;
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url: '/buscainscricoes',
        type: 'GET',
        data: {
            edital: edital,
            status: status
        },
        dataType: "json",
        success: function (data) {
            let tableContent = '';
            if (data.length === 0) {
                tableContent = `
                    <tr>
                        <td colspan="6" class="text-center">Não foram encontrados requerimentos com os filtros selecionados.</td>
                    </tr>`;
            } else {
                for (let i = 0; i < data.length; i++) {
                    let rowi = data[i];
                    tableContent += `
                        <tr>
                            <th scope="row">${rowi.protocolo}</th>
                            <td>${rowi.numero}-${rowi.descricao}</td>
                            <td>${formatDate(rowi.created_at)}</td>
                            <td>${formatDate(rowi.updated_at)}</td>
                            <td>${rowi.valorstatus}</th>
                            <td>
                                <div class="dropdown dropup">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton${i}" data-bs-toggle="dropdown" aria-expanded="false" onclick="adjustTableHeight()">
                                        Ações
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${i}">
                                        <li class="dropdown-header dropdown-header-black">REQUERIMENTO</li>
                                        <li>
                                            <form action='/requerimento/visualizar' method='post'>
                                                <input type='hidden' name='_token' value='${csrfToken}'>
                                                <input type='hidden' name='protocolo' id='protocolo${i}' value='${rowi.protocolo}' />
                                                <button type='submit' class="dropdown-item">Visualizar</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action='/requerimento/editar' method='post'>
                                                <input type='hidden' name='_token' value='${csrfToken}'>
                                                <input type='hidden' name='protocolo' value='${rowi.protocolo}' />
                                                <input type='hidden' name='idedital' value='${rowi.idedital}' />
                                                <button type='submit' class="dropdown-item">Editar</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action='/requerimento/protocolo' method='post'  target="_blank">
                                                <input type='hidden' name='_token' value='${csrfToken}'>
                                                <input type='hidden' name='protocolo' value='${rowi.protocolo}' />
                                                <input type='hidden' name='edital' value='${rowi.idedital}' />
                                                <input type='hidden' name='usuario' value='${rowi.protocolo}' />
                                                <button type='submit' class="dropdown-item">Segunda via do protocolo</button>
                                            </form>
                                        </li>
                                        ${statusEncerrado(rowi.parecer, rowi.status_id, csrfToken, rowi.protocolo,
                        rowi.idusuarioexterno, rowi.idedital, rowi.recurso)}
                                    </ul>
                                </div>
                            </td>
                        </tr>`;
                }
            }

            $("#tbreq").html(tableContent);
            addEventListeners(); // Adiciona os eventos de clique após atualizar a tabela
        },
        error: function (xhr, status, error) {
            console.error('Erro ao buscar inscrições:', error);
        }
    });
}

function statusEncerrado(parecer, status, token, protocolo, usuario, edital, recurso) {
    let buttonsEncerrado = '';
    if (status == 9 || status >= 14) {
        // buttonsEncerrado += `
        //     <li>
        //         <form action='/requerimento/download' method='post'>
        //             <input type='hidden' name='_token' value='${token}'>
        //             <input type='hidden' name='protocolo' value='${protocolo}' />
        //             <button type='submit' class="dropdown-item">Download do Parecer</button>
        //         </form>
        //     </li>`;
        if ([2, 3, 4].includes(parecer)) {
            buttonsEncerrado += `
            <li><hr class="dropdown-divider"></li>
            <li class="dropdown-header dropdown-header-black">RECURSO</li>
            ${interporOuVisualizarRecurso(token, protocolo, usuario,edital, recurso)}
            `;
        }
    }
    return buttonsEncerrado;
}

function interporOuVisualizarRecurso(token, protocolo, usuario, edital, recurso) {
    let buttonRecurso = '';
    if (recurso == null) {
        buttonRecurso += `
            <li>
                <form action='/recurso' method='post'>
                    <input type='hidden' name='_token' value='${token}'>
                    <input type='hidden' name='protocolo' value='${protocolo}' />
                    <input type='hidden' name='usuario' value='${usuario}' />
                    <input type='hidden' name='idedital' value='${edital}' />
                    <button type='submit' class="dropdown-item">Interpor recurso</button>
                </form>
            </li>`;
    } else {
        buttonRecurso += `
            <li>
                <form>
                    <button type='button' class="dropdown-item btn-visualizar-recurso" data-recurso='${recurso.texto_recurso}'>Visualizar
                    </button>
                </form>
            </li>`;

        // if (recurso.status_id == 18) {
        //     buttonRecurso += `
        //     <li>
        //         <form action='/recurso/download' method='post'>
        //             <input type='hidden' name='_token' value='${token}'>
        //             <input type='hidden' name='protocolo' value='${protocolo}' />
        //             <button type='submit' class="dropdown-item">Download do Parecer</button>
        //         </form>
        //     </li>`;
        // }
    }

    return buttonRecurso;
}

function showRecursoModal(textoRecurso) {
    const modalBody = document.getElementById('recursoModalBody');
    modalBody.innerHTML = textoRecurso;
    $('#recursoModal').modal('show');
}

function addEventListeners() {
    document.querySelectorAll('.btn-visualizar-recurso').forEach(button => {
        button.addEventListener('click', function () {
            const textoRecurso = this.getAttribute('data-recurso');
            if (textoRecurso === '') {
                const errorAlert = document.getElementById('error-alert-recurso');
                errorAlert.innerHTML = 'Não existe recurso vinculado a esta inscrição.';
                errorAlert.style.display = 'block';

                setTimeout(function () {
                 errorAlert.style.display = 'none';
                }, 5000);

                return;
            }
            showRecursoModal(textoRecurso);
        });
    });
}

function formatDate(dateString) {
    // Verifica se o valor é uma string de data válida
    if (!dateString) return '-';

    let date = new Date(dateString);
    let day = String(date.getDate()).padStart(2, '0');
    let month = String(date.getMonth() + 1).padStart(2, '0'); // O mês é 0-indexado
    let year = date.getFullYear();

    return `${day}/${month}/${year}`;
}

document.addEventListener('DOMContentLoaded', function () {
    var alertElement = document.getElementById('error-alert');
    if (alertElement) {
        setTimeout(function () {
            alertElement.style.display = 'none';
        }, 5000); // 5000 ms = 5 segundos
    }
});

function abrirSidebar() {
    var sidebar = document.getElementById('sidebar');
    var mainContent = document.querySelector('.main-content');
    var footer = document.querySelector('.footer');


    if (window.innerWidth <= 768) {
        sidebar.classList.toggle('show');

    } else {
        sidebar.classList.toggle('hide');
    }
    mainContent.classList.toggle('ajustado');
    footer.classList.toggle('ajustado');
}

// public/js/inicio.js

// function showRecursoModal(protocolo) {
//     let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//
//     $.ajax({
//         url: '/recurso/visualizar',
//         type: 'POST',
//         data: {
//             _token: csrfToken,
//             protocolo: protocolo
//         },
//         success: function (data) {
//             const modalBody = document.getElementById('recursoModalBody');
//             modalBody.innerHTML = data.texto_recurso;
//             $('#recursoModal').modal('show');
//         },
//         error: function (xhr, status, error) {
//             const errorAlert = document.getElementById('error-alert-recurso');
//             if (xhr.status === 404) {
//                 errorAlert.innerHTML = 'Não existe recurso vinculado a esta inscrição.';
//             } else {
//                 errorAlert.innerHTML = 'Erro ao obter o texto do recurso.';
//             }
//             errorAlert.style.display = 'block';
//             setTimeout(function () {
//                 errorAlert.style.display = 'none';
//             }, 5000);
//         }
//     });
// }

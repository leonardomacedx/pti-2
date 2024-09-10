function validarForm() {

    var botao = document.getElementById("enviar");
    var mensagem = document.getElementById("mensagem");

    botao.disabled = true;
    mensagem.style.display = "block";
    mensagem.textContent = "Aguarde...";

    var selectedital = document.getElementById("edital2");
    var Valoredital = selectedital.options[selectedital.selectedIndex].text;
    if (Valoredital === 'Selecione o edital') {
        alert('É necessário selecionar um edital.');
        document.getElementById("edital2").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var selectcidade = document.getElementById("cidade");
    var Valorcidade = selectcidade.options[selectcidade.selectedIndex].text;
    if (Valorcidade === 'Selecione a cidade') {
        alert('É necessário selecionar uma cidade.');
        document.getElementById("cidade").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var cep = document.getElementById("cep").value;
    if (cep === '') {
        alert('É necessário preencher o CEP.');
        document.getElementById("cep").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var logradouro = document.getElementById("logradouro").value;
    if (logradouro === '') {
        alert('É necessário preencher o logradouro.');
        document.getElementById("logradouro").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var numero = document.getElementById("numero").value;
    if (numero === '') {
        alert('É necessário preencher o número.');
        document.getElementById("numero").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var bairro = document.getElementById("bairro").value;
    if (bairro === '') {
        alert('É necessário preencher o bairro.');
        document.getElementById("bairro").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var doc_identificacao_colorido = document.getElementById("doc_identificacao_colorido").files.length;
    if (doc_identificacao_colorido === 0) {
        alert('É necessário anexar o documento de identificação colorido.');
        document.getElementById("doc_identificacao_colorido").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var doc_comprovante_domicilio = document.getElementById("doc_comprovante_domicilio").files.length;
    if (doc_comprovante_domicilio === 0) {
        alert('É necessário anexar o comprovante de domicílio.');
        document.getElementById("doc_comprovante_domicilio").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var doc_foto_colorida_frente = document.getElementById("doc_foto_colorida_frente").files.length;
    if (doc_foto_colorida_frente === 0) {
        alert('É necessário anexar a foto colorida de frente.');
        document.getElementById("doc_foto_colorida_frente").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var doc_foto_colorida_lateral = document.getElementById("doc_foto_colorida_lateral").files.length;
    if (doc_foto_colorida_lateral === 0) {
        alert('É necessário anexar a foto colorida de perfil/lateral.');
        document.getElementById("doc_foto_colorida_lateral").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var doc_documento_original = document.getElementById("doc_documento_original").files.length;
    if (doc_documento_original === 0) {
        alert('É necessário anexar o documento original.');
        document.getElementById("doc_documento_original").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var checkbox = document.getElementById('aceite');
    if (!checkbox.checked) {
        alert('É necessário marcar o aceite no fim da página de Documentos requerente.');
        document.getElementById("aceite").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    document.getElementById("Formrequerimento").submit();
}


function formatarCEP(input) {

    let CepAtu = input.value.replace(/\D/g, "");
    if (CepAtu.length > 5) {
        CepAtu = CepAtu.replace(/(\d{5})(\d)/, "$1-$2");
    }
    input.value = CepAtu;
}

document.getElementById("cep").addEventListener("input", function () {
    formatarCEP(this);
});

function buscarEnderecoPorCEP() {
    document.getElementById('cep').classList.remove('is-invalid');
    document.getElementById('error-cep').hidden = true;
    let cep = document.getElementById("cep").value.replace(/\D/g, "");

    if (cep.length === 8) {

        let url = `https://viacep.com.br/ws/${cep}/json/`;

        let xhr = new XMLHttpRequest();
        xhr.open("GET", url, true);

        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                let endereco = JSON.parse(xhr.responseText);
                if (endereco.uf == 'BA') {
                    console.log(endereco);
                    document.getElementById("logradouro").value =
                        endereco.logradouro || "";
                    document.getElementById("bairro").value = endereco.bairro || "";
                    document.getElementById("cidade").value =
                        endereco.localidade || "";
                    return true;
                } else {
                    document.getElementById("logradouro").value = "";
                    document.getElementById("bairro").value = "";
                    document.getElementById("cidade").value = "";


                    document.getElementById('error-cep').hidden = false;
                    document.getElementById('cep').classList.add('is-invalid');
                    return false;
                }

            }
        };

        xhr.onerror = function () {
            console.log("Erro na requisição AJAX");
        };


        xhr.send();
    } else {
        document.getElementById('error-cep').hidden = false;
        document.getElementById('cep').classList.add('is-invalid');
        document.getElementById('logradouro').value = "";
        document.getElementById('numero').value = "";
        document.getElementById('complemento').value = "";
        document.getElementById('bairro').value = "";
        document.getElementById('cidade').value = "";
    }

}

// Função para verificar tipo e tamanho do arquivo
function validarArquivo(fileInput) {
    var file = fileInput.files[0];
    var allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
    var maxSize = 5 * 1024 * 1024; // 5MB em bytes

    if (file) {
        // Verificar tipo do arquivo
        if (!allowedTypes.includes(file.type)) {
            $('#fileTypeModal').modal('show');
            fileInput.value = ''; // Limpar o valor do input
            return false;
        }

        // Verificar tamanho do arquivo
        if (file.size > maxSize) {
            $('#fileSizeModal').modal('show'); // Mostrar modal de tamanho máximo excedido
            fileInput.value = ''; // Limpar o valor do input
            return false;
        }
    }

    return true;
}

function validarArquivopdf(fileInput) {
    var file = fileInput.files[0];
    var allowedTypes = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];
    var maxSize = 5 * 1024 * 1024; // 5MB em bytes

    if (file) {
        // Verificar tipo do arquivo
        if (!allowedTypes.includes(file.type)) {
            $('#fileTypeModalpdf').modal('show');
            fileInput.value = ''; // Limpar o valor do input
            return false;
        }

        // Verificar tamanho do arquivo
        if (file.size > maxSize) {
            $('#fileSizeModal').modal('show'); // Mostrar modal de tamanho máximo excedido
            fileInput.value = ''; // Limpar o valor do input
            return false;
        }
    }

    return true;
}

// Adicionar eventos de change para cada input de arquivo
document.getElementById('doc_identificacao_colorido').addEventListener('change', function (event) {
    validarArquivopdf(event.target);
});

document.getElementById('doc_comprovante_domicilio').addEventListener('change', function (event) {
    validarArquivopdf(event.target);
});

document.getElementById('doc_foto_colorida_frente').addEventListener('change', function (event) {
    validarArquivo(event.target);
});

document.getElementById('doc_foto_colorida_lateral').addEventListener('change', function (event) {
    validarArquivo(event.target);
});

document.getElementById('doc_documento_original').addEventListener('change', function (event) {
    validarArquivopdf(event.target);
});

document.getElementById('edital2').addEventListener('change', function () {
    var selectedValue = this.value;
    var numeroEdital = this.value.split('-')[0];
    var divContent;
    divContent = `
            <p id='parag'>Este formulário consiste em requerimento de validação da condição de pessoa autodeclarada
            negra, na forma do Edital de Abertura Nº: ` + selectedValue + ` , para fins de participação do Exame
            Nacional da Magistratura.
            Lembre-se de conferir todos os seus dados antes de enviar as suas respostas.</p>
            <br>
            <div class="form-check">
                <label id='labelcheck' class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="aceite" id="aceite"
                        value="checkedValue" unchecked onclick="habilitarEnviar()">
                    Venho requerer, na forma de item do Edital de Abertura Nº: ` + selectedValue + `, a validação da condição de pessoa autodeclarada negra.
                </label>
            </div>`;

    if (selectedValue == '') {
        document.getElementById('dados').innerHTML = '';
        document.getElementById('enviar').setAttribute('hidden', true);
    } else {
        document.getElementById('dados').innerHTML = divContent;
        document.getElementById('editalAutoDeclaracao').innerHTML = numeroEdital;
        document.getElementById('editalInicial').innerHTML = numeroEdital;
    }
});

function habilitarEnviar() {
    let check = document.getElementById('aceite');
    if (check.checked) {
        document.getElementById('enviar').removeAttribute('hidden');
    } else {
        document.getElementById('enviar').setAttribute('hidden', true);
    }
}

document.getElementById('cep').addEventListener('input', function (e) {
    // Remove qualquer caractere não numérico
    let value = this.value.replace(/\D/g, '');

    // Formata o CEP no formato '00000-000'
    if (value.length > 5) {
        value = value.slice(0, 5) + '-' + value.slice(5, 8);
    }

    // Define o valor formatado de volta no campo de entrada
    this.value = value;
});

window.onload = function () {
    // Verifique se a rota atual é 'vizualizar'
    if (window.location.pathname.includes('vizualizar')) {
        // Selecione todos os elementos de entrada, textarea e select
        var inputs = document.querySelectorAll('input, textarea, select');

        // Desabilite todos os elementos selecionados
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = true;
        }
    }
};

function validarFormEditar() {
    // Seleciona todos os campos de arquivo e input
    document.getElementById('edital2').disabled = false;
    var botao = document.getElementById("btnedt");
    var mensagem = document.getElementById("mensagem");

    botao.disabled = true;
    mensagem.style.display = "block";
    mensagem.textContent = "Aguarde...";


    var selectcidade = document.getElementById("cidade");
    var Valorcidade = selectcidade.options[selectcidade.selectedIndex].text;
    if (Valorcidade === 'Selecione a cidade') {
        alert('É necessário selecionar uma cidade.');
        document.getElementById("cidade").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var cep = document.getElementById("cep").value;
    if (cep === '') {
        alert('É necessário preencher o CEP.');
        document.getElementById("cep").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var logradouro = document.getElementById("logradouro").value;
    if (logradouro === '') {
        alert('É necessário preencher o logradouro.');
        document.getElementById("logradouro").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var numero = document.getElementById("numero").value;
    if (numero === '') {
        alert('É necessário preencher o número.');
        document.getElementById("numero").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

    var bairro = document.getElementById("bairro").value;
    if (bairro === '') {
        alert('É necessário preencher o bairro.');
        document.getElementById("bairro").focus();
        botao.disabled = false;
        mensagem.style.display = "none";
        return false;
    }

 

    document.getElementById("Formrequerimento").submit();
}



document.addEventListener("DOMContentLoaded", function () {
    var tituloElement = document.querySelector("h5.text-right.mb-4");
    var titulo = tituloElement ? tituloElement.textContent.trim() : "";

    if (titulo === "Visualizar requerimento") {
        // Adicionar hidden aos inputs com a classe doc-input
        document.querySelectorAll(".doc-input").forEach(function (input) {
            input.remove();
        });

        // Trocar a classe btn-outline-secondary por btn-success nos buttons com a classe doc-button
        document.querySelectorAll(".doc-button").forEach(function (button) {
            button.classList.remove("btn-outline-secondary");
            button.classList.add("btn-success");
        });
    }
});

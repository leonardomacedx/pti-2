document.addEventListener("DOMContentLoaded", function () {
    var cpfInput = document.getElementById("cpf");

    cpfInput.addEventListener("input", function () {
        var cpf = cpfInput.value;

        // Remove qualquer caractere que não seja dígito
        cpf = cpf.replace(/\D/g, '');

        // Aplica a máscara
        if (cpf.length > 3) {
            cpf = cpf.substring(0, 3) + '.' + cpf.substring(3);
        }
        if (cpf.length > 7) {
            cpf = cpf.substring(0, 7) + '.' + cpf.substring(7);
        }
        if (cpf.length > 11) {
            cpf = cpf.substring(0, 11) + '-' + cpf.substring(11, 13);
        }

        cpfInput.value = cpf;
    });
});

function validarForm() {
    Array.from(document.getElementsByClassName('erro')).forEach(element => {
        element.setAttribute('hidden', true);
    });

    var cpf = document.getElementById("cpf").value;
    var dtnascimento = document.getElementById("dtnascimento").value;

    var isValid = true;

    if (!validaCPF(cpf)) {
        document.getElementById('erro-cpf').removeAttribute('hidden');
        isValid = false;
    }

    if (!validaData(dtnascimento)) {
        document.getElementById('erro-dtnascimento').removeAttribute('hidden');
        isValid = false;
    }

    return isValid;

}

document.addEventListener('DOMContentLoaded', function () {
    var alertElement = document.getElementById('error-alert');
    if (alertElement) {
        setTimeout(function () {
            alertElement.style.display = 'none';
        }, 5000); // 5000 ms = 5 segundos
    }
});


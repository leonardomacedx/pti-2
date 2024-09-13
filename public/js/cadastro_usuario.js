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

    Array.from(document.getElementsByClassName('is-invalid')).forEach(element => {
        element.classList.remove('is-invalid');
    });

    var isValid = true;
    var cpf = document.getElementById("cpf").value;
    var senha = document.getElementById("senha").value;
    var nome = document.getElementById("nome").value;

    var campos = [
        "nome",
        "cpf",
        "senha",
    ];

    for (var campo of campos) {
        if (document.getElementById(campo).value === "") {
            isInvalid(campo)
            isValid = false;
        }
    }

    if (!validaCPF(cpf)) {
        isInvalid('cpf')
        isValid = false;
    }

    if (!validarSenha(senha, confirmarSenha)) {
        isValid = false;
    }

    return isValid;
}

function validarSenha(senha) {
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&]{8,}$/;

    if (senha == '') {
        return false
    }

    if (!regex.test(senha)) {
        isInvalid('senha');
        return false;
    } else {
        isValid('senha');
    }

    return true;
}

document.addEventListener('DOMContentLoaded', function () {
    var alertElement = document.getElementById('error-alert');
    if (alertElement) {
        setTimeout(function () {
            alertElement.style.display = 'none';
        }, 5000); // 5000 ms = 5 segundos
    }
});

document.addEventListener("DOMContentLoaded", function () {
    var element = document.getElementById("senha");

    element.addEventListener("blur", function () {
        let senha = document.getElementById("senha").value;
        validarSenha(senha);
    });
});

document.getElementById('nome').addEventListener('blur', function () {
    let nome = this.value

    if (!validarNome(nome) && nome != '') {
        isInvalid('nome')
    } else {
        isValid('nome')
    }
})

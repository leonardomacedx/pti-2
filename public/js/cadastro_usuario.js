document.addEventListener("DOMContentLoaded", function () {
    var phoneInput = document.getElementById("telefone");

    phoneInput.addEventListener("input", function () {
        var phone = phoneInput.value;

        // // Remove qualquer caractere que não seja dígito
        phone = phone.replace(/\D/g, '');

        // Aplica a máscara
        if (phone.length > 2) {
            phone = '(' + phone.substring(0, 2) + ')' + phone.substring(2);
        }
        if (phone.length > 9) {
            phone = phone.substring(0, 9) + '-' + phone.substring(9, 13);
        }

        phoneInput.value = phone;
    });
});

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
    var dataNascimento = document.getElementById("data_nascimento").value;
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmarSenha").value;
    var email = document.getElementById("email").value;
    var telefone = document.getElementById("telefone").value;
    var sexo = document.getElementById("sexo").value;
    var nome = document.getElementById("nome_completo").value;

    var campos = [
        "nome_completo",
        "email",
        "cpf",
        "telefone",
        "senha",
        "confirmarSenha",
        "data_nascimento",
        "sexo"
    ];

    for (var campo of campos) {
        if (document.getElementById(campo).value === "") {
            isInvalid(campo)
            isValid = false;
        }
    }

    if (!validarNome(nome)) {
        isInvalid('nome_completo')
        isValid = false;
    }

    if (sexo === "") {
        isInvalid('sexo')
        isValid = false;
    }

    if (!validaTelefone(telefone)) {
        isInvalid('telefone')
        isValid = false;
    }

    if (!validaCPF(cpf)) {
        isInvalid('cpf')
        isValid = false;
    }

    if (!validaData(dataNascimento)) {
        isInvalid('data_nascimento')
        isValid = false;
    }
    if (!validarSenha(senha, confirmarSenha)) {
        isValid = false;
    }
    if (!validarEmail(email)) {
        isInvalid('email');
        isValid = false;
    }

    return isValid;
}

function validarSenha(senha, confirmarSenha) {
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&]{8,}$/;

    if (senha == '') {
        return false
    }

    if (!regex.test(senha)) {
        isInvalid('senha');
        return false;
    } else {
        isValid('senha');
        if (senha !== confirmarSenha) {
            isInvalid('confirmarSenha');
            return false;
        }
        isValid('confirmarSenha');
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

document.getElementById('email').addEventListener('blur', function () {
    let email = this.value

    if (!validarEmail(email) && email != '') {
        isInvalid('email')
    } else {
        isValid('email')
    }
})

document.addEventListener("DOMContentLoaded", function () {
    var elements = [document.getElementById("senha"), document.getElementById("confirmarSenha")];

    elements.forEach(function (element) {
        element.addEventListener("blur", function () {
            let senha = document.getElementById("senha").value;
            let confirmarSenha = document.getElementById("confirmarSenha").value;

            validarSenha(senha, confirmarSenha);
        });
    });
});

document.getElementById('telefone').addEventListener('blur', function () {
    let telefone = this.value

    if (!validaTelefone(telefone) && telefone != '') {
        isInvalid('telefone')
    } else {
        isValid('telefone')
    }
})

document.getElementById('nome_completo').addEventListener('blur', function () {
    let nome = this.value

    if (!validarNome(nome) && nome != '') {
        isInvalid('nome_completo')
    } else {
        isValid('nome_completo')
    }
})

document.getElementById('sexo').addEventListener('change', function () {
    let sexo = this.value

    if (sexo === "") {
        isInvalid('sexo')
    } else {
        isValid('sexo')
    }
})

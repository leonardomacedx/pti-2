function validarEditarUsuario() {
    Array.from(document.getElementsByClassName('erro')).forEach(element => {
        element.setAttribute('hidden', true);
    });

    Array.from(document.getElementsByClassName('is-invalid')).forEach(element => {
        element.classList.remove('is-invalid');
    });

    var isValid = true;
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
        "telefone",
        "data_nascimento",
        "sexo"
    ];

    if (senha !== '') {
        campos.push('senha');
        campos.push('confirmarSenha');
    } else{
        document.getElementById("senha").disabled = true;
        document.getElementById("confirmarSenha").disabled = true;
    }

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

    if (!validaData(dataNascimento)) {
        isInvalid('data_nascimento')
        isValid = false;
    }
    if (!validarSenhas(senha, confirmarSenha)) {
        isValid = false;
    }
    if (!validarEmail(email)) {
        isInvalid('email');
        isValid = false;
    }

    return isValid;
}

document.addEventListener("DOMContentLoaded", function () {
    var phoneInput = document.getElementById("telefone");
    var cpfInput = document.getElementById("cpf");

    function aplicarMascaraTelefone(phone) {
        phone = phone.replace(/\D/g, '');
        if (phone.length > 2) {
            phone = '(' + phone.substring(0, 2) + ')' + phone.substring(2);
        }
        if (phone.length > 9) {
            phone = phone.substring(0, 9) + '-' + phone.substring(9, 13);
        }
        return phone;
    }

    function aplicarMascaraCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');
        if (cpf.length > 3) {
            cpf = cpf.substring(0, 3) + '.' + cpf.substring(3);
        }
        if (cpf.length > 7) {
            cpf = cpf.substring(0, 7) + '.' + cpf.substring(7);
        }
        if (cpf.length > 11) {
            cpf = cpf.substring(0, 11) + '-' + cpf.substring(11, 13);
        }
        return cpf;
    }

    phoneInput.value = aplicarMascaraTelefone(phoneInput.value);
    cpfInput.value = aplicarMascaraCPF(cpfInput.value);

    phoneInput.addEventListener("input", function () {
        phoneInput.value = aplicarMascaraTelefone(phoneInput.value);
    });

    cpfInput.addEventListener("input", function () {
        cpfInput.value = aplicarMascaraCPF(cpfInput.value);
    });
});

document.getElementById('nome_completo').addEventListener('blur', function () {
    let nome = this.value

    if (!validarNome(nome)) {
        isInvalid('nome_completo')
    } else {
        isValid('nome_completo')
    }
});

document.getElementById('telefone').addEventListener('blur', function () {
    let telefone = this.value

    if (!validaTelefone(telefone)) {
        isInvalid('telefone')
    } else {
        isValid('telefone')
    }
})

document.getElementById('email').addEventListener('blur', function () {
    let email = this.value

    if (!validarEmail(email)) {
        isInvalid('email')
    } else {
        isValid('email')
    }
})

function validarSenhas(senha, confirmarSenha) {
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&]{8,}$/;

    if (senha === '' && confirmarSenha === '') {
        isValid('senha');
        isValid('confirmarSenha');
        return true
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

document.addEventListener("DOMContentLoaded", function () {
    var elements = [document.getElementById("senha"), document.getElementById("confirmarSenha")];

    elements.forEach(function (element) {
        element.addEventListener("blur", function () {
            let senha = document.getElementById("senha").value;
            let confirmarSenha = document.getElementById("confirmarSenha").value;

            validarSenhas(senha, confirmarSenha);
        });
    });
});

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

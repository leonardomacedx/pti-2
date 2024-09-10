function validarSenha() {
    Array.from(document.getElementsByClassName('erro')).forEach(element => {
        element.setAttribute('hidden', true);
    });

    senha = document.getElementById("senha").value;
    confirmarSenha = document.getElementById("confirmarSenha").value

    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@.#$!%*?&^])[A-Za-z\d@.#$!%*?&]{8,}$/;

    var isValid = true;
    if (!regex.test(senha)) {
        document.getElementById('erro-senha').removeAttribute('hidden');
        isValid = false;

    }
    if (senha !== confirmarSenha) {
        document.getElementById('erro-confirmarSenha').removeAttribute('hidden');
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

document.addEventListener('DOMContentLoaded', function () {
    var alertElement = document.getElementById('success-alert');
    if (alertElement) {
        setTimeout(function () {
            alertElement.style.display = 'none';
        }, 5000); // 5000 ms = 5 segundos
    }
});

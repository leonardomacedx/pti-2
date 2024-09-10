function updateCharCount() {
    const textarea = document.getElementById('recurso');
    const charCount = document.getElementById('charCount');
    charCount.textContent = `${textarea.value.length}/4000 caracteres`;
}

function validateForm() {
    const textarea = document.getElementById('recurso');
    if (textarea.value.length < 1) {
        alert('O campo de recurso não pode estar vazio.');
        return false;
    }
    return true;
}

function checkRecursoBeforeModal() {
    const textarea = document.getElementById('recurso');
    if (textarea.value.length < 1) {
        alert('O campo de recurso não pode estar vazio.');
        return false;
    }
    $('#confirmModal').modal('show');
    return true;
}

document.addEventListener('DOMContentLoaded', function() {
    const confirmButton = document.getElementById('confirmar');
    const form = document.getElementById('recursoForm');

    confirmButton.addEventListener('click', function() {
        confirmButton.disabled = true;
        form.submit();
    });
});

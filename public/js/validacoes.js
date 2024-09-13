// function validaData(valor) {
//     // Verifica se a entrada é uma string
//     if (typeof valor !== 'string') {
//         return false
//     }
//
//     // Verifica formado da data
//     if (!/^\d{4}-\d{2}-\d{2}$/.test(valor)) {
//         return false
//     }
//
//     // Divide a data para o objeto "data"
//     const partesData = valor.split('-')
//     const data = {
//         ano: partesData[0],
//         mes: partesData[1],
//         dia: partesData[2]
//     }
//
//     // Converte strings em número
//     const dia = parseInt(data.dia)
//     const mes = parseInt(data.mes)
//     const ano = parseInt(data.ano)
//
//     // Dias de cada mês, incluindo ajuste para ano bissexto
//     const diasNoMes = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
//
//     // Atualiza os dias do mês de fevereiro para ano bisexto
//     if (ano % 400 === 0 || ano % 4 === 0 && ano % 100 !== 0) {
//         diasNoMes[2] = 29
//     }
//
//     // Regras de validação:
//     // Mês deve estar entre 1 e 12, e o dia deve ser maior que zero
//     if (mes < 1 || mes > 12 || dia < 1) {
//         return false;
//     }
//     // Valida número de dias do mês
//     else if (dia > diasNoMes[mes]) {
//         return false;
//     }
//
//     // Passou nas validações
//     return true;
// }
//
// function validaCPF(cpf) {
//     var Soma = 0
//     var Resto
//
//     var strCPF = String(cpf).replace(/[^\d]/g, '')
//
//     if (strCPF.length !== 11)
//         return false
//
//     if ([
//         '00000000000',
//         '11111111111',
//         '22222222222',
//         '33333333333',
//         '44444444444',
//         '55555555555',
//         '66666666666',
//         '77777777777',
//         '88888888888',
//         '99999999999',
//     ].indexOf(strCPF) !== -1) {
//         return false;
//     }
//
//     for (i = 1; i <= 9; i++) {
//         Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
//     }
//
//     Resto = (Soma * 10) % 11;
//
//     if ((Resto == 10) || (Resto == 11)) {
//         Resto = 0
//     }
//
//     if (Resto != parseInt(strCPF.substring(9, 10))) {
//         return false
//     }
//
//     Soma = 0
//
//     for (i = 1; i <= 10; i++) {
//         Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i)
//     }
//
//     Resto = (Soma * 10) % 11
//
//     if ((Resto == 10) || (Resto == 11)) {
//         Resto = 0
//     }
//
//     if (Resto != parseInt(strCPF.substring(10, 11))) {
//         return false;
//     }
//     return true;
// }
//
// function validarEmail(email) {
//     let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
//
//     return regex.test(email);
// }
//
// function validaTelefone(telefone) {
//     let regex = /^\(\d{2}\)\d{4,5}-\d{4}$/
//
//     return regex.test(telefone);
// }
//
// document.getElementById('cpf').addEventListener('blur', function () {
//     let cpf = this.value
//
//     if (!validaCPF(cpf) && cpf != '') {
//         this.classList.add('is-invalid');
//         document.getElementById('erro-cpf').removeAttribute('hidden')
//     } else {
//         this.classList.remove('is-invalid');
//         document.getElementById('erro-cpf').setAttribute('hidden', true)
//     }
// });
//
// function validarNome(nome) {
//     let regex = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/;
//
//     if (nome.length > 255) {
//         return false;
//     }
//
//     if (!regex.test(nome)) {
//         return false;
//     }
//
//     return true;
//
// }
//
// function isInvalid(campo) {
//     document.getElementById(campo).classList.add('is-invalid');
//     document.getElementById('erro-' + campo).removeAttribute('hidden');
//
// }
//
// function isValid(campo) {
//     document.getElementById(campo).classList.remove('is-invalid');
//     document.getElementById('erro-' + campo).setAttribute('hidden', true);
//
// }

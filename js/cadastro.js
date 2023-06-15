// Confirmar se as senhas batem
alert('Cadastro Existente.');

function confereSenha() {
    const senha = document.querySelector('input[name=senha]');
    const confirma = document.querySelector('input[name=confirma]');

    if (confirma.value === senha.value) {
        confirma.setCustomValidity('');
    } else {
        confirma.setCustomValidity('As senhas não conferem');
    }
}

// função cpf 
function validateCPF(cpf) {
    let cpfInput = document.getElementById("cpf-input").value;
    var sum;
    var rest;
    sum = 0;
    if (cpf == "00000000000") return false;
    if (cpf == "11111111111") return false;
    if (cpf == "22222222222") return false;
    if (cpf == "33333333333") return false;
    if (cpf == "44444444444") return false;
    if (cpf == "55555555555") return false;
    if (cpf == "66666666666") return false;
    if (cpf == "77777777777") return false;
    if (cpf == "88888888888") return false;
    if (cpf == "99999999999") return false;

    for (i = 1; i <= 9; i++) sum = sum + parseInt(cpf.substring(i - 1, i)) * (11 - i);
    rest = (sum * 10) % 11;

    if (rest == parseInt(cpf.substring(9, 10))) {
        sum = 0;
        for (i = 1; i <= 10; i++) sum = sum + parseInt(cpf.substring(i - 1, i)) * (12 - i);
        rest = (sum * 10) % 11;
        if (rest == parseInt(cpf.substring(10, 11))) {
            return true;
        }
    }
    return false;
}


// log cpf 
// mostra alerta na tela se cpf é valido ou não
document.getElementById("btn-enviar").addEventListener("click", function () {
    var cpf = document.getElementById("cpf-input").value;
    if (validateCPF(cpf)) {
        return true;
    } else {
        alert("CPF inválido");
    }
});


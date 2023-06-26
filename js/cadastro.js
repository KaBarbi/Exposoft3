// Confirmar se as senhas batem

function confereSenha() {
    // Obtém os elementos de input das senhas
    const senha = document.querySelector("input[name=senha]");
    const confirma = document.querySelector("input[name=confirma]");

    // Verifica se as senhas são iguais
    if (confirma.value === senha.value) {
        confirma.setCustomValidity(""); // Define a mensagem de validade personalizada como vazia
    } else {
        confirma.setCustomValidity("As senhas não conferem"); // Define a mensagem de validade personalizada
    }
}

// Função para validar CPF
function validateCPF(cpf) {
    cpf = cpf.replace(/\D/g, ""); // Remove caracteres não numéricos do CPF
    var sum;
    var rest;
    sum = 0;

    // Verifica se o CPF é composto por dígitos repetidos
    if (
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888"
    ) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    for (i = 1; i <= 9; i++) {
        sum = sum + parseInt(cpf.substring(i - 1, i)) * (11 - i);
    }
    rest = (sum * 10) % 11;

    if (rest == parseInt(cpf.substring(9, 10))) {
        sum = 0;

        // Calcula o segundo dígito verificador
        for (i = 1; i <= 10; i++) {
            sum = sum + parseInt(cpf.substring(i - 1, i)) * (12 - i);
        }
        rest = (sum * 10) % 11;

        // Verifica se os dígitos verificadores são válidos
        if (rest == parseInt(cpf.substring(10, 11))) {
            return true; // CPF válido
        }
    }

    return false; // CPF inválido
}

// Log do CPF
// Mostra um alerta na tela se o CPF é válido ou não
document
    .getElementById("btn-enviar")
    .addEventListener("click", function (event) {
        var cpfInput = document.getElementById("cpf-input");
        var cpf = cpfInput.value;

        if (validateCPF(cpf)) {
            return true; // CPF válido, permite o envio do formulário
        } else {
            alert("CPF inválido");
            event.preventDefault(); // Impede o envio do formulário caso o CPF seja inválido
        }
    });

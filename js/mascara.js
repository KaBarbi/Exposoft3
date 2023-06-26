// Função para aplicar a máscara no campo de CPF
function maskCPF(cpfInput) {
    let cpf = cpfInput.value;
    cpf = cpf.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona um ponto após os primeiros 3 dígitos
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona um ponto após os próximos 3 dígitos
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Adiciona um hífen antes dos últimos 2 dígitos
    cpfInput.value = cpf; // Define o valor do campo de entrada como o CPF formatado
}

// Função para aplicar a máscara no campo de CEP
function maskCEP(cepInput) {
    let cep = cepInput.value;
    cep = cep.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
    cep = cep.replace(/^(\d{5})(\d)/, "$1-$2"); // Adiciona um hífen após os primeiros 5 dígitos
    cepInput.value = cep; // Define o valor do campo de entrada como o CEP formatado
}

// Função para aplicar a máscara no campo de número de celular
function maskCelular(celularInput) {
    let celular = celularInput.value;
    celular = celular.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
    celular = celular.replace(/^(\d{2})(\d)/g, "($1) $2"); // Adiciona parênteses e espaço após os primeiros 2 dígitos
    celular = celular.replace(/(\d)(\d{4})$/, "$1-$2"); // Adiciona um hífen antes dos últimos 4 dígitos
    celularInput.value = celular; // Define o valor do campo de entrada como o número de celular formatado
}

// Aguarda o evento "DOMContentLoaded" (quando a página termina de carregar)
window.addEventListener("DOMContentLoaded", function () {
    // Adiciona um ouvinte de evento de entrada para o campo de CPF
    document.getElementById("cpf-input").addEventListener("input", function () {
        maskCPF(this); // Chama a função maskCPF passando o campo de entrada como argumento
    });

    // Adiciona um ouvinte de evento de entrada para o campo de CEP
    document.getElementById("cep").addEventListener("input", function () {
        maskCEP(this); // Chama a função maskCEP passando o campo de entrada como argumento
    });

    // Adiciona um ouvinte de evento de entrada para o campo de número de celular
    document.getElementById("cel").addEventListener("input", function () {
        maskCelular(this); // Chama a função maskCelular passando o campo de entrada como argumento
    });
});

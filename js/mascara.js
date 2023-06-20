function maskCPF(cpfInput) {
    let cpf = cpfInput.value;
    cpf = cpf.replace(/\D/g, "");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    cpfInput.value = cpf;
}

function maskCEP(cepInput) {
    let cep = cepInput.value;
    cep = cep.replace(/\D/g, "");
    cep = cep.replace(/^(\d{5})(\d)/, "$1-$2");
    cepInput.value = cep;
}

function maskCelular(celularInput) {
    let celular = celularInput.value;
    celular = celular.replace(/\D/g, "");
    celular = celular.replace(/^(\d{2})(\d)/g, "($1) $2");
    celular = celular.replace(/(\d)(\d{4})$/, "$1-$2");
    celularInput.value = celular;
}

window.addEventListener("DOMContentLoaded", function () {
    document.getElementById("cpf-input").addEventListener("input", function () {
        maskCPF(this);
    });

    document.getElementById("cep").addEventListener("input", function () {
        maskCEP(this);
    });

    document.getElementById("cel").addEventListener("input", function () {
        maskCelular(this);
    });
});

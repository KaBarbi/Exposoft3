// Função para validar o formulário de cadastro de produto
function validarFormulario() {
    // Obter o valor do campo de nome do produto
    var nomeProduto = document.getElementById("prodnome").value;

    // Verificar se o nome do produto contém a tag "<br>"
    if (!nomeProduto.includes("<br>")) {
        // Caso não contenha, exibir um alerta ao usuário
        alert("O nome do produto deve conter a tag <br>.");

        // Retornar false para impedir o envio do formulário
        return false;
    }

    // Retornar true caso o formulário esteja válido
    return true;
}

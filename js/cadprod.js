// funçaão para cadastrar produto 

function validarFormulario() {
    var nomeProduto = document.getElementById("prodnome").value;
    if (!nomeProduto.includes("<br>")) {
        alert("O nome do produto deve conter a tag <br>.");
        return false;
    }
    return true;
}

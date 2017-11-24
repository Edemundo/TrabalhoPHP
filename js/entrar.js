var botaoLogar = document.getElementById("btnEntrar")
botaoLogar.addEventListener("click", function (event) {
    
    var erros = validaUsuario()
    if(erros.length > 0){
        exibeMensagensDeErro(erros)
        event.preventDefault();
        return
    }
    form.reset();
    var mensagemErro = document.querySelector("#mensagens-erro");
    mensagemErro.innerHTML = "";
})

function validaUsuario() {
    var erros = []
    console.log(document.getElementById("email").value.length)
    if (document.getElementById("email").value.length == 0)
        erros.push("O email precisa ser preenchido")
    if (document.getElementById("senha").value.length == 0)
        erros.push("A senha precisa ser preenchida")
    if (document.getElementById("senha").value.length < 6)
        erros.push("A senha precisa ter no mínimo 6 caracteres")

    return erros
}

function exibeMensagensDeErro(erros) {
    var ul = document.querySelector("#mensagens-erro");
    ul.innerHTML = "";

    erros.forEach(function(erro) {
        var li = document.createElement("li");
        li.textContent = erro;
        ul.appendChild(li);
    });
}
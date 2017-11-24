var botaoCadastrar = document.getElementById("btnCadastro")

botaoCadastrar.addEventListener("click", function (event) {
    
    var erros = validaUsuario()
    if(erros.length > 0){
        event.preventDefault();
        exibeMensagensDeErro(erros)
        return
    }
    console.log(erros.length)

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
    if (document.getElementById("senha_novamente").value.length == 0)
        erros.push("A confirmação da senha precisa ser preenchida")
    if (document.getElementById("senha").value.length < 6)
        erros.push("A senha precisa ter no mínimo 6 caracteres")
    if (document.getElementById("senha_novamente").value.length < 6)
        erros.push("A confirmação da senha precisa ter no mínimo 6 caracteres")
    if( document.getElementById("senha_novamente").value != document.getElementById("senha").value)
        erros.push("Confirmação de senha invalida!")
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
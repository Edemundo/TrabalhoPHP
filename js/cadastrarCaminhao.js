var botaoCadastrar = document.getElementById("btnCadastro")

botaoCadastrar.addEventListener("click", function (event) {
    console.log("Ouvindo")
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
    if(document.getElementById("nome").value.length == 0)
        erros.push("O nome precisa ser preenchido")
    if(document.getElementById("montadora").value.length == 0)
        erros.push("O nome da montadora precisa ser preenchida")
    if(document.getElementById("categoria").value.length == 0)
        erros.push("A categoria precisa ser preenchida")
    if(document.getElementById("preco").value.length == 0)
        erros.push("O preço precisa ser preenchido")
    if(document.getElementById("preco").value.length < 5)
        erros.push("O preço precisa ter no mínimo 5 números")
    return erros
}

function exibeMensagensDeErro(erros) {
    var ul = document.querySelector("#mensagens-erro");
    ul.innerHTML = "";

    erros.forEach(function(erro) {
        var li = document.createElement("li");
        li.textContent = erro;
        ul.appendChild(li);
    })
}
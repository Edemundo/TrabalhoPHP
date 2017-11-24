var botaoCadastrar = document.document.querySelector("#btnCadastro")

botaoAdicionar.addEventListener("click", function (event) {
    event.preventDefault();
    var form = document.getElementsByName('cadastro')
    var usuario = valoresFormulario(form)
    var erros = validaUsuario(usuario)
    if(erros.length > 0){
        exibeMensagensErros(erros)
        return
    }

    form.reset();
    var mensagemErro = document.querySelector("#mensagens-erro");
    mensagemErro.innerHTML = "";
})

function valoresFormulario(form) {
    var usuario = {
        email: form.email.value,
        senha: form.senha.value,
        senha_novamente: form.senha_novamente
    }
    console.log(usuario)
    return usuario
}

function validaUsuario(usuario) {
    var erros = []
    if (usuario.email.length == 0)
        erros.push("O email precisa ser preenchido")
    if (usuario.senha.length == 0)
        erros.push("A senha precisa ser preenchida")
    if (usuario.senha_novamente.length == 0)
        erros.push("A confirmação da senha precisa ser preenchida")
    if (usuario.senha.length < 6)
        erros.push("A senha precisa ter no mínimo 6 caracteres")
    if (usuario.senha_novamente.length < 6)
        erros.push("A confirmação da senha precisa ter no mínimo 6 caracteres")
    
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
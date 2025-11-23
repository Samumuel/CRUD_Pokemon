function carregarGeracao(idGeracao) {
    //alert("mostrar geracao" + idGeracao);
    //TODO - Implementar chamada AJAX


    //criar a linha da tabela
    const tabela = document.querySelector('#tbGeracao');
    tabela.removeAttribute("hidden");
    
    //Remover a linha com os dados da geração (caso exista)
    const linhaGeracao = tabela.querySelector("#trGeracao");
    if(linhaGeracao)
        linhaGeracao.remove();

    var url = "/LPW/4bim/pokemon-MVC/api/retorna_geracao.php" + "?idGeracao="
    + idGeracao;

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", url);

    xhttp.onload = function () {

        var json = xhttp.responseText;
        var geracao = JSON.parse(json);

        //Cria a nova linha com os dados da geração
        const linha = tabela.insertRow();
        linha.id = "trGeracao";
        const colunaId = linha.insertCell();
        colunaId.innerHTML = idGeracao;
        const colunaNome = linha.insertCell();
        colunaNome.innerHTML = geracao.numero;
        const colunaAno = linha.insertCell();
        colunaAno.innerHTML = geracao.ano;
        const colunaJogo = linha.insertCell();
        colunaJogo.innerHTML = geracao.jogo;
        const colunaJogo2 = linha.insertCell();
        colunaJogo2.innerHTML = geracao.jogo2;
        const colunaAnime = linha.insertCell();
        colunaAnime.innerHTML = geracao.anime;
        const colunaCidade = linha.insertCell();
        colunaCidade.innerHTML = geracao.cidade; 
    }
    xhttp.send();
}

function salvarPokemon() {
    //Capturar os dados do formulário
    const nome = document.querySelector("#txtNome").value;
    const descricao = document.querySelector("#txtDescricao").value;
    const tipo1 = selTipo1.value;
    const tipo2 = selTipo2.value;
    const link = document.querySelector("#txtLink").value;
    const evolucao = document.querySelector("#numEvolucao").value;
    const geracao = selGera.value;
    //alert(ano + " - " + curso + " - " + disciplina);

    const dados = new FormData();
    dados.append("nome", nome);
    dados.append("descricao", descricao);
    dados.append("tipo1", tipo1);
    dados.append("tipo2", tipo2);
    dados.append("link", link);
    dados.append("evolucao", evolucao);
    dados.append("geracao", geracao);

    var url = "/LPW/4bim/pokemon-MVC/api/salva_pokemon.php"

    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", url);
    xhttp.onload = function() {
        alert(xhttp.responseText);
        const erros = xhttp.responseText;
        if(erros) {
            //Exibir os erros
            divErro.innerHTML = erros;
            divErro.style.display = "block";
        } else {
            //Salvou a turma, redirecionar para o listar
            window.location = "listar.php";
        }

    }
        xhttp.send();
}
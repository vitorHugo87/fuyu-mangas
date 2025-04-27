function alterarQuantidade(qtd) {
    const input = document.getElementById('quantidade');
    let valorAtual = parseInt(input.value) || 1;

    valorAtual += qtd;
    if (valorAtual < 1) valorAtual = 1;

    input.value = valorAtual;
}
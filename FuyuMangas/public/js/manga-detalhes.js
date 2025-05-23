function alterarQuantidade(qtd) {
    const input = document.getElementById('quantidade');
    let valorAtual = parseInt(input.value) || 1;

    valorAtual += qtd;
    if (valorAtual < 1) valorAtual = 1;

    input.value = valorAtual;
}

// Evento para função "Ler Mais" dos detalhes
window.addEventListener('DOMContentLoaded', () => {
    const desc = document.querySelector('.desc-container p');
    const div = document.getElementById('clone-desc-container')
    const link = document.getElementById('ler-mais');

    if (!desc || !link) return;

    // Cria um clone invisível para medir a altura real
    const clone = desc.cloneNode(true);
    clone.style.visibility = 'hidden';
    clone.style.height = 'auto';
    clone.style.overflow = 'visible';
    clone.style.display = 'block';
    clone.style.webkitLineClamp = 'unset';
    div.appendChild(clone);

    // Extrai a altura total do texto da descrição sem estar truncada
    const realHeight = clone.clientHeight;
    // Extrai qual a altura de cada linha da descrição
    const lineHeight = parseFloat(getComputedStyle(desc).lineHeight);
    // Calcula o tamanho maximo que o CSS permite antes de truncar a descrição
    const maxHeight = lineHeight * 4;

    /*
    console.log('Real Height:', realHeight);
    console.log('Line Height:', lineHeight);
    console.log('Max Height:', maxHeight);
    */

    // Caso o tamanho total do texto esteja causando que o CSS trunque, exibe o link "Ler Mais"
    if (realHeight > maxHeight) {
        link.style.display = 'inline-block';
    }

    // Remove da página a div auxiliar usada para calcular o tamanho total da descrição.
    div.remove();

    // Evento para truncar ou expandir a descrição
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const container = desc.closest('.desc-container');
        container.classList.toggle('expanded');
        this.textContent = container.classList.contains('expanded') ? 'Mostrar Menos' : 'Ler Mais';
    });
});
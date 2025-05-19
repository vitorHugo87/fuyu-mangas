document.addEventListener('DOMContentLoaded', () => {
    const elementos = document.querySelectorAll('.colecao-rotativa');

    elementos.forEach(el => {
        const colecoes = JSON.parse(el.dataset.colecoes);

        if (!colecoes.length) return;
        else if (colecoes.length === 1) {
            el.textContent = colecoes[0];
            return;
        }

        let index = 0;

        // Função que troca o texto com fade
        const trocarColecao = () => {
            el.classList.add('fade-out');

            setTimeout(() => {
                el.textContent = colecoes[index];
                el.classList.remove('fade-out');
                index = (index + 1) % colecoes.length;
            }, 500); // Tempo do fade-out (em ms)
        };

        // Começa mostrando o primeiro
        el.textContent = colecoes[0];
        index++;

        // Troca a cada 3 segundos
        setInterval(trocarColecao, 3000);
    });
});
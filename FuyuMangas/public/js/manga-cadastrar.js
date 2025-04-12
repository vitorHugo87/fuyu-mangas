// Inicializa o Select2
document.addEventListener("DOMContentLoaded", function () {
    $('#categorias').select2({
        placeholder: "Selecione as categorias",
        allowClear: true
    });
});

// Inicializa Popovers do Bootstrap
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

// Preview da imagem da capa
document.getElementById("imagem").addEventListener("change", function (event) {
    const input = event.target;
    const preview = document.getElementById("preview");

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        }

        reader.readAsDataURL(input.files[0]);
    }
});

// Linka os campos de input com o preview
document.addEventListener("DOMContentLoaded", function () {
    // Input do Titulo
    const inputTitulo = document.getElementById('titulo');
    const previewTitulo = document.getElementById('preview-titulo');

    inputTitulo.addEventListener('input', function () {
        const valor = inputTitulo.value.trim();
        previewTitulo.textContent = valor !== '' ? valor : 'Prévia do título';
    });

    // Input da data de lançamento
    const inputDataLancamento = document.getElementById('data-lancamento');
    const previewDataLancamento = document.getElementById('preview-data-lancamento');

    inputDataLancamento.addEventListener('input', function () {
        const valor = inputDataLancamento.value;
        if (valor) {
            const partes = valor.split('-');
            const ano = parseInt(partes[0], 10);
            const mes = parseInt(partes[1], 10) - 1; // mês começa do zero
            const dia = parseInt(partes[2], 10);

            const data = new Date(ano, mes, dia);

            const diaFormatado = dia.toString().padStart(2, '0');
            const mesAbreviado = data.toLocaleString('pt-BR', { month: 'short' });
            const dataFormatada = `${diaFormatado} ${mesAbreviado} ${ano}`;
            previewDataLancamento.textContent = dataFormatada;
        } else {
            previewDataLancamento.textContent = 'dd mmm. yyyy';
        }
    });

    // Input do autor
    const inputAutor = document.getElementById('autor');
    const previewAutor = document.getElementById('preview-autor');

    inputAutor.addEventListener('input', function () {
        const valor = inputAutor.value.trim();
        previewAutor.textContent = (valor !== '') ? valor : 'Autor';
    });

    // Input da descricao
    const inputDesc = document.getElementById('descricao');
    const previewDesc = document.getElementById('preview-descricao');

    inputDesc.addEventListener('input', function () {
        let valor = inputDesc.value.trim();

        if (valor.length > 135) {
            // Corta no máximo até 80 caracteres
            let cortado = valor.slice(0, 135);

            // Garante que não quebra no meio da palavra
            let ultimoEspaco = cortado.lastIndexOf(' ');
            if (ultimoEspaco > 0) {
                cortado = cortado.slice(0, ultimoEspaco);
            }

            valor = cortado + "...";
        }

        previewDesc.textContent = (valor !== '') ? valor : 'Prévia da descrição';
    });

    // Input do preço
    const inputPreco = document.getElementById('preco');
    const previewPreco = document.getElementById('preview-preco');

    inputPreco.addEventListener('input', function () {
        let valor = parseFloat(inputPreco.value);
        previewPreco.textContent = "R$" + ((valor !== '' && !isNaN(valor)) ? valor.toFixed(2).replace('.', ',') : '00,00');
    });

    // Input do estoque
    const inputEstoque = document.getElementById('estoque');
    const previewEstoque = document.getElementById('preview-estoque');

    inputEstoque.addEventListener('input', function () {
        let valor = inputEstoque.value;
        if (valor > 50) previewEstoque.innerHTML = "Em estoque: <b>" + valor + "</b>";
        else if (valor > 0) previewEstoque.innerHTML = "Apenas <b>" + valor + "</b> restantes!";
        else previewEstoque.innerHTML = "Estoque esgotado!";
    });

    // Input de categorias
    $(document).ready(function () {
        $('#categorias').select2();

        $('#categorias').on('change', function () {
            const selecionadas = $(this).select2('data').map(item => item.text);
            const previewTexto = selecionadas.slice(0, 4).join(', ') + (selecionadas.length > 4 ? '...' : '');

            $('#preview-categorias').text((selecionadas.length > 0) ? `${previewTexto}` : 'Nenhuma categoria selecionada');
        });
    });
});

// Impede a digitação do simbolo "-" nos inputs de numero
// Seleciona todos os inputs que devem ser só positivos
const camposNumericos = document.querySelectorAll("#paginas, #preco, #estoque");
camposNumericos.forEach(input => {
    input.addEventListener('keydown', function (e) {
        if (e.key === '-' || e.code === 'Minus') {
            e.preventDefault();
        }
    });

    input.addEventListener('input', function () {
        // Corrige caso algum valor negativo tenha entrado via colar
        if (parseFloat(this.value) < 0) {
            this.value = '';
        }
    });
});

// Valida os campos do formulário antes de enviar os dados
document.getElementById("form-cadastrar-manga").addEventListener('submit', function (event) {
    // Impede o envio direto do formulário
    event.preventDefault();

    // Função para mostrar Popovers de erro
    function mostrarPopover(input, tituloErro, descErro) {
        input.setAttribute("data-bs-toggle", "popover");
        input.setAttribute("data-bs-placement", "top");
        input.setAttribute("data-bs-title", tituloErro);
        input.setAttribute("data-bs-content", descErro);
        input.setAttribute("data-bs-custom-class", "popover-erro");
        input.classList.add('is-invalido');

        // Cria e mostra o popover
        const pop = new bootstrap.Popover(input);
        pop.show();

        // Remove o popover ao começar a digitar
        input.addEventListener("input", function limparErro() {
            input.classList.remove("is-invalido");
            bootstrap.Popover.getInstance(input)?.dispose();
            input.removeEventListener("input", limparErro);
        });
    }

    // Verifica a capa
    const capaInput = document.getElementById("imagem");
    const capa = capaInput.files.length;
    if (capa === 0) {
        mostrarPopover(capaInput, "Tela em Branco!", "A arte da capa ainda não foi escolhida… e sem ela, esse mangá parece inacabado. Adicione a imagem e dê vida à obra!");
        return;
    }

    // Verifica o título
    const tituloInput = document.getElementById("titulo");
    const titulo = tituloInput.value.trim();
    if (titulo === "") {
        mostrarPopover(tituloInput, "Sem nome, sem destino!", "Esse mangá precisa de um título para começar sua própria aventura. Dê a ele um propósito!");
        return;
    }

    // Verifica a data de lançamento
    const lancamentoInput = document.getElementById("data-lancamento");
    const lancamento = lancamentoInput.value;
    if (lancamento === "") {
        mostrarPopover(lancamentoInput, "Cronologia quebrada!", "Toda grande obra tem um passado. Preencha a data de lançamento com o dia em que essa história começou.");
        return;
    }

    // Verifica o autor
    const autorInput = document.getElementById("autor");
    const autor = autorInput.value.trim();
    if (autor === "") {
        mostrarPopover(autorInput, "Caneta fantasma!", "Toda história precisa de uma mente brilhante por trás... Quem foi o autor que desenhou este destino? Preencha esse campo com o nome do mestre!");
        return;
    }

    // Verifica a editora
    const editoraInput = document.getElementById("editora");
    const editora = editoraInput.value.trim();
    if (editora === "") {
        mostrarPopover(editoraInput, "Mangá sem lar!", "Esse mangá está perdido no mercado, sem uma editora pra guiá-lo... Dê um lar a ele preenchendo o nome da editora responsável.");
        return;
    }

    // Verifica a descricao
    const descricaoInput = document.getElementById("descricao");
    const descricao = descricaoInput.value.trim();
    if (descricao === "") {
        mostrarPopover(descricaoInput, "Vazio narrativo!", "A essência desse mangá ainda não foi revelada. Complete o destino dele com uma descrição digna de lenda.");
        return;
    }

    // Verifica o numero de paginas
    const paginasInput = document.getElementById("paginas");
    const paginas = Math.abs(parseInt(paginasInput.value));
    if (isNaN(paginas) || paginas === null) {
        mostrarPopover(paginasInput, "Páginas em limbo!", "Essa história ainda não revelou sua extensão... Quantas páginas carrega essa jornada? Complete o campo com esse detalhe essencial.");
        return;
    }

    // Verifica o preco
    const precoInput = document.getElementById("preco");
    const preco = parseFloat(precoInput.value);
    if (isNaN(preco) || preco === null) {
        mostrarPopover(precoInput, "Economia quebrada!", "O preço está ausente! Como vamos fazer o checkout com esse mistério no ar?");
        return;
    }

    // Verifica o estoque
    const estoqueInput = document.getElementById("estoque");
    const estoque = parseInt(estoqueInput.value);
    if (isNaN(estoque)) {
        mostrarPopover(estoqueInput, "Estante vazia!", "Essa história pode estar esgotada… ou talvez ainda exista uma última cópia. Traga esse número à realidade!");
        return;
    }

    // Verifica as categorias
    const categoriasInput = $("#categorias");
    const categorias = categoriasInput.val();

    if (!categorias || categorias.length === 0) {
        const select2Container = categoriasInput.next('.select2-container').find('.select2-selection')[0];

        select2Container.setAttribute("data-bs-toggle", "popover");
        select2Container.setAttribute("data-bs-placement", "top");
        select2Container.setAttribute("data-bs-title", "Personalidade ausente!");
        select2Container.setAttribute("data-bs-content", "Toda história tem uma essência... Mas essa ainda não revelou se é comédia, ação ou romance. Escolha uma categoria e dê identidade à obra!");
        select2Container.setAttribute("data-bs-custom-class", "popover-erro");
        select2Container.classList.add('is-invalido');

        const pop = new bootstrap.Popover(select2Container);
        pop.show();

        // Remover o popover quando selecionar algo
        categoriasInput.on('change', function () {
            bootstrap.Popover.getInstance(select2Container)?.dispose();
            select2Container.classList.remove("is-invalido");
        });

        return;
    }
    // Envia o formulário se todos os campos estejam preenchidos corretamente
    event.target.submit();
});
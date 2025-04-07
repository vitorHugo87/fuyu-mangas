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

// Inicializando o Select2
document.addEventListener("DOMContentLoaded", function () {
    $('#categorias').select2({
        placeholder: "Selecione as categorias",
        allowClear: true
    });
});


// Linkando os campos de input com o preview
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
        if(valor > 50) previewEstoque.innerHTML = "Em estoque: <b>" + valor + "</b>";
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
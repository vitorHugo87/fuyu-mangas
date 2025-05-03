// Opções de países no input de País de Origem
async function carregarPaises() {
    const select = document.getElementById('pais_origem');
    const response = await fetch('https://restcountries.com/v3.1/all');
    const paises = await response.json();

    // Limpa o select
    select.innerHTML = '<option value="">Selecione um país</option>';

    // Ordena e adiciona os países
    paises.sort((a, b) => a.name.common.localeCompare(b.name.common));
    paises.forEach(pais => {
        const option = document.createElement('option');
        option.value = pais.name.common;
        option.textContent = pais.name.common;

        // Armazena a bandeira SVG no atributo data
        option.setAttribute('data-flag', pais.flags.svg);

        select.appendChild(option);
    });

    // Aplica o Select2 depois de adicionar as opções
    $('#pais_origem').select2({
        placeholder: 'Escolha um país'
    });
}

carregarPaises();

// Leva o link da bandeira SVG para o input oculto e exibe no preview
// Evento de mudança do Select2
$('#pais_origem').on('change', function () {
    const selectedOption = $(this).find(':selected'); // Pega o <option> selecionado
    const flagURL = selectedOption.data('flag'); // Lê o atributo data-flag

    // Atualiza o preview com a bandeira
    $('#preview-flag').attr('src', flagURL);
    $('#bandeira_svg').val(flagURL); // Input oculto para enviar no form

    // Verifica se o preview da flag está escondido e remove a classe se necessário
    const preview = $('#preview-flag');
    if (preview.hasClass('d-none')) {
        preview.removeClass('d-none');
    }
});

// Linkando os inputs com os previews
document.addEventListener("DOMContentLoaded", function () {
    // Preview da foto de perfil
    document.getElementById('imagem').addEventListener('change', function (event) {
        const input = event.target;
        const previewLarge = document.getElementById('profile-img-large');
        const previewSmall = document.getElementById('profile-img-small');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewLarge.src = e.target.result;
                previewSmall.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    });

    // Input do nome
    const inputNome = document.getElementById('nome');
    const previewNomeLarge = document.getElementById('preview-nome-large');
    const previewNomeSmall = document.getElementById('preview-nome-small');

    inputNome.addEventListener('input', function () {
        const valor = inputNome.value.trim();
        if (valor !== '') {
            previewNomeLarge.textContent = valor;
            previewNomeSmall.textContent = valor;
        } else {
            previewNomeLarge.textContent = 'Nome do Autor';
            previewNomeSmall.textContent = 'Nome do Autor';
        }
    });
});

// Inicializa Popovers do Bootstrap
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

// Valida os campos do formulário antes de enviar os dados
document.getElementById("form-cadastrar-autor").addEventListener('submit', function (event) {
    // Impede o envio direto do formulário
    event.preventDefault();

    // Função para mostrar Popovers de erro
    function mostrarPopover(input, position, tituloErro, descErro) {
        input.setAttribute("data-bs-toggle", "popover");
        input.setAttribute("data-bs-placement", position);
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

    // Verifica a imagem de perfil
    const imagemInput = document.getElementById('imagem');
    const imagem = imagemInput.files.length;
    if (imagem === 0) {
        mostrarPopover(imagemInput, "right", "Arquivo Incompleto.", "Esse autor quer entrar no sistema sem identidade visual. Selecione uma imagem de perfil para completar o cadastro!");
        return;
    }

    // Verifica o nome
    const nomeInput = document.getElementById('nome');
    const nome = nomeInput.value.trim();
    if (nome === '') {
        mostrarPopover(nomeInput, "right", "Anonimato!", "Toda história tem um criador, e todo criador merece um nome. Preencha esse campo para dar vida a esse criador misterioso!");
        return;
    }

    // Verifica a data de nascimento
    const nascimentoInput = document.getElementById('data-nascimento');
    const nascimento = nascimentoInput.value;
    if (nascimento === '') {
        mostrarPopover(nascimentoInput, "right", "Paradoxo Temporal!", "Esse autor parece ter chegado de outra era — ou de lugar nenhum. Informe sua data de nascimento para que possamos encaixá-lo na cronologia humana!");
        return;
    }

    // Verifica a biografia
    const biografiaInput = document.getElementById('biografia');
    const biografia = biografiaInput.value.trim();
    if (biografia === '') {
        mostrarPopover(biografiaInput, "right", "Sem Arco de Origem!", "A vida é feita de pequenos detalhes… e essa biografia está em branco. Conte um pouco sobre o autor — os leitores adoram conhecer o lado humano por trás da arte");
        return;
    }

    // Verifica o país de origem
    const paisInput = $("#pais_origem");
    const pais = paisInput.val();
    if (pais === '' || pais === undefined) {
        const select2Container = paisInput.next('.select2-container').find('.select2-selection')[0];

        select2Container.setAttribute("data-bs-toggle", "popover");
        select2Container.setAttribute("data-bs-placement", "right");
        select2Container.setAttribute("data-bs-title", "Passaporte Perdido!");
        select2Container.setAttribute("data-bs-content", "Sem país, sem identidade internacional! Ajude esse autor a recuperar sua bagagem cultural escolhendo sua terra natal.");
        select2Container.setAttribute("data-bs-custom-class", "popover-erro");
        select2Container.classList.add('is-invalido');

        const pop = new bootstrap.Popover(select2Container);
        pop.show();

        // Remover o popover quando selecionar algo
        $(paisInput).on('change', function () {
            bootstrap.Popover.getInstance(select2Container)?.dispose();
            select2Container.classList.remove("is-invalido");
        });

        return;
    }

    // Campos <Instagram / X (Twitter) / Site Oficial> são opcionais
    // Envia o formulário se todos os campos estejam preenchidos corretamente
    event.target.submit();
});
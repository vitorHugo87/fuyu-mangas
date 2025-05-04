// Inicializa o Select2
document.addEventListener("DOMContentLoaded", function () {
    $('#status').select2({
        placeholder: "Selecione...",
        minimumResultsForSearch: Infinity // Remove a barrinha de busca
    });
});

// Deixa o input de encerramento ativo ou desabilitado
var isOculto = true;
$('#status').on('change', function () {
    const statusSelecionado = $(this).val(); // valor da opção selecionada (ex: 'ativa', 'hiato', 'finalizada')
    const campoEncerramento = $('#data-encerramento');
    const divEncerramento = campoEncerramento.closest('.col-md-4');

    if (statusSelecionado === 'finalizada') {
        // Ativa o campo
        campoEncerramento.prop('disabled', false);
        campoEncerramento.removeClass('disabled');
        divEncerramento.hide().fadeIn(400); // animação para aparecer
        isOculto = false;
    } else if (!isOculto) {
        // Desativa o campo e limpa o valor
        campoEncerramento.prop('disabled', true).val('');
        campoEncerramento.addClass('disabled');
        divEncerramento.fadeOut(400); // animação de sumir
        isOculto = true;
    }
});

// Inicializa Popovers do Bootstrap
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));

// Valida os inputs antes de enviar os dados
document.getElementById('form-cadastrar-colecao').addEventListener('submit', function (event) {
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

    // Verifica o nome
    const nomeInput = document.getElementById('nome');
    const nome = nomeInput.value.trim();
    if (nome === '') {
        mostrarPopover(nomeInput, "right", "Coleção Anônima!", "Uma coleção sem nome não pode ser catalogada. preencha esse campo antes que ela se perca no limbo do esquecimento.");
        return;
    }

    // Verifica o status
    const statusInput = $('#status');
    const status = statusInput.val();
    if (status === '' || status === undefined) {
        const select2Container = statusInput.next('.select2-container').find('.select2-selection')[0];

        select2Container.setAttribute("data-bs-toggle", "popover");
        select2Container.setAttribute("data-bs-placement", "right");
        select2Container.setAttribute("data-bs-title", "Limbo Editorial!");
        select2Container.setAttribute("data-bs-content", "Sem status definido, sua coleção cairá no vácuo entre temporadas. Declare se a coleção está ativa, finalizada ou em hiato.");
        select2Container.setAttribute("data-bs-custom-class", "popover-erro");
        select2Container.classList.add('is-invalido');

        const pop = new bootstrap.Popover(select2Container);
        pop.show();

        // Remover o popover quando selecionar algo
        $(statusInput).on('change', function () {
            bootstrap.Popover.getInstance(select2Container)?.dispose();
            select2Container.classList.remove("is-invalido");
        });

        return;
    }

    // Verifica a data de lançamento
    const lancamentoInput = document.getElementById('data-lancamento');
    const lancamento = lancamentoInput.value;
    if(lancamento === '') {
        mostrarPopover(lancamentoInput, "right", "Coleção Atemporal", "A coleção existe, mas... desde quando? Definir a data de lançamento é essencial para a linha do tempo!");
        return;
    }

    // Verifica a data de encerramento
    const encerramentoInput = document.getElementById('data-encerramento');
    const encerramento = encerramentoInput.value;
    if(encerramento === '' && status === 'finalizada') {
        mostrarPopover(encerramentoInput, "right", "Final sem Fim!", "Você marcou como finalizada, mas o tempo discorda. Marque a data do último capítulo e traga paz à cronologia.");
        return;
    }

    // Verifica a descricao
    const descInput = document.getElementById('descricao');
    const desc = descInput.value;
    if(desc === '') {
        mostrarPopover(descInput, "right", "Coleção Sem Contexto!", "O leitor quer saber mais, mas não tem nem um spoilerzinho! Uma boa descrição pode ajudar.");
        return;
    }

    // Envia o formulário se todos os campos estejam preenchidos corretamente
    event.target.submit();
});
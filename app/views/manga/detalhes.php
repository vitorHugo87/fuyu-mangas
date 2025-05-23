<div class="container-md text-light">
    <!-- Breadcrumb -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item"><a href="#"><?= $manga->getColecao()->getNome() ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $manga->getTituloEng() ?></li>
        </ol>
    </nav>
    <!-- Fim Breadcrumb -->

    <hr>

    <!-- Detalhes Mangá -->
    <div class="row">
        <!-- Preview da Capa / Autor -->
        <div class="col-md-3">
            <!-- Preview da Capa -->
            <img src="<?= PUBLIC_URL . $manga->getImagem() ?>" class="img-fluid shadow-lg" alt="">
            <!-- Fim Preview da Capa -->
            <hr>
            <!-- Criadores -->
            <?php foreach ($manga->getCriadores() as $criador): ?>
                <?php
                $p = $criador->getPapeis();
                $papeis = [];
                if (in_array('Autor', $p) && in_array('Roteirista', $p))
                    $papeis[] = 'Autor';
                if (in_array('Ilustrador', $p) && in_array('Capista', $p))
                    $papeis[] = 'Ilustrador';
                $papeis = $criador->agruparPapeis($criador->getPapeis());
                ?>
                <div class="p-0 criadores">
                    <a href="#" class="d-flex align-items-center p-2 text-decoration-none" id="link-autor">
                        <img class="img-fluid rounded-circle me-3" src="<?= PUBLIC_URL . $criador->getFotoPerfil() ?>"
                            alt="" style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <p class="fw-bold mb-1 mb-0"><?= implode(' / ', $papeis) ?></p>
                            <p class="mb-0"><?= $criador->getNome() ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <!-- Fim Criadores -->
        </div>
        <!-- Fim Preview da Capa / Autor -->

        <!-- Informações Basicas / Adicionar ao Carrinho -->
        <div class="col-md-9 d-flex flex-column">
            <!-- Título Inglês / Data Publicação -->
            <div class="d-inline-flex">
                <h3 class="mb-0"><?= $manga->getTituloEng() ?></h3>
                <p class="ms-2 mb-0 align-self-center"><small>- <?= $manga->getDataPublicacaoFormatada() ?></small></p>
            </div>
            <!-- Fim Título Inglês / Data Publicação -->

            <!-- Título Japonês -->
            <p class="mb-0"><small><?= $manga->getTituloJap() ?></small></p>
            <!-- Fim Título Japonês -->

            <!-- Nota / Link Avaliações -->
            <div class="d-inline-flex mb-1">
                <p class="fw-bold mb-0">4,7 <span class="fw-normal">★★★★☆</span></p>
                <a href="#" class="ms-2 fw-light" id="link-avaliacoes">(44 Avaliações)</a>
            </div>
            <!-- Fim Nota / Link Avaliações -->

            <!-- Descrição -->
            <div id="desc-container" class="desc-container">
                <p class="mb-0"><?= $manga->getDescricao() ?></p>
            </div>
            <div>
                <a href="#" id="ler-mais">Ler Mais</a>
            </div>

            <!-- Div auxiliar para função de Ler Mais usada no detalhes.js -->
            <div id="clone-desc-container" style="height: 0px;"></div>
            <!-- Fim Descrição -->

            <!-- Categorias -->
            <div class="my-3">
                <ul id="categorias" class="d-flex m-0 p-0">
                    <?php foreach ($manga->getCategorias() as $cat): ?>
                        <li><a class="rounded-2 py-1 px-2"
                                href="<?= BASE_URL ?>manga/listar/<?= $cat->getId() ?>"><?= $cat->getNome() ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- Fim Categorias -->

            <!-- Linha Páginas / Editora / Faixa Etária / Idioma -->
            <div>
                <div class="d-flex mb-2">
                    <!-- Páginas -->
                    <div class="text-center py-2 px-3 rounded-2 me-3 info-block">
                        <p class="mb-0 fw-semibold">Páginas</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= PUBLIC_URL ?>img/icons/magazine.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getPaginas() ?></p>
                    </div>
                    <!-- Fim Páginas -->

                    <!-- Editora -->
                    <div class="text-center py-2 px-3 me-3 rounded-2 info-block">
                        <p class="mb-0 fw-semibold">Editora</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= PUBLIC_URL ?>img/icons/building.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getEditora() ?></p>
                    </div>
                    <!-- Fim Editora -->

                    <!-- Faixa Etária -->
                    <div class="text-center py-2 px-3 me-3 rounded-2 info-block">
                        <p class="mb-0 fw-semibold">Faixa Etária</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= PUBLIC_URL ?>img/icons/warning.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getFaixaEtariaFormatada() ?></p>
                    </div>
                    <!-- Fim Faixa Etária -->

                    <!-- Idioma -->
                    <div class="text-center py-2 px-3 me-3 rounded-2 info-block">
                        <p class="mb-0 fw-semibold">Idioma</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= PUBLIC_URL ?>img/icons/translate.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getIdioma() ?></p>
                    </div>
                    <!-- Fim Idioma -->
                </div>
                <hr>
            </div>
            <!-- Fim Linha Páginas / Editora / Faixa Etária / Idioma -->

            <!-- Div com Preço / Estoque / Form Carrinho -->
            <div class="row">
                <!-- Div com Preço / Estoque / Form Carrinho -->
                <div class="col-md-5">
                    <!-- Linha Preço / Estoque -->
                    <div class="d-flex w-100 align-items-center mb-3">
                        <h2 class="mb-0">R$<?= $manga->getPrecoFormatado() ?></h2>
                        <p class="ms-3 mb-0 align-self-end"><?= $manga->getEstoqueString() ?></p>
                    </div>
                    <!-- Fim Linha Preço / Estoque -->

                    <!-- Form Carrinho -->
                    <form action="<?= BASE_URL ?>carrinho/adicionar" method="POST" class="d-flex w-100">
                        <!-- Input oculto que envia o ID do mangá -->
                        <input type="hidden" name="id_manga" value="<?= $manga->getId() ?>">

                        <!-- Seletor de Quantidade -->
                        <div class="input-qtd input-group input-group-sm w-auto d-flex p-1 bg-white me-2">
                            <button class="btn btns-qtd rounded-3 font-monospace" type="button"
                                onclick="alterarQuantidade(-1)">-</button>
                            <input type="number" name="quantidade" id="quantidade"
                                class="form-control text-center border-0" value="1" min="1">
                            <button class="btn btns-qtd rounded-3 font-monospace" type="button"
                                onclick="alterarQuantidade(1)">+</button>
                        </div>
                        <!-- Fim Seletor de Quantidade -->

                        <!-- Botão Adicionar ao Carrinho -->
                        <button type="submit"
                            class="btn btn-success d-inline-flex flex-grow-1 align-items-center justify-content-center gap-2 px-3 py-2">
                            <img src="<?= PUBLIC_URL ?>img/icons/add-to-cart-3046.svg" alt="" class="icon-add-cart"
                                style="width: 20px; height: 20px;">
                            <span class="m-0 p-0 fw-semibold">Adicionar</span>
                        </button>
                        <!-- Fim Botão Adicionar ao Carrinho -->
                    </form>
                    <!-- Fim Form Carrinho -->
                </div>
                <!-- Fim Div com Preço / Estoque / Form Carrinho -->

                <div class="col-md-7 d-flex">

                </div>
            </div>
            <!-- Fim Div com Preço / Estoque / Form Carrinho -->

        </div>
        <!-- Fim Informações Basicas / Adicionar ao Carrinho -->
    </div>
    <!-- Fim Detalhes Mangá -->
    <hr>
</div>
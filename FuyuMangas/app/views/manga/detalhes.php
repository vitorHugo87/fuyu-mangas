<div class="container-md text-light">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item"><a href="#"><?= $manga->getColecao()->getNome() ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $manga->getTituloEng() ?></li>
        </ol>
    </nav>

    <hr>
    <!-- Detalhes Mangá -->
    <div class="row">
        <!-- Preview da Capa / Autor -->
        <div class="col-md-3">
            <!-- Preview da Capa -->
            <img src="../../<?= $manga->getImagem() ?>" class="img-fluid shadow-lg" alt="">
            <hr>
            <!-- Autor -->
            <div class="container p-0">
                <a href="#" class="d-flex align-items-center p-2 text-decoration-none" id="link-autor">
                    <img class="img-fluid rounded-circle me-3"
                        src="https://i.pinimg.com/736x/01/e8/2f/01e82f0b542d4f8dc9d005a374e2cbd1.jpg" alt=""
                        style="width: 50px; height: 50px; object-fit: cover;">
                    <div>
                        <p class="fw-bold mb-1 mb-0">Autor</p>
                        <p class="mb-0"><?= $manga->getAutor()->getNome() ?></p>
                    </div>
                </a>
            </div>
            <!-- Fim Autor -->
        </div>
        <!-- Fim Preview da Capa / Autor -->

        <!-- Informações Basicas / Adicionar ao Carrinho -->
        <div class="col-md-9 d-flex flex-column">
            <div class="d-inline-flex">
                <h3 class="mb-0"><?= $manga->getTituloEng() ?></h3>
                <p class="ms-2 mb-0 align-self-center"><small>- <?= $manga->getDataPublicacaoFormatada() ?></small></p>
            </div>

            <p class="mb-0"><small><?= $manga->getTituloJap() ?></small></p>

            <div class="d-inline-flex mb-1">
                <p class="fw-bold mb-0">4,7 <span class="fw-normal">★★★★☆</span></p>
                <a href="#" class="ms-2 fw-light" id="link-avaliacoes">(44 Avaliações)</a>
            </div>
            <div id="desc-container" class="mb-3">
                <p class="mb-0"><?= $manga->getDescricao() ?></p>
            </div>
            <div class="mb-3">
                <ul id="categorias" class="d-flex m-0 p-0">
                    <?php foreach ($manga->getCategorias() as $cat): ?>
                        <li><a class="rounded-2 py-1 px-2"
                                href="<?= BASE_URL ?>/manga/listar/<?= $cat->getId() ?>"><?= $cat->getNome() ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <div class="d-flex mb-2">
                    <div class="text-center p-2 rounded-2 me-3 info-block">
                        <p class="mb-0 fw-semibold">Páginas</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= BASE_URL ?>/img/icons/magazine.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getPaginas() ?></p>
                    </div>

                    <div class="text-center p-2 me-3 rounded-2 info-block">
                        <p class="mb-0 fw-semibold">Editora</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= BASE_URL ?>/img/icons/building.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getEditora() ?></p>
                    </div>

                    <div class="text-center p-2 me-3 rounded-2 info-block">
                        <p class="mb-0 fw-semibold">Faixa Etária</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= BASE_URL ?>/img/icons/warning.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getFaixaEtariaFormatada() ?></p>
                    </div>

                    <div class="text-center p-2 me-3 rounded-2 info-block">
                        <p class="mb-0 fw-semibold">Idioma</p>
                        <img class="img-fluid small-svg svg-invert my-1" src="<?= BASE_URL ?>/img/icons/translate.svg"
                            alt="">
                        <p class="mb-0"><?= $manga->getIdioma() ?></p>
                    </div>
                </div>
                <hr>
            </div>

            <div class="row mt-auto">

                <div class="col-md-5">
                    <div class="d-flex w-100 align-items-center mb-3">
                        <h2 class="mb-0">R$<?= $manga->getPrecoFormatado() ?></h2>
                        <p class="ms-3 mb-0 align-self-end"><?= $manga->getEstoqueString() ?></p>
                    </div>

                    <form action="<?= BASE_URL ?>/carrinho/adicionar" method="POST" class="d-flex w-100">
                        <input type="hidden" name="id_manga" value="<?= $manga->getId() ?>">

                        <div class="input-qtd input-group input-group-sm w-auto d-flex p-1 bg-white me-2">
                            <button class="btn btns-qtd rounded-3 font-monospace" type="button"
                                onclick="alterarQuantidade(-1)">-</button>
                            <input type="number" name="quantidade" id="quantidade"
                                class="form-control text-center border-0" value="1" min="1">
                            <button class="btn btns-qtd rounded-3 font-monospace" type="button"
                                onclick="alterarQuantidade(1)">+</button>
                        </div>

                        <button type="submit"
                            class="btn btn-success d-inline-flex flex-grow-1 align-items-center justify-content-center gap-2 px-3 py-2">
                            <img src="<?= BASE_URL ?>/img/icons/add-to-cart-3046.svg" alt="" class="icon-add-cart"
                                style="width: 20px; height: 20px;">
                            <span class="m-0 p-0 fw-semibold">Adicionar</span>
                        </button>
                    </form>
                </div>

                <div class="col-md-7 d-flex">

                </div>
            </div>

        </div>
        <!-- Fim Informações Basicas / Adicionar ao Carrinho -->
    </div>
    <!-- Fim Detalhes Mangá -->
    <hr>
</div>
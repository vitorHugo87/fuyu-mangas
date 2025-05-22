<div class="mx-auto">

    <?php foreach ($mangas as $manga): ?>
        <!-- Preview -->
        <div class="row justify-content-center">

            <div>
                <div class="card p-0 mb-3 shadow rounded overflow-hidden" style="max-width: 540px;">
                    <a href="<?= BASE_URL ?>/manga/detalhe/<?= $manga->getId() ?>" class="text-decoration-none text-dark">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid" src="<?= "../" . $manga->getImagem() ?>"
                                    alt="Preview da capa">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title titulo-limitado"><?= $manga->getTituloEng() ?></h5>
                                    <p class="card-text descricao-limitada"><?= $manga->getDescricao() ?></p>
                                    <p class="card-text text-body-secondary fs-6 categoria-truncada">
                                        <?= implode(', ', array_map(fn($cat) => $cat->getNome(), $manga->getCategorias())); ?>
                                    </p>

                                    <p class="card-text text-body-secondary d-inline">
                                        <small>
                                            <?= implode(', ', array_map(fn($criador) => $criador->getNome(), $manga->getCriadores())); ?>
                                        </small>
                                    </p>
                                    <p class="card-text d-inline"><small class="text-body-secondary"> |
                                            <?= $manga->getDataPublicacaoFormatada() ?></small></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-text fs-4 fw-bold text-success mb-0">
                                            R$<?= $manga->getPrecoFormatado() ?>
                                        </p>
                                        <p class="card-text"><small
                                                class="text-body-secondary"><?= $manga->getEstoqueString() ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
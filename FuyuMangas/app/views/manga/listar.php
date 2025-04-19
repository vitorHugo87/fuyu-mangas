<div class="container-md text-light">

    <?php foreach ($mangas as $manga): ?>
        <!-- Preview -->
        <div class="row justify-content-center">
            <div class="card mb-3 p-0" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="img-fluid rounded-start" src="<?= '../public/' . $manga->getImagem() ?>"
                            alt="Preview da capa">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $manga->getTitulo() ?></h5>
                            <p class="card-text descricao-limitada"><?= $manga->getDescricao() ?></p>
                            <p class="card-text text-body-secondary fs-6 categoria-truncada">
                                <?= implode(', ', array_map(fn($cat) => $cat->getNome(), $manga->getCategorias())); ?>
                            </p>
                            <p class="card-text d-inline"><small
                                    class="text-body-secondary"><?= $manga->getAutor() ?></small></p>
                            <p class="card-text d-inline"> | </p>
                            <p class="card-text d-inline"><small
                                    class="text-body-secondary"><?= $manga->getDataPublicacaoFormatada() ?></small></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text fs-4 fw-bold text-success mb-0">R$<?= $manga->getPrecoFormatado() ?></p>
                                <p class="card-text"><small class="text-body-secondary"><?= $manga->getEstoqueString() ?></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
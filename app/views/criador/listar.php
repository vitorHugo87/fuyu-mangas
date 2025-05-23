<div>
    <h2>Criadores</h2>
    <div class="row g-3 mb-5">

        <?php foreach ($criadores as $criador): ?>
            <?php
                $p = $criador->getPapeis();
                $papeis = [];
                if (in_array('Autor', $p) && in_array('Roteirista', $p))
                    $papeis[] = 'Autor';
                if (in_array('Ilustrador', $p) && in_array('Capista', $p))
                    $papeis[] = 'Ilustrador';
                if (empty($p)) $papeis[] = '-';
            ?>

            <div class="col-md-3">
                <!-- Preview Detalhado -->
                <a href="#" class="d-block text-decoration-none position-relative overflow-hidden shadow" id="link-criador">
                    <!-- Top Absoluto -->
                    <div class="destaque position-absolute top-0 start-0 px-2 py-1">
                        <p class="fw-semibold mb-0">Top <?= $criador->getId() ?></p>
                    </div>
                    <img src="<?= $criador->getPaisOrigemFlagSVG() ?>" id="preview-flag"
                        class="img-fluid position-absolute top-0 end-0" alt="">
                    <!-- Fim Top Absoluto -->

                    <!-- Conteúdo -->
                    <div class="p-2 d-grid">
                        <img id="profile-img" class="img-fluid rounded-circle p-2"
                            src="<?= PUBLIC_URL . $criador->getFotoPerfil() ?>" alt="">
                        <div class="mx-auto text-center">
                            <p id="preview-nome" class="fw-semibold fs-5 mb-0"><?= $criador->getNome() ?></p>

                            <p class="m-0"><small>( <?= implode(' / ', $papeis) ?> )</small></p>
                        </div>

                        <p class="mb-0 mx-auto colecao-rotativa"
                            data-colecoes='<?= htmlspecialchars(json_encode(array_map(fn($c) => $c->getNome(), $criador->getColecoes())), ENT_QUOTES, 'UTF-8') ?>'>
                            <!-- Aqui aparece dinamicamente as Coleções do Criador via JS -->
                        </p>
                    </div>
                    <!-- Fim Conteúdo -->
                </a>
                <!-- Fim Preview Detalhado -->
            </div>
        <?php endforeach; ?>
    </div>
</div>
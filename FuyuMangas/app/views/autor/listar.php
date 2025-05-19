<div>
    <h2>Autores</h2>
    <div class="row g-3 mb-5">

        <?php foreach ($autores as $autor): ?>
            <div class="col-md-3">
                <!-- Preview Detalhado -->
                <a href="#" class="d-block text-decoration-none position-relative overflow-hidden shadow" id="link-autor">
                    <!-- Top Absoluto -->
                    <div class="destaque position-absolute top-0 start-0 px-2 py-1">
                        <p class="fw-semibold mb-0">Top 1</p>
                    </div>
                    <!-- Fim Top Absoluto -->
                    <!-- Conteúdo -->
                    <div class="p-2 d-grid">
                        <img id="profile-img" class="img-fluid rounded-circle p-2"
                            src="<?= BASE_URL . '/' . $autor->getFotoPerfil() ?>" alt="">
                        <div class="d-flex mx-auto align-items-center">
                            <img src="#" id="preview-flag" class="img-fluid rounded d-none me-2" alt="">
                            <p id="preview-nome" class="fw-semibold fs-5 mb-0"><?= $autor->getNome() ?></p>
                        </div>

                        <p class="mb-0 mx-auto colecao-rotativa"
                            data-colecoes='<?= htmlspecialchars(json_encode(array_map(fn($c) => $c->getNome(), $autor->getColecoes())), ENT_QUOTES, 'UTF-8') ?>'>
                            <!-- Aqui aparece dinamicamente as Coleções do Autor via JS -->
                        </p>
                    </div>
                    <!-- Fim Conteúdo -->
                </a>
                <!-- Fim Preview Detalhado -->
            </div>
        <?php endforeach; ?>
    </div>
</div>
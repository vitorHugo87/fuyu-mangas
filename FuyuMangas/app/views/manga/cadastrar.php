<div class="container-md text-light">
    <form id="form-cadastrar-manga" action="<?= BASE_URL ?>/manga/salvar" method="POST" enctype="multipart/form-data">
        <h2>Cadastrar Mangá</h2>

        <!-- Campo Imagem Capa -->
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem da capa</label>
            <input type="file" class="form-control" name="imagem" id="imagem">
        </div>

        <div class="row">

            <!-- Campo Titulo -->
            <div class="col-md-8 mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ex.: Initial D - Vol. 1">
            </div>

            <!-- Campo Lançamento -->
            <div class="col-md-4 mb-3">
                <label for="data_lancamento" class="form-label">Data Lançamento</label>
                <input type="date" class="form-control" name="data_lancamento" id="data-lancamento">
            </div>

        </div>

        <!-- Linha com Autor / Editora -->
        <div class="row">

            <!-- Campo Autor -->
            <div class="col-lg-6 col-md-4 mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" name="autor" id="autor" placeholder="Ex.: Shuichi Shigeno">
            </div>

            <!-- Campo Editora -->
            <div class="col-lg-6 col-md-4 mb-3">
                <label for="editora" class="form-label">Editora</label>
                <input type="text" class="form-control" name="editora" id="editora" placeholder="Ex.: Panini">
            </div>

        </div>

        <!-- Campo Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                placeholder="Ex.: Takumi Fujiwara é filho do dono de uma loja de tofu, e não sabe quase nada sobre carros. Certo dia, ele vai assistir a uma corrida dos Akina SpeedStars, o time de corredores de Iketani, seu veterano no trabalho, acompanhado de Itsuki, seu melhor amigo. Então, o Akagi RedSuns, time liderado pelos irmãos Takahashi e considerado o mais rápido de Akagi, aparece e desafia os Akina SpeedStars para uma corrida! É aqui que a lenda começa."></textarea>
        </div>

        <!-- Linha com Preço / Estoque -->
        <div class="row">

            <!-- Campo Páginas -->
            <div class="col-md-4 mb-3">
                <label for="paginas" class="form-label">Nº de páginas</label>
                <input type="number" class="form-control" name="paginas" id="paginas" placeholder="Ex.: 448">
            </div>

            <!-- Campo Preço -->
            <div class="col-md-4 mb-3">
                <label for="preco" class="form-label">Preço</label>
                <div class="input-group-text">
                    <span class="input-group-text">R$</span>
                    <input type="number" class="form-control" name="preco" id="preco" placeholder="Ex.: 49,90"
                        step="0.01">
                </div>
            </div>

            <!-- Campo Estoque -->
            <div class="col-md-4 mb-3">
                <label for="estoque" class="form-label">Estoque</label>
                <input type="number" class="form-control" name="estoque" id="estoque" placeholder="Ex.: 50">
            </div>

        </div>

        <!-- Campo Categorias -->
        <div class="mb-3">
            <label for="categorias" class="form-label">Categorias</label>
            <select id="categorias" name="categorias[]" multiple class="select2" style="width: 100%;">
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat->id ?>"><?= $cat->nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <hr>

        <!-- Preview -->
        <div class="row justify-content-center">
            <h3 class="mb-4 text-center">Preview</h3>
            <div class="card mb-3" id="div-preview" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img id="preview" class="img-fluid rounded-start" src="#" alt="Preview da capa"
                            style="display:none;">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" id="preview-titulo">Prévia do título</h5>
                            <p class="card-text" id="preview-descricao">Prévia da descrição</p>
                            <p class="card-text text-body-secondary fs-6" id="preview-categorias">Prévia das categorias
                            </p>
                            <p class="card-text d-inline"><small class="text-body-secondary"
                                    id="preview-autor">Autor</small></p>
                            <p class="card-text d-inline"> | </p>
                            <p class="card-text d-inline"><small class="text-body-secondary"
                                    id="preview-data-lancamento">dd mmm. yyyy</small></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text fs-4 fw-bold text-success mb-0" id="preview-preco">R$00,00</p>
                                <p class="card-text"><small class="text-body-secondary" id="preview-estoque">Estoque
                                        esgotado!</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Botões Enviar / Cancelar -->
        <div class="d-flex justify-content-center mb-3">
            <button type="button" class="btn btn-light mx-2" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">Cancelar</button>
            <button type="submit" class="btn btn-caramelo mx-2">Cadastrar Mangá</button>
        </div>
    </form>

    <!-- Modal de Confirmação de Cancelar -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tem certeza que deseja cancelar?</h1>
                    <button type="button" class="btn-close text-caramelo" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Se você cancelar agora, <span class="fw-bold text-cafe">todo o cadastro será perdido</span>.</p>
                    <p class="mb-0">Tem certeza que quer abandonar esse mangá tão promissor?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Não, voltar pro
                        formulário</button>
                    <button type="button" class="btn btn-caramelo" onclick="history.back()">Sim, cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
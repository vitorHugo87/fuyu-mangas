<div class="container-md text-light">
    <form id="form-cadastrar-manga" action="<?= BASE_URL ?>/manga/salvar" method="POST" enctype="multipart/form-data">
        <h2>Cadastrar Mangá</h2>

        <!-- Imagem Capa -->
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem da capa</label>
            <input type="file" class="form-control" name="imagem" id="imagem">
        </div>
        <!-- Fim Imagem Capa -->

        <!-- Linha com Titulo Inglês / Idioma / Data Publicação -->
        <div class="row">
            <!-- Titulo Inglês -->
            <div class="col-md-8 mb-3">
                <label for="titulo_eng" class="form-label">Titulo Inglês</label>
                <input type="text" class="form-control" name="titulo_eng" id="titulo_eng"
                    placeholder="Ex.: Initial D - Vol. 1">
            </div>
            <!-- Fim Titulo Inglês -->

            <!-- Idioma -->
            <div class="col-md-2 mb-3">
                <label for="idioma" class="form-label">Idioma</label>
                <input type="text" class="form-control" name="idioma" id="idioma" placeholder="Ex.: Português">
            </div>
            <!-- Fim Idioma -->

            <!-- Lançamento -->
            <div class="col-md-2 mb-3">
                <label for="data_publicacao" class="form-label">Data Publicação</label>
                <input type="date" class="form-control" name="data_publicacao" id="data_publicacao">
            </div>
            <!-- Fim Lançamento -->
        </div>
        <!-- Fim Linha com Titulo Inglês / Idioma / Data Publicação -->

        <!-- Linha com Titulo Japones / Coleção -->
        <div class="row">
            <!-- Titulo Japonês -->
            <div class="col-md-8 mb-3">
                <label for="titulo_jap" class="form-label">Titulo Japonês</label>
                <input type="text" class="form-control" name="titulo_jap" id="titulo_jap"
                    placeholder="Ex.: Initial D - Vol. 1">
            </div>
            <!-- Fim Titulo Japonês -->

            <!-- Coleção -->
            <div class="col-lg-4 mb-3">
                <label for="colecao" class="form-label">Coleção</label>
                <select class="select2" id="colecao" name="colecao" style="width: 100%;">
                    <option></option>
                    <?php foreach ($colecoes as $colecao): ?>
                        <option value="<?= $colecao->getId() ?>"><?= $colecao->getNome() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Fim Coleção -->
        </div>
        <!-- Fim Linha com Titulo Japones / Coleção -->

        <!-- Linha com Autor / Editora / Faixa Etária -->
        <div class="row">
            <!-- Autor -->
            <div class="col-lg-5 col-md-4 mb-3">
                <label for="autor" class="form-label">Autor</label>
                <select class="select2" id="autor" name="autor" style="width: 100%;">
                    <option></option>
                    <?php foreach ($autores as $autor): ?>
                        <option value="<?= $autor->getId() ?>"><?= $autor->getNome() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Fim Autor -->

            <!-- Editora -->
            <div class="col-lg-5 col-md-4 mb-3">
                <label for="editora" class="form-label">Editora</label>
                <input type="text" class="form-control" name="editora" id="editora" placeholder="Ex.: Panini">
            </div>
            <!-- Fim Editora -->

            <!-- Faixa Etária -->
            <div class="col-lg-2 col-md-4 mb-3">
                <label for="faixa_etaria" class="form-label">Faixa Etária</label>
                <select class="select2" id="faixa_etaria" name="faixa_etaria" style="width: 100%;">
                    <option></option>
                    <option value="Livre">Livre</option>
                    <option value="10">+10</option>
                    <option value="12">+12</option>
                    <option value="14">+14</option>
                    <option value="16">+16</option>
                    <option value="18">+18</option>
                </select>
            </div>
            <!-- Fim Faixa Etária -->
        </div>
        <!-- Fim Linha com Autor / Editora / Faixa Etária -->

        <!-- Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3"
                placeholder="Ex.: Takumi Fujiwara é filho do dono de uma loja de tofu, e não sabe quase nada sobre carros. Certo dia, ele vai assistir a uma corrida dos Akina SpeedStars, o time de corredores de Iketani, seu veterano no trabalho, acompanhado de Itsuki, seu melhor amigo. Então, o Akagi RedSuns, time liderado pelos irmãos Takahashi e considerado o mais rápido de Akagi, aparece e desafia os Akina SpeedStars para uma corrida! É aqui que a lenda começa."></textarea>
        </div>
        <!-- Fim Descrição -->

        <!-- Linha com Páginas / Preço / Estoque -->
        <div class="row">
            <!-- Páginas -->
            <div class="col-md-4 mb-3">
                <label for="paginas" class="form-label">Nº de páginas</label>
                <input type="number" class="form-control" name="paginas" id="paginas" placeholder="Ex.: 448">
            </div>
            <!-- Fim Páginas -->

            <!-- Preço -->
            <div class="col-md-4 mb-3">
                <label for="preco" class="form-label">Preço</label>
                <div class="input-group-text">
                    <span class="input-group-text">R$</span>
                    <input type="number" class="form-control" name="preco" id="preco" placeholder="Ex.: 49,90"
                        step="0.01">
                </div>
            </div>
            <!-- Fim Preço -->

            <!-- Estoque -->
            <div class="col-md-4 mb-3">
                <label for="estoque" class="form-label">Estoque</label>
                <input type="number" class="form-control" name="estoque" id="estoque" placeholder="Ex.: 50">
            </div>
            <!-- Fim Estoque -->
        </div>
        <!-- Fim Linha com Páginas / Preço / Estoque -->

        <!-- Categorias -->
        <div class="mb-3">
            <label for="categorias" class="form-label">Categorias</label>
            <select id="categorias" name="categorias[]" multiple class="select2" style="width: 100%;">
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= $cat->getId() ?>"><?= $cat->getNome() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Fim Categorias -->

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
                            <h5 class="card-title" id="preview_titulo_eng">Prévia do título</h5>
                            <p class="card-text descricao-limitada" id="preview-descricao">Prévia da descrição</p>
                            <p class="card-text text-body-secondary fs-6 categoria-truncada" id="preview-categorias">
                                Prévia das categorias
                            </p>
                            <p class="card-text d-inline"><small class="text-body-secondary"
                                    id="preview-autor">Autor</small></p>
                            <p class="card-text d-inline"> | </p>
                            <p class="card-text d-inline"><small class="text-body-secondary"
                                    id="preview_data_publicacao">dd mmm. yyyy</small></p>
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
        <!-- Fim Preview -->

        <hr>

        <!-- Botões Enviar / Cancelar -->
        <div class="d-flex justify-content-center mb-3">
            <button type="button" class="btn btn-light mx-2" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">Cancelar</button>
            <button type="submit" class="btn btn-caramelo mx-2">Cadastrar Mangá</button>
        </div>
        <!-- Fim Botões Enviar / Cancelar -->
    </form>

    <!-- Modal de Confirmação de Cancelar -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tem certeza que deseja cancelar?</h1>
                    <button type="button" class="btn-close text-caramelo" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Se você cancelar agora, <span class="fw-bold text-cafe">todo o cadastro será
                            perdido</span>.</p>
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
    <!-- Fim Modal de Confirmação de Cancelar -->
</div>
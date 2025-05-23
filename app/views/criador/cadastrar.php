<div class="container-md text-light">
    <form id="form-cadastrar-criador" action="<?= BASE_URL ?>criador/salvar" method="POST" enctype="multipart/form-data">
        <h2 class="mb-2">Cadastrar Criador</h2>

        <div class="row">
            <!-- Inputs -->
            <div class="col-md-6 left-side-container pe-4">
                <div class="row">
                    <!-- Foto Perfil -->
                    <div class="col-md-12">
                        <label for="imagem" class="form-label">Foto de perfil</label>
                        <input type="file" class="form-control" name="imagem" id="imagem">
                    </div>
                    <!-- Fim Foto Perfil -->

                    <!-- Linha com Nome / Data Nascimento -->
                    <!-- Nome -->
                    <div class="col-md-8 mt-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Ex.: Takehiko Inoue">
                    </div>
                    <!-- Fim Nome -->

                    <!-- Data Nascimento -->
                    <div class="col-md-4 mt-3">
                        <label for="data-nascimento" class="form-label">Data Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" id="data-nascimento">
                    </div>
                    <!-- Data Nascimento -->
                    <!-- Fim Linha com Nome / Data Nascimento -->

                    <!-- Biografia -->
                    <div class="col-md-12 mt-3">
                        <label for="biografia" class="form-label">Biografia</label>
                        <textarea class="form-control" name="biografia" id="biografia" rows="2"
                            placeholder="Ex.: Criador de Slam Dunk e Vagabond, suas obras unem emoção e arte refinada..."></textarea>
                    </div>
                    <!-- Fim Biografia -->

                    <!-- Linha Pais Origem / Instagram -->
                    <!-- Pais Origem-->
                    <div class="col-md-4 mt-3">
                        <label for="pais_origem" class="form-label">País de Origem</label>
                        <select id="pais_origem" name="pais_origem" class="form-control">
                            <option value="">Carregando países...</option>
                        </select>
                    </div>
                    <!-- Fim Pais Origem-->

                    <!-- Link Bandeira Pais Origem SVG -->
                    <input type="hidden" name="bandeira_svg" id="bandeira_svg">
                    <!-- Fim Link Bandeira Pais Origem SVG-->

                    <!-- Instagram -->
                    <div class="col-md-8 mt-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" name="redes[instagram]" id="instagram"
                            placeholder="Ex.: https://www.instagram.com/inouetake88/">
                    </div>
                    <!-- Fim Instagram -->
                    <!-- Fim Linha Pais Origem / Instagram -->

                    <!-- Linha X (Twitter) / Site Oficial -->
                    <!-- X (Twitter) -->
                    <div class="col-md-6 mt-3">
                        <label for="x" class="form-label">X (Twitter)</label>
                        <input type="text" class="form-control" name="redes[x]" id="x"
                            placeholder="Ex.: https://x.com/inouetake">
                    </div>
                    <!-- Fim X (Twitter) -->

                    <!-- Site Oficial-->
                    <div class="col-md-6 mt-3">
                        <label for="site" class="form-label">Site Oficial</label>
                        <input type="text" class="form-control" name="redes[site]" id="site"
                            placeholder="Ex.: https://itplanning.co.jp/en/">
                    </div>
                    <!-- Fim Site Oficial-->
                    <!-- Fim Linha X (Twitter) / Site Oficial -->
                </div>
            </div>
            <!-- Fim Inputs -->

            <!-- Previews -->
            <div class="col-md-6">
                <!-- Preview Detalhado -->
                <div class="mx-auto p-0 w-50 mb-5">
                    <a href="#" class="d-block text-decoration-none position-relative" id="link-criador-large">
                        <!-- Top 5 Absoluto -->
                        <div class="destaque position-absolute top-0 start-0 px-2 py-1 rounded-bottom-right">
                            <p class="fw-semibold mb-0">Top 1</p>
                        </div>
                        <!-- Fim Top 5 Absoluto -->
                        <!-- Conteúdo -->
                        <div class="p-2 d-grid">
                            <img id="profile-img-large" class="img-fluid rounded-circle p-2"
                                src="<?= PUBLIC_URL ?>img/criadores_pfps/default_pfp.webp" alt="">
                            <div class="d-flex mx-auto align-items-center">
                                <img src="#" id="preview-flag" class="img-fluid rounded d-none me-2" alt="">
                                <p id="preview-nome-large" class="fw-semibold fs-5 mb-0">Nome do Criador</p>
                            </div>
                            <p class="mb-0 mx-auto">Coleção 1, Coleção 2, Coleção 3...</p>
                        </div>
                        <!-- Fim Conteúdo -->
                    </a>
                </div>
                <!-- Fim Preview Detalhado -->

                <!-- Preview Basico -->
                <div class="mx-auto p-0 w-50">
                    <a href="#" class="d-flex align-items-center p-2 text-decoration-none" id="link-criador">
                        <img id="profile-img-small" class="img-fluid rounded-circle me-3"
                            src="<?= PUBLIC_URL ?>img/criadores_pfps/default_pfp.webp" alt=""
                            style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <p class="fw-bold mb-1 mb-0">Criador</p>
                            <p id="preview-nome-small" class="mb-0">Nome do Criador</p>
                        </div>
                    </a>
                </div>
                <!-- Fim Preview Basico -->
            </div>
            <!-- Fim Previews -->

            <!-- Botões Enviar / Cancelar -->
            <div class="d-flex justify-content-center mt-5">
                <button type="button" class="btn btn-light mx-2" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">Cancelar</button>
                <button type="submit" class="btn btn-caramelo mx-2">Cadastrar Criador</button>
            </div>
            <!-- Fim Botões Enviar / Cancelar -->
        </div>
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
                    <p class="mb-0">Se você cancelar agora, <span class="fw-bold">todo o cadastro será
                            perdido</span>.</p>
                    <p class="mb-0">Tem certeza que quer abandonar esse criador tão promissor?</p>
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
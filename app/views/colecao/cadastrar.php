<div class="container-md mb-auto shadow-lg main p-4 rounded-4 text-light">
    <form id="form-cadastrar-colecao" action="<?= BASE_URL ?>/colecao/salvar" method="POST" enctype="multipart/form-data">
        <h2 class="mb-2">Cadastrar Coleção</h2>

        <div class="row">
            <!-- Inputs -->
            <div class="col-md-6">
                <div class="row">
                    <!-- Linha com Nome -->
                    <div class="col-md-12 mb-2">
                        <label for="nome" class="form-label">Nome da Coleção</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Ex.: Chainsaw Man">
                    </div>
                    <!-- Fim Linha Nome -->

                    <!-- Linha com Status / Data Lançamento / Data Encerramento  -->
                    <!-- Status -->
                    <div class="col-md-4 mb-2">
                        <label for="status" class="form-label">Status</label>
                        <select class="select2" name="status" id="status" style="width: 100%;">
                            <option></option>
                            <option value="ativa">Ativa</option>
                            <option value="finalizada">Finalizada</option>
                            <option value="hiato">Hiato</option>
                        </select>
                    </div>
                    <!-- Fim Status -->

                    <!-- Data Lançamento -->
                    <div class="col-md-4 mb-2">
                        <label for="data-lancamento" class="form-label">Lançamento</label>
                        <input type="date" class="form-control" name="data_lancamento" id="data-lancamento">
                    </div>
                    <!-- Fim Data Lançamento -->

                    <!-- Data Encerramento -->
                    <div class="col-md-4 mb-2" style="display: none;">
                        <label for="data-encerramento" class="form-label">Encerramento</label>
                        <input type="date" class="form-control disabled" name="data_encerramento" id="data-encerramento"
                            disabled>
                    </div>
                    <!-- Fim Data Encerramento -->
                    <!-- Linha com Status / Data Lançamento / Data Encerramento  -->

                    <!-- Descrição -->
                    <div class="col-md-12 mb-2">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="3"
                            placeholder="Ex.: Em um mundo onde demônios nascem dos medos humanos, Denji, um caçador de demônios falido, renasce com uma motosserra no peito e um destino sangrento nas mãos. Violento, caótico..."></textarea>
                    </div>
                    <!-- Fim Descrição -->

                    <hr class="my-3">

                    <!-- Botões Enviar / Cancelar -->
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-light mx-2" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Cancelar</button>
                        <button type="submit" class="btn btn-caramelo mx-2">Cadastrar Coleção</button>
                    </div>
                    <!-- Fim Botões Enviar / Cancelar -->
                </div>
            </div>
            <!-- Fim Inputs -->
            <!-- SVG -->
            <div class="col-md-6 d-flex">
                <img src="<?= BASE_URL ?>/img/icons/stacked-books.svg" class="img-fluid mx-auto books" alt="">
            </div>
            <!-- Fim SVG -->
        </div>
    </form>
</div>
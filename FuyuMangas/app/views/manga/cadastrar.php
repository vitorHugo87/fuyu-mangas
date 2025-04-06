<h2>Cadastrar Mangá</h2>
<form action="/manga/salvar" method="POST" enctype="multipart/form-data">
    <label>Título:</label>
    <input type="text" name="titulo" required><br>

    <label>Autor:</label>
    <input type="text" name="autor" required><br>

    <label>Editora:</label>
    <input type="text" name="editora"><br>

    <label>Nº de páginas:</label>
    <input type="number" name="paginas"><br>

    <label>Descrição:</label>
    <textarea name="descricao"></textarea><br>

    <label>Preço (R$):</label>
    <input type="number" step="0.01" name="preco"><br>

    <label>Estoque:</label>
    <input type="number" name="estoque"><br>

    <label>Imagem da capa:</label>
    <input type="file" name="imagem"><br>

    <label>Categorias:</label><br>
    <?php foreach ($categorias as $cat): ?>
        <input type="checkbox" name="categorias[]" value="<?= $cat->id ?>"> <?= $cat->nome ?><br>
    <?php endforeach; ?>

    <button type="submit">Cadastrar Mangá</button>
</form>
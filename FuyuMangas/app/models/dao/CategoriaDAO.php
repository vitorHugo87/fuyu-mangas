<?php
require_once __DIR__ . '/../bean/CategoriaBean.php';
class CategoriaDAO extends Model {
    
    public function listarTodos() {
        $stmt = $this->db->query("SELECT * FROM categoria");
        $categorias = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categoria = new CategoriaBean();
            $categoria->setId($row['id']);
            $categoria->setNome($row['nome']);
            $categoria->setDescricao($row['descricao']);
            $categorias[] = $categoria;
        }

        return $categorias;
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM categoria WHERE id = ?");
        $stmt->execute([$id]);

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categoria = new CategoriaBean();
            $categoria->setId($row['id']);
            $categoria->setNome($row['nome']);
            $categoria->setDescricao($row['descricao']);
            return $categoria;
        }

        return null; // Caso não encontre nenhuma categoria
    }

    public function buscarPorMangaId($mangaId) {
        $stmt = $this->db->prepare("SELECT c.id, c.nome, c.descricao FROM manga_categoria mc INNER JOIN categoria c ON c.id = mc.id_categoria WHERE mc.id_manga = ?");
        $stmt->execute([$mangaId]);
        $categorias = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categoria = new CategoriaBean();
            $categoria->setId($row['id']);
            $categoria->setNome($row['nome']);
            $categoria->setDescricao($row['descricao']);
            $categorias[] = $categoria;
        }

        return $categorias;
    }

    public function adicionar($nome) {
        $stmt = $this->db->prepare("INSERT INTO categoria (nome) VALUES (?)");
        return $stmt->execute([$nome]);
    }

    public function atualizar($id, $nome) {
        $stmt = $this->db->prepare("UPDATE categoria SET nome = ? WHERE id = ?");
        return $stmt->execute([$nome, $id]);
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM categoria WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
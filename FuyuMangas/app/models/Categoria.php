<?php

class Categoria extends Model {
    
    public function listarTodos() {
        $stmt = $this->db->query("SELECT * FROM categorias");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM categorias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function adicionar($nome) {
        $stmt = $this->db->prepare("INSERT INTO categorias (nome) VALUES (?)");
        return $stmt->execute([$nome]);
    }

    public function atualizar($id, $nome) {
        $stmt = $this->db->prepare("UPDATE categorias SET nome = ? WHERE id = ?");
        return $stmt->execute([$nome, $id]);
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM categorias WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
<?php
require_once __DIR__ . '/../bean/AutorBean.php';

class AutorDAO extends Model {
    public function listarTodos(): array {
        $stmt = $this->db->query("SELECT * FROM autores");
        $autores = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $autores[] = new AutorBean($row);
        }

        return $autores;
    }

    public function buscarPorId(int $id): ?AutorBean {
        $stmt = $this->db->prepare("SELECT * FROM autores WHERE id = ?");
        $stmt->execute([$id]);

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new AutorBean($row);
        }

        return null; // Caso não encontre nenhum autor
    }
}
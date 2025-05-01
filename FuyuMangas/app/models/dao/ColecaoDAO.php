<?php
require_once __DIR__ . '/../bean/ColecaoBean.php';

class ColecaoDAO extends Model {
    public function listarTodos(): array {
        $stmt = $this->db->query("SELECT * FROM colecao");
        $colecoes = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) $colecoes[] = new ColecaoBean($row);

        return $colecoes;
    }

    public function buscarPorId(int $id): ?ColecaoBean {
        $stmt = $this->db->prepare("SELECT * FROM colecao WHERE id = ?");
        $stmt->execute([$id]);

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) return new ColecaoBean($row);

        return null; // Caso não encontre nenhuma colecao
    }
}
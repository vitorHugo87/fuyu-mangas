<?php
require_once __DIR__ . '/../bean/ColecaoBean.php';

class ColecaoDAO extends Model {
    public function buscarPorId(int $id): ?ColecaoBean {
        $stmt = $this->db->prepare("SELECT * FROM colecao WHERE id = ?");
        $stmt->execute([$id]);

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $colecao = new ColecaoBean();
            $colecao->setId($row['id']);
            $colecao->setNome($row['nome']);

            return $colecao;
        }

        return null; // Caso não encontre nenhuma colecao
    }
}
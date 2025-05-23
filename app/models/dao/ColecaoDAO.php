<?php
require_once ABS_APP_PATH . '/core/Model.php';
require_once ABS_APP_PATH . '/models/bean/ColecaoBean.php';

class ColecaoDAO extends Model {
    public function listarTodos(): array {
        $stmt = $this->db->query("SELECT * FROM colecao");
        $colecoes = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) $colecoes[] = new ColecaoBean($row);

        return $colecoes;
    }

    public function buscarPorId(int $id): ?ColecaoBean {
        $stmt = $this->db->prepare('SELECT * FROM colecao WHERE id = ?');
        $stmt->execute([$id]);

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) return new ColecaoBean($row);

        return null; // Caso não encontre nenhuma colecao
    }

    public function buscarPorCriadorId(int $criadorId): array {
        $stmt = $this->db->prepare('SELECT c.* FROM colecao c INNER JOIN criador_colecao cc on c.id = cc.id_colecao WHERE cc.id_criador = ?');
        $stmt->execute([$criadorId]);

        $colecoes = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) $colecoes[] = new ColecaoBean($row);

        return $colecoes;
    }

    public function adicionar(ColecaoBean $colecao): int {
        try {
            // Inicia a transação
            $this->db->beginTransaction();

            // Insere a coleção
            $stmt = $this->db->prepare('INSERT INTO colecao (nome, descricao, data_lancamento, data_encerramento, status, slug)
                VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute([$colecao->getNome(), $colecao->getDescricao(), $colecao->getData_lancamento(), $colecao->getData_encerramento(),
                $colecao->getStatus(), $colecao->getSlug()]);

            // Pega o ID da coleção recem criada
            $colecaoId = $this->db->lastInsertId();

            // Tudo certo, salva tudo
            $this->db->commit();

            // Retorna o Id da colecao que foi adicionado
            return $colecaoId;

        } catch (PDOException $e) {
            // Cancela a inserção no banco de dados
            $this->db->rollBack();
            throw new Exception("Erro ao adicionar coleção: " . $e->getMessage());
        }
    }
}
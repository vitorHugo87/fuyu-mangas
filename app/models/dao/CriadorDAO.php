<?php
require_once ABS_APP_PATH . '/core/Model.php';
require_once ABS_APP_PATH . '/models/bean/CriadorBean.php';
require_once ABS_APP_PATH . '/models/dao/MangaCriadorDAO.php';
require_once ABS_APP_PATH . '/models/dao/ColecaoDAO.php';

class CriadorDAO extends Model {
    public function listarTodos(): array {
        $stmt = $this->db->query("SELECT * FROM criador");
        $criadores = [];

        $mangaCriadorDAO = new MangaCriadorDAO();
        $colecaoDAO = new ColecaoDAO();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decodifica o JSON das Redes Sociais em um Array Associativo
            $row['redes_sociais'] = json_decode($row['redes_sociais'], true);

            $row['colecoes'] = $colecaoDAO->buscarPorCriadorId($row['id']);

            $row['papeis'] = $mangaCriadorDAO->buscarTodosPapeisDoCriador($row['id']);

            $criadores[] = new CriadorBean($row);
        }

        return $criadores;
    }

    public function buscarPorId(int $id): ?CriadorBean {
        $stmt = $this->db->prepare("SELECT * FROM criador WHERE id = ?");
        $stmt->execute([$id]);

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decofica o JSON das Redes Sociais em um Array Associativo
            $row['redes_sociais'] = json_decode($row['redes_sociais'], true);

            return new CriadorBean($row);
        }

        return null; // Caso não encontre nenhum criador
    }

    public function buscarPorMangaId(int $mangaId): array {
        $stmt = $this->db->prepare('SELECT c.* FROM criador c INNER JOIN manga_criador mc ON c.id = mc.id_criador WHERE mc.id_manga = ? GROUP BY c.id');
        $stmt->execute([$mangaId]);
        $criadores = [];

        $mangaCriadorDAO = new MangaCriadorDAO();
        $colecaoDAO = new ColecaoDAO();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decodifica o JSON das Redes Sociais em um Array Associativo
            $row['redes_sociais'] = json_decode($row['redes_sociais'], true);

            $row['papeis'] = $mangaCriadorDAO->buscarPapeisDoCriadorPorMangaId($row['id'], $mangaId);

            $row['colecoes'] = $colecaoDAO->buscarPorCriadorId($row['id']);

            $criadores[] = new CriadorBean($row);
        }

        return $criadores;
    }

    public function adicionar(CriadorBean $criador) {
        try {
            // Inicia a transação
            $this->db->beginTransaction();

            // Insere o criador
            $stmt = $this->db->prepare('INSERT INTO criador (nome, biografia, pais_origem, pais_origem_flag_svg,
                data_nascimento, slug, redes_sociais, foto_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$criador->getNome(), $criador->getBiografia(), $criador->getPaisOrigem(), $criador->getPaisOrigemFlagSVG(),
                $criador->getDataNascimento(), $criador->getSlug(), json_encode($criador->getRedesSociais(), JSON_UNESCAPED_UNICODE), $criador->getFotoPerfil()]);
            // O JSON_UNESCAPED_UNICODE é só pra não transformar os acentos e emojis em códigos estranhos (ã em \u2728, por exemplo).

            // Pega o ID do criador recem criado
            $criadorId = $this->db->lastInsertId();

            // Tudo certo, salva tudo
            $this->db->commit();

            // Retorna o Id do criador que foi adicionado
            return $criadorId;

        } catch (PDOException $e) {
            // Cancela a inserção no banco de dados
            $this->db->rollBack();
            throw new Exception("Erro ao adicionar criador: " . $e->getMessage());
        }
    }
}
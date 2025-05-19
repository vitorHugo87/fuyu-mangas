<?php
require_once __DIR__ . '/../../core/Model.php';
require_once __DIR__ . '/../bean/AutorBean.php';
require_once __DIR__ . '/ColecaoDAO.php';

class AutorDAO extends Model {
    public function listarTodos(): array {
        $stmt = $this->db->query("SELECT * FROM autor");
        $autores = [];

        $colecaoDAO = new ColecaoDAO();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decodifica o JSON das Redes Sociais em um Array Associativo
            $row['redes_sociais'] = json_decode($row['redes_sociais'], true);

            $row['colecoes'] = $colecaoDAO->buscarPorAutorId($row['id']);

            $autores[] = new AutorBean($row);
        }

        return $autores;
    }

    public function buscarPorId(int $id): ?AutorBean {
        $stmt = $this->db->prepare("SELECT * FROM autor WHERE id = ?");
        $stmt->execute([$id]);

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decofica o JSON das Redes Sociais em um Array Associativo
            $row['redes_sociais'] = json_decode($row['redes_sociais'], true);

            return new AutorBean($row);
        }

        return null; // Caso não encontre nenhum autor
    }

    public function buscarPorMangaId(int $mangaId): array {
        $stmt = $this->db->prepare('SELECT a.* FROM autor a INNER JOIN manga_autor ma ON a.id = ma.id_autor WHERE id_manga = ?');
        $stmt->execute([$mangaId]);
        $autores = [];

        $colecaoDAO = new ColecaoDAO();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Decodifica o JSON das Redes Sociais em um Array Associativo
            $row['redes_sociais'] = json_decode($row['redes_sociais'], true);

            $row['colecoes'] = $colecaoDAO->buscarPorAutorId($row['id']);

            $autores[] = new AutorBean($row);
        }

        return $autores;
    }

    public function adicionar(AutorBean $autor) {
        try {
            // Inicia a transação
            $this->db->beginTransaction();

            // Insere o autor
            $stmt = $this->db->prepare('INSERT INTO autor (nome, biografia, pais_origem, pais_origem_flag_svg,
                data_nascimento, slug, redes_sociais, foto_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$autor->getNome(), $autor->getBiografia(), $autor->getPaisOrigem(), $autor->getPaisOrigemFlagSVG(),
                $autor->getDataNascimento(), $autor->getSlug(), json_encode($autor->getRedesSociais(), JSON_UNESCAPED_UNICODE), $autor->getFotoPerfil()]);
            // O JSON_UNESCAPED_UNICODE é só pra não transformar os acentos e emojis em códigos estranhos (ã em \u2728, por exemplo).

            // Pega o ID do autor recem criado
            $autorId = $this->db->lastInsertId();

            // Tudo certo, salva tudo
            $this->db->commit();

            // Retorna o Id do autor que foi adicionado
            return $autorId;

        } catch (PDOException $e) {
            // Cancela a inserção no banco de dados
            $this->db->rollBack();
            throw new Exception("Erro ao adicionar autor: " . $e->getMessage());
        }
    }
}
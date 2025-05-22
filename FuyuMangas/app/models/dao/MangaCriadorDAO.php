<?php
require_once ABS_APP_PATH . '/core/Model.php';

class MangaCriadorDAO extends Model {
     public function buscarPapeisDoCriadorPorMangaId(int $criadorId, int $mangaId): array {
        $stmt = $this->db->prepare('SELECT papel FROM manga_criador WHERE id_manga = ? AND id_criador = ?');
        $stmt->execute([$mangaId, $criadorId]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function buscarTodosPapeisDoCriador(int $criadorId): array {
        $stmt = $this->db->prepare('SELECT DISTINCT papel FROM manga_criador WHERE id_criador = ?');
        $stmt->execute([$criadorId]);

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
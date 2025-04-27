<?php
require_once __DIR__ . '/../bean/AutorBean.php';

class AutorDAO extends Model {
    public function buscarPorId(int $id): ?AutorBean {
        $stmt = $this->db->prepare("SELECT * FROM autores WHERE id = ?");
        $stmt->execute([$id]);

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $autor = new AutorBean();
            $autor->setId($row['id']);
            $autor->setNome($row['nome']);
            $autor->setFotoPerfil($row['foto_perfil']);

            return $autor;
        }
        return null; // Caso não encontre nenhum autor
    }
}
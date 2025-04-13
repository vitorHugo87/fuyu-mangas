<?php
    require_once __DIR__ . '/../models/Manga.php';
    require_once __DIR__ . '/../models/Categoria.php';
    require_once __DIR__ . '/../core/Controller.php';
    class MangaController extends Controller {
        private $mangaModel;

        public function __construct() {
            $this->mangaModel = new Manga();
        }

        // Mostrar o formulário de cadastro
        public function cadastrar() {
            // Pegar todas as categorias para usar nos checkboxs de categorias
            $categoriaModel = new Categoria();
            $categorias = $categoriaModel->listarTodos();

            // Ordenar as categorias pelo nome
            usort($categorias, function($a, $b) {return strcmp($a->nome, $b->nome);});

            // Redirecionar para a tela de cadastro de mangás
            $this->render("manga/cadastrar", ["categorias" => $categorias, 
                "css" =>["/FuyuMangas/FuyuMangas/public/css/manga-cadastrar.css"],
                "js" => ["/FuyuMangas/FuyuMangas/public/js/manga-cadastrar.js"]
            ]);
        }

        // Salvar os dados enviados
        public function salvar() {
            // Recebe os dados do $_POST e $_FILES, valida, e chama $this->mangaModel->adicionar()
            var_dump($_POST);
            var_dump($_FILES);
            die("Chegamos aqui no salvar");
        }

        // Listar todos os mangás
        public function listar() {
            $mangas = $this->mangaModel->listarTodos();
            $this->render("manga/listar", ["mangas" => $mangas]);
        }
    }
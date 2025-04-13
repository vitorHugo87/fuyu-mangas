<?php
    require_once __DIR__ . '/../models/Manga.php';
    require_once __DIR__ . '/../models/Categoria.php';
    require_once __DIR__ . '/../core/Controller.php';
    class MangaController extends Controller {
        private $mangaModel;

        public function __construct() {
            $this->mangaModel = new Manga();
        }

        // Mostra o formulário de cadastro
        public function cadastrar() {
            // Pegar todas as categorias para usar nos checkboxs de categorias
            $categoriaModel = new Categoria();
            $categorias = $categoriaModel->listarTodos();

            // Ordena as categorias pelo nome
            usort($categorias, function($a, $b) {return strcmp($a->nome, $b->nome);});

            // Redireciona para a tela de cadastro de mangás
            $this->render("manga/cadastrar", ["categorias" => $categorias, 
                "css" =>["/FuyuMangas/FuyuMangas/public/css/manga-cadastrar.css"],
                "js" => ["/FuyuMangas/FuyuMangas/public/js/manga-cadastrar.js"]
            ]);
        }

        // Salva os dados enviados
        public function salvar() {
            // Recebe os dados do $_POST e $_FILES, valida, e chama $this->mangaModel->adicionar()
            var_dump($_POST);
            var_dump($_FILES);
            //die("Chegamos aqui no salvar");

            // trim -> Tira os espaços do fim e inicio
            // strtolower -> Transforma tudo em lowercase
            // ucwords -> Deixa a primeira letra de cada palavra maiúsculo
            // ucfirst -> Deixa apenas a primeira letra maiuscula
            $titulo = trim($_POST['titulo'] ?? '');
            $dataLancamento = $_POST['data_lancamento'] ?? '';
            $autor = ucwords(strtolower(trim($_POST['autor'] ?? '')));
            $editora = ucwords(strtolower(trim($_POST['editora'] ?? '')));
            $descricao = trim($_POST['descricao'] ?? '');
            $paginas = isset($_POST['paginas']) ? (int) $_POST['paginas'] : 0;
            $estoque = isset($_POST['estoque']) ? (int) $_POST['estoque'] : 0;
            $preco = isset($_POST['preco']) ? round((float) str_replace(',', '.', $_POST['preco']), 2) : 0.0;
            $categorias = $_POST['categorias'] ?? [];
            
            // Salva a imagem
            if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $arquivo = $_FILES['imagem'];

                // Gera um nome único para evitar conflitos
                $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
                $nomeArquivo = uniqid('capa_', true) . '.' . $extensao;

                // Define o caminho para salvar a imagem
                $caminhoDestino = __DIR__ . '/../../public/img/capas/' . $nomeArquivo;

                // Move o arquivo da pasta temporária para a pasta correta
                if (move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) {
                    // Caminho que será salvo no banco de dados (relativo ao site)
                    $caminhoParaBanco = 'img/capas/' . $nomeArquivo;
                } else {
                    die('Ops! Tivemos um erro ao mover o arquivo de imagem..');
                }
            } else {
                die('Ops, tivemos um problema com o upload da capa..');
            }

            // Cria um objeto anônimo
            $mangaDados = (object) [
                'titulo' => $titulo,
                'dataLancamento' => $dataLancamento,
                'autor' => $autor,
                'editora' => $editora,
                'descricao' => $descricao,
                'paginas' => $paginas,
                'estoque' => $estoque,
                'preco' => $preco,
                'imagem' => $caminhoParaBanco,
                'categorias' => $categorias
            ];

            // Passa o objeto para o models/Manga.php
            $this->mangaModel->adicionar($mangaDados);

            die('Manga Cadastrado com sucesso!');
            // Redireciona para a tela inicial
            //$this->render("layouts/main", []);
        }

        // Lista todos os mangás
        public function listar() {
            $mangas = $this->mangaModel->listarTodos();
            $this->render("manga/listar", ["mangas" => $mangas]);
        }
    }
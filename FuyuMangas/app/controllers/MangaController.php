<?php
require_once ABS_APP_PATH . '/models/dao/MangaDAO.php';
require_once ABS_APP_PATH . '/models/bean/MangaBean.php';
require_once ABS_APP_PATH . '/models/dao/CategoriaDAO.php';
require_once ABS_APP_PATH . '/models/bean/CategoriaBean.php';
require_once ABS_APP_PATH . '/core/Controller.php';

class MangaController extends Controller {
    private $mangaDAO;
    private $categoriaDAO;
    private $criadorDAO;
    private $colecaoDAO;

    public function __construct() {
        $this->mangaDAO = new MangaDAO();
        $this->categoriaDAO = new CategoriaDAO();
        $this->criadorDAO = new CriadorDAO();
        $this->colecaoDAO = new ColecaoDAO();
    }

    // Mostra o formulário de cadastro
    public function cadastrar() {
        // Pega todos os criadores para o checkbox de criador
        $criadores = $this->criadorDAO->listarTodos();
        // Ordena os criadores pelo nome
        usort($criadores, function($a, $b) {return strcmp($a->getNome(), $b->getNome());});

        // Pega todas as categorias para usar nos checkboxs de categorias
        $categorias = $this->categoriaDAO->listarTodos();
        // Ordena as categorias pelo nome
        usort($categorias, function($a, $b) {return strcmp($a->getNome(), $b->getNome());});

        // Pega todas as coleções para usar no checkbox de coleção
        $colecoes = $this->colecaoDAO->listarTodos();
        // Ordena as coleções pelo nome
        usort($colecoes, function($a, $b) {return strcmp($a->getNome(), $b->getNome());});

        // Redireciona para a tela de cadastro de mangás
        $this->render("manga/cadastrar", ['criadores' => $criadores, 
            'colecoes' => $colecoes,
            'categorias' => $categorias, 
            'css' =>[BASE_URL . '/css/manga-cadastrar.css'],
            'js' => [BASE_URL . '/js/manga-cadastrar.js']
        ]);
    }

    // Salva os dados enviados
    public function salvar() {
        // Recebe os dados do $_POST e $_FILES, valida, e chama $this->mangaDAO->adicionar($manga);

        // trim -> Tira os espaços do fim e inicio
        // strtolower -> Transforma tudo em lowercase
        // ucwords -> Deixa a primeira letra de cada palavra maiúsculo
        // ucfirst -> Deixa apenas a primeira letra maiuscula
        $dados['titulo_eng'] = trim($_POST['titulo_eng'] ?? '');
        $dados['titulo_jap'] = trim($_POST['titulo_jap'] ?? '');
        $dados['idioma'] = ucwords(strtolower(trim($_POST['idioma'] ?? '')));
        $dados['data_publicacao'] = $_POST['data_publicacao'] ?? '';
        $dados['editora'] = ucwords(strtolower(trim($_POST['editora'] ?? '')));
        $dados['faixa_etaria'] = $_POST['faixa_etaria'] ?? '';
        $dados['descricao'] = trim($_POST['descricao'] ?? '');

        $dados['paginas'] = isset($_POST['paginas']) ? (int) $_POST['paginas'] : 0;
        $dados['estoque'] = isset($_POST['estoque']) ? (int) $_POST['estoque'] : 0;
        $dados['preco'] = isset($_POST['preco']) ? round((float) str_replace(',', '.', $_POST['preco']), 2) : 0.0;
        $dados['ativo'] = true;

        $dados['autor'] = new AutorBean((['id' => $_POST['autor']] ?? []));
        $dados['colecao'] = new ColecaoBean((['id' => $_POST['colecao']] ?? []));

        $dados['categorias'] = [];
        foreach(($_POST['categorias'] ?? []) as $catId) {
            $dados['categorias'][] = new CategoriaBean($catId);
        }
        
        // Salva a imagem
        if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $arquivo = $_FILES['imagem'];

            // Gera um nome único para evitar conflitos
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $nomeArquivo = 'capa_' . time() . '_' . bin2hex(random_bytes(5)) . '.' . $extensao;

            // Define o caminho para salvar a imagem
            $caminhoDestino = __DIR__ . '/../../public/img/capas/' . $nomeArquivo;

            // Move o arquivo da pasta temporária para a pasta correta
            if (move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) {
                // Caminho que será salvo no banco de dados (relativo ao site)
                $dados['imagem'] = 'img/capas/' . $nomeArquivo;
            } else {
                die('Ops! Tivemos um erro ao mover o arquivo de imagem..');
            }
        } else {
            die('Ops, tivemos um problema com o upload da capa..');
        }

        // Cria um objeto MangaBean
        $manga = new MangaBean($dados);

        // Passa o objeto para o models/dao/MangaDao.php
        $this->mangaDAO->adicionar($manga);

        die('Manga Cadastrado com sucesso!');
        // Redireciona para a tela inicial
        //$this->render("layouts/main", []);
    }

    // Lista todos os mangás
    public function listar() {
        $mangas = $this->mangaDAO->listarTodosAtivos();
        $this->render("manga/listar", ["mangas" => $mangas,
            "css" => [BASE_URL . "/css/manga-listar.css"]]);
    }

    public function detalhe($mangaId) {
        // Busca o mangá pelo ID
        $manga = $this->mangaDAO->buscarPorId($mangaId);

        // Se não encontrar, mostra pagina de erro
        if(!$manga) {
            // Implantar pagina de erro depois :3
        }

        $this->render("manga/detalhes", ["manga" => $manga,
            "css" => [BASE_URL . "/css/manga-detalhes.css"],
            "js" => [BASE_URL . "/js/manga-detalhes.js"]]);
    }
}
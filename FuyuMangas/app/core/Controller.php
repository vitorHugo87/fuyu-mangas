<?php
    require_once ABS_APP_PATH . '/config/config.php';
    
class Controller {
    public function render($view, $dados = []) {
        extract($dados); // transforma os índices do array em variáveis
        ob_start(); // começa a guardar o conteúdo que for exibido
        require ABS_APP_PATH . "/views/{$view}.php"; // carrega a view
        $conteudo = ob_get_clean(); // salva o conteúdo e limpa o buffer
        require ABS_APP_PATH . "/views/layouts/main.php"; // carrega o layout principal
    }

    public function model($model) {
        require_once ABS_APP_PATH . "/models/" . $model . ".php";
        return new $model();
    }

    public function view($view, $data = []) {
        extract($data);
        require_once ABS_APP_PATH. "/views/" . $view . ".php";
    }
}
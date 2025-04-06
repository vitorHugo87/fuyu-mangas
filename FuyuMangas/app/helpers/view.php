<?php
    function render($view, $dados = []) {
        extract($dados); // transforma os índices do array em variáveis
        ob_start(); // começa a guardar o conteúdo que for exibido
        require __DIR__ . "/../views/{$view}.php"; // carrega a view
        $conteudo = ob_get_clean(); // salva o conteúdo e limpa o buffer
        require __DIR__ . "/../views/layouts/main.php"; // carrega o layout principal
    }
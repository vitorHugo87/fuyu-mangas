<?php
//Acesso ao banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'fuyumangas');
define('DB_USER', 'root');
define('DB_PASS', '');

// Centraliza a BASE_URL
define('BASE_URL', 'http://localhost/FuyuMangas/FuyuMangas/public');

// Caminho absoluto do projeto
define('ABSPATH', dirname(__DIR__, 2));
/* __DIR__ -> Caminho do diretório atual
dirname(__DIR__, 2) sobe dois niveis {
    1x -> (app/)
    2x -> raiz do projeto (FuyuMangas/) 
} */

// Caminho absoluto do app
define('ABS_APP_PATH', dirname(__DIR__, 1));
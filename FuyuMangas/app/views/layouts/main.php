<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Fuyu Mangas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Fuyu Mangas</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/manga/cadastrar" class="nav-link">Cadastrar Mangá</a></li>
                    <li class="nav-item"><a href="/manga/listar" class="nav-link">Ver Mangás</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php require __DIR__ . "/../" . $view . ".php"; ?>
    </div>

    <footer class="bg-dark text-center text-light mt-5 p-3">
        <small>Fuyu Mangas &copy; <?= date("Y") ?>. Criado com carinho por Vitor Paduan!</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
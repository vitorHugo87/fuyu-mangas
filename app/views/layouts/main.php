<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Fuyu Mangas</title>

    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS do Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- JS do Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Meus CSS's Globais -->
     <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/cores.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/main.css">

    <!-- Meus CSS's -->
    <?php if (isset($css) && is_array($css)): ?>
        <?php foreach ($css as $arquivo): ?>
            <link rel="stylesheet" href="<?= $arquivo ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark mb-4">
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

        <div class="container d-flex flex-grow-1 text-light">
            <?php require ABS_APP_PATH . "/views/" . $view . ".php"; ?>
        </div>

        <footer class="footer text-center text-light mt-auto p-3">
            <small>Fuyu Mangas &copy; <?= date("Y") ?>. Criado por Vitor Paduan!</small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php if (isset($js) && is_array($js)): ?>
        <?php foreach ($js as $arquivo): ?>
            <script src="<?= $arquivo ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>
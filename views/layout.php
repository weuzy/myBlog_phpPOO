<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super blog</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container">
        <a class="navbar-brand text-white" href="/weuzySite">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="/weuzySite">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/weuzySite/posts">Les derniers articles</a>
            </li>
            <?php if(isset($_SESSION['auth'])) { ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/weuzySite/logout">Déconnexion</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/weuzySite/login">Connexion</a>
                </li>
            <?php } ?>
        </ul>
        </div>
    </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous">
    </script> -->
    <script src="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.js' ?>">
    </script>
</body>
</html>
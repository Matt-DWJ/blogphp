<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="MatthieuJ">
    <base href="<?= $webRoot ?>">
    <title><?= $title ?></title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="content/stylesheet.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/49s9oa4srxghsf6ebhhz6m8a6w371i26nguo29xxy67x836y/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>tinymce.init({selector: '.tynimce', language: 'fr_FR', plugins: 'image'});</script>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/index.php"><h1>Jean Forteroche</h1></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/Home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/articles">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home/contact">Contact</a>
                </li>
                <?php if (!isset($_SESSION['auth'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/login">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/registration">Inscription</a>
                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['auth'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/disconnected">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead  m-0">
    <div class="heading">
        <img class="w-100" alt="montagne" src="content/img/header.jpg">
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
            <div class="post-preview">
                <?php if (isset($_SESSION['flash'])) : ?>
                    <div class="alert alert-<?= $_SESSION['flash']['alert']; ?>">
                        <p><?= $_SESSION['flash']['message']; ?></p>
                    </div>
                <?php endif; ?>
                <?php unset($_SESSION['flash']); ?>
                <!-- Contenu -->
                <?= $content ?>
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted text-center">Copyright &copy; Website 2019</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</div>
</body>

</html>
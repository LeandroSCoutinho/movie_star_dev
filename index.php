<?php
    include_once("globals.php");
    include_once("db.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Star Dev</title>
    <link rel="shortcut icon" href="<?= $BASE_URL ?>img/moviestar" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- MovieStar CSS -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
</head>
<body>
   <header>
    <nav id="main-navbar" class="navbar navbar-expand-lg">
        <a href="<?= $BASE_URL ?>" class="navbar-brand">
            <img src="<?= $BASE_URL ?>img/logo.svg" alt="MovieStarDev" id="logo">
        </a>
        <span id="moviestar-title">Movie Star Dev</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <button class="navbar-toggler" data-toggle="collapse" aria-controls="navbar" aria-expanded="false" aria-label="Toggle-navigation">
            <i class="fas fa-bars"></i>
        </button>
        <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
            <input type="search" name="q" class="form-control mr-sm-2" id="search" placeholder="Buscar Filmes" aria-label="Search">
            <button class="btn my-2 my-sm-0" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= $BASE_URL ?>" class="nav-link">Entrar | Cadastrar</a>
                </li>
            </ul>
        </div>
    </nav>
   </header>
   <div id="main-container" class="container-fluid">
    <h1>Corpo do site</h1>
   </div>
   <footer id="footer">
     <div id="social-container">
        <ul>
            <li>
                <a href="#"><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </li>
        </ul>
     </div>
     <div id="footer-links-container">
        <ul>
           <li><a href="#">Adicionar filme</a></li>
           <li><a href="">Adicionar crítica</a></li>
           <li><a href="">Entrar | Registrar</a></li>
        </ul>
     </div>
     <p>&copy; 2024 Leandro Coutinho</p>
   </footer>
    
</body>
</html>
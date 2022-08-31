<?php

  require_once("config/globals.php");
  require_once("config/db.php");
  require_once("models/Message.php");
  require_once("dao/UserDAO.php");

  $message = new Message($BASE_URL);

  $flassMessage = $message->getMessage();

  if(!empty($flassMessage["msg"])) {
    // Limpar a mensagem
    $message->clearMessage();
  }

  $userDao = new UserDAO($conn, $BASE_URL);

  $userData = $userDao->verifyToken(false);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieStar</title>
    <link rel="short icon" href="<?= $BASE_URL ?>img/moviestar.ico"/>
    <!--Bootstrap-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css" integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw==" crossorigin="anonymous" />
   <!--Font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS do projeot -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css"></head>
<body>
   <header>
   <!-- barra de navegação--> 
   <nav id="main-navbar" class="navbar navbar-expand-lg">
    <a href="<?= $BASE_URL ?>" class="navbr-brand">
    <img src="<?= $BASE_URL ?>img/logo.svg" alt="MovieStar" id="logo">
    <span id="moviestar-title">MovieStar</span>
    </a>
   <!--Botão no mobile-->
    <button class="navbar-toggler" type = "button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <!--controlando as margens pelo bootstrap-->
    <form action="" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
        <input type="text" name="q" id="search" class ="form-control mr-sm-2" type="search" placeholder="Buscar Filmes" arial-label="Search">
        <button class="btn my-2 my-m-0" type ="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
<div clas="collape navbar-collapse" id="navbar">
    <ul class="navbar-nav">
        <?php if($userData): ?>
           
            <li class="nav-item">
            <a href="<?=$BASE_URL?>newmovie.php" class="nav-link">
                 <i class="far fa-plus-square"></i> Incluir Filme
        </a>
        </li>
        <li class="nav-item">
            <a href="<?=$BASE_URL?>dashboard.php" class="nav-link">Meus Filmes</a>
        </li>
        <li class="nav-item">
            <a href="<?=$BASE_URL?>editprofile.php" class="nav-link bold">
        <?= $userData->name?>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?=$BASE_URL?>logout.php" class="nav-link">Sair</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
            <a href="<?=$BASE_URL?>auth.php" class="nav-link">Entrar/Cadastrar</a>
        </li>
        <?php endif; ?>
    </ul>
   </div> 
  </nav>
</header>
<!--Template de mensagem-->
<?php if(!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
    <p class="msg <?= $flassMessage["type"]?>"><?= $flassMessage["msg"]?></p>
</div>
<?php endif; ?>

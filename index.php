<?php
  require_once("templates/header.php");

  require_once("dao/MovieDAO.php");

  $movieDao = new MovieDAO($conn, $BASE_URL);

  $latestMovies = $movieDao->getLatestMovies();


  $actionMovies = $movieDao->getMoviesByCategory("Ação");

  $fictionMovies = $movieDao->getMoviesByCategory("Fantasia / Ficção");
  
  
?>
<div id="main-container" class="container-fluid">
<h2 class="section-title">Filmes Novos</h2>
  <p class="section-description">Veja as criticas dos ultimos filmes adicionados no Moviestar: </p>
  <div class="movies-container">  

 <?php foreach($latestMovies as $movie): ?>
   <?php require("templates/movie_card.php"); ?>
 <?php endforeach; ?>

 
  </div>

  <h2 class="section-title">Filmes de Ação</h2>
  <p class="section-description">Os filmes mais eletrizantes: </p>
  <div class="movies-container">
  <?php foreach($actionMovies as $movie): ?>
   <?php require("templates/movie_card.php"); ?>
 <?php endforeach; ?>
  <?php if(count($actionMovies) === 0): ?>
  <p class="empty-list">Ainda não há filmes de Ação Cadatrados</p>
  <?php endif; ?>
  
  
  </div>
 
  <h2 class="section-title">Filmes de Ficção / Fantasia</h2>
  <p class="section-description">Descubra de onde saira seu proximo riso: </p>
  <div class="movies-container">
  <?php foreach($fictionMovies as $movie): ?>
   <?php require("templates/movie_card.php"); ?>
 <?php endforeach; ?>
  <?php if(count($fictionMovies) === 0): ?>
  <p class="empty-list">Ainda não há filmes de Ação Cadatrados</p>
  <?php endif; ?>







</div>


<?php
  require_once("templates/footer.php");
?>
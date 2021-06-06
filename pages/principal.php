<?php require_once '../functions/conexion.php'; ?>
<?php require_once '../functions/functions.php'; ?>

    <?php require_once '../components/beggining-html.php';?>
    <?php require_once '../components/header.php';?>
    <?php require_once '../components/nav.php';?>

  <main class="main">
    <div class="container-sections">
      <div class="section-news"> 
        <h2 class="title-section"> Últimas noticias </h2>
        <div class="container-articles">
           <?php require_once '../components/articles.php'; ?>
        </div>
      </div>
    </div>
  </main>
  <?php include_once '../components/footer.php'; ?>




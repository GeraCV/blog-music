<?php require_once '../functions/conexion.php'; ?>
<?php require_once '../functions/functions.php'; ?>

    <?php require_once '../components/beggining-html.php';?>
    <?php require_once '../components/header.php';?>
    <?php require_once '../components/nav.php';?>

  <main class="main">
    <div class="container-sections" >
      <div class="section-principal">    
        <h2 class="title-section"> Todas las noticias </h2>
        <div class="container-articles">
            <?php
              $views = getAllViews($db);
              while ($view = mysqli_fetch_assoc($views)):
            ?>
          <article class="article">
            <h3 class="title-article"> <?=  $view['title']?> </h3>
            <div class="container-information-post">
              <p class="subtitle"> <?=  $view['user-name']?> | </p> 
              <p class="subtitle"> <?=  $view['name']?> | </p> 
              <p class="subtitle"> <?=  $view['date']?> </p>
              <a class="news" href="../news/new?id=<?= $view['id']?>">
            </div>
                <p class="text-article">
                  <?= substr($view['description'], 0, 380).'...'?>
                </p>
              </a>
          </article>
            
            <?php endwhile; ?>
      
        </div>
      </div>
    </div>
  </main>

<?php include_once '../components/footer.php'; ?>



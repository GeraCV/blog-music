
<?php require_once '../functions/conexion.php'; ?>
<?php require_once '../functions/functions.php'; ?>

<?php require_once '../components/beggining-html.php';?>
<?php require_once '../components/header.php';?>
<?php require_once '../components/nav.php';?>

  <main class="main">
    <div class="container-sections">
      <div class="section-principal">
        <div class="container-articles">  
          <article class="article article-full">
            <h2 class="title-section"> <?= $new_assoc['title']?>  </h2>
            <span class=" s-n"> <?=  $new_assoc['user-name']?> | </span>
            <span class=" s-n"> <?=  $new_assoc['name']?> | </span>
            <span class=" s-n"> <?=  $new_assoc['date']?> </span>
            <p class=" t-n">
              <?= $new_assoc['description']?>
            </p>
          </article> 
        </div>
      </div>
        <?php include_once '../components/register-login.php';?>
    </div>
  </main>
  <?php include_once '../components/footer.php'; ?>


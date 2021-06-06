<?php require_once '../functions/conexion.php'; ?>
<?php require_once '../functions/functions.php'; ?>

<?php require_once '../components/beggining-html.php';?>
<?php require_once '../components/header.php';?>
<?php require_once '../components/nav.php';?>

  <main class="main">
    <div class="container-sections" >
      <div class="section-principal container-new-gender">
        <?php
          $idCategory = intval($_GET['id']);
          $name_category = getNameCategory($db, $idCategory); 
          $name_category_assoc = mysqli_fetch_assoc($name_category);  
        ?>
          
        <h2 class="title-section"> Noticias de <?= $name_category_assoc['name']?>  </h2>
        <div class="container-articles">
             <?php   
               $categories = getCategory($db, $idCategory);
               if( mysqli_fetch_assoc($categories) === null) {
                  header('Location: ../index.php');
                }
                $posts = getLastPost($db);
                while ($category = mysqli_fetch_assoc($categories)):
             ?>
          <article class="article">
            <h3 class="title-article"> <?=  $category['title']?> </h3>
            <div class="container-information-post">
              <p class="subtitle"> <?=  $category['user-name']?> | </p> 
              <p class="subtitle"> <?=  $category['name']?> | </p> 
              <p class="subtitle"> <?=  $category['date']?> </p>
              <div class="container-information-post">
              <p class="text-article">
                <?= substr($category['description'], 0, 380).'...'?>
              </p>
          </article>        
            <?php endwhile; ?>
        </div>
      </div>
    </div>
  </main>
  <?php include_once '../components/footer.php'; ?>



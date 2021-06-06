<?php require_once '../functions/conexion.php';?>
<?php require_once '../functions/functions.php';?>


  <nav class="nav">
    <ul class="menu " id="menu" >
      <li class="item"><a href="../index.php" class="enlace-item"> Inicio </a></li>
      <li class="item"><a href="./loginandregister.php" class="enlace-item"> Registrate </a></li>
      <li class="item"><a href="./loginandregister.php" class="enlace-item"> Inicia sesión </a></li>
         <?php $categories = getCategories($db) ?>
          <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
      <li class="item"><a href="../pages/category?id=<?= $category['id']?>" class="enlace-item"> <?= $category['name']?> </a></li>
          <?php endwhile; ?>
      <li class="item"><a href="#" class="enlace-item"> Nosotros </a></li>
      <li class="item"><a href="#" class="enlace-item"> Contacto </a></li>
    </ul>
  </nav>

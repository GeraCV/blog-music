<?php require_once '../functions/conexion.php'; ?>
<?php require_once '../functions/errors.php'; ?>
<?php require_once '../functions/functions.php'; ?>

<?php if(isset($_SESSION['user_active'])): ?>

<?php require_once '../components/beggining-html.php';?>
<?php require_once '../components/header.php';?>
<?php require_once '../components/nav.php';?>

  <main class="main">
    <div class="container-sections" >
      <div class="section-principal">
        <div class="container-form-create-post ">
          <h2 class="title-create-post"> Crear nuevo post  </h2>
              
            <?php echo isset($_SESSION['correct_post']) ? $_SESSION['correct_post']: ''?>   
            <?php echo isset($_SESSION['incorrect_post']) ? $_SESSION['incorrect_post']  : ''?>
              
          <form class="form-create-post" action="../functions/create-post.php" method="POST">
            <div class="c-c-p">
              <p class="text-form-post"> Elige una categoría </p>
              <select name="category" class="select-post">
              <option value=""> Categoria </option> 

                <?php $categories = getCategories($db) ?>
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>

              <option 
                value="<?= $category['id'] ?>"> <?= $category['name'] ?> 
              </option>
                <?php endwhile; ?>   
              </select>
                      
                <?php echo isset($_SESSION['createPostErrors']['category']) ? showErrors($_SESSION['createPostErrors'], 'category') : ''?>
                  
            </div>
            <div class="c-c-p">
              <p class="text-form-post"> Escribe un titulo </p>
              <input type= "title" name="title" class="inpt"/>
                  
                <?php echo isset($_SESSION['createPostErrors']['title']) ? showErrors($_SESSION['createPostErrors'], 'title') : ''?>
                <?php echo isset($_SESSION['createPostErrors']['title_error']) ? showErrors($_SESSION['createPostErrors'], 'title_error') : ''?>
                  
            </div>
            <div class="c-c-p">
              <p class="text-form-post"> Descripción </p>
              <textarea name="description"> </textarea> 
                  
                <?php echo isset($_SESSION['createPostErrors']['description']) ? showErrors($_SESSION['createPostErrors'], 'description') : ''?>
                <?php echo isset($_SESSION['createPostErrors']['description_error']) ? showErrors($_SESSION['createPostErrors'], 'description_error') : ''?>
            </div>
            <div class="c-c-p">
              <button class="button btn-post"> Crear post </button>
            </div>
          </form>              
        </div>
      </div>  
    </div>
  </main>

<?php include_once '../components/footer.php'; ?>

<?php deleteErrors();?>

<?php endif; ?>

<?php if(!isset($_SESSION['user_active'])): ?>
<?php header('Location: ../index.php')  ?>
<?php endif; ?>



<?php require_once '../functions/conexion.php'; ?>
<?php require_once '../functions/errors.php'; ?>

<?php if(isset($_SESSION['user_active'])): ?>

<?php require_once '../components/beggining-html.php';?>
<?php require_once '../components/header.php';?>
<?php require_once '../components/nav.php';?>

  <main class="main">
    <div class="container-sections" >
      <div class="section-principal">
        <div class="container-form-update-data">
          <h2 class="title-update"> Actualizar mi información. </h2>
             
            <?php echo isset($_SESSION['user_incorrect']) ? $_SESSION['user_incorrect'] : '';?>
            <?php echo isset($_SESSION['update_data']) ? $_SESSION['update_data'] : '';?>   

          <form class="form-update" action="../functions/update.php" method="POST">

            <div class="c-u-d">
                <?php echo isset($_SESSION['errors_update']['error_update_name']) ? showErrors($_SESSION['errors_update'], 'error_update_name') : ''?>
              <p class="text-update"> Nombre </p> 
              <input class="inpt inpt-update" type="text" name="name" />
            </div>

            <div class="c-u-d">
                <?php echo isset($_SESSION['errors_update']['error_update_surnames']) ? showErrors($_SESSION['errors_update'], 'error_update_surnames') : ''?>
              <p class="text-update"> Apellidos </p>  
              <input class="inpt inpt-update" type="text" name="surnames" />
            </div>

            <div class="c-u-d">
                <?php echo isset($_SESSION['errors_update']['error_update_email']) ? showErrors($_SESSION['errors_update'], 'error_update_email') : ''?>         
              <p class="text-update"> Email </p>  
              <input class="inpt inpt-update" type="text" name="email" />
            </div>

            <div class="c-u-d container-password">
                <?php echo isset($_SESSION['errors_update']['error_update_newpassword']) ? showErrors($_SESSION['errors_update'], 'error_update_newpassword') : ''?>             
              <div>
                <p class="text-update"> Password nuevo </p>
                <input class="inpt inpt-update" type="password" name="newpassword" />
              </div>
              <div>
                <p class="text-update"> Password actual. (OBLIGATORIO) </p>
                <input class="inpt inpt-update" type="password" name="actuallypassword" />
              </div>            
            </div>      
            <button class="button btn-post btn-update"> Actualizar </button>
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



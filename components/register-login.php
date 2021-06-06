<?php require_once '../functions/conexion.php'; ?>
<?php require_once '../functions/errors.php'; ?>

  <div class="second-section">
    <?php #var_dump($_SESSION)?>
    <?php  if(isset($_SESSION['user_active'])): ?>
        
      <p class="user"> Bienvenido 
         <?php  echo $_SESSION['user_active']['name'] ?>
      </p>
      <a href="../pages/news.php" class="btn-loged"> Ver todas las noticias </a> 
      <a href="../pages/principal.php" class="btn-loged"> Últimas noticias </a> 
      <a href="../pages/crear-post.php" class="btn-loged"> Crear post </a>
      <a href="../pages/update-data.php" class="btn-loged"> Editar datos </a>
      <a href="../functions/logaoutsesion.php" class="logaut btn-loged"> Cerrar sesión </a>  
    
    <?php endif; ?>
            
    <?php if(!isset($_SESSION['user_active'])):?>
      <div class="container-text-register-login">
        <h2 class="title-section-forms"> Registrate o inicia sesión </h2>
      </div>
      <form action="../functions/login.php" method="POST" class="form-login form" id="form-login">

        <h3 class="title-form"> Ingresar: </h3>
        
          <?php echo isset($_SESSION['emptyFieldLogin']['email']) ? showErrors($_SESSION['emptyFieldLogin'], 'email') : ''?>

          <?php echo isset($_SESSION['login_error']) ? $_SESSION['login_error'] : ''?> 
        
        <input class="inpt" type="email" name="email" placeholder="Ingresa tu nombre de usuario"/>
        
          <?php echo isset($_SESSION['emptyFieldLogin']['password']) ? showErrors($_SESSION['emptyFieldLogin'], 'password') : ''?>
        
          <?php echo isset($_SESSION['errorsLogin']['password']) ? showErrors($_SESSION['errorsLogin'], 'password') : ''?> 
        
        <input class="inpt" type="password" name="password" placeholder="Ingresa tu contraseña"/>
        
        <button class="button"> Ingresar </button>

      </form>

      <form action="../functions/register.php" method="POST" class="form-login form" id="form-login">
              
        <h3 class="title-form"> Registrate: </h3> 

          <?php echo isset($_SESSION['successfulRegistration']) ? $_SESSION['successfulRegistration'] : ''?>
          <?php echo isset($_SESSION['errorRegistration']) ? $_SESSION['errorRegistration'] : ''?>
        
          <?php echo isset($_SESSION['emptyField']['name']) ? showErrors($_SESSION['emptyField'], 'name') : ''?>
        
          <?php echo isset($_SESSION['errorsRegister']['name']) ? showErrors($_SESSION['errorsRegister'], 'name') : ''?>
        
        <input class="inpt" type="text" name="name" placeholder="Ingresa tu nombre de usuario"/>
        
          <?php echo isset($_SESSION['emptyField']['surnames']) ? showErrors($_SESSION['emptyField'], 'surnames') : ''?>
        
          <?php echo isset($_SESSION['errorsRegister']['surnames']) ? showErrors($_SESSION['errorsRegister'], 'surnames') : ''?> 
        
        <input class="inpt" type="text" name="surnames" placeholder="Ingresa tus apellidos"/>
        
        
          <?php echo isset($_SESSION['emptyField']['email']) ? showErrors($_SESSION['emptyField'], 'email') : ''?>
        
          <?php echo isset($_SESSION['errorsRegister']['email']) ? showErrors($_SESSION['errorsRegister'], 'email') : ''?> 
        
        <input class="inpt" type="email" name="email" placeholder="Ingresa tu email"/>
        
        
          <?php echo isset($_SESSION['emptyField']['password']) ? showErrors($_SESSION['emptyField'], 'password') : ''?>
        
          <?php echo isset($_SESSION['errorsRegister']['password']) ? showErrors($_SESSION['errorsRegister'], 'password') : ''?> 
        
        <input class="inpt" type="password" name="password" placeholder="Ingresa tu contraseña"/>

        <button class="button"> Ingresar </button>
      </form>

    <?php deleteErrors();?>
    <?php endif;?>
  </div>


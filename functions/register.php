<?php

require_once './conexion.php';

if(isset($_POST)){
    
    $emptyField = [];
    
    #VERIFICAR SI LOS CAMPOS VIENEN VACÍOS
    
    empty($_POST['name']) 
        ? $emptyField['name'] = 'Tu nombre está vacío.'
        : $nameRegister = trim($_POST['name']);
    
    empty($_POST['surnames']) 
        ? $emptyField['surnames'] = 'Tus apellidos están vacíos.'
        : $surnamesRegister = trim($_POST['surnames']); 
    
    empty($_POST['password']) 
        ? $emptyField['password'] = 'Ingresa un password.'
        : $passwordRegister = trim($_POST['password']);
    
    #VALIDAND QUE LOS CAMPOS SEAN CORRECTOS
        
  #  if(count($emptyField) === 0) {
        
        $errorsRegister = []; 
        
        preg_match("/[0-9]/", $nameRegister)
           ? $errorsRegister['name'] = 'Tu nombre no es válido, favor de no incluir numeros.'
           : '';

        preg_match("/[0-9]/", $surnamesRegister)
            ? $errorsRegister['surnames'] = 'Tus apellidos no son válidos, favor de no incluir numeros.'
            : ''; 

        strpos($_POST['email'],'@') !== false
         ? ''
         : $errorsRegister['email'] = 'Tu email está vacío o falta incluir una @.';
  
                 
                
        isset($passwordRegister) && strlen($passwordRegister) < 5 
           ? $errorsRegister['password'] = 'Tu contraseña debe incluir mas de 5 caracteres.'
           : '';
          
    
    
        if(count($errorsRegister) === 0 && count($emptyField) === 0) {
            
            $encrypted_password = password_hash($passwordRegister, PASSWORD_BCRYPT, ['cost'=>4]);
            $emailRegister = $_POST['email'];
            $query = "INSERT INTO users VALUES (NULL, '$nameRegister', '$surnamesRegister', '$emailRegister', '$encrypted_password', CURDATE());";
            $inserData = mysqli_query($db, $query);

            if($inserData) {
             $successRegistration = $_SESSION['successfulRegistration'] = 'Tu registro se realizó exitosamente.';
            }else {
                 $errorRegistration = $_SESSION['errorRegistration'] = 'Error al registrarte, intentalo nuevamanete.';
            }
            
            header('Location: ../pages/loginandregister.php');
        }
    
        if(count($errorsRegister) >= 1){
            $_SESSION['errorsRegister'] = $errorsRegister;
            header('Location: ../pages/loginandregister.php');
        }
  #  } 
    
    if(count($emptyField) >= 1) {
        $_SESSION['emptyField'] = $emptyField;
        header('Location: ../pages/loginandregister.php');
    }             
}
?>

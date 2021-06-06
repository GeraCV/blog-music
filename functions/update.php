<?php 

require_once './conexion.php';

if(isset($_POST)) {
        
    !empty($_POST['name'])
        ? $nameUpdate = $_POST['name']
        : '';
              
    !empty($_POST['surnames'])
        ? $surnamesUpdate = $_POST['surnames']
        : '';
            
    !empty($_POST['email'])
        ? $emailUpdate = $_POST['email']
        : '';
            
    !empty($_POST['newpassword'])
        ? $newpassword = $_POST['newpassword']
        : '';
    
    !empty($_POST['actuallypassword'])
        ? $actuallypassword = $_POST['actuallypassword']
        : '';
    
    $password_user = $_SESSION['user_active']['password'];
     $user_id = intval($_SESSION['user_active']['id']);
    
     if(password_verify($actuallypassword, $password_user)) {
         
         $errorsUpdate = [];
         
         if(isset($nameUpdate) && !preg_match("/[0-9]/", $nameUpdate)) {
             $update_name = "UPDATE users SET name='$nameUpdate' WHERE id=$user_id;";
             $data_name = mysqli_query($db, $update_name);
             $_SESSION['update_data'] = 'Información actualizada.';
             
         } elseif(preg_match("/[0-9]/", $nameUpdate)) {
             $errorsUpdate['error_update_name'] = 'No puede contener números.';
             
         } else {
             '';
         }
         
         
         if(isset($surnamesUpdate) && !preg_match("/[0-9]/", $surnamesUpdate)) {
             $update_surnames = "UPDATE users SET surnames='$surnamesUpdate' WHERE id=$user_id;";
             $data_surnames = mysqli_query($db, $update_surnames);
             $_SESSION['update_data'] = 'Información actualizada.';
             
         } elseif(preg_match("/[0-9]/", $surnamesUpdate)) {
             $errorsUpdate['error_update_name'] = 'No puede contener números.';
             
         } else {
             '';
         }
          
         
         if(isset($emailUpdate) && strpos($emailUpdate,'@') !== false) {
             $update_email = "UPDATE users SET email='$emailUpdate' WHERE id=$user_id;";
             $data_email = mysqli_query($db, $update_email); 
             $_SESSION['update_data'] = 'Información actualizada.';
         }elseif(isset($emailUpdate) && !strpos($emailUpdate,'@') !== false) {
             $errorsUpdate['error_update_email'] = 'Debe contener @.';
         }elseif(!isset($emailUpdate)) {
             '';
         }else {
             '';
         }
         
           if(isset($newpassword) && !strlen($newpassword) < 5 ) {
               
             $newpassword_encrypted = password_hash($newpassword, PASSWORD_BCRYPT, ['cost'=>4]);
             $update_newpassword = "UPDATE users SET password='$newpassword_encrypted' WHERE id=$user_id;";
             $data_name = mysqli_query($db, $update_newpassword);
             $_SESSION['update_data'] = 'Información actualizada.';
             
         } elseif(strlen($newpassword) < 5) {
             $errorsUpdate['error_update_newpassword'] = 'Debe incluir mas de 5 caracteres.';
     
         } else {
             '';
         }
         
      
        
         $_SESSION['errors_update'] = $errorsUpdate;
         
          header('Location: ../pages/update-data');
          
     } else {
        $_SESSION['user_incorrect'] = 'La contraseña es incorrecta.';
        header('Location: ../pages/update-data');
     }         
}

?>

<?php 

require_once './conexion.php';

if(isset($_POST)) {
    
    $emptyFieldLogin = [];
      
    empty($_POST['password']) 
        ? $emptyFieldLogin['password'] = 'Ingresa un password.'
        : $passwordLogin = $_POST['password'];
    
    
    strpos($_POST['email'],'@') !== false
       ? $email = $_POST['email']
       : $emptyFieldLogin['email'] = 'Tu email está vacío o falta incluir una @.';

               
    
    if(count($emptyFieldLogin) === 0) {
            
        $get_data = "SELECT * from users WHERE email = '$email';";
        $data_user = mysqli_query($db, $get_data);
        $user = mysqli_fetch_assoc($data_user);
            
        $password_verify = password_verify($passwordLogin, $user['password']);
        if($user['email'] == $_POST['email'] && $user['password'] == $password_verify) {
            $_SESSION['user_active'] = $user;
          
             header('Location: ../pages/loginandregister.php');   
        } 
        
        
        if($user['email'] != $_POST['email'] || $user['password'] != $password_verify) {
            $_SESSION['login_error'] = 'Alguno de los datos es incorrecto. Intentalo nuevamente.';
            header('Location: ../pages/loginandregister.php'); 
        }
                   
     }
     
    if(count($emptyFieldLogin) >= 1) {
        $_SESSION['emptyFieldLogin'] = $emptyFieldLogin;
        header('Location: ../pages/loginandregister.php');
    }        
     
}
?>
<?php 

require_once './conexion.php';

if(isset($_POST)) {
    
     $createPostErrors = [];
             
    empty($_POST['category']) 
        ? $createPostErrors['category'] = 'Elige una categoria.'
        : $category = intval($_POST['category']);
      
    empty($_POST['title']) 
        ? $createPostErrors['title'] = 'Campo vacío.'
        : $title = trim($_POST['title']);
    
    empty($_POST['description']) 
        ? $createPostErrors['description'] = 'Campo vacío.'
        : $description = trim($_POST['description']);
    
   
    if(isset($title) && (strlen($title) <= 20)){
        $createPostErrors['title_error'] = 'Tu titulo debe de contener mas de 20 caractéres.'; 
    }
    
        if(isset($description) && (strlen($description) <= 100)){
        $createPostErrors['description_error'] = 'Ingresa mas texto, minimo 500 caractéres.';
    }
     
    if(count($createPostErrors) === 0) {
       
        $user_id = $_SESSION['user_active']['id'];
        $queryCreatePost = "INSERT INTO post VALUES(NULL, '$user_id', $category, '$title', '$description',  CURDATE());";
        $sendData = mysqli_query($db, $queryCreatePost); 
        if($sendData) {
            $_SESSION['correct_post'] = 'Tu post se creó exitosamente';
        } else {
            $_SESSION['incorrect_post'] = 'Hubo un error al crear tu post. Intentalo nuevamente.';
        }  
        
        header('Location: ../pages/crear-post.php');
    }
    
    if(count($createPostErrors) >= 1) {
    $_SESSION['createPostErrors'] = $createPostErrors;
        header('Location: ../pages/crear-post.php');
    
    }
}

?>






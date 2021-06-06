<?php 
 function showErrors($errors, $nameError) {
     $error = '';
    if(isset($errors[$nameError])){
        echo '<p class="message-error">'.$errors[$nameError].'</p>';
    } else {
        return $error;
    }
}

function deleteErrors() {
    if(isset($_SESSION['errorsRegister'])) {
       unset($_SESSION['errorsRegister']); 
    } 

    if(isset($_SESSION['emptyField'])) {
       unset($_SESSION['emptyField']); 
    } 
    
     if(isset($_SESSION['successfulRegistration'])) {
       unset($_SESSION['successfulRegistration']); 
    } 
    
     if(isset($_SESSION['errorRegistration'])) {
       unset($_SESSION['errorRegistration']); 
    } 
    
    if(isset($_SESSION['emptyFieldLogin'])) {
       unset($_SESSION['emptyFieldLogin']); 
    } 
    
    if(isset($_SESSION['errorsLogin'])) {
       unset($_SESSION['errorsLogin']); 
    } 
    
     if(isset($_SESSION['login_error'])) {
       unset($_SESSION['login_error']); 
    } 
    
    if(isset($_SESSION['createPostErrors'])) {
       unset($_SESSION['createPostErrors']); 
    } 
    
    if(isset($_SESSION['correct_post'])) {
       unset($_SESSION['correct_post']); 
    } 
    
    if(isset($_SESSION['incorrect_post'])) {
       unset($_SESSION['incorrect_post']); 
    } 
    
     if(isset($_SESSION['user_incorrect'])) {
       unset($_SESSION['user_incorrect']); 
    } 
    
      if(isset($_SESSION['errors_update'])) {
       unset($_SESSION['errors_update']); 
    } 
    
     if(isset($_SESSION['update_data'])) {
       unset($_SESSION['update_data']); 
    } 
}
?>
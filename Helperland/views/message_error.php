<?php
function flash($name = '', $message = '', $class = 'form-message form-message-red text-danger text-left'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }else if(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : $class;
            echo '<div class="'.$class.'" ><strong>'.$_SESSION[$name].'</strong></div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
           
           
        }
    }
}

function redirect($location){
    header("location: ".$location);
    exit();
}
?>

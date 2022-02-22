<?php
    //redirect to page
function redirect($page = false, $message = null, $message_type = null){
    if(is_string($page)){
        $location = $page ;
    }else{
        $location = $_SERVER['SCRIPT_NAME'];
    }
    //check for massage
    if($message != null){
        $_SESSION['message'] = $message;

    }
    //check for massage type
    if($message_type != null){
        $_SESSION['message_type'] = $message_type;
    }

    header('Location: '.$location);
    exit;
}
// display function
function display(){
    //assign massage var
    if(!empty($_SESSION['message'])){
        $message = $_SESSION['message'];
        //assign massage type var
        if(!empty($_SESSION['message_type'])){
            $message_type = $_SESSION['message_type'];
        
        // create out put                                                                                                          
            if($message_type == 'error'){
                 echo  '<div session-feed-error">' . $message . '</div>';
            } elseif ($message_type == 'warning') {
                echo  '<div class="session-feed-warning">' . $message . '</div>';
            } else {
                echo  '<div class="session-feed-success">' . $message . '</div>';
            }
            
        }
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);

    }else{
        echo ''; 
    }
    


}
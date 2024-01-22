<?php 
    
    ob_start();
    include('config.php');

    if(Classes::logado() == false){
        include('login.php');
    }else{
        include('chat.php');
    }

    ob_end_flush();
?>
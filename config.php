<?php 
    	session_start();
        date_default_timezone_set('America/Sao_Paulo');
        $autoload = function($class){
            if($class == 'Email'){
    
                require_once('classes/phpmailer/PHPMailerAutoload.php');
            }
            include('classes/'.$class.'.php');
        };
    
        spl_autoload_register($autoload);
    
    
        define('INCLUDE_PATH','http://localhost/chat_virtual/');
        define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    
        define('BASE_DIR_PAINEL',__DIR__.'/painel');
    
    
        //Conectar com banco de dados!
        define('HOST','localhost');
        define('USER','root');
        define('PASSWORD','');
        define('DATABASE','chat_virtual');
    
        //Constantes para o painel de controle
        define('NOME_EMPRESA','EP');
?>
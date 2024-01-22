<?php 
    class Classes{
        public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

        public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

    }
?>
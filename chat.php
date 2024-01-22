<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>chat</title>

</head>
<body>
    <header>
        <a href="#"><i class="fa-solid fa-arrow-left"></i></a> 
        <div class="perfil"> 
            <a href="#"><img src="img/7136522.png" alt="foto de perfil"></a>
            <p><?php echo $_SESSION['nome']; ?></p>
        </div> 
        <a href="#"><i class="fa-solid fa-video"></i></a>
    </header>
        <div class="content-box">
        <div class="box-chat-online">
        <?php 
            $mensagens = MySql::conectar()->prepare("SELECT * FROM `tb_site.mensagem` ORDER BY id DESC LIMIT 10");
            $mensagens->execute();
            $mensagens = $mensagens->fetchAll();
            $mensagens = array_reverse($mensagens);
            foreach ($mensagens as $key => $value) { 
                $nomeUsuario = MySql::conectar()->prepare("SELECT nome FROM `tb_site.usuarios` WHERE id = $value[user_id]");
                $nomeUsuario->execute();
                $nomeUsuario = $nomeUsuario->fetch()['nome'];           
                $lastId = $value['id'];

        ?>
            <div class="mensagem-chat">
                    <span><?php echo $nomeUsuario ?></span>
                    <p><?php echo $value['mensagem'] ?></p>
            </div><!--mensagem-chat-->
         <?php 
        $_SESSION['lastIdChat'] = $lastId;
        } ?>
        
        </div>    
            <form method="post" action="<?php echo INCLUDE_PATH ?>ajax/chat.php">
                <a href="#"><i class="fa-solid fa-camera"></i></a>
                <textarea name="mensagem" placeholder="Mensagem..." cols="2" rows="1"></textarea>
                <a href="#"><i class="fa-solid fa-image"></i></a>
                <a href="#"><i class="fa-regular fa-heart"></i></a>

                <input type="submit" name="acao" value="Enviar!">
            </form>
        </div>

    <script src="js/jquery.js"></script>
    <script src="js/chat.js"></script>
</body>
</html>
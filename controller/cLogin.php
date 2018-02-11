<?php
    session_start();
    
    //require_once "../model/mLogin.class.php";
    //require_once "../model/mConexao.class.php";
    require "cAutoload.php";
    if (isset($_POST['ok'])):
        
        $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);

        $senha = sha1($senha).strlen($login);
        
        $l = new Login;
        $l->setLogin($login);
        $l->setSenha($senha);
        
        if($l->logar()):
            header("Location: ../home.php?menu=home");
        else:
            $erro = "Erro ao logar";
        endif;
    endif;
        
    if(isset($_SESSION['logado'])):
        //header("Location: view/body/home.php");
        //echo '<script> window.location.href = "http://localhost/ProjectErp/view/body/home.php" <script>';
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/ProjectErp/home.php?menu=home">';
    else: 
        header("Location: ../index.php");
    endif;
?>

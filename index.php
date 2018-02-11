<?php
    //INICIO A SESSÃO
    session_start();
    $servidor = "localhost";
    $projeto = "ProjectErp";
    
    //Verifico se o usuário está logado no sistema
    if(isset($_SESSION['logado']))
    {
        //header("Location: ?menu=home");
        header("Location: home.php?menu=home");
        //header("Location: http://". $servidor . "/". $projeto ."/view/body/home.php");
        //echo '<script language= "JavaScript">location.href="http://'. $servidor .'/'. $projeto . '/?menu=home"</script>';

        //require_once ("view/body/home.php");
    }
    else{
        include ("view/login/login.php");
    }

?>
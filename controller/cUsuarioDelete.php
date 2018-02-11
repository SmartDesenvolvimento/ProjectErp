<?php
    require ("cAutoload.php");

    $Message = new Message;

    $Usuario = new Usuario;

    $location = "<script>
                    location.href = '../home.php?menu=usuario_lista&acao=usuario_listar';
                </script>";

    if (isset($_POST)){
        $idUsuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];

        $Usuario->SetIdUsuario($idUsuario);
        $Usuario->SetStatus(0);

        $resultUpdate = $Usuario->UsuarioUpdateStatus();

        if ($resultUpdate > 0){
            $Message->Alert("Usuário: $nome inativado com sucesso.");
        }
        else{
            $Message->Alert("Falha ao inativar Usuário: $nome !");
        }

        echo($location);

    }
    else{
        $Message->Alert("Nenhum dado encontrado para deletar!");

        echo($location);
    }
?>
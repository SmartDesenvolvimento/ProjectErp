<?php
    require ("cAutoload.php");

    $Message = new Message;

    $Cliente = new Cliente;

    $location = "<script>
                    location.href = '../home.php?menu=clientelistar&acao=clientelistar';
                </script>";

    if (isset($_POST)){
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];

        $Cliente->setCodigo($codigo);
        $Cliente->setStatus(0);

        $resultUpdate = $Cliente->UpdateClienteStatus();

        if ($resultUpdate > 0)
        {
            $Message->Alert("Cliente: $nome inativado com sucesso.");

        }
        else{
            $Message->Alert("Falha ao inativar Cliente: $nome !");
        }
        echo ($location);
    }
    else{
        $Message->Alert("Nenhum dado encontrado para deletar!");

        echo($location);
    }
?>
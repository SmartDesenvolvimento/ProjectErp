<?php
    require ("cAutoload.php");

    $Message = new Message;

    $Cidade = new Cidade;

    $Usuario = new Usuario;

    $location = "<script>
                    location.href = '../home.php?menu=usuario_lista&acao=usuario_listar';
                </script>";

    if (isset($_POST))
    {
        $idUsuario = $_POST['id_usuario'];
        $codigoUsuario = $_POST['codigo_usuario'];
        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $dataNascimento = $_POST['datanasc'];
        $estado = $_POST['estado'];
        $cidadePost = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        $existsEstado = $Cidade->GetCidadeByNomeCidadeByEstado($cidadePost, $estado);

        if ($existsEstado->rowCount() < 1)
        {
                $Message->Alert("Não existe cidade: $cidadePost vinculada ao estado selecionado!");
                
                echo ($location);
                //header("Location: ../home.php?menu=clientelistar&acao=clientelistar&sucesso=false&cod=1&message=$cidadePost");
        }
        else{
            while($rowResult = $existsEstado->fetch(PDO::FETCH_OBJ)){
                $cidadeGet = $rowResult->ID;
            }

            $Usuario->SetCodigoUsuario($codigoUsuario);
            $Usuario->SetNome($nome);
            $Usuario->SetCidade($cidadeGet);
            $Usuario->SetEndereco($endereco);
            $Usuario->SetEstado($estado);
            $Usuario->SetRg($rg);
            $Usuario->SetTelefone($telefone);
            $Usuario->SetDataNasc($dataNascimento);
            $Usuario->SetEmail($email);
            $Usuario->SetCpf($cpf);
            $Usuario->SetIdUsuario($idUsuario);

            $resultUpdate = $Usuario->UsuarioUpdate();

            if ($resultUpdate > 0)
            {
                $Message->Alert("Usuário: $nome alterado com sucesso.");

                echo ($location);
            }
            else{
                $Message->Alert("Falaha ao alterar Usuário: $nome !");

                echo ($location);
            }
        }
        
    }
    else{
        $Message->Alert("Nenhum dado encontrado para alteração!");

        echo ($location);
    }
?>
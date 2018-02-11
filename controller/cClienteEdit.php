<?php
        require ("cAutoload.php");

        $Message = new Message;

        $Cidade = new Cidade;

        $Cliente = new Cliente;

        $location = "<script>
                                location.href = '../home.php?menu=clientelistar&acao=clientelistar';
                        </script>";

        if (isset($_POST))
        {
                $codigo = $_POST['codigo'];
                $nome = $_POST['nome'];
                $tipoPessoa = $_POST['tipo_pessoa'];
                $rg = $_POST['rg'];
                $cpf = $_POST['cpf'];
                $dataNascimento = $_POST['dataNasc'];
                $estado = $_POST['estado'];
                $cidadePost = $_POST['cidade'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['tel'];
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

                        $Cliente->setCodigo($codigo);
                        $Cliente->setName($nome);
                        $Cliente->setTypePerson($tipoPessoa);
                        $Cliente->setRg($rg);
                        $Cliente->setCpf($cpf);
                        $Cliente->setState($estado);
                        $Cliente->setCity($cidadeGet);
                        $Cliente->setAdress($endereco);
                        $Cliente->setPhone($telefone);
                        $Cliente->setEmail($email);
                        $Cliente->setBirthDate($dataNascimento);

                        $Cliente->UpdateClient();

                        $Message->Alert("Cliente: $nome alterado com sucesso!");

                        echo ($location);
                }



        }
        else{
                $Message->Alert("Nenhum dado encontrado para alteração!");

                echo ($location);

        }
?>
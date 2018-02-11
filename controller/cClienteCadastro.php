<?php
    require 'cAutoload.php';

    $nome= $_POST ['nome'];
    $tipo_pessoa = $_POST['tipo_pessoa'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf_ie'];
    $estado= $_POST ['estado'];
    $cidade= $_POST ['cidade'];
    $endereco= $_POST ['endereco'];
    $tel= $_POST ['tel'];
    $email= $_POST ['email'];   
    $dataNasc = $_POST ['dataNasc'];
    $user = $_GET['action'];
    
    $cliente = new Cliente;
    $message = new Message;

    $cliente->setName($nome);
    $cliente->setTypePerson($tipo_pessoa);
    $cliente->setRg($rg);
    $cliente->setCity($cidade);
    $cliente->setCpf($cpf);
    $cliente->setState($estado);
    $cliente->setAdress($endereco);
    $cliente->setPhone($tel);
    $cliente->setEmail($email);
    $cliente->setBirthDate($dataNasc);
    $cliente->setUser($user);

    
    if($cliente->InsertClient()){
        header('Location: ../home.php?menu=clientecadastro&sucesso=true&cliente='.$nome);
    }
    else{
        header('Location: ../home.php?menu=clientecadastro&sucesso=false&cliente='.$nome);
    }
    
    

    exit;
    //echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/ProjectErp/view/body/home.php?menu=clientecadastro&acao=clientecadastro">';
    
    //echo $cliente->getName();



?>
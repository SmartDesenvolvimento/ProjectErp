<?php
date_default_timezone_set('America/Sao_Paulo');

use Dompdf\Dompdf;

if (isset($_POST['tipoCompromisso'])){
        $idTermoCompromisso = $_POST['tipoCompromisso'];
        $clienteForm = $_POST['cliente'];
        $micropigmentadorForm = $_POST['micropigmentador'];
        $descricaoDoencaForm = $_POST['descricaoDoenca'];
        $FormaPagamentoForm = $_POST['forma_pagamento'];

        if ($descricaoDoencaForm == '')
            $descricaoDoenca = "N/A";
        else
            $descricaoDoenca = $descricaoDoencaForm;
            

        require_once ("../model/Cliente.class.php");

        require_once ("../model/GeneratePDF.class.php");

        require_once ("../model/Usuario.class.php");

        $GeneratePDF = new GeneratePDF();
        
        $Cliente = new Cliente();

        $Usuario = new Usuario();
        
        $GetHtml =  $GeneratePDF->GetPdfByIdTipoCompromisso($idTermoCompromisso);

        $GetCliente = $Cliente->getList("CODIGO = $clienteForm", "1");

        $GetUsuario = $Usuario->getUsuarioByCodigoUsuario($micropigmentadorForm);

        while ($rowHtml = $GetHtml->fetch(PDO::FETCH_OBJ)){
            $html = $rowHtml->HTML;
        }

        while($rowCliente = $GetCliente->fetch(PDO::FETCH_OBJ)){
            $nomeCliente = $rowCliente->NOME;
            $identidateCliente = $rowCliente->RG_CNPJ;
            $cpfCliente = $rowCliente->CPF_IE;
        }

        while ($rowUsuario = $GetUsuario->fetch(PDO::FETCH_OBJ)){
            $micropigmentador = $rowUsuario->NOME;
        }

        //$date = new date();
        //$dateNow = date_format($date, 'g:ia \o\n l jS F Y');
        $dateNow = date('d-m-Y');

        $html = str_replace("@nome", $nomeCliente, $html);
        $html = str_replace("@rg", $identidateCliente, $html);
        $html = str_replace("@cpf", $cpfCliente, $html);
        $html = str_replace("@usuario", $micropigmentador, $html);
        $html = str_replace("@pagamento", $FormaPagamentoForm.'.', $html);
        $html = str_replace("@usuario", $micropigmentador, $html);
        $html = str_replace("@doenca", $descricaoDoenca.'.', $html);
        $html = str_replace("@localData", "Não-Me-Toque - RS / $dateNow", $html);

        require_once ("../pdf/autoload.inc.php");

        //ob_clean();//Limpa o buffer de saída

        //ob_start();

        //$arquivo = "TermoCompromisso.pdf";
        //$mpdf = new mPDF();
        //$mpdf->allow_charset_conversion = true;
        //$mpdf->charset_in = 'UTF-8';
        //$mpdf->SetDisplayMode('fullpage');
        //$mpdf->WriteHTML($html);
        //$mpdf->Output();

        //ob_end_clean();

        $dompdf = new DOMPDF();

        $dompdf->load_html($html);

        $dompdf->render();

        $dompdf->stream(
            "Termo_Compromisso_$nomeCliente.pdf",
            array("Attachment" => true)
        );

        header('Location: ../home.php?menu=termocompromisso');

        //exit();
    }
?>
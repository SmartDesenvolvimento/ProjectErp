<?php
    class GeneratePDF extends mConexao{
        public function HtmlPdf($nomeCliente, $identidadeCliente, $cpfCliente ,$descricaoTipoCompromisso){
            $dataAtual = date('d/m/y');
            
            $html = '<html>
                        <body>
                            <p style="text-align: center;">
                                <strong><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">TERMO DE COMPROMISSO</span></span></strong></p>
                            <p>
                                 </p>
                            <p>
                                 </p>
                            <p>
                                 </p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Eu '. $nomeCliente .', abaixo</span></span></p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">assinado(a), portador de cédula de identidade <strong>'. $identidadeCliente .'</strong> e inscrito(a)</span></span></p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">no CPF sob n° <strong>'. $cpfCliente .'</strong>, proprietário do</span></span></p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">estabelicimento <strong>ZNG Make Up & Hair</strong>, inscrito no CNPJ</span></span></p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">sob o n° <strong>931097218712097</strong>, <u>ESTOU CIENTE NO</u></span></span></p>
                            <p style="text-align: center;">
                                <u><span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">PROCESSO DE '. $descricaoTipoCompromisso .' QUE</span></span></u></p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><u>SERÁ REALIZADO</u>. e por ser a expressão da verdade, assino o presente,</span></span></p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">para que surta seus legai e jurídicos efeitos.</span></span></p>
                            <p>
                                 </p>
                            <p style="text-align: right;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Não-Me-Toque, RS, '. $dataAtual .'</span></span></p>
                            <p>
                                 </p>
                            <p>
                                 </p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;"><u>                                                                                                   </u></span></span></p>
                            <p style="text-align: center;">
                                <span style="font-size:16px;"><span style="font-family:arial,helvetica,sans-serif;">Assinatura Cliente</span></span></p>
                            <p style="text-align: right;">
                                 </p>
                            <p>
                                 </p>
                        </body>
                    </html>
                    ';

            return $html;
        }

        public function GetPdfByIdTipoCompromisso($id){
            $where = "WHERE ID_TIPO_COMPROMISSO = $id";

            return $this->GetPdf($where);
        }

        public function GetPdf($where){
            $pdo = parent::getDB();

            $query ="SELECT
                        ID
                        ,ID_TIPO_COMPROMISSO
                        ,HTML
                    FROM
                        TERMO_COMPROMISSO 
                    $where";

            $stmt = $pdo->prepare($query);

            $stmt->execute();

            return $stmt;
        }
    }
?>
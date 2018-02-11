<?php
    require_once "mConexao.class.php";

    class TermoCompromisso extends mConexao{

        //public function GetTipoCompromissoBy{}

        public function GetTipoCompromisso($where){
            try{
                $pdo = parent::getDB();

                $query = "SELECT
                             ID
                             ,TIPO
                             ,DESCRICAO
                         FROM
                             TIPOCOMPROMISSO "
                         . $where;
                
                $smtp = $pdo->prepare($query);
                $smtp->execute();
                return $smtp;

            }
            catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
?>
<?php

    class Cidade extends mConexao{

        public function GetCidadeByNomeCidadeByEstado($nomeCidade, $estado){
            $where = "WHERE NOME = '$nomeCidade' AND ESTADO = $estado";

            return $this->GetCidade($where);
        }

        public function GetCidade($where){
            $pdo = parent::getDB();

            $query = "SELECT 
                        ID
                        ,NOME
                        ,ESTADO
                     FROM
                        CIDADE
                     $where";

            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function getCityList($state){
            $pdo = parent::getDB();
            if(isset($state)){
                $sql = $pdo->prepare("SELECT ID, NOME FROM CIDADE WHERE ESTADO = ? ORDER BY NOME ASC");
                $sql->bindValue(1, $state);
                $sql->execute();
                //if ($sql->rowCount() == 1):
                //$dado = $sql->fetch(PDO::FETCH_OBJ);
                return $sql;       
            }
            else{
                echo '<script> alert("Estado não encontrado na base de dados!"); </script>';
            }  
            
        }
    }
?>
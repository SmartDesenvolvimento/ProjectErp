<?php
    //alterar pelo autoload
    require_once "mConexao.class.php";

    class Cliente extends mConexao{
        private $name;
        private $typePerson;
        private $rg;
        private $cpf;
        private $state;
        private $city;
        private $adress;
        private $phone;
        private $email;
        private $dataNasc;
        private $codigo;
        private $user;
        private $status;

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }

        public function setTypePerson($typePerson){
            $this->typePerson = $typePerson;
        }

        public function getTypePerson(){
            return $this->typePerson;
        }

        public function setRg($rg){
            $this->rg = $rg;
        }

        public function getRg(){
            return $this->rg;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setState($state){
            $this->state = $state;
        }

        public function getState(){
            return $this->state;
        }

        public function setCity($city){
            $this->city = $city;
        }

        public function getCity(){
            return $this->city;
        }

        public function setAdress($adress){
            $this->adress = $adress;
        }

        public function getAdress(){
            return $this->adress;
        }

        public function setPhone($phone){
            $this->phone = $phone;
        }

        public function getPhone(){
            return $this->phone;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setBirthDate($dataNasc){
            $this->dataNasc = $dataNasc;
        }

        public function getBirthDate(){
            return $this->dataNasc;
        }

        public function setUser($user){
            $this->user = $user;
        }

        public function getUser(){
            return $this->user;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function getStatus(){
            return $this->status;
        }

        public function InsertClient(){
            try{
                date_default_timezone_set('America/Sao_Paulo');
                $dataAtual = date("Y-m-d H:i:s");;
                $ativo = true;
                $pdo = parent::getDB();
                $query = "INSERT INTO CLIENTE(NOME
                                                ,CIDADE
                                                ,ENDERECO
                                                ,ESTADO
                                                ,TIPO_PESSOA
                                                ,RG_CNPJ
                                                ,CPF_IE
                                                ,DATA_INCLUSAO
                                                ,STATUS
                                                ,DATA_NASCIMENTO
                                                ,TELEFONE
                                                ,EMAIL
                                                ,USUARIO_INCLUSAO
                                                )
                                            VALUES
                                                (:NOME
                                                ,:CIDADE
                                                ,:ENDERECO
                                                ,:ESTADO
                                                ,:TIPO_PESSOA
                                                ,:RG_CNPJ
                                                ,:CPF_IE
                                                ,:DATA_INCLUSAO
                                                ,:STATUS
                                                ,:DATA_NASCIMENTO
                                                ,:TELEFONE
                                                ,:EMAIL
                                                ,:USUARIO_INCLUSAO
                                                )";
                $stmt = $pdo->prepare($query);
                $stmt->execute(array(':NOME' => $this->getName()
                ,':CIDADE' => $this->getCity()
                ,':ENDERECO' => $this->getAdress()
                ,':ESTADO' => $this->getState()
                ,':TIPO_PESSOA' => $this->getTypePerson()
                ,':RG_CNPJ' => $this->getRg()
                ,':CPF_IE' => $this->getCpf()
                ,':DATA_INCLUSAO' => $dataAtual
                ,':STATUS' => $ativo
                ,':DATA_NASCIMENTO' => $this->getBirthDate()
                ,':TELEFONE' => $this->getPhone()
                ,':EMAIL' => $this->getEmail()
                ,':USUARIO_INCLUSAO' => $this->getUser()
                )
                );

                return true;
            }


            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } 
        
        public function UpdateClient(){
            try{
                $pdo = parent::getDB();
                $update = "UPDATE CLIENTE
                            SET NOME = :NOME
                                ,CIDADE = :CIDADE
                                ,ENDERECO = :ENDERECO
                                ,ESTADO = :ESTADO
                                ,TIPO_PESSOA = :TIPO_PESSOA
                                ,RG_CNPJ = :RG_CNPJ
                                ,CPF_IE = :CPF_IE
                                ,DATA_NASCIMENTO = :DATA_NASCIMENTO
                                ,TELEFONE = :TELEFONE
                                ,EMAIL = :EMAIL
                            WHERE
                                CODIGO = :CODIGO";
                $stmt = $pdo->prepare($update);
                $stmt->execute(array(
                                    ':NOME' => $this->getName()
                                    ,':CIDADE' => $this->getCity()
                                    ,':ENDERECO' => $this->getAdress()
                                    ,':ESTADO' => $this->getState()
                                    ,':TIPO_PESSOA' => $this->getTypePerson()
                                    ,':RG_CNPJ' => $this->getRg()
                                    ,':CPF_IE' => $this->getCpf()
                                    ,':DATA_NASCIMENTO' => $this->getBirthDate()
                                    ,':TELEFONE' => $this->getPhone()
                                    ,':EMAIL' => $this->getEmail()
                                    ,':CODIGO' => $this->getCodigo()
                                    )
                );

                return $stmt->rowCount();
            }
            catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
            }
            
        }

        public function UpdateClienteStatus(){
            try{
                $pdo = parent::getDB();

                $query = "UPDATE CLIENTE
                            SET STATUS = :STATUS
                            WHERE CODIGO = :CODIGO";

                $stmt = $pdo->prepare($query);

                $stmt->execute(array(
                    ':STATUS' => $this->getStatus()
                    ,':CODIGO' => $this->getCodigo()
                ));

                return $stmt->rowCount();
            }
            catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function getList($where, $orderby){
            $pdo = parent::getDB();
            
            $select = "SELECT 
                        CLI.CODIGO
                        ,CLI.NOME
                        ,CLI.CIDADE
                        ,CID.NOME AS NOME_CIDADE
                        ,CLI.ENDERECO
                        ,CLI.ESTADO 
                        ,EST.NOME AS NOME_ESTADO
                        ,CLI.TIPO_PESSOA
                        ,CLI.RG_CNPJ
                        ,CLI.CPF_IE
                        ,CLI.DATA_INCLUSAO
                        ,DATE_FORMAT(CLI.DATA_INCLUSAO, '%d/%m/%Y %H:%i:%s') AS DATA_INCLUSAO_FORMAT
                        ,CLI.DATA_NASCIMENTO
                        ,DATE_FORMAT(CLI.DATA_NASCIMENTO, '%d/%m/%Y') AS DATA_NASCIMENTO_FORMAT
                        ,CLI.STATUS
                        ,CLI.TELEFONE
                        ,CLI.EMAIL
                    FROM 
                        CLIENTE AS CLI
                    LEFT JOIN
                        CIDADE AS CID 
                    ON
                        CID.ID = CLI.CIDADE
                    LEFT JOIN
                        ESTADO AS EST 
                    ON
                        EST.ID = CLI.ESTADO";

            if(empty($where) or $where == "null"){
                $sql = $select. " ORDER BY ".$orderby;
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                return $stmt;
            }
            else{
                $sql = $select." WHERE ".$where." ORDER BY ".$orderby;
                $stmt = $pdo->prepare($sql);                   
                $stmt->execute();
                return $stmt;
            }
           
        }

    }

?>

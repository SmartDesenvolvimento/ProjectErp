<?php
    abstract class mConexao {
        
     const USER = "root";
     const PASS = "";
    
     private static $instance = null;
    
     private static function conectar() {
    
        try {
            if (self::$instance == null):
                $dsn = "mysql:host=localhost;dbname=projecterp;charset=utf8";
                self::$instance = new PDO($dsn, self::USER, self::PASS);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            endif;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        return self::$instance;
     }
    
     protected static function getDB() {
         return self::conectar();
     }
    }
?>
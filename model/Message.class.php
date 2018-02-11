<?php
    class Message{

        public function Alert($message){
            
            echo ('<script>alert("'.$message.'");</script>');
                  
        }
    }

?>
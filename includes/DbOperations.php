<?php
    class DbOperations{
        
        private $con;

        function __construct(){
            
            require_once dirname(__FILE__).'/DbConnect.php';

            $db = new DbConnect();

            $this->con = $db->connect();
        }

        /*CRUD -> C -> CREATE */

        function createUser($username, $pass, $email){
            $password = md5($pass);
            $stmt = $this->con->prepare("INSERT INTO `users`(`username`, `password`, `email`) VALUES (?,?,?);");
            $stmt->bind_param("sss",$username,$password,$email);

            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
?>
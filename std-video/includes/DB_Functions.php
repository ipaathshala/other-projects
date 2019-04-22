<?php
    class DB_Functions{
        private $conn;
        function __construct(){
            require_once 'DB_Connect.php';
            $db = new Db_Connect();
            $this->conn = $db->connect();
        }
        function __destruct(){

        }

        /*Create admin*/
        public function newAdminAcc($username, $password){
            $uuid = uniqid('', true);
            $hash = $this->hashSSHA($password);
            $encrypted_password = $hash["encrypted"];
            $salt = $hash["salt"];

            $stmt = $this->conn->prepare("INSERT INTO `master_admin` (`unique_id`, `email`, `encrypted_password`, `salt`) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $uuid, $username, $encrypted_password, $salt);
            $result = $stmt->execute();
            $stmt->close();

            if($result){
                $stmt = $this->conn->prepare("SELECT * FROM `master_admin` WHERE email = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $user = $stmt->get_result()->fetch_assoc();
                $stmt->close();
                return $user;
            }
            else{
                return false;
            }
        }

        /**
        * Encrypting password
        * @param password
        * returns salt and encrypted password
        */
        public function hashSSHA($password){
            $salt = sha1(rand());
            $salt = substr($salt, 0, 10);
            $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
            $hash = array("salt" => $salt, "encrypted" => $encrypted);
            return $hash;
        }

        /**
        * Decrypting password
        * @param salt, password
        * returns hash string
        */
        public function checkhashSSHA($salt, $password){
            $hash = base64_encode(sha1($password . $salt, true) . $salt);
            return $hash;
        }
    }
?>
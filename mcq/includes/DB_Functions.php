<?php
    class DB_Functions{
        private $conn;

        // constructor
        function __construct(){
            require_once 'DB_Connect.php';
            // connecting to database
            $db = new Db_Connect();
            $this->conn = $db->connect();
        }

        // destructor
        function __destruct(){

        }

        /**
        * Create new admin user
        * returns user details
        */
        public function adminRegs($username, $password){
            $uuid = uniqid('', true);
            $hash = $this->hashSSHA($password);
            $encrypted_password = $hash["encrypted"]; // encrypted password
            $salt = $hash["salt"]; // salt

            $stmt = $this->conn->prepare("INSERT INTO `master_admin`(`unique_id`, `email`, `encrypted_password`, `salt`) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $uuid, $username, $encrypted_password, $salt);
            $result = $stmt->execute();
            $stmt->close();

            // check for successful store
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
        * Check user is existed or not
        */
        public function adminExist($username){
            $stmt = $this->conn->prepare("SELECT `email` FROM `master_admin` WHERE `email` = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                // user existed 
                $stmt->close();
                return true;
            }
            else{
                // user not existed
                $stmt->close();
                return false;
            }
        }

        /**
        * Get user by email and password
        */
        public function adminLogin($username, $password){
            $stmt = $this->conn->prepare("SELECT `admin_id`, `unique_id`, `email`, `encrypted_password`, `salt` FROM `master_admin` WHERE `email` = ?");
            $stmt->bind_param("s",$username);
            if ($stmt->execute()) {
                $user = $stmt->get_result()->fetch_assoc();
                $stmt->close();
                $salt = $user['salt'];
                $encrypted_password = $user['encrypted_password'];
                $hash = $this->checkhashSSHA($salt, $password);
                if($encrypted_password == $hash){
                    return $user;
                }
            }
            else{
                return NULL;
            }
        }

        /**
        * Create new exam record
        * returns exams details
        */
        public function createExam($newexam){
            $stmt = $this->conn->prepare("INSERT INTO `exams`(`etitle`) VALUES (?)");
            $stmt->bind_param("s",$newexam);
            $result = $stmt->execute();
            $stmt->close();

            if($result){
                $stmt = $this->conn->prepare("SELECT * FROM `exams` WHERE `etitle` = ?");
                $stmt->bind_param("s", $newexam);
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
        * Check exams is existed or not
        */
        public function examExist($newexam){
            $stmt = $this->conn->prepare("SELECT `eid`, `etitle` FROM `exams` WHERE `etitle` = ?");
            $stmt->bind_param("s", $newexam);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->close();
                return true;
            }
            else{
                $stmt->close();
                return false;
            }
        }

        /**
        * Load exam list
        */
        public function examList(){
            $stmt = $this->conn->prepare("SELECT `eid`, `etitle` FROM `exams`");
            $stmt->execute();
            $stmt->bind_result($exam_id, $examtitle);
            $examArray = array();
            while($stmt->fetch()){
                $temp = array();
                $temp['eid'] = $exam_id;
                $temp['etitle'] = $examtitle;
                array_push($examArray, $temp);
            }
            return $examArray;
        }

        /**
        * Save test question and answer
        */
        public function saveTest($exam, $fileName, $answer, $plus, $minus){
            $stmt = $this->conn->prepare("INSERT INTO `qusans`(`ex_id`, `que_img`, `answer`, `plusmarks`, `minusmarks`) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssss", $exam, $fileName, $answer, $plus, $minus);
            $result = $stmt->execute();
            $stmt->close();
        }

        /**
        *Create new batch 
        *
        */
        public function createBatch($newbatch){
            $stmt = $this->conn->prepare("INSERT INTO `batch`(`batch_title`) VALUES (?)");
            $stmt->bind_param("s",$newbatch);
            $result = $stmt->execute();
            $stmt->close();

            if($result){
                $stmt = $this->conn->prepare("SELECT * FROM `batch` WHERE `batch_title` = ?");
                $stmt->bind_param("s", $newbatch);
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
        * Check batch is existed or not
        */
        public function batchExist($newbatch){
            $stmt = $this->conn->prepare("SELECT `batch_id`, `batch_title` FROM `batch` WHERE `batch_title` = ?");
            $stmt->bind_param("s", $newbatch);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->close();
                return true;
            }
            else{
                $stmt->close();
                return false;
            }
        }

        /**
        * Batch list
        */
        public function batchList(){
            $stmt = $this->conn->prepare("SELECT `batch_id`, `batch_title` FROM `batch`");
            $stmt->execute();
            $stmt->bind_result($batchid, $batchtitle);
            $batchArray = array();
            while($stmt->fetch()){
                $temp = array();
                $temp['batch_id'] = $batchid;
                $temp['batch_title'] = $batchtitle;
                array_push($batchArray, $temp);
            }
            return $batchArray;
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
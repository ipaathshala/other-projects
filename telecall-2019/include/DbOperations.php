<?php
	class DbOperations{
		private $con;
		function __construct(){
			include dirname(__FILE__).'/DbConnect.php';
			$db = new DbConnect();
			$this->con = $db->connect();
		}

		/*Create new admin account*/
		function createAdminUser($emailId, $pass){
			if($this->isUserExist($emailId)){
				return 0;
			}
			else{
				$password = md5($pass);
				$stmt = $this->con->prepare("INSERT INTO `master_admin`(`email`, `password`) VALUES (?,?)");
				$stmt->bind_param("ss",$emailId,$password);
				if($stmt->execute()){
					return 1;
				}
				else{
					return 2;
				}
			}
		}

		/*Check if admin is already exist in the system*/
		private function isUserExist($emailId){
			$stmt = $this->con->prepare("SELECT `admin_id` FROM `master_admin`");
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		/*Admin login authentication*/
		public function userLogin($username, $pass){
			$password = md5($pass);
			$stmt = $this->con->prepare("SELECT `admin_id`, `email`, `password` FROM `master_admin` WHERE `email` = ? AND `password` = ?");
			$stmt->bind_param("ss", $username, $password);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows > 0;
		}

		/*Get the admin username detail*/
		function getUserByUsername($username){
			$stmt = $this->con->prepare("SELECT `admin_id`, `email` FROM `master_admin` WHERE `email` = ?");
			$stmt->bind_param("s",$username);
			$stmt->execute();
			$stmt->bind_result($aid, $userName);
			$userArray = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['admin_id'] = $aid;
				$temp['email'] = $userName;
				array_push($userArray, $temp);
			}
			return $userArray;
		}

		/*Load school list to add student record*/
		function getSchoolNames(){
			$stmt = $this->con->prepare("SELECT `school_id`, `school_name` FROM `master_school`");
			$stmt->execute();
			$stmt->bind_result($sid, $stitle);
			$schoolList = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['school_id'] = $sid;
				$temp['school_name'] = strtoupper($stitle);
				array_push($schoolList, $temp);
			}
			return $schoolList;
		}

		/*Load telecaller list*/
		function getTelecallerList(){
			$stmt = $this->con->prepare("SELECT `tc_id`, `tc_fn`, `tc_ln` FROM `tele_caller_operator`");
			$stmt->execute();
			$stmt->bind_result($tcid, $tc_fn, $tc_ln);
			$telecallerList = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['tc_id'] = $tcid;
				$temp['tc_fn'] = ucfirst($tc_fn);
				$temp['tc_ln'] = ucfirst($tc_ln);
				array_push($telecallerList, $temp);
			}
			return $telecallerList;
		}

		/*Allow telecaller to the school*/
		function telecallerSchool($telecallerid, $schoolid){
			$stmt = $this->con->prepare("UPDATE `master_school` SET `telecaller_id`= ? WHERE `school_id`= ?");
			$stmt->bind_param("ss",$telecallerid, $schoolid);
			if($stmt->execute()){
				return 1;
			}
			else{
				return 2;
			}
		}

		/*Create new data entry operator profile*/
		function createDataEntryOperator($fName, $lName, $uName, $pass){
			if($this->isOperatorExist($uName)){
				return 0;
			}
			else{
				$password = md5($pass);
				$stmt = $this->con->prepare("INSERT INTO `data_entry_operator` (`de_fn`, `de_ln`, `de_un`, `de_pw`) VALUES (?,?,?,?)");
				$stmt->bind_param("ssss",$fName, $lName, $uName, $password);
				if($stmt->execute()){
					return 1;
				}
				else{
					return 2;
				}
			}
		}

		/*Check if operator is already exist in the system*/
		private function isOperatorExist($uName){
			$stmt = $this->con->prepare("SELECT `de_id` FROM `data_entry_operator` WHERE `de_un` = ?");
			$stmt->bind_param("s",$uName);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		/*DataEntry operator login authentication*/
		function dataEntryOperatorAuth($username, $pass){
			$password = md5($pass);
			$stmt = $this->con->prepare("SELECT `de_fn`, `de_ln`, `de_un` FROM `data_entry_operator` WHERE `de_un` = ? AND `de_pw` = ?");
			$stmt->bind_param("ss",$username,$password);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		/*Get username details of DataEntry Operator*/
		function getDataEntryOperatorUsername($username){
			$stmt = $this->con->prepare("SELECT `de_id`, `de_fn`, `de_ln`, `de_un` FROM `data_entry_operator` WHERE `de_un` = ?");
			$stmt->bind_param("s",$username);
			$stmt->execute();
			$stmt->bind_result($id, $fn, $ln, $un);
			$userArray = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['de_id'] = $id;
				$temp['de_fn'] = $fn;
				$temp['de_ln'] = $ln;
				$temp['de_un'] = $un;
				array_push($userArray, $temp);
			}
			return $userArray;
		}

		/*Create new profile for telecaller operator*/
		function createTeleCaller($fName, $lName, $uName, $pass){
			if($this->isTeleCallerExist($uName)){
				return 0;
			}
			else{
				$password = md5($pass);
				$stmt = $this->con->prepare("INSERT INTO `tele_caller_operator` (`tc_fn`, `tc_ln`, `tc_un`, `tc_pw`) VALUES (?,?,?,?)");
				$stmt->bind_param("ssss",$fName, $lName, $uName, $password);
				if($stmt->execute()){
					return 1;
				}
				else{
					return 2;
				}
			}
		}

		/*Check if telecaller profile is already exist*/
		private function isTeleCallerExist($uName){
			$stmt = $this->con->prepare("SELECT `tc_id` FROM `tele_caller_operator` WHERE `tc_un` = ?");
			$stmt->bind_param("s",$uName);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		/*Telecaller login authentication*/
		function teleCallerOperatorAuth($username, $pass){
			$password = md5($pass);
			$stmt = $this->con->prepare("SELECT `tc_fn`, `tc_ln`, `tc_un` FROM `tele_caller_operator` WHERE `tc_un` = ? AND `tc_pw` = ?");
			$stmt->bind_param("ss",$username,$password);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		/*Get the username of Telecaller Operator*/
		function getTelecallerUserName($username){
			$stmt = $this->con->prepare("SELECT `tc_id`, `tc_fn`, `tc_ln`, `tc_un` FROM `tele_caller_operator` WHERE `tc_un` = ?");
			$stmt->bind_param("s",$username);
			$stmt->execute();
			$stmt->bind_result($id, $fn, $ln, $un);
			$userArray = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['tc_id'] = $id;
				$temp['tc_fn'] = $fn;
				$temp['tc_ln'] = $ln;
				$temp['tc_un'] = $un;
				array_push($userArray, $temp);
			}
			return $userArray;
		}

		/*Create new school record*/
		function createNewSchool($schoolName, $schoolAddress){
			if($this->isSchoolExist($schoolName)){
				return 0;
			}
			else{
				$stmt = $this->con->prepare("INSERT INTO `master_school` (`school_name`, `school_address`) VALUES (?,?)");
				$stmt->bind_param("ss",$schoolName, $schoolAddress);
				if($stmt->execute()){
					return 1;
				}
				else{
					return 2;
				}
			}
		}

		/*Check if school record is already exist in the system*/
		private function isSchoolExist($schoolName){
			$stmt = $this->con->prepare("SELECT `school_id` FROM `master_school` WHERE `school_name` = ?");
			$stmt->bind_param("s",$schoolName);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		

		/*Load school list to add student record*/
		function loadTelecallerSchool($telecallerid){
			$stmt = $this->con->prepare("SELECT `school_id`, `school_name` FROM `master_school` WHERE `telecaller_id` = ?");
			$stmt->bind_param("s",$telecallerid);
			$stmt->execute();
			$stmt->bind_result($sid, $stitle);
			$schoolList = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['school_id'] = $sid;
				$temp['school_name'] = strtoupper($stitle);
				array_push($schoolList, $temp);
			}
			return $schoolList;
		}

		/*Create new student record*/
		function createNewStudent($schoolid, $stdname, $fname, $mname, $lname, $area, $mobone, $mobtwo, $mobthree){
			if($this->moboneExist($mobone)){
				return 0;
			}
			if($this->mobtwoExist($mobtwo)){
				return 0;
			}
			if($this->mobthereeExist($mobthree)){
				return 0;
			}

			$stmt = $this->con->prepare("INSERT INTO `master_student`(`school_id`, `std_name`, `std_fname`, `std_mname`, `std_lname`, `std_area`, `mob_num_one`,
				`mob_num_two`, `mob_num_three`) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("sssssssss", $schoolid, $stdname, $fname, $mname, $lname, $area, $mobone, $mobtwo, $mobthree);
			if($stmt->execute()){
				return 1;
			}
			else{
				return 2;
			}
		}

		/*Check if student record is already exist*/
		function moboneExist($mobone){
			$stmt = $this->con->prepare("SELECT `mob_num_one` FROM `master_student` WHERE `mob_num_one` = ?");
			$stmt->bind_param("s", $mobone);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		function mobtwoExist($mobtwo){
			$stmt = $this->con->prepare("SELECT `mob_num_two` FROM `master_student` WHERE `mob_num_two` = ?");
			$stmt->bind_param("s", $mobtwo);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		function mobthereeExist($mobthree){
			$stmt = $this->con->prepare("SELECT `mob_num_three` FROM `master_student` WHERE `mob_num_three` = ?");
			$stmt->bind_param("s", $mobthree);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows>0;
		}

		/*Student list as per school selection*/
		function loadStudentList($schoolid){
			/*$stmt = $this->con->prepare("SELECT master_student.student_id, master_student.std_name, master_student.std_lname, master_student.mob_num_one, master_student.mob_num_two, master_student.mob_num_three, master_school.school_name, lead_feedabck.last_call_date, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM master_student LEFT JOIN master_school ON master_school.school_id = master_student.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE master_school.school_id = ? AND lead_feedabck.telecaller_id = ?");*/
			$stmt = $this->con->prepare("SELECT master_student.student_id, master_student.std_name, master_student.std_lname, master_student.mob_num_one, master_student.mob_num_two, master_student.mob_num_three, master_school.school_name, lead_feedabck.last_call_date, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM master_student LEFT JOIN master_school ON master_school.school_id = master_student.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE master_student.school_id = ? GROUP BY master_student.student_id");
			$stmt->bind_param("s",$schoolid);
			$stmt->execute();
			$stmt->bind_result($sid, $sname, $lname, $mobone, $mobtwo, $mobthree, $school, $lastcalldate, $callbackdate, $callbacktime, $addtolist, $feedback, $status, $comment);
			$studentArray = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['student_id'] = $sid;
				$temp['std_name'] = ucfirst($sname);
				$temp['std_lname'] = ucfirst($lname);
				$temp['mob_num_one'] = $mobone;
				$temp['mob_num_two'] = $mobtwo;
				$temp['mob_num_three'] = $mobthree;
				$temp['school_name'] = ucwords($school);
				$temp['last_call_date'] = $lastcalldate;
				//$temp['callcount'] = $count;
				$temp['call_back_date'] = $callbackdate;
				$temp['call_back_time'] = $callbacktime;
				$temp['add_to_list'] = ucfirst($addtolist);
				$temp['temp_feedback'] = ucfirst($feedback);
				$temp['call_status'] = ucfirst($status);
				$temp['comment'] = ucfirst($comment);
				array_push($studentArray, $temp);
			}
			return $studentArray;
		}

		/*Student profile details*/
		function StudentProfile($stdId){
			$stmt = $this->con->prepare("SELECT master_student.student_id, master_student.std_name, master_student.std_fname, master_student.std_mname, master_student.std_lname, master_student.mob_num_one, master_student.mob_num_two, master_student.mob_num_three, master_school.school_name, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM master_student LEFT JOIN master_school ON master_school.school_id = master_student.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE master_student.student_id = ?");
			$stmt->bind_param("s",$stdId);
			$stmt->execute();
			$stmt->bind_result($stdId,$sName,$fName,$mName,$lName,$mobOne,$mobTwo,$mobThree,$schoolName,$callbackDate,$callbackTime,$todoList,$tempFeedback,
				$callStatus, $Comment);
			$profileView = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['student_id'] = $stdId;
				$temp['std_name'] = strtoupper($sName);
				$temp['std_fname'] = strtoupper($fName);
				$temp['std_mname'] = strtoupper($mName);
				$temp['std_lname'] = strtoupper($lName);
				$temp['mob_num_one'] = $mobOne;
				$temp['mob_num_two'] = $mobTwo;
				$temp['mob_num_three'] = $mobThree;
				$temp['school_name'] = strtoupper($schoolName);
				$temp['call_back_date'] = $callbackDate;
				$temp['call_back_time'] = $callbackTime;
				$temp['add_to_list'] = $todoList;
				$temp['temp_feedback'] = $tempFeedback;
				$temp['call_status'] = $callStatus;
				$temp['comment'] = $Comment;
				array_push($profileView, $temp);
			}
			return $profileView;
		}

		/*Save lead feedback method start*/
		/*function saveLeadFeedback($leadId, $telecallerid, $last_call_date, $call_back_date, $call_back_time, $add_to_list, $temp_feedback, $call_status, $comment, $fileName){
			$stmt = $this->con->prepare("INSERT INTO `lead_feedabck`(`lead_id`, `telecaller_id`, `last_call_date`, `call_back_date`, `call_back_time`, `add_to_list`, `temp_feedback`, `call_status`, `comment`, `call_file`) VALUES (?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssssss", $leadId, $telecallerid, $last_call_date, $call_back_date, $call_back_time, $add_to_list, $temp_feedback, $call_status, $comment, $fileName);
			if($stmt->execute()){
				return 1;
			}
			else{
				return 2;
			}
		}*/

		function saveLeadFeedback($leadId, $telecallerid, $last_call_date, $call_back_date, $call_back_time, $add_to_list, $temp_feedback, $call_status, $comment){
			$stmt = $this->con->prepare("INSERT INTO `lead_feedabck`(`lead_id`, `telecaller_id`, `last_call_date`, `call_back_date`, `call_back_time`, `add_to_list`, `temp_feedback`, `call_status`, `comment`) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("sssssssss", $leadId, $telecallerid, $last_call_date, $call_back_date, $call_back_time, $add_to_list, $temp_feedback, $call_status,
				$comment);
			if($stmt->execute()){
				return 1;
			}
			else{
				return 2;
			}
		}

		/*Get callback list*/
		function callBackList($telecallerid, $status){
			$stmt = $this->con->prepare("SELECT master_student.student_id, master_student.std_name, master_student.std_lname, master_student.mob_num_one, master_student.mob_num_two, master_student.mob_num_three, master_school.school_name, lead_feedabck.last_call_date, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM master_student LEFT JOIN master_school ON master_school.school_id = master_student.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE lead_feedabck.telecaller_id = ? AND lead_feedabck.add_to_list = ?");
			$stmt->bind_param("ss",$telecallerid, $status);
			$stmt->execute();
			$stmt->bind_result($stdid, $stdname, $lname, $mobone, $mobtwo, $mobthree, $schoolname, $lastcalldate, $callbackdate, $callbacktime, $addtolist, $tempfeedback, $callstatus, $comment);
			$callbackList = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['student_id'] = $stdid;
				$temp['std_name'] = ucfirst($stdname);
				$temp['std_lname'] = ucfirst($lname);
				$temp['mob_num_one'] = $mobone;
				$temp['mob_num_two'] = $mobtwo;
				$temp['mob_num_three'] = $mobthree;
				$temp['school_name'] = ucfirst($schoolname);
				$temp['last_call_date'] = $lastcalldate;
				//$temp['callcount'] = $count;
				$temp['call_back_date'] = $callbackdate;
				$temp['call_back_time'] = $callbacktime;
				$temp['add_to_list'] = ucfirst($addtolist);
				$temp['temp_feedback'] = ucfirst($tempfeedback);
				$temp['call_status'] = ucfirst($callstatus);
				$temp['comment'] = ucfirst($comment);
				array_push($callbackList, $temp);
			}
			return $callbackList;
		}

		/*Get feedback list*/
		function leadFeedBackList($telecallerid, $leadStatus){
			$stmt = $this->con->prepare("SELECT master_student.student_id, master_student.std_name, master_student.std_lname, master_student.mob_num_one, master_student.mob_num_two, master_student.mob_num_three, master_school.school_name, lead_feedabck.last_call_date, COUNT(lead_feedabck.last_call_date) AS callcount, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM master_student LEFT JOIN master_school ON master_school.school_id = master_student.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE lead_feedabck.telecaller_id = ? AND lead_feedabck.add_to_list = ?");
			$stmt->bind_param("ss",$telecallerid, $leadStatus);
			$stmt->execute();
			$stmt->bind_result($stdId, $stdname, $stdlname, $mobone, $mobtwo, $mobthree, $schoolname, $lastcalldate, $count, $callbackdate, $callbacktime, $addtolist, $tempfeedback, $callstatus, $comment);
			$feedbackList = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['student_id'] = $stdId;
				$temp['std_name'] = ucfirst($stdname);
				$temp['std_lname'] = ucfirst($stdlname);
				$temp['mob_num_one'] = $mobone;
				$temp['mob_num_two'] = $mobtwo;
				$temp['mob_num_three'] = $mobthree;
				$temp['school_name'] = $schoolname;
				$temp['last_call_date'] = $lastcalldate;
				$temp['callcount'] = $count;
				$temp['call_back_date'] = $callbackdate;
				$temp['call_back_time'] = $callbacktime;
				$temp['add_to_list'] = ucfirst($addtolist);
				$temp['temp_feedback'] = ucfirst($tempfeedback);
				$temp['call_status'] = ucfirst($callstatus);
				$temp['comment'] = ucfirst($comment);
				array_push($feedbackList, $temp);
			}
			return $feedbackList;
		}

		/*Lead history*/
		/*function leadCallHistory($student_id){
			$stmt = $this->con->prepare("SELECT master_student.std_name, master_student.std_fname, master_student.std_mname, master_student.std_lname, master_student.mob_num_one, master_student.mob_num_two, master_student.mob_num_three, master_school.school_name, lead_feedabck.last_call_date, COUNT(lead_feedabck.last_call_date) AS callcount, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM master_student LEFT JOIN master_school ON master_school.school_id = master_student.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE lead_feedabck.lead_id = ?");
			$stmt->bind_param("s", $student_id);
			$stmt->execute();
			$stmt->bind_result($stdname, $stdfname, $stdmname, $stdlname, $mobone, $mobtwo, $mobthree, $school, $lastcalldate, $count, $callbackdate, $callbacktime, $addtolist, $tempfeedback, $callstatus, $comments);
			$callHistory = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['std_name'] = ucfirst($stdname);
				$temp['std_fname'] = ucfirst($stdfname);
				$temp['std_mname'] = ucfirst($stdmname);
				$temp['std_lname'] = ucfirst($stdlname);
				$temp['mob_num_one'] = $mobone;
				$temp['mob_num_two'] = $mobtwo;
				$temp['mob_num_three'] = $mobthree;
				$temp['school_name'] = ucwords($school);
				$temp['last_call_date'] = $lastcalldate;
				$temp['callcount'] = $count;
				$temp['call_back_date'] = $callbackdate;
				$temp['call_back_time'] = $callbacktime;
				$temp['add_to_list'] = ucfirst($addtolist);
				$temp['temp_feedback'] = ucfirst($tempfeedback);
				$temp['call_status'] = ucfirst($callstatus);
				$temp['comment'] = ucfirst($comments);

				array_push($callHistory, $temp);
			}
			return $callHistory;
		}*/

		/*function leadCallHistory($student_id){
			$stmt = $this->con->prepare("SELECT master_student.std_name, master_student.std_fname, master_student.std_mname, master_student.std_lname, master_student.mob_num_one, master_student.mob_num_two, master_student.mob_num_three, master_school.school_name, lead_feedabck.last_call_date, COUNT(lead_feedabck.last_call_date) AS callcount, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM master_student LEFT JOIN master_school ON master_school.school_id = master_student.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE lead_feedabck.lead_id = ?");
			
			stmt3 for lead feedback
			$stmt = $this->con->prepare("SELECT lead_feedabck.last_call_date, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM lead_feedabck LEFT JOIN master_student ON lead_feedabck.lead_id = master_student.student_id WHERE master_student.student_id = ? ORDER BY lead_feedabck.last_call_date DESC");

			$stmt->bind_param("s", $student_id);
			$stmt->execute();
			$stmt->bind_result($lastcalldate, $callbackdate, $callbacktime, $addtolist, $tempfeedback, $callstatus, $comments);
			$callHistory = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['last_call_date'] = $lastcalldate;
				$temp['call_back_date'] = $callbackdate;
				$temp['call_back_time'] = $callbacktime;
				$temp['add_to_list'] = ucfirst($addtolist);
				$temp['temp_feedback'] = ucfirst($tempfeedback);
				$temp['call_status'] = ucfirst($callstatus);
				$temp['comment'] = ucfirst($comments);

				array_push($callHistory, $temp);
			}
			return $callHistory;
		}*/

		function leadCallHistory($student_id){
			
				$stmt = $this->con->prepare("SELECT tele_caller_operator.tc_fn, tele_caller_operator.tc_ln, tele_caller_operator.tc_un, master_school.school_name, master_student.std_name, master_student.std_lname, lead_feedabck.last_call_date, lead_feedabck.call_back_date, lead_feedabck.call_back_time, lead_feedabck.add_to_list, lead_feedabck.temp_feedback, lead_feedabck.call_status, lead_feedabck.comment FROM tele_caller_operator LEFT JOIN master_school ON master_school.telecaller_id = tele_caller_operator.tc_id LEFT JOIN master_student ON master_student.school_id = master_school.school_id LEFT JOIN lead_feedabck ON lead_feedabck.lead_id = master_student.student_id WHERE master_student.student_id = ? ORDER BY lead_feedabck.last_call_date DESC");

				$stmt->bind_param("s",$student_id);
				$stmt->execute();
				$stmt->bind_result($tc_fn, $tc_ln, $tc_un, $school, $stdname, $stdlname, $lastcalldate, $callbackdate, $callbacktime, $addtolist, $tempfeedback, $callstatus, $comment);
				$historyArray = array();
				while($stmt->fetch()){
					$temp = array();
					$temp['tc_fn'] = ucfirst($tc_fn);
					$temp['tc_ln'] = ucfirst($tc_ln);
					$temp['tc_un'] = $tc_un;
					$temp['school_name'] = ucfirst($school);
					$temp['std_name'] = ucfirst($stdname);
					$temp['std_lname'] = ucfirst($stdlname);
					$temp['last_call_date'] = $lastcalldate;
					$temp['call_back_date'] = $callbackdate;
					$temp['call_back_time'] = $callbacktime;
					$temp['add_to_list'] = ucfirst($addtolist);
					$temp['temp_feedback'] = ucfirst($tempfeedback);
					$temp['call_status'] = ucfirst($callstatus);
					$temp['comment'] = ucfirst($comment);
					array_push($historyArray, $temp);
				}
				return $historyArray;
			
		}

		function callCount($student_id){
			$stmt = $this->con->prepare("SELECT COUNT(lead_feedabck.last_call_date) AS callcount FROM lead_feedabck LEFT JOIN master_student ON master_student.student_id = lead_feedabck.lead_id WHERE master_student.student_id = ?");
			$stmt->bind_param("s",$student_id);
			$stmt->execute();
			$stmt->bind_result($callcount);
			$countArray = array();
			while($stmt->fetch()){
				$temp = array();
				$temp['callcount'] = $callcount;
				array_push($countArray, $temp);
			}
			return $countArray;
		}
	}
?>
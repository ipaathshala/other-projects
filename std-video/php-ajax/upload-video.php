<?php

    require_once '../includes/DB_Functions.php';
    $db = new DB_Functions();

    $tempboard = htmlentities(trim($_POST['board']));
    $boardId = mysql_real_escape_string($tempboard);
    $newchapters = $_POST['chapters'];
    $status = 1;

    if(!empty($boardId)){
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $tmpFilePath = $_FILES['file']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $file_name = $_FILES['file']['name'];
                $random_digit = rand(0000,9999);
                $newFilePath = $random_digit.$file_name;
                $newFilePath = "video/" .  $newFilePath[$i];
                move_uploaded_file($tmpFilePath, $newFilePath);
            }
            $user = $db->savechapterVideo($boardId, $newchapters[$i], $newFilePath, $status);
        }
        echo "1";
    }
    else{
        echo 0;
    }
?>
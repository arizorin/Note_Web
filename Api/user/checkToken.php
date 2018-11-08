<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 03.11.2018
 * Time: 17:00
 */
require_once '../database.php';

$userID = $_GET['userID'];
$token = $_GET['token'];


if(isset($userID) && isset($token)){
    $res = $conn ->query("SELECT user_id FROM users WHERE token = '$token' AND user_id = '$userID'");
    if(($res->num_rows) >= 1)
    { 
      echo '{"code":1}';
    }
    else{
        echo '{"code":401}'; //Пользователь не найден
    }
}
else{
    //данные не передаются
    echo '{"code":400}';
}
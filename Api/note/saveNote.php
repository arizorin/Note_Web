<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 27.10.2018
 * Time: 20:58
 */
require_once '../database.php';

header("Content-type: application/json; charset=utf-8");
$token = $_GET['token'];
$userID = $_GET['userID'];

$id = $_GET['id'];
$name = $_GET['name'];
$text = $_GET['text'];
$date = $_GET['createDate'];
$status = array();

if(isset($token) && isset($userID) && isset($name) && isset($text) && isset($date)){
    if(mysqli_query($conn,"SELECT token,user_id FROM users WHERE token = '$token' AND user_id = '$userid'")){
        if(mysqli_query($conn,"UPDATE `Notes` SET `name`='$name',`text`='$text',`date`='$date' WHERE user_id = '$userID' AND id = '$id'")){
            echo '{"code":1}';
        }else{
            echo '{"code":600}'; //данные не могут быть оьновлены
        }
    }
    else{
        echo '{"code":403}'; //пользователь не найден
    }
}
else{
    //данные не передаются
    echo '{"code":400}';
}
<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 03.11.2018
 * Time: 16:32
 */

require_once '../database.php';
header("Content-type: text/html; charset=utf-8");

$token = $_REQUEST['token'];
$userID = $_REQUEST['userID'];

$name = $_REQUEST['name'];
$text = $_REQUEST['text'];
$date = $_REQUEST['createDate'];

echo $name, $text, $date;

if(isset($token) && isset($userID) && isset($name) && isset($text) && isset($date)){
    if(mysqli_query($conn,"SELECT token,user_id FROM users WHERE token = '$token' AND user_id = '$userid'")){
        if(mysqli_query($conn,"INSERT into `Notes` (id,user_id,name,text,date) VALUES  (null,'$userID','$name','$text','$date')")){
            echo '{"code":1}';
        }else{
            echo '{"code":600}'; //данные не могут быть добавлены
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
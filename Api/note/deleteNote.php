<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 03.11.2018
 * Time: 16:32
 */

require_once '../database.php';

$token = $_GET['token'];
$userID = $_GET['userID'];

$id= $_GET['id'];

$status = array();
if(isset($token) && isset($userID) && isset($id)){
    if(mysqli_query($conn,"SELECT token,user_id FROM users WHERE token = '$token' AND user_id = '$userid'")){
        if(mysqli_query($conn,"DELETE from Notes WHERE id = '$id'")){
            echo '{"code":1}';
        }else{
            echo '{"code":600}'; //данные не могут быть удалены
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
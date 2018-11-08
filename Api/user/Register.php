<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 03.11.2018
 * Time: 17:00
 */
require_once '../database.php';

$name = $_GET['name'];
$password = $_GET['password'];
$email = $_GET['email'];

if(isset($name) && isset($password) && isset($email)){
    $res = $conn ->query("SELECT user_id FROM users WHERE Username = '$name' OR email = '$email'");
    if(($res->num_rows) == 0)
    {
        if(mysqli_query($conn,"INSERT into users (user_id,Username,Password,email) VALUES  (null,'$name','$password','$email')")){
            echo '{"code":1}';
        }else{
            echo '{"code":600}'; //данные не могут быть добавлены
        }
    }
    else{
        echo '{"code":401}'; //Пользователь уже существует
    }
}
else{
    //данные не передаются
    echo '{"code":400}';
}
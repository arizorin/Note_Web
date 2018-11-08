<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 27.10.2018
 * Time: 18:21
 */
session_start();
header("Content-type: application/json; charset=utf-8");
require_once '../database.php';

if(isset($_GET["username"]) && isset($_GET["password"])){
    $username = $_GET["username"];
    $password = $_GET["password"];

    $sql = "SELECT * FROM `users` WHERE Username = '$username' and Password = '$password'";

    $res = $conn->query($sql);

//РїРѕРёСЃРє РІ Р±Рґ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
    if ($res->num_rows > 0) {
        if ($row = $res->fetch_assoc()) {
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);

            $userid = $row['user_id'];
            if(mysqli_query($conn,"UPDATE `users` SET token = '$token' WHERE user_id = '$userid'")){

                $_SESSION['userID'] = $userid;
                $_SESSION['token'] = $token;

                $user = array(
                    "id" => $userid,
                    "token" => $token
                );
                echo json_encode($user, JSON_NUMERIC_CHECK);
            }
            else{
                echo '{"error":401}'; //С‚РѕРєРµРЅ РЅРµ Р±С‹Р» РІС‹РґР°РЅ
            }

        }
        else{
            echo '{"error":403}'; //РЅРµ СѓРґР°Р»РѕСЃСЊ РїРѕР»СѓС‡РёС‚СЊ РґР°РЅРЅС‹Рµ РёР· Р±Рґ
        }
    }
    else{
        echo '{"error":404}'; //РЅРµ СѓРґР°Р»РѕСЃСЊ РЅР°Р№С‚Рё РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
    }
}
else{
    //РґР°РЅРЅС‹Рµ РЅРµ РїРµСЂРµРґР°РЅС‹
    echo '{"error":400}';
}
<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 22.10.2018
 * Time: 23:14
 */
header("Content-type: application/json; charset=utf-8");
require_once '../database.php';

$conn->set_charset("utf8");

$sql = 'SELECT * FROM `Notes` WHERE user_id = '.$_GET["userID"].'';
$notes = array();
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $note= array(
             "id" => $row['id'],
            "name" => $row['name'],
            "text" => $row['text'],
            "createDate" => $row['date']
        );
        array_push($notes, $note);
    }}

	
echo json_encode($notes,JSON_NUMERIC_CHECK);
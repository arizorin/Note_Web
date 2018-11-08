<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 07.11.2018
 * Time: 16:43
 */
header("Content-type: application/json; charset=utf-8");
session_start();
print json_encode($_SESSION);

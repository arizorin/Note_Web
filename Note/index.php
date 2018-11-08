<?php
/**
 * Created by PhpStorm.
 * User: Arszorin
 * Date: 07.11.2018
 * Time: 15:42
 */
session_start();

echo <<< html
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MY PRIVATE NOTE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
html;

if (isset($_SESSION['userID']) && isset($_SESSION['token'])){
 echo <<< html
   <script src="../Scripts/Notes.js"></script>
    <style>
        body{
            background: #fdfffd;
        }
        * { margin: 0; padding: 0; }
           p { padding: 10px; }
           #left { position: absolute; left: 2%; top: 20%; width: 20%; }
           #right { position: absolute; right: 0; top: 20%; width: 70%; } 
    </style>
    &#8195;<a href="../Api/logout.php">Выход</a>
    <center><h1 style="margin: 2%">Заметки</h1></center>
    <script src="../Scripts/Register.js"></script>
    <div align="right" style="position: relative; right: 2%"><button class='btn btn-light' onclick="addNoteWindow()">➕</button></div>
</head>
<body onload="loadNotes()   ">
<div id="left">
        <p>Список заметок: <span class="badge" id="counter"></span></p>
       
      </div>
    <hr>
   
    <div id="right">
            
       </div>
</body>
html;


}
else{
    echo "<center><h1>MY PRIVATE NOTE</h1><hr></center>";
   echo "<center><a href='http://trponote.eu5.net'>Для доступа к заметкам вам необходимо авторизоваться!</а><center><br>";
}
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $root_path = $_SERVER['DOCUMENT_ROOT'] . "/oop" . '/' . $_POST["urls"];
    $path = "/oop" . '/' . $_POST["urls"];
    $folder_file = scandir($root_path);
    $folder_file = array_diff($folder_file, array('.', '..'));
    $home = "/oop/home.php";
    if ($_POST["action"] == "fetch") {
        include('classes/services/fetch.php');
    }
    if ($_POST["action"] == "create") {
        include('classes/services/createFolder.php');
    }
    if ($_POST["action"] == "delete") {
        include('classes/services/deleteFolder.php');
    }
    if ($_POST["action"] == "remove"){
        include('classes/services/removeFile.php');
    }
}
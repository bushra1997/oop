<?php
$folderName = $_POST["folder_name"];
unlink($root_path . '/' . $folderName);
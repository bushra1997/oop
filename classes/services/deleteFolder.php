<?php
$folderName = $_POST["folder_name"];
$files = array_diff(scandir($root_path . '/' . $folderName), array('.', '..'));
foreach ($files as $name) {
    unlink(realpath($folderName) . '/' . $name);
}
rmdir($root_path . '/' . $folderName);
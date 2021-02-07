<?php
if (!file_exists($root_path . '/' . $_POST["folder_name"])) {
    mkdir($root_path . '/' . $_POST["folder_name"], 0777, true);
    //echo 'Folder Created';
} else {
    //echo 'Folder Already Created';
}

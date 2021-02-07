<?php
        $output = '<table class="table table-striped">
        <thead>
                <tr>
                    <th scope="col">Title/Name <i class="fas fa-chevron-down"></i></th>
                    <th scope="col">Type <i class="fas fa-chevron-down"></i></th>
                    <th scope="col">Date Added <i class="fas fa-chevron-down"></i></th>
                    <th scope="col">Manage</th>
                    <th scope="col"></th>
                </tr>
        </thead>
    ';
if (count($folder_file) == 0) {
$output .= "  <tbody>
            <tr>
                <td colspan ='6'>This folder is empty</td>
            </tr>
        </tbody>";
} else {
foreach ($folder_file as $file) {
if (is_file($root_path . '/' . $file)) {
    $output .= '<th><a>' . $file . '</a></th>
                <td>' . pathinfo($file, PATHINFO_EXTENSION) . '</td>';
    $output .= '<td>' . date("d M Y H:i:s", filemtime($root_path . "/" . $file)) . '</td>
        <td>
            <ul>
                <li><button type="button" name="open_file" data-name="' . $file . '" class="open_file"><a href = "' . $path . '/' . $file . '" target = ' . '_blank' . '><i class="far fa-eye" id="green"></i></a></button></li>
                <li><button type="button" name="remove" data-name="' . $file . '" class="remove"><i class="fas fa-trash-alt" id="red"></i></button></li>
            </ul>
        </td>
        <td>
            <button type="button" style="border:transparent ; background-color:transparent;"><input type="checkbox" style="width: 20px; height: 20px;display: inline-block;
            vertical-align: middle;" ></button>
        </td>
    </tr>
';
} elseif (is_dir($root_path . '/' . $file)) {
    $s = $home . "?" . $_POST["urls"];
    $output .= '<tr><th><i style="margin-right:5px" class="far fa-folder-open"></i><a href="' . $home . "?" . $_POST["urls"] . '/' . $file . '">' . basename($file) . '</a></th>
                <td>Folder</td>';
    $output .= '<td>' . date("d M Y H:i:s", filemtime($root_path . "/" . $file)) . '</td>
        <td>
            <ul>
                <li><button type="button" name="view_files" data-name="' . $file . '" class="view_files" data-toggle="modal" data-target="#filelistModal"><a><i class="far fa-eye" id="green"></i></a></button></li>
                <li><button type="button" name="delete" data-name="' . $file . '" class="delete"><i class="fas fa-trash-alt" id="red"></i></button></li>
            </ul>
        </td>
        <td>
            <button type="button" style="border:transparent ; background-color:transparent;"><input type="checkbox" style="width: 20px; height: 20px;display: inline-block;
            vertical-align: middle;" ></button>
        </td>
    </tr>
';
}
}
}
$output .= "</table>";
echo $output;
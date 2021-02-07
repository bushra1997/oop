<?php
    // make form validation first
    if (isset ($_POST['submit'])){
        include('classes/services/formValidation.php');
    }
    //if form vaildation is done => 1- make json file to include user info, 2- create a directory for each user, 
    // 3- start session
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();
        include('classes/user.php');
    }
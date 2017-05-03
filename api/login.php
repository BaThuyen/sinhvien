<?php

require_once 'db.php';



if (isset($_POST['mssv']) && isset($_POST['password'])) {
    $token = login($_POST['mssv'], $_POST['password']);
    $name = ['token' => $token];
    echo json_encode($name);
} elseif (isset($_GET['mssv']) && isset($_GET['token'])) {
    $rs = checkUser($_GET['mssv'], $_GET['token']);
    if($rs){
        echo "S";
    } else {
        echo "F";
    }
}

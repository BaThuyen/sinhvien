<?php

require_once './db.php';

if (isset($_POST['mssv']) && isset($_POST['token']) && isset($_POST['ngaysinh']) && isset($_POST['noisinh']) && isset($_POST['gioitinh']) && isset($_POST['dantoc']) && isset($_POST['tongiao']) && isset($_POST['noio']) && isset($_POST['email']) && isset($_POST['sdt'])) {
    $result = updateUser($_POST['mssv'], $_POST['token'], $_POST['ngaysinh'], $_POST['noisinh'], $_POST['gioitinh'], $_POST['dantoc'], $_POST['tongiao'], $_POST['noio'], $_POST['email'], $_POST['sdt']);
    if ($result) {
        echo "S";
    } else {
        echo "F";
    }
} elseif (isset($_GET['passold']) && isset($_GET['passnew']) && isset($_GET['token']) && isset($_GET['mssv'])) {
    echo changePass($_GET['passold'], $_GET['passnew'], $_GET['mssv'], $_GET['token']);
} elseif (isset($_GET['mssv']) && isset($_GET['token'])) {
    $user = getUsers($_GET['mssv'], $_GET['token']);
    echo json_encode($user);
}
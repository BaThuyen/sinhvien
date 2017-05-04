<?php

require '../config.php';

function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($conn, 'utf8');
    return $conn;
}

function login($mssv, $password) {
    $conn = connectDB();
    $password = sha1($password);
    $sql = "select * from users where user_mssv = '$mssv' and user_password = '$password'";
    $result = $conn->query($sql);
    if ($result) {
        $items = array();
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        $name = $items[0]['user_mssv'] . time();
        $token = md5($name);
        $sql = "UPDATE users SET "
                . "user_token  = '" . $token . "'"
                . "WHERE user_mssv  = '" . $mssv . "'";
        $result = $conn->query($sql);
        return $token;
    } else {
        return false;
    }
}

function getNews($page) {

    $conn = connectDB();

    $first_link = ($page - 1) * 10;

    $sql = "SELECT tintuc_id, tintuc_title FROM tintuc ORDER BY tintuc_id DESC LIMIT $first_link, 10";

    $result = $conn->query($sql);

    $items = array();

    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    $conn->close();

    return $items;
}

function getNewsContent($id) {

    $conn = connectDB();

    $sql = "SELECT tintuc_content FROM tintuc WHERE tintuc_id = $id";

    $result = $conn->query($sql);

    $items = array();

    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    $conn->close();

    return $items[0];
}

function getUsers($mssv, $token) {

    $conn = connectDB();

    $sql = "SELECT user_name, user_khoa, user_lop, ngaysinh, noisinh, gioitinh, dantoc, noio, tongiao, email, sdt  FROM users WHERE user_mssv = '$mssv' AND user_token = '$token'";
    $result = $conn->query($sql);
    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items[0];
}

function checkUser($mssv, $token) {
    $conn = connectDB();
    //Query
    $sql = "SELECT * FROM users WHERE user_mssv = '$mssv' and user_token = '$token'";

    //Excute query
    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    if ($items == null) {
        return false;
    }
    //Close connection
    $conn->close();
    return true;
}

function updateUser($mssv, $token, $ngaysinh, $noisinh, $gioitinh, $dantoc, $tongiao, $noio, $email, $sdt) {
    $conn = connectDB();
    if (!checkUser($mssv, $token)) {
        return false;
    }
    $sql = "UPDATE users SET "
            . "ngaysinh  = '" . $ngaysinh . "', "
            . "noisinh  = '" . $noisinh . "', "
            . "gioitinh  = '" . $gioitinh . "', "
            . "dantoc  = '" . $dantoc . "', "
            . "tongiao  = '" . $tongiao . "', "
            . "noio  = '" . $noio . "', "
            . "email  = '" . $email . "', "
            . "sdt  = '" . $sdt . "' "
            . "WHERE user_mssv  = '" . $mssv . "'";
    $result = $conn->query($sql);
    return $result;
}

function getMonHoc($makhoa) {

    $conn = connectDB();

    $sql = "SELECT * FROM monhoc WHERE ma_khoa = '$makhoa'";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items;
}

function getCTDT($mssv, $hocky){
    $conn = connectDB();
    $sql = "SELECT ten_mh, so_tc FROM chuongtrinhdt, monhoc, users WHERE hocky = $hocky AND chuongtrinhdt.ma_mh = monhoc.ma_mh AND users.user_khoa = chuongtrinhdt.ma_khoa AND users.user_mssv = '$mssv'";
    $result = $conn->query($sql);
    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    $conn->close();
    return $items;
}

function searchTinTuc($title){
    $conn = connectDB();

    $sql = "SELECT * FROM tintuc WHERE tintuc_title LIKE '%$title%'";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    $conn->close();

    return $items;
}

function changePass($passOld, $passNew, $mssv, $token){

    $conn = connectDB();
    if(!checkUser($mssv, $token)){
        return "token";
    }
    $passOld = sha1($passOld);
    $passNew = sha1($passNew);
    $query = "select * from users where user_password = '$passOld' and user_mssv = '$mssv'";
    $exec = $conn->query($query);
    if($exec == null){
        return "pass";
    }
    
    
    $sql = "UPDATE users SET "
            . "user_password  = '" . $passNew . "' "
            . "WHERE user_password  = '$passOld' and user_mssv = '$mssv'";
    $result = $conn->query($sql);
    if($result){
        return "success";
    } else {
        return "fail";
    }
}

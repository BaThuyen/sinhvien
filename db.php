<?php

require_once 'config.php';

function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($conn, 'utf8');
    return $conn;
}

function checkToken($username, $token){
	$conn = connectDB();
    $sql = "SELECT * FROM users WHERE `user_name` LIKE '$username' AND `user_token` LIKE '$token'";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items;
}

function getUsers() {

    $conn = connectDB();

    $sql = "SELECT * FROM users";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items;
}

function getSingleUser($MSSV) {
    $conn = connectDB();
    //Query
    $sql = "SELECT * FROM users WHERE user_mssv = " . $MSSV;

    //Excute query
    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    //Close connection
    $conn->close();

    return $items;
}

function deleteUser($mssv) {
    $conn = connectDB();
    $sql = "DELETE FROM users Where user_mssv = '$mssv'";
    $result = $conn->query($sql);
    return $result;
}

function addUser($user, $password, $mssv, $khoa, $lop, $status) {
    $conn = connectDB();
    $sql = "INSERT INTO users(user_name, user_password, user_mssv, user_khoa, user_lop, user_status)"
            . " VALUES('" . $user . "','" . sha1($password) . "','$mssv', '$khoa', '$lop'," . $status . ")";

    $result = $conn->query($sql);
    return $result;
}

function updateUser($mssv, $password, $khoa, $lop, $status) {
    $conn = connectDB();
    $sql = "UPDATE users SET "
            . "user_password  = '" . sha1($password) . "', "
            . "user_khoa  = '" . $khoa . "', "
            . "user_lop  = '" . $lop . "', "
            . "user_status = '" . $status . "' "
            . "WHERE user_mssv  = '" . $mssv . "'";

    $result = $conn->query($sql);
    return $result;
}

function getUserByID($mssv) {
    $conn = connectDB();

    $sql = "SELECT * FROM users WHERE user_mssv = '" . $mssv . "'";

    $result = $conn->query($sql);

    $items = $result->fetch_assoc();

    $conn->close();

    return $items;
}

function getNews() {

    $conn = connectDB();

    $sql = "SELECT * FROM tintuc";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items;
}

function getNewsByID($id) {
    $conn = connectDB();

    $sql = "SELECT * FROM tintuc WHERE tintuc_id = '" . $id . "'";

    $result = $conn->query($sql);

    $items = $result->fetch_assoc();

    $conn->close();

    return $items;
}

function deleteNews($id) {
    $conn = connectDB();
    $sql = "DELETE FROM tintuc Where tintuc_id = " . $id;
    $result = $conn->query($sql);
    return $result;
}

function addNews($new_title, $tintuc_content, $tintuc_status) {
    $conn = connectDB();
    $sql = "INSERT INTO tintuc(tintuc_title, tintuc_content, tintuc_status)"
            . " VALUES('" . $new_title . "','" . $tintuc_content . "','" . $tintuc_status . "')";
    $result = $conn->query($sql);
    return $result;
}

function updateNews($id, $tintuc_title, $tintuc_content, $tintuc_status) {
    $conn = connectDB();
    $sql = "UPDATE tintuc SET "
            . "tintuc_title = '" . $tintuc_title . "', "
            . "tintuc_content  = '" . $tintuc_content . "', "
            . "tintuc_status = '" . $tintuc_status . "' "
            . "WHERE tintuc_id  = '" . $id . "'";

    $result = $conn->query($sql);
    return $result;
}

function getKhoa() {

    $conn = connectDB();

    $sql = "SELECT * FROM khoa";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items;
}

function getLop() {

    $conn = connectDB();

    $sql = "SELECT * FROM lop";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items;
}

function getLopHP() {

    $conn = connectDB();

    $sql = "SELECT * FROM lophp";

    $result = $conn->query($sql);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }


    $conn->close();

    return $items;
}

<?php
$mssv = isset($_GET['mssv']) ? $_GET['mssv'] : "";
$user = getSingleUser($mssv);
?>
<div style="margin-left: 50px;">
    <br>
    <div class="container">
    <div class="col-md-3" style="display:inline-block; margin-right: 20px">
        <h1>User name :</h1>
        <h4>Mã số sinh viên:</h4>
        <h4>Khoa: </h4>
        <h4>Lớp: </h4>
        <h4>Email:</h4>
        <h4>CMND: </h4>
        <h4>Dân tộc: </h4>
        <h4>Gioitinh: </h4>
        <h4>Ngày sinh: </h4>
        <h4>Nơi sinh: </h4>
        <h4>Số điện thoại: </h4>
        <h4>Tôn giáo: </h4>
    </div>

        <div class="col-md-9" style="display:inline-block">
        <h1> <?= $user[0]['user_name'] ?></h1>
        <p><?= $user[0]['user_mssv'] ?></p>
        <p><?= $user[0]['user_khoa'] ?></p>
        <p><?= $user[0]['user_lop'] ?></p>
        <p> <?= $user[0]['email'] ?></p>
        <p><?= $user[0]['cmnd'] ?></p>
        <p><?= $user[0]['dantoc'] ?></p>
        <p><?= $user[0]['gioitinh'] ?></p>
        <p><?= $user[0]['ngaysinh'] ?></p>
        <p><?= $user[0]['noisinh'] ?></p>
        <p><?= $user[0]['sdt'] ?></p>
        <p><?= $user[0]['tongiao'] ?></p>
    </div>
        </div>





</div>
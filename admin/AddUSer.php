
<?php
if (isset($_GET['mssv'])) {
    if ($currentUser != $_GET['mssv'] && $admin == false) {
        header("Location: ../index.php");
    }
    $heading = "Update user";
} else {
    if ($admin == false) {
        //header("Location: ../index.php");
    }
    $heading = "Add user";
}


if (isset($_POST['submit_user']) && ($_POST['password'] == $_POST['config_password'])) {
    //Update user
    if (isset($_GET['mssv'])) {
        $result = updateUser($_GET['mssv'], $_POST['ngaysinh'], $_POST['noisinh'], $_POST['gioitinh'], $_POST['dantoc'], $_POST['cmnd'], $_POST['tongiao'], $_POST['ngayvaodoan'], $_POST['email'], $_POST['sdt']);
        if ($result == true) {
            $heading = 'Update succesfully.';
        } else {
            $heading = 'Update failed.';
        }
    } else {
        //Add new user
        $result = addUser($_POST['user'], $_POST['password'], $_POST['mssv'], $_POST['khoa'], $_POST['lop'], $_POST['ngaysinh'], $_POST['noisinh'], $_POST['gioitinh'], $_POST['dantoc'], $_POST['cmnd'], $_POST['tongiao'], $_POST['ngayvaodoan'], $_POST['email'], $_POST['sdt'], $_POST['status']);
        if ($result == true) {
            $heading = 'Added succesfully.';
        } else {
            $heading = 'Added failed.';
        }
    }
}

//Get user by ID
$mssv = isset($_GET['mssv']) ? $_GET['mssv'] : "";
$user_value = getUserByID($mssv);
$user_name_value = isset($user_value['user_name']) ? $user_value['user_name'] : "";
$user_khoa_value = isset($user_value['user_khoa']) ? $user_value['user_khoa'] : "";
$user_lop_value = isset($user_value['user_lop']) ? $user_value['user_lop'] : "";
$user_mssv_value = isset($user_value['user_mssv']) ? $user_value['user_mssv'] : "";
$user_ngaysinh_value = isset($user_value['ngaysinh']) ? $user_value['ngaysinh'] : "";
$user_noisinh_value = isset($user_value['noisinh']) ? $user_value['noisinh'] : "";
$user_gioitinh_value = isset($user_value['gioitinh']) ? $user_value['gioitinh'] : "";
$user_dantoc_value = isset($user_value['dantoc']) ? $user_value['dantoc'] : "";
$user_cmnd_value = isset($user_value['cmnd']) ? $user_value['cmnd'] : "";
$user_tongiao_value = isset($user_value['tongiao']) ? $user_value['tongiao'] : "";
$user_ngayvaodoan_value = isset($user_value['ngayvaodoan']) ? $user_value['ngayvaodoan'] : "";
$user_email_value = isset($user_value['email']) ? $user_value['email'] : "";
$user_sdt_value = isset($user_value['sdt']) ? $user_value['sdt'] : "";
$user_status_value = isset($user_value['user_status']) ? $user_value['user_status'] : "";

//
//$user_name_value = null;
//$user_status_value = null;
//if (isset($_GET['mssv'])) {
//    $mssv = $_GET['mssv'];
//    $user_value = getUserByID(null);
//    $user_name_value = $user_value['user_name'];
//    $user_status_value = $user_value['user_status'];
//}
?>
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
    <h1><?php echo $heading ?></h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>User-info</h5>
                </div>
                <div class="widget-content nopadding">

                    <!-- BEGIN USER FORM -->
                    <form action="" method="post" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Name :</label>
                            <div class="controls">
                                <input type="text" id="nameDS" name="user" class="span11" placeholder="Username" value="<?php echo $user_name_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">MSSV :</label>
                            <div class="controls">
                                <input type="text" id="mssvDS" name="mssv"class="span11" placeholder="MSSV" value="<?= $user_mssv_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Password :</label>
                            <div class="controls">
                                <input class="span11" name="password" placeholder="Password"  type="password"/> *
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" >Config Password :</label>
                            <div class="controls">
                                <input class="span11"  placeholder="Config Password" name="config_password" type="password"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Khoa:</label>
                            <div class="controls">
                                <?php $khoa = getKhoa() ?>
                                <select name="khoa" class="span11"  id="khoaDS" >*
                                    <option><?= $user_khoa_value ?></option>
                                    <optgroup label="--------------------------------------------------------">
                                        <?php foreach ($khoa as $value) { ?>
                                            <option value="<?= $value['ma_khoa'] ?>"><?= $value['ma_khoa'] ?></option>
                                        <?php } ?>
                                    </optgroup>
                                </select>*
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Lop:</label>
                            <div class="controls">
                                <?php $lop = getLop() ?>
                                <select name="lop" class="span11"  id="lopDS" >*
                                    <option><?= $user_lop_value ?></option>
                                    <optgroup label="--------------------------------------------------------">
                                        <?php foreach ($lop as $value) { ?>
                                            <option value="<?= $value['ma_lop'] ?>"><?= $value['ma_lop'] ?></option>
                                        <?php } ?>
                                    </optgroup>
                                </select>*
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Ngày sinh :</label>
                            <div class="controls">
                                <input class="span11"  name="ngaysinh" type="text" value="<?= $user_ngaysinh_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Nơi sinh :</label>
                            <div class="controls">
                                <input class="span11"  name="noisinh" type="text" value="<?= $user_noisinh_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Giới tính :</label>
                            <div class="controls">
                                <input class="span11"  name="gioitinh" type="text" value="<?= $user_gioitinh_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Dân tộc :</label>
                            <div class="controls">
                                <input class="span11"  name="dantoc" type="text" value="<?= $user_dantoc_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >số CMND :</label>
                            <div class="controls">
                                <input class="span11"  name="cmnd" type="text" value="<?= $user_cmnd_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >tôn giáo :</label>
                            <div class="controls">
                                <input class="span11"  name="tongiao" type="text" value="<?= $user_tongiao_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Ngày vào đoàn :</label>
                            <div class="controls">
                                <input class="span11"  name="ngayvaodoan" type="text" value="<?= $user_ngayvaodoan_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Email :</label>
                            <div class="controls">
                                <input class="span11"  name="email" type="text" value="<?= $user_email_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >Số điện thoại :</label>
                            <div class="controls">
                                <input class="span11"  name="sdt" type="text" value="<?= $user_sdt_value ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Status:</label>
                            <div class="controls">
                                <select name="status" class="span11" id="statusDS">

                                    <option><?= !empty($user_status_value) ? $user_status_value : 0 ?></option>
                                    <optgroup label="--------------------------------------------------------">
                                        <option>0</option>
                                        <option>1</option>
                                    </optgroup>

                                </select>*
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success " name="submit_user">Save</button>
                        </div>

                    </form>
                    <!-- END USER FORM -->

                    <?php
                    if (isset($_GET['mssv'])) {
                        echo "<script>
                            document.getElementById('nameDS').disabled = true;
                            document.getElementById('mssvDS').disabled = true;
                             document.getElementById('khoaDS').disabled = true;
                              document.getElementById('lopDS').disabled = true;
                              document.getElementById('statusDS').disabled = true;
                        </script>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

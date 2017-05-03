<?php
session_start();
require_once '../db.php';
//Verify logged
if (!isset($_POST['login']) && !isset($_SESSION["name"])) {
    header("Location: ../index.php");
}

//Get user password from form
$user_mssv = isset($_POST['user_mssv']) ? $_POST['user_mssv'] : $_SESSION["name"];
$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : $_SESSION["pass"];

//Perfrom delete user
if (isset($_POST['delete_user']) && !empty($_POST['user_mssv'])) {
    $result = deleteUser($_POST['user_mssv']);
}

//Get user
$users = getUsers();
$currentUser = null;

$toEnd = count($users);
foreach ($users as $user) {
    if ($user['user_mssv'] == $user_mssv) {

        if ($user['user_password'] == sha1($user_password)) {
            $currentUser = $user['user_mssv'];
            $_SESSION["name"] = $user_mssv;
            $_SESSION["pass"] = $user_password;
            if ($user['user_status'] == 1) {
                $wellcome = "Welcome Super Admin";
                $account = getUsers();
                $admin = true;
                break;
            } else {
                $wellcome = "Welcome {$user['user_name']}";
                $account = getSingleUser($user['user_mssv']);
                $admin = false;
                break;
            }
        } else {
            echo "fail";
            header("Location: ../index.php");
        }
    }
    if (0 === --$toEnd) {
        header("Location: ../index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../public/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../public/css/uniform.css" />
        <link rel="stylesheet" href="../public/css/select2.css" />
        <link rel="stylesheet" href="../public/css/matrix-style.css" />
        <link rel="stylesheet" href="../public/css/matrix-media.css" />
        <link href="../public/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


    </head>

    <body>

        <!--Header-part-->
        <div id="header">
            <h1><a href="dashboard.html"></a></h1>
        </div>
        <!--close-Header-part--> 

        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text"><?php echo $wellcome ?></span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                        <li class="divider"></li>
                        <li class="logout"><a href="../index.php?destroy=0"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!--start-top-serch-->
        <div id="search">
            <input type="text" placeholder="Search here..."/>
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
        </div>
        <!--close-top-serch--> 

        <!--sidebar-menu-->

        <div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
            <ul>
                <li><a href="<?php echo BASE_URL . "/admin/index.php?page=listuser" ?>"><i class="icon icon-home"></i> <span>Users</span></a> </li>

                <li  <?php
                if ($admin == false) {
                    echo 'style="display:none;"';
                }
                ?>> <a href="<?php echo BASE_URL . '/admin/index.php?page=adduser' ?>"><i class="icon icon-th-list"></i> <span>Thêm User</span></a></li>

                <li > <a href = "<?php echo BASE_URL . '/admin/index.php?page=tintuc' ?>"><i class = "icon icon-th-list"></i> <span>Tin Tức</span></a></li>

                <li  <?php
                if ($admin == false) {
                    echo 'style="display:none;"';
                }
                ?>> <a href = "<?php echo BASE_URL . '/admin/index.php?page=themtintuc' ?>"><i class = "icon icon-th-list"></i> <span>Thêm Tin tức</span></a></li>

            </ul>
        </div>


        <!--BEGIN CONTENT -->
        <div id = "content">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'listuser';
            switch ($page) {
                case 'listuser':
                    include 'ListUser.php';
                    break;
                case 'adduser':
                    include 'AddUser.php';
                    break;
                case 'themtintuc':
                    include 'AddNews.php';
                    break;
                case 'tintuc':
                    include 'ListNews.php';
                    break;
                case 'details':
                    include 'DetailNews.php';
                    break;
                case 'userdetails':
                    include 'DetailUser.php';
                    break;
                default:
                    include 'AddUser.php';
                    break;
            }
            ?>
        </div>
        <!-- END CONTENT -->


        <!--Footer-part-->
        <div class="row-fluid">
            <div id="footer" class="span12"> 2017 &copy;</div>
        </div>
        <!--end-Footer-part-->
        <script src="../public/js/jquery.min.js"></script> 
        <script src="../public/js/jquery.ui.custom.js"></script> 
        <script src="../public/js/bootstrap.min.js"></script> 
        <script src="../public/js/jquery.uniform.js"></script> 
        <script src="../public/js/select2.min.js"></script> 
        <script src="../public/js/jquery.dataTables.min.js"></script> 
        <script src="../public/js/matrix.js"></script> 
        <script src="../public/js/matrix.tables.js"></script>
        <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="ckeditor/adapters/jquery.js" type="text/javascript"></script>
    </body>
</html>

<?php
session_start();
if (isset($_GET['destroy'])) {
    session_destroy();
}
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/css/bootstrap-admin.css" />
    <link rel="stylesheet" href="public/css/AdminLTE.min.css" />

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">

            <h1>login-page</h1>
        </div>

        <div class="login-box-body">
            <div class="login-box-msg">Đăng Nhập</div>
            <form method="POST" action="admin/index.php" accept-charset="UTF-8" name="loginForm" id="loginForm" role="form"><input name="_token" type="hidden" value="I01wWehVftp115ckI5yDcKUqa5iNkBT6FkrQzGu7">
                <div class="form-group has-feedback">
                    <input name="user_name" class="form-control input-sm" required="1" placeholder="User name">
                    <i class="fa fa-envelope form-control-feedback"></i>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" class="form-control input-sm" required="1" placeholder="Password" name="user_password" type="password" value="">
                    <i class="fa fa-key form-control-feedback"></i>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember_me" value="1"> Ghi nhớ lần sau!
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <button type="submit" name="login" class="btn btn-success btn-sm btn-block btn-flat"><i class="fa fa-sign-in"> </i> Đăng Nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
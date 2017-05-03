<?php



?>
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
    <h1>List User</h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>User</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>MSSV</th>
                                <th>Name</th>
                                <th>Khoa</th>
                                <th>Lop</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($account as $user) { ?>
                                <tr class="">
                                    <td><?php echo $user['user_mssv'] ?> </td>
                                    <td><?php echo $user['user_name'] ?></td>
                                    <td><?php echo $user['user_khoa'] ?></td>
                                    <td><?php echo $user['user_lop'] ?></td>
                                    <td><?php echo $user['user_status'] ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL . '/admin/index.php?page=adduser&mssv=' . $user['user_mssv'] ?>" class="btn btn-success btn-mini">Edit</a>
                                        <form action="" method="post">
                                            <input type="hidden" name="user_mssv" value= "<?php echo $user['user_mssv'] ?>" >
                                            <input type="submit" name="delete_user" class="btn btn-danger btn-mini" value="Delete" onclick="return confirm('Bạn có chắc chắn muốn xóa đối tượng?')">
                                        </form>
                                        
                                        <a class="btn btn-success btn-mini" href="<?php echo BASE_URL . '/admin/index.php?page=userdetails&mssv=' . $user['user_mssv'] ?>">Detail</a>
                                    </td>
                                </tr>
                            <?php } ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
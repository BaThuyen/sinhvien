
<?php
//Perfrom delete tintuc
if (isset($_POST['delete_tintuc']) && !empty($_POST['tintuc_id'])) {
    $result = deleteNews($_POST['tintuc_id']);
}

$tintuc = getNews();
?>
<div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
    <h1>Tin tức</h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>News</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($tintuc as $item) { ?>
                                <tr class="">
                                    <td><?php echo $item['tintuc_id'] ?> </td>
                                    <td><?php echo $item['tintuc_title'] ?></td>
                                    <td><?php echo $item['tintuc_status'] ?></td>
                                    <td >
                                        <a <?php
                                        if ($admin == false) {
                                            echo 'style="display:none;"';
                                        }
                                        ?> href="<?php echo BASE_URL . '/admin/index.php?page=themtintuc&id=' . $item['tintuc_id'] ?>" class="btn btn-success btn-mini">Edit</a>
                                        <form <?php
                                        if ($admin == false) {
                                            echo 'style="display:none;"';
                                        }
                                        ?> action="" method="post">
                                            <input type="hidden" name="tintuc_id" value= "<?php echo $item['tintuc_id'] ?>" >
                                            <input type="submit" name="delete_tintuc" class="btn btn-danger btn-mini" value="Delete" onclick="return confirm('Bạn có chắc chắn muốn xóa đối tượng?')">
                                        </form>
                                        <a class="btn btn-success btn-mini" href="<?php echo BASE_URL . '/admin/index.php?page=details&id=' . $item['tintuc_id'] ?>">Detail</a>
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
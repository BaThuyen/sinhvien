<?php
if (isset($_GET['id'])) {
    $heading = "Update tintuc";
} else {
    $heading = "Add tintuc";
}


if (isset($_POST['submit_tintuc']) && !empty($_POST['title'])) {
    if (isset($_GET['id'])) {
        //Update tintuc
        $result = updateNews($_GET['id'], $_POST['title'], $_POST['content'], $_POST['status']);
        if ($result == true) {
            $heading = 'Update succesfully.';
        } else {
            $heading = 'Update failed.';
        }
    } else {
        //Add tintuc
        //$result = addNews($_POST['title'], $_POST['content'], $_POST['status']);
        if (true) {
            $heading = 'Added succesfully.';
            define('API_ACCESS_KEY', 'AAAA1cBJjsQ:APA91bFIkhaSMrQ1_j75m5Wkcjmj4VbD_Hv-fEGqv16DviVf2cx_Xcuz1T2cQPGkthFhdEIB5_fP9xm6bqx52M1z1qnHH_up9UiW4E8C5DLg7RsVvcepD06oslsPfqxbckZaPm7lqwxF');
            //$registrationIDs = array("1");
            $msg = array
                (
                'message' => 'here is a message. message',
                'title' => 'Thông báo mới',
                'subtitle' => 'This is a subtitle. subtitle',
                'tickerText' => 'Ticker text here...Ticker text here...Ticker text here',
                'vibrate' => 1,
                'sound' => 1
            );
            $fields = array(
                "to" => "/topics/sotaysv",
                "notification" => [
                    "body" => $_POST['title'],
                    "title" => "Thông báo mới"
                ],
                'data' => $msg,
            );

            $headers = array
                (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            curl_close($ch);
            var_dump($result);
            die();
        } else {
            $heading = 'Added failed.';
        }
    }
}


//get tintuc by ID
$tintuc_title = null;
$tintuc_content = null;
$tintuc_status = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tintuc_value = getNewsByID($id);
    $tintuc_title = $tintuc_value['tintuc_title'];
    $tintuc_content = $tintuc_value['tintuc_content'];
    $tintuc_status = $tintuc_value['tintuc_status'];
}
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
                    <h5>News</h5>
                </div>
                <div class="widget-content nopadding">
                    <!-- BEGIN USER FORM -->
                    <form action="" method="post" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Title :</label>
                            <div class="controls">
                                <input type="text" name="title"class="span11" placeholder="Title" value="<?= $tintuc_title ?>"/> *
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" >Content :</label>
                            <div class="controls">
                                <div class="span11">
                                    <textarea class="ckeditor" id="ckeditor" name="content"><?= $tintuc_content ?></textarea> *
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Status :</label>
                            <div class="controls">
                                (1: actice,   0: not actice)
                                <input type="text" name="status"class="span11" placeholder="0 or 1" value="<?= $tintuc_status == null ? 1 : $tintuc_status ?>"/> *
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-actions">

                                <button type="submit" class="btn btn-success" name="submit_tintuc">Save</button>

                            </div>
                        </div>
                    </form>
                    <!-- END USER FORM -->


                </div>
            </div>
        </div>
    </div>
</div>

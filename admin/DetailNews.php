<?php
$id = isset($_GET['id']) ? $_GET['id'] : "";
$tintuc = getNewsByID($id);
?>
<div style="margin-left: 50px;">
    <br>
    <h1>Title : <?= $tintuc['tintuc_title'] ?></h1>
    <h3>Content: </h3>
    <p><?= $tintuc['tintuc_content'] ?></p>
</div>
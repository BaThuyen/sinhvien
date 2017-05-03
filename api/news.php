<?php
require_once 'db.php';

if(isset($_GET['page'])){
    $news = getNews($_GET['page']);
    foreach($news as $nw){
        echo json_encode($nw)."\n";
    }
} elseif(isset($_GET['id'])){
    $contents = getNewsContent($_GET['id']);
    foreach ($contents as $content){
        echo ($content);
    }
}
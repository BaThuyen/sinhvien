<?php
require_once './db.php';

if(isset($_GET['mssv']) && isset($_GET['hocky'])){
    $programs = getCTDT($_GET['mssv'], $_GET['hocky']);
    foreach ($programs as $program){
        echo json_encode($program)."\n";
    }
}


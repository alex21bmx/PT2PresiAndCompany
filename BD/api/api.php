<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset-utf-8");
    require_once('../Usuario.php');

    $Usuario = new Usuario();

    if($Usuario-> selectName($_REQUEST['user'], $_REQUEST['pass'])){
        $response = array("status" => "ok");
    }else{
        $response = array("status" => "fail");
    }

    echo json_encode($response);
?>
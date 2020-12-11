<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset-utf-8");
    require_once('../Usuario.php');

    switch($_REQUEST['id']){
        case 1:
            $Usuario = new Usuario();

            $resultado = $Usuario-> selectExistsUser($_REQUEST['user'], $_REQUEST['pass']);
            foreach($resultado as $key => $value){
                if($value==1){
                    $datos = $Usuario->selectUser($_REQUEST['user'], $_REQUEST['pass']);
                    $response = array("status" => "ok", "nombre" =>$datos["username"], "tipo_usuario" => $datos["tipo_usuario"]);
                }else{
                    $response = array("status" => "fail");
                }
            }

            echo json_encode($response);
            break;
        }
?>
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset-utf-8");
    require_once('../Usuario.php');
    require_once('../Experiencia.php');

    $Usuario = new Usuario();
    $Experiencia = new Experiencia();

    switch($_REQUEST['id']){
        case 1:
            
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

        case 2:
            $response = array();
            $datos = $Experiencia -> selectExperienciasPrincipales();
            foreach($datos as $key => $value){
                $idUsuario = $Usuario -> selectUserName($value["id_usuario"]);
                $response["viaje" . $key] = array("localizacion" => $value["localizacion"], "imagen" => $value["imagen"], "id_usuario" => $idUsuario["username"], "fecha_de_publicacion" => $value["fecha_de_publicacion"]);      
            }

            echo json_encode($response);
            break;
        }
?>
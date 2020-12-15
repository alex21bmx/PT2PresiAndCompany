<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset-utf-8");
    require_once('../Usuario.php');
    require_once('../Experiencia.php');

    $Usuario = new Usuario();
    $Experiencia = new Experiencia();

    switch($_REQUEST['id']){

        //SELECT DE UN USUARIO PARA EL LOGIN
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

        //SELECT PARA LAS EXPERIENCIAS SIN LOGEARSE
        case 2:

            $response = array();
            $datos = $Experiencia -> selectExperienciasPrincipales();
            foreach($datos as $key => $value){
                $idUsuario = $Usuario -> selectUserName($value["id_usuario"]);
                $response["viaje" . $key] = array("localizacion" => $value["localizacion"], "imagen" => $value["imagen"], "id_usuario" => $idUsuario["username"], "fecha_de_publicacion" => $value["fecha_de_publicacion"]);      
            }

            echo json_encode($response);
            break;

        //INSERT PARA REGISTRAR UN USUARIO
        case 3: 

            $datos = $Usuario -> insert($_REQUEST['user'], $_REQUEST['pass']);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;

        //UPDATE PARA QUE EL USUARIO PUEDA HACER UN CAMBIO DE CONTRASEÑA
        case 4: 
            
            $datos = $Usuario -> update($_REQUEST['user'], $_REQUEST['pass']);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;

        //DELETE PARA ELIMINAR UN USUARIO DE NUESTRA BBDD
        case 5: 
            
            $datos = $Usuario -> delete($_REQUEST['user']);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;
    }

        
?>
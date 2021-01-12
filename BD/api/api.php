<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/html; charset-utf-8");
    require_once('../Usuario.php');
    require_once('../Experiencia.php');

    $Usuario = new Usuario();
    $Experiencia = new Experiencia();

    switch($_REQUEST['id']){

        //SELECT DE UN USUARIO PARA EL LOGIN :)
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

        //SELECT PARA LAS EXPERIENCIAS SIN LOGEARSE :)
        case 2:

            $response = array();
            $datos = $Experiencia -> selectExperienciasPrincipales();
            foreach($datos as $key => $value){
                $idUsuario = $Usuario -> selectUserName($value["id_usuario"]);
                $response["viaje" . $key] = array("localizacion" => $value["localizacion"], "imagen" => $value["imagen"], "id_usuario" => $idUsuario["username"], "fecha_de_publicacion" => $value["fecha_de_publicacion"]);      
            }

            echo json_encode($response);
            break;

        //INSERT PARA REGISTRAR UN USUARIO :)
        case 3: 

            $datos = $Usuario -> insert($_REQUEST['user'], $_REQUEST['pass']);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;

        //UPDATE PARA QUE EL USUARIO PUEDA HACER UN CAMBIO DE CONTRASEÑA :)
        case 4: 
            
            $datos = $Usuario -> update($_REQUEST['user'], $_REQUEST['pass']);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;

        //DELETE PARA ELIMINAR UN USUARIO DE NUESTRA BBDD :)
        case 5: 
            
            $datos = $Usuario -> delete($_REQUEST['user']);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;

        //INSERT DE EXPERIENCIA :) LAS COORDENADAS CHOCAN PERO LO DEJAMOS EN NULL Y YA LO MIRAREMOS
        case 6:
            $array = array("id_experiencia" => $_REQUEST["id_experiencia"],
            "texto" => $_REQUEST["texto"],
            "imagen" => $_REQUEST["imagen"],
            "categoria" => $_REQUEST["categoria"],
            "latitud" => $_REQUEST["latitud"],
            "longitud" => $_REQUEST["longitud"],
            "estado" => $_REQUEST["estado"],
            "id_usuario" => $_REQUEST["id_usuario"],
            "fecha_de_publicacion" => $_REQUEST["fecha_de_publicacion"],
            "localizacion" => $_REQUEST["localizacion"]
            );

            $datos = $Experiencia -> insert($array);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;

        //SELECT DE TODAS LAS EXPERIENCIAS :)
        case 7:
            $response = array();
            $datos = $Experiencia -> select();
            foreach($datos as $key => $value){
                if($_REQUEST['size']==18){
                    if($key<18){
                        $idUsuario = $Usuario -> selectUserName($value["id_usuario"]);
                        $response[$key] = array("id_experiencia" => $value["id_experiencia"],
                        "texto" => $value["texto"],
                        "imagen" => $value["imagen"],
                        "categoria" => $value["categoria"],
                        "latitud" => $value["latitud"],
                        "longitud" => $value["longitud"],
                        "valoraciones_positivas" => $value["valoraciones_positivas"],
                        "valoraciones_negativas" => $value["valoraciones_negativas"],
                        "estado" => $value["estado"],
                        "id_usuario" => $idUsuario["username"],
                        "fecha_de_publicacion" => $value["fecha_de_publicacion"],
                        "localizacion" => $value["localizacion"],
                        "reportado" => $value["reportado"]
                        );   
                    }
                }else{
                    if($key>=($_REQUEST['size']-9) && $key<$_REQUEST['size']){
                        $idUsuario = $Usuario -> selectUserName($value["id_usuario"]);
                        $response[$key] = array("id_experiencia" => $value["id_experiencia"],
                        "texto" => $value["texto"],
                        "imagen" => $value["imagen"],
                        "categoria" => $value["categoria"],
                        "latitud" => $value["latitud"],
                        "longitud" => $value["longitud"],
                        "valoraciones_positivas" => $value["valoraciones_positivas"],
                        "valoraciones_negativas" => $value["valoraciones_negativas"],
                        "estado" => $value["estado"],
                        "id_usuario" => $idUsuario["username"],
                        "fecha_de_publicacion" => $value["fecha_de_publicacion"],
                        "localizacion" => $value["localizacion"],
                        "reportado" => $value["reportado"]
                        );  
                    }else if($key<$_REQUEST['size']){
                        $response[$key] = array();
                    }
                }   
            }

            echo json_encode($response);
            break;

        //UPDATE DE UNA EXPERIENCIA EN CONCRETO :)
        case 8:
            $array = array("id_experiencia" => $_REQUEST["id_experiencia"],
            "texto" => $_REQUEST["texto"],
            "imagen" => $_REQUEST["imagen"],
            "categoria" => $_REQUEST["categoria"],
            "latitud" => $_REQUEST["latitud"],
            "longitud" => $_REQUEST["longitud"],
            "id_usuario" => $_REQUEST["id_usuario"],
            "localizacion" => $_REQUEST["localizacion"]
            );

            $datos = $Experiencia -> update($array);
            $response = array("status" => $datos);
            echo json_encode($response);
            break;

        //DELETE DE UNA EXPERIENCIA EN CONCRETO
        case 9:
            $datos = $Experiencia -> delete($_REQUEST["id_experiencia"], $_REQUEST["id_usuario"]);
            $response = array("status" => $datos);
            echo json_encode($response); 
            break;
    }

        
?>
<div id="ultimesEntrades">
</div>
<div>
    <div class="slider owl-carousel">
    <?php
        require_once('BD/Experiencia.php');
        require_once('BD/Usuario.php');

        $Usuario = new Usuario();
        $Experiencia = new Experiencia();
        $response = array();
        $datos = $Experiencia -> selectExperienciasPrincipales();
        foreach($datos as $key => $value){
            $idUsuario = $Usuario -> selectUserName($value["id_usuario"]);
            $response["viaje" . $key] = array("localizacion" => $value["localizacion"], "imagen" => $value["imagen"], "id_usuario" => $idUsuario["username"], "fecha_de_publicacion" => $value["fecha_de_publicacion"]);      
        }
        if(count($response)<10){
            $limit = count($response);
        } else{
            $limit = 10;
        }
        for ($i=0; $i < $limit; $i++) { 
            echo '<div class="item">
                    <img id="fotoPost" src="'.$response["viaje".$i]["imagen"].'" alt="">
                    <div class="slider-caption">
                        <h4 class="titolPost">'.$response["viaje".$i]["localizacion"].'</h4>
                        <p class="dadesPost">'.$response["viaje".$i]["id_usuario"].' - '.$response["viaje".$i]["fecha_de_publicacion"].'</p>
                    </div>
                  </div>';
        }

    ?>
</div>
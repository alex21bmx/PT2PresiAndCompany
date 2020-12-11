<?php

require_once('Experiencia.php');

$Experiencia = new Experiencia();

$datos = $Experiencia -> selectExperienciasPrincipales();

foreach($datos as $key => $value){
    echo $key . $value["localizacion"] . $value["imagen"] . $value["fecha_de_publicacion"] . $value["id_usuario"] . "<br>";
}
?>
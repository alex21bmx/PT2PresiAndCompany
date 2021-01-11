<?php
require_once('BD/Usuario.php');
require_once('BD/Experiencia.php');

$Usuario = new Usuario();
$Experiencia = new Experiencia();

$array = array("id_experiencia" => 88,
"texto" => "assdsfsdf",
"imagen" => "src/foto3.jpg",
"categoria" => "familiar",
"latitud" => 0,
"longitud" => 0,
"estado" => "publicada",
"id_usuario" => 2,
"fecha_de_publicacion" => "2020-12-14",
"localizacion" => "Tokio"
);

$datos = $Experiencia -> insert($array);




?>
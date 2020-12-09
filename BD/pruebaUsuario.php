<?php

require_once('Usuario.php');

$array = array("id" => null, "username" => "sergio", "password" => "12345", "tipo_usuario" => "admin");
$Usuario = new Usuario();
$Usuario-> select();


echo $Usuario
?>
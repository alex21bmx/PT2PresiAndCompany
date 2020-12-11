<?php
require_once('Usuario.php');
$Usuario = new Usuario;
$Usuario -> insert($_POST['newUsername'], $_POST['newPassword']);
/*echo "<script>alert('Usuario creado correctamente');
window.location.href='../index.php'</script>";*/
?>
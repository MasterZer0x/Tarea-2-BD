<?php  include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$pattern = "/.*=([0-9]+)/i";
preg_match($pattern, $actual_link, $re); 
$id = $re[1];

$sql = "DELETE FROM usuario WHERE id=".$id;

$ejecucion = pg_query($dbconn, $sql);

if ($ejecucion)
{
    echo "Se ha eliminado correctamente al usuario con id=".$id;
    echo "<a href='/admin/users/all.html' style='text-decoration:none;color:#ff0099;'> Volver al inicio</a>";
}


?>